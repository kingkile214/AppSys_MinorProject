<?php 
	if(session_status() == PHP_SESSION_NONE) session_start();

	if(!isset($_SESSION['user'])){
		header("location:index.php");
	}
	include("../controllers/saleFunction.php");
?>

<?php include("header.php"); ?>
<body>
	<?php include("topnav.php") ?>
	<div class="outcon">
		<div class="inhead"> 
			<span class="headtitle"> Sales </span>
		</div>
		<div class="contentcon">
			<div class="searchcon"> 
				<form action="<?php $_PHP_SELF ?>" method="post" >
					<select class="search" name="PID" required>
						<option disabled selected>Please Select a Product</option>
						<?php
							if($rows->num_rows > 0){
							while($row = $rows->fetch_assoc()){
						?>
						<option  value="<?php echo $row['productID']?>" ><?php echo $row['productID']?> - <?php echo $row['productName']?></option>
						<?php }} ?>
					</select>
					<input class="sqty" type="number" min="0" placeholder="QTY" name="qty" value="qty" required>
					<button class="btn-add" type="submit" name="add" value="add">Add</button>
					<span id="orderno">Order No: <?php echo $orderNum ?></span>
				</form>
				<form action="<?php $_PHP_SELF ?>" method="POST">
				<table class="tbl-sale"> 
					<thead>
						<th>Product ID</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Amount</th>
						<th>Action</th>
					</thead>
					<tbody>
						<?php
							$totalAmount = 0;
							$totalItems = 0;
							if($invoicerows->num_rows > 0){
							while($invoicerow = $invoicerows->fetch_assoc()){
						?>
						<tr class="salercd">
							<td><input type="hidden" name="productID" value="<?php echo $invoicerow['productID'];?>"/><?php echo $invoicerow['productID'];?></td> 
							<td name="productName"><?php echo $invoicerow['productName'];?></td>
							<td name="price"><?php echo $invoicerow['price'];?></td>
							<td class="qtyrow" name="quantity" width="11%"><?php echo $invoicerow['quantity'];?></td>
							<td name="amount" width="11%"><?php echo $invoicerow['amount']; ?></td>
							<input type="hidden" name="totalAmount" value = "<?php $totalAmount = $totalAmount + $invoicerow['amount']?>" > 
							<td width="5%">
								<a href="sales.php?username=<?php echo $_GET['username'];?>&delID=<?php echo $invoicerow['productID'];?>&delete=yes" class="btn-cancel" type="submit" name="cancel" value="cancel">Cancel</a>
							</td>
						</tr>
						<?php $totalItems = $totalItems+1;}} ?>
						<tr>
						<th> </th>
						<th> </th>
						<th> </th>
						<th> </th>
						<td name="total">Total:<?php echo $totalAmount?></td>
						<th>  </th>				
						</tr>
					</tbody>		
				</table>
				<script type="text/javascript">
					function voidPrompt(username) {
						var pass = "1234";
						var result = window.prompt("Enter Password: ");
						if (result==pass) {
							window.location.href="sales.php?username=" + username + "&void=yes";
						} 
						else {
							window.alert("Invalid Password");
							location.reload();
						}
							
					}
					function checkoutPrompt(username) {
						var orderNum = "<?php echo $orderNum;?>";
						var totalamount = parseFloat('<?php echo $totalAmount;?>');
						var totalitems = "<?php echo $totalItems;?>";
						var cashiername = "<?php echo $namerow['firstname'];?>";
						cartFinal = confirm("Confirm Sale and preview Reciept?");
						if(cartFinal){
							var cash = parseFloat(prompt("Enter Cash"));
							if(cash>=totalamount){
							result = confirm("Check Out?");
							if (result) {
								window.open("preview.php?username="+ username + "&orderNum=" + orderNum + "&cashiername=" + decodeURI(cashiername) + "&total=" + totalamount + "&cash=" + cash + "&totalitems=" + totalitems , "" ,"location=no,menubar=no,resizable=no,left=350px, top=100px,width=400px,height=400");
								window.location.href="sales.php?username=" + username + "&orderNum=" + orderNum + "&cashiername=" + decodeURI(cashiername) + "&total=" + totalamount + "&cash=" + cash + "&totalitems=" + totalitems + "&checkout=yes";
							} 
							else location.reload();
							}
							if(cash<totalamount){
								alert("Insufficient Funds");
								location.reload();
							}
						}
						else location.reload();
					}
				</script>
					<div class="btnContainer">
					<div class ="btn-checkout-div">
						<a class="<?php if ($totalItems== '0'){ ?>disableClick<?php }else{?>btn-checkout<?php } ?>" onclick="checkoutPrompt('<?php echo $_GET['username'];?>')" ><span>Check Out</span></a>
					</div>
					<div class = "btn-void-div">
						<a class="btn-void"  onclick="voidPrompt('<?php echo $_GET['username'];?>')"><span>Void</span></a>
					</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>