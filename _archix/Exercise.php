<?php
/*
 * Exercise class to handle excercise uploads
 */

class Exercise {

	public $path;
	public $timeUploaded;
	public $assignee;
	public $timeCompleted;
	public $solutionPath;
	public $completed;
	public $assigned;
	public $filename;
	public $filetmp_name;
	public $filetype;
	public $filesize;
	private $solutionsFolder = "../exercises_solutions/";
	function getName() {
		include "dbconn.inc.php";
		$query = "SELECT name FROM excercise WHERE userCode=?";
		$stmt = $conn -> prepare($query);
		$stmt -> execute(array($this -> userCode));

		$data = $stmt -> fetchAll(PDO::FETCH_ASSOC);

		echo json_encode($data);
	}

	function uploadExercise() {

		$path = "exercises/" . $this -> filename;

		if (move_uploaded_file($this -> filetmp_name, $path)) {
			include "dbconn.inc.php";
			$query = "INSERT INTO exercises(exCode,path,timeUploaded,assignee,timeCompleted,solutionPath,format,size,completed,assigned) VALUES(?,?,?,?,?,?,?,?,?,?)";
			$stmt = $conn -> prepare($query);
			$data = array($this -> exCode, $path, $this -> timeUploaded, $this -> assignee, $this -> timeCompleted, $this -> solutionPath, $this -> filetype, $this -> filesize, $this -> completed, $this -> assigned);
			$stmt -> execute($data);
			if ($stmt -> rowCount() == 1) {
				return "uploaded";
			} else {
				return "error uploading";
			}
		} else {
			return "error uploading";
		}

	}

	function fetchAllEx() {
		include "dbconn.inc.php";
		$query = "SELECT exercises.exCode,exercises.path,exercises.timeUploaded,exercises.assigned,users.exCode,users.email FROM progex.exercises INNER JOIN progex.users on exercises.id=users.id WHERE exercises.assigned=0";
		$stmt = $conn -> prepare($query);
		$stmt -> execute();
		$data = $stmt -> fetchAll();
		echo json_encode($data);
	}
	function completedExercises($sessionId){
		include "dbconn.inc.php";
		
		$query = "SELECT * FROM exercises WHERE completed=1 AND assignee='".$sessionId."'";
		$stmt = $conn -> prepare($query);
		$stmt -> execute();
		$data = $stmt -> fetchAll();
		echo json_encode($data);
	}
	function pickExercise($query, $Arrdata) {
		include "dbconn.inc.php";
		$stmt = $conn -> prepare($query);
		$stmt -> execute($Arrdata);
		$count = $stmt -> rowCount();
		if ($count == 1) {
			echo json_encode(array("pickExercise" => "success", "message" => "picked"));
		} else {
			echo json_encode(array("pickExercise" => "fail", "message" => "An error occured,Kindly try again"));
		}

	}

	function uploadSolution($solfolder) {
		include "dbconn.inc.php";
		$soldir = $this -> solutionsFolder . $solfolder . "";
		$files=$this->filename;
		if (mkdir($soldir, 0777)) {

			$resp = '';

			///move multiple files
			$path = $this -> solutionsFolder . $solfolder . "/";
			$uploadedfiles;
			$erroruploadfiles;
			for ($i = 0; $i < count($files); $i++) {

				if (move_uploaded_file($this -> filetmp_name[$i], $path . $this -> filename[$i])) {
					$uploadedfiles[$i] = $this -> filename[$i];
				} else {
					$erroruploadfiles[$i] = $this -> filename[$i];
				}

			}//end of loop
			
			

			if (!empty($erroruploadfiles)) {
				$resp = array("uploadSolution" => "fail", "message" => "An error occured Please try again later.","failed uploads"=>$erroruploadfiles);
				echo json_encode($erroruploadfiles);
			} else if(count($uploadedfiles)==count($files)) {
				$query = "UPDATE exercises SET timeCompleted=?, solutionPath=?,completed=1 WHERE exCode=?";
				$data = array($this -> timeCompleted, $path, $solfolder);
				$stmt = $conn -> prepare($query);
				$stmt -> execute($data);
				if ($stmt -> rowCount() == 1) {
					$resp = array("uploadSolution" => "success", "message" => "Solution uploaded successfully");
				} else {
					$resp = array("uploadSolution" => "fail", "message" => "An error occured Please try again later.");
				}

			}		
			echo json_encode($resp);
		}else{
			$resp = array("uploadSolution" => "fail", "message" => "An error occured Please try again later.");
			echo json_encode($resp);
		}

	}

	function checkFileType($files) {
		$filetypes = array("php", "js", "html", "css");
		$response = '';
		for ($i = 0; $i < count($files); $i++) {
			$split = explode(".", $files[$i]);
			$ext = $split[1];

			if (!in_array($ext, $filetypes)) {
				$response = "unwanted file types";
				break;
			} else {
				$response = "files types are good";
			}

		}

		return $response;
	}

}
?>