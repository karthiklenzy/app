<div class="main-grid">
	<div class="panel panel-widget forms-panel">
		<div class="progressbar-heading general-heading">
			<h4>Add Specification For Sub-category</h4>
		</div>
		<div class="forms">
			<h3 class="title1"></h3>
			<div class="form-three widget-shadow">
				<form class="form-horizontal" action="#" method="post">
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Sub-category name :</label>
						<div class="col-sm-6">
							<input type="text" class="form-control1" name="txtsubcatname" id="txtsubcatname" placeholder="Category name" value="<?php echo getsubcategoryname($sub_cat_id); ?>" required disabled>
						</div>
						<div class="col-sm-4">
							<!-- <p class="help-block">Your help text!</p> --> &nbsp;
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Add Specification:</label>
						<div class="col-sm-6">
							<select class="form-control1" name="selectspecification" required="required">
								<option value="" disabled="disabled" selected="selected">-- Select --</option>
								<?php
								for ($i=0; $i < count($getallspecifications_query) ; $i++) { 
								?>
								<option value="<?php echo $getallspecifications_query[$i]['spec_type_id']; ?>" <?php if (in_array($getallspecifications_query[$i]['spec_type_id'], $getexistingspec_query)){ echo 'disabled="disabled"'; } ?> >
									<?php echo $getallspecifications_query[$i]['spec_type_name']; ?>
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
						<label for="focusedinput" class="col-sm-2 control-label">Required/Not Required :</label>
						<div class="col-sm-6">
							<input type="checkbox" name="chkrequired" id="chkrequired">
						</div>
						<div class="col-sm-4">
							<!-- <p class="help-block">Your help text!</p> --> &nbsp;
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

<script>
$(document).ready(function(){
    $("#txtsubcatname").keyup(function(){
    	subcatname = $("#txtsubcatname").val().replace(/[!"#$%'()*+,.\/:;<=>?@[\\\]^`{|}~]/g, "-");
    	subcatname = subcatname.replace(/ /g, "-");
    	subcatname = subcatname.replace(/--/g, "-");
    	subcatname = subcatname.replace(/&/g, "and");
    	subcatname = subcatname.toLowerCase();
        $("#txtsubcaturl").val(subcatname);
    });
});
</script>