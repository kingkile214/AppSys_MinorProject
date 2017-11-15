<?php
	include "../models/dbConnect.php";


	class usersModel extends dbConnect {	
	
		function userCheck($username, $password) {
				
			$query = "SELECT username, password FROM users
					  WHERE username = \"".$username."\" AND password=\"".$password."\"";

			$result = mysqli_query($this->conn, $query);
			
			if(!$result) {
				die("<strong>WARNING:</strong><br>".mysqli_error());
			}

			return (($result->num_rows==1)? TRUE: FALSE);
		}
		
		function addUser($username, $hash, $lastname, $firstname, $birthdate, $gender) {
			$query =	"INSERT INTO users (username, password, lastname, firstname, birthdate, gender) VALUES (\"".$username."\", \"".$hash."\" ,\"".$lastname."\", \"".$firstname."\", \"".$birthdate."\", \"".$gender."\");";
			
			$result = mysqli_query($this -> conn, $query);
			
			if (!$result) {
				die ("Error in Database Query".mysqli_error());
			} else echo "Succesful Insert.";
			
		}
		
		function getName($username){
			$query =	"SELECT * FROM users WHERE username = \"".$username."\"" ;
			
			$result = mysqli_query($this -> conn, $query);
			
			return $result;
		}

	}
?>