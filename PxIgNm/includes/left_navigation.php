<nav class="main-menu">
		<ul>
			<li>
				<a href="<?php echo BACKEND_PATH; ?>home">
					<i class="fa fa-home nav_icon"></i>
					<span class="nav-text">
					Dashboard
					</span>
				</a>
			</li>
			<li class="has-subnav">
				<a href="javascript:;">
				<i class="fa fa-file-text-o nav_icon" aria-hidden="true"></i>
				<span class="nav-text">
					Appearence
				</span>
				<i class="icon-angle-right"></i><i class="icon-angle-down"></i>
				</a>
				<ul>
					<li>
						<a class="subnav-text" href="<?php echo BACKEND_PATH; ?>menu">Menu</a>
					</li>
					<!-- <li>
						<a class="subnav-text" href="<?php echo BACKEND_PATH; ?>slider">Slider</a>
					</li> -->
					<!-- <li>
						<a class="subnav-text" href="<?php echo BACKEND_PATH; ?>footer">Footer</a>
					</li> -->
				</ul>
			</li>
			<li class="has-subnav">
				<a href="javascript:;">
				<i class="icon-table nav-icon" aria-hidden="true"></i>
				<span class="nav-text">
					Categories
				</span>
				<i class="icon-angle-right"></i><i class="icon-angle-down"></i>
				</a>
				<ul>
					<li>
					<a class="subnav-text" href="<?php echo BACKEND_PATH; ?>categories">
						View All Categories
					</a>
					</li>
					<li>
					<a class="subnav-text" href="<?php echo BACKEND_PATH; ?>add-category">
						Add Category
					</a>
					</li>
				</ul>
			</li>
			<li class="has-subnav">
				<a href="javascript:;">
				<i class="fa fa-file nav-icon" aria-hidden="true"></i>
				<span class="nav-text">
					Specifications
				</span>
				<i class="icon-angle-right"></i><i class="icon-angle-down"></i>
				</a>
				<ul>
					<li>
					<a class="subnav-text" href="<?php echo BACKEND_PATH; ?>specifications">
						View All
					</a>
					</li>
					<li>
					<a class="subnav-text" href="<?php echo BACKEND_PATH; ?>add-specification">
						Add Specification
					</a>
					</li>
				</ul>
			</li>
			<li class="has-subnav">
				<a href="javascript:;">
				<i class="fa fa-envelope nav-icon" aria-hidden="true">
					<span class="badgeforpending">
					<?php if(isset($pendingmessages)){ echo $pendingmessages; } else{ echo '0'; } ?>
					</span>
				</i>
				<span class="nav-text">
					Ads
				</span>
				<i class="icon-angle-right"></i><i class="icon-angle-down"></i>
				</a>
				<ul>
					<li>
					<a class="subnav-text" href="<?php echo BACKEND_PATH; ?>approved-ads">
						Approved
					</a>
					</li>
					<li>
					<a class="subnav-text" href="<?php echo BACKEND_PATH; ?>pending-ads">
						Pending
					</a>
					</li>
					<li>
					<a class="subnav-text" href="<?php echo BACKEND_PATH; ?>disapproved-ads">
						Disapproved
					</a>
					</li>
					<li>
					<a class="subnav-text" href="<?php echo BACKEND_PATH; ?>unassigned-ads">
						Unassigned
					</a>
					</li>
					<li>
					<a class="subnav-text" href="<?php echo BACKEND_PATH; ?>assigned-ads">
						Assigned (Pending)
					</a>
					</li>
					<li>
					<a class="subnav-text" href="<?php echo BACKEND_PATH; ?>featured-ads">
						Featured Ads
					</a>
					</li>
					<li>
					<a class="subnav-text" href="<?php echo BACKEND_PATH; ?>bid-completion">
						Bid Completion
					</a>
					</li>
				</ul>
			</li>
			<li class="has-subnav">
				<a href="javascript:;">
				<i class="icon-rocket nav-icon" aria-hidden="true"></i>
				<span class="nav-text">
					Inquiries
				</span>
				<i class="icon-angle-right"></i><i class="icon-angle-down"></i>
				</a>
				<ul>
					<li>
					<a class="subnav-text" href="<?php echo BACKEND_PATH; ?>inquiry">
						All Inquiries
					</a>
					</li>
					
				</ul>
			</li>
			<li class="has-subnav">
				<a href="javascript:;">
				<i class="icon-ban-circle nav-icon" aria-hidden="true"></i>
				<span class="nav-text">
					Reported products
				</span>
				<i class="icon-angle-right"></i><i class="icon-angle-down"></i>
				</a>
				<ul>
					<li>
					<a class="subnav-text" href="<?php echo BACKEND_PATH; ?>report-ads">
						Reports
					</a>
					</li>
					
				</ul>
			</li>
			<li class="has-subnav">
				<a href="javascript:;">
				<i class="icon-comments nav-icon" aria-hidden="true"></i>
				<span class="nav-text">
					Product reviews
				</span>
				<i class="icon-angle-right"></i><i class="icon-angle-down"></i>
				</a>
				<ul>
					<li>
					<a class="subnav-text" href="<?php echo BACKEND_PATH; ?>review">
						Reviews
					</a>
					</li>
					
				</ul>
			</li>
		</ul>
		<ul class="logout">
			<li>
			<a href="login.html">
			<i class="icon-off nav-icon"></i>
			<span class="nav-text">
			Logout
			</span>
			</a>
			</li>
		</ul>
	</nav>