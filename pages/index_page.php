<div class="header_slide">
  <div class="row" style="margin:0;">
	<?php include 'includes/category_menu.php'; ?>
	  <div class="col-md-9 col-sm-8 col-xs-12 product-menu">
	      <div class="content_bottom">
		      <div class="heading">
		    	<h3>Featured Products</h3>
		      </div>
		      <div class="see">
		    	
		      </div>
		      <div class="clear"></div>
	    </div>					 
		<div class="row">
		    <?php if(isset($_COOKIE['ErrorMessage'])){ ?>
    		<div class="alert alert-danger alert-dismissible">
    			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    			<i class="fa fa-exclamation-circle"></i>&emsp;
    			<?php echo $_COOKIE['ErrorMessage'] ?> 
    		</div>
    		<?php } ?> 
		<?php
		  if ($product_data) {
			for ($x=0; $x < count($product_data); $x++) {
		?>
		  <div class="col-md-3 col-sm-4 col-xs-6">
			<div class="prostyle">
			  <a href="<?php echo HTTP_PATH; ?>product-preview?product-url=<?php echo $product_data[$x]['product_url']; ?>">
			    <img src="<?php echo HTTP_PATH.$product_data[$x]['product_main_img']; ?>" alt="" with="160" height="130" />
			  </a>
			  <h5><?php echo substr($product_data[$x]['product_name'], 0, 15); ?></h5>
			  <div class="price-details">
				<div class="price-number">
				  <p>
				  	<?php if ($product_data[$x]['product_current_price'] != "-1") { ?>
				    <span class="rupees">
				      Rs. <?php echo number_format($product_data[$x]['product_current_price']); ?>
				    </span>
				<?php } else { ?>
					<span class="rupees">
				      Rs. <?php echo "0"; ?>
				    </span>
				<?php } ?>
				  </p>
				</div>
			    <div class="add-cart">
			      <h5>
			        <a href="<?php echo HTTP_PATH; ?>product-preview?product-url=<?php echo $product_data[$x]['product_url']; ?>">View</a>
			      </h5>
				</div>
				<div class="clear"></div>
			  </div>
			</div> 
		  </div>
		<?php
		  	}
		  }
		?>
		</div>
	  </div>
	</div>
	<div class="clear"></div>
  </div>
</div>
<div class="main">
  <div class="content">
    <div class="content_top">
      <div class="heading">
    	<h3>New Products</h3>
      </div>
      <div class="see">
    	<!-- <p><a href="#">See all Products&emsp;<i class="fa fa-chevron-right"></i></a></p> -->
      </div>
      <div class="clear"></div>
    </div>
	<div class="row">
	  <?php 
	  	if ($new_product_data) {
	      for ($r=0; $r < count($new_product_data); $r++) {
	  ?> 	 
		<div class="col-md-2 col-sm-3 col-xs-6">
		  <div class="prostyle">
			<a href="<?php echo HTTP_PATH; ?>product-preview?product-url=<?php echo $new_product_data[$r]['product_url']; ?>">
			  <img src="<?php echo HTTP_PATH.$new_product_data[$r]['product_main_img']; ?>" alt="" with="160" height="130" />
			</a>
			<h5><?php echo $new_product_data[$r]['product_name']; ?></h5>
			  <div class="price-details">
				<div class="price-number">
				  <p>
				  	<?php if ($new_product_data[$r]['product_current_price'] != "-1") { ?>
				  	<span class="rupees">Rs. <?php echo number_format($new_product_data[$r]['product_current_price']); ?></span>
				  <?php } else { ?>
				  	<span class="rupees">Rs. <?php echo "0"; ?></span>
				  <?php } ?>
				  </p>
				</div>
				<div class="add-cart">								
				  <h5><a href="<?php echo HTTP_PATH; ?>product-preview?product-url=<?php echo $new_product_data[$r]['product_url']; ?>">View</a></h5>
				</div>
				<div class="clear"></div>
			  </div>
		  </div> 
		</div>
		<?php }} ?>	
	</div>
	<div class="content_bottom">
      <div class="heading">
    	<h3>Top Views</h3>
      </div>
      <div class="see">
    	<!-- <p><a href="<?php echo HTTP_PATH; ?>shop?feature=1">See all Products&emsp;<i class="fa fa-chevron-right"></i></a></p> -->
      </div>
      <div class="clear"></div>
    </div>
	<div class="row">
	  <?php if ($featured_product_data) {
		for ($z=0; $z < count($featured_product_data); $z++) { ?> 	 
		  <div class="col-md-2 col-sm-3 col-xs-6">
			<div class="prostyle">
			  <a href="<?php echo HTTP_PATH; ?>product-preview?product-url=<?php echo $featured_product_data[$z]['product_url']; ?>">
			  	<img src="<?php echo HTTP_PATH.$featured_product_data[$z]['product_main_img']; ?>" alt="" with="160" height="130" />
			  </a>
			  <h5 class="mar"><?php echo $featured_product_data[$z]['product_name']; ?></h5>
				<div class="price-details">
				  <div class="price-number">
				    <p>
				    <?php if ($featured_product_data[$z]['product_current_price'] != "-1") { ?>
				    	<span class="rupees">Rs. <?php echo number_format($featured_product_data[$z]['product_current_price']); ?></span>
				    <?php } else { ?>
				    	<span class="rupees">Rs. <?php echo "0"; ?></span>
				    <?php } ?>
				    </p>
				  </div>
				  <div class="add-cart">								
					<h5><a href="<?php echo HTTP_PATH; ?>product-preview?product-url=<?php echo $featured_product_data[$z]['product_url']; ?>">View</a></h5>
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


