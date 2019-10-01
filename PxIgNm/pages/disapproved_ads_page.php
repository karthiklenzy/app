<div class="main-grid">
	<div class="agile-grids">	
		<div class="agile-tables">
			<div class="w3l-table-info">
			  <h3>Disapproved Ads</h3>
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
					<th>Disapproved By</th>
					<th>Disapproved Reason</th>
					<th>&nbsp;</th>
				  </tr>
				</thead>
				<tbody>
				<?php
				  if($getalldisapprovedads_query){
				    for ($i=0; $i < count($getalldisapprovedads_query); $i++) {
				?>
				  <tr>
					<td>
					  <span class="bt-content"><?php echo $getalldisapprovedads_query[$i]['product_name']; ?></span>
					</td>
					<td>
					  <span class="bt-content"><?php echo  getvendesiyausername($getalldisapprovedads_query[$i]['published_user_id']); ?></span>
					</td>
					<td>
					  <span class="bt-content"><?php echo  getcmsusername($getalldisapprovedads_query[$i]['cms_user_id']); ?></span>
					</td>
					<td>
					  <span class="bt-content"><?php echo $getalldisapprovedads_query[$i]['disapprove_reason']; ?></span>
					</td>
					<td>
					  <!-- <span class="bt-content"><a href="<?php echo BACKEND_PATH; ?>view-disapproved-ad?product_id=<?php echo $getalldisapprovedads_query[$i]['product_id']; ?>">View</a></span> --> &nbsp;
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