<?php 
	if(session_status() == PHP_SESSION_NONE) session_start();
	if(isset($_SESSION['user'])){
		header("location:sales.php?".$_COOKIE['user']);
	}
?>
<?php include "../controllers/loginFunction.php"; ?>

<title>POS System</title>
<link rel="stylesheet" href="../css/formStyle.css" type="text/css">

<body>
	<div class="body-content">
		<div class="logContainer">
		<h1>Donut POS</h1>
			<form class="form" action="<?php $_PHP_SELF ?>" method = "POST">
				<input id="un" type="text" placeholder="Username" name="username" maxlength = "15"required />
				<input class="pw" id="pw" type="password" placeholder="Password" name="password" maxlength = "20" required />
				<input type="submit" value="Login" name="Login" class="btnLogin btnLogin-primary" required/>
			</form>
			<form class="form" action = "signup.php" method = "POST">
				<h3>No Account?</h3>
				<input type="submit" value="SignUp" name="SignUp" class="btnRegister  btnRegister-primary" />
			</form>
		</div>
	</div>
</body>