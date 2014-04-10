<?php
/*
 *
 * Main Controller class
 *
 */
session_start();
 
require_once "_archix/User.php";
require_once "_archix/_Global.php";

if (isset($_POST['createaccount'])) {

	$email = $_POST['email'];
	$password = $_POST['password'];
	$phonenumber = $_POST['phonenumber'];
	$location = $_POST['location'];
	$files = $_FILES['exercise']['name'];

	$encrypt = md5("emptyfile");
	if (empty($files)) {
		header('Location: index.php?flag=emptyfile&m=' . $encrypt);
	} else {

		//create account
		$user = new User();
		$exercise = new Exercise();
		
		$gbl=new _Global();
		$id= $gbl->genUniqId();
		
		$user->userCode=$id;
		$user -> firstName = "";
		$user -> secondName = "";
		$user -> email = $email;
		$user -> password = md5($password);
		$user -> phonenumber = $phonenumber;
		$user -> location = $location;
		$user -> userCode =$id;
		$user -> usertype = "5";
		$user -> exfile = $files;
		
		//exercise details
		$exercise -> exCode = $id;
		$exercise -> timeUploaded = time();
		$exercise -> filename = $_FILES['exercise']['name'];
		$exercise -> filetmp_name = $_FILES['exercise']['tmp_name'];
		$exercise -> filesize = $_FILES['exercise']['size'];
		$exercise -> filetype = $_FILES['exercise']['type'];
		$exercise->assigned=0;
		$exercise->assignee="";
		$exercise->timeCompleted="";
		$exercise->solutionPath="";
		$exercise->completed=0;
		$detailscheck = $user -> createUser();
		
		
		$filecheck = $exercise -> uploadExercise();
		if ($detailscheck == "details inserted" and $filecheck == "uploaded") {
				
			$ninjauser=$id."#".md5($id);
			header('Location: billing.php?seekDestroy='.$ninjauser);
		} else if ($detailscheck == "error inserting details" and $filecheck == "error uploading") {
			$encrypt = md5("account creation failure");
			header("Location: index.php?flag=" . $encrypt);
		}

	}
}
?>