<div class="modal fade" id="Confirmmodel" tabindex="-1" role="dialog" aria-labelledby="Confirmmodel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;</button>
				<h4 class="modal-title" id="myModalLabel">
					<span class="success"> Confirmation.! </span>
				</h4>
			</div>
			<div class="modal-body modal-body-sub">
				<div class="row">
					<div class="col-md-12 modal_body_left modal_body_left1" style="border-right: 1px dotted #C2C2C2;padding-right:3em;">
						<div class="sap_tabs">	
							<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
								<p>
									You have made a bid of <?php echo $CURRENCY_USED; ?><?php if (isset($selectbidamount)) { echo $selectbidamount; } ?> for item code <?php if (isset($productid)) { echo $productid; } ?> (<a href="<?php if (isset($product_url)) { echo HTTP_PATH; ?>view-product/<?php echo $product_url; } ?>" target="_BLANK" style="color: #19597c;font-weight: 700;"><?php if (isset($productname)) { echo $productname; } ?></a>).
								</p>

								<p>
									Please note that by clicking confirm, you have read the <a href="<?php echo HTTP_PATH; ?>terms-and-conditions" target="_BLANK" style="color: #19597c;font-weight: 700;">Terms and Conditions</a> and agreed to it and the above mentioned amount.
								</p>
								<br><br>
								<form method="post">
									<input type="hidden" name="hiddenbidamount" value="<?php if (isset($selectbidamount)) { echo $selectbidamount; } ?>">
									<input type="submit" name="btnplaceorder" value="Confirm" class="btnblue">
								</form>     					            	      
							</div>	
						</div>
						<!-- <div id="OR" class="hidden-xs">
							OR</div> -->
							<hr>
					</div>
					<div class="col-md-12 modal_body_right modal_body_right1">
						<div class="row text-center sign-with">
							<!-- <div class="col-md-12">
								<h3 class="other-nw">Follow Us</h3>
							</div> -->
							<div class="col-md-12">
								<ul class="list-inline">
									<li><a class="social-link facebook" href="#"><i class="icon-social-facebook"><span class="hidden">facebook</span></i></a></li>
									<li><a class="social-link twitter" href="#"><i class="icon-social-twitter"><span class="hidden">twitter</span></i></a></li>
									<li><a class="social-link youtube" href="#"><i class="icon-social-youtube"><span class="hidden">youtube</span></i></a></li>
									<li><a class="social-link github" href="#"><i class="icon-camera"><span class="hidden">github</span></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>