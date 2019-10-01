<div class="main-grid">
	<div class="agile-grids">	
		<div class="agile-tables">
			<div class="w3l-table-info">
			  <h3> View Pending Ad : <?php if($getapprovedproductdetails_query){ echo getproductname($productid); } ?></h3>
			    <table id="table">
				<tbody>
				<?php if($getapprovedproductdetails_query){?>
				  <tr>
					<td width="20%">Product Name</td>
					<td><?php echo $product_name; ?></td>
				  </tr>
				  <tr>
					<td>Product Category</td>
					<td><?php echo getcategoryname($category_id); ?></td>
				  </tr>
				  <tr>
					<td>Product Sub-Category</td>
					<td><?php echo getsubcategoryname($sub_category_id); ?></td>
				  </tr>
				  <tr>
					<td>Product Description</td>
					<td><?php echo $product_description; ?></td>
				  </tr>
				  <?php
				  if ($getadditionaldetails_query) {
				  	for ($i=0; $i < count($getadditionaldetails_query); $i++) { 
				  ?>
				  <tr>
					<td><?php echo getspecnamebyid($getadditionaldetails_query[$i]['spec_type_id']); ?></td>
					<td><?php echo $getadditionaldetails_query[$i]['spec_value']; ?></td>
				  </tr>
				  <?php
				  	}
				  }
				  ?>
				  <tr>
				    <td>Product Image</td>
				    <td>
				      	<div class="gallery-grids">
						  <div class="show-reel">
							<div class="col-md-3 agile-gallery-grid">
								<b><?php /*$size = getimagesize(HTTP_PATH.$product_main_img); echo $size[3];*/ ?></b>
								<div class="agile-gallery">
									<a href="#" class="lsb-preview" data-lsb-group="header">
										<img src="<?php echo HTTP_PATH.$product_main_img; ?>" alt="">
										<div class="agileits-caption">
											<h4>Main Image</h4>
										</div>
									</a>
								</div>
								<a href="<?php echo HTTP_PATH.$product_main_img; ?>" download>Download Image</a>
							</div>
						  </div>
					  	</div>
					</td>
				  </tr>
				  <tr>
				    <td>Additional Image</td>
				    <td>
				      	<div class="gallery-grids">
						  <div class="show-reel">
						  <?php 
                          	$myImageArray = explode(',', $product_images);
                          	for ($z=0; $z < count($myImageArray); $z++) {
                          ?>
							<div class="col-md-3 agile-gallery-grid">
								<b><?php /*$size = getimagesize(HTTP_PATH.$myImageArray[$z]); echo $size[3];*/ ?></b>
								<div class="agile-gallery">
									<a href="#" class="lsb-preview" data-lsb-group="header">
										<img src="<?php echo HTTP_PATH.$myImageArray[$z]; ?>" alt="">
										<div class="agileits-caption">
											<h4>Additional Image <?php $y = $z+1; echo $y; ?></h4>
										</div>
									</a>
								</div>
								<a href="<?php echo HTTP_PATH.$myImageArray[$z]; ?>" download>Download Image</a>
							</div>
						  <?php
						    }
						  ?>
						  </div>
					  	</div>
					</td>
				  </tr>
				  <tr>
					<td>Cut off Price</td>
					<td><?php echo $CURRENCY_USED.$product_initial_price.'.00'; ?></td>
				  </tr>
				  <tr>
					<td>Product Current Price</td>
					<td><?php echo $CURRENCY_USED.$product_current_price.'.00'; ?></td>
				  </tr>
				  <tr>
					<td>Product Approved On</td>
					<td><?php echo $product_approved_on; ?></td>
				  </tr>
				  <tr>
					<td>Bidding ends On</td>
					<td><?php echo $product_bid_ends_on; ?></td>
				  </tr>
				  <tr>
					<td>Total Views</td>
					<td><?php echo $product_views; ?></td>
				  </tr>
				  <tr>
					<td>Published By</td>
					<td><?php echo  getvendesiyausername($published_user_id); ?></td>
				  </tr>
				  <tr>
					<td>Approved By</td>
					<td><?php echo  getcmsusername($cms_user_id); ?></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				<?php } else{?>
				  <tr>
					<td>&nbsp;</td>
					<td><?php echo '<span class="errorMessage">'.$error_message.'</span>'; ?></td>
				  </tr>
				<?php }?>
				</tbody>
				</table>
			</div>
		</div>
	</div>
</div>