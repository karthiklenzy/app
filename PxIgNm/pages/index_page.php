<?php
include_once BACKEND_DOC_ROOT.'includes/head.php';
?> 
<body class="signup-body">
		<div class="agile-signup">	
			
			<div class="content2">
				<div class="grids-heading gallery-heading signup-heading">
					<h2>Login</h2>
				</div>
				<form method="post">
					<input type="text" name="txtusername" placeholder="Username" >
					<input type="password" name="txtpassword" placeholder="Password" >
					<p style="margin-top: 15px;" class="alert-error"> &nbsp; <?php if(isset($error_message)){ echo $error_message; } ?></p>
					<input type="submit" class="register" value="Login" name="btnlogin">
				</form>
				<div class="signin-text">
					<div class="text-left">
						<p><a href="#"> Forgot Password? </a></p>
					</div>
					<div class="text-right">
						<p><a href="#"> Create New Account</a></p>
					</div>
					<div class="clearfix"> </div>
				</div>

				<!-- <h5>- OR -</h5>
				<div class="footer-icons">
					<ul>
						<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" class="twitter facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" class="twitter chrome"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#" class="twitter dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<a href="index.html">Back To Home</a> -->
			</div>
			
			<!-- footer -->
			<div class="copyright">
				<p>© <?php echo date('Y'); ?> . All Rights Reserved . Design by <a href="#">esol</a></p>
			</div>
			<!-- //footer -->
			
		</div>
</body>
</html>