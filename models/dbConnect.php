<?php

	class DBConnect {
		protected $conn;

		function __construct() {
			//DB CREDENTIALS
			$dbhost = "localhost:3306";
			$dbuser = "root";
			$dbpass = "";
			$dbname = "appsys_db";

			$this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
			
			if(!$this->conn) {
				die("Could not connect: ".mysql_error());  
			} 
		
		}
		
		function endConnection() {
			mysqli_close($this->conn);
		}

	}

?>