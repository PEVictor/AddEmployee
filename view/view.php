<?php

function printLogin($error) {
	$logged = false;
	include('header.php');
	include('login.php');
	include('footer.php');
}

function printHome($name) {
	$logged = true;
	include('header.php');
	include('home.php');
	include('footer.php');
}

function printEmployeesList($name, $employees, $admin) {
	$logged = true;
	include('header.php');
	include('employees.php');
	include('footer.php');
}

function printDocumentsList($name) {
	$logged = true;
	include('header.php');
	include('documents.php');
	include('footer.php');
}

?>