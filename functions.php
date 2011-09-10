<?php
define('GOOGLE_ANALYTICS', '');
define('THIS_THEME_STUB', 'twentyten'); //usually the name of the folder the theme resides in, try to avoid spaces or upper case characters.



// to prevent  WP < 2.9 breaking. Also enables Feature Images.
if (function_exists('add_theme_support')) {
	add_theme_support( 'post-thumbnails' );
}


function mytheme_widgets_init() {
	
	// Define some menus, as many as you like.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', THIS_THEME_STUB ),
	) );
	
	
	
	$sidebars = array();
	
	
	//push as many as you want into the sidebars array. 
	//The names you give them will also be what you need to call in "dynamic_sidebar('THE_NAME');" to output the widgets.
	array_push($sidebars, array(
		'name' => 'BlogSidebar',
  		'description' => 'Widgets on the right hand side of the Blog Index and Blog Posts.',
	));
	
	
	
	foreach ($sidebars as $s) {
		register_sidebar($s);
	}

}
add_action( 'widgets_init', 'mytheme_widgets_init' );





function mytemplate_head() {
	global $page, $paged, $nofollow;
	
	//First the TITLE tag;
	echo("<title>");
	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	
	echo("</title>");
	
	
	//Add some nofollow if nessesary, you can set this easily on any page before the header.
	if (($nofollow === true) ) {
		echo("<META NAME='ROBOTS' CONTENT='NOINDEX, NOFOLLOW' />");	
	}
	
	
	//If you've set the analytics variable at the top of this file, add the tracking code.
	if (GOOGLE_ANALYTICS != '') {
		?>
	
    	<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', '<?=GOOGLE_ANALYTICS?>']);
		  _gaq.push(['_trackPageview']);
		
		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		
		</script>
		
		<?php 
	}
	
	
}




//An example shortcode
function example_shortcode_function_name() {
	
	echo('Hello World!');
	
}
add_shortcode('they_type_this_in_square_brackets', 'example_shortcode_function_name');



// ------------------------------------------------
// Some extra functions that are really useful.
// ------------------------------------------------

function getCurrentCatID(){
	//Probably only works inside the_loop();
  	global $wp_query;
  	if(is_category() || is_single()){
		$cat_ID = get_query_var('cat');
  	}
	
  	return $cat_ID;
}

?>