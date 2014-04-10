<?php
/*
 engine.php
 */
require_once ("../_archix/User.php");
require_once ("../_archix/Exercise.php");
require_once ("../_archix/EntelAuth.php");
$u = new User();
$ex = new Exercise();
$loginpassredir = "dashboard.php";
$loginfailredir = "index.php";
$user = new EntelAuth($loginfailredir, $loginpassredir);
//all data fetch
if (isset($_GET['flag'])) {
	$flag = $_GET['flag'];

	if ($flag == "fetch_all") {
		$ex -> fetchAllEx();
	}
	if ($flag == "logout") {
		$user -> logOut();
	}
	if ($flag == "my-exercises") {
		$u -> myExercises();
	}
	if($flag=="completed-exercises"){
		$ex->completedExercises($user->getSessionId());
	}

}

//all data postings.[updates, deletes,saves]
if (isset($_POST['flag'])) {
	$flag = $_POST['flag'];

	if ($flag == "login-user") {
		$username = $_POST['user'];
		$password = "";
		$ajax = $_POST['ajax'];
		$p_login = $_POST['programmer-login'];

		$query = '';
		if ($p_login == "false") {
			$query = "SELECT * FROM users WHERE email=? AND acss=?";
			$password = md5($_POST['auth']);
		} else if ($p_login == "true") {
			$query = "SELECT * FROM programmers WHERE email=? AND password=?";
			$password = $_POST['auth'];
		}
		$user -> loginQuery = $query;
		$user -> login($username, $password, $ajax);

	}
	if ($flag == "pick-exercise") {

		$excode = $_POST['excode'];
		$user = $_SESSION['userId'];
		$query = "UPDATE exercises SET assignee=?,assigned=1 WHERE exCode=?";

		$Arrdata = array($user, $excode);
		$ex -> pickExercise($query, $Arrdata);
	}
	if ($flag == "save-programmer") {
		$u -> userCode = $u -> generateUserCode();
		$u -> firstName = $_POST['firstname'];
		$u -> secondName = $_POST['secondname'];
		$u -> email = $_POST['email'];
		$u -> username = $_POST['username'];
		$u -> password = $u -> genRandAuth();
		$u -> languages = $_POST['languages'];
		$u -> location = $_POST['location'];
		$u -> phonenumber = intval($_POST['phonenumber']);
		$u -> createProgrammer();

	}
	if ($flag == "save-solution") {

		$types = array("html", "css", "php", "js");
		$resp = '';
		if (empty($_FILES['solutionfiles'])) {
			$resp = array("uploadSolution" => "fail", "error" => "Please select a file to upload");
			echo json_encode($resp);
		} else if ($ex->checkFileType($filename=$_FILES['solutionfiles']['name'])=="unwanted file types") {
			$resp = array("uploadSolution" => "fail", "error" => "Only html,php,css,js files are allowed");
			echo json_encode($resp);
		} else {
			$ex -> timeCompleted = time();
			$ex -> filename = $_FILES['solutionfiles']['name'];
			$ex -> filetmp_name = $_FILES['solutionfiles']['tmp_name'];
			$ex -> filetype = $_FILES['solutionfiles']['type'];
			$solfolder=$_POST['solutionId'];
			
			$ex->uploadSolution($solfolder);
		}

	}
}
?>

