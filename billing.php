<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Billing.</title>
		<style>
			#bill_wrap {
				width: 50%;
				margin: 0 auto;
				margin-top: 5%;
				margin-bottom: 5%;
				border: solid thin #C0C0C0;
				border-radius: 5px;
				overflow: hidden;
			}
		</style>
		<link rel="stylesheet" type="text/css" href="libs/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/base-min.css">
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/buttons-min.css">
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/forms-min.css">
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/grids-min.css">
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/menus-nr-min.css">
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/tables-min.css">
		<link rel="stylesheet" href="libs/pure.css" type="text/css">
		<link href="libs/font-awesome-4.0.3/css/font-awesome.css" rel="stylesheet">

	</head>
	<body>
		<div class="navbar navbar-inverse">
			<div class="navbar-inner">
				<a class="brand" href="#">Title</a>
				<ul class="nav">
					<li class="active">
						<a href="#">Home</a>
					</li>
					<li>
						<a href="#">Link</a>
					</li>
					<li>
						<a href="#">Link</a>
					</li>
				</ul>
			</div>
		</div>
		<div id="bill_wrap">
			<p class="lead">
				<h1>One more Step...</h1>
			</p>
			<hr/>
			<?php
			include "billing/Pesapal.php";
			require_once ("_archix/User.php");
			$user = new User();
			$id = $_GET['seekDestroy'];
			$split = explode("#", $id);
			$firstName = "First Name";
			$secondName = "Second Name";
			$description = "PROGex Payment";
			$ref = "1";
			$userId = $split[0];

			$eml = $user -> getBillingEmail($userId);
			$phone = "0722000000";
			$typ = "MERCHANT";
			$amount = "200";
			$pay = new Pesapal($firstName, $secondName, $description, $ref, $eml, $phone, $typ, $amount);
			?>
		</div>
	</body>
</html>

