<div class="main">
    <div class="content" style="height: 56vh;">
    	<div class="section group">
    		<div class="row">
    		 <div class="container">
    			<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="<?php echo HTTP_PATH; ?>login-user">Sign in / Sign up</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Terms and conditions</li>
				    
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
						<h2>Identification</h2>
						<h5> All purchasers are required to have a Bidder’s Number to bid and shall supply Skip Domingos Auctions with their full name, address and telephone number. A form of picture identification is required to verify information.</h5>
						<!-- <ul class="font-awsome">
							<li><a href="#"><i class="fa fa-arrow-circle-right"></i>&emsp;Terms and conditions</a></li>
							<li><a href="<?php echo HTTP_PATH; ?>register-user"><i class="fa fa-arrow-circle-right"></i>&emsp;Register</a></li>
						</ul> -->
					</div>
					<div class="contact-form">
						<h2>Addition to or withdrawal from sale</h2>
						<h5>The Auctioneer reserves the right to withdraw from sale any of the items listed or to sell at this auction items not listed, and also reserves the right to group one or more lots into one or more selling lots or to subdivide into two or more selling lots. Whenever the best interest of the seller will be served, the auctioneer reserves the right to sell all of the items listed in bulk.</h5>
						<!-- <ul class="font-awsome">
							<li><a href="#"><i class="fa fa-arrow-circle-right"></i>&emsp;Fast &amp; Easy checkout</a></li>
							<li><a href="#"><i class="fa fa-arrow-circle-right"></i>&emsp;Easy access to your order history &amp; Status</a></li>
						</ul> -->
					</div>
				</div> 
				<div class="col-md-6">
					<div class="contact-form">
						<h2>Dispute between bidders</h2>
						<h5>If any dispute arises between two or more bidders, the auctioneer may decide the same or may immediately put the lot up for sale again, and resell to the highest bidder. The decision of the auctioneer shall be final and absolute.</h5>
						<!-- <ul class="font-awsome">
							<li><a href="#"><i class="fa fa-arrow-circle-right"></i>&emsp;Terms and conditions</a></li>
							<li><a href="<?php echo HTTP_PATH; ?>register-user"><i class="fa fa-arrow-circle-right"></i>&emsp;Register</a></li>
						</ul> -->
					</div>
					<div class="contact-form">
						<h2>Manner of payment</h2>
						<h5>All lots are to be paid in full by cash, approved check, Mastercard, Visa, or Debit Card before the close of the auction. Auctioneer reserves the right to hold merchandise until a buyer’s check clears and reserves the right to not accept a check. There will be a $15.00 service charge for any check returned from the bank for any reason.</h5>
						<!-- <ul class="font-awsome">
							<li><a href="#"><i class="fa fa-arrow-circle-right"></i>&emsp;Fast &amp; Easy checkout</a></li>
							<li><a href="#"><i class="fa fa-arrow-circle-right"></i>&emsp;Easy access to your order history &amp; Status</a></li>
						</ul> -->
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