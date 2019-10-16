<?php if(!isMobile())  { ?>
<div class="col-md-4 col-sm-4">
  <div class="categories user">
  	
  	<ul class="profile">
    <h3 style="margin: 0;"><i class="fa fa-paper-plane"></i>&emsp;Manage Account</h3>
      <li <?php if($CURRENT_PAGE == 'user-profile.php'){ echo 'class="active-menu"'; } ?> ><img src="<?php DOC_ROOT; ?>images/account-icons/dashboard.png"><a href="<?php echo HTTP_PATH; ?>user-profile">Dashboard</a></li>
      <li <?php if($CURRENT_PAGE == 'uploaded-items.php'){ echo 'class="active-menu"'; } ?> ><img src="<?php DOC_ROOT; ?>images/account-icons/product.png"><a href="<?php echo HTTP_PATH; ?>uploaded-items">Uploaded Items</a></li>
  		<li <?php if($CURRENT_PAGE == 'wish-list.php'){ echo 'class="active-menu"'; } ?> ><img src="<?php DOC_ROOT; ?>images/account-icons/edit-fav.png"><a href="<?php echo HTTP_PATH; ?>wish-list">Favourite</a></li>
      <li <?php if($CURRENT_PAGE == 'bid-list.php'){ echo 'class="active-menu"'; } ?> ><img src="<?php DOC_ROOT; ?>images/account-icons/bid.png"><a href="<?php echo HTTP_PATH; ?>bid-list">Bid Items</a></li>
  		<li <?php if($CURRENT_PAGE == 'edit-profile.php'){ echo 'class="active-menu"'; } ?> ><img src="<?php DOC_ROOT; ?>images/account-icons/edit-pro.png"><a href="<?php echo HTTP_PATH; ?>edit-profile">Edit Profile</a></li>
  		<li <?php if($CURRENT_PAGE == 'change-password.php'){ echo 'class="active-menu"'; } ?> ><img src="<?php DOC_ROOT; ?>images/account-icons/password.png"><a href="<?php echo HTTP_PATH; ?>change-password">Change Password</a></li>
  	</ul>
  </div>
</div>

<?php } if(isMobile()) { ?>
        
          <div class="col-md-3 col-sm-4 col-xs-12">
              <div class="topnav" id="myTopnavcat" style="overflow: inherit;display: inline-block;width: 100%;">
                <a href="#"><b>Manage Account</b></a>
                
                  
                  <a href="<?php echo HTTP_PATH; ?>user-profile"><i class="fa fa-caret-right"></i>&emsp;Dashboard</a>
                  <a href="<?php echo HTTP_PATH; ?>uploaded-items"><i class="fa fa-caret-right"></i>&emsp;Uploaded Items</a>
                  <a href="<?php echo HTTP_PATH; ?>wish-list"><i class="fa fa-caret-right"></i>&emsp;Favourite</a>
                  <a href="<?php echo HTTP_PATH; ?>bid-list"><i class="fa fa-caret-right"></i>&emsp;Bid Items</a>
                  <a href="<?php echo HTTP_PATH; ?>edit-profile"><i class="fa fa-caret-right"></i>&emsp;Edit Profile</a>
                  <a href="<?php echo HTTP_PATH; ?>change-password"><i class="fa fa-caret-right"></i>&emsp;Change Password</a>
                
                  <a href="javascript:void(0);" class="icon" onclick="myCategorymenu()">
                    <i class="fa fa-list"></i>
                  </a>

              </div>
            </div>
          
        <?php } ?>
