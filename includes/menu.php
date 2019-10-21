<script>
  function getdatalist(inputvalue){
  	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("txtsearch").innerHTML = xmlhttp.responseText;
      }
    };
    xmlhttp.open("GET", "<?php echo HTTP_PATH; ?>includes/getdatalist.php?typedvalue=" + inputvalue);
    xmlhttp.send();
  }
</script>
<div class="<?php if(isMobile()) { echo 'topnav';  } else echo 'header_bottom'; ?>" <?php if(isMobile()) { echo 'id="myTopnav"';  } ?> >
  <?php if(isMobile()){ ?>
    <?php
	  if (isset($getmainmenu)) {
		for ($i=0; $i < count($getmainmenu); $i++) { 
	?>
	  <a href="<?php echo HTTP_PATH.$getmainmenu[$i]['menu_item_link']; ?>"><?php echo $getmainmenu[$i]['menu_item']; ?></a>
	<?php 
	  }
	}
	?>
	<a href="javascript:void(0);" class="icon" onclick="myFunctionmenu()">
   	  <i class="fa fa-bars"></i>
  	</a>
  <?php	} else{ ?>
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
  <?php } ?>
  <div class="search_box">
    <form name="search_box" method="get" action="<?= HTTP_PATH; ?>search">
	  <input type="text" value="<?php if(isset($searchtearm)){ echo $searchtearm; } ?>" placeholder="Search" list="txtsearch" name="txtsearch" autocomplete="off" onkeyup="getdatalist(this.value)" required><input type="submit" >
	    <datalist id="txtsearch">
		</datalist>
  	</form>
  </div>
  <div class="clear"></div>
</div>