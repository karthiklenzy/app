<div class="header_slide">
  <div class="row" style="margin:0;">
	<?php include 'includes/category_menu.php'; ?>
	  <div class="col-md-9 search-page" style="padding-top: 20px;">					 
		<div class="row"> 
		<?php
		  if ((isset($product_data)) && ($product_data)) {
			for ($x=0; $x < count($product_data); $x++) {
		?>
		  <div class="col-md-3 col-xs-6">
			<div class="prostyle">
			  <a href="<?php echo HTTP_PATH; ?>product-preview?product-url=<?php echo $product_data[$x]['product_url']; ?>">
			    <img src="<?php echo HTTP_PATH.$product_data[$x]['product_main_img']; ?>" alt="" with="160" height="130" />
			  </a>
			  <h5><?php echo substr($product_data[$x]['product_name'], 0, 15); ?></h5>
			  <div class="price-details">
				<div class="price-number">
				  <p>
				    <span class="rupees">
				      Rs. <?php echo $product_data[$x]['product_initial_price']; ?>
				    </span>
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
		  else {
		  	?>
		  	<div class="alert alert-danger alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<i class="fas fa-exclamation-circle"></i>&emsp;<?php if (isset($error_message)) {
					echo $error_message;
				} ?>
			</div>
			<ul class="font-awsome">
				<h5>Recommended result</h5>
				<?php if ($product_data_suggest) {
					for ($c=0; $c < count($product_data_suggest); $c++) { ?>
				<div class="col-md-3 col-xs-6">
					<div class="prostyle">
					  <a href="<?php echo HTTP_PATH; ?>product-preview?product-url=<?php echo $product_data[$c]['product_url']; ?>">
					    <img src="<?php echo HTTP_PATH.$product_data_suggest[$c]['product_main_img']; ?>" alt="" with="160" height="130" />
					  </a>
					  <h5><?php echo $product_data_suggest[$c]['product_name']; ?></h5>
					  <div class="price-details">
						<div class="price-number">
						  <p>
						    <span class="rupees">
						      Rs. <?php echo $product_data_suggest[$c]['product_initial_price']; ?>
						    </span>
						  </p>
						</div>
					    <div class="add-cart">
					      <h5>
					        <a href="<?php echo HTTP_PATH; ?>product-preview?product-url=<?php echo $product_data_suggest[$c]['product_url']; ?>">View</a>
					      </h5>
						</div>
						<div class="clear"></div>
					  </div>
					</div> 
				</div>

				<?php }} ?>
			</ul>
		  	
		  <?php }
		  ?>
		</div>
	  </div>
	</div>
	<div class="clear"></div>
  </div>
  <!-- pagination start -->
  <?php if (isset($total_product)) {?>
		<div class="content-pagenation" <?php if ($total_product < 1) { echo "style='display: none'";} ?>>
				<li><a href="<?php echo HTTP_PATH ?>search?txtsearch=<?php echo $searchtearm; ?>">First</a></li>
				<?php for ($x=1; $x <= $total_pages ; $x++) { if(($x <= $showmaxpagelimit) && ($x >= $showminpagelimit)){ ?>
				<li <?php if($current_page_number == $x){ ?> class="active" <?php } ?>><a href="<?php echo HTTP_PATH ?>search?txtsearch=<?php echo $searchtearm; ?>&currentpage=<?php echo $x; ?>" ><?php echo $x ?></a></li>
				<?php } } ?>
				<li><a href="<?php echo HTTP_PATH ?>search?txtsearch=<?php echo $searchtearm; ?>&currentpage=<?php echo $total_pages ?>">Last</a></li>
			<div class="clear"> </div>
		</div>
		<!-- pagination end -->
	<?php } ?>
</div>
</div>


