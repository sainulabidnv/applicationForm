

<div class="application aplForm">
	
    <div class="appli-head"><img src="<?php echo SS_AP_URL.'/inc/img/appli-head.jpg' ?>" /></div>
                <h2> Application Form</h2>
    
    <div class="form-sec">
    	<form method="post" name="applicationform" enctype="multipart/form-data">
		  
          <div class="line-sec row">
	          
              
              <div class="col-md-4">
			    <label for="cntrDistrict">District</label>
			    
                <?php 
					$locations = get_terms( array( 'taxonomy' => 'center_cat', 'hide_empty' => false, ) );
					
				?>
                <select required name="cntrDistrict" id="cntrDistrict" class="form-control" >
	            	<option value="">--District--</option>
                    
                    <?php foreach($locations as $location){ ?>
                    
                    <option <?php if($distId == $location->term_id ) echo ' selected="selected"'; ?> value="<?php echo $location->term_id ?>"><?php echo $location->name ?></option>
                    <?php } ?>
                    
	            </select>
			  </div>
	          
	          <div class="col-md-4">
			    <label class="" for="cntrName">Center </label>
			    <select required name="cntrName" id="cntrName" class="form-control" >
	            	<option value="">--Select--</option>
                    <?php echo $centOp; ?>
	            </select>
			  </div>
	          
              <div class="clearfix"></div>
          </div>
          <div class="info-cat">
          <h3> Information of The Child</h3>
		  <?php if(!isset($title)) { ?>
          <div class="line-sec row">
	          
              
              <div class="col-md-4">
			    <label for="stdFristName">First Name</label>
			    <input name="stdFristName" type="text" class="form-control" id="stdFristName" >
			  </div>
	          
	          <div class="col-md-4">
			    <label for="stdMiddleName">Middle Name </label>
			    <input name="stdMiddleName" type="text" class="form-control" id="stdMiddleName" >
			  </div>
	          
	          <div class="col-md-4">
			    <label for="stdLasttName">Last Name Name </label>
			    <input name="stdLasttName" type="text" class="form-control" id="stdLasttName" >
			  </div>
              <div class="clearfix"></div>
          </div>
         <?php } else { ?>
         
         <div class="line-sec row">
	          <div class="col-md-4">
			    <label for="stdStatus">Status</label>
			    <select required class="form-control"  name="stdStatus" id="stdStatus">
					<option<?php if( $meta['stdStatus'][0] == 'Progressing') echo' selected="selected"';  ?> value="Progressing">Progressing</option>
                    <option<?php if( $meta['stdStatus'][0] == 'Confirmed') echo' selected="selected"';  ?> value="Confirmed">Confirmed</option>
                    <option<?php if( $meta['stdStatus'][0] == 'Rejected') echo' selected="selected"';  ?> value="Rejected">Rejected</option>
					
				</select>
			  </div>
              <div class="clearfix"></div>
          </div>
          
         <div class="line-sec row">
	          <div class="col-md-4">
			    <label for="stdFristName">Full Name</label>
			    <input value="<?php echo $title; ?>" name="stdFristName" type="text" class="form-control" id="stdFristName" >
			  </div>
              <div class="clearfix"></div>
          </div>
         <?php } ?>
         
         <div class="line-sec row">
	         <div class="col-md-3">
			    <label for="stdGender">Gender</label>
			    <select required name="stdGender" id="stdGender" class="form-control" >
	            	<option value="">--Gender--</option>
                    <option <?php if( $meta['stdGender'][0] == 'Male') echo' selected="selected"';  ?> value="Male">Male</option>
	                <option value="Female">Female </option>
	            </select>
	            
			  </div>
	          
	          <div class="col-md-3">
			    <label for="stdBirthDate">Date of Birth </label>
			    <input value="<?php echo date('d-m-Y', strtotime($meta['stdBirthDate'][0])) ?>" readonly="readonly" name="stdBirthDate" type="text" class="form-control" id="stdBirthDate" >
			  </div>
	          
	          <div class="col-md-3">
			    <label for="stdHeight">Height</label>
			    <div class="input-group" > 
                	<input value="<?php echo $meta['stdHeight'][0]; ?>" placeholder="100" name="stdHeight" type="text" class="form-control" id="stdHeight" >
                	<div class="input-group-addon">cm</div>
                </div>
			  </div>
	          
	          <div class="col-md-3">
			    <label for="stdWeight">Weight </label>
			    <div class="input-group" > 
                	<input value="<?php echo $meta['stdWeight'][0]; ?>" placeholder="50" name="stdWeight" type="text" class="form-control" id="stdWeight" >
                	<div class="input-group-addon">Kg</div>
                </div>
			  </div>
              
              
              <div class="clearfix"></div>
          </div>
          
         
          <div class="line-sec row">
	          <div class="col-md-3">
			    <label for="stdBloodGroup">Blood Group  </label>
			    <select required class="form-control"  name="stdBloodGroup" id="stdBloodGroup">
					<option>--Select--</option>
                    <option<?php if( $meta['stdBloodGroup'][0] == 'A+') echo' selected="selected"';  ?> value="A+">A+</option>
					<option<?php if( $meta['stdBloodGroup'][0] == 'A-') echo' selected="selected"';  ?> value="A-">A-</option>
					<option<?php if( $meta['stdBloodGroup'][0] == 'A') echo' selected="selected"';  ?> value="A">A</option>
					<option<?php if( $meta['stdBloodGroup'][0] == 'B+') echo' selected="selected"';  ?> value="B+">B+</option>
					<option<?php if( $meta['stdBloodGroup'][0] == 'B-') echo' selected="selected"';  ?> value="B-">B-</option>
					<option<?php if( $meta['stdBloodGroup'][0] == 'B') echo' selected="selected"';  ?> value="B">B</option>
					<option<?php if( $meta['stdBloodGroup'][0] == 'AB+') echo' selected="selected"';  ?> value="AB+">AB+</option>
					<option<?php if( $meta['stdBloodGroup'][0] == 'AB-') echo' selected="selected"';  ?> value="AB-">AB-</option>
					<option<?php if( $meta['stdBloodGroup'][0] == 'AB') echo' selected="selected"';  ?> value="AB">AB </option>
					<option<?php if( $meta['stdBloodGroup'][0] == 'O+') echo' selected="selected"';  ?> value="O+">O+</option>
					<option<?php if( $meta['stdBloodGroup'][0] == 'O-') echo' selected="selected"';  ?> value="O-">O-</option>
					<option<?php if( $meta['stdBloodGroup'][0] == 'O') echo' selected="selected"';  ?> value="O">O</option>
				</select>
			  </div>
              
              <div class="col-md-6">
			    <label for="stdLanguage">Languages known</label>
			    <input value="<?php echo $meta['stdLanguage'][0]; ?>" placeholder="Malayalam, Arabic" name="stdLanguage" type="text" class="form-control" id="stdLanguage" >
			  </div>
              
              <div class="col-md-3">
			    <label for="stdMotherRongue">Mother Tongue</label>
			    <input value="<?php echo $meta['stdMotherRongue'][0]; ?>" name="stdMotherRongue" type="text" class="form-control" id="stdMotherRongue" >
			  </div>
              
              <div class="clearfix"></div>
          </div>
          
          <div class="line-sec row">
	         
	          <div class="col-md-6">
			    <label for="stdPermenentAdress">Permenent Address</label>
			    <textarea name="stdPermenentAdress" class="form-control" id="stdPermenentAdress" > <?php echo $meta['stdPermenentAdress'][0]; ?> </textarea>
			  </div>
              <div class="col-md-6">
			    <label for="stdResidentialAdress">Residential Address</label>
			    <textarea name="stdResidentialAdress" class="form-control" id="stdResidentialAdress" > <?php echo $meta['stdResidentialAdress'][0]; ?> </textarea>
			  </div>
              <div class="clearfix"></div>
          </div>
          
	      <div class="line-sec row">    
	          <div class="col-md-3">
			    <label for="fthMobileNo">Father's Mobile No</label>
			    <input value="<?php echo $meta['fthMobileNo'][0]; ?>" name="fthMobileNo" type="text" class="form-control" id="fthMobileNo" >
			  </div>
	          
	          <div class="col-md-3">
			    <label for="mthMobileNo">Mother's Mobile No </label>
			    <input value="<?php echo $meta['mthMobileNo'][0]; ?>" name="mthMobileNo" type="text" class="form-control" id="mthMobileNo" >
			  </div>
              
              <div class="col-md-3">
			    <label for="prfdSMSPhone">Preferred Phone for SMS </label>
			    <input value="<?php echo $meta['prfdSMSPhone'][0]; ?>" name="prfdSMSPhone" type="text" class="form-control" id="prfdSMSPhone" >
			  </div>
              
              <div class="col-md-3">
			    <label for="schoolDistannce">Distance from School </label>
			    <input value="<?php echo $meta['schoolDistannce'][0]; ?>" placehloder="5.30 KM" name="schoolDistannce" type="text" class="form-control" id="schoolDistannce" >
			  </div>
              <div class="clearfix"></div>
          </div>
          
          <div class="line-sec row">    
	          <div class="col-md-4">
			    <?php if(isset($fthPhoto)) { ?> <div class="text-center"> <img src="<?php echo $fthPhoto[0]; ?>" /> </div> <?php } ?>
                <label for="fthPhoto">Photo of Father</label>
			    <input value="<?php echo $meta['fthPhoto'][0]; ?>" type="file" name="fthPhoto" class="btn btn-primary" />
			  </div>
	          
	          <div class="col-md-4">
			    <?php if(isset($fthPhoto)) { ?> <div class="text-center"> <img src="<?php echo $mthPhoto[0]; ?>" /> </div> <?php } ?>
                <label for="mthPhoto">Photo of Mother </label>
			    <input value="<?php echo $meta['mthPhoto'][0]; ?>" type="file" name="mthPhoto" class="btn btn-primary" />
			  </div>
              
              <div class="col-md-4">
			    <?php if(isset($childPhoto)) { ?> <div class="text-center"> <img src="<?php echo $childPhoto[0]; ?>" /> </div> <?php } ?>
                <label for="childPhoto">Photo of Child </label>
			    <input value="<?php echo $meta['childPhoto'][0]; ?>" type="file" name="childPhoto" class="btn btn-primary" />
			  </div>

              <div class="clearfix"></div>
          </div>
          </div>
          <div class="info-cat">
	          <h3> Information About Father/Guardian :</h3>
	          <div class="line-sec row">    
		          <div class="col-md-3">
				    <label for="fthName">Name</label>
				    <input value="<?php echo $stdFth['fthName']; ?>" name="fthName" type="text" class="form-control" id="fthName" >
				  </div>
		          
		          <div class="col-md-2">
				    <label for="fthAge">Age </label>
				    <input value="<?php echo $stdFth['fthAge']; ?>" name="fthAge" type="text" class="form-control" id="fthAge" >
				  </div>
	              
	              <div class="col-md-2">
				    <label for="fthNation">Natioanality </label>
				    <input value="<?php echo $stdFth['fthNation']; ?>" name="fthNation" type="text" class="form-control" id="fthNation" >
				  </div>
                  
                  <div class="col-md-2">
				    <label for="fthOcupation">Occupation </label>
				    <input value="<?php echo $stdFth['fthOcupation']; ?>" name="fthOcupation" type="text" class="form-control" id="fthOcupation" >
				  </div>
	              
	              <div class="col-md-3">
				    <label for="fthEducation">Educational Qualification</label>
				    <input value="<?php echo $stdFth['fthEducation']; ?>" name="fthEducation" type="text" class="form-control" id="fthEducation" >
				  </div>
	              <div class="clearfix"></div>
	          </div>
          </div>
          
          <div class="info-cat">
	          <h3> Information About Mother/Guardian :</h3>
	          <div class="line-sec row">    
		          <div class="col-md-3">
				    <label for="mthName">Name</label>
				    <input value="<?php echo $stdFth['mthName']; ?>" name="mthName" type="text" class="form-control" id="mthName" >
				  </div>
		          
		          <div class="col-md-2">
				    <label for="mthAge">Age </label>
				    <input value="<?php echo $stdFth['mthAge']; ?>" name="mthAge" type="text" class="form-control" id="mthAge" >
				  </div>
	              
	              <div class="col-md-2">
				    <label for="mthNation">Natioanality </label>
				    <input value="<?php echo $stdFth['mthNation']; ?>" name="mthNation" type="text" class="form-control" id="mthNation" >
				  </div>
                  
                  <div class="col-md-2">
				    <label for="mthOccupation">Occupation </label>
				    <input value="<?php echo $stdFth['mthOccupation']; ?>" name="mthOccupation" type="text" class="form-control" id="mthOccupation" >
				  </div>
	              
	              <div class="col-md-3">
				    <label for="mthEducation">Educational Qualification</label>
				    <input value="<?php echo $stdFth['mthEducation']; ?>" name="mthEducation" type="text" class="form-control" id="mthEducation" >
				  </div>
	              <div class="clearfix"></div>
	          </div>
          </div>
          
		  <div > 
          	<?php wp_nonce_field( 'stdApp', 'stdAppNonce' ); ?>
            <button type="submit" class="btn btn-default">Submit</button>
          </div>
		</form>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
    </div>
</div>

 <script>
	$(document).ready(function(){ //alert(123);
		$("#stdBirthDate").datepicker({ 
			 format: 'dd-mm-yyyy',
			 minDate: "-10M", 
			 maxDate: "-5M" 
		});
	
	
   

})

$(document).ready(function() {
    
        $('#cntrDistrict').change(function(){
			$('#cntrName').addClass('loading');
  		var id = $(this).val();
		   var ajaxurl = '<?php echo admin_url("admin-ajax.php", null); ?>';
          data = { action: "getcenter", id: id};     
          $.ajax({
              url: ajaxurl,
              data: data,
              type: 'post',
              success: function(response) {
                //console.log(response);  
  			  $('#cntrName').html(response);
			  $('#cntrName').removeClass('loading');
              }
          });
  		
  		return false;
		
		})
		
    });    
	
  </script>
  
  
  




































