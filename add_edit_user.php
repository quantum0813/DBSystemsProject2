<?php
	include_once 'db_connect.php';
	include_once 'functions.php';

	if ($_POST["action"] == "add") {
		addUser($_POST["fname"], $_POST["lname"], $_POST["email"], $_POST["phone"], $_POST["gender"], $_POST["street"], $_POST["city"], $_POST["state"], $_POST["zip"], $mysqli);
	} else if ($_POST["action"] == "edit") {
		updateUser($_POST["id"], $_POST["fname"], $_POST["lname"], $_POST["email"], $_POST["phone"], $_POST["gender"], $_POST["street"], $_POST["city"], $_POST["state"], $_POST["zip"], $mysqli);
	} else if ($_POST["action"] == "remove") {
		removeUser($_POST["id"], $mysqli);
	}
?>
