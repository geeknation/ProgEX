<?php
/*
 global function class
 */

class _Global {
	function generateRandomString($length = 10) {
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}
	function genUniqId(){
		$uniqid=uniqid($this->generateRandomString());
		return $uniqid;
	}
}
?>