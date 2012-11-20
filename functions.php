<?php

//Get the theme options
global $options;
if (is_array($options)) {
	foreach ($options as $value) {
		if (get_settings( $value['id'] ) === FALSE) { 
			define($value['id'],$value['std']);
		} else { 
			define($value['id'],get_settings( $value['id'] )); 
		}
	}
}


include_once('functions-admin.php');

include_once('widgets/example_widget.php');






// to prevent  WP < 2.9 breaking. Also enables Feature Images.
if (function_exists('add_theme_support')) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 200, 200, true ); // Normal post thumbnails
	add_image_size( 'hero', 500, 9999 ); //New definition of a thumbnail size.
	add_image_size( 'admin-thumb', 100, 9999 ); //New definition of a thumbnail size.
}



function mytheme_widgets_init() {
	
	// Define some menus, as many as you like.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation' ),
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





function mytheme_head() {
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
	if (defined('OPTION_gacode') && (OPTION_gacode != '')) {
		?>
	
    	<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', '<?=OPTION_gacode?>']);
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



/* Style the login page */

function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_bloginfo( 'template_directory' ) ?>/images/login_logo.png);
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


function my_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );





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



// THUMBNAILS TO ADMIN POST VIEW
// from http://voodoopress.com/2011/03/display-a-thumbnail-in-your-admin-panel-post-list/

add_filter('manage_posts_columns', 'posts_columns', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);

function posts_columns($defaults){
    $defaults['voodoo_post_thumbs'] = __('Thumbs');
    return $defaults;
}

function posts_custom_columns($column_name, $id){
	if($column_name === 'voodoo_post_thumbs'){
        echo the_post_thumbnail( 'admin-thumb' );
    }
}

function print_d($obj, $suppressOutput=false) {
    $str = "<pre>".htmlentities(print_r($obj, true))."</pre>";
    if (!$suppressOutput) echo $str;
    return $str;
}


?>