<div class="main" style="">
    <div class="content">
    	<div class="section group">
    		<div class="row">
    			<nav aria-label="breadcrumb">
				  <ol class="breadcrumb" style="margin: 10px 10px 20px 10px!important;">
				    <li class="breadcrumb-item"><a href="<?php echo HTTP_PATH; ?>user-profile">Dashboard</a></li>
				    <li class="breadcrumb-item" aria-current="page">Change password</li>
				    
				  </ol>
				</nav>
				<div class="col-md-8 col-sm-8">
				  	<div class="contact-form" style="margin: 0">
				  		<?php if(isset($_COOKIE['cookieSuccessMessage'])){ ?>
							<div class="alert alert-success alert-dismissible">
							    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							    <i class="fa fa-check"></i>&emsp;
							    <?php echo $_COOKIE['cookieSuccessMessage'] ?> 
							 </div>
							<?php } ?>
							<?php if(isset($_COOKIE['cookieErrorMessage'])){ ?>
							<div class="alert alert-danger alert-dismissible">
							    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							    <i class="fa fa-exclamation-circle"></i>&emsp;
							    <?php echo $_COOKIE['cookieErrorMessage'] ?> 
							</div>
						<?php } ?>
				  	<h2>Password Change</h2>
					    <form method="post">
					      <div style="width: 50%;">
					    	<div>
						    	<span><label>Old Password</label></span>
						    	<span><input type="password" name="password" value="" class="textbox" id="" required></span>
						    </div>
						    <div>
						    	<span><label>New Password</label></span>
						    	<span><input type="password" value="" name="password_new" class="textbox" required></span>
						    </div>
						    <div>
						    	<span><label>Re Type New Password</label></span>
						    	<span><input type="password" value="" name="pasword_two" class="textbox" required></span>
						    </div>
						    <div>
						   		<button type="submit" class="btn-style" name="btn-update">Update</button>
						  	</div>
						  </div>
						</form>
				  	</div>
  				</div>
  				
  				<?php
  				include_once DOC_ROOT.'includes/profile_menu.php';
  				 ?>
  				
			</div>
		</div>		
    </div> 
</div>
<div class="heightx2"></div>
<div class="heightx2"></div>