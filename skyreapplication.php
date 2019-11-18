<?php
/*
Plugin Name: Skyre Application
Plugin URI: http://skyresoft.com/
Description: Simple galleries created by Skyresoft.
Version: 1.0
Author: Sainul
Author URI: http://skyresoft.com/
License: No license
*/


define('SS_AP_DIR', WP_PLUGIN_DIR . "/" . plugin_basename(dirname(__FILE__)));
define('SS_AP_URL', plugins_url(plugin_basename(dirname(__FILE__))));
define('SS_AP_NAME', plugin_basename(dirname(__FILE__)));
define('get_the_ID', 'cBiQjLMw7wiN)NE7xH9yHD^yB%%Rr5o~6ulxdYb5H52D=]q');

add_image_size( 'apllication-thumb', 150, 150, true );
//add_image_size( 'apllication-pup', 700, 700, true );

function ss_ap_version() {  return '1.0';  }
function applkey($id) { return md5(get_the_ID.md5($id)) ; };

register_activation_hook(__FILE__,'skyreapllication');
function skyreapllication(){
	global $wp_version;
	if(version_compare($wp_version, "3.2.1", "<")) {
		deactivate_plugins(basename(__FILE__));
		wp_die("This plugin requires WordPress version 3.2.1 or higher.");
	}
}


/*function change_link( $permalink, $post ) {
    echo 132;
	if( $post->post_type == 'skyreapllication' ) { // assuming the post type is video
        $permalink = home_url( 'video?id='.$post->ID );
    }
    return $permalink;
}
add_filter('post_type_link',"change_link",10,2);
*/


add_filter( 'intermediate_image_sizes', 'appli_image_sizes', 999 );
function appli_image_sizes( $image_sizes ){
    $slider_image_sizes = array( 'thumbnail' ); 
    // for ex: $slider_image_sizes = array( 'thumbnail', 'medium' );
    return $slider_image_sizes;
}

//==============Cusotm columns========

function appli_custom_columns( $columns ) {
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'featured_image' => 'Image',
        'title' => 'Name',
        /*'comments' => '<span class="vers"><div title="Comments" class="comment-grey-bubble"></div></span>',*/
        'status' => 'Status',
		'date' => 'Date'
		
		
     );
	 
	if(isset($_GET['type']) && $_GET['type']=2) {$columns['district'] = 'District'; }
	else { $columns['center'] = 'Center'; }
    return $columns;
}

//==========Custom Status

function remove_quick_edit( $actions ) {
unset($actions['inline hide-if-no-js']);
return $actions;
}

add_filter('post_row_actions','remove_quick_edit',10,1);


//================Custom Filter =============

add_action( 'restrict_manage_posts', 'appli_center_filter' );

function appli_center_filter(){
	if ($_GET['post_type'] == 'skyreapllication'){
	global $wpdb;
    $querystr = " SELECT $wpdb->posts.ID, $wpdb->posts.post_title  FROM $wpdb->posts WHERE $wpdb->posts.post_type = 'centers' AND $wpdb->posts.post_status = 'publish' ORDER BY $wpdb->posts.post_date DESC ";
	$cntrs = $wpdb->get_results($querystr, OBJECT);
	$current_v = isset($_GET['center'])? $_GET['center']:'';
	$current_s = isset($_GET['stdStatus'])? $_GET['stdStatus']:'';
		 ?>
        <select name="center">
        <option value="">Filter By</option>
        <?php 
		foreach($cntrs as $cntr) {
			if($cntr->ID ==  $current_v) { echo '<option selected="selected" value="'.$cntr->ID.'">'.$cntr->post_title.'</option>'; }
			else {echo '<option  value="'.$cntr->ID.'">'.$cntr->post_title.'</option>'; }
			}
		?> </select>
        <select name="stdStatus">
        	<option value="">Filter Status</option>
            <option<?php if( $current_s == 'Progressing') echo' selected="selected"';  ?> value="Progressing">Progressing</option>
            <option<?php if( $current_s == 'Confirmed') echo' selected="selected"';  ?> value="Confirmed">Confirmed</option>
            <option<?php if( $current_s == 'Rejected') echo' selected="selected"';  ?> value="Active">Rejected</option>
        </select>  <?php
    }
}

add_filter( 'parse_query', 'appli_filter_query' );
function appli_filter_query( $query ){
    global $pagenow;
    
	if ( $_GET['post_type'] == 'skyreapllication' && is_admin() && $pagenow=='edit.php' && isset($_GET['type']) && $_GET['type'] == 2) {
        $query->query_vars['meta_key'] = 'type';
        $query->query_vars['meta_value'] = 2;
    }
	else if ( $_GET['post_type'] == 'skyreapllication' && is_admin() && $pagenow=='edit.php') {
		$query->query_vars['meta_key'] = 'type';
        $query->query_vars['meta_value'] = 1;
		
		
		}
	
	if ( $_GET['post_type'] == 'skyreapllication' && is_admin() && $pagenow=='edit.php' && isset($_GET['center']) && $_GET['center'] != '') {
        $query->query_vars['meta_key'] = 'unitId';
        $query->query_vars['meta_value'] = $_GET['center'];
    }
	
	if ( $_GET['post_type'] == 'skyreapllication' && is_admin() && $pagenow=='edit.php' && isset($_GET['stdStatus']) && $_GET['stdStatus'] != '') {
        $query->query_vars['meta_key'] = 'stdStatus';
        $query->query_vars['meta_value'] = $_GET['stdStatus'];
    }
	
	
}



function appli_columns_data( $column, $post_id ) {
    
	$meta = get_post_meta( $post_id  );
	switch ( $column ) {
    case 'featured_image':  $childPhoto = wp_get_attachment_image_src($meta['childPhoto'][0]); echo '<img style="height:50px;" src="'.$childPhoto[0].'" />';
	break;
	
	case 'center':  echo get_the_title( $meta['unitId'][0] );
	break;
	
	case 'status': echo $meta['stdStatus'][0] == "" ? 'Progressing' : $meta['stdStatus'][0]  ;
	break;
	
	case 'district': echo $meta['thDistrict'][0] ;
	break;
	
	
    }
}
add_filter('manage_skyreapllication_posts_columns' , 'appli_custom_columns');
add_action( 'manage_skyreapllication_posts_custom_column' , 'appli_columns_data', 10, 2 ); 



//=========custom template

function get_custom_post_type_template($single_template) {
     global $post;
	 
	 $meta = get_post_meta($post->ID );
	
	 if($meta['type'][0] == 2) {
     	if ($post->post_type == 'skyreapllication') { $single_template = SS_AP_DIR . '/inc/single-teachskyreapplication.php'; }
	 } else {
		 if ($post->post_type == 'skyreapllication') { $single_template = SS_AP_DIR . '/inc/single-skyreapplication.php'; }
		 }
     return $single_template;
}
add_filter( 'single_template', 'get_custom_post_type_template' );

//==================================

require_once(SS_AP_DIR . '/shortcodes.php');

////=============Centre section ===================

//=========custom Taxonomy

function center_taxonomy() {
	// create a new taxonomy
	
	register_taxonomy(
        'center_cat',
        'centers',
        array(
            'labels' => array(
                'name' => 'Location',
                'add_new_item' => 'Add New Location',
                'new_item_name' => "New Locations"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
}
add_action( 'init', 'center_taxonomy' );



/* Add Centers Menu */
function centerspost(){

	$labels = array(
    'name'               => 'Centers',
    'singular_name'      => 'Center',
    'add_new'            => 'Add Center',
    'add_new_item'       => 'Add New Center',
    'edit_item'          => 'Edit Center',
    'new_item'           => 'New Center',
    'all_items'          => 'All Center',
    'view_item'          => 'View Center',
    'search_items'       => 'Search Center',
    'not_found'          => 'No Center found',
    'not_found_in_trash' => 'No Center found in Trash',
    'parent_item_colon'  => '',
    'menu_name'          => 'Centers'
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'center' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 4,
	'menu_icon'          => 'dashicons-id',
	'taxonomies'          => array( 'center_cat' ),
    'supports'           => array( 'title',  'taxonomy')
  );

  register_post_type( 'centers', $args );
}

add_action( 'init', 'centerspost' );

add_action('wp_ajax_getcenter', 'getcenter');
add_action('wp_ajax_nopriv_getcenter', 'getcenter');
function getcenter() {
    

	$args = array(
	'post_type' => 'centers',
	'tax_query' => array(
	    array(
	    'taxonomy' => 'center_cat',
	    'field' => 'id',
	    'terms' => $_POST['id']
	     )
	  )
	);
	
	$loop = new WP_Query($args);
	
     if($loop->have_posts()) {
       
        while($loop->have_posts()) : $loop->the_post();
            
			echo '<option value="'.get_the_id().'">'.get_the_title().'</option>';
			//echo get_the_title();
			
        endwhile;
     } 
	
	//$data = $_POST['demo'];
    
    die();
}//===================================

/* Add Application Menu */
function skyreapllication_menu(){

	$labels = array(
    'name'               => 'Applications',
    'singular_name'      => 'Application',
    'add_new'            => 'Add Application',
    'add_new_item'       => 'Add New Application',
    'edit_item'          => 'Edit Application',
    'new_item'           => 'New Application',
    'all_items'          => 'Student Application',
    'view_item'          => 'View Application',
    'search_items'       => 'Search Application',
    'not_found'          => 'No Application found',
    'not_found_in_trash' => 'No Application found in Trash',
    'parent_item_colon'  => '',
    'menu_name'          => 'Applications'
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'application' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 4,
	'menu_icon'          => 'dashicons-id',
	'taxonomies'          => array( 'products' ),
    'supports'           => array( 'title', /*'editor',*/  'thumbnail')/*,
	'_edit_link' 		 => '../application-form?id=%d'*/
  );
  
  
  
  if(isset($_GET['type']) && $_GET['type'] ==2) { $args['_edit_link'] = '../teacher-training-application?id=%d'; } else { $args['_edit_link'] = '../application-form?id=%d';}

  register_post_type( 'skyreapllication', $args );
  

  
  
  
}

add_action( 'init', 'skyreapllication_menu' );


/*function center_taxonomy() {
	// create a new taxonomy
	
	register_taxonomy(
        'center_cat',
        'centers',
        array(
            'labels' => array(
                'name' => 'Location',
                'add_new_item' => 'Add New Location',
                'new_item_name' => "New Locations"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
}
add_action( 'init', 'center_taxonomy' );

*/


/*add_action('init', 'my_admin_menu'); 
function my_admin_menu() { 
    add_submenu_page('edit.php?post_type=skyreapllication', 'Teacher Application', 'Teacher Application', 'manage_options', 'edit.php?type=2&post_type=skyreapllication'); 
}*/

/*class SkyreApplicationPostMeta
    {
	  	function __construct() {
	  		add_action('add_meta_boxes', array($this, 'skyre_apllication_meta_boxs'));
	  		add_action('save_post', array($this, 'save_skyre_apllication_meta_data'), 10, 3);
	  		
	  	}
	  
	  	function skyre_apllication_meta_boxs() {
	  
	  		add_meta_box(
	  			'Application',
	  			__('Application Info', 'apllication' ),
	  			array($this,'skyre_apllication_meta_callbacks'),
	  			'skyreapllication',
	  			'normal',
	  			'high');
	  	}
	  	
	  	function skyre_apllication_meta_callbacks($post){
	  		
	  		global $my_meta;
			
	  		//wp_nonce_field( $my_meta->nonceText(), 'apllication' );
	  		$meta = get_post_meta( $post->ID );
			$meta_img = get_post_meta( $post->ID, 'skyreapllication' );
			//echo '<pre>';
			//print_r($meta_img);
	  		wp_enqueue_script('ssap_function', SS_AP_URL . '/admin/js/function.js', array(), ss_ap_version());
			
			wp_register_style('ssap_style', SS_AP_URL . '/admin/css/style.css', array(), ss_ap_version());
			wp_print_styles('ssap_style');
			
	  		
			//inclued admin file upload section
			require_once(SS_AP_DIR . '/admin/theme/form.php');

	  		
	  	}
	  			
	function save_skyre_apllication_meta_data($post_id, $post, $update) {

            if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

            global $my_meta;

            //if ( !wp_verify_nonce( @$_REQUEST['tlp_nonce'], $TLPteam->nonceText() ) )return;

            // Check permissions
            if ( $_GET['post_type'] )
            {
                if ( !current_user_can( 'edit_'.$_GET['post_type'], $post_id ) ) return;
            }

            if ( 'skyreapllication' != $post->post_type ) return;

            if ( isset( $_REQUEST['apllication_home_check'] ) ) {
                update_post_meta( $post_id, 'apllication_home_check', 1 );
            } else  update_post_meta( $post_id, 'apllication_home_check', 0 );

           update_post_meta( $post_id, 'skyreapllication', $_REQUEST['image'] );
		   
		   //echo '<pre>';
		   //print_r($_REQUEST);
		   //exit;
        }

		
	}
	
	if( is_admin() )
    $my_meta = new SkyreApplicationPostMeta();*/
