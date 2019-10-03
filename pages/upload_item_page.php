<script>
function getsubcategory(catid) {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
               document.getElementById("displayproductsubcategory").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "<?php echo HTTP_PATH; ?>includes/getsub.php?q=" + catid);
        xmlhttp.send();
   
}
</script>
<div class="main" style="padding-bottom: 25vh">
    <div class="content">
    	<div class="section group">
    		<div class="row">
    			<nav aria-label="breadcrumb">
				  <ol class="breadcrumb" style="margin: 10px 10px 20px 10px!important;">
				    <li class="breadcrumb-item"><a href="<?php echo HTTP_PATH; ?>user-profile">Dashboard</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Upload item</li>
				  </ol>
				</nav>
				<div class="col-md-6">
				  	<div class="contact-form" style="border:0">
				  	<h2>Upload item</h2>
					    <form name="formaddnewproduct" method="get" action="<?php echo HTTP_PATH; ?>upload-item-details">
							<table class="tableClassFsd col-md-12">
								<tbody>
									<tr>
										<td width="40%">Product Category : </td>
										<td width="50%">
											<select class="form-control" name="selectproductcategory" required="required" onchange="getsubcategory(this.value)" style="margin-bottom: 10px;">
												<option value="" disabled="disabled" selected="selected">-- Select --</option>
												<?php for ($i=0; $i < count($getcategory_query); $i++) { ?>
												<option value="<?php echo $getcategory_query[$i]['category_id']; ?>" <?php if(isset($selectproductcategory)){ if($selectproductcategory == $getcategory_query[$i]['category_id']){ ?> selected="selected" <?php } } ?> ><i class="fa fa-shopping-cart"></i><?php echo $getcategory_query[$i]['category_name']; ?></option>
												<?php } ?>
											</select>
										</td>
										<td>&nbsp;</td>
									</tr>
									<tr id="displayproductsubcategory">
										<td>Product Sub-category : </td>
										<td>
										<?php if((isset($selectproductcategory)) && ($selectproductcategory != "")){ ?>
											<select class="form-control" name="selectproductsubcategory" required="required">
												<option value="" disabled="disabled" selected="selected">-- Select --</option>
												<?php for ($e = 0; $e < count($getsubcategory_query_one); $e++) { ?>
												<option value="<?php echo $getsubcategory_query_one[$e]['sub_category_id']; ?>" <?php if(isset($selectproductsubcategory)){ if($selectproductsubcategory == $getsubcategory_query_one[$e]['sub_category_id']){ ?> selected="selected" <?php } } ?> ><?php echo $getsubcategory_query_one[$e]['sub_category_name']; ?></option>
												<?php } ?>
											</select>
											<?php } else{?>
											<select class="form-control" name="selectproductsubcategory"  required="required">
												<option value="">-- Select --</option>
											</select>
											<?php } ?>
										</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td colspan="4">&nbsp;
										<?php
										if (isset($_GET['upload']) && $_GET['upload'] == 'bulk') {
										?>
										<input type="hidden" name="upload" value="bulk">
										<?php
										}
										?>
										</td>
									</tr>
									<tr>
										<td colspan="4">
										<input type="submit" class="btn-style" name="next-btn" value="Next">
										</td>
									</tr>
								</tbody>
							</table>
						</form>
				  	</div>
  				</div>
  				<div class="col-md-2"></div>
					<?php
  						include_once DOC_ROOT.'includes/profile_menu.php';
  				 	?>
  				
			</div>
		</div>		
    </div> 
</div>