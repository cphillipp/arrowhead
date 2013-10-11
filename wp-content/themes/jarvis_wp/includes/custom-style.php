<?php


function rocknrolla_custom_styles() {
global $smof_data; 
?>

<!-- CUSTOM TYPOGRAPHY STYLES -->
	
<style type="text/css">

  
 <?php 

 	$args=array(
 	    'post_type' => 'page',
 	    'order' => 'ASC',
 	    'orderby' => 'menu_order',
 	    'posts_per_page' => '-1'
  	 );
 	$main_query = new WP_Query($args); 

 if( have_posts() ) :

     while ($main_query->have_posts()) : $main_query->the_post();
	    
	    $post_id = get_the_ID();
		
			 
				if ( has_post_thumbnail()) { 
                   if (empty($slider_meta)) {                     
                     $att=get_post_thumbnail_id();
					 $image_src = wp_get_attachment_image_src( $att, 'full' );
					 $image_src = $image_src[0]; ?>
					 
              <?php if (get_post_meta($post_id, "rnr_assign_type", true) == "parallax-section") { ?>				
				#bg<?php echo $post_id; ?> { 
				   background: url('<?php echo $image_src; ?>');
				   background-attachment:  fixed;
				   background-size: cover;
				}	 
				
				<?php } ?>
				
              <?php if (get_post_meta($post_id, "rnr_assign_type", true) == "home-section") { ?>				
				.home-parallax { 
				   background: url('<?php echo $image_src; ?>') center top;
				}	 
				
				<?php } ?>				
					 
			<?php } 

                } 

     endwhile;
 endif; ?>
 
 





body{ 
		
		font-family: <?php echo $smof_data['rnr_body_text']['face']; ?>, Arial, Helvetica, sans-serif; 
		font-size: <?php echo $smof_data['rnr_body_text']['size']; ?>; 
		
		<?php  if( $smof_data['rnr_body_text']['style'] == 'bold' )
		{?>
		font-weight: bold; 		  
		<?php } else if( $smof_data['rnr_body_text']['style'] == 'bold italic' )
		{?>
		font-weight: bold; 	
		font-style: italic;	  
		<?php } else { ?>
		font-style: <?php echo $smof_data['rnr_body_text']['style']; ?>; 		  
		<?php } ?>	   
	   
	   color: <?php echo $smof_data['rnr_body_text']['color']; ?>;
	   font-weight:  <?php echo $smof_data['rnr_body_font_weight']; ?>;
}

	h1{
		font-family: <?php echo $smof_data['rnr_heading_h1']['face']; ?>, Arial, Helvetica, sans-serif !important; 
		font-size: <?php echo $smof_data['rnr_heading_h1']['size']; ?>; 

		<?php  if( $smof_data['rnr_heading_h1']['style'] == 'bold' )
		{?>
		font-weight: bold; 		  
		<?php } else if( $smof_data['rnr_heading_h1']['style'] == 'bold italic' )
		{?>
		font-weight: bold; 	
		font-style: italic;	  
		<?php } else { ?>
		font-style: <?php echo $smof_data['rnr_heading_h1']['style']; ?>; 		  
		<?php } ?>

		color: <?php echo $smof_data['rnr_heading_h1']['color']; ?>; 
	    font-weight:  <?php echo $smof_data['rnr_heading_h1_font_weight']; ?>; 
	    text-transform:  <?php echo $smof_data['rnr_heading_h1_text_transform']; ?>;	
	}
	
	
	h2{ 
		font-family: <?php echo $smof_data['rnr_heading_h2']['face']; ?>, Arial, Helvetica, sans-serif !important; 
		font-size: <?php echo $smof_data['rnr_heading_h2']['size']; ?>; 

		<?php  if( $smof_data['rnr_heading_h2']['style'] == 'bold' )
		{?>
		font-weight: bold; 		  
		<?php } else if( $smof_data['rnr_heading_h2']['style'] == 'bold italic' )
		{?>
		font-weight: bold; 	
		font-style: italic;	  
		<?php } else { ?>
		font-style: <?php echo $smof_data['rnr_heading_h2']['style']; ?>; 		  
		<?php } ?>

		color: <?php echo $smof_data['rnr_heading_h2']['color']; ?>;  
	    font-weight:  <?php echo $smof_data['rnr_heading_h2_font_weight']; ?>; 
	    text-transform:  <?php echo $smof_data['rnr_heading_h2_text_transform']; ?>;	
	}
	h3{ 
		font-family: <?php echo $smof_data['rnr_heading_h3']['face']; ?>, Arial, Helvetica, sans-serif !important; 
		font-size: <?php echo $smof_data['rnr_heading_h3']['size']; ?>; 
		
		<?php  if( $smof_data['rnr_heading_h3']['style'] == 'bold' )
		{?>
		font-weight: bold; 		  
		<?php } else if( $smof_data['rnr_heading_h3']['style'] == 'bold italic' )
		{?>
		font-weight: bold; 	
		font-style: italic;	  
		<?php } else { ?>
		font-style: <?php echo $smof_data['rnr_heading_h3']['style']; ?>; 		  
		<?php } ?>

		color: <?php echo $smof_data['rnr_heading_h3']['color']; ?>;  
	    font-weight:  <?php echo $smof_data['rnr_heading_h3_font_weight']; ?>; 
	    text-transform:  <?php echo $smof_data['rnr_heading_h3_text_transform']; ?>;	
	}
	h4{ 
		font-family: <?php echo $smof_data['rnr_heading_h4']['face']; ?>, Arial, Helvetica, sans-serif !important; 
		font-size: <?php echo $smof_data['rnr_heading_h4']['size']; ?>; 

		<?php  if( $smof_data['rnr_heading_h4']['style'] == 'bold' )
		{?>
		font-weight: bold; 		  
		<?php } else if( $smof_data['rnr_heading_h4']['style'] == 'bold italic' )
		{?>
		font-weight: bold; 	
		font-style: italic;	  
		<?php } else { ?>
		font-style: <?php echo $smof_data['rnr_heading_h4']['style']; ?>;  
	    font-weight:  <?php echo $smof_data['rnr_heading_h4_font_weight']; ?>; 
	    text-transform:  <?php echo $smof_data['rnr_heading_h4_text_transform']; ?>;			  
		<?php } ?>

		color: <?php echo $smof_data['rnr_heading_h4']['color']; ?>; 
	}
	h5{ 
		font-family: <?php echo $smof_data['rnr_heading_h5']['face']; ?>, Arial, Helvetica, sans-serif !important; 
		font-size: <?php echo $smof_data['rnr_heading_h5']['size']; ?>; 

		<?php  if( $smof_data['rnr_heading_h5']['style'] == 'bold' )
		{?>
		font-weight: bold; 		  
		<?php } else if( $smof_data['rnr_heading_h5']['style'] == 'bold italic' )
		{?>
		font-weight: bold; 	
		font-style: italic;	  
		<?php } else { ?>
		font-style: <?php echo $smof_data['rnr_heading_h5']['style']; ?>; 		  
		<?php } ?>

		color: <?php echo $smof_data['rnr_heading_h5']['color']; ?>;  
	    font-weight:  <?php echo $smof_data['rnr_heading_h5_font_weight']; ?>; 
	    text-transform:  <?php echo $smof_data['rnr_heading_h5_text_transform']; ?>;	
	}
	h6{ 
		font-family: <?php echo $smof_data['rnr_heading_h6']['face']; ?>, Arial, Helvetica, sans-serif !important; 
		font-size: <?php echo $smof_data['rnr_heading_h6']['size']; ?>; 

		<?php  if( $smof_data['rnr_heading_h6']['style'] == 'bold' )
		{?>
		font-weight: bold; 		  
		<?php } else if( $smof_data['rnr_heading_h6']['style'] == 'bold italic' )
		{?>
		font-weight: bold; 	
		font-style: italic;	  
		<?php } else { ?>
		font-style: <?php echo $smof_data['rnr_heading_h6']['style']; ?>; 	 
	    font-weight:  <?php echo $smof_data['rnr_heading_h6_font_weight']; ?>; 
	    text-transform:  <?php echo $smof_data['rnr_heading_h6_text_transform']; ?>;	  
		<?php } ?>

		color: <?php echo $smof_data['rnr_heading_h6']['color']; ?>; 
	}
	
	.subtitle { 
		font-family: <?php echo $smof_data['rnr_heading_subtitle']['face']; ?>, Arial, Helvetica, sans-serif !important; 
		font-size: <?php echo $smof_data['rnr_heading_subtitle']['size']; ?>; 

		<?php  if( $smof_data['rnr_heading_subtitle']['style'] == 'bold' )
		{?>
		font-weight: bold; 		  
		<?php } else if( $smof_data['rnr_heading_subtitle']['style'] == 'bold italic' )
		{?>
		font-weight: bold; 	
		font-style: italic;	  
		<?php } else { ?>
		font-style: <?php echo $smof_data['rnr_heading_subtitle']['style']; ?>; 	 
	    font-weight:  <?php echo $smof_data['rnr_heading_subtitle_font_weight']; ?>; 
	    text-transform:  <?php echo $smof_data['rnr_heading_subtitle_text_transform']; ?>;	  
		<?php } ?>

		color: <?php echo $smof_data['rnr_heading_subtitle']['color']; ?>; 
	}



.navigation li a,
.navigation.colored li a,
nav.light .main-menu a,
nav.transparent a,
nav.transparent.scroll a  {
		font-family: <?php echo $smof_data['rnr_menu']['face']; ?>, Arial, Helvetica, sans-serif; 
		font-size: <?php echo $smof_data['rnr_menu']['size']; ?>; 
		
		<?php  if( $smof_data['rnr_menu']['style'] == 'bold' )
		{?>
		font-weight: bold; 		  
		<?php } else if( $smof_data['rnr_menu']['style'] == 'bold italic' )
		{?>
		font-weight: bold; 	
		font-style: italic;	  
		<?php } else { ?>
		font-style: <?php echo $smof_data['rnr_menu']['style']; ?>; 		  
		<?php } ?>	   
	   
	   color: <?php echo $smof_data['rnr_menu']['color']; ?>;	
	   font-weight:  <?php echo $smof_data['rnr_menu_font_weight']; ?>; 
	   text-transform:  <?php echo $smof_data['rnr_menu_text_transform']; ?>;   	   	
}
.navigation li a:hover, 
.navigation li.active a ,
.navigation.colored li a:hover, 
.navigation.colored li.active a, 
.navigation li.current-menu-item a{
	   color: <?php echo $smof_data['rnr_menu_link_hover_color']; ?> !important;	   
}


.copyright {
	background: <?php echo $smof_data['rnr_footer_background']; ?> !important;
	font-family: <?php echo $smof_data['rnr_footer']['face']; ?>, Arial, Helvetica, sans-serif; 
	font-size: <?php echo $smof_data['rnr_footer']['size']; ?>; 
	
	<?php  if( $smof_data['rnr_footer']['style'] == 'bold' )
	{?>
	font-weight: bold; 		  
	<?php } else if( $smof_data['rnr_footer']['style'] == 'bold italic' )
	{?>
	font-weight: bold; 	
	font-style: italic;	  
	<?php } else { ?>
	font-style: <?php echo $smof_data['rnr_footer']['style']; ?>; 		  
	<?php } ?>	  
   
   color: <?php echo $smof_data['rnr_footer']['color']; ?>;		
}
.copyright a, .copyright .social-icons .social-icon {
	   color: <?php echo $smof_data['rnr_footer_link_color']; ?>;	   
}
.copyright a:hover {
	   color: <?php echo $smof_data['rnr_footer_link_hover_color']; ?>;	   
}

<?php if($smof_data['rnr_menu_style']=='top') { ?>
#undefined-sticky-wrapper {
     height: 0 !important;
}

.page-template-default .title, .blog .title {
	margin-top:80px;
}

.page-template-default .section, .blog .section {
	padding-top:60px;
}

<?php } ?>



<?php if($smof_data['rnr_enable_classic_title']==true) { ?>
.title h1 {
	background: none !important;
	border: none !important;
	color: inherit !important;
	box-shadow: none !important;
}

<?php } ?>




/*========== B A C K G R O U N D    S K I N S =============*/

::-moz-selection {
 background: <?php echo $smof_data['rnr_accent_color']; ?>;
}
::selection {
	background:<?php echo $smof_data['rnr_accent_color']; ?>;
}

nav.colored, nav.light.colored,
.twitter-feed-icon i,
.testimonial-icon i,
.home-gradient,
.home-parallax,
#project-navigation ul li#prevProject a:hover, 
#project-navigation ul li#nextProject a:hover,
#project-navigation ul li a:hover,
#closeProject a:hover,
.mc4wp-form input[type="submit"],
#respond input[type="submit"],
input[type="submit"],
.pagination a.previous:hover, 
.pagination a.next:hover,
.rnr-icon-middle:hover,
.service-box:hover,
.button,
.skillbar .skill-percentage,
.flex-control-nav li a:hover,
.flex-control-nav li a.flex-active,
.testimonial-slider .flex-direction-nav li a, 
.twitter-slider .flex-direction-nav li a,
.color-block,
.home1 .slabtextdone .slabtext.second-child,
.home4 .slabtextdone .slabtext.second-child,
.caption,
.copyright,
.title h1,
.service-features .img-container,
.service-features .img-container,
.view-profile,
.team-member:hover .team-desc,
.service-box .service-icon,
.modal .close,
#nav .sub-menu li.current-menu-item a, 
#nav .sub-menu li.current-menu-item a:hover, 
#nav .sub-menu li.current_page_item a, 
#nav .sub-menu li.current_page_item a:hover, 
#nav .sub-menu li .sub-menu li.current-menu-item a, 
#nav .sub-menu li .sub-menu li.current-menu-item a:hover, 
#nav .sub-menu li .sub-menu li.current_page_item a, 
#nav .sub-menu li .sub-menu li.current_page_item a:hover, 
#nav .sub-menu li a.active, #nav .sub-menu li a.active:hover {
	background-color: <?php echo $smof_data['rnr_accent_color']; ?>;
}


/*========== B O X   S H A D O W    S K I N S =============*/

.title h1,
.service-box .service-icon {
	box-shadow:0px 0px 0px 3px <?php echo $smof_data['rnr_accent_color']; ?>;
}

.tab a.selected {
    box-shadow: 0px -3px 0px 0px <?php echo $smof_data['rnr_accent_color']; ?>;
}




/*========== C O L O R    S K I N S =============*/

a,
.highlight,
nav.light .main-menu a:hover, 
nav.dark .main-menu a:hover,
nav.light .main-menu li.active a,
nav.transparent .main-menu li.active a, 
nav.dark .main-menu li.active a,
.parallax .quote i,
#filters ul li a:hover h3, 
#filters ul li a.active h3,
.post-title a:hover,
.post-tags li a:hover,
.tags-list li a:hover,
.pages li a:hover,
.home3 .slabtextdone .slabtext.second-child,
.service-box:hover .service-icon {
	color:<?php echo $smof_data['rnr_accent_color']; ?>;
}




/*========== B O R D E R    S K I N S =============*/

.pages li a.current,
.pages li a.current,
.service-features .img-container:after,
.service-box:hover .service-icon,
.callout,
blockquote p,
.pullquote.align-right,
.pullquote.align-left {
	border-color: <?php echo $smof_data['rnr_accent_color']; ?>;
}









<?php echo $smof_data['rnr_custom_css']; ?>
</style>

<?php }
add_action( 'wp_head', 'rocknrolla_custom_styles', 100 );


function rocknrolla_custom_scripts() {
global $smof_data; 
?>

<!-- CUSTOM TYPOGRAPHY STYLES -->
	
<script type="text/javascript">
jQuery.noConflict(); (function($) {				  
				  
	$(document).ready(function() {  
  
 <?php 

 	$args=array(
 	    'post_type' => 'page',
 	    'order' => 'ASC',
 	    'orderby' => 'menu_order',
 	    'posts_per_page' => '-1'
  	 );
 	$main_query = new WP_Query($args); 

 if( have_posts() ) :

     while ($main_query->have_posts()) : $main_query->the_post();
	    
	    $post_id = get_the_ID();
		
		
	if (get_post_meta($post_id, "rnr_assign_type", true) == "parallax-section") {	?>
      $('#bg<?php echo $post_id; ?>').parallax("50%", 0.6);



<?php }
   endwhile;
     endif; 
 ?>
 
    <?php if($smof_data['rnr_home_type']=="FullScreen Slider") {  ?>
	  
	jQuery(function($){
				
				$.supersized({
				
					// Functionality
					slideshow               :   1,			// Slideshow on/off
					autoplay				:   1,			// Slideshow starts playing automatically
					start_slide             :   1,			// Start slide (0 is random)
					stop_loop			   :   0,			// Pauses slideshow on last slide
					random				  :   0,			// Randomize slide order (Ignores start slide)
					slide_interval          :   10000,		// Length between transitions
					transition              :   1, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
					transition_speed		:   1000,		// Speed of transition
					new_window			  :   1,			// Image links open in new window/tab
					pause_hover             :   0,			// Pause slideshow on hover
					keyboard_nav            :   1,			// Keyboard navigation on/off
					performance			 :   1,			// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
					image_protect		   :   1,			// Disables image dragging and right click with Javascript
						   
					min_width		       :   0,			// Min width allowed (in pixels)
					min_height		      :   0,			// Min height allowed (in pixels)
					vertical_center         :   1,			// Vertically center background
					horizontal_center       :   1,			// Horizontally center background
					fit_always			  :   0,			// Image will never exceed browser width or height (Ignores min. dimensions)
					fit_portrait         	:   1,			// Portrait images will not exceed browser height
					fit_landscape		   :   0,			// Landscape images will not exceed browser width
							
					slide_links			 :   'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
					thumb_links			 :   0,			// Individual thumb links for each slide
					thumbnail_navigation    :   0,			// Thumbnail navigation
					slides 				  :   [						   
	               <?php $home_slider = $smof_data['rnr_home_slider'];
                   if ( !empty( $home_slider )) {
                      foreach( $home_slider  as $slide){ ?>
						{image : '<?php echo $slide['url'] ?>', title : '<?php echo $slide['title'].'<div class="slidedescription">'.$slide['description'].'</div>'; ?>', thumb : '', url : '#'},
					  <?php } //end foreach ?>          
                    <?php } //end homeslider ?>],		   
					progress_bar		:	0,			// Timer for each slide							
					mouse_scrub			 :	0
					
				});
		    });
  
   <?php } ?> 
	});

})(jQuery);
</script> 
<?php }


add_action( 'wp_footer', 'rocknrolla_custom_scripts', 20 );
?>