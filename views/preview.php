<?php 
	if(session_status() == PHP_SESSION_NONE) session_start();
	if(!isset($_SESSION['user'])){
		header("location:index.php");
	}
	include("../controllers/saleFunction.php"); 
?>

<?php include("header.php") ?>
 <script language="javascript">
	function clickheretoprint(){ 
			var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
			disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
			var content_vlue = document.getElementById("content").innerHTML;
			var docprint=window.open("","",disp_setting); 
			docprint.document.open(); 
			docprint.document.write('</head><body onLoad="self.print()" style="width: 800px; font-size: 13px; font-family: arial;">');          
			docprint.document.write(content_vlue); 
			docprint.document.close(); 
			docprint.focus();
	}

</script>
<script>
    function demoFromHTML() {
        var pdf = new jsPDF('p', 'pt', 'letter');
        // source can be HTML-formatted string, or a reference
        // to an actual DOM element from which the text will be scraped.
        source = $('#content')[0];

        // we support special element handlers. Register them with jQuery-style 
        // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
        // There is no support for any other type of selectors 
        // (class, of compound) at this time.
        specialElementHandlers = {
            // element with id of "bypass" - jQuery style selector
            '#bypassme': function (element, renderer) {
                // true = "handled elsewhere, bypass text extraction"
                return true
            }
        };
        margins = {
            top: 80,
            bottom: 60,
            left: 40,
            width: 522
        };
        // all coords and widths are in jsPDF instance's declared units
        // 'inches' in this case
        pdf.fromHTML(
            source, // HTML string or DOM elem ref.
            margins.left, // x coord
            margins.top, { // y coord
                'width': margins.width, // max width of content on PDF
                'elementHandlers': specialElementHandlers
            },

            function (dispose) {
                // dispose: object with X, Y of the last line add to the PDF 
                //          this allow the insertion of new lines after html
                pdf.save('<?php echo $_GET['orderNum']?>.pdf');
            }, margins
        );
    }
</script>
<body>
	<div id="content" class="rcont">
		<div class="preview-head-div">
			<script language="javascript">
				
			</script>
			<div style="width: 100%; height: 190px; border: 3px solid black;" >
			<center><div style="font:bold 25px 'Aleo';">Go Nuts Donuts</div>
					Go Nuts Donuts<br>
					Ood by. Mindanao Doughnut Corp.<br>
					Lower Ground, Gaisano Mall<br>
					JP Laurel Ave., Davao City<br>
					TIN: 000-060-027-002<br> <br>
					<div style="width: 47%">
							<span style="float: left">Store: 403</span><span style="float: right">Term#: 001 Trx:0000<?php echo $_GET['orderNum']?></span><br>
					</div>
					<div class="receipt-div">
						<table cellpadding="4" cellspacing="0" class="receipt-table">
							<tbody>
								<?php
									if($invoicerows->num_rows > 0){
									while($invoicerow = $invoicerows->fetch_assoc()){
								?>
								<tr>
									<td><?php echo $invoicerow['quantity']?></td>
									<td><?php echo $invoicerow['productName']?></td>
									<td><?php echo $invoicerow['price']*$invoicerow['quantity']?></td>
								</tr>
								<?php }} ?>
							</tbody>
						</table>
					</div>
					<?php 
						$total = $_GET['total'];
						$vat = (5 / 100) * $total;
						
					?>
					<div style="width: 47%; margin-top: 7px; margin-bottom: 15px;">
						<span style="float: left"><?php echo $_GET['totalitems']." ITEMS(S)" ?></span><span style="float: right">TOTAL: <?php echo $_GET['total']?></span><br>
					</div>
					<div style="width: 47%; ">
						<span style="float: left">CASH: </span><span style="float: right"> <?php echo $_GET['cash'] ?></span><br>
						<span style="float: left">VATable (V)</span><span style="float: right"><?php echo $total-$vat ?></span><br>
						<span style="float: left">Total Sale</span><span style="float: right"><?php echo $total-$vat ?></span><br>
						<span style="float: left">VAT</span><span style="float: right"><?php echo $vat ?></span><br>
						<span style="float: left">Total Amount</span><span style="float: right"><?php echo $_GET['total']?></span><br>
					</div>
					<div style="width: 47%; margin-top: 15px; ">
						<span style="float: left">DATE: <?php echo date('m-d-Y h:i:s')?></span><br>
						<span style="float: left">O.R. No.: 0000<?php echo $_GET['orderNum'] ?></span><br>
					</div>
					<div style="width: 35%; margin-top: 20px; margin-bottom: 10px; ">
						<span style="float: left">CASHIER NAME: <?php echo $_GET['cashiername'] ?></span><br>
					</div>
					<br>This serves as your official reciept<br>
					"Unclaimed orders after store closing<br>
					are non Refundable"<br>
					Enjoy your hot and fresh donuts today.<br>
					visit us at www.gonutsdonuts.com<br> <br>
					
				</center>
			</div>
		</div>
	</div>
	<div style="margin-right:100px;margin-top:150px;float:right">
		<a onclick="demoFromHTML()" hstyle="font-size:20px;"> <button class="btn-print"> Print</button></a>
	</div>
	
</body>
</html>