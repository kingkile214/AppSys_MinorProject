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

		function updateStock($productID, $quantity){
			$query = "UPDATE products SET stock = stock - \"".$quantity."\" WHERE productID = \"".$productID."\" ";
			
			$result = mysqli_query($this -> conn, $query);
			
			if(!$result) die(mysqli_error($this -> conn));
			
			return $result;
		}
		
		function delInvoice($orderNum, $productID){
			$query = "DELETE FROM invoices WHERE orderNum = \"".$orderNum."\"  AND productID = \"".$productID."\" ";
			
			$result = mysqli_query($this -> conn, $query);
			
			if(!$result) die(mysqli_error($this -> conn));
			
			return $result;
		}
		
		function delAllInvoice($orderNum){
			$query = "DELETE FROM invoices WHERE orderNum = \"".$orderNum."\" ";
			
			$result = mysqli_query($this -> conn, $query);
			
			if(!$result) die(mysqli_error($this -> conn));
			
			return $result;
		}
		
		function getInvoice($orderNum){
			$query = "SELECT * FROM invoices WHERE orderNum = \"".$orderNum."\" ";
			
			$result = mysqli_query($this -> conn, $query);
			
			return $result;
		}
		
		function getInvoicePID($orderNum){
			$query = "SELECT * FROM invoices WHERE orderNum = \"".$orderNum."\" ";
			
			$result = mysqli_query($this -> conn, $query);
			
			return $result;
		}
		
		function getProduct($productID){
			$query = "SELECT * FROM products WHERE productID = \"".$productID."\" ";
			
			$result = mysqli_query($this -> conn, $query);
			
			return $result;
		}
		
		function getProducts(){
			$query = "SELECT * FROM products";
			
			$result = mysqli_query($this -> conn, $query);
			
			return $result;
		}
		function getName($username){
			$query = "SELECT * FROM users WHERE username = \"".$username."\"" ;
			
			$result = mysqli_query($this -> conn, $query);
			
			return $result;
		}
		
		function getNumRows(){
			$query = "SELECT * FROM orders";
			
			$result = mysqli_query($this -> conn, $query);
			
			$orderNum =$result->num_rows;
			
			return $orderNum;
		}
	}
?>