<?php 
	wp_enqueue_style( 'skyrenormal-bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.min.css' );
	wp_enqueue_script('skyrenormal-bootstrapjs', get_template_directory_uri().'/inc/js/bootstrap.min.js', array('jquery') );
 ?>


<div class="member-field-holder">

    
    
    <div class="form-group" style="padding:10px 0">
		<div class="col-md-4 "><?php _e('Show in home (Featured image required)', 'school'); ?></div>
		<div class="col-md-8"> <input type="checkbox" name="apllication_home_check" <?php if ($meta['apllication_home_check'][0] == 1 ) { echo 'checked="checked"'; } ?> value="1"> </div>
		<div class="clearfix"></div>
	</div>
   
  
  
  <div class="form-group">
        	
        	<div class="col-md-9">  <button class="addImage btn btn-primary">Add Images </button> </button> <button class="scpt_delete_item btn btn-danger">Delete Selected <?php echo $option['name']  ?> </button></div>
        	<div class="clearfix"></div>
        </div>
  
  <table class="table table-striped skyreapllication"> 
  	<thead> 
    	<tr> <th># </th> <th>Images </th> <th>Title</th> <th>Description</th>  </tr> 
    </thead>
    <tbody class="apllicationbody"> 
    <?php 
	if (!empty($meta_img[0])) { 
	  $cnt = count($meta_img[0]['file']);
	  for ($i = 0; $i < $cnt; $i++) { 
	  
	  $img = wp_get_attachment_image( $meta_img[0]['file'][$i], array('50', '50'), array( "class" => "img-responsive" ) );

		?>
        	<tr> 
              <td> <input type="checkbox"  class="scpt_check" /> </td>
              <td> <?php echo $img; ?><input type="hidden" name="image[file][]" value="<?php echo $meta_img[0]['file'][$i] ?>" /></td> 
              <td><input class="form-control" type="text" name="image[title][]" value="<?php echo $meta_img[0]['title'][$i] ?>" /></td> 
              <td> <textarea class="form-control" name="image[description][]"></textarea><?php echo $meta_img[0]['description'][$i] ?></td>
            </tr>
        
        <?php
		
		} 
	
	}
	?>	
        
        <!--<tr> <td> <img src="" /><input type="hidden" name="image['file'][]" value="" /></td> <td><input type="text" name="title[]" value="" /></td> <td> <textarea name="description[]"></textarea></td></tr>-->
     </tbody> 
  </table>
    
</div>

<?php 

$attachment_id = 151;

 
//echo wp_get_attachment_image( $attachment_id, array('50', '50'), array( "class" => "img-responsive" ) );

$js = '{"id":151,"title":"23-470x606","filename":"23-470x606.jpg","url":"http://192.168.1.2/projects/zahra/wp-content/uploads/2017/03/23-470x606.jpg","link":"http://192.168.1.2/projects/zahra/vission/23-470x606/","alt":"","author":"1","description":"","caption":"","name":"23-470x606","status":"inherit","uploadedTo":150,"date":"2017-03-06T13:31:06.000Z","modified":"2017-03-06T13:31:06.000Z","menuOrder":0,"mime":"image/jpeg","type":"image","subtype":"jpeg","icon":"http://192.168.1.2/projects/zahra/wp-includes/images/media/default.png","dateFormatted":"March 6, 2017","nonces":{"update":"60666c9b7c","delete":"20f534f710","edit":"db4651e6db"},"editLink":"http://192.168.1.2/projects/zahra/wp-admin/post.php?post=151&action=edit","meta":false,"authorName":"admin","uploadedToLink":"http://192.168.1.2/projects/zahra/wp-admin/post.php?post=150&action=edit","uploadedToTitle":"Vission","filesizeInBytes":55139,"filesizeHumanReadable":"54 KB","height":606,"width":470,"orientation":"portrait","sizes":{"thumbnail":{"height":150,"width":150,"url":"http://192.168.1.2/projects/zahra/wp-content/uploads/2017/03/23-470x606-150x150.jpg","orientation":"landscape"},"medium":{"height":260,"width":202,"url":"http://192.168.1.2/projects/zahra/wp-content/uploads/2017/03/23-470x606-202x260.jpg","orientation":"portrait"},"full":{"url":"http://192.168.1.2/projects/zahra/wp-content/uploads/2017/03/23-470x606.jpg","height":606,"width":470,"orientation":"portrait"}},"compat":{"item":"","meta":""}}';

$obj = json_decode($js);

echo '<pre>';
//print_r($obj);