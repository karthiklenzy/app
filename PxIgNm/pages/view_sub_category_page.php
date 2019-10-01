<div class="main-grid">
			<div class="agile-grids">	
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h3>View Sub-category : <?php echo getsubcategoryname($sub_cat_id); ?></h3>
					  <?php if (isset($_COOKIE["cookieSuccessMessageAddSpec"])) {  ?>
					  	<div class="alert alert-success" role="alert">
							<strong>Success!</strong> <?php echo $_COOKIE["cookieSuccessMessageAddSpec"]; ?>
						</div>
					  <?php } ?>	
					  <table id="table">
						<tbody>
						<?php
						  if($get_subcat_details_query){
						?>
						  <tr>
							<td data-th="Name Heading" width="20%"><span class="bt-content"><b>Sub-category Name</b></span></td>
							<td data-th="Name"><span class="bt-content"><?php echo $get_subcat_details_query[0]['sub_category_name']; ?></span></td>
						  </tr>
						  <tr>
							<td data-th="URL Heading"><span class="bt-content"><b>Category URL</b></span></td>
							<td data-th="URL"><span class="bt-content"><?php echo $get_subcat_details_query[0]['sub_category_url']; ?></span></td>
						  </tr>
						  <tr>
							<td data-th="Parent Heading"><span class="bt-content"><b>Parent Category</b></span></td>
							<td data-th="Parent"><span class="bt-content"><?php echo getcategoryname($get_subcat_details_query[0]['category_id']); ?></span></td>
						  </tr>
						<?php
						  }
						  if($get_price_margin_query){
						?>
						  <tr>
							<td data-th="URL Heading"><span class="bt-content"><b>Price Margin</b></span></td>
							<td data-th="URL"><span class="bt-content"><?php echo $get_price_margin_query[0]['price_scheme_amount'].'%'; ?></span></td>
						  </tr>
						<?php
						  }
						?>
						</tbody>
					  </table>

					  <div class="form-group">
						<div class="col-md-12">&nbsp;</div>
					  </div>

					  <h4>Additional Specifications</h4>

					  <table id="table">
						<tbody>
						<?php
						  if($get_additional_specc_query){
						  	for ($i=0; $i < count($get_additional_specc_query); $i++) {
						?>
						  <tr>
							<td data-th="Spec Name"><span class="bt-content"><?php echo $get_additional_specc_query[$i]['spec_type_name']; ?></span></td>
						  </tr>
						<?php
							}
						  }
						?>
						</tbody>
					  </table>

					  <div class="form-group">
						<div class="col-md-12">&nbsp;</div>
					  </div>

					  <div class="form-group forms">
						<div class="col-sm-2"><a href="<?php echo BACKEND_PATH.'add-spec-for-sub-category?sub_cat_id='.$sub_cat_id; ?>" class="blueButton">Add New Specification</a></div>
						<div class="col-sm-6">&nbsp;</div>
						<div class="col-sm-4">&nbsp;</div>
					  </div>

				  	  <div class="form-group">
						<div class="col-md-12">&nbsp;</div>
					  </div>
					</div>
				</div>
			</div>
		</div>