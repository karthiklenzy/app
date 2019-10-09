<?php ?>
		<div class="row" style="margin: 0;">
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="<?php echo HTTP_PATH; ?>user-profile">Dashboard</a></li>
			    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo HTTP_PATH; ?>uploaded-items">Uploaded products</a></li>
			    <li class="breadcrumb-item active" aria-current="page">Product Details</li>
			  </ol>
			</nav>
			<div class="col-md-12">
				<div class="product-details">				
					<div class="col-md-6">
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
				<div class="col-md-6 pro-heading">
				<div class="pro-div">
				  <div class="product_desc">	
					<div id="horizontalTab">
						<ul class="resp-tabs-list" style="margin-bottom: 0">
							<li><i class="fa fa-camera"></i>&emsp;Product Details</li>
							<!-- <li><i class="fa fa-tag"></i>&emsp;Product Tags</li> -->
							<li><i class="fa fa-star"></i>&emsp;Product Reviews</li>
							<div class="clear"></div>
						</ul>
					<div class="resp-tabs-container">
						<div class="product-desc" id="style-5">
							 <?php if ($selected_product_sql) {
					for ($x=0; $x < count($selected_product_sql); $x++) { ?>

					<h2><?php echo $selected_product_sql[$x]['product_name']; ?></h2>
					<div class="price">
						<p>
							<span>Rs. <?php echo number_format($selected_product_sql[$x]['product_initial_price']); ?>
							</span>
						</p>

					</div>
						<!-- Product Specification data -->
						<ul class="product-bullet">
						<?php if ($spec_data) { 
							for ($v=0; $v < count($spec_data); $v++) { ?>
							<li>
							<p><span><?php echo $spec_data[$v]['spec_type_name']." : ";?></span><?php echo $spec_data[$v]['spec_value'];?></p>	
							</li>
						<?php }} ?>	
						<!--End  Product Specification data -->
						</ul>			
					
					
				<div class="share-desc">
					
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				</div>
				<div>
					<!-- <ul class="review">
						<a href="#"><li><i class="fa fa-star"></i>&emsp;Save ad as Favorite</li></a>
						<a href="#"><li><i class="fa fa-times-circle"></i>&emsp;Report this ad</li></a>
					</ul> -->
				</div>
				 <?php }} ?>					
						</div>
						<div class="product-tags" id="style-5">
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
								<i class="fa fa-exclamation-circle"></i>&emsp;No comments.!
							</div>
							<?php } ?>
							
					    </div>	

						<!-- <div class="review">
							<h4>Lorem ipsum Review by <a href="#">Finibus Bonorum</a></h4>
							 <ul>
							 	<li>Price :<a href="#"><img src="images/price-rating.png" alt="" /></a></li>
							 	<li>Value :<a href="#"><img src="images/value-rating.png" alt="" /></a></li>
							 	<li>Quality :<a href="#"><img src="images/quality-rating.png" alt="" /></a></li>
							 </ul>
							 <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
						  	<div class="your-review">
						  	 <h3>Rates for your product</h3>
						  	  <p>Feedbacks</p>
						  	  
						  	</div>				
						</div> -->
					</div>
				 </div>
			 </div>
				
				</div>
			</div>
			<div class="clear"></div>
		  </div>
		</div> 
		<!-- col-md-6 end-->
		<div class="col-md-2">
					
		</div>
	</div>
	<div class="section group">
	  <div class="cont-desc span_1_of_2">
		
	<script type="text/javascript">
	    $(document).ready(function () {
	        $('#horizontalTab').easyResponsiveTabs({
	            type: 'default', //Types: default, vertical, accordion           
	            width: 'auto', //auto or any width like 600px
	            fit: true   // 100% fit in a container
	        });
	    });
   	</script>		
   
    	</div>
		</div>
		<div class="col-md-12">
			<div class="content_bottom">
				<div class="heading">
				<h3>Uploaded Products</h3>
				</div>
				<div class="see">
					<p><a href="<?php echo HTTP_PATH; ?>uploaded-items">See all Products&emsp;<i class="fa fa-chevron-right"></i></a></p>
				</div>
				<div class="clear"></div>
		    </div>
		    <div class="section group">
				<?php if ($verify_data) {
					for ($z=0; $z < count($verify_data); $z++) {?>
				<div class="col-md-2 col-sm-4 col-xs-6">
					<div class="prostyle">
						<a href="<?php echo HTTP_PATH; ?>product-details?prourl=<?php echo $verify_data[$z]['product_url']; ?>&product_id=<?php echo $verify_data[$z]['product_id']; ?>">
						<img src="<?php echo HTTP_PATH.$verify_data[$z]['product_main_img']; ?>" alt="" with="160" height="130">
						</a>
						<h5><?php echo $verify_data[$z]['product_name']; ?></h5>
						<div class="price-details">
					       	<div class="price-number">
								<p><span class="rupees">Rs. <?php echo number_format($verify_data[$z]['product_initial_price']); ?></span></p>
						    </div>
				       		<div class="add-cart">								
								<h5><a href="<?php echo HTTP_PATH; ?>product-details?prourl=<?php echo $verify_data[$z]['product_url']; ?>&product_id=<?php echo $verify_data[$z]['product_id']; ?>">View</a></h5>
						    </div>
						 	<div class="clear"></div>
						</div>
				  	</div> 
				</div>
				<?php }} ?>
			</div>
		</div>
 	</div>

    </div>
 </div>
  	<script type="text/javascript">
		$(document).ready(function() {			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>

