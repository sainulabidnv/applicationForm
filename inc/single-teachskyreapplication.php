<?php
/**
 * The Template for displaying all single posts.
 *
 * @package skyrenormal
 */

get_header(); 

wp_register_style('ssap_style', SS_AP_URL . '/inc/css/style.css', array(), ss_ap_version());
wp_print_styles('ssap_style');
if(isset($_GET['k'])) $key = $_GET['k']; else $key ='invalid';
 

if( !(current_user_can('editor') || current_user_can('administrator') || applkey(get_the_ID())== $key )) { die('Sorry, Permission Denied');  }


//wp_enqueue_script('skyre-colorbox', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.6.4/jquery.colorbox-min.js', array('jquery') );
?>
	<div id="primary" class="content-area ">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();
		
		$meta = get_post_meta( get_the_ID() );
		
		$stdFth = unserialize($meta['stdFather'][0]); 
		$stdMth = unserialize($meta['stdMother'][0]);
		
		$fthPhoto = wp_get_attachment_image_src($meta['fthPhoto'][0]);
		$mthPhoto = wp_get_attachment_image_src($meta['mthPhoto'][0]);
		$childPhoto = wp_get_attachment_image_src($meta['childPhoto'][0]);
		
		
		
		?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="aplView <?php echo strtolower($meta['stdStatus'][0]);?>"> <div class="applStatus"> <?php echo $meta['stdStatus'][0]==''? "Progressing":$meta['stdStatus'][0]; ?></div>
						
		        <div class="appli-head"><img src="<?php echo SS_AP_URL.'/inc/img/appli-head.jpg' ?>" /></div>
                <h1> Teacher Application Form</h1>
                
                <div class="aplPhotSec">
                	<div class="col-md-4"> <img src="<?php echo $childPhoto[0]; ?>" /> <h3> Applicant </h3> </div>
                    <div class="clearfix"></div>
                </div>
                
                <div class="aplStdDetails">
                	
                    <div class="fildgrp">
                    	<div class="col-md-2 lbl"> Name </div>
                    	<div class="col-md-10"> <?php the_title(); ?> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="fildgrp">
                    	<div class="col-md-2 lbl"> Gender</div>
                    	<div class="col-md-4"> <?php echo $meta['stdGender'][0] ?> </div>
                        <div class="col-md-2 lbl"> Date of Birth</div>
                    	<div class="col-md-4"> <?php echo date('d-m-Y', strtotime($meta['stdBirthDate'][0])) ?> </div>
                        
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="fildgrp">
                    	<div class="col-md-2 lbl"> Marital Status </div>
                        <div class="col-md-4"> <?php echo $meta['thMarital'][0].' - '.$meta['thMarital'][0] ?> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    
                    <div class="fildgrp">
                        <div class="col-md-2 lbl"> Permenent Address</div>
                    	<div class="col-md-4"> <?php echo $meta['stdPermenentAdress'][0] ?> </div>
                        <div class="col-md-2 lbl"> Residential Address </div>
                        <div class="col-md-4"> <?php echo $meta['stdResidentialAdress'][0] ?> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="fildgrp">
                        <div class="col-md-2 lbl">Phone 1</div>
                    	<div class="col-md-4"> <?php echo $meta['fthMobileNo'][0] ?> </div>
                        <div class="col-md-2 lbl">Phone 2 </div>
                        <div class="col-md-4"> <?php echo $meta['mthMobileNo'][0] ?> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="fildgrp">
                        <div class="col-md-2 lbl"> District</div>
                    	<div class="col-md-4">  <?php echo $meta['thDistrict'][0] ?> </div>
                        <div class="col-md-2 lbl"> Email  </div>
                    	<div class="col-md-4">  <?php echo $meta['thDistrict'][0] ?> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="fildgrp">
                        <div class="col-md-2 lbl"> Educational Qualification</div>
                    	<div class="col-md-4"> <?php echo $meta['thQualification'][0] ?> </div>
                        <div class="col-md-2 lbl"> Islamic Education </div>
                        <div class="col-md-4"> <?php echo $meta['thQualificationIsl'][0] ?> </div>
                        <div class="clearfix"></div>
                    </div>
                    
                </div>
                
                
                
                
                <div class="aplFthDetails"> 
                  <div class="fildgrp">
                        <div class="col-md-2 lbl"> Application Link  </div>
                    	<div class="col-md-10"> <?php  echo get_permalink().'?k='.applkey(get_the_ID()); ?> </div>
                        
                        <div class="clearfix"></div>
                    </div>
                </div>

		        <div class="col-md-8"> 
		          <h1></h1>
		          
		          
		        </div>
		        <div class="clearfix"></div>
		        
		        <div class="apllication-images">
		        	<?php 
					$meta_img = get_post_meta( get_the_ID(), 'skyreapllication' );
					
					?>
                    
                     <?php 
						if (!empty($meta_img[0])) { 
						  $cnt = count($meta_img[0]['file']);
						  for ($i = 0; $i < $cnt; $i++) { 
						  
						  $img = wp_get_attachment_image( $meta_img[0]['file'][$i], array('390', '300'), array( "class" => "apllication-thumb" ) );
						  $largeimg = wp_get_attachment_image_src( $meta_img[0]['file'][$i], array('700','700') );
					//print_r($largeimg);
							?>
					        	<!--<tr> <td> <?php echo $img; ?><input type="hidden" name="image[file][]" value="<?php echo $meta_img[0]['file'][$i] ?>" /></td> <td><input type="text" name="image[title][]" value="<?php echo $meta_img[0]['title'][$i] ?>" /></td> <td> <textarea name="image[description][]"></textarea><?php echo $meta_img[0]['description'][$i] ?></td></tr>
-->					        <div class="col-md-3"> <a class="group1" href="<?php echo $largeimg[0]; ?>" >  <?php echo $img; ?> </a> </div>
					        <?php
							
							} 
						
						}
						?>	
                    
                    
                    
		            <div class="clearfix"></div>
		        </div>
		        
		        
		        
			</div>
		</article>
        
        <?php 

		endwhile; // end of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

?>
<script> 

	$(document).ready(function(){ 
	$(".group1").colorbox({rel:'group1'});
	 })

</script>