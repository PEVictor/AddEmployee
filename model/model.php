<?php

require 'vendor/autoload.php';
require 'database/Database.php';

function createUser($email, $admin, $visible, $permissions, $data) {

	if (!checkUserEmailExist($email)) {

		$password = generatePass();
		$pass_encrypt = password_hash($password, PASSWORD_DEFAULT, array('cost' =>14));

		$connection = new Database();
	    $sql = "INSERT INTO addemployee_user VALUES('', ?, ?, ?)";
	    $query = $connection->prepare($sql);
	    $query->bindParam(1, $email);
	    $query->bindParam(2, $pass_encrypt);
	    $query->bindParam(3, $admin);
	    $query->execute();

	    $id_user = getUserId($email);
	    $creation_date = getdate()["year"]."-".getdate()["mon"]."-".getdate()["mday"];

	    $connection = new Database();
	    $sql = "INSERT INTO addemployee_employees (id_user, creation_date, visible, permissions) VALUES(?, ?, ?, ?)";
	    $query = $connection->prepare($sql);
	    $query->bindParam(1, $id_user);
	    $query->bindParam(2, $creation_date);
	    $query->bindParam(3, $visible);
	    $query->bindParam(4, $permissions);
	    $query->execute();

	    // TODO: Insertar data (arrayKey);

	    return $password;

    }
    return false;
}

function getUserId($email) {
    $connection = new Database();
    $sql = "SELECT id FROM addemployee_user WHERE email = ?";
    $query = $connection->prepare($sql);
    $query->bindParam(1, $email);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC)[0]["id"];
}

function getUserName($id_user) {
    $connection = new Database();
    $sql = "SELECT name FROM addemployee_employees WHERE id_user = ?";
    $query = $connection->prepare($sql);
    $query->bindParam(1, $id_user);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC)[0]["name"];
}

function getUserPass($id_user) {
    $connection = new Database();
    $sql = "SELECT pass FROM addemployee_user WHERE id_user = ?";
    $query = $connection->prepare($sql);
    $query->bindParam(1, $id_user);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC)[0]["id_user"];
}

function generatePass() {
    $length = 12;
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function checkUserEmailExist($email) {
    if ( filter_var($email, FILTER_VALIDATE_EMAIL) ) {
        $connection = new Database();
        $sql = "SELECT * FROM addemployee_user WHERE email = ?";
        $query = $connection->prepare($sql);
        $query->bindParam(1, $email);
        $query->execute();
        $row = $query->fetch();
        if ($row == null) {
            return false;
        }
        else {
            return true;
        }
    }
    else {
        return false;
    }
}

function checkUser($email, $password) {
    $connection = new Database();
    $sql = "SELECT * FROM addemployee_user WHERE email = ?";
    $query = $connection->prepare($sql);
    $query->bindParam(1, $email);
    $query->execute();
    $row = $query->fetch();
    $pass_encrypt = $row[2];
    if ($row == null) {
        return false;
    }
    else {
        if (password_verify($password, $pass_encrypt)) {
            return true;
        }
        else {
            return false;
        }
    }
}

function getAllEmployees($admin) {
    if ($admin) {
        $sql = "SELECT id_user, creation_date, visible, permissions, name, last_name FROM addemployee_employees";
    } else {
        $sql = "SELECT id_user, creation_date, name, last_name FROM addemployee_employees WHERE visible = 0";
    }
    $connection = new Database();
    $query = $connection->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

?>