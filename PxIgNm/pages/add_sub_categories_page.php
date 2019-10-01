<div class="main-grid">
	<div class="panel panel-widget forms-panel">
		<div class="progressbar-heading general-heading">
			<h4>Add sub-category for <?php echo $category_name; ?></h4>
		</div>
		<div class="forms">
			<h3 class="title1"></h3>
			<div class="form-three widget-shadow">
				<form class="form-horizontal" action="#" method="post">
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Sub category name :</label>
						<div class="col-sm-6">
							<input type="text" class="form-control1" name="txtsubcatname" id="txtsubcatname" placeholder="Sub category name" value="<?php if(isset($txtsubcatname)){ echo $txtsubcatname; } ?>" required>
						</div>
						<div class="col-sm-4">
							<!-- <p class="help-block">Your help text!</p> --> &nbsp;
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Sub category url :</label>
						<div class="col-sm-6">
							<input type="text" class="form-control1" name="txtsubcaturl" id="txtsubcaturl" placeholder="Sub category url" value="<?php if(isset($txtsubcaturl)){ echo $txtsubcaturl; } ?>" required>
						</div>
						<div class="col-sm-4">
							<?php if(isset($error_message)){ ?><p class="help-block errorMessage"><?php echo $error_message; ?></p> <?php } else{ ?> &nbsp; <?php } ?>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Bidding price margin (%) :</label>
						<div class="col-sm-6">
							<input type="text" class="form-control1" name="txtbidpricemargin" id="txtbidpricemargin" placeholder="Bidding price margin" value="<?php if(isset($txtbidpricemargin)){ echo $txtbidpricemargin; } ?>" required>
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