<?php ?>
<div class="row" style="margin: 0;">
		<nav aria-label="breadcrumb" class="bread-crumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="<?php echo HTTP_PATH; ?>">Home</a></li>
		    <li class="breadcrumb-item"><a href="<?php echo HTTP_PATH; ?>shop?category=<?= $product_catagory_id; ?>"><?php echo $catagory_name; ?></a></li>
		    <li class="breadcrumb-item"><a href="<?php echo HTTP_PATH; ?>shop?category=<?= $product_catagory_id; ?>&subid=<?php echo $product_sub_catagory_id; ?>"><?php echo $sub_catagory_name; ?></a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?php echo $product_name; ?></li>
		  </ol>
		</nav>
		<?php if(isset($_COOKIE['SuccessMessage'])){ ?>
			<div class="alert alert-success alert-dismissible" style="margin: 10px 10px 0px 10px;">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<i class="fa fa-check"></i>&emsp;
				<?php echo $_COOKIE['SuccessMessage']; ?> 
			</div>
			<?php } ?>
			<?php if(isset($_COOKIE['ErrorMessage'])){ ?>
			<div class="alert alert-danger alert-dismissible" style="margin: 10px 10px 0px 10px;">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<i class="fa fa-exclamation-circle"></i>&emsp;
				<?php echo $_COOKIE['ErrorMessage']; ?> 
			</div>
		<?php } ?>
		<?php include 'includes/category_menu.php'; ?>
		<div class="col-md-9 col-sm-8 col-xs-12">
			<div class="product-details">
				<div class="col-md-6 col-xs-12">
					<div class="demo">
					    <ul id="lightSlider">
					    <?php if ($selected_product_sql) {
					    	for ($i=0; $i < count($selected_product_sql); $i++) {?>
					        <li data-thumb="<?php echo HTTP_PATH.$selected_product_sql[$i]['product_main_img']; ?>">
					            <img src="<?php echo HTTP_PATH.$selected_product_sql[$i]['product_main_img']; ?>" />
					        </li>

					    <?php 
					    if ($selected_product_sql[$i]['product_images'] != "") {
					     	$myString = $selected_product_sql[$i]['product_images'];
								$myArray = explode(',', $myString);
								foreach($myArray as $my_Array){ ?>
								 
							<li data-thumb="<?php echo HTTP_PATH.$my_Array; ?>">
					            <img src="<?php echo HTTP_PATH.$my_Array; ?>" />
					        </li>   
								 
					     <?php }}}} ?>
					        
					    </ul>
					</div>
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12 pro-heading">
					<div class="pro-div">
						<?php if ($selected_product_sql) {
							for ($x=0; $x < count($selected_product_sql); $x++) { 
								$product_code = $selected_product_sql[$x]['product_id']; ?>

							<h3><?php echo $selected_product_sql[$x]['product_name']; ?></h3>
							

								<div class="price">
										<p>
										<?php if ($selected_product_sql[$x]['product_current_price'] != "-1") { ?>
											<span>Rs. <?php echo number_format($selected_product_sql[$x]['product_current_price']); ?>
											</span>
										<?php } else { ?>
										<span>Rs. <?php echo "0"; ?>
											</span>
										<?php } ?>	
										</p>
										
										<div class="col-md-6 col-sm-6 nopadding-val">
											<h5><i class="fa fa-sort-amount-up"></i>&emsp;Total Bids: <span><?php echo gettotalbids($selected_product_sql[$x]['product_id']); ?></span></h5>
											<h5><i class="fa fa-tags"></i>&emsp;Product Code : <span><?php echo $selected_product_sql[$x]['product_id']; ?></span></h5>
											<h5><i class="fa fa-stopwatch"></i>&emsp;End Time: <span><?php echo substr($selected_product_sql[$x]['product_bid_ends_on'], 10, 15); ?></span></h5>

											<h5 class="mypro" style="margin: 25px 0;">
												<span class="label label-large label-pink arrowed-right">Your Product</span>
								    		</h5>
											
										</div>
										<div class="col-md-6 col-sm-6 nopadding-val">
											<h5><i class="fa fa-eye"></i>&emsp;Total Views: <span><?php echo $selected_product_sql[$x]['product_views']; ?></span></h5>
											
											<h5><i class="fa fa-calendar-times"></i>&emsp;End Date: <span><?php echo substr($selected_product_sql[$x]['product_bid_ends_on'], 0, 10); ?></span></h5>
											<?php if ($product_count != "0") { ?>
											<h5><i class="fa fa-list-ol"></i>&emsp;Unit counts: <span><?php echo $selected_product_sql[$x]['product_count']; ?></span></h5>
											<?php } ?>
										</div>
										<div class="col-md-6 nopadding-val">
											
										</div>
										
								</div>
								<div class="bidding">
									<form method="post">
										<div class="custom-qty">
											<h5 class="bid-padding"><i class="fa fa-hand-holding-usd fa-lg"></i>&emsp;Bid: (Rs.)</h5>
											<?php if ($selected_product_sql[$x]['product_current_price'] != "-1") {?>
												<input type="hidden" name="hiddencurrentprice" id="hiddencurrentprice" value="<?php echo $selected_product_sql[$x]['product_current_price']; ?>">
												<input type="hidden" name="hiddenpricefloor" id="hiddenpricefloor" value="<?php echo $pricefloor; ?>">
												<input type="hidden" name="hiddenbiddiff" id="hiddenbiddiff" value="<?php echo $bid_margin; ?>">
												<input type="hidden" name="hiddenresprice" id="hiddenresprice" value="<?php echo $selected_product_sql[$x]['product_initial_price']; ?>">
											<?php } else { ?>
												<input type="hidden" name="" id="" value="">
											<?php } ?>
											<div class="col-md-6 col-sm-6 nopadding-val">
												<?php if ($selected_product_sql[$x]['product_current_price'] != "-1") {?>
												<input type="text" class="textbox-bid" name="thebid" id="thebid" maxlength="12" value="<?php echo $displaybidamount; ?>" title="Bid" class="input-text qty" readonly="readonly" />

												<button  type="button" class="increase items" id="plustheprice" title="Increase the bid">
													<i class="fa fa-plus"></i>
												</button>
												<button type="button" class="reduced items" id="minustheprice" title="Decrease the bid">
													<i class="fa fa-minus"></i>
												</button>
											<?php } else {?>
												<input type="text" class="textbox-bid" name="thebid" oninput="this.value=this.value.replace(/[^0-9]/g,'');" id="thebid" maxlength="8" value="" title="Bid" class="input-text qty" style="width: 85% !important;" required/>
											<?php } ?>
											</div>
											
											<div class="col-md-6 col-sm-6 nopadding-val">
												<div class="share-desc">
													<?php if (isset($_SESSION['vendesiya_user_id'])) {?>
														<button type="submit" name="btnplaceabid" title="Place a bid" class="btn btn-primary" value="Place A Bid"><i class="fas fa-cart-plus"></i>&emsp;Place A Bid</button>
													<?php } else {  ?>
														<a href="<?php echo HTTP_PATH; ?>login-user?redirect_url=<?php echo $CURRENT_URL; ?>" class="btn btn-primary">
															<i class="fas fa-cart-plus"></i>&emsp;LOGIN TO PLACE BID
														</a>
													<?php } ?>
												</div>
												<div class="clear"></div>
											</div>
											
										</div>
									</form>
								</div>
								
								
								<div class="col-md-6 col-xs-12 nopadding-val">
								  <ul class="review">
								  <?php if (isset($_SESSION['vendesiya_user_id']) && $_SESSION['vendesiya_user_id'] != $product_published_user_id) {?>
									<li>
									<?php if (getfavproduct($product_id) == "") {?>
									  <a href="<?= HTTP_PATH.'product-preview?product-url='.$product_url; ?>&favitem=1" ><span class="favme dashicons dashicons-heart <?php echo getfavproduct($product_id); ?>"></span>
										&emsp;Add to Fav
									  </a>
									  <?php } else { ?>
									  <a href="<?= HTTP_PATH.'product-preview?product-url='.$product_url; ?>&favitemremove=<?php echo $product_id; ?>" ><span class="favme dashicons dashicons-heart <?php echo getfavproduct($product_id); ?>"></span>
										&emsp;Remove from favourite
									  </a>
									<?php } ?>
									</li>
									<?php } ?>
									<li class="report">
									<a href="" data-toggle="modal" data-target="#myModalreport">
									  <span class="favme dashicons dashicons-dismiss active"></span>&emsp;Report This Ad
									  </a>
								    </li>
								    
								  </ul>
								</div>
									
					</div>
					<?php }} ?>
				</div>

			</div>
			<div class="col-md-12 col-sm-12">
				<div id="horizontalTab">
					<ul class="resp-tabs-list" style="margin-top: 25px !important;">
						<li><i class="fa fa-camera"></i>&emsp;Product Details</li>
						<li><i class="fa fa-star"></i>&emsp;Product Reviews</li>
						<div class="clear"></div>
					</ul>
					<div class="resp-tabs-container">
						<div class="product-desc" id="style-5">
							<?php if ($selected_product_sql) {
							 	for ($z=0; $z < count($selected_product_sql); $z++) { 
							 	$product_catagory = $selected_product_sql[0]['category_id']; ?>
							 	<?php echo $selected_product_sql[$z]['product_description']; ?>

							<?php }} ?>
							<!-- Product Specification data -->
							<ul class="product-bullet">
								<?php if ($spec_data) { 
									for ($v=0; $v < count($spec_data); $v++) { ?>
									<li>
									<p><span><?php echo $spec_data[$v]['spec_type_name']." : ";?></span><?php echo $spec_data[$v]['spec_value'];?></p>	
									</li>
								<?php }} ?>	
							</ul>
							<!--End  Product Specification data -->					
						</div>
						<div class="review" id="style-5">
							<?php if ($review_query) {
							  		for ($q=0; $q < count($review_query); $q++){ ?>
							<div class="your-review">
							  	 <!-- <h3>Rates for this product</h3> -->
							  	<div class="review-head"><i class="fa fa-user"></i><?= " ".$review_query[$q]['review_added_user_name']; ?>
							  	 &emsp;&emsp;<i class="fa fa-calendar-alt"></i><?= " ".$review_query[$q]['review_date']; ?>&emsp;&emsp;
							  	 &emsp;&emsp;<i class="fa fa-clock"></i><?= " ".$review_query[$q]['review_time']; ?>
							  	 </div>
							  	 <?= $review_query[$q]['review_message']; ?>
							  	  
							</div>
							<?php }} else { ?>
							<div class="alert alert-info alert-dismissible alert-coment" style="width: 100%;">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<i class="fa fa-exclamation-circle"></i>&emsp;No comments
							</div>
							<?php } ?>
							<h4 class="tinymce-heading">Post your review to current product</h4>
							<form method="post" class="review-comment">
								<div>
									<textarea id='textarea1' class="tinymce mceEditor textarea1style" rows="5" name="review" required></textarea>
								</div>
								<div>
								 	<button type="submit" class="btn" name="btn-review">Submit</button>
								 </div>
							</form> 				
						</div>
							
					</div>
				</div>
			</div>
			
		<div class="clear"></div>
	</div>

</div> 
		<!-- col-md-6 end-->
		<div class="col-md-2"></div>
	</div>
			<div class="section group">
				<div class="col-md-12">
				  	<div class="product_desc">	
						
				 </div>
						 <!-- Modal -->
							  <div class="modal fade" id="myModal" role="dialog">
							    <div class="modal-dialog">
							    
							      <!-- Modal content-->
							      <div class="modal-content">
							        <div class="modal-header">
							          <button type="button" class="close" data-dismiss="modal">&times;</button>
							          <h4 class="modal-title">Bid Item</h4>
							        </div>
							        <div class="modal-body">
							          <p>You have made a bid of Rs.<?php if (isset($bid_amount)) {
							          	echo $bid_amount;
							          } ?> for item code <?php if (isset($product_id)) {
							          	echo $product_id;} ?></p>
							          <p>Please note that by clicking confirm, you have read the <a href="<?php echo HTTP_PATH."terms-and-conditions"; ?>" target="_blank">Terms and Conditions</a> and agreed to it and the above mentioned amount. </p>
							        </div>
							        <form method="post">
							        <div class="modal-footer">
							          <input type="hidden" name="hiddenbidamount" value="<?php if (isset($bid_amount)) { echo $bid_amount; } ?>">
							          
							          <button type="submit" class="btn btn-default" name="btnplaceorder" style="margin-top: 0;">Yes</button>
							          <button type="button" class="btn btn-default" data-dismiss="modal" name="">No</button>
							        </div>
							        </form>
							      </div>
							      
							    </div>
							  </div>
						<!-- Modal End -->
	    				<div class="content_bottom">
							<div class="heading">
								<h3>Related Products</h3>
							</div>
								<div class="see">
									<p><a href="<?php echo HTTP_PATH; ?>shop?category=<?php echo $product_catagory; ?>">See all Products&emsp;<i class="fa fa-chevron-right"></i></a></p>
								</div>
							<div class="clear"></div>
					    </div>
					    <!-- section group start -->
					    <div class="section group">
					   <!-- DIV 4 START -->
					   <?php if ($related_products_sql) {
					   		for ($r=0; $r < count($related_products_sql); $r++) {?>
							<div class="col-md-2 col-sm-3 col-xs-6">
								<div class="prostyle">
									<a href="<?php echo HTTP_PATH;?>product-preview?product-url=<?php echo $related_products_sql[$r]['product_url']; ?>">
									 	<img src="<?php echo HTTP_PATH.$related_products_sql[$r]['product_main_img']; ?>" alt="" with="160" height="130">
									</a>
									<h5><?php echo $related_products_sql[$r]['product_name']; ?></h5>
									<div class="price-details">
								        <div class="price-number">
											<p>
											<?php if ($related_products_sql[$r]['product_initial_price'] != "-1") { ?>
												<span class="rupees">Rs. <?php echo $related_products_sql[$r]['product_initial_price']; ?></span>
											<?php } else { ?>
												<span class="rupees">Rs. <?php echo "0"; ?></span>
											<?php } ?>
											</p>
									    </div>
							       		<div class="add-cart">
							       			<h5><a href="<?php echo HTTP_PATH;?>product-preview?product-url=<?php echo $related_products_sql[$r]['product_url']; ?>">View</a></h5>
									    </div>
										<div class="clear"></div>
									</div>
							  	</div> 
							</div>
						<?php }} ?>
							<!-- DIV 4 END -->
							
						</div>
						<!-- section group end -->
        		</div>
				
 			</div>
 		</div>
   	</div>
</div>
<div class="container">
  
  <!-- Report product modal -->
  <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalreport">Open Modal</button> -->

  <!-- Modal -->
  <div class="modal fade" id="myModalreport" role="dialog">
  	
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

      <form method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Any issues with this ad?</h4>
        </div>

        <div class="modal-body form-group">
          <p>We're constantly working hard to assure that our ads meet high standards and we are very grateful for any kind of feedback from our users.</p>
          <div class="hight-space"></div>
             <div class="col-md-12">
	          <label for="reson">Reson</label>
	          	<select class="form-control sz" required="required" name="reson">
			        <option value="">-- Select a reason --</option>
			        <?php if ($reson_data) {
			        	for ($z=0; $z < count($reson_data); $z++) {?>
			        <option value="<?= $z; ?>"><?= $reson_data[$z]['report_reason_name']; ?></option>
			        <?php }} ?>
			    </select>
			    <div class="form-group" style="margin-bottom: 0px;">
				  <label for="mail">Email</label>
				  <input type="email" name="mail" class="form-control sz" required>
			  	</div>
			  	<div class="form-group">
				  <label for="comment">Message</label>
				  <textarea class="form-control sz" rows="3" name="message" id="textareareport" required></textarea>
				</div>
				
				
			  </div>
		  
		  <div class="hight-space"></div>
        </div>
        <div class="modal-footer border-footer">
        
          	<button type="submit" id="btnreport" class="btn btn-default" name="btnreport" style="margin-top: 0;">Yes</button>
			<button type="button" class="btn btn-default" data-dismiss="modal" name="">No</button>
        </div>
        </form>
        
      </div>
      
    </div>
  </div>
  
</div>
<?php
if (isset($_SESSION['vendesiya_user_id'])) {
	if ($product_published_user_id == $_SESSION['vendesiya_user_id']) {?>
<style>
.bidding {
	display: none !important;
}
.report {
	display: none !important;
}
.mypro {
	display: block !important;
}
.tox-tinymce {
	display: none !important;
}
.tinymce-heading {
	display: none
}
.btn {
	display: none !important; 
}
#textarea1 {
	display: none !important;
}

</style>	
<?php } else {?>
<style>
.review-comment, .tinymce-heading {
    display: block;
}
</style>
<?php }}
?>
<div id="snackbar"><i class="fa fa-times-circle"></i>&emsp;Bid margin value cannot decrease</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
        });
    });
</script>
<script>
  // tinymce.init({
  //   mode : "specific_textareas",
  //   editor_selector : "mceEditor",
  //   });
</script> 
<script type="text/javascript">
	$(document).ready(function() {			
		$().UItoTop({ easingType: 'easeOutQuart' });
		
	});
	
</script>
<script>
$(document).ready(function(){
    $("#plustheprice").click(function(){
        var currentprice = parseFloat($("#thebid").val());
        var biddifference = parseFloat($("#hiddenbiddiff").val());
        var reservationprice = parseFloat($("#hiddenresprice").val());

        var biddiffpercentage = biddifference / 100;
       // alert('('+biddiffpercentage+'*'+reservationprice+') + '+currentprice);
        var newprice = (biddiffpercentage * reservationprice) + currentprice;
        var currentbidprice = newprice.toFixed(2);
        
        $("#thebid").val(currentbidprice);
    });

    $("#minustheprice").click(function(){
    	var pricefloor = parseFloat($("#hiddenpricefloor").val());
        var currentprice = parseFloat($("#thebid").val());
        var biddifference = parseFloat($("#hiddenbiddiff").val());
        var reservationprice = parseFloat($("#hiddenresprice").val());
        
        var biddiffpercentage = biddifference / 100;
        var newprice = currentprice - (biddiffpercentage * reservationprice);
        var currentbidprice = newprice.toFixed(2);

        if(currentbidprice >= pricefloor){
        	$("#thebid").val(currentbidprice);
    	}
    });
});
</script>

<script>
	setInterval(function() {
  		//your jQuery ajax code
  		var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
               document.getElementById("checkchangeprice").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "<?php echo HTTP_PATH; ?>includes/checkbidupdate.php?prod_url=<?php echo $product_url; ?>&current_price=<?php echo $current_bid_2; ?>");
        xmlhttp.send();
	}, 1000 * 60 * 0.10);
</script>
<script>
    	jQuery(document).ready(function() {
		 // executes when HTML-Document is loaded and DOM is ready
		console.log("document is ready");
  
  		jQuery('.btn[href^=#]').click(function(e){
	    e.preventDefault();
	    var href = jQuery(this).attr('href');
	    jQuery(href).modal('toggle');
		  	});
		}); 
</script>
<script>
    	jQuery(document).ready(function() {
		 // executes when HTML-Document is loaded and DOM is ready
		console.log("document is ready");
  
  		jQuery('.btn[href^=#]').click(function(e){
	    e.preventDefault();
	    var href = jQuery(this).attr('href');
	    jQuery(href).modal('toggle');
		  	});
		}); 
</script>
<script>
function myFunction() {
  var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>
<script>
$(document).ready(function(){
	$( "#minustheprice" ).click(function() {
		
		var hidevalue =  $("#hiddenpricefloor").val();
		var bidamount = $("#thebid").val();
		var myTrunc = Math.trunc( bidamount );
		
		// var gendercheck = $('input:radio[name=radio_group_1]:checked').val();
		
  		if (hidevalue == myTrunc){
  			// alert(hidevalue+bidamount);
	        myFunction();
	        return false;
		}
		

	});

});
</script>
<!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script> -->
  <!-- <script>tinymce.init({
    mode : "specific_textareas",
    editor_selector : "mceEditor",
    });</script> -->

    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>

