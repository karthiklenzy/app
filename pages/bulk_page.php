	<!-- slide start -->
	<div class="header_slide">
		<div class="row" style="margin:0;">
		<?php include 'includes/category_menu.php'; ?>
			<div class="col-md-9 col-sm-8 col-xs-12 product-menu" style="">
			<div class="content_bottom">
			      <div class="heading">
			    	<h3>Bulk Items</h3>
			      </div>
			      <div class="see">
			    	
			      </div>
		  	<div class="clear"></div>
	    	</div>						 
				<div class="row" style="margin-left: 0px;">
				<?php if (count($cat_product_sql) == 0) {?>
				<div class="alert alert-info alert-dismissible" style="width: 75%;margin-left: 0px;">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<i class="fa fa-exclamation-circle"></i>&emsp;No bulk products added yet.!
				</div>
				<?php } ?>
				<?php if (isset($_GET['category']) && count($cat_product_sql) == 0) { ?>
					<!-- <h5>Recommended result</h5> -->
					<?php if ($cat_product_sql) {
					for ($z=0; $z < count($cat_product_sql); $z++) {?>
					<div class="col-md-3 col-sm-4 col-xs-6">
		  	 			<div class="prostyle">
				 			<a href="<?php echo HTTP_PATH; ?>product-preview?product-url=<?php echo $cat_product_sql[$z]['product_url']; ?>">
				 				<img src="<?php echo HTTP_PATH.$cat_product_sql[$z]['product_main_img']; ?>" alt="" with="160" height="130" />
				 			</a>
				 			<h5>
				 				<?php echo $cat_product_sql[$z]['product_name']; ?>
				 			</h5>
							<div class="price-details">
			       				<div class="price-number">
									<p><span class="rupees">Rs. <?php echo number_format($cat_product_sql[$z]['product_current_price']); ?></span></p>
				    			</div>
				       			<div class="add-cart">								
									<h5><a href="<?php echo HTTP_PATH; ?>product-preview?product-url=<?php echo $cat_product_sql[$z]['product_url']; ?>">View</a></h5>
						     	</div>
						 		<div class="clear"></div>
							</div>
			  			</div> 
					</div>
				<?php }} } ?> 
				<?php if ($cat_product_sql) {
					for ($z=0; $z < count($cat_product_sql); $z++) {?>	 
		  			<div class="col-md-3 col-sm-4 col-xs-6">
		  	 			<div class="prostyle">
				 			<a href="<?php echo HTTP_PATH; ?>product-preview?product-url=<?php echo $cat_product_sql[$z]['product_url']; ?>">
				 				<img src="<?php echo HTTP_PATH.$cat_product_sql[$z]['product_main_img']; ?>" alt="" with="160" height="130" />
				 			</a>
				 			<h5>
				 				<?php echo $cat_product_sql[$z]['product_name']; ?>
				 			</h5>
							<div class="price-details">
			       				<div class="price-number">
									<p><span class="rupees">Rs. <?php echo number_format($cat_product_sql[$z]['product_current_price']); ?></span></p>
				    			</div>
				       			<div class="add-cart">								
									<h5><a href="<?php echo HTTP_PATH; ?>product-preview?product-url=<?php echo $cat_product_sql[$z]['product_url']; ?>">View</a></h5>
						     	</div>
						 		<div class="clear"></div>
							</div>
			  			</div> 
					</div>
				<?php }} ?>
				</div>
	      	</div>	
	    </div>
	   	<div class="clear"></div>
	</div>
		<!-- slide end -->
		<?php if (isset($_GET['subid'])) { 
			$sub_id = $_GET['subid'];  ?>
		<!-- pagination start -->
		<div class="content-pagenation" <?php if ($total_product < 1) { echo "style='display: none'";} ?>>
				<li><a href="<?php echo HTTP_PATH ?>shop?category=<?php echo $cat_id; ?>&subid=<?php echo $sub_id; ?>&currentpage=1">First</a></li>
				<?php for ($x=1; $x <= $total_pages ; $x++) { if(($x <= $showmaxpagelimit) && ($x >= $showminpagelimit)){ ?>
				<li <?php if($current_page_number == $x){ ?> class="active" <?php } ?>><a href="<?php echo HTTP_PATH ?>shop?category=<?php echo $cat_id; ?>&subid=<?php echo $sub_id; ?>&currentpage=<?php echo $x; ?>" ><?php echo $x ?></a></li>
				<?php } } ?>
				<li><a href="<?php echo HTTP_PATH ?>shop?category=<?php echo $cat_id; ?>&subid=<?php echo $sub_id; ?>&currentpage=<?php echo $total_pages ?>">Last</a></li>
			<div class="clear"> </div>
		</div>
		<!-- pagination end -->
			
		<?php } else {?>
		<!-- pagination start -->
		<div class="content-pagenation" <?php if ($total_product < 1) { echo "style='display: none'";} ?>>
				<li><a href="<?php echo HTTP_PATH ?>shop?category=<?php echo $cat_id; ?>&currentpage=1">First</a></li>
				<?php for ($x=1; $x <= $total_pages ; $x++) { if(($x <= $showmaxpagelimit) && ($x >= $showminpagelimit)){ ?>
				<li <?php if($current_page_number == $x){ ?> class="active" <?php } ?>><a href="<?php echo HTTP_PATH ?>shop?category=<?php echo $cat_id; ?>&currentpage=<?php echo $x; ?>" ><?php echo $x ?></a></li>
				<?php } } ?>
				<li><a href="<?php echo HTTP_PATH ?>shop?category=<?php echo $cat_id; ?>&currentpage=<?php echo $total_pages ?>">Last</a></li>
			<div class="clear"> </div>
		</div>
		<!-- pagination end -->
	<?php } ?>
	</div>
 </div>
  <?php if ($total_product < 5 ) { ?>
 <style>
 	.footer {
	   position: relative;
	   left: 0;
	   bottom: 0;
	   width: 100%;
	   margin-top: 16vh;
	}
	
 </style>
 <?php } else if ($total_sub_catagory_count < 5) {?>
<style>
 	.footer {
	   position: relative;
	   left: 0;
	   bottom: 0;
	   width: 100%;
	   margin-top: 16vh;
	}

 </style>
 <?php } ?>
 

