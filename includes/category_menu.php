<?php if(!isMobile())  { ?>
<div class="col-md-3 col-sm-4 col-xs-12">				
  <div class="categories">
	  <ul>
	  	<h3><i class="fa fa-list"></i>&emsp;Categories</h3>
	  	<?php 
	  	if ($catagory_list) {
	  		for ($i=0; $i < count($catagory_list); $i++) { 
	  			
	  	?>
	      <li class="<?php if ($catagory_list[$i]['category_id'] == $category_id_active) {echo "cat-active"; } ?>"><img src="<?php echo HTTP_PATH."PxIgNm/".$catagory_list[$i]['category_icon']; ?>" width="30"><a href="<?php echo HTTP_PATH; ?>shop?category=<?php echo $catagory_list[$i]['category_id']; ?>">

	      <?php echo $catagory_list[$i]['category_name']; ?>
	      	
	      </a></li>

	    <?php 
	    	}
	  	}
	    ?>
	      
	  </ul>
	</div>					
</div>
<!-- Mobile view -->
<?php } if(isMobile()) { ?>
	<div class="col-md-3 col-sm-4 col-xs-12">
		<div class="topnav" id="myTopnavcat" style="overflow: inherit;display: inline-block;width: 100%;">
			<a href="#">Categories</a>
			<?php
				if (isset($catagory_list)) {
					for ($i=0; $i < count($catagory_list); $i++) { 
			?>
				
			  <a href="<?php echo HTTP_PATH; ?>shop?category=<?php echo $catagory_list[$i]['category_id']; ?>" ><img src="<?php echo HTTP_PATH."PxIgNm/".$catagory_list[$i]['category_icon']; ?>" width="20"><?php echo " ".$catagory_list[$i]['category_name']; ?></a>
			 <?php }} ?>
			
		  	<a href="javascript:void(0);" class="icon" onclick="myCategorymenu()">
		   	 	<i class="fa fa-list"></i>
		  	</a>

		</div>
	</div>
<?php } ?>
<!--End Mobile view -->	