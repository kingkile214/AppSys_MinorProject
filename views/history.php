<?php 
	if(session_status() == PHP_SESSION_NONE) session_start();
	if(!isset($_SESSION['user'])){
		header("location:index.php");
	}
	include "../controllers/saleFunction.php"; 
?>

<?php include("header.php") ?>
<body>
	<?php include("topnav.php") ?>
	<div class="outcon">
		<div class="inhead"> 
			<span class="headtitle"> Sales History </span>
		</div>
		<div class="contentcon">
		<table id="historytable" class="tablesorter"> 
			<thead>
				<th>Order Number</th>
				<th>Cashier Name</th>
				<th>Total Amount</th>
				<th>Cash</th>
				<th>Total Items</th>
				<th>Order Date</th>
				<th>Order Time</th>
			</thead>
			<tbody>
				<?php
					$totalTA = 0;
					if($orderrows->num_rows > 0){
						while($orderrow = $orderrows->fetch_assoc()){
				?>
				<tr class="salercd">
					<td><?php echo $orderrow['orderNum']; ?></td> 
					<td><?php echo $orderrow['cashiername'];?></td>
					<td><?php echo $orderrow['totalamount']; $totalTA = $totalTA + $orderrow['totalamount'] ;?></td>
					<td><?php echo $orderrow['cash'];?></td>
					<td><?php echo $orderrow['totalItems'];?></td>
					<td><?php echo $orderrow['order_date'];?></td>
					<td><?php echo $orderrow['order_time'];?></td>
				</tr>
				<?php }} ?>
			</tbody>	
		</table>
		<div class="totalcontainer">
			<span>Total Amount Sold: P<?php echo $totalTA ?>.00</span>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){ 
				$("#historytable").tablesorter( {sortList: [[0,0], [1,0]]} ); 
				} );
		</script>
		</div>
	</div>
</body>
</html>