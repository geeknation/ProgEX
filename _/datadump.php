<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>datadump</title>
		<meta name="description" content="">
		<meta name="author" content="ian">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css"/>
		<style>
			.input-button {
				cursor: pointer;
			}

			#original {
				display: none;
			}

		</style>
	</head>

	<body>
		<div>
			<header>
				<h1>datadump</h1>
			</header>
			<nav>
				<p>
					<a href="/">Home</a>
				</p>
				<p>
					<a href="/contact">Contact</a>
				</p>
			</nav>

			<div>
				<form method="post" action="" enctype="multipart/form-data">
					<input type="file" name="files">
					<input type="submit" value="submit">
				</form>
				<?php
					
					if(isset($_FILES["files"]))
					{
						$file= $_FILES['files']['name'];
						var_dump(explode(".",$file));
					}
					
				?>
				
				<br />
<font size='1'><table class='xdebug-error xe-notice' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
<tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Notice: Undefined index: userId in C:\wamp\www\ProgEX\_archix\User.php on line <i>98</i></th></tr>
<tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
<tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>
<tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.0017</td><td bgcolor='#eeeeec' align='right'>398952</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='C:\wamp\www\ProgEX\_\engine.php' bgcolor='#eeeeec'>..\engine.php<b>:</b>0</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>2</td><td bgcolor='#eeeeec' align='center'>0.0351</td><td bgcolor='#eeeeec' align='right'>579944</td><td bgcolor='#eeeeec'>User->myExercises(  )</td><td title='C:\wamp\www\ProgEX\_\engine.php' bgcolor='#eeeeec'>..\engine.php<b>:</b>24</td></tr>
</table></font>
				
				
			</div>

			<footer>
				<p>
					&copy; Copyright  by ian
				</p>
			</footer>
			<script type="text/javascript" src="../libs/jquery1.9.js"></script>
			<script type="text/javascript">
				$(".input-button").click(function() {
					$("#original").click();
				});

				function changeFile() {
					var fileObj = document.getElementById("original");
					$value = fileObj.files[0].name;
					$(".input-button").text($value);
				}
			</script>
		</div>
	</body>
</html>
