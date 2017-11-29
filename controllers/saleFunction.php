<?php
	include "../models/ordersModel.php";
	date_default_timezone_set('Asia/Manila');
	$db = new ordersModel();
	
	$orderNum = $db->getNumRows()+1;
	$username = isset($_REQUEST['username'])?$_REQUEST['username']:NULL;
	$currID = isset($_REQUEST['PID'])?$_REQUEST['PID']:NULL;
	$currQty = isset($_REQUEST['qty'])?$_REQUEST['qty']:NULL;
	$cash = isset($_REQUEST['cash'])?$_REQUEST['cash']:NULL;
	
	$invoiceProdInfo = $db->getProduct($currID);
	$invoiceProdInfoRow = $invoiceProdInfo->fetch_assoc();
	$amount = $invoiceProdInfoRow['price']*$currQty;
	$currProductName = $invoiceProdInfoRow['productName'];
	$currPrice = $invoiceProdInfoRow['price'];
	
	
	
	
	$username = isset($_GET['username']);
	$deleteFlag = isset($_GET['delete']);
	$checkoutFlag = isset($_GET['checkout']);
	$voidFlag = isset($_GET['void']);
	
	$namerows = $db->getName($username);
	$namerow = $namerows->fetch_assoc();
	$invoicerows = $db->getInvoice($orderNum);
	$orderrows = $db->getOrders();
	$rows = $db->getProducts();
	
	
	if(isset($_REQUEST['add']) && $_REQUEST['add'] == "add"){
		if($currQty<=$invoiceProdInfoRow['stock']){
			$result = $db->addInvoice($orderNum, $currID, $currProductName, $currPrice, $currQty, $amount  );
			header("location: sales.php?username=".$_COOKIE['user']);
		}
		else{
			echo '<script language="javascript">';
			echo 'alert("Insufficient stock for Order")';
			echo '</script>';
		}
	}
	
	if($deleteFlag == true){
		$delID = $_GET['delID'];
		$result = $db->delInvoice($orderNum, $delID);
		header("location: sales.php?username=".$_COOKIE['user']);
	}
	
	if($checkoutFlag == true){
		$cashiername = $namerow['firstname'];
		$total = $_GET['total'];
		$cash = $_GET['cash'];
		$totalitems =  $_GET['totalitems'];
		$order_date =date('Y-m-d');
		$order_time = date('H:i:sa');
		$result = $db->addOrder($orderNum, $cashiername, $total, $cash, $totalitems, $order_date, $order_time);
		
		$toUpdateData = $db->getInvoicePID($orderNum);
		if($toUpdateData->num_rows > 0){
			while($toUpdateRow = $toUpdateData->fetch_assoc()){
				$result2 = $db->updateStock($toUpdateRow['productID'], $toUpdateRow['quantity']);
			}
		}
		
		$orderNum = $orderNum+1;
		header("location: sales.php?username=".$_COOKIE['user']);
	}
	
	if($voidFlag == true){		
		$result = $db->delAllInvoice($orderNum);
		header("location: sales.php?username=".$_COOKIE['user']);
	}
	
	$db->endConnection();
?>