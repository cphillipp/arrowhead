<?php

class MC4WP_Lite_Admin
{
	private $options = array();

	public function __construct()
	{
		$this->options = MC4WP_Lite::instance()->get_options();

		add_action('admin_init', array($this, 'register_settings'));
		add_action('admin_menu', array($this, 'build_menu'));
		add_action( 'admin_enqueue_scripts', array($this, 'load_css_and_js') );

		register_activation_hook( 'mailchimp-for-wp/mailchimp-for-wp.php', array($this, 'delete_transients') );
		register_deactivation_hook( 'mailchimp-for-wp-pro/mailchimp-for-wp-pro.php', array($this, 'delete_transients') );

		add_filter("plugin_action_links_mailchimp-for-wp/mailchimp-for-wp.php", array($this, 'add_settings_link'));
	
		// did the user click on upgrade to pro link?
		if(isset($_GET['page']) && $_GET['page'] == 'mc4wp-lite-upgrade' && !headers_sent()) {
			header("Location: http://dannyvankooten.com/wordpress-plugins/mailchimp-for-wordpress/");
			exit;
		}
	}

	public function delete_transients()
	{
		delete_transient('mc4wp_mailchimp_lists');
		delete_transient('mc4wp_mailchimp_lists_fallback');
	}

	public function add_settings_link($links)
	{
		 $settings_link = '<a href="admin.php?page=mc4wp-lite">Settings</a>';
		 $upgrade_link = '<a href="http://dannyvankooten.com/wordpress-plugins/mailchimp-for-wordpress/">Upgrade to Pro</a>';
         array_unshift($links, $upgrade_link, $settings_link);
         return $links;
	}

	public function register_settings()
	{
		register_setting('mc4wp_lite_settings', 'mc4wp_lite', array($this, 'validate_options'));
		register_setting('mc4wp_lite_checkbox_settings', 'mc4wp_lite_checkbox', array($this, 'validate_options'));
		register_setting('mc4wp_lite_form_settings', 'mc4wp_lite_form', array($this, 'validate_options'));
	}

	public function validate_options($opts)
	{
		return $opts;
	}

	public function build_menu()
	{
		add_menu_page('MailChimp for WP Lite', 'MailChimp for WP Lite', 'manage_options', 'mc4wp-lite', array($this, 'show_api_settings'), plugins_url('mailchimp-for-wp/assets/img/menu-icon.png'));
		add_submenu_page('mc4wp-lite', 'API Settings - MailChimp for WP Lite', 'MailChimp Settings', 'manage_options', 'mc4wp-lite', array($this, 'show_api_settings'));
		add_submenu_page('mc4wp-lite', 'Checkbox Settings - MailChimp for WP Lite', 'Checkboxes', 'manage_options', 'mc4wp-lite-checkbox-settings', array($this, 'show_checkbox_settings'));
		add_submenu_page('mc4wp-lite', 'Form Settings - MailChimp for WP Lite', 'Forms', 'manage_options', 'mc4wp-lite-form-settings', array($this, 'show_form_settings'));
		add_submenu_page('mc4wp-lite', 'Upgrade to Pro - MailChimp for WP Lite', 'Upgrade to Pro', 'manage_options', 'mc4wp-lite-upgrade', array($this, 'redirect_to_pro'));

	}

	public function load_css_and_js($hook)
	{
		if(!isset($_GET['page']) || stristr($_GET['page'], 'mc4wp-lite') == false) { return; }
		
		// css
		wp_enqueue_style( 'mc4wp-admin-css', plugins_url('mailchimp-for-wp/assets/css/admin.css') );

		// js
		wp_register_script('mc4wp-admin-js',  plugins_url('mailchimp-for-wp/assets/js/admin.js'), array('jquery'), false, true);
		wp_enqueue_script( array('jquery', 'mc4wp-admin-js') );
	}

	public function get_checkbox_compatible_plugins()
	{
		$checkbox_plugins = array(
			'comment_form' => "Comment form",
			"registration_form" => "Registration form"
		);

		if(is_multisite()) $checkbox_plugins['ms_form'] = "MultiSite forms";
		if(class_exists("BuddyPress")) $checkbox_plugins['bp_form'] = "BuddyPress registration";
		if(class_exists('bbPress')) $checkbox_plugins['bbpress_forms'] = "bbPress";

		return $checkbox_plugins;
	}

	public function redirect_to_pro()
	{
		?><script>window.location.replace('http://dannyvankooten.com/wordpress-plugins/mailchimp-for-wordpress/'); </script><?php
	}

	public function show_api_settings()
	{
		$opts = $this->options['general'];
		$tab = 'api-settings';

		if(empty($opts['api_key'])) {
			$connected = false;
		} else {
			$connected = (MC4WP_Lite::api()->is_connected());
		}

		$lists = $this->get_mailchimp_lists();
		include_once MC4WP_LITE_PLUGIN_DIR . 'includes/views/api-settings.php';
	}

	public function show_checkbox_settings()
	{
		$opts = $this->options['checkbox'];
		$lists = $this->get_mailchimp_lists();
		$tab = 'checkbox-settings';
		include_once MC4WP_LITE_PLUGIN_DIR . 'includes/views/checkbox-settings.php';
	}

	public function show_form_settings()
	{
		$opts = $this->options['form'];
		$lists = $this->get_mailchimp_lists();
		$tab = 'form-settings';
		include_once MC4WP_LITE_PLUGIN_DIR . 'includes/views/form-settings.php';
	}

	/**
	* Get MailChimp lists
	* Try cache first, then try API, then try fallback cache.
	*/
	private function get_mailchimp_lists()
	{
		$cached_lists = get_transient( 'mc4wp_mailchimp_lists' );
		$refresh_cache = (isset($_REQUEST['renew-cached-data']));

		// force cache refresh if merge_vars are not set
		if($cached_lists && !isset($cached_lists[0]->merge_vars)) {
			$refresh_cache = true;
		}

		if($refresh_cache || !$cached_lists) {
			// make api request for lists
			$api = MC4WP_Lite::api();
			$lists = array();
			$lists_data = $api->get_lists();

			if($lists_data) {
				
				$list_ids = array();
				foreach($lists_data as $list) {
					$list_ids[] = $list->id;

					$lists["{$list->id}"] = (object) array(
						'id' => $list->id,
						'name' => $list->name,
						'subscriber_count' => $list->stats->member_count,
						'merge_vars' => array(),
						'interest_groupings' => array()
					);

					// get interest groupings
					$groupings_data = $api->get_list_groupings($list->id);
					if($groupings_data) {
						$lists["{$list->id}"]->interest_groupings = array_map(array($this, 'strip_unnecessary_grouping_properties'), $groupings_data);
					}
				}

				// get merge vars for all lists at once
				$merge_vars_data = $api->get_lists_with_merge_vars($list_ids);
				if($merge_vars_data) {
					foreach($merge_vars_data as $list) {
						// add merge vars to list
						$lists["{$list->id}"]->merge_vars = array_map(array($this, 'strip_unnecessary_merge_vars_properties'), $list->merge_vars);
					}
				}

				// cache renewal triggered manually?
				if(isset($_POST['renew-cached-data'])) {
					if($lists) {
						add_settings_error("mc4wp", "cache-renewed", 'Renewed MailChimp cache.', 'updated' );
					} else {
						add_settings_error("mc4wp", "cache-renew-failed", 'Failed to renew MailChimp cache - please try again later.' );
					}
				}

				// store lists in transients
				set_transient('mc4wp_mailchimp_lists', $lists, (24 * 3600)); // 1 day
				set_transient('mc4wp_mailchimp_lists_fallback', $lists, 1209600); // 2 weeks
				return $lists;
			} else {
				// api request failed, get fallback data (with longer lifetime)
				$cached_lists = get_transient('mc4wp_mailchimp_lists_fallback');
				if(!$cached_lists) { return array(); }
			}
			
		}

		return $cached_lists;
	}

	/**
	* Build the group array object which will be stored in cache
	*/ 
	public function strip_unnecessary_group_properties($group) {
		return (object) array(
			'name' => $group->name
		);
	}

	/**
	* Build the groupings array object which will be stored in cache
	*/ 
	public function strip_unnecessary_grouping_properties($grouping)
	{
		return (object) array(
			'id' => $grouping->id,
			'name' => $grouping->name,
			'groups' => array_map(array($this, 'strip_unnecessary_group_properties'), $grouping->groups),
			'form_field' => $grouping->form_field
		);
	}

	/**
	* Build the merge_var array object which will be stored in cache
	*/ 
	public function strip_unnecessary_merge_vars_properties($merge_var)
	{
		return (object) array(
			'name' => $merge_var->name,
			'field_type' => $merge_var->field_type,
			'req' => $merge_var->req,
			'tag' => $merge_var->tag
		);

	}

}