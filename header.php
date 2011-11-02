<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
<?php

	global $page, $paged;
	mytemplate_head(); //includes the title, analytics
	
	?>

	<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <script language="javascript" src="<?=get_bloginfo('template_directory')?>/js/custom.js"></script>
    
    <script type="text/javascript" language="javascript">
	$(document).ready(function() {
		

		
		
	});
		
	
	</script>
    
</head>
<body <?php body_class(); ?>>
    
    <div id="sitewrapper">
    
    
    <?php // example menu place definition ?>
    <?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' )); ?>
	
    
    <?php // example widget place definition ?>
    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar') ) : else : ?>
	<?php endif; ?>