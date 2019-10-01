<div class="main-grid">
	<div class="agile-grids">	
		<div class="agile-tables">
			<div class="w3l-table-info">
			  <h3>Featured Ads</h3>
			  <?php if (isset($_COOKIE["cookieSuccessProductResponse"])) {  ?>
			  	<div class="alert alert-success" role="alert">
					<strong>Success!</strong> <?php echo $_COOKIE["cookieSuccessProductResponse"]; ?>
				</div>
			  <?php } ?>
			  <table id="table">
				<thead>
				  <tr>
					<th>Product Name</th>
					<th>Added By</th>
					<th>Approved On</th>
					<th>Approved By</th>
					<th>&nbsp;</th>
				  </tr>
				</thead>
				<tbody>
				<?php
				  if($getallfeaturedads_query){
				    for ($i=0; $i < count($getallfeaturedads_query); $i++) {
				?>
				  <tr>
					<td>
					  <span class="bt-content"><?php echo $getallfeaturedads_query[$i]['product_name']; ?></span>
					</td>
					<td>
					  <span class="bt-content"><?php echo  getvendesiyausername($getallfeaturedads_query[$i]['published_user_id']); ?></span>
					</td>
					<td>
					  <span class="bt-content"><?php echo $getallfeaturedads_query[$i]['product_approved_on']; ?></span>
					</td>
					<td>
					  <span class="bt-content"><?php echo getcmsusername($getallfeaturedads_query[$i]['cms_user_id']); ?></span>
					</td>
					<td>
					  <span class="bt-content">
					  	<a href="<?php echo BACKEND_PATH; ?>view-approved-ad?product_id=<?php echo $getallfeaturedads_query[$i]['product_id']; ?>">View</a>
					  </span>
					  &nbsp;
					  <a href="#" onclick="deleteConfirm(<?php echo $getallfeaturedads_query[$i]['product_id']; ?>)">Remove</a>
					</td>
				  </tr>
				<?php
				    }
				  }
				?>
				</tbody>
			  </table>
			  <div class="clearfix">&nbsp;</div>
			  <div class="col-md-12">
			  	<a href="<?php echo BACKEND_PATH.'add-featured-ad'; ?>" class="blueButton">Add Featured Ad</a>
			  </div>
			</div>
		</div>
	</div>
</div>
 <script>	  
	function deleteConfirm(id){
	  	var x = confirm("Are you sure you want to remove this from the featured items list?");
		  if(x){
			  window.location="remove_featured_product.php?q="+id;
		}
	}
</script>