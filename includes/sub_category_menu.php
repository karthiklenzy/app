<div class="col-md-3">				
  <div class="categories">
	  <ul>
	  	<h3><i class="fa fa-list"></i><a href="<?php echo HTTP_PATH; ?>" style="color: white">&emsp;Categories</a></h3>
	  	<?php 
	  	if ($cat_sql) {
	  		for ($i=0; $i < count($cat_sql); $i++) { 
	  			
	  	
	  	?>
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