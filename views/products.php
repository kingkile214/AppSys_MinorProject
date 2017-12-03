<?php 
	if(session_status() == PHP_SESSION_NONE) session_start();
	if(!isset($_SESSION['user'])){
		header("location:index.php");
	}
	include "../controllers/productFunction.php"; 
?>
<?php include("header.php") ?>
<body>
	<?php include("topnav.php") ?>
	<div class="outcon">
		<div class="inhead"> 
			<span class="headtitle"> Products </span>
		</div>
		<div class="contentcon">
		<table id = "producttable" class="tablesorter"> 
			<thead>
				<th>Product ID</th>
				<th>Product Name</th>
				<th>Price</th>
				<th>Stock</th>
			</thead>
			<tbody>
				<?php
					if($productrows->num_rows > 0){
						while($productrow = $productrows->fetch_assoc()){
				?>
				<tr class="salercd">
					<td><?php echo $productrow['productID'];?></td> 
					<td><?php echo $productrow['productName'];?></td>
					<td><?php echo $productrow['price'];?></td>
					<td><?php echo $productrow['stock'];?></td>
					</tr>
					<?php }} ?>
					</tbody>	
				</table>
				<script type="text/javascript">
				$(document).ready(function(){ 
					$("#producttable").tablesorter( {sortList: [[0,0], [1,0]]} ); 
				} );
		</script>
		</div>
	</div>
</body>
</html>