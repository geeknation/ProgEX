<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Image Uploader</title>
		<script type="text/javascript" src="jquery-1.6.2.min.js"></script>
		<link rel="stylesheet" href="bootstrap.css" type="text/css">
		<style type="text/css">
			#uploadsection{
				margin:0 auto;
				padding:1%;
				width:30%;
			}
			#gallerynotif{
				text-align: right;
			}
		</style>
	</head>
	<body>
		<div id="uploadsection">
			<div id="gallerynotif">
				<button class="btn btn-success" id="gallery">View gallery</button>
			</div>
			<form enctype="multipart/form-data" method="post" action="upload.php">
			Choose image:<br /><input type="file" name="myimage" id="myimage" /><br />
			<input type="submit" name="uploadbutton" id="uploadbutton" value="Upload" class="btn btn-primary btn-large"/>
		</form>
		<div id="preview"></div>
		</div>
		
	</body>
	<script type="text/javascript">
		$(function(){
			$("#gallery").click(function(){
				$("#preview").html("loading...").load("gallery.php");
			});
		});
	</script>
</html>
