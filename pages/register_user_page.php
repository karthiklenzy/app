<script>
function getdistrictid(id) {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
               document.getElementById("displaydistrictsubarea").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "<?php echo HTTP_PATH; ?>includes/getsubdistrict.php?q=" + id);
        xmlhttp.send();
   
}
</script>
<div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="row">
    			<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="<?php echo HTTP_PATH; ?>login-user">Sign up</a></li>
				    
				  </ol>
				</nav>
				
				<div class="col-md-6">
					<div class="contact-form">
						<h2>ALREADY REGISTERED?</h2>
						<h5>Login in with us for future convenience</h5>
						<ul class="font-awsome">
							<li><a href="<?php echo HTTP_PATH; ?>terms-and-conditions"><i class="fa fa-arrow-circle-right"></i>&emsp;Terms and conditions</a></li>
							<li><a href="<?php echo HTTP_PATH; ?>login-user"><i class="fa fa-arrow-circle-right"></i>&emsp;Login</a></li>
						</ul>
					</div>
					<div class="contact-form">
						<h2>REGISTER &amp; SAVE TIME!</h2>
						<h5>Register with us for future convenience</h5>
						<ul class="font-awsome">
							<li><a><i class="fa fa-arrow-circle-right"></i>&emsp;Fast &amp; Easy checkout</a></li>
							<li><a><i class="fa fa-arrow-circle-right"></i>&emsp;Easy access to your order history &amp; Status</a></li>
						</ul>
					</div>
				</div> 
  				
  				<div class="col-md-6">
				  <div class="contact-form">
				  	<h2>Sign up</h2>
					    <form method="post" onsubmit="return validate_form();">
					      <div class="row">
					    	<div class="col-md-6">
						    	<div>
							    	<span><label>First Name</label></span><span class="star"> *</span>
							    	<span><input type="text" name="firstname" class="textbox" value="<?php if (isset($firstname)) { echo $firstname; } ?>" autocomplete="off" required></span>
							    </div>
							</div>
							<div class="col-md-6">
							    
							    <div>
							    	<span><label>Last Name</label></span><span class="star"> *</span>
							    	<span><input type="text" name="lastname" class="textbox" value="<?php if (isset($lastname)) { echo $lastname; } ?>" autocomplete="off" required></span>
							    </div>
							</div>
							<div class="col-md-6">
						    	<div>
							    	<span><label>User Name</label></span><span class="star"> *</span>
							    	<span><input type="text" name="username" class="textbox" value="<?php if (isset($username)) { echo $username; } ?>" id="txtusername" autocomplete="off" required></span>
							    </div>
							</div>
							<div class="col-md-6">
							    <div>
							    	<span><label>Mobile Number</label></span><span class="star"> *</span>
							    	<span><input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="10" name="mobile" class="textbox" value="<?php if (isset($mobile)) { echo $mobile; } ?>" autocomplete="off" required></span>
							    </div>
							</div>
							<div class="col-md-6">
						    	<div>
							    	<span><label>Email</label></span><span class="star"> *</span>
							    	<span><input type="email" name="mail" class="textbox" value="<?php if (isset($mail)) { echo $mail; } ?>" autocomplete="off" required></span>
							    </div>
							</div>
							<div class="col-md-6">
							    <div>
							    	<span><label>NIC</label></span><span class="star"> *</span>
							    	<span><input type="text" maxlength="12" name="nic" class="textbox" value="<?php if (isset($nic)) { echo $nic; } ?>" autocomplete="off" required></span>
							    </div>
							</div>
							<div class="col-md-6">
								<div>
							    	<span><label>Password</label></span><span class="star"> *</span>
							    	<span><input type="password" name="password" class="textbox" autocomplete="off" required></span>
							    </div>
						    	
							</div>
							<div class="col-md-6">
							    <div>
							    	<span><label>Re-type Password</label></span><span class="star"> *</span>
							    	<span><input type="password" name="repassword" class="textbox" autocomplete="off" required></span>
							    </div>
							</div>
							<div class="col-md-6">
						    	<div>
							    	<span><label>Postal Code</label></span><span class="star"> *</span>
							    	<span><input type="text" name="postcode" class="textbox" value="<?php if (isset($postcode)) { echo $postcode; } ?>" autocomplete="off" required></span>
							    </div>
							</div>
							<div class="col-md-6">
						    	<div>
							    	<span><label>Address</label></span><span class="star"> *</span>
							    	<span><textarea name="textarea" class="textarea_hgt" rows="1" value="" autocomplete="off" required><?php if (isset($textarea)) { echo $textarea; } ?></textarea></span>
							    </div>
							</div>
						</div>
						<div class="row">
							<?php if ((isset($district)) && (isset($city))) {?>
							<div class="col-md-6">
								<span><label>District</label></span><span class="star"> *</span>
								<select class="form-control" name="selectdistrict" required="required" onchange="getdistrictid(this.value)" style="margin-bottom: 10px;">
									
									<?php for ($i=0; $i < count($select_district_sql); $i++) { ?>
									<option value="<?php echo $select_district_sql[$i]['district_id']; ?>" <?php if(isset($district)){ if($district == $select_district_sql[$i]['district_id']){ ?> selected="selected" <?php } } ?> ><i class="fa fa-shopping-cart"></i><?php echo $select_district_sql[$i]['district_name']; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-md-6" id="displaydistrictsubarea">
							 	<span><label>City</label></span><span class="star"> *</span>
								<?php if((isset($city)) && ($city != "")){ ?>
								<select class="form-control" name="selectdistrictsub" required="required">
									
									<?php for ($e = 0; $e < count($select_city_sql); $e++) { ?>
									<option value="<?php echo $select_city_sql[$e]['area_id']; ?>" <?php if(isset($city)){ if($city == $select_city_sql[$e]['area_id']){ ?> selected="selected" <?php } } ?> ><?php echo $select_city_sql[$e]['area_name']; ?></option>
									<?php } ?>
								</select>
								<?php } else{?>
								<select class="form-control" name="selectdistrictsub"  required="required">
									<option value="">-- Select --</option>
								</select>
								<?php } ?>
							</div>
							<?php } else { ?>
							<div class="col-md-6">
								<span><label>District</label></span><span class="star"> *</span>
								<select class="form-control" name="selectdistrict" required="required" onchange="getdistrictid(this.value)" style="margin-bottom: 10px;">
									<option value="" disabled="disabled" selected="selected">-- Select --</option>
									<?php for ($i=0; $i < count($get_districts); $i++) { ?>
									<option value="<?php echo $get_districts[$i]['district_id']; ?>" <?php if(isset($get_district_query_one)){ if($get_district_query_one == $get_districts[$i]['district_id']){ ?> selected="selected" <?php } } ?> ><i class="fa fa-shopping-cart"></i><?php echo $get_districts[$i]['district_name']; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-md-6" id="displaydistrictsubarea">
							 	<span><label>City</label></span><span class="star"> *</span>
								<?php if((isset($selectdistrict)) && ($selectdistrict != "")){ ?>
								<select class="form-control" name="selectdistrictsub" required="required">
									<option value="" disabled="disabled" selected="selected">-- Select --</option>
									<?php for ($e = 0; $e < count($getsubcategory_query_one); $e++) { ?>
									<option value="<?php echo $get_district_query_one[$e]['area_id']; ?>" <?php if(isset($selectdistrictsub)){ if($selectdistrictsub == $get_district_query_one[$e]['area_id']){ ?> selected="selected" <?php } } ?> ><?php echo $get_district_query_one[$e]['area_name']; ?></option>
									<?php } ?>
								</select>
								<?php } else{?>
								<select class="form-control" name="selectdistrictsub"  required="required">
									<option value="">-- Select --</option>
								</select>
								<?php } ?>
							</div>
							<?php } ?>
						</div>	
						  
						    
						   <div>
						   		<button type="submit" class="btn" name="btn-sign">Sign up</button>
						  </div>
						  <?php if(isset($_COOKIE['cookieSuccessMessage'])){ ?>
							<div class="alert alert-success alert-dismissible">
							    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							    <i class="fa fa-check"></i>&emsp;
							    <?php echo $_COOKIE['cookieSuccessMessage'] ?> 
							 </div>
							<?php } ?>
							<?php if(isset($_COOKIE['ErrorMessage'])){ ?>
							<div class="alert alert-danger alert-dismissible">
							    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							    <i class="fa fa-exclamation-circle"></i>&emsp;
							    <?php echo $_COOKIE['ErrorMessage'] ?> 
							 </div>
						<?php } ?>
					    </form>

				  </div>
  				</div>
			  </div>
		  </div>
		  <div class="heightx0"></div>		
      </div> 
  </div>
  <div id="snackbar"><i class="fa fa-times-circle"></i>&emsp;Some text some message..</div>
  <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
 	<div class="modal-dialog">

	  <!-- Modal content-->
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Error in signing up</h4>
	    </div>
	    <div class="modal-body">
	    	<ul>
	          <?php if (isset($error_message)) {
	          	echo $error_message;
	          } ?>
	      	</ul>
	    </div>
	    <div class="modal-footer">
	      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	    </div>
	  </div>
  	</div>
</div>
<script>
$('#txtusername').keydown(function(e) {
    if (e.keyCode == 32) {
        return false;
    }
});
</script>
<!-- <script>
function myFunction() {
  var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>
<script>
$(document).ready(function(){
	$("form").submit(function(){
		
		var textBox =  $.trim( $('input[type=text]').val());
		var landline = $("#landline").val().length;
		var mobile = $("#mobile").val().length;
		// var gendercheck = $('input:radio[name=radio_group_1]:checked').val();
		
  		if (textBox == ""){
	        myFunction();
	        return false;
		}
		

	});

});
</script> -->