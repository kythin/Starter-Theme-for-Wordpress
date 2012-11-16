<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
	
	<!-- force IE to use standards mode, using chromeframe if it's installed -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width">

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
	
	<?php

	global $page, $paged;
	mytheme_head(); //includes the title, analytics
	
	?>
		<script>
        var tempdir = '<?=get_bloginfo('template_directory')?>';
        </script>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="<?=get_bloginfo('template_directory')?>/js/bootstrap.min.js"></script>
		<script src="<?=get_bloginfo('template_directory')?>/js/jquery.cycle.js"></script>
        <script src="<?=get_bloginfo('template_directory')?>/js/custom.js?t=<?=mktime()?>"></script>
        <script src="<?=get_bloginfo('template_directory')?>/js/fancybox/jquery.fancybox.js"></script>
        
        
        <!-- Add fancyBox - thumbnail helper -->
        <link rel="stylesheet" type="text/css" href="<?=get_bloginfo('template_directory')?>/js/fancybox/helpers/jquery.fancybox-thumbs.css?v=2.1.2" />
        <script type="text/javascript" src="<?=get_bloginfo('template_directory')?>/js/fancybox/helpers/jquery.fancybox-thumbs.js?v=2.1.2"></script>
        <!-- Add fancyBox - media helper -->
        <script type="text/javascript" src="<?=get_bloginfo('template_directory')?>/js/fancybox/helpers/jquery.fancybox-media.js?v=1.0.0"></script>
        
        
        <link href="<?=get_bloginfo('template_directory')?>/js/fancybox/jquery.fancybox.css" rel="stylesheet" />
        <link href="<?=get_bloginfo('template_directory')?>/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	
    
</head>
<body <?php body_class(); ?>>
    
    <div id="sitewrapper" class="container">
    
    
    <?php // example menu place definition ?>
    <div class="row">
    	<div class="span12">
			<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' )); ?>
		</div>
    </div>
    
    <div class="row">
        <div class="span12">
            <?php // example widget place definition ?>
            <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar') ) : else : ?>
                If nothing in this sidebar, show some text.
            <?php endif; ?>
        </div>
    </div>
    
    
    <div class="row">
    	<div class="span12">
        	<!-- Example of admin variable -->
            <?=yourtheme_welcome_message?>
        </div>
    </div>
    