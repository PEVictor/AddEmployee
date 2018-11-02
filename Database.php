<?php

$dbname = "test";
$username = "root";
$password = "";

class Database extends PDO {
	function __contruct() {
		$dns = "mysql:dbname=".$dbname;
		$username = $username;
		$password = $password;
		try {
			parent::__contruct($dns, $username, $password);
			$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			echo "ERROR: ".$e->getMessage();
		}
	}
}


?>