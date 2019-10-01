<div class="main-grid">
	<div class="agile-grids">	
		<div class="agile-tables">
			<div class="w3l-table-info">
			  <h3>Pending Ads</h3>
			  <?php if (isset($_COOKIE["cookieSuccessProductResponse"])) {  ?>
			  	<div class="alert alert-success" role="alert">
					<strong>Success!</strong> <?php echo $_COOKIE["cookieSuccessProductResponse"]; ?>
				</div>
			  <?php } ?>
			  <table id="table">
				<thead>
				  <tr>
					<th>Added By</th>
					<th>Product Name</th>
					<th>Category</th>
					<th>Sub-Category</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				  </tr>
				</thead>
				<tbody>
				<?php
				  if($getallpendingads_query){
				    for ($i=0; $i < count($getallpendingads_query); $i++) {
				?>
				  <tr>
				  	<td>
					  <span class="bt-content"><?php echo  getvendesiyausername($getallpendingads_query[$i]['published_user_id']); ?></span>
					</td>
					<td>
					  <span class="bt-content"><?php echo $getallpendingads_query[$i]['product_name']; ?></span>
					</td>
					<td>
					  <span class="bt-content"><?php echo  getcategoryname($getallpendingads_query[$i]['category_id']); ?></span>
					</td>
					<td>
					  <span class="bt-content"><b><?php echo  getsubcategoryname($getallpendingads_query[$i]['sub_category_id']); ?></b></span>
					</td>
					<td>
					  <span class="bt-content">&nbsp;</span>
					</td>
					<td>
					  <span class="bt-content"><a href="<?php echo BACKEND_PATH; ?>view-pending-ad?product_id=<?php echo $getallpendingads_query[$i]['product_id']; ?>">View</a></span>
					</td>
				  </tr>
				<?php
				    }
				  }
				?>
				</tbody>
			  </table>
			</div>
		</div>
	</div>
</div>