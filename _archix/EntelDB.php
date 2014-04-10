<?php

/*
 Database Connector
 *
 */
class EntelDB {

	private $dbName = '';
	private $dbUsername = '';
	private $dbPassword = '';
	static protected $instance;
	public static $conn;
	function __construct($dbName, $dbUsername, $dbPassword) {
		$this -> dbName = $dbName;
		$this -> dbUsername = $dbUsername;
		$this -> dbPassword = $dbPassword;
		$this -> conn = new PDO("mysql:host=localhost;dbname=$dbName;charset=utf8", $dbUsername, $dbPassword);
		$this -> conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

}
?>