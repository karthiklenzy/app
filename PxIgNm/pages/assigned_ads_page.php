<div class="main-grid">
	<div class="agile-grids">	
		<div class="agile-tables">
			<div class="w3l-table-info">
			  <h3>Assigned Ads (Pending)</h3>
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
					<th>Assigned To</th>
					<th>Assigned On</th>
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
					  <span class="bt-content"><?php echo  getcmsusername($getallpendingads_query[$i]['assigned_to_cms_user_id']); ?></span>
					</td>
					<td>
					  <span class="bt-content"><?php echo $getallpendingads_query[$i]['assigned_on']; ?></span>
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