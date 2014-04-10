<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Progammer||Login</title>
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/menus-nr-min.css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
	<body class="index-body">
		<!-- Navbar -->
		<div class="pure-menu pure-menu-open pure-menu-horizontal nbr">
			<a href="#" class="pure-menu-heading">ProgEx</a>
			<ul id="loginmenu">

				<li>
					<!-- <input type="button" class="pure-button pure-button-warning" value="Login"/> -->
				</li>
			</ul>
		</div>
		<!-- End of Navbar -->
		<div class="login-form">
			<p>
				<h3>Login</h3>
				<hr/>
			</p>
			<div id="console"></div>
			<form id="loginform">
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control" id="email" placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" class="form-control" id="password" placeholder="Password">
				</div>
				<div class="form-group">
					<input type="checkbox" id="programmer-login" value="programmer-login">
					<b>Login as programmer</b>
				</div>
				<input type="button" class="btn btn-warning btn-lg" id="loginbutton" value="Login"/>
			</form>
			<div id="data-dump">

			</div>
		</div>
		<script type="text/javascript" src="../libs/jquery1.9.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {

				/*
				 Login
				 */
				$login = $("#loginbutton");

				$login.click(function() {
					var username = $("#email").val();
					var password = $("#password").val();
					var programmerlogin = $("#programmer-login").is(":checked");

					if (username == "" || password == "") {
						$("#console").html('<div class="alert alert-warning mesg">please enter both username and password to login</div>');
						$(".mesg").fadeOut(5000);

					} else {
						//attempt server to login the user.
						var formData = {

							'user' : username,
							'auth' : password,
							"flag" : "login-user",
							"ajax" : true,
							"programmer-login":programmerlogin
						};

						login(formData);

					}

				});

			});
			function login(formData) {

				$.ajax({
					cache : false,
					data : formData,
					type : "POST",
					url : "engine.php",
					dataType : "json",
					beforeSend : function() {
						$("#console").html('<div class="alert alert-info">Attempting Login....</div>');
					},
					complete : function() {
					},
					success : function(data) {
						$("#data-dump").html(data);
						if (data.login == "fail") {
							$("#console").html('<div class="alert alert-danger">' + data.message + '</div>');
						} else if (data.login = "success" && data.message == "Login successful") {
							//redirect the user to the home page.
							$("#console").html('<div class="alert alert-success">Logging in...</div>');
							location.href = "" + data.passURL;

						}

					}
				})

			}
		</script>
	</body>
</html>

