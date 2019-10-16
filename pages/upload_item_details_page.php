<div class="main" style="padding-bottom: 120px">
    <div class="content">
    	<div class="section group">
    		<div class="row">
    			<nav aria-label="breadcrumb">
				  <ol class="breadcrumb" style="margin: 10px 10px 20px 10px!important;">
				    <li class="breadcrumb-item"><a href="<?php echo HTTP_PATH; ?>user-profile">Dashboard</a></li>
				    <?php if (isset($_GET['upload']) && $_GET['upload'] == "bulk") { ?>
				    	<li class="breadcrumb-item" aria-current="page"><a href="<?php echo HTTP_PATH; ?>upload-item?upload=bulk">Upload item</a></li>
				    <?php } else if (isset($_GET['upload']) && $_GET['upload'] == "freebid") { ?>
				    <li class="breadcrumb-item" aria-current="page"><a href="<?php echo HTTP_PATH; ?>upload-item?upload=freebid">Upload item</a></li>
				    <?php } else {?>
				    <li class="breadcrumb-item" aria-current="page"><a href="<?php echo HTTP_PATH; ?>upload-item">Upload item</a></li>
				    <?php } ?>
				    <li class="breadcrumb-item active" aria-current="page">Upload item details</li>
				  </ol>
				</nav>
				<?php if(isMobile())  { 
  					include DOC_ROOT.'includes/profile_menu.php'; ?>
  					<div class="heightx1"></div>
  				<?php 
  				}
  				?>
				<div class="col-md-6">
				  	<div class="contact-form">
				  	<h2>Add Product Details</h2>
					    <form method="post" enctype="multipart/form-data">
					    	<div class="padd">
							    <?php if ($cat_query) {
							    	for ($i=0; $i < count($cat_query); $i++) { ?>
								    <span><label>Catagory</label></span>
								    <span><input type="text" value="<?php echo $cat_query[$i]['category_name']; ?>" class="textbox" disabled></span>
								<?php } } ?>
						    </div>
						    <div class="padd">
								<?php if ($cat_sub_array) {
					    			for ($x=0; $x < count($cat_sub_array); $x++) {?>
						    		<span><label>Sub Catagory</label></span>
						    		<span><input type="text" value="<?php echo $cat_sub_query[$x]['sub_category_name']; ?>" class="textbox" disabled></span>
						    	<?php } } ?>
						    </div>
						    <div class="padd">
						    	<span><label>Product Name<span class="star"> *</span></label></span>
						    	<span><input type="text" name="item_name" class="textbox" required></span>
						    </div>
						    <div class="padd">
							    <span><label>Product Description<span class="star"> *</span></label></span>
							    <textarea name="item_desc_tinymce" required></textarea>
						    </div>
						    <?php
								if (isset($get_additional_specc_query)) {
									for ($i=0; $i < count($get_additional_specc_query); $i++) {
							?>
						    <div class="padd">
						    	<span><label><?php echo $get_additional_specc_query[$i]['spec_type_name']; if($get_additional_specc_query[$i]['spec_required'] == '1'){ ?> <span class="star">*</span> <?php } ?></label>
						    	<input type="hidden" name="hiddenspecid<?php echo $i; ?>" class="textbox" value="<?php echo $get_additional_specc_query[$i]['spec_type_id']; ?>" ></span>
						    	<span>
									<input type="text" name="txtadditionalspec<?php echo $i; ?>" class="textbox" <?php if($get_additional_specc_query[$i]['spec_required'] == '1'){ ?> required <?php } ?> >
								</span>
						    </div>
						    <?php }
									$_SESSION['additionalProducts'] = count($get_additional_specc_query); }
							?>
							<?php if (isset($_GET['upload']) && $_GET['upload'] == 'bulk') { ?>
							<div class="padd">
							   <span><label>Bulk items count<span class="star"> *</span></label></span>
							   <span><input type="text" name="item_count" oninput="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="5" class="textbox" onpaste="return false;" id="count" required></span>
						   	</div>
						    <?php } ?>
						   	<div class="padd">
							   <span><label>Product Main Image<span class="star"> * (700px x 490px Recomended)</span> </label></span>
							   <input type="file" id="uploadImage" name="files" accept="image/*" class="form-control" required>
						   	</div>
							<div class="padd">
							   <span><label>Product Additional Images (Max 4 images)<span class="star"> (700px x 490px Recomended)</span></label></span>
							   <input type="file" id="files" name="additionalfiles[]" multiple="multiple" accept="image/*" class="form-control" onchange="checkFiles(this.files)" required>
						   	</div>
							<div class="padd">
							   <span><label>Expected Price <?php if (isset($_GET['upload']) && $_GET['upload'] == 'bulk') { ?> (Total)<?php } else if (isset($_GET['upload']) && $_GET['upload'] == 'freebid'){ ?>(Free Bid) <?php } ?><span class="star"> *</span></label></span>
							   <span><input type="text" name="item_price" oninput="this.value=this.value.replace(/[^0-9]/g,'');" <?php if (isset($_GET['upload']) && $_GET['upload'] == 'freebid'){ ?>value="0" disabled <?php } ?> maxlength="5" class="textbox" id="price" onpaste="return false;" required></span>
						   	</div>  
							<div class="padd">
						   		<button type="submit" class="btn-style" name="btn-save">Send for approval</button>
						  	</div>
						</form>
					    <!-- Modal -->
						<div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog">
							    <!-- Modal content-->
							    <div class="modal-content">
							        <div class="modal-header">
							          	<button type="button" class="close" data-dismiss="modal">&times;</button>
							          	<h4 class="modal-title">Image upload limit</h4>
							        </div>
							        <div class="modal-body">
							          <p>Maximum 4 images can upload.</p>
							        </div>
							        <div class="modal-footer">
							          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							        </div>
							    </div>
							      
							</div>
						</div>
						<!-- Modal End -->
				  	</div>
  				</div>
  				<div class="col-md-2"></div>
				<?php if(!isMobile())  { 
  					include DOC_ROOT.'includes/profile_menu.php';
  				}
  				?>
  			</div>
		</div>		
    </div> 
</div>
<script>
  	$(document).on('keypress','input','.form-control',function(e){
		if (e.which === 32 && !this.value.length)
        e.preventDefault();

    });
</script>
<script>
    function checkFiles(files) {       
		if(files.length>4) {
		    document.getElementById("files").value = null;
		    $('#myModal').modal({
			    show: 'false'
			});
		    files.slice(0,4);
		    return false;
		}       
	};
	$('#price').keypress(function(evt) {
	  if (evt.which == "0".charCodeAt(0) && $(this).val().trim() == "") {
	  return false;
	   }
	});
	$('#count').keypress(function(evt) {
	  if (evt.which == "0".charCodeAt(0) && $(this).val().trim() == "") {
	  return false;
	   }
	});
	$('#price').keydown(function(e) {
	  if (e.keyCode === 190) {
	    e.preventDefault();
	  }
	});
	$('#count').keydown(function(e) {
  if (e.keyCode === 190) {
    e.preventDefault();
  }
});
</script>

