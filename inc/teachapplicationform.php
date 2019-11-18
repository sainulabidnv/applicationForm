

<div class="application aplForm">
	
    <div class="appli-head"><img src="<?php echo SS_AP_URL.'/inc/img/appli-head.jpg' ?>" /></div>
                <h2> Teacher Application Form</h2>
    
    <div class="form-sec">
    	<form method="post" name="applicationform" enctype="multipart/form-data">
		  
          
          <div class="info-cat">
          <?php if(!isset($title)) { ?>
          <div class="line-sec row">
	          
              
              <div class="col-md-4">
			    <label for="stdFristName">First Name</label>
			    <input name="stdFristName" type="text" class="form-control" id="stdFristName" >
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
	         <div class="col-md-4">
			    <label for="stdGender">Gender</label>
			    <select required name="stdGender" id="stdGender" class="form-control" >
	            	<option value="">--Gender--</option>
                    <option <?php if( $meta['stdGender'][0] == 'Male') echo' selected="selected"';  ?> value="Male">Male</option>
	                <option value="Female">Female </option>
	            </select>
	            
			  </div>
	          
	          <div class="col-md-4">
			    <label for="stdBirthDate">Date of Birth </label>
			    <div class='input-group date' id='teachedate'>
                    <input value="<?php echo date('d-m-Y', strtotime($meta['stdBirthDate'][0])) ?>" name="stdBirthDate" type="text" class="form-control"  >
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
			  </div>
	          
	          <div class="col-md-4">
			    <label for="stdHeight">Marital Status</label>
			    <div class="input-group" > 
                	<select required name="thMarital" id="thMarital" class="form-control" >
	            	<option value="">--Select--</option>
                    <option <?php if( $meta['thMarital'][0] == 'Married') echo' selected="selected"';  ?> value="Married">Married</option>
	                <option value="Single">Single </option>
	            </select>
                	
                </div>
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
			    <label for="prfdSMSPhone">District </label>
			    <input value="<?php echo $meta['thDistrict'][0]; ?>" name="thDistrict" type="text" class="form-control" id="thDistrict" >
			  </div>
              
              <div class="col-md-3">
			    <label for="fthMobileNo">Mobile No</label>
			    <input value="<?php echo $meta['fthMobileNo'][0]; ?>" name="fthMobileNo" type="text" class="form-control" id="fthMobileNo" >
			  </div>
	          
	          <div class="col-md-3">
			    <label for="mthMobileNo">Mobile No 2 </label>
			    <input value="<?php echo $meta['mthMobileNo'][0]; ?>" name="mthMobileNo" type="text" class="form-control" id="mthMobileNo" >
			  </div>
              
              
              <div class="col-md-3">
			    <label for="prfdSMSPhone">Email </label>
			    <input value="<?php echo $meta['thEmail'][0]; ?>" name="thEmail" type="text" class="form-control" id="thEmail" >
			  </div>
              
              <div class="clearfix"></div>
          </div>
          
          <div class="line-sec row">
	         
	          <div class="col-md-6">
			    <label for="stdPermenentAdress">Educational qualification</label>
			    <textarea name="thQualification" class="form-control" id="thQualification" > <?php echo $meta['thQualification'][0]; ?> </textarea>
			  </div>
              <div class="col-md-6">
			    <label for="stdResidentialAdress">Islamic Education</label>
			    <textarea name="thQualificationIsl" class="form-control" id="thQualificationIsl" > <?php echo $meta['thQualificationIsl'][0]; ?> </textarea>
			  </div>
              <div class="clearfix"></div>
          </div>
          
          
          <input value="<?php echo $meta['childPhoto'][0]; ?>" type="file" name="childPhoto" class="btn btn-primary" style="visibility:hidden" />
          </div>
          
          
          
          
		  <div > 
          	<?php wp_nonce_field( 'stdApp', 'stdAppNonce' ); ?>
            <button type="submit" class="btn btn-default">Submit</button>
          </div>
		</form>
    </div>
</div>

 <script>

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
  
    <script type="text/javascript">
  $(function () { $('#teachedate').datetimepicker({format: 'DD/MM/YYYY', viewMode: 'years', defaultDate: "01/01/2000"});  });
  </script>
  




































