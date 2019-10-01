<script>
function addnewmenuitem(totalrows,maximumid) {

    if (totalrows.length == 0) { 
        document.getElementById("display_new_item").innerHTML = "";
        return;
    } else {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                
               document.getElementById("display_new_item").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "<?php echo BACKEND_PATH; ?>includes/addnewmenuitem.php?q="+totalrows+"&maxid="+maximumid, true);
        xmlhttp.send();
    }
}
</script>

<div class="main-grid">		
			<div class="panel panel-widget forms-panel">
					<div class="forms">
						<div class="form-two widget-shadow">
							<div class="form-title">
								<h4>Main Menu :</h4>
							</div>
							<div class="form-body" data-example-id="simple-form-inline">
							<?php if(isset($_COOKIE['cookieSuccessMessage'])){ ?>
								<p class="successmessage" style="margin-bottom: 15px;"><?php echo $_COOKIE['cookieSuccessMessage'] ?> </p>
							<?php } ?>
								<form class="form-inline" action="#" method="post">
								<?php
									for ($i=0; $i < count($getmainmenu); $i++) { 
								?>
									<div style="width:100%; margin-bottom: 10px;">
										<div class="form-group">
											<input type="hidden" name="hiddenmenuitemid<?php echo $i; ?>" value="<?php echo $getmainmenu[$i]['menu_id']; ?>">
											<label for="exampleInputName2">Name : </label>
											<input type="text" name="txtmenuitem<?php echo $i; ?>" class="form-control" value="<?php echo $getmainmenu[$i]['menu_item']; ?>">
										</div>
										<div class="form-group">
											<label for="exampleInputEmail2">URL : <span style="font-size: 14px; color: #9a9a9a;"><?php echo HTTP_PATH; ?></span></label>
											<input type="text" name="txtmenuitemlink<?php echo $i; ?>" class="form-control" value="<?php echo $getmainmenu[$i]['menu_item_link']; ?>">
										</div>
										<div class="form-group">
											<label for="exampleInputEmail2">Order : </label>
											<input type="text" name="txtmenuitemorder<?php echo $i; ?>" class="form-control" value="<?php echo $getmainmenu[$i]['menu_item_order']; ?>">
										</div>
										<div class="form-group">
											
											<a href="<?php echo BACKEND_PATH; ?>menu?deleteid=<?php echo $getmainmenu[$i]['menu_id']; ?>" title="delete" onclick="return confirm('Are you sure you want to delete?')">
											<i class="fa fa-trash-o" aria-hidden="true" style="color: red;"></i>
											</a>
										</div>
									</div>
								<?php
									}
								?>
									<input type="hidden" name="hiddentotalitems_2" value="<?php echo count($getmainmenu); ?>">

									<div style="width:100%; margin-bottom: 10px; margin-top: 25px;" id="display_new_item">
									</div>

									<?php if(count($getmainmenu) < 5){ ?>
									<div style="width:100%; margin-bottom: 10px; margin-top: 25px;">
										<a onclick="addnewmenuitem(<?php echo $i.','.$maxid; ?>)"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Add New Item</a>
									</div>
									<?php } ?>

									<div style="width:100%; margin-top: 65px;">
										<button type="submit" class="btn btn-default w3ls-button" name="btnsave">Save</button>
									</div>
								</form> 
							</div>
						</div>
					</div>
				</div>
		</div>