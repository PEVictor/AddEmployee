<?php

require 'model/model.php';
require 'view/view.php';

function closeSession() {
    session_destroy();
}

function startSession($id_user, $name) {
    $_SESSION["logged"] = true;
    $_SESSION["id_user"] = $id_user;
    $_SESSION["name"] = $name;
}

// $new_user = createUser("user@admin.com", 1, 1, "rcd", null);
// if ($new_user) {
// 	echo $new_user;
// }

session_start();

if (isset($_SESSION["logged"]) && $_SESSION["logged"] == true) {
	if (isset($_GET["nav"]) && $_GET["nav"] == "employees") {
		printEmployeesList($_SESSION["name"], getAllEmployees(true), true);
	} elseif (isset($_GET["nav"]) && $_GET["nav"] == "documents") {
		printDocumentsList($_SESSION["name"]);
	} elseif (isset($_GET["nav"]) && $_GET["nav"] == "close") {
		closeSession();
		header("Location: index.php");
	} else {
		printHome($_SESSION["name"]);
	}
} else {
	if (isset($_POST["login"])) {
		if (checkUser($_POST["email"], $_POST["password"])) {
			startSession(getUserId($_POST["email"]), getUserName(getUserId($_POST["email"])));
			header("Location: index.php");
		} else {
			printLogin(true);
		}
	} else {
		printLogin(false);
	}
}

?>