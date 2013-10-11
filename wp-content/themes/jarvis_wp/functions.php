<?php

global $smof_data;
/* Translation */
load_theme_textdomain( 'rocknrolla', get_template_directory() . '/includes/languages' );
$locale = get_locale();
$locale_file = get_template_directory() . "/includes/languages/$locale.php";
if ( is_readable($locale_file) )
	require_once($locale_file);
	
if ( ! isset( $content_width ) )
	$content_width = 1000;	


define('RNR_FUNCTIONS', get_template_directory()  . '/includes');
define('RNR_INDEX_JS', get_template_directory_uri()  . '/js');
define('RNR_INDEX_CSS', get_template_directory_uri()  . '/css');

/** Slightly Modified Options Framework **/
require_once ('admin/index.php');

/* WP 3.1 Post Formats */
add_theme_support( 'post-formats', array('gallery', 'link', 'quote', 'audio', 'video')); 


/* Include Meta Box Framework */
define( 'RWMB_URL', trailingslashit( get_template_directory_uri() . '/includes/metaboxes' ) );
define( 'RWMB_DIR', trailingslashit( get_template_directory() . '/includes/metaboxes' ) );

require_once RWMB_DIR . 'meta-box.php';

include_once(RNR_FUNCTIONS.'/tgm-plugin-activation/class-tgm-plugin-activation.php'); // Plugin Activation Class
include_once(RNR_FUNCTIONS.'/tgm-plugin-activation/tgm-plugin-activator.php'); // Plugin Activator 
include_once(RNR_FUNCTIONS.'/portfolio-post-type.php'); // Portfolio Post Type
include_once RNR_FUNCTIONS.'/tinymce/rnr-shortcodes.php';
include_once RNR_FUNCTIONS.'/shortcodes.php';
include_once RNR_FUNCTIONS.'/metaboxes.php';
include_once RNR_FUNCTIONS.'/custom-style.php';


/* Include Widgets */
include_once(RNR_FUNCTIONS.'/widgets/embed.php');
include_once(RNR_FUNCTIONS.'/widgets/flickr.php');
include_once(RNR_FUNCTIONS.'/widgets/twitter.php');
include_once(RNR_FUNCTIONS.'/widgets/portfolio.php');



function my_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );


if (is_admin() ){
	function rocknrolla_admin_scripts(){	
		wp_register_script('rnrmetajs', RNR_INDEX_JS .'/admin/init.js', array('jquery','media-upload','thickbox'));
		wp_enqueue_script('rnrmetajs');
	}
}

add_action('admin_enqueue_scripts', 'rocknrolla_admin_scripts');

	if (!is_admin() ){
		function rocknrolla_front_scripts(){		
		
		    global $smof_data;
			wp_register_script('rnrForm', RNR_INDEX_JS .'/jquery.form.js', true);	
	        wp_register_script('superfish', RNR_INDEX_JS. '/superfish.js', TRUE);
			
			wp_register_script('rnrImagesload', RNR_INDEX_JS .'/jquery.waitforimages.js', true);	
			
			wp_register_script('rnrQueryLoader', RNR_INDEX_JS .'/jquery.queryloader2.js', true);	
			wp_register_script('rnrFitVids', RNR_INDEX_JS .'/jquery.fitvids.js', true);	
			wp_register_script('rnrAppear', RNR_INDEX_JS .'/jquery.appear.js', true);	
			wp_register_script('rnrSlabText', RNR_INDEX_JS .'/jquery.slabtext.min.js', true);	
			wp_register_script('rnrFitText', RNR_INDEX_JS .'/jquery.fittext.js', true);	
			wp_register_script('rnrParallax', RNR_INDEX_JS .'/jquery.parallax-1.1.3.js', true);	
			wp_register_script('rnrPrettyPhoto', RNR_INDEX_JS .'/jquery.prettyPhoto.js', true);	
			wp_register_script('rnrSticky', RNR_INDEX_JS .'/jquery.sticky.js', true);	
			wp_register_script('rnrSmoothScroll', RNR_INDEX_JS .'/SmoothScroll.js', true);	
			wp_register_script('rnrFlexslider', RNR_INDEX_JS .'/jquery.flexslider-min.js', true);	
			wp_register_script('rnrBootstrapModal', RNR_INDEX_JS .'/bootstrap-modal.js', true);	
			wp_register_script('rnrEasing', RNR_INDEX_JS .'/jquery.easing.min.js', true);
			wp_register_script('rnrIsotope', RNR_INDEX_JS .'/isotope.js', true);			
			wp_register_script('selectnav', RNR_INDEX_JS .'/selectnav.min.js', true);	
			wp_register_script('rnrscripts', RNR_INDEX_JS .'/scripts.js', true);	
			wp_register_script('shortcodes', RNR_INDEX_JS .'/shortcodes.js', true);	
			wp_register_script('rnrSupersized', RNR_INDEX_JS .'/supersized.3.2.7.min.js', true);	
			wp_register_script('rnrSupersizedFun', RNR_INDEX_JS .'/supersized.shutter.min.js', true);
		
								
			wp_enqueue_script( 'jquery', false, array(), false, true);
			wp_enqueue_script('rnrForm');
          	wp_enqueue_script('superfish');
			
			wp_enqueue_script('rnrQueryLoader');
			wp_enqueue_script('rnrImagesload');
			wp_enqueue_script('rnrAppear');
			wp_enqueue_script('rnrSlabText');
			wp_enqueue_script('rnrParallax');
			wp_enqueue_script('rnrPrettyPhoto');
			wp_enqueue_script('rnrSticky');
			wp_enqueue_script('rnrSmoothScroll');
			wp_enqueue_script('rnrFlexslider');
			wp_enqueue_script('rnrBootstrapModal');
			wp_enqueue_script('rnrEasing');
			wp_enqueue_script('rnrFitText');
			wp_enqueue_script('rnrFitVids');
			wp_enqueue_script('rnrIsotope');
			wp_enqueue_script('selectnav');
			wp_enqueue_script('rnrscripts');
			wp_enqueue_script('shortcodes');	
			
			if( ($smof_data['rnr_home_type']=="FullScreen Slider") ) { 
			   wp_enqueue_script('rnrSupersized');
			   wp_enqueue_script('rnrSupersizedFun');
			}				
			
	wp_localize_script( 'rnrscripts', 'rnr_global_vars', array( 
		'contact_form_required_fields_label_ajax' =>  __('This is a required field', 'rocknrolla'),
		'contact_form_warning' => __('Please verify fields and try again.', 'rocknrolla'),
		'contact_form_email_warning' =>  __('Please enter a valid e-mail address and try again.', 'rocknrolla'),
		'contact_form_error' => __('There was an error sending your email. Please try again later.', 'rocknrolla'),
		'contact_form_success_message' => __('Thanks, we got your mail and will get back to you soon!', 'rocknrolla'),
		'contactFormDefaults_name' => __('Name', 'rocknrolla'),
		'contactFormDefaults_email' => __('E-mail', 'rocknrolla'),
		'contactFormDefaults_subject' => __('Subject', 'rocknrolla'),
		'contactFormDefaults_message' => __('Message', 'rocknrolla'),
		'commentFormDefaults_author' => __('Name', 'rocknrolla'),
		'commentFormDefaults_email' => __('E-mail', 'rocknrolla'),
		'commentFormDefaults_url' => __('http://', 'rocknrolla'),
		'searchFormDefaults_search' => __('Search', 'rocknrolla')
	) );				
	
	}
  add_action('wp_footer', 'rocknrolla_front_scripts'); 


	
      if( $smof_data['rnr_enable_googlemap']) {	
		function rocknrolla_head_scripts(){		
		  wp_register_script('gmap', 'https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places', array('jquery'), '2.1', false );  
	      wp_register_script('infoBox', 'http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js', array('jquery'), '2.1', false );	
			wp_enqueue_script( 'gmap');
			wp_enqueue_script( 'infoBox');
	
		}
      add_action('wp_print_scripts', 'rocknrolla_head_scripts'); 

	  }


}
/* Register Stylesheets */
function rocknrolla_print_styles() {  	
	if ( !is_admin() ){
		
		global $smof_data;
		wp_register_style( 'rnrSkeleton', RNR_INDEX_CSS. '/skeleton.css', array(), '1', 'all' );	
		wp_register_style( 'rnrReset', RNR_INDEX_CSS. '/reset.css', array(), '1', 'all' );	
		wp_register_style( 'rnrSocial', RNR_INDEX_CSS. '/social.css', array(), '1', 'all' );	
		wp_register_style( 'rnrFlexslider', RNR_INDEX_CSS. '/flexslider.css', array(), '1', 'all' );	
		wp_register_style( 'rnrFontawesome', RNR_INDEX_CSS. '/font-awesome.css', array(), '1', 'all' );	
		wp_register_style( 'rnrPrettyPhoto', RNR_INDEX_CSS. '/prettyPhoto.css', array(), '1', 'all' );
		wp_register_style( 'rnrShortcodes', RNR_INDEX_CSS. '/shortcodes.css', array(), '1', 'all' );	
		wp_register_style( 'rnrTheme', RNR_INDEX_CSS. '/theme.css', array(), '1', 'all' );			
		wp_register_style( 'rnrSupersized', RNR_INDEX_CSS. '/supersized.css', array(), '1', 'all' );				
		wp_register_style( 'rnrSupersizedFun', RNR_INDEX_CSS. '/supersized.shutter.css', array(), '1', 'all' );			
		wp_register_style( 'rnrDark', RNR_INDEX_CSS. '/dark.css', array(), '1', 'all' );			
		wp_register_style( 'rnrMedia', RNR_INDEX_CSS. '/media.css', array(), '1', 'all' );
		
		
		wp_enqueue_style( 'rnrSkeleton' ); 					
		wp_enqueue_style( 'reset' ); 	   	 			
	    wp_enqueue_style( 'style', get_stylesheet_uri(), array(), '1', 'all' );
		wp_enqueue_style( 'rnrSocial' ); 	 
		wp_enqueue_style( 'rnrFlexslider' ); 	 
		wp_enqueue_style( 'rnrFontawesome' ); 	 
		wp_enqueue_style( 'rnrPrettyPhoto' );	 
		wp_enqueue_style( 'rnrShortcodes' ); 	 
		wp_enqueue_style( 'shortcodes' ); 
		wp_enqueue_style( 'rnrTheme' );	
		wp_enqueue_style( 'rnrMedia' ); 
			
		if($smof_data['rnr_home_type']=="FullScreen Slider") { 
		   wp_enqueue_style('rnrSupersized');
		   wp_enqueue_style('rnrSupersizedFun');
		}
		
		if($smof_data['rnr_enable_dark_skin']==true) { 
		   wp_enqueue_style( 'rnrDark' );
		}					
	}  
}
add_action( 'wp_print_styles', 'rocknrolla_print_styles' );











/* Post Thumbnails */
if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );

/* Custom Image Sizes */	
//if($smof_data['rnr_enable_widescreen'] == "1") {
	
	  // ULTRA RESPONSIVE 1200PX GRID SIZES

		  add_image_size( 'blog-standard', 770, 330, true );
		  add_image_size( 'span12', 1172, 400, true ); 
		  add_image_size( 'span7', 670, 400, true );		  
		  add_image_size( 'span6', 570, 372, true );		
		  add_image_size( 'span4', 370, 241, true ); 		
		  add_image_size( 'span3', 270, 176, true );	  
		  add_image_size( 'blog-span6', 570, 210, true );		
		  add_image_size( 'blog-span4', 370, 150, true ); 		
		  add_image_size( 'blog-span3', 270, 120, true );			  
		  add_image_size( 'mini', 60, 60, true ); 			


 function ago($time) {
	   $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
	   $lengths = array("60","60","24","7","4.35","12","10");

	   $now = time();

	       $difference     = $now - $time;
	       $tense         = "ago";

	   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
	       $difference /= $lengths[$j];
	   }

	   $difference = round($difference);

	   if($difference != 1) {
	       $periods[$j].= "s";
	   }

	   return "$difference $periods[$j] ago ";
	}
	 
	 
	
/* Comments Function */		
function rocknrolla_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>	
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
   <div id="comment-<?php comment_ID(); ?>" class="comment-body clearfix"> 	   		
		<div class="avatar"><?php echo get_avatar($comment, $size = '50'); ?></div>	         
		 <div class="comment-text">	         
			 <div class="author">
				<span><?php printf( __( '%s', 'rocknrolla'), get_comment_author_link() ) ?></span>
				<div class="date">
				<?php printf(__('%1$s at %2$s', 'rocknrolla'), get_comment_date(),  get_comment_time() ) ?></a><?php edit_comment_link( __( '(Edit)', 'rocknrolla'),'  ','' ) ?>
				&middot; <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>  </div>  
			 </div>				 
			 <div class="text"><?php comment_text() ?></div>				 
			 <?php if ( $comment->comment_approved == '0' ) : ?>
			 <em><?php _e( 'Your comment is awaiting moderation.', 'rocknrolla' ) ?></em>
			 <br />
			<?php endif; ?>		      	
		</div>	      
   </div>	
<?php }



   
  
/* Pagination Function*/   
function rocknrolla_pagination($pages = '', $range = 4) {
	$showitems = ($range * 2)+1;
	
	global $paged;
	if(empty($paged)) $paged = 1;
	
	if($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages) {
			$pages = 1;
		}
	}
	
	if(1 != $pages) {
		echo "<span class='allpages'>" . __('Page', 'rocknrolla') . " ".$paged." " . __('of', 'rocknrolla') . " ".$pages."</span>";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; " . __('First', 'rocknrolla') . "</a>";
		if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; " . __('Previous', 'rocknrolla') . "</a>";
		
		for ($i=1; $i <= $pages; $i++) {
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
				echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
			}
		}
	
		if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">" . __('Next', 'rocknrolla') . " &rsaquo;</a>";
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>" . __('Last', 'rocknrolla') . " &raquo;</a>";
	}
}
	

/* Add RSS Links to head section */
add_theme_support( 'automatic-feed-links' );
add_filter('widget_text', 'do_shortcode');
/* Add prettyPhoto to content anchor tags */	
add_filter( 'wp_get_attachment_link', 'rocknrolla_custom_prettyphoto');



	function rocknrolla_excerpt_more($more) {
		global $post;
		return '&hellip;<p><a href="'. get_permalink($post->ID) . '" class="read-more-link">' . '' . __('Read More', 'rocknrolla') . ' &rarr;' . '</a></p>';
	}
	add_filter('excerpt_more', 'rocknrolla_excerpt_more');

	
	
	

function rocknrolla_custom_prettyphoto($content) {
	$content = preg_replace("/<a/","<a data-rel=\"prettyPhoto\"",$content,1);
	return $content;
}

  
  register_sidebar(array(
	 'name' => __('Blog Sidebar','rocknrolla' ),
	 'id'   => 'blog-widgets',
	  'description'   => __( 'These are widgets for the Blog page.','rocknrolla' ),
	  'before_widget' => '<div id="%1$s" class="widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h3>',
	  'after_title'   => '</h3>'
  ));  


function register_menus() {
	register_nav_menus( array( 'main-menu' => 'Primary Navigation Menu') );
}
add_action('init', 'register_menus');
 
class description_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $object, $depth = 0, $args = Array() , $current_object_id = 0) {
           
           global $wp_query;

           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $object->classes ) ? array() : (array) $object->classes;
           $icon_class = $classes[0];
		   $classes = array_slice($classes,1);

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           

           $attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
           $attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
           $attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
          	
          	if( $icon_class != '' ) {
            	$icon_classes = '<i class="'. $icon_class .'"></i>';
		   	}
		   	else{
		   		$icon_classes = '';
		   	}

           if($object->object == 'page')
           {
                $varpost = get_post($object->object_id);                
                $separate_page = get_post_meta($object->object_id, "rnr_separate_page", true);
                $disable_menu = get_post_meta($object->object_id, "rnr_disable_section_from_menu", true);
				$current_page_id = get_option('page_on_front');

                if ( ( $disable_menu != true ) && ( $varpost->ID != $current_page_id ) ) {

                	$output .= $indent . '<li id="menu-item-'. $object->ID . '"' . $value . $class_names .'>';

                	if ( $separate_page == true )
	                	$attributes .= ! empty( $object->url ) ? ' href="'   . esc_attr( $object->url ) .'"' : '';
	                else{
	                	if (is_front_page()) 
	                		$attributes .= ' href="#' . $varpost->post_name . '"'; 
	                	else 
	                		$attributes .= ' href="' . home_url() . '#' . $varpost->post_name . '"';
	                }	

	                $object_output = $args->before;
		            $object_output .= '<a'. $attributes .'>';
		            $object_output .= $args->link_before . $icon_classes . '<span>' . apply_filters( 'the_title', $object->title, $object->ID ) . '</span>';
		            $object_output .= $args->link_after;
		            $object_output .= '</a>';
		            $object_output .= $args->after;    

		             $output .= apply_filters( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );            	              	
                }
                                         
           }
           else{

           		$output .= $indent . '<li id="menu-item-'. $object->ID . '"' . $value . $class_names .'>';

                $attributes .= ! empty( $object->url ) ? ' href="' . esc_attr( $object->url ) .'"' : '';

	            $object_output = $args->before;
	            $object_output .= '<a'. $attributes .'>';
	            $object_output .= $args->link_before . $icon_classes . '<span>' . apply_filters( 'the_title', $object->title, $object->ID ) . '</span>';
	            $object_output .= $args->link_after;
	            $object_output .= '</a>';
	            $object_output .= $args->after;

	             $output .= apply_filters( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );
	        }

           
      }
}

add_filter( 'posts_orderby', 'sort_query_by_post_in', 10, 2 );
function sort_query_by_post_in( $sortby, $thequery ) {
	if ( !empty($thequery->query['post__in']) && isset($thequery->query['orderby']) && $thequery->query['orderby'] == 'post__in' )
		$sortby = "find_in_set(ID, '" . implode( ',', $thequery->query['post__in'] ) . "')";
	return $sortby;
}