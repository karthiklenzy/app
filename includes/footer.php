	</div>
      </div>

   <div class="footer">
   	  <div class="container">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
					<h4>Quick links</h4>
					  <ul>
						<?php 
						if ($getmainmenu) {
							for ($i=0; $i < count($getmainmenu); $i++) { 
								
						
						?>

						<li><a href="<?php echo $getmainmenu[$i]['menu_item_link']; ?>">	<?php echo $getmainmenu[$i]['menu_item']; ?></a></li>

						<?php 
							}
						}
						?>
					  </ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Why buy from us</h4>
						<ul>
							<li>Vendesiya is a leading live auction marketplace, which connects sellers of fine art, antiques and collectibles with buyers.</li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>My account</h4>
						<ul>
							<li><a href="<?php echo HTTP_PATH; if (isset($_SESSION['vendesiya_user_id'])) { echo "user-profile";} else { echo "login-user";}?>">Sign In</a></li>
							<li><a href="<?php echo HTTP_PATH;if (isset($_SESSION['vendesiya_user_id'])) { echo "bid-list";} else { echo "login-user";} ?>">View Bid Products</a></li>
							<li><a href="<?php echo HTTP_PATH;if (isset($_SESSION['vendesiya_user_id'])) { echo "wish-list";} else { echo "login-user";} ?>">My Wishlist</a></li>
							<li><a href="<?php echo HTTP_PATH; ?>faq">FAQ</a></li>
							
							<!-- <li><a href="contact">Help</a></li> -->
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4 social">
					
							<h4>Follow Us</h4>
					   		  <ul>
							      <li><a href="https://www.facebook.com/" target="_blank"><img src="images/facebook.png" alt="" /></a></li>
							      <li><a href="https://twitter.com" target="_blank"><img src="images/twitter.png" alt="" /></a></li>
							      <li><a href="https://lk.linkedin.com/" target="_blank"> <img src="images/linkedin.png" alt="" /></a></li>
							      <div class="clear"></div>
						     </ul>
   	 					
				</div>
			</div>			
        </div>
        <div class="copy_right">
				<p>&copy; <?php echo date("Y"); ?> All rights reserved | Vendesiya</p>
		   </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
		$(window).on('load', function(){
  $(".loader").fadeIn("slow").delay("1050").fadeOut("slow");
});
	</script>
	<script>
		$("input#space").on({
  keydown: function(e) {
    if (e.which === 32)
      return false;
  },
  change: function() {
    this.value = this.value.replace(/\s/g, "");
  }
});
	</script>
<script>
	$(function(){
    // this will get the full URL at the address bar
    var url = window.location.href; 

    // passes on every "a" tag 
    $("#sub-header a").each(function() {
            // checks if its the same on the address bar
        if(url == (this.href)) { 
            $(this).closest("li").addClass("active");
        }
    });
});
</script>
<script>
	$(function(){
    // this will get the full URL at the address bar
    var url = window.location.href; 

    // passes on every "a" tag 
    $(".profile li a").each(function() {
            // checks if its the same on the address bar
        if(url == (this.href)) { 
            $(this).closest("li").addClass("active-menu");
        }
    });
});
</script>
  <script src="<?php echo HTTP_PATH; ?>js/lightslider.js"></script>
  <script>
  $('#lightSlider').lightSlider({
    gallery: true,
    item: 1,
    loop:true,
    slideMargin: 0,
    thumbItem: 5
});
  </script>
<script>
function myFunctionmenu() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

</script>
<script>
	function myCategorymenu() {
	  var x = document.getElementById("myTopnavcat");
	  if (x.className === "topnav") {
	    x.className += " responsive";
	  } else {
	    x.className = "topnav";
	  }
	}
</script>
	<a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>

</html>