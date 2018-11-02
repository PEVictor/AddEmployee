<?php

function printLogin($error) {
	include('header.php');
	include('login.php');
	include('footer.php');
}

function printHome($name) {
	include('header.php');
	include('home.php');
	include('footer.php');
}

function printEmployeesList($name) {
	include('header.php');
	include('employees.php');
	include('footer.php');
}

function printDocumentsList($name) {
	include('header.php');
	include('documents.php');
	include('footer.php');
}

?>