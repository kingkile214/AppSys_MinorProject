<?php 
	if(isset($_SESSION['user'])){
		header("location:sales.php?".$_COOKIE['user']);
	}
?>
<?php include "../controllers/registerFunction.php"?>

<script language="javascript">
	function validateForm() {
		var uname = document.getElementById("un");
		var pword = document.getElementById("pw");
        var fname = document.getElementById("fn");
        var lname = document.getElementById("ln");
		if(/^[a-zA-Z\d- ]{8,15}$/.test(uname.value) == false) {
 		    alert("Invalid Username");
			return false;
		}
		if(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\d])(?=.*[!@#$%^&*_=;:'",.<>?`~[\]\(\)\-\\\/]).{8}$/.test(pword.value) == false) {
 		    alert("Invalid Password");
			return false;
		}
    	if(/^[a-zA-Z- ]*$/.test(fname.value) == false) {
 		    alert("Invalid First Name");
			return false;
		}
    	if(/^[a-zA-Z- ]*$/.test(lname.value) == false) {
            alert("Invalid Last Name");
			return false;
    	}
    }
</script>
<title>Sign Up</title>
<link rel="stylesheet" href="../css/formStyle.css" type="text/css">
<div class="body-content">
	<div class="regContainer">
    <h1>Sign Up</h1>
		<form class="form" action = "<?php $_PHP_SELF ?>" method = "POST">
		<input id="un" type="text" placeholder="Username" name="username" maxlength = "15"  title="At least 6 characters" required />
		<input id="pw" type="password" placeholder="Password" name="password"  maxlength ="15"  title="At least 1 Uppercase, lowercase, number and symbol characters" required />
		<input id="ln"type="text" placeholder="Last Name" name="lastname" required />
		<input id="fn"type="text" placeholder="First Name" name="firstname" required />
		<input type="date" placeholder="Birthdate" name="birthdate" required />
		Gender:
		<input type="radio" value="Male" name="gender" required /> Male
		<input type="radio" value="Female" name="gender" required /> Female
		<input type="radio" value="Other" name="gender" required /> Other
		<input type="submit" value="Submit" name="Submit" class="btnRegister  btnRegister-primary" />
		</form>
		<form class="form" action = "index.php" method = "POST">
				<h3>Already have an Account?</h3>
				<input type="submit" value="Login" name="back" class="btnLogin btnLogin-primary" />
			</form>
	</div>
</div>