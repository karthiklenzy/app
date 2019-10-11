
<script>
function getsublocation(catid) {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
               document.getElementById("getsublocation").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "<?php echo HTTP_PATH; ?>includes/getsublocation.php?q=" + catid);
        xmlhttp.send();
   
}
</script>
<div class="main" style="padding-bottom: 120px">
    <div class="content">
    	<div class="section group">
    		<div class="row">
    			<nav aria-label="breadcrumb">
					  <ol class="breadcrumb" style="margin: 10px 10px 20px 10px!important;">
					    <li class="breadcrumb-item"><a href="<?php echo HTTP_PATH; ?>user-profile">Dashboard</a></li>
					    <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
					  </ol>
				</nav>
				<?php if(isMobile())  { 
  					include DOC_ROOT.'includes/profile_menu.php'; ?>
  					<div class="heightx1"></div>
  				<?php 
  				}
  				?>
		    	  <div class="col-md-8 col-sm-8 col-xs-12">
				    <div class="contact-form grid-style" style="margin: 0px;">
				  	  <h2>User Details</h2>
						<?php if(isset($_COOKIE['cookieSuccessMessage'])){ ?>
						<div class="alert alert-success alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-check"></i>&emsp;
							<?php echo $_COOKIE['cookieSuccessMessage'] ?> 
						</div>
						<?php } ?>
						<?php if(isset($_COOKIE['cookieErrorMessage'])){ ?>
						<div class="alert alert-danger alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i class="fa fa-exclamation-circle"></i>&emsp;
							<?php echo $_COOKIE['cookieErrorMessage'] ?> 
						</div>
						<?php } ?>

					    <form method="post">
					     <div class="col-md-6 col-xs-12 col-sm-10" style="">
					      <?php
					    	if ($user_details) {
					    	for ($i=0; $i < count($user_details); $i++) { 
					      ?>
					    	<div>
						    	<span><label>Name</label></span>
						    	<span><input type="text" value="<?php echo $user_details[$i]['user_name'];?>" name="user_new" class="textbox" id="space" required></span>
						    </div>
						    <div>
						    	<span><label>E-mail</label></span>
						    	<span><input type="email" value="<?php echo $user_details[$i]['user_email']; ?>" class="textbox" id="space" disabled></span>
						    </div>
						    <div>
						    	<span><label>Contact Number</label></span>
						    	<span><input type="text" value="<?php echo $user_details[$i]['user_phone']; ?>" name="new_number" class="textbox" oninput="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="10" id="space" required></span>
						    </div>
						    <div>
						    	<span><label>Address</label></span>
						    	<span><input type="text" value="<?php echo $user_details[$i]['user_address_line_one']; ?>" name="new_address" class="textbox" required></span>
						    </div>

						    <div>
						    	<span><label>NIC</label></span>
						    	<span><input type="text" value="<?php echo $user_details[$i]['user_nic_number']; ?>" name="new_nic" id="space" class="textbox" disabled></span>
						    </div>
						    <?php if (isset($user_details[$i]['user_province']) != "") {?>
						    <div style="display: none;">
						    	<span><label>District</label></span>
						    	<!-- <span><input type="text" value="<?php echo $district_name; ?>" name="district_name_new" class="textbox" disabled></span> -->
						    	<select class="form-control" name="selectlocation" required="required" onchange="getsublocation(this.value)">
										<option value="" disabled="disabled" selected="selected">-- Select --</option>
										<?php for ($i=25; $i < 30; $i++) { ?>
											<option name="district" value="<?php echo $getlocation_query[$i]['district_id']; ?>" <?php if(isset($user_details[0]['user_province'])){ if($user_details[0]['user_province'] == $getlocation_query[$i]['district_id']){ ?> selected="selected" <?php } } ?> ><?php echo $getlocation_query[$i]['district_name']; ?></option>


										<?php } ?>
									</select>
						    </div>
						    <div id="getsublocation" style="display: none;">
						    	<span><label>City</label></span>
						    	<?php if((isset($getsubarea_query_one)) && ($getsubarea_query_one != "")){ ?>
										<select class="form-control" name="selectsubarea" required="required">
											<option value="" disabled="disabled" selected="selected">-- Select --</option>
											<?php for ($e = 0; $e < count($getsubarea_query_one); $e++) { ?>
												<option value="<?php echo $getsubarea_query_one[$e]['area_id']; ?>" <?php if(isset($user_details[0]['user_city'])){ if($user_details[0]['user_city'] == $getsubarea_query_one[$e]['area_id']){ ?> selected="selected" <?php } } ?> ><?php echo $getsubarea_query_one[$e]['area_name']; ?></option>
											<?php } ?>
										</select>
									<?php }?>
						    </div>

						    <?php } else{ ?>
						    <table class="tableClassFsd col-md-12">   
						<tbody>

							<tr>
								<td width="39%">Location : </td>
								
								<td width="49%">
									<select class="form-control" name="selectlocation" required="required" onchange="getsublocation(this.value)">
										<option value="" disabled="disabled" selected="selected">-- Select --</option>
										<?php for ($i=0; $i < count($getlocation_query); $i++) { ?>
											<option name="district" value="<?php echo $getlocation_query[$i]['district_id']; ?>" <?php if(isset($selectlocation)){ if($selectlocation == $getlocation_query[$i]['district_id']){ ?> selected="selected" <?php } } ?> ><?php echo $getlocation_query[$i]['district_name']; ?></option>


										<?php } ?>
									</select>
								</td>
								<td>&nbsp;</td>
							</tr>
							<tr id="getsublocation">
								<td>Location Sub Area : </td>
								<td>
									<?php if((isset($selectlocation)) && ($selectlocation != "")){ ?>
										<select class="form-control" name="selectsubarea" required="required">
											<option value="" disabled="disabled" selected="selected">-- Select --</option>
											<?php for ($e = 0; $e < count($getsubarea_query_one); $e++) { ?>
												<option value="<?php echo $getsubarea_query_one[$e]['sub_category_id']; ?>" <?php if(isset($selectsubarea)){ if($selectsubarea == $getsubarea_query_one[$e]['area_id']){ ?> selected="selected" <?php } } ?> ><?php echo $getsubarea_query_one[$e]['area_name']; ?></option>
											<?php } ?>
										</select>
									<?php } else{?>
									<select class="form-control" name="selectsubarea"  required="required">
										<option value="">-- Select --</option>
									</select>
									<?php } ?>
								</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td colspan="4">&nbsp;</td>
							</tr>
							
						</tbody>						
					</table>
					<?php } ?>
					<?php }}?>
						    <div>
						   		<button type="submit" class="btn-style" name="btn-up">Update</button>
						  	</div>
						  </div>
						</form>
				  	</div>
  				</div>
  				
  				<?php if(!isMobile())  { 
  					include DOC_ROOT.'includes/profile_menu.php';
  				}
  				?>
  				
			</div>
		</div>		
    </div> 
</div>