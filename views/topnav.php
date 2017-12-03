<?php include("../controllers/logoutFunction.php"); ?>
<div class="topnav">
	<div class="tcont">
		<span id="toptitle">POS System</span>
	</div>	
	<div class="logout">
		<form id="logoutForm" action="<?php $_PHP_SELF ?>" method="post">
			<input type="submit" name="logout" id="logout" value="Log Out"/>
		</form>
		<!-- <a id="logoutlink" href="#" onclick="Out()"><span id="logout">Log out</span></a> -->
	</div>
	<div class="welcome">
		<span id="welcome"> Welcome: <?php echo $_SESSION['user'] ?></s> 
	</div>
</div>

<div class="sidenav">
	<ul>
		<li class="menuitem-sales"><a class="menulink" href=<?php echo "sales.php?username=".$_COOKIE['user']?>><span>Sales</span></a></li>
		<li class="menuitem-history"><a class="menulink" href=<?php echo "history.php?username=".$_COOKIE['user']?>><span>History</span></a></li>
		<li class="menuitem-products"><a class="menulink" href=<?php echo "products.php?username=".$_COOKIE['user']?>><span>Products</span></a></li>
	</ul>
	<div class="clockcon">
		<form name="clock">
			<font color="white">Time: <br></font>&nbsp;<input style="width:150px;" type="submit" disabled="disabled"  name="face">
		</form>
	</div>	
</div>