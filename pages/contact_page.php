<div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="row">
				<div class="col-md-6">
				  <div class="contact-form" style="padding: 30px 15px 55px 15px">
				  			<?php if(isset($_COOKIE['successMessage'])){ ?>
								<div class="alert alert-success alert-dismissible">
								    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								    <i class="fas fa-check"></i>&emsp;
								    <?php echo $_COOKIE['successMessage'] ?> 
								</div>
							<?php } ?>
						  	<?php if(isset($_COOKIE['errorMessage'])){ ?>
								<div class="alert alert-danger alert-dismissible">
								    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								    <i class="fa fa-exclamation-circle"></i>&emsp;
								    <?php echo $_COOKIE['errorMessage'] ?> 
								</div>
							<?php } ?>
				  	<h2>Contact Us</h2>
					    <form action="contact-us" method="post">
					    	<div>
						    	<span><label>Name</label></span>
						    	<span><input type="text" class="textbox" name="name" value="<?php if (isset($name)) { echo $name;} ?>" required></span>
						    </div>
						    <div>
						    	<span><label>E-mail</label></span>
						    	<span><input type="email" class="textbox" value="<?php if (isset($name)) { echo $mail;} ?>" name="email" required></span>
						    </div>
						    <div>
						     	<span><label>Contact Number</label></span>
						    	<span><input type="text" class="textbox" oninput="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="10" value="<?php if (isset($name)) { echo $number;} ?>" name="number" required></span>
						    </div>
						    <div>
						    	<span><label>Message</label></span>
						    	<span><textarea name="message" value="" required><?php if (isset($message)) { echo $message;} ?></textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" value="Submit" name="btn-submit" class="myButton"></span>
						  </div>
						  	
					    </form>
				  </div>
  				</div>
				<div class="col-md-6">
					<div class="contact_info">
    	 				<h3>Find Us Here</h3>
					    	 
      				</div>
	      			<div class="company_address">
	      			
					     	<ul>
					     		<!-- <li><i class="fas fa-map-marker-alt"></i>&emsp;179/A, Highlevel Road, Pannipitiya.</li> -->
					     		<li><i class="fas fa-phone"></i>&emsp;+94 112 088 330</li>
					     		<li><i class="far fa-envelope-open"></i>&emsp;online@vendesiya.lk</li>
					     		
					     	</ul>
					</div>
				</div>
			</div>
		</div>		
    </div> 
</div>

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Invalid inputs</h4>
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
$(document).on('keypress','input','.form-control',function(e){

     if (e.which === 32 && !this.value.length)
        e.preventDefault();

    });
//  $("input").on("keypress", function(e) {
//     if (e.which === 32 && !this.value.length)
//         e.preventDefault();
// });
</script>