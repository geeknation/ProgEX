<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>AJAX FORM UPLOAD</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
		<style type="text/css">
			.wrapper {
				width: 25%;
				margin: 0 auto;
				border: solid thin #cccccc;
				margin-top: 3%;
				border-radius: 4px;
			}
			#form_holder {
				padding: 1%;
				
			}
			#statustxt {
				margin: 0 auto;
			}
		</style>
	</head>
	<body>
		<div class="wrapper">
			<div class="progress">
				<div class="bar" style="width:0%;"></div>
			</div>
			<span id="statustxt"></span>
			<div id="form_holder">
				<form name="ajax-form" id="ajax-form" method="post" enctype="multipart/form-data" action="upload.php">
					<span id="console"> </span>
					<legend>
						Upload A Form With Ajax
					</legend>
					<label>First name</label>
					<input type="text" name="firstname" id="firstname"/>
					<label>Second name</label>
					<input type="text" name="secondname" id="secondname"/>
					<label>Upload File</label>
					<input type="file" name="myfile[]" id="myfile"/>
					<p>
						<input type="submit" class="btn btn-success" value="upload with ajax"/>
					</p>

				</form>
			</div>
		</div>
		<script type="text/javascript" src="jquery1.9.js"></script>
		<script type="text/javascript" src="jquery.form.js"></script>
		<script type="text/javascript" src="upload.js"></script>
	</body>
</html>

