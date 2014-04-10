<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>|Create Account</title>
		<script type="text/javascript" src="libs/jquery-1.6.2.min.js"></script>
		<script type="text/javascript" src="libs/jquery-ui-1.8.16.custom.min.js"></script>
		<script type="text/javascript" src="main.js"></script>
		<link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="css/docs.css"/>
		<link rel="stylesheet" type="text/css" href="css/main.css"/>
		<link rel="stylesheet" type="text/css" href="css/jquery.css"/>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$("#cancelregistration").click(function() {
					location.href = "index.php";
				});
				$("#registeruser").click(function() {
					//var flag=new Array($(this).length);
					var flag = 0;
					var username = $("#username").val();
					var password = $("#password").val();
					var conf_password=$("#confirmpassword").val();
					var user_available = checkAvailability(username);
					$("input[type=text]").each(function() {
						var element = $(this);

						if(element.val() == "") {
							flag += 1;
						}
					});
					//check if theyre empty fields
					if(flag > 0) {
						$("#emptyalert").html("Please fill in all fields").addClass("alert alert-error");
					}
					//check if password matches
					else if(password != conf_password) {
						$("#emptyalert").html("Password is not matching").addClass("alert alert-error");
					} else {
						//submit form data
						$("#registerform").submit();
					}

				});
				$("#username").blur(function() {
					var username = $("#username").val();
					//check if username exist
					$.get("register.php", {
						username : username,
						flag : "checkusername"
					}, function(data) {
						if(data == "username found") {
							$("#emptyalert").html("that username is already taken").addClass("alert alert-warning");
						}
					});
				});
				function checkAvailability() {
					$("#username").blur();

				}

			});

		</script>
	</head>
	<body>
		<div id="regformholder">
			<div id="emptyalert"></div>
			<form id="registerform" method="post" action="register.php">
				<table align="center">
					<tr>
						<td> First Name: </td>
						<td>
						<input type="text" id="firstname" class="text" name="firstname">
						</td>
					</tr>
					<tr>
						<td> Second Name: </td>
						<td>
						<input type="text" id="secondname" class="text" name="secondname">
						</td>
					</tr>
					<tr>
						<td>Gender:</td>
						<td>
						<select name="gender" id="gender">
							<option>Select a gender</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
						</select></td>
					</tr>
					<tr>
						<td> Location: </td>
						<td>
						<input type="text" id="location" class="text" name="location">
						</td>
					</tr>
					<tr>
						<td> username: </td>
						<td>
						<input type="text" id="username" class="text" name="username">
						</td>
					</tr>
					<tr>
						<td> password: </td>
						<td>
						<input type="password" class="text" id="password" name="password">
						</td>
					</tr>
					<tr>
						<td> Confirm Password: </td>
						<td>
						<input type="password" class="text" id="confirmpassword" name="confirmpassword">
						</td>
					</tr>
					<tr>
						<td>
						<input  type="button" class="btn btn-primary btn-large" id="registeruser" value="Register">
						</td>
						<td>
						<input type="button" class="btn btn-warning btn-large" id="cancelregistration" value="Cancel">
						</td>
					</tr>
				</table>
				<input type="hidden" name="flag" value="submittedform">
			</form>
		</div>
	</body>
</html>
