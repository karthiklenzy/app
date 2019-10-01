<div class="main">
    <div class="content" style="height: 56vh;">
    	<div class="section group">
    		<div class="row">
    		 <div class="container">
    			<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="<?php echo HTTP_PATH;?>">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">FAQ</li>
				    
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
					<div class="faq-form">
						<ul class="font-awsome">
							<li><i class="fa fa-arrow-circle-right"></i>&emsp;<b>What is an Online Auction?</b><br>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br></li>
							<li><i class="fa fa-arrow-circle-right"></i>&emsp;<b>When is your next auction?</b><br>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br></li>
							<li><i class="fa fa-arrow-circle-right"></i>&emsp;<b>What is Open Market Value?</b><br>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br></li>
							
						</ul>
						
					</div>
				</div> 
				<div class="col-md-6">
					<div class="faq-form">
						<ul class="font-awsome">
							<li><i class="fa fa-arrow-circle-right"></i>&emsp;<b>How long does an auction last?</b><br>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br></li>
							<li><i class="fa fa-arrow-circle-right"></i>&emsp;<b>What is a reserve?</b><br>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br></li>
							<li><i class="fa fa-arrow-circle-right"></i>&emsp;<b>What is an Addendum?</b><br>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br></li>
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