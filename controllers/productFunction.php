<?php
	include "../models/productsModel.php";
	
	$db = new productsModel();
	
	$username = $_COOKIE['user'];
	
	$namerows = $db->getName($username);
	$namerow = $namerows->fetch_assoc();
	
	$productrows = $db->getProducts();
	
	$db->endConnection();
?>