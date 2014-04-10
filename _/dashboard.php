<?php
require_once ("../_archix/EntelAuth.php");
$user = new EntelAuth("index.php", "dashboard.php");
$user -> checkSession();
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>PROGEX ADMIN PANEL</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="style.css" type="text/css">
		<link rel="stylesheet" href="alertify.js-0.3.9/themes/alertify.default.css" type="text/css">
		<link rel="stylesheet" href="alertify.js-0.3.9/themes/alertify.core.css" type="text/css">
	</head>
	<body>

		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="dashboard.php" class="navbar-brand brand-offset">Progex</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

					<ul class="nav navbar-nav">
						<li class="active">
							<a href="#">One</a>
						</li>
						<li>
							<a href="#"></a>
						</li>

					</ul>

					<!-- right sided nav -->
					<ul class="nav navbar-nav navbar-right right-menu">

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php
							$user -> displayUsernameNavbar();
						?>
							<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<a href="#">Profile</a>
								</li>
								<li>
									<a href="#">Settings</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="engine.php?flag=logout">Logout</a>
								</li>
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->

			</div><!-- /.container-fluid -->
		</nav>
		<div id="wrap">
			<div id="menu">
				<ul class="nav nav-pills nav-stacked appmenu" id="">
					<li class="active">
						<a href="#" class="pending">Pending</a>
					</li>
					<li class="">
						<a href="#" class="completed">Completed</a>
					</li>
					<li class="">
						<a href="#myexercises" class="myexercises">My exercises</a>
					</li>
					<li class="">
						<a href="#createprogrammer" id="createprogrammer">Create Programmer</a>
					</li>
				</ul>
			</div>
			<div class="" id="contentloader">
				Content loader
			</div>
		</div>
		<?php
		include "modals.php";
		?>
		<script type="text/javascript" src="../libs/jquery1.9.js"></script>
		<script type="text/javascript" src="alertify.js-0.3.9/src/alertify.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="jquery.form.js"></script>
		<script type="text/javascript" src="main.js"></script>
			


	</body>
</html>

