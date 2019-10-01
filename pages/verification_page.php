<div class="main">
    <div class="content" style="height: 56vh;">
    	<div class="section group">
    		<div class="row">
    		 <div class="container">
    			<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="<?php echo HTTP_PATH; ?>login-user">Verification</a></li>
				    
				  </ol>
				</nav>
				<div class="col-md-6">
					<div class="contact-form">
						<h2>NOT YET REGISTERED?</h2>
						<h5>Register with us for future convenience</h5>
						<ul class="font-awsome">
							<li><a href="#"><i class="fa fa-arrow-circle-right"></i>&emsp;Terms and conditions</a></li>
							<li><a href="<?php echo HTTP_PATH; ?>register-user"><i class="fa fa-arrow-circle-right"></i>&emsp;Register</a></li>
						</ul>
					</div>
					<div class="contact-form">
						<h2>REGISTER &amp; SAVE TIME!</h2>
						<h5>Register with us for future convenience</h5>
						<ul class="font-awsome">
							<li><a href="#"><i class="fa fa-arrow-circle-right"></i>&emsp;Fast &amp; Easy checkout</a></li>
							<li><a href="#"><i class="fa fa-arrow-circle-right"></i>&emsp;Easy access to your order history &amp; Status</a></li>
						</ul>
					</div>
				</div> 
				<div class="col-md-6">
					  <div class="contact-form" style="padding: 25px 15px 0px 15px;">
					  		<h2>Verification code</h2>
					  		<h4>Default verification code <?php echo $_SESSION['smsverification']; ?></h4>
						    <form method="post">
						    	<div>
							    	<span><label>4 Digit Code</label></span><span class="star"> *</span>
							    	<span><input type="text" name="verif_code" class="verify-code" maxlength="4" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required></span>
							    </div>
							    
							    <div>
							   		<button type="submit" class="btn" name="btn-proceed"><i class="fa fa-qrcode"></i>&emsp;Proceed</button>
							  	</div>
							  
								
						    </form>
						    <?php if(isset($_COOKIE['cookieErrorLogMessage'])){ ?>
								<div class="alert alert-danger alert-dismissible" style="width: 60% !important;">
								    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								    <i class="fa fa-exclamation-circle"></i>&emsp;
								    <?php echo $_COOKIE['cookieErrorLogMessage'] ?> 
								</div>
							<?php } ?>
						    <ul class="font-awsome" style="background: white;">
								<li><a href="#"><i class="fa fa-arrow-circle-right"></i>&emsp;Resend Code</a></li>
								<li><a href="#"><i class="fa fa-arrow-circle-right"></i>&emsp;Contact Service</a></li>
							</ul>
						    
					  </div>
  				</div>
  				<!-- <div class="col-md-4"></div> -->
  				 </div>
			  </div>
		  </div>		
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