<?php if(!isMobile())  { ?>
<div class="col-md-3 col-sm-4 col-xs-12">				
  <div class="categories">
	  <ul>
	  	<h3><i class="fa fa-list"></i><a href="<?php echo HTTP_PATH; ?>" style="color: white">&emsp;Categories</a></h3>
	  	<?php if ($cat_sql) {
	  		for ($i=0; $i < count($cat_sql); $i++) { ?>
		    <li class="sub-cat-highlight"><img src="<?php echo HTTP_PATH."PxIgNm/".$cat_sql[$i]['category_icon']; ?>" width="30">
		      		<a href="<?php echo HTTP_PATH; ?>shop?category=<?php echo $cat_sql[$i]['category_id']; ?>"><?php echo $cat_sql[$i]['category_name']; ?></a>
			</li>
			<?php if ($sub_cat_sql) {
				for ($x=0; $x < count($sub_cat_sql); $x++) {?>
	      	<li class="sub-cat <?php if ($sub_cat_sql[$x]['sub_category_id'] ==  $sub_id) {echo "cat-active"; } ?>">
	      		
	      			<a href="<?php echo HTTP_PATH; ?>shop?category=<?php echo $cat_sql[$i]['category_id']; ?>&subid=<?php echo $sub_cat_sql[$x]['sub_category_id']; ?>"><?php echo $sub_cat_sql[$x]['sub_category_name']; ?></a>
	      	</li>

	    <?php 
	    	}}
	    }
	  	}
	    ?>
	      
	  </ul>
	</div>					
</div>
<!-- Mobile view -->
	<?php } if(isMobile()) { ?>
	<div class="col-md-3 col-sm-4 col-xs-12">
	<div class="topnav" id="myTopnavsubcat" style="overflow: inherit;display: inline-block;width: 100%;">
		<a href="#"><b>Categories</b></a>
		<?php if ($cat_sql) {
	  		for ($i=0; $i < count($cat_sql); $i++) { ?>
		
		  <a href="<?php echo HTTP_PATH; ?>shop?category=<?php echo $cat_sql[$i]['category_id']; ?>" >
		  	<img src="<?php echo HTTP_PATH."PxIgNm/".$cat_sql[$i]['category_icon']; ?>" width="20">
		  	<?php echo " ".$cat_sql[$i]['category_name']; ?>
		  </a>
		<?php if ($sub_cat_sql) {
				for ($x=0; $x < count($sub_cat_sql); $x++) {?>
			<a href="<?php echo HTTP_PATH; ?>shop?category=<?php echo $cat_sql[$i]['category_id']; ?>&subid=<?php echo $sub_cat_sql[$x]['sub_category_id']; ?>" class="sub-cat-style <?php if ($sub_cat_sql[$x]['sub_category_id'] ==  $sub_id) {echo "cat-active"; } ?>"><i class="fa fa-angle-right"></i><?php echo " ".$sub_cat_sql[$x]['sub_category_name']; ?></a>
		<?php }} }} ?>
		
	  	<a href="javascript:void(0);" class="icon" onclick="mysubCategorymenu()">
	   	 	<i class="fa fa-list"></i>
	  	</a>

	</div>
</div>
	<?php } ?>
<!--End Mobile view -->	