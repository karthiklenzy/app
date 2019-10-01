<div class="main-grid">
	<div class="agile-grids">	
		<div class="agile-tables">
			<div class="w3l-table-info">
			  <h3>Reported Ads</h3>
			  <?php if (isset($_COOKIE["cookieSuccessProductResponse"])) {  ?>
			  	<div class="alert alert-success" role="alert">
					<strong>Success!</strong> <?php echo $_COOKIE["cookieSuccessProductResponse"]; ?>
				</div>
			  <?php } ?>
			  <table id="table">
				<thead>
				  <tr>
					<th>Reported Reason</th>
					<th>Reporter Mail</th>
					<th>Reporter Message</th>
					<th>Reported Product ID</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				  </tr>
				</thead>
				<tbody>
				<?php
				  if($reported_ads_query){
				    for ($i=0; $i < count($reported_ads_query); $i++) {
				?>
				  <tr>
				  	<td>
					  <span class="bt-content"><?php echo getreportedadname($reported_ads_query[$i]['report_ad_reson']); ?></span>
					</td>
					<td>
					  <span class="bt-content"><?php echo $reported_ads_query[$i]['report_ad_mail']; ?></span>
					</td>
					<td>
					  <span class="bt-content"><?php echo  $reported_ads_query[$i]['report_ad_message']; ?></span>
					</td>
					<td>
					  <span class="bt-content"><b><?php echo  $reported_ads_query[$i]['report_product_id']; ?></b></span>
					</td>
					<td>
					  <span class="bt-content">&nbsp;</span>
					</td>
					<td>
					  <!-- <span class="bt-content"><a href="<?php echo BACKEND_PATH; ?>view-pending-ad?product_id=<?php echo $reported_ads_query[$i]['product_id']; ?>">View</a></span> -->
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