<?php
	include "../models/usersModel.php";
	
	$db = new usersModel();
	
	$username = htmlentities(isset($_REQUEST['username'])?$_REQUEST['username']:NULL);
	$password = htmlentities(isset($_REQUEST['password'])?$_REQUEST['password']:NULL);
	
	
	$login = isset($_REQUEST['login'])?$_REQUEST['login']:NULL;
	
	$rows = $db->getName($username);
	$row = $rows->fetch_assoc();
	
	
	if (isset($_REQUEST['Login']) && $_REQUEST['Login'] == "Login") {
		$result = $db->userCheck($username, $password);
		
		if ($result){
			$_SESSION['user'] = $username;
			setcookie('user', $username, time()+86400);
			header("location:sales.php?".$username);
		}else{
			echo '<script language="javascript">';
			echo 'alert("Wrong Username/Password")';
			echo '</script>';
		
		}
	}
	
	$db->endConnection();
?>