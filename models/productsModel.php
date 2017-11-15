<?php
	include "../models/dbConnect.php";

	class productsModel extends dbConnect {	
		function getProducts(){
			$query = "SELECT * FROM products";
			
			$result = mysqli_query($this -> conn, $query);
			
			return $result;
		}
		
		function getProductID(){
			$query = "SELECT productID FROM products";
			
			$result = mysqli_query($this -> conn, $query);
			
			return $result;
		}
		
		function getName($username){
			$query = "SELECT * FROM users WHERE username = \"".$username."\"" ;
			
			$result = mysqli_query($this -> conn, $query);
			
			return $result;
		}

	}

?>