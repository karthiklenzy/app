<div class="main-grid">
	<div class="panel panel-widget forms-panel">
		<div class="progressbar-heading general-heading">
			<h4>Add Featured Ad</h4>
		</div>
		<div class="forms">
			<h3 class="title1"></h3>
			<div class="form-three widget-shadow">
				<form class="form-horizontal" action="#" method="post">
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Product Name:</label>
						<div class="col-sm-6">
							<select class="form-control1" name="selectfeaturedad" required="required">
								<option value="" disabled="disabled" selected="selected">-- Select --</option>
								<?php
								for ($i=0; $i < count($getexistingproducts_query) ; $i++) { 
								?>
								<option value="<?php echo $getexistingproducts_query[$i]['product_id']; ?>" >
									<?php echo $getexistingproducts_query[$i]['product_name']; ?>
								</option>
								<?php
								}
								?>
							</select>
						</div>
						<div class="col-sm-4">
							<?php if(isset($error_message)){ ?><p class="help-block errorMessage"><?php echo $error_message; ?></p> <?php } else{ ?> &nbsp; <?php } ?>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">&nbsp;</label>
						<div class="col-sm-6">
							<button type="submit" class="btn btn-default w3ls-button" name="btnsave">Save</button>
						</div>
						<div class="col-sm-4">
							&nbsp;
						</div>
					</div>						
				</form>
			</div>
		</div>
	</div>
</div>
