<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- PAGE TITLE -->
<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php global $smof_data; ?>

<!-- Mobile Specific Metas & Favicons
========================================================= -->

<?php if($smof_data['rnr_favicon_url'] != "") { ?><link rel="shortcut icon" href="<?php echo $smof_data['rnr_favicon_url']; ?>"><?php } ?>


<!-- WordPress Stuff
========================================================= -->
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<!-- Google Web Fonts -->

 <?php get_template_part( 'includes/googlefonts'); ?>

<?php wp_head(); ?>

</head>

<body <?php body_class('onepage'); ?> data-spy="scroll" data-target=".navigation">
 <div id="load"></div>
 
     <!-- START PAGE WRAP -->    
    <div class="page-wrap <?php if($smof_data['rnr_enable_dark_skin'] == true) { echo 'dark-skin'; } ?>">
    
  <!-- HEADER SECTION -->	
 

