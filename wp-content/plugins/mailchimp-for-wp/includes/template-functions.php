<?php

if(!function_exists('mc4wp_show_checkbox')) {
	function mc4wp_show_checkbox()
	{
		MC4WP_Lite::checkbox()->output_checkbox();
	}
}

if(!function_exists('mc4wp_show_form')) { 
	function mc4wp_show_form($id = 0) 
	{
		echo mc4wp_get_form($id);
	}
}

if(!function_exists('mc4wp_get_form')) {
	function mc4wp_get_form($id = 0)
	{
		return MC4WP_Lite::form()->output_form(array('id' => $id));
	}
}

/* Variables */
if(!function_exists('mc4wp_replace_variables')) {
	function mc4wp_replace_variables($text, $list_ids = array())
	{
		$needles = array('{ip}', '{current_url}', '{date}', '{time}');
		$replacements = array($_SERVER['REMOTE_ADDR'], mc4wp_get_current_url(), date("m/d/Y"), date("H:i:s"));
		$text = str_replace($needles, $replacements, $text);

		// subscriber count?
		if(strstr($text, '{subscriber_count}') != false) {
			$subscriber_count = mc4wp_get_subscriber_count($list_ids);
			$text = str_replace('{subscriber_count}', $subscriber_count, $text);
		}		
			
		$needles = array('{user_email}', '{user_firstname}', '{user_lastname}', '{user_name}', '{user_id}');
		if(is_user_logged_in() && ($user = wp_get_current_user()) && ($user instanceof WP_User)) {
			// logged in user, replace vars by user vars
			$user = wp_get_current_user();
			$replacements = array($user->user_email, $user->user_firstname, $user->user_lastname, $user->display_name, $user->ID);
	        $text = str_replace($needles, $replacements, $text);
	    } else {
	    	// no logged in user, remove vars
	    	$text = str_replace($needles, '', $text);
	    }

	    return $text;
	}
}

/* helper functions */
if(!function_exists('mc4wp_get_subscriber_count')) {
	function mc4wp_get_subscriber_count($list_ids)
	{
		$list_counts = get_transient('mc4wp_list_counts');

		if(!$list_counts) {
				// make api call
			$api = MC4WP_Lite::api();
			$lists = $api->get_lists();
			$list_counts = array();

			if($lists) {

				foreach($lists as $list) {
					$list_counts["{$list->id}"] = $list->stats->member_count;
				}

				$transient_lifetime = apply_filters('mc4wp_lists_count_cache_time', 1200); // 20 mins by default

				set_transient('mc4wp_list_counts', $list_counts, $transient_lifetime); 
				set_transient('mc4wp_list_counts_fallback', $list_counts, 3600 * 24); // 1 day
			} else {
				// use fallback transient
				$list_counts = get_transient('mc4wp_list_counts_fallback');
				if(!$list_counts) { return 0; }
			}
		}

		// start calculating subscribers count for all list combined
		$count = 0;
		foreach($list_ids as $id) {
			$count += $list_counts[$id];
		}

		return apply_filters('mc4wp_subscriber_count', $count);
	}
}

if(!function_exists('mc4wp_get_current_url')) {
	function mc4wp_get_current_url()
	{
		global $wp;
		return add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
	}
}
