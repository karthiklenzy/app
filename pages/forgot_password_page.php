<div class="main">
    <div class="content" style="height: auto;">
    	<div class="section group">
    		<div class="row">
    		 <div class="container">
    			<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="<?php echo HTTP_PATH; ?>forgot-password">Forgot Password</a></li>
				    
				  </ol>
				</nav>
				<!-- After verification added -->
				<div class="row">
					<div class="col-md-12">
					<?php if(isset($_COOKIE['verifyMessage'])){ ?>
						<div class="alert alert-success alert-dismissible" style="margin: 0 10px;">
						    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <i class="fa fa-exclamation-circle"></i>&emsp;
						    <?php echo $_COOKIE['verifyMessage'] ?> 
						</div>
					<?php } ?>
					</div>
				</div>
				<!-- // After verification added -->
				<div class="col-md-6">
					<div class="contact-form">
						<h2>ALREADY REGISTERED?</h2>
						<h5>Sign in with us for future convenience</h5>
						<ul class="font-awsome">
							<li><a href="<?php echo HTTP_PATH; ?>terms-and-conditions"><i class="fa fa-arrow-circle-right"></i>&emsp;Terms and conditions</a></li>
							<li><a href="<?php echo HTTP_PATH; ?>register-user"><i class="fa fa-arrow-circle-right"></i>&emsp;Register</a></li>
						</ul>
					</div>
					<div class="contact-form">
						<h2>LOGIN &amp; SAVE TIME!</h2>
						<h5>Sign in with us for future convenience</h5>
						<ul class="font-awsome bullet-style">
							<li><a> Fast &amp; Easy checkout</a></li>
							<li><a> Easy access to your order history &amp; Status</a></li>
						</ul>
					</div>
				</div> 
				<div class="col-md-6">
					  <div class="contact-form" style="padding: 25px 15px 0px 15px;">
					  		<h2>Forgot Password</h2>
					  		<form method="post">
						    	
							    <div>
							    	<span><label>Your Email</label></span><span class="star"> *</span>
							    	<span><input type="email" name="valid_mail" class="textbox" required></span>
							    </div>
							    
							    
							   	<div>
							   		<button type="submit" class="btn" name="btn-submit"><i class="fa fa-at"></i>&emsp;Submit</button>
							  	</div>
							  
								
						    </form>
						    <?php if(isset($_COOKIE['cookieSuccessMessage'])){ ?>
								<div class="alert alert-success alert-dismissible" style="width: 85%;">
								    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								    <i class="fa fa-exclamation-circle"></i>&emsp;
								    <?php echo $_COOKIE['cookieSuccessMessage'] ?> 
								</div>
							<?php } ?>
						    <?php if(isset($_COOKIE['cookieErrorMessage'])){ ?>
								<div class="alert alert-danger alert-dismissible" style="width: 85%;">
								    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								    <i class="fa fa-exclamation-circle"></i>&emsp;
								    <?php echo $_COOKIE['cookieErrorMessage'] ?> 
								</div>
							<?php } ?>
						    <ul class="font-awsome" style="background: white;">
								<li><a href="<?php echo HTTP_PATH; ?>login-user"><i class="fa fa-arrow-circle-right"></i>&emsp;Login</a></li>
								<li><a href="<?php echo HTTP_PATH; ?>register-user"><i class="fa fa-arrow-circle-right"></i>&emsp;Register now</a></li>
							</ul>
						    
					  </div>
  				</div>
  				<!-- <div class="col-md-4"></div> -->
  				 </div>
			  </div>
		  </div>
		  <div class="heightx1"></div>		
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
	      <h4 class="modal-title">Error in password change</h4>
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