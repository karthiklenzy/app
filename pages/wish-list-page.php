<div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="row">
    			<nav aria-label="breadcrumb">
				  <ol class="breadcrumb" style="margin: 10px 10px 20px 10px!important;">
				    <li class="breadcrumb-item"><a href="<?php echo HTTP_PATH; ?>user-profile">Dashboard</a></li>
			    <li class="breadcrumb-item active" aria-current="page">Wish list</li>
				    
				  </ol>
				</nav>
				<?php if(isMobile())  { 
  					include DOC_ROOT.'includes/profile_menu.php'; ?>
  					<div class="heightx1"></div>
  				<?php 
  				}
  				?>
				<div class="col-md-8 col-sm-8">
				  	<div class="dashboard-user">
				  		<?php if(isset($_COOKIE['SuccessMessage'])){ ?>
						<div class="alert alert-success alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<i class="fa fa-check"></i>&emsp;
							<?php echo $_COOKIE['SuccessMessage'] ?> 
						</div>
						<?php } ?>
						<?php if(isset($_COOKIE['ErrorMessage'])){ ?>
						<div class="alert alert-danger alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<i class="fa fa-exclamation-circle"></i>&emsp;
							<?php echo $_COOKIE['ErrorMessage'] ?> 
						</div>
						<?php } ?>

			            <div>
					  		<?php if ($verify_count != 0) { ?>
							<div class="alert alert-info">
					    		<i class="fas fa-info-circle fa-lg"></i>&emsp;Still no product uploaded <b>Click upload item button.!</b>
					  		</div>
					  		<?php } else { ?>
					  		<div class="alert alert-success">
					    		<i class="fas fa-check-circle fa-lg"></i>&emsp;Upload more to get Vendesiya offers..!
					  		</div>
					  		<?php } ?>
					  		<img src="<?php HTTP_PATH; ?>images/upload.png" style="width:18%;">
					  	</div>
					  	<div class="up-button">
					  		<a href="<?php HTTP_PATH; ?>upload-item" class="btn">Upload item</a>
					  	</div>
					</div>
  				</div>
				<?php if(!isMobile())  {
  					include DOC_ROOT.'includes/profile_menu.php';
  				}
  				?>
			</div>
			<!-- product list -->
			<div class="row" id="ads">
				<h3 class="product-head">Wish list</h3>
				<!-- Category Card -->
				<?php if (isset($cat_product_sql)) {
				for ($z=0; $z < count($cat_product_sql); $z++) {?>
				<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
					<div class="card rounded">
					    <div class="card-image">
					    	<span class="card-notify-year"><i class="far fa-heart fa-lg"></i></span>
					        <img class="img-fluid wd" src="<?php echo HTTP_PATH.$cat_product_sql[$z]['product_main_img']; ?>" alt="Alternate Text" width="180" height="150" />
					    </div>
					    <div class="card-body text-center">
					        <div class="ad-title m-auto">
					            <h5><?php echo substr($cat_product_sql[$z]['product_name'],0, 7); ?></h5>
					        </div>
					            <a class="ad-btn" href="<?php echo HTTP_PATH; ?>product-preview?product-url=<?php echo $cat_product_sql[$z]['product_url']; ?>">View
					            </a>
					            <a href="#myModal<?= $z; ?>" data-target="#myModal<?= $z; ?>" data-toggle="modal"><i class="fa fa-trash-alt"></i></a>
					    </div>
					</div>
				</div>
				<!-- Modal -->
				<div class="modal fade" id="myModal<?= $z; ?>" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
							    <button type="button" class="close" data-dismiss="modal">&times;</button>
							    <h4 class="modal-title">Remove from favourite</h4>
							</div>
							<div class="modal-body">
							    <p>Are you sure to remove this item?</p>
							</div>
							<div class="modal-footer">
							    <a type="button" class="btn btn-default" id="<?php echo $cat_product_sql[$z]['product_id']; ?>" href="<?php HTTP_PATH ?>wish-list?deleteid=<?php echo $cat_product_sql[$z]['product_id']?>" type="button">Yes</a>
							    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
							</div>
						</div>
					</div>
				</div>
					<!-- Modal End -->
				<?php }} else { ?>
				<div class="alert alert-info">
				    <i class="fas fa-info-circle fa-lg"></i>&emsp;No products liked yet.!</b>
				</div>
				<?php } ?>
			</div>
					  <!-- product list end-->
			<div class="content-pagenation" <?php if ($total_product < 1) { echo "style='display: none'";} ?>>
					<li><a href="<?php echo HTTP_PATH ?>wish-list?currentpage=1">First</a></li>
					<?php for ($x=1; $x <= $total_pages ; $x++) { if(($x <= $showmaxpagelimit) && ($x >= $showminpagelimit)){ ?>
					<li <?php if($current_page_number == $x){ ?> class="active" <?php } ?>><a href="<?php echo HTTP_PATH ?>wish-list?currentpage=<?php echo $x; ?>" ><?php echo $x; ?></a></li>
						<?php } } ?>
					<li><a href="<?php echo HTTP_PATH ?>wish-list?currentpage=<?php echo $total_pages ?>">Last</a></li>
				<div class="clear"></div>
			</div>
		</div>		
    </div> 
</div>
<script>
	jQuery(document).ready(function() {
	 // executes when HTML-Document is loaded and DOM is ready
	console.log("document is ready");

		jQuery('.btn[href^=#]').click(function(e){
    e.preventDefault();
    var href = jQuery(this).attr('href');
    jQuery(href).modal('toggle');
	  	});
	}); 
</script>
    