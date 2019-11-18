<?php



function filevalid(){

	/*foreach ($_FILES as $file => $key){

	 	if(($_FILES[$file]['size'] == 0) and (!isset($_GET['id']))) {
			if (($_FILES[$file]['type'] != 'image/jpeg') && ($_FILES[$file]['type'] != 'image/jpg') && $_FILES[$file]['type'] != 'image/png') { return "Invalid File type, Please try to upload Images";}
			if ($_FILES[$file]['size'] > 524288 ) { return "Max file size is 500 KB";}
		}
	 }*/
	
	if ( !wp_verify_nonce( @$_POST['stdAppNonce'], 'stdApp' ) )return 'Invalid nonce';
	return 1;
	}

function skyreapllicationform($arg){



wp_register_style('ssap_front_style', SS_AP_URL . '/inc/css/style.css', array(), ss_ap_version());
wp_print_styles('ssap_front_style');

wp_register_style('jquery-ui-style', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
wp_print_styles('jquery-ui-style');
wp_enqueue_script('jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js');
//wp_enqueue_script('ajaxurl', admin_url( 'admin-ajax.php' ));


 //if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
 if(isset( $arg['type'])) $type = $arg['type']; else $type = 1;
 
  $centOp = '';
  if( (current_user_can('editor') || current_user_can('administrator')) && isset($_GET['id'])) {
	  
	$id = $_GET['id'];
	$title = get_the_title( $id ); 
	$meta = get_post_meta( $id );
	
	if(isset( $meta['type'][0]) and $meta['type'][0] == 1) { $type = 1;} else if(isset( $meta['type'][0]) and $meta['type'][0] == 2)  $type = 2;
	
	$stdFth = unserialize($meta['stdFather'][0]); 
	$stdMth = unserialize($meta['stdMother'][0]);
	
	$fthPhoto = wp_get_attachment_image_src($meta['fthPhoto'][0]);
	$mthPhoto = wp_get_attachment_image_src($meta['mthPhoto'][0]);
	$childPhoto = wp_get_attachment_image_src( $meta['childPhoto'][0] );
	
		
	$district = wp_get_post_terms( $meta['unitId'][0], 'center_cat' );
	$distId = $district[0]->term_id;

	if($distId !='') {
	
	$args = array( 'post_type' => 'centers', 'tax_query' => array( array( 'taxonomy' => 'center_cat', 'field' => 'id', 'terms' => $distId  )));
	
	$query = new WP_Query( $args );
	while ( $query->have_posts() ) {
  	$query->the_post();
  	$centOp .= '<option  '. ( get_the_id() == $meta['unitId'][0] ?  'selected="selected"' : '') .' value="'.  get_the_id() .'">'.  get_the_title().'</option>';
 }
	
	
	wp_reset_query() ;
		}
	
//		  
	  
	  }
  
  
  if (isset( $_POST['stdAppNonce']))
  	{
		
		 	
			
        //if ( !current_user_can( 'edit_skyreapllication', $post_id ) ) return;
		if(filevalid()==1){
		
		$metafield =  array(
			'stdStatus'=> isset($_POST['stdStatus']) ? sanitize_text_field($_POST['stdStatus']) : 'Progressing',
			'type'=> $type,
			'unitId'=>sanitize_text_field($_POST['cntrName']),
			'stdFullName'=>sanitize_text_field($_POST['stdFullName']).' '.sanitize_text_field($_POST['stdMiddleName']).' '.sanitize_text_field($_POST['stdLasttName']),  
			'stdGender'=>sanitize_text_field($_POST['stdGender']),
			'stdBirthDate'=> date( 'Y-m-d H:i:s', strtotime($_POST['stdBirthDate']) ),
			'stdHeight'=>floatval ($_POST['stdHeight']),
			'stdWeight'=>floatval ($_POST['stdWeight']),
			'stdBloodGroup'=>sanitize_text_field($_POST['stdBloodGroup']),
			'stdLanguage'=>sanitize_text_field($_POST['stdLanguage']),
			'stdMotherRongue'=>sanitize_text_field($_POST['stdMotherRongue']),
			'stdPermenentAdress'=>sanitize_text_field($_POST['stdPermenentAdress']),
			'stdResidentialAdress'=>sanitize_text_field($_POST['stdResidentialAdress']),
			'fthMobileNo'=>sanitize_text_field($_POST['fthMobileNo']),
			'mthMobileNo'=>sanitize_text_field($_POST['mthMobileNo']),
			'prfdSMSPhone'=>sanitize_text_field($_POST['prfdSMSPhone']),
			'stdFather'=>array('fthName'=>sanitize_text_field($_POST['fthName']), 'fthAge'=>sanitize_text_field($_POST['fthAge']), 'fthNation'=>sanitize_text_field($_POST['fthNation']), 'fthOcupation'=>sanitize_text_field($_POST['fthOcupation']), 'fthEducation'=>sanitize_text_field($_POST['fthEducation']) ),
			'stdMother'=>array('mthName'=>sanitize_text_field($_POST['mthName']), 'mthAge'=>sanitize_text_field($_POST['mthAge']), 'mthNation'=>sanitize_text_field($_POST['mthNation']), 'mthOccupation'=>sanitize_text_field($_POST['mthOccupation']), 'mthEducation'=>sanitize_text_field($_POST['mthEducation']) ),
			
		);
		
		$teachmetafield =  array(
			'stdStatus'=> isset($_POST['stdStatus']) ? sanitize_text_field($_POST['stdStatus']) : 'Progressing',
			'type'=> $type,
			'stdFullName'=>sanitize_text_field($_POST['stdFullName']).' '.sanitize_text_field($_POST['stdLasttName']),  
			'stdGender'=>sanitize_text_field($_POST['stdGender']),
			'stdBirthDate'=> date( 'Y-m-d H:i:s', strtotime($_POST['stdBirthDate']) ),
			'stdPermenentAdress'=>sanitize_text_field($_POST['stdPermenentAdress']),
			'stdResidentialAdress'=>sanitize_text_field($_POST['stdResidentialAdress']),
			'fthMobileNo'=>sanitize_text_field($_POST['fthMobileNo']),
			'mthMobileNo'=>sanitize_text_field($_POST['mthMobileNo']),
			
			'thMarital'=>sanitize_text_field($_POST['thMarital']),
			'thDistrict'=>sanitize_text_field($_POST['thDistrict']),
			'thEmail'=>sanitize_text_field($_POST['thEmail']),
			'thQualification'=>sanitize_text_field($_POST['thQualification']),
			'thQualificationIsl'=>sanitize_text_field($_POST['thQualificationIsl']),
		);
		
		$my_post = array(
	    
	    'post_status'   => 'publish',
	    'post_author'   => 1,
	    'post_type' => 'skyreapllication',
		'post_title' =>  sanitize_text_field( $_POST['stdFristName']).' '.sanitize_text_field( $_POST['stdMiddleName']).' '.sanitize_text_field( $_POST['stdLasttName']),

		//'meta_input' => $metafield
		
	);
	
		if($type == 2) {$my_post['meta_input'] = $teachmetafield; } else $my_post['meta_input'] = $metafield ;
	
	




if(isset($id)) { $my_post['ID'] = $id;  wp_update_post( $my_post ); $post_id = $id;}
 else { $post_id = wp_insert_post( $my_post ); }

	if (!function_exists('wp_generate_attachment_metadata')){
		require_once(ABSPATH . "wp-admin" . '/includes/image.php');
		require_once(ABSPATH . "wp-admin" . '/includes/file.php');
		require_once(ABSPATH . "wp-admin" . '/includes/media.php');
	}
	 if ($_FILES) {
			
			
			if($type == 1) {
			
				if( isset($_FILES['fthPhoto']) && $_FILES['fthPhoto']['error'] == UPLOAD_ERR_OK) {
					
					
					$attach_id = media_handle_upload( 'fthPhoto', $post_id );
					
					if ($attach_id > 0){
				  	$oldimg = get_post_meta($post_id,'fthPhoto'); 
					wp_delete_attachment( $oldimg[0] );
					
					update_post_meta($post_id, 'fthPhoto', $attach_id);
					}	
				}
				
				if( isset($_FILES['mthPhoto']) && $_FILES['mthPhoto']['error'] == UPLOAD_ERR_OK) {
					
					
					$attach_id = media_handle_upload( 'mthPhoto', $post_id );
					
					if ($attach_id > 0){
					$oldimg = get_post_meta($post_id,'mthPhoto'); 
					wp_delete_attachment( $oldimg[0] );
					
				  	update_post_meta($post_id, 'mthPhoto', $attach_id);
					}	
				}
			}
			if( isset($_FILES['childPhoto']) && $_FILES['childPhoto']['error'] == UPLOAD_ERR_OK) {
				
				$attach_id = media_handle_upload( 'childPhoto', $post_id );
				
				if ($attach_id > 0){
				$oldimg = get_post_meta($post_id,'childPhoto'); 
				wp_delete_attachment( $oldimg[0] );
				
			  	update_post_meta($post_id, 'childPhoto', $attach_id);
				}	
			}
			
			echo '<div class="alert alert-success text-center"> Your Application hasbeen submited for Admin review, <a href="'.get_permalink($post_id).'?k='.applkey($post_id).'"> Click here</a> to check status </div>'; exit;
		} 
			  
	}else 
	{
		echo filevalid();
		}
		
    }

 
 if($type == 2) { require_once(SS_AP_DIR . '/inc/teachapplicationform.php'); }
 else { require_once(SS_AP_DIR . '/inc/applicationform.php'); }

}


add_shortcode('skyreapllicationform', 'skyreapllicationform');

