<?php
/*
 * User class
 */

include "_Global.php";
require_once "Exercise.php";
require_once "EntelDB.php";
class User {
	public $userCode;
	public $email;
	public $password;
	public $phonenumber;
	public $usertype;
	public $location;
	public $firstName;
	public $secondName;
	//programmer details
	public $languages;
	public $username;
	public static $dbconn;

	public function __construct() {
		$DB = new EntelDB("progex", "root", "");
		$this -> dbconn = $DB -> conn;
	}

	public function createUser() {

		include "dbconn.inc.php";
		require_once "_Global.php";
		$query = "INSERT INTO users(exCode,firstName,otherNames,email,acss,location,phonenumber,userType,createdStamp) VALUES(?,?,?,?,?,?,?,?,?)";
		//add username password to login
		//upload file type
		$values = array($this -> userCode, $this -> firstName, $this -> secondName, $this -> email, $this -> password, $this -> location, $this -> phonenumber, $this -> usertype, time());
		$stmt = $conn -> prepare($query);
		$stmt -> execute($values);

		if ($stmt -> rowCount() == 1) {
			return "details inserted";
		} else {
			return "error inserting details";
		}
	}

	public function createProgrammer() {
		include "dbconn.inc.php";
		$query = "INSERT INTO programmers(`exCode`, `firstName`, `secondName`, `email`, `username`, `password`,`location`,`phonenumber`, `timeStamp`, `languages`, `active`) VALUES(?,?,?,?,?,?,?,?,?,?,?)";

		$values = array($this -> userCode, $this -> firstName, $this -> secondName, $this -> email, $this -> username, $this -> password, $this -> location, $this -> phonenumber, time(), $this -> languages, 0);
		$stmt = $conn -> prepare($query);
		$stmt -> execute($values);
		$feedback = '';
		if ($stmt -> rowCount() == 1) {
			$feedback = array("action" => "Create Programmer", "Message" => "Programmer created successfully", "success" => "true");
		} else {
			$feedback = array("action" => "Create Programmer", "Message" => "Error creating Programmer,Please try again Later", "success" => "false");
		}
		echo json_encode($feedback);
	}

	function generateUserCode($length = 10) {
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}

	function getBillingEmail($userId) {
		include "dbconn.inc.php";
		$query = "SELECT email from users WHERE exCode=?";
		$stmt = $conn -> prepare($query);
		$stmt -> execute(array($userId));
		$data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
		$email = $data[0]["email"];
		return $email;
		/*
		 *
		 while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		 echo $row['email'];
		 }*/

	}

	function genRandAuth() {
		$length = 7;
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}

	function myExercises() {
		$userId = $_SESSION['userId'];
		$query = "SELECT exCode,path,timeUploaded,format FROM exercises WHERE assignee=? AND assigned=1 AND completed=0";
		$array = array($userId);
		$stmt = $this -> dbconn -> prepare($query);
		$stmt -> execute($array);
		$data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($data);
	}

}
?>
