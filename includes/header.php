<?php ?>
<!DOCTYPE HTML>
<head>
<title>Vendesiya | Auction Store</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="shortcut icon" href="<?php echo HTTP_PATH; ?>/images/fav.png"/>

<link href="<?php echo HTTP_PATH; ?>css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="<?php echo HTTP_PATH; ?>css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<link href="//s.w.org/wp-includes/css/dashicons.css?20150710" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo HTTP_PATH; ?>css/bootstrap.min.css">
<link href="<?php echo HTTP_PATH; ?>css/easy-responsive-tabs.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="<?php echo HTTP_PATH; ?>css/global.css">
<link href="<?php echo HTTP_PATH; ?>css/easy-responsive-tabs.css" />
<link rel="stylesheet" href="<?php echo HTTP_PATH; ?>css/lightslider.css">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

  <script src="<?php echo HTTP_PATH; ?>js/jquery.min.js"></script>
  <script src="<?php echo HTTP_PATH; ?>js/bootstrap.min.js"></script>
     
  <script src="<?php echo HTTP_PATH; ?>js/easyResponsiveTabs.js" type="text/javascript"></script>
  <script src="<?php echo HTTP_PATH; ?>js/slides.min.jquery.js"></script>
  <script>
		$(function(){
			$('#products').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				effect: 'slide, fade',
				crossfade: true,
				slideSpeed: 350,
				fadeSpeed: 500,
				generateNextPrev: true,
				generatePagination: false
			});
		});
	</script>
<!-- <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>  -->
<script type="text/javascript" src="<?php echo HTTP_PATH; ?>js/move-top.js"></script>
<script type="text/javascript" src="<?php echo HTTP_PATH; ?>js/easing.js"></script>
<script type="text/javascript" src="<?php echo HTTP_PATH; ?>js/startstop-slider.js"></script>
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=lisww4vq3xhixwzfp98bvm2kdn3jdj31fl1fe2yegut24gum"></script>
<!-- <?php if (!isset($contact)) {?>
<script>tinymce.init({ selector:'textarea' });</script>
<?php } ?> -->
<style>

</style>
</head>
<body id="style-5">
<div class="loader"></div>

  <div class="container nopadding" style="background: white;">
	<div class="header">
		<div class="headertop_desc">
			<!-- <div class="call">
				 <p><span>Need help?</span> call us <span class="number">1-22-3456789</span></span></p>
			</div> -->
			<div class="account_desc">
				<ul>
					<?php if (isset($_SESSION['vendesiya_user_id'])) {?>
					<li><a href="<?php echo HTTP_PATH; ?>upload-item"><i class="fa fa-upload"></i>&emsp;Upload your item</a></li>
					<?php } else {?>
					<li><a href="<?php echo HTTP_PATH; ?>login-user"><i class="fa fa-upload"></i>&emsp;Upload your item</a></li>
					<?php }?>
					<?php if (isset($_SESSION['vendesiya_user_first_name'])) {?>
					<li><a href="<?php echo HTTP_PATH; ?>user-profile"><i class="fa fa-user-tie"></i>&emsp;<?php echo $_SESSION['vendesiya_user_first_name']; ?></a></li>
					<li><a href="<?php echo HTTP_PATH; ?>logout"><i class="fa fa-sign-out-alt"></i>&emsp;Logout</a></li>
					<?php } ?>
					<!-- <li><a><i class="fas fa-shopping-cart"></i></a></li> -->
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="header_top">
			<div class="logo">
				<a href="<?= HTTP_PATH; ?>"><img src="images/logo1.png" alt="" style="" /></a>
			</div>
			<div class="account_desc">
				<ul class="bulk">
					<?php if (isset($_SESSION['vendesiya_user_id'])) { ?>
					<li><a href="<?php echo HTTP_PATH; ?>upload-item?upload=bulk"><i class="fa fa-list-ul"></i>&emsp;Bulk list</a></li>
					<li><a href="<?php echo HTTP_PATH; ?>upload-item?upload=freebid"><i class="fa fa-bullhorn"></i>&emsp;Free Bids</a></li>
				<?php } else { ?>
					<li><a href="<?php echo HTTP_PATH; ?>login-user?redirect_url=<?php echo HTTP_PATH; ?>upload-item?upload=bulk"><i class="fa fa-list-ul"></i>&emsp;Bulk list</a></li>
					<li><a href="<?php echo HTTP_PATH; ?>login-user?redirect_url=<?php echo HTTP_PATH; ?>upload-item?upload=freebid"><i class="fa fa-list-ul"></i>&emsp;Free Bids</a></li>
				<?php } ?>
					
					<!-- <li><a><i class="fas fa-shopping-cart"></i></a></li> -->
				</ul>
			</div>  
			  <script type="text/javascript">
			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});	
				}
			}

			$(function() {

				var dd = new DropDown( $('#dd') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-2').removeClass('active');
				});

			});

		</script>
	 <div class="clear"></div>
  </div>
  <?php 
	$getmainmenu_array = array('menu_type' => "1"); /* Menu type 1 is main menu */
	$getmainmenu = $db->query("SELECT * FROM tbl_menu WHERE menu_type = :menu_type ORDER BY menu_item_order ASC", $getmainmenu_array);
	$catagory_list = $db->query("SELECT category_id, category_name, category_icon FROM tbl_category");
	if (isset($_GET['category'])) {
		$category_id_active = filter_var($_GET['category']);
	}
	

  ?>