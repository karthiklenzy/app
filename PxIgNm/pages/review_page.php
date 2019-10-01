<div class="main-grid">
	<div class="agile-grids">	
		<div class="agile-tables">
			<div class="w3l-table-info">
			  <h3>Ad reviews</h3>
			  <?php if (isset($_COOKIE["SuccessMessage"])) {  ?>
			  	<div class="alert alert-success" role="alert">
					<strong></strong> <?php echo $_COOKIE["SuccessMessage"]; ?>
				</div>
			  <?php } ?>
			  <table id="table" class="review">
				<thead>
				  <tr>
					<th>Review ID</th>
					<th>Review Added user</th>
					<th>Review Message</th>
					<th>Review Product ID</th>
					<th>Review Date</th>
					<th>Review Status</th>
					<th>Active/Deactive</th>
					<th>Delete</th>
				  </tr>
				</thead>
				<tbody>
				<?php
				  if($review_ads_query){
				    for ($i=0; $i < count($review_ads_query); $i++) {
				?>
				  <tr>
				  	<td>
					  <span class="bt-content"><?php echo $review_ads_query[$i]['review_id']; ?></span>
					</td>
					<td>
					  <span class="bt-content"><?php echo $review_ads_query[$i]['review_added_user_name']; ?></span>
					</td>
					<td>
					  <span class="bt-content"><?php echo substr($review_ads_query[$i]['review_message'], 0, 250); ?></span>
					</td>
					<td>
					  <span class="bt-content"><b><?php echo  $review_ads_query[$i]['review_product_id']; ?></b></span>
					</td>
					<td>
					  <span class="bt-content"><b><?php echo $review_ads_query[$i]['review_date']; ?></b></span>
					</td>
					<td>
					  <span class="bt-content"><b><?php if ($review_ads_query[$i]['review_status'] == 1) {
					  	echo "Active";
					  } else { echo "Deactive";}?></b></span>
					</td> 
					<td>
					<?php 
		                if ($review_ads_query[$i]['review_status'] == 1) {
		                    $title = "Deactive this";
		                    $icon = "eye-slash";
		                    $class = "btn-red-eye";
		                    $param = 0;
		                    $msg = "deactive";

		                }
		                else {
		                    $title = "Active this";
		                    $icon = "eye";
		                    $class = "btn-green-eye";
		                    $param = 1;
		                    $msg = "active";

		                }
		            // inside link generated class  
		            ?>
					  <span class="bt-content"><a href="<?php echo BACKEND_PATH; ?>review?reviewid=<?php echo $review_ads_query[$i]['review_id']; ?>&reviewstatus=<?php echo $review_ads_query[$i]['review_status']; ?>" title="" onclick="return confirm('Are you sure you want to <?php echo $msg; ?> this')"><button type="button" class="btn btn-circle 2x <?php echo $class; ?>" alt="edit"><i class="fa fa-eye" name="btn-active" title="<?php echo $title; ?>"></i></button></a></span>
					</td>
					<td>
					
					  <span class="bt-content"><a href="<?php echo BACKEND_PATH."review?deleteid=".$review_ads_query[$i]['review_id']; ?>" title="" onclick="return confirm('Are you sure you want delete')"><button type="button" class="btn btn-circle 2x btn-red-eye" alt="edit"><i class="fa fa-minus-circle" name="btn-active" title=""></i></button></a></span>
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