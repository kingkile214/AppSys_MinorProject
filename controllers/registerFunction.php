<?php
	include "../models/usersModel.php";

	$username = isset($_REQUEST['username'])?$_REQUEST['username']:NULL;
	$password = isset($_REQUEST['password'])?$_REQUEST['password']:NULL;
	$lname = isset($_REQUEST['lastname'])?$_REQUEST['lastname']:NULL;
	$fname = isset($_REQUEST['firstname'])?$_REQUEST['firstname']:NULL;
	$bday = isset($_REQUEST['birthdate'])?$_REQUEST['birthdate']:NULL;
	$gender = isset($_REQUEST['gender'])?$_REQUEST['gender']:NULL;
	
	$obj = new usersModel();
	
	if (isset($_REQUEST["Submit"]) && $_REQUEST["Submit"] == "Submit") {
		$obj -> addUser($username, $password, $lname, $fname, $bday, $gender);
	}

?>