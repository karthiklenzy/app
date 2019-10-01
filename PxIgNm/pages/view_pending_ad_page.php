<div class="main-grid">
	<div class="agile-grids">	
		<div class="agile-tables">
			<div class="w3l-table-info">
			  <h3> View Pending Ad : <?php if($getpendingproductdetails_query){ echo getproductname($productid); } ?></h3>
			  <form method="post" action="#" >
			    <table id="table">
				<tbody>
				<?php if($getpendingproductdetails_query){?>
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
				<!-- Additional Details -->
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
				 <!-- //Additional Details -->
				  <tr>
				    <td>Product Image</td>
				    <td>
				      	<div class="gallery-grids">
						  <div class="show-reel">
							<div class="col-md-3 agile-gallery-grid">
								<b><?php  $size = getimagesize(HTTP_PATH.$product_main_img); echo $size[3];  ?></b>
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
								<b><?php $size = getimagesize(HTTP_PATH.$myImageArray[$z]); echo $size[3]; ?></b>
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
					<td>Product Price</td>
					<td><?php echo $CURRENCY_USED.$product_initial_price.'.00'; ?></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td><a class="blueButton" href="<?php echo BACKEND_PATH.'replace-images?product_id='.$productid; ?>">Replace Images</a></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td>Status*</td>
					<td>
						<div class="col-md-2 nopadding">
						<select name="selectstatus" id="selectstatus" class="form-control" required="required">
							<option value="" selected="selected" disabled="disabled">-- Select --</option>
							<option value="1">Approve</option>
							<option value="2">Disapprove</option>
						</select>
						</div>
					</td>
				  </tr>
				  <tr id="disapprovereason">
					<td>Disapprove Reason*</td>
					<td><textarea rows="5" name="txtdisapprovereason" id="txtdisapprovereason"></textarea></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>
						<input type="submit" name="btnproceed" id="btnproceed" value="Proceed" class="approveButton">
						<span id="displayerror" class="errorMessage">&nbsp;</span>
					</td>
				  </tr>
				<?php } else{?>
				  <tr>
					<td>&nbsp;</td>
					<td><?php echo '<span class="errorMessage">'.$error_message.'</span>'; ?></td>
				  </tr>
				<?php }?>
				</tbody>
				</table>
			  </form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModal" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;</button>
				<h4 class="modal-title" id="myModalLabel">Error..!</h4>
			</div>
			<div class="modal-body modal-body-sub">
				<ul class="errorMessage" style="margin-left: 30px;">
					<?php echo $error_message_list; ?>
				</ul>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
    $("#selectstatus").change(function(){
    	var status = $("#selectstatus").val();
    	if(status == 2){
    		$('#disapprovereason').css('display', 'table-row');

    		var reasondisapprove = $("#txtdisapprovereason").val();

    		if(reasondisapprove == ""){
    			$("#btnproceed").attr('class', 'disableButton');
    			$("#btnproceed").attr("disabled", true);
    			$("#displayerror").text('Please enter the reason to disapprove');
    		}
    	}
    	else{
    		$('#disapprovereason').css('display', 'none');

    		$("#btnproceed").attr('class', 'approveButton');
			$("#btnproceed").attr("disabled", false);
			$("#displayerror").text('');
    	}
    });

    $("#txtdisapprovereason").keyup(function(){
    	var reasondisapprove = $("#txtdisapprovereason").val();

    	if(reasondisapprove != ""){
    		$("#btnproceed").attr('class', 'approveButton');
			$("#btnproceed").attr("disabled", false);
			$("#displayerror").text('');
		}
    });
});
</script>