<div class="main-grid">
	<div class="panel panel-widget forms-panel">
		<div class="progressbar-heading general-heading">
			<h4>Add Slider</h4>
		</div>
		<div class="forms">
			<h3 class="title1"></h3>
			<div class="form-three widget-shadow">
				<form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Slider Caption * :</label>
						<div class="col-sm-6">
							<input type="text" class="form-control1" name="txtslidercaption" id="txtslidercaption" placeholder="Slider Caption" value="<?php if(isset($txtslidercaption)){ echo $txtslidercaption; } ?>" required>
						</div>
						<div class="col-sm-4">
							<!-- <p class="help-block">Your help text!</p> --> &nbsp;
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Slider On Click * :</label>
						<div class="col-sm-6">
							<input type="text" class="form-control1" name="txtslideronclick" id="txtslideronclick" placeholder="Slider On Click" value="<?php if(isset($txtslideronclick)){ echo $txtslideronclick; } ?>" required>
						</div>
						<div class="col-sm-4">
							<?php if(isset($error_message)){ ?><p class="help-block errorMessage"><?php echo $error_message; ?></p> <?php } else{ ?> &nbsp; <?php } ?>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Slider Image * :</label>
						<div class="col-sm-6">
							<input type="file" id="uploadImage" name="files" accept="image/*" class="form-control" required="required">
							<span style="font-size: 14px;">(1920px x 919px Recomended)</span>
						</div>
						<div class="col-sm-4">
							<!-- <p class="help-block">Your help text!</p> --> &nbsp;
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">&nbsp;</label>
						<div class="col-sm-6">
							<input type="submit" name="btnsubmit" value="Save Slider" class="approveButton">
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