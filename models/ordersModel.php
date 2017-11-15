<?php
	include "../models/dbConnect.php";

	class ordersModel extends dbConnect {	
		function addInvoice($orderNum, $currID, $currProductName, $currPrice, $currQty, $amount){
			$query = "INSERT INTO invoices(orderNum, productID, productName, price, quantity, amount)
					VALUES
						(\"".$orderNum."\",
						\"".$currID."\",
						\"".$currProductName."\",
						\"".$currPrice."\",
						\"".$currQty."\",
						\"".$amount ."\")
					";
			$result = mysqli_query($this -> conn, $query) or die(mysqli_error($this -> conn));
			if(!$result) die(mysqli_error($this->conn));
			return $result;
		}
		
		function addOrder($orderNum, $cashiername, $total, $cash, $totalitems, $order_date, $order_time){
			$query = "INSERT INTO orders (orderNum, cashiername, totalamount, cash, totalitems, order_date, order_time)
					VALUES
						(\"".$orderNum."\",
						\"".$cashiername."\",
						\"".$total."\",
						\"".$cash."\",
						\"".$totalitems."\",
						\"".$order_date."\",
						\"".$order_time."\" )
					";
			$result = mysqli_query($this -> conn, $query);
			
			if(!$result) die(mysqli_error($this->conn));
			
			return $result;
		}
		
		function getOrders(){
			$query = "SELECT * FROM orders";
			
			$result = mysqli_query($this -> conn, $query);
			
			return $result;
		}
		
	}
?>