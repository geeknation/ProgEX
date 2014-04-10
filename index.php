<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<title>ProgEx</title>

		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/base-min.css">
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/buttons-min.css">
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/forms-min.css">
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/grids-min.css">
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/menus-nr-min.css">
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/tables-min.css">
		<link rel="stylesheet" href="libs/pure.css" type="text/css">
		<link href="libs/font-awesome-4.0.3/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="libs/bootstrap/css/bootstrap.css" style="">
		<link rel="stylesheet" href="libs/bxslider/jquery.bxslider.css" type="text/css">
		<link href="main.css" rel="stylesheet">

	</head>
	<style type="text/css">
		.pure-button-warning {
			background: rgb(223, 117, 20); /* this is an orange */
			color: #FFFFFF
		}
	</style>
	<body>
		<div class="pure-menu pure-menu-open pure-menu-horizontal nbr">
			<a href="#" class="pure-menu-heading">ProgEx</a>
			<ul id="loginmenu">

				<li>
					<!-- <input type="button" class="pure-button pure-button-warning" value="Login"/> -->
				</li>
			</ul>
		</div>

		<!-- <div id="subnav">
		Subnav
		</div> -->
		<div class="pane" id="pane1">

			<div class="banner">
				Stuck with a Web Programming exercise?
				<p></p>
				<ul class="bxslider">
					<li>
						Get it done quickly and professionally in PHP.
					</li>
					
					<li>
						Saves you time.
					</li>
					
					<li>
						Makes You Look Good.
					</li>
					
					<li>
						At a very affordable rate.
					</li>
					<li>
						Get started on your right. :-)
					</li>
				</ul>
			</div>
			<div class="startup_pane">
				<div class="">
					<?php
					if (isset($_GET['flag'])) {
						$flag = $_GET['flag'];
						if ($flag = md5("emptyfile")) {
							echo "
<div class='panel panel-info'>
Please upload an exercise.
</div>
";
						} else {
							//failsafe  for url modification
							header("Location: index.php");
						}
					}
					?>
				</div>
				<form class="pure-form pure-form-stacked" id="regForm" action="_epg.php" method="post" enctype="multipart/form-data">
					<fieldset>
						<legend>
							Upload exercise here
						</legend>
						<p></p>
						<label>Exercise</label>
						<div class="fileUpload pure-button pure-button-warning">
							<span>select file from computer</span>
							<input type="file" name="exercise" id="exercise" class="upload"/>
						</div>

						<!-- <label>First Name</label>
						<input type="text" id="firstname" name="firstname" class=""/>

						<label>Second Name</label>
						<input type="text" id="secondname" name="secondname"/> -->

						<label>Email</label>
						<input type="text" id="email" name="email"/>

						<label>Password</label>
						<input type="password" id="password" name="password"/>

						<label>Confirm Password</label>

						<input type="password" id="confPassword" name="confPAssword"/>

						<hr/>
						<label>Phone Number</label>
						<input type="text" name="phonenumber" id="phonenumber"/>
						<label>Location</label>
						<input type="text" name="location" id="location"/>

						<p id="sign_up_btn_holder">
							<input type="button" class="pure-button pure-button-xlarge pure-button-warning" id="signup" value="Sign Up and upload Exercise"/>
						</p>

						<input type="hidden" name="createaccount" id="createaccount" value="createaccount"/>
					</fieldset>

				</form>

			</div>
		</div>

		<div class="pane">
			Pane 2.
		</div>
		<script type="text/javascript" src="libs/jquery1.9.js"></script>
		
		<script type="text/javascript" src="libs/bxslider/jquery.bxslider.min.js"></script>
		<script type="text/javascript" src="libs/modernizr.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				//form validation
				$("#signup").click(function() {
					validateForm();
				});
				function validateForm() {

					var password = $("#password").val();
					var confirmpassword = $("#confPassword").val();
					var location = $("#location").val();
					var phonenumber = $("#phonenumber").val();
					var email = $("#email").val();

					var empty = Array();
					var counter = 0;

					$("input[type=text]").each(function() {
						if ($(this).val() == '' || $(this).val() == null) {
							empty[counter] = "empty";
						} else {
							empty[counter] = "filled";
						}
						counter++;
					});

					//validation
					if ($.inArray("empty", empty) != -1 || $.inArray("empty", empty) >= 0) {
						window.alert("empty fields");
						console.log(empty);
						return false;

					}
					//check if the password fields are empty
					else if (emptyPasswords(password, confirmpassword) == 1) {
						window.alert("empty passwords");
						return false;

					}
					//check if passwords match
					else if (password != confirmpassword) {
						window.alert("not matching");
						return false;
					}
					//check if email is valid
					else if (validateEmail(email) == false) {
						window.alert("invalid email");
						return false;
					}

					//submit the form
					$("#regForm").submit();

				}

				function emptyPasswords(p1, p2) {
					if (p1 == "" || p2 == "") {
						return 1;
					} else {
						return 0;
					}
				}

				function validateEmail(email) {
					var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
					return re.test(email);
				}

			});
			//carousel
			$('.bxslider').bxSlider({
				auto:true,
				pause:5000,
				infiniteLoop:true,
				mode:"vertical"
			});
		</script>
	</body>
</html>

<!-- <button class="pure-button">
<i class="fa fa-cog fa-lg"></i>
Settings
</button> -->
