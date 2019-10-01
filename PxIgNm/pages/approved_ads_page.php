<div class="main-grid">
	<div class="agile-grids">	
		<div class="agile-tables">
			<div class="w3l-table-info">
			  <h3>Approved Ads</h3>
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
					<th>Featured Ad</th>
					<th>&nbsp;</th>
				  </tr>
				</thead>
				<tbody>
				<?php
				  if($getallapprovedads_query){
				    for ($i=0; $i < count($getallapprovedads_query); $i++) {
				?>
				  <tr>
					<td>
					  <span class="bt-content"><?php echo $getallapprovedads_query[$i]['product_name']; ?></span>
					</td>
					<td>
					  <span class="bt-content"><?php echo  getvendesiyausername($getallapprovedads_query[$i]['published_user_id']);echo $getallapprovedads_query[$i]['published_user_id']; ?></span>
					</td>
					<td>
					  <span class="bt-content"><?php echo $getallapprovedads_query[$i]['product_approved_on']; ?></span>
					</td>
					<td>
					  <span class="bt-content"><?php echo getcmsusername($getallapprovedads_query[$i]['cms_user_id']); ?></span>
					</td>
					<td>
						&nbsp; <?php if($getallapprovedads_query[$i]['product_featured'] == '1') { ?> <i class="fa fa-check" aria-hidden="true"></i> <?php } ?>
					</td>
					<td>
					  <span class="bt-content"><a href="<?php echo BACKEND_PATH; ?>view-approved-ad?product_id=<?php echo $getallapprovedads_query[$i]['product_id']; ?>">View</a></span>
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

<script type="text/javascript">
 	$(document).ready(function(){
  	<?php $featured_num_of_prod = 0;  $phpVar = $featured_num_of_prod; echo "var contcheckbox = '{$phpVar}';"; ?>

        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                contcheckbox++;

                if(contcheckbox == 8){                 
                 $("input.group1").not(':checked').prop('disabled', true);
                }
            }
            else if($(this).prop("checked") == false){
                contcheckbox--;

                if(contcheckbox < 8){
                 $("input.group1").attr("disabled", false);
                }
            }
        });

        if(contcheckbox == 8){                 
         $("input.group1").not(':checked').prop('disabled', true);
        }
         
        if(contcheckbox < 8){
         $("input.group1").attr("disabled", false);
        }
    });
</script>