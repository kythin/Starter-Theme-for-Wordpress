<?php
/*
Made using https://gist.github.com/1478047
*/

if ($_POST['sort_rules']) {$_SESSION['sort_rules'] = $_POST['sort_rules'];}

/*  to make the price-dropdown-sorter widget work, I added the following to the top of the 
//	"wpsc_product_sort_order_query_vars" function in wp-ecommerce/wpsc-core/wpsc-functions.php ~ L-733
//
//	if ($_REQUEST['wpsc_sort_by']) 
//		$orderby = $_REQUEST['wpsc_sort_by'];
//
*/

if ($_SESSION['sort_rules'] == 'price_low') {
	$_REQUEST['wpsc_sort_by'] = 'price';
}
elseif ($_SESSION['sort_rules'] == 'price_high') {
	$_REQUEST['wpsc_sort_by'] = 'price';
}
else {
	$_REQUEST['wpsc_sort_by'] = 'name';
}



function order_displayed_products($order) {
	
	if ($_SESSION['sort_rules'] == 'price_low') {
		return 'ASC';
	}
	elseif ($_SESSION['sort_rules'] == 'price_high') {
		return 'DESC';
	}
	elseif ($_SESSION['sort_rules'] == 'name_asc') {
		return 'ASC';
	}
	elseif ($_SESSION['sort_rules'] == 'name_desc') {
		return 'DESC';
	}
	else {
		return 'ASC';
	}
}
add_filter( 'wpsc_product_order'  , 'order_displayed_products' );





class Sort_WPE_Widget extends WP_Widget {
  function Sort_WPE_Widget() {

     $widget_opts = array(
      'classname' => 'sort_wpe_widget',
      'description' => 'Shows a list of options to sort the current page of wp-ecommerce plugins',
    );
    
    $this->WP_Widget('sort_wpe_widget', 'Sort WP-Ecommerce Listbox', $widget_opts);  
  }

  // widget outputs the widget content. 
  function widget($args, $instance) {
		//global $wpsc_query_vars;
		//print_d($wpsc_query_vars);
		
  ?>
	  <li class="widget">
			<h2 class="widgettitle"><?=$instance['title']?></h2>
          <form name="sort_products" id="sort_products" action="" method="post">
              <select name="sort_rules" id="sort_rules">
              	<option value="">Sort By...</option>
                <option value="price_low" <?=($_SESSION['sort_rules']=='price_low')?' selected':''; ?>>Price (lowest first)</option>
                <option value="price_high" <?=($_SESSION['sort_rules']=='price_high')?' selected':''; ?>>Price (highest first)</option>
                <option value="name_asc" <?=($_SESSION['sort_rules']=='name_asc')?' selected':''; ?>>Name (A-Z)</option>
                <option value="name_desc" <?=($_SESSION['sort_rules']=='name_desc')?' selected':''; ?>>Name (Z-A)</option>
              </select>
              <input type="submit" value="Sort" />
          </form>
  	  </li>
    <script>
    
	$(document).ready(function(){
		$('form#sort_products input').hide();	
		$('select#sort_rules').change(function(){
			$('form#sort_products').submit();	
		});	
		
	});
    
    </script>
    
  <?php  
  }

  // displays the form which shows on the Widgets management panel. 
  function form($instance) {
    $output = '';
    $instance = (array) $instance;

    $instance = wp_parse_args($instance, array('number' => 2 ));

    $title = esc_attr($instance['title']);

    ?>
    
    
    <p><label for="<?php echo $this->get_field_id('title'); ?>">Widget Title</label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo ($title); ?>" /></p>
    
	
	<?php
    echo $output;
  }

  // updates the widget options when saved. 
  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    return $instance; 
  }
}

// Load and Register the widget
add_action('widgets_init', 'sort_wpe_widget_load_widgets');

function sort_wpe_widget_load_widgets() {
  register_widget('Sort_WPE_Widget');  
} 