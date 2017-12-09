<head>
	<link rel="stylesheet" type="text/css" href="../css/Style.css">
</head>
<?php
	if (isset($_REQUEST['logout']) && $_REQUEST['logout'] == "Log Out") {
		deleteCookies();
		session_unset($_SESSION['user']);
		session_destroy();
		header("location: index.php");
	}
	
	function deleteCookies() {
		if (isset($_SERVER['HTTP_COOKIE'])) {
			$cookies=explode(';',$_SERVER['HTTP_COOKIE']);
			foreach($cookies as $cookie) {
				$parts=explode('=',$cookie);
				$name=trim($parts[0]);
				setcookie($name,'',time()-1000);
				setcookie($name,'',time()-1000,'/');
			}
		}
	}
?>