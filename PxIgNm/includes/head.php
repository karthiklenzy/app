<!DOCTYPE html>
<head>
<title>Admin Panel | <?php echo SITE_NAME; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="<?php echo BACKEND_PATH; ?>css/bootstrap.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="<?php echo BACKEND_PATH; ?>css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="<?php echo BACKEND_PATH; ?>css/font.css" type="text/css"/>
<link href="<?php echo BACKEND_PATH; ?>css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->

<?php
if (isset($additional_style_sheet)) {
	for($x=0;$x<count($additional_style_sheet);$x++){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo BACKEND_PATH.$additional_style_sheet[$x]; ?>">
<?php
	}  
}
?>

<script src="<?php echo BACKEND_PATH; ?>js/jquery2.0.3.min.js"></script>
<script src="<?php echo BACKEND_PATH; ?>js/modernizr.js"></script>
<script src="<?php echo BACKEND_PATH; ?>js/jquery.cookie.js"></script>
<script src="<?php echo BACKEND_PATH; ?>js/screenfull.js"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});	
		});
		</script>
<!-- charts -->
<script src="<?php echo BACKEND_PATH; ?>js/raphael-min.js"></script>
<script src="<?php echo BACKEND_PATH; ?>js/morris.js"></script>
<link rel="stylesheet" href="<?php echo BACKEND_PATH; ?>css/morris.css">

<!--skycons-icons-->
<script src="<?php echo BACKEND_PATH; ?>js/skycons.js"></script>
<!--//skycons-icons-->
<?php 
if (isset($additional_js)) {
	for($x=0;$x<count($additional_js);$x++){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo BACKEND_PATH.$additional_js[$x]; ?>">
<?php
	}  
}
?>

<!-- tables -->
<link rel="stylesheet" type="text/css" href="<?php echo BACKEND_PATH; ?>css/table-style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo BACKEND_PATH; ?>css/basictable.css" />
<script type="text/javascript" src="<?php echo BACKEND_PATH; ?>js/jquery.basictable.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#table').basictable();

      $('#table-breakpoint').basictable({
        breakpoint: 768
      });

      $('#table-swap-axis').basictable({
        swapAxis: true
      });

      $('#table-force-off').basictable({
        forceResponsive: false
      });

      $('#table-no-resize').basictable({
        noResize: true
      });

      $('#table-two-axis').basictable();

      $('#table-max-height').basictable({
        tableWrapper: true
      });
    });
</script>
<!-- //tables -->

</head>
<body class="dashboard-page">