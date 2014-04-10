<?php

global $conn;
$conn = '';
try {
	$conn = new PDO("mysql:host=localhost;dbname=progex;charset=utf8", "root", "");
	$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
	echo $e -> getMessage();
}
?>