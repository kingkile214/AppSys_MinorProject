<?php
	include "../models/ordersModel.php";
	
	$db = new ordersModel();
	
	$username = $_COOKIE['user'];
	
	$namerows = $db->getName($username);
	$namerow = $namerows->fetch_assoc();
	
	$orderrows = $db->getOrders();
	
	$db->endConnection();
?>