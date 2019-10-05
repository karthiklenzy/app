	<div class="header_bottom">
	     	<div class="menu">
	     		<ul>
	     		<?php
					if (isset($getmainmenu)) {
						for ($i=0; $i < count($getmainmenu); $i++) { 
				?>
			    	<li><a href="<?php echo HTTP_PATH.$getmainmenu[$i]['menu_item_link']; ?>"><?php echo $getmainmenu[$i]['menu_item']; ?></a></li>
			    <?php 
			}
		}
			    ?>	
     			</ul>
	     	</div>
	     	<div class="search_box">
	     		<form name="search_box" method="get" action="<?= HTTP_PATH; ?>search">
	     			<input type="text" value="<?php if(isset($searchtearm)){ echo $searchtearm; } ?>" placeholder="Search" name="txtsearch" autocomplete="off"><input type="submit" >
	     		</form>
	     	</div>
	     	
	     	<div class="clear"></div>
	</div>
	<div class="topnav" id="myTopnav">
		<?php
			if (isset($getmainmenu)) {
				for ($i=0; $i < count($getmainmenu); $i++) { 
		?>
		  <a href="<?php echo HTTP_PATH.$getmainmenu[$i]['menu_item_link']; ?>" ><?php echo $getmainmenu[$i]['menu_item']; ?></a>
		 <?php }} ?>
		 
		  <a href="javascript:void(0);" class="icon" onclick="myFunctionmenu()">
		    <i class="fa fa-bars"></i>
		  </a>

		</div>	