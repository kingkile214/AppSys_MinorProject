<html>
<head>
	<title> POS System </title>
	<link rel="stylesheet" type="text/css" href="../css/Style.css">
	<link rel="icon" type="../image/png" href="../images/favicon.png">
	<?php date_default_timezone_set('Asia/Manila'); ?>
	 <script language="javascript" type="text/javascript">
		var timerID = null;
		var timerRunning = false;
		function stopclock (){
		if(timerRunning)
			clearTimeout(timerID);
			timerRunning = false;
		}
		function showtime () {
			var now = new Date();
			var hours = now.getHours();
			var minutes = now.getMinutes();
			var seconds = now.getSeconds()
			var timeValue = "" + ((hours >12) ? hours -12 :hours)
			if (timeValue == "0") timeValue = 12;
				timeValue += ((minutes < 10) ? ":0" : ":") + minutes
				timeValue += ((seconds < 10) ? ":0" : ":") + seconds
				timeValue += (hours >= 12) ? " P.M." : " A.M."
				document.clock.face.value = timeValue;
				timerID = setTimeout("showtime()",1000);
				timerRunning = true;
				}
		function startclock() {
				stopclock();
				showtime();
		}
		window.onload=startclock;
	</script>
	<script type="text/javascript" src="../js/jspdf.min.js"></script>
	<script type="text/javascript" src="../js/jquery-latest.js"></script> 
	<script type="text/javascript" src="../js/jquery.tablesorter.min.js"></script>
	<link href="../css/blue/style.css" rel="stylesheet" type="text/css" >
	
</head>