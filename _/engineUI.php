<?php
require_once("../_archix/UI.php");

$ui=new UI();

if(isset($_GET['flag'])){
	$flag=$_GET['flag'];
	
	if($flag=="create-programmer"){
		
		echo $ui->createProgrammer;
			
	}
	if($flag=="upload_solution_modal"){
		echo $ui->uploadSolutionUI($_GET['id']);
	}
}
?>