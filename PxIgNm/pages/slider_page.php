<div class="main-grid">
	<div class="agile-grids">	
		<div class="agile-tables">
			<div class="w3l-table-info">
			  <h3> Home Slider </h3>
			  <form method="post" name="formsliders" action="#">
			  <div class="clearfix">&nbsp;</div>
			  <?php if (count($getsliderimages) < 5) { ?>
			  	<a href="http://localhost/vendesiya/app/PxIgNm/add-slider" class="blueButton">Add New Slider</a> 
			  <?php } ?>
			  <div class="clearfix">&nbsp;</div>
			  <?php if(isset($_GET['success_message'])){ ?>
			  	<div class="clearfix">&nbsp;</div>
			  		<span class="successmessage" style="margin-bottom: 15px;"><?php echo $_GET['success_message']; ?></span>
			  	<div class="clearfix">&nbsp;</div>
			  <?php } 

			  if($getsliderimages){
			  	for ($i=0; $i < count($getsliderimages); $i++) {
			  ?>
			  	<div class="col-md-3">
			  		<div class="gallery-grids">
					  <div class="show-reel">
						<div class="col-md-12 agile-gallery-grid">
							<b><?php  $size = getimagesize(HTTP_PATH.$getsliderimages[$i]['slider_img_path']); echo $size[3];  ?></b>
							<div class="agile-gallery">
								<a href="#" class="lsb-preview" data-lsb-group="header">
									<img src="<?php echo HTTP_PATH.$getsliderimages[$i]['slider_img_path']; ?>" alt="">
									<div class="agileits-caption">
										<h4><?php echo $getsliderimages[$i]['slider_caption']; ?></h4>
									</div>
								</a>
							</div>
							<a href="<?php echo HTTP_PATH.$getsliderimages[$i]['slider_img_path']; ?>" download>Download Image</a>
							<div class="clearfix">&nbsp;</div>

							<div class="form-group">
								<div class="col-md-6">Slider Id</div>
								<div class="col-md-6">
									<input type="text" name="txtsliderid<?php echo $i; ?>" value="<?php echo $getsliderimages[$i]['slider_id']; ?>" readonly="readonly">
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6">Onlick Path</div>
								<div class="col-md-6">
									<input type="text" name="txtonclick<?php echo $i; ?>" value="<?php echo $getsliderimages[$i]['slider_on_click_path']; ?>" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6">Slider Caption</div>
								<div class="col-md-6">
									<input type="text" name="txtslidercaption<?php echo $i; ?>" value="<?php echo $getsliderimages[$i]['slider_caption']; ?>" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6">Slider Order</div>
								<div class="col-md-6">
									<input type="text" name="txtsliderorder<?php echo $i; ?>" value="<?php echo $getsliderimages[$i]['slider_order']; ?>" required>
								</div>
							</div>
						</div>
					  </div>
				  	</div>
			  	</div>
			  <?php
			  	}
			  ?>
			  	<div class="clearfix">&nbsp;</div>
			  	<div class="clearfix">&nbsp;</div>
			  	<div class="col-md-12">
			  		<input type="hidden" name="hiddentotalitems_2" value="<?php echo $i; ?>">
			  		<input type="submit" name="btnupdate" id="btnupdate" value="Update" class="approveButton">
			  	</div>
			  <?php
			  }
			  ?>
			  </form>
			</div>
		</div>
	</div>
</div>