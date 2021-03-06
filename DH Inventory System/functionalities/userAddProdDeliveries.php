<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Add Product Deliveries</title>

		<!-- Database Connection -->
		<?php include('dbcon.php'); ?>
	
		<!-- Login Session -->
		<?php 
			session_start();
			$role = $_SESSION['sess_role'];
			if (!isset($_SESSION['id']) || $role!="user") {
				header('Location: index.php');
			}
			$session_id = $_SESSION['id'];
			$session_query = $conn->query("select * from users where userName = '$session_id'");
			$user_row = $session_query->fetch();
			error_reporting(0);
		?>

		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link rel="shortcut icon" href="../logo.jpg">
		
		<!-- Custom CSS for this template -->
		<link href="../css/custom.css" rel="stylesheet">
		<link href="../css/sidebar.css" rel="stylesheet">
			
		<!-- Javascript Files -->
		<script src="../js/incoming.js"></script>
		<script src="../js/bootstrap.js"></script>
		<script src="../js/jquery-3.2.0.min.js"></script>	
		<script src="../js/bootstrap.min.js"></script>
		<script src="../alertboxes/sweetalert2.min.js"></script>
		<link rel="stylesheet" href="../alertboxes/sweetalert2.min.css">
		
		<!-- Autocomplete Script -->
		<link rel="stylesheet" href="../css/jquery-ui.css">
		<script src="../js/jquery-1.9.1.js"></script>
		<script src="../js/jquery-ui.js"></script>
		
		<!-- Datatables CSS and JS Files -->
		<script src="../datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="../datatables/media/js/dataTables.bootstrap.min.js"></script>
		<link href="../datatables/media/css/dataTables.bootstrap.min.css" rel="stylesheet">	
		<link href="../datatables/media/css/jquery.dataTables.min.css" rel="stylesheet">
		
		<script>
		  $(function() {
			$('.thisProduct').autocomplete({
				minLength:2,
				source: "../search.php"
			});
		  });
		</script> 
		
		<script>
		  $(function() {
			$('#supplier').autocomplete({
				minLength:2,
				source: "../searchSup.php"
			});
		  });

		</script>
		
		<!-- Datatables Script -->
		<script>
			$(document).ready(function(){
				$('#myTable').dataTable();
			});
		</script>
			
	</head>

	<body>
		<!-- Retrieve Incoming Data -->
		<?php 
			$varPO = $_GET['po'];
			
			$checkDatabase = current($conn->query("SELECT incoming.inID FROM incoming WHERE PONumber = '$varPO'")->fetch());
			$poDate = current($conn->query("SELECT purchaseorders.poDate FROM purchaseorders WHERE purchaseorders.poNumber = '$varPO'")->fetch());
			
			if (isset($checkDatabase) ? $checkDatabase : null) {
				$query = $conn->prepare("SELECT *, ABS(qtyOrder - inQty) AS qtyOrdered FROM incoming join product ON incoming.prodID = product.prodID join purchaseorders 
										ON incoming.PONumber = purchaseorders.poNumber AND incoming.prodID = purchaseorders.prodID WHERE incoming.PONumber = '$varPO' AND incoming.status = 'Partial'");
				$query->execute();
				$result = $query->fetchAll();
				$receiptNum = current($conn->query("SELECT receiptNo FROM incoming WHERE PONumber = '$varPO'")->fetch());
				$receiptDate = current($conn->query("SELECT receiptDate FROM incoming WHERE PONumber = '$varPO'")->fetch());
				$readOnly = 'readonly';
			} else {
				$query = $conn->prepare("SELECT purchaseorders.poID, purchaseorders.poNumber, purchaseorders.poDate, purchaseorders.qtyOrder, purchaseorders.supID, product.unitType, product.prodName, purchaseorders.userID
									FROM purchaseorders INNER join product ON purchaseorders.prodID = product.prodID
									WHERE poNumber = '$varPO'
									ORDER BY poID DESC;");
				$query->execute();
				$result = $query->fetchAll();
				
				$receiptNum = '';
				$receiptDate = current($conn->query("SELECT CURDATE()")->fetch());
				$readOnly = '';
			}
			
			$supplierID = current($conn->query("SELECT purchaseorders.supID FROM purchaseorders INNER JOIN suppliers ON purchaseorders.supID = suppliers.supID WHERE purchaseorders.poNumber = '$varPO'")->fetch());
			$supplierName = current($conn->query("SELECT supplier_name FROM suppliers WHERE supID = $supplierID")->fetch());
		?>
		
		<!-- Top Main Header -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="../userinventory.php">DENCY'S HARDWARE AND GENERAL MERCHANDISE</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li id="adminhead"><a href="#">User |</a></li>
						<li><a href="../Logout.php"><i class="glyphicon glyphicon-off"></i> LOGOUT</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- End of Top Main Header -->

		<div class="container-fluid" >
			<div class="row">
				<div class="col-sm-3 col-md-2 sidebar">
				
				<!-- Sidebar -->
					<ul class="nav nav-sidebar">
						<div id="sidebarLogo"><img src="../logo.png" alt=""/></div>
						<li><a href="#"data-toggle="collapse" data-target="#inventory"><i class="glyphicon glyphicon-list-alt"></i> Inventory</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="inventory">
								<li><a href="../userinventory.php"><i class="glyphicon glyphicon-list"></i> Current Inventory</a></li>
								<li><a href="../userDefectives.php"><i class="glyphicon glyphicon-list"></i> Defectives</a></li>
							</ul>
						</li>
						<li class="active"><a href="#" data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="incoming">
								<li><a href="../userPurchaseOrders.php"><i class="glyphicon glyphicon-list"></i> Purchase Orders</a></li>
								<li><a href="../userproductdeliveries.php"><i class="glyphicon glyphicon-list"></i> Delivered Products</a></li>
							</ul>
						</li>
						<li><a href="../userProdIssuance.php"><i class="glyphicon glyphicon-export"></i> Product Issuance</a></li>
						<li><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-retweet"></i> Returns <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="returns">
								<li><a href="../userReturnsWarehouse.php"><i class="glyphicon glyphicon-home"></i> Warehouse Returns</a></li>
								<li><a href="../userreturnSupplier.php"><i class="glyphicon glyphicon-shopping-cart"></i> Supplier Returns</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#reports"><i class="glyphicon glyphicon-th-list"></i> Reports <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="reports">
								<li><a href="../userbranchreport.php"><i class="glyphicon glyphicon-list-alt"></i> Branch Report</a></li>
								<li><a href="../usermonthlyin.php"><i class="glyphicon glyphicon-list-alt"></i> Product Summary (IN)</a></li>
								<li><a href="../usermonthlyout.php"><i class="glyphicon glyphicon-list-alt"></i> Product Summary (OUT)</a></li>
							</ul>
						</li>
						<li><a href="../usersuppliers.php"><i class="glyphicon glyphicon-user"></i> Suppliers</a></li>
						<li><a href="../userproduct.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a></li>
					</ul>
				</div>
				<!-- End of Sidebar -->
		
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">				
					<div id="contents">
						<div id="tableHeader">
							<h1 id="headers">ADD PRODUCT DELIVERY</h1>		
							
							<form action="" method="POST" onsubmit="return validateForm2()">
								<input type="hidden" id="thisPODate" value="<?php echo $poDate; ?>" />
								
								<h3>User</h3>
								<input type="text" class="form-control" id="userID" value = "<?php echo $_SESSION['id']; ?>"placeholder="User" name="userID" readonly>
								
								<h3>Purchase Order Number</h3>				
								<input type="text" class="form-control" id="poNum" value="<?php echo $varPO; ?>" name="po" readonly>
								
								<h3>Receipt No.</h3> 
								<input type="text" class="form-control" id ="addRcpt" placeholder="Receipt Number" value="<?php echo $receiptNum; ?>" name="rcno" <?php echo $readOnly; ?>>
								
								<h3>Receipt Date</h3> 
								<input type="date" class="form-control" id ="addRcptDate" placeholder="Receipt Date" name="rcdate" value="<?php echo $receiptDate;?>" <?php echo $readOnly; ?>>
								
								<h3>Supplier</h3> 
									<div class="ui-widget">
										<input id="addSupplier" name="supplier" value="<?php echo $supplierName;?>">
									</div>
														
								<h3>Received By</h3>
								<?php
									$query = $conn->prepare("SELECT empFirstName FROM employee ");
									$query->execute();
									$res = $query->fetchAll();
								?>
													
								<select class="form-control" id="addEmpl" name="emp">
									<?php foreach ($res as $row): ?>
										<option><?=$row["empFirstName"]?></option>
									<?php endforeach ?>
								</select> 
								
								<br>
									
								<h5 id="prodHeader">Product/s</h5>
								<table class="table table-striped" id="dataTable" name="chk">				
									<tbody>
										<tr>
											<td>
												Product Name
											</td>
											<td>
												Quantity
											</td>
											<td>
												Status
											</td>
											<td>
												Type
											</td>
											<td>
												Remarks
											</td>
										</tr>
										<?php foreach ($result as $row): ?>
										<tr id="thisRow">
											<td>	
												<div class="ui-widget">
													<input class="thisProduct" name="prodItem[]" value="<?php echo htmlspecialchars($row["prodName"]); ?>" placeholder="Product Name" required>
												</div>
											</td>
													
											<td>
												<input type="number" min="1" class="form-control" id="addIncQty" 
													value="<?php if (isset($checkDatabase) ? $checkDatabase : null) { 
															echo $row["qtyOrder"] - $row["qtyOrdered"]; 
															} else {
															echo $row["qtyOrder"];
															} ?>" name="incQty[]" required>
											</td>
											
											<td>
												<select class="form-control"  name="inStatus[]">
													<option>Complete</option>
													<option>Partial</option>
													<option>Undelivered</option>
												</select> 
											</td>
												
											<td>
												<select class="form-control" name="inType[]">
													<option>Ordered</option>
													<option>Freebie</option>
												</select>
											</td>	
												
											<td>
												<input type="text" class="form-control" id="addRem" value="None" placeholder="Remarks" name="inRemarks[]">
											</td>
										</tr>
										<?php endforeach ?>
									</tbody>
								</table>
								
								<br>
								
								<div class="modFoot">
									<span><button type="button" class="btn btn-default" value="Add Row" onclick="addRow('dataTable')">Add Product</button></span>
									<br>
									<br>
									<span>
									<a href="../userproductdeliveries.php">
									<input type="button" class="btn btn-danger" id="canBtn" value="Cancel" data-dismiss="modal" onclick="this.form.reset()">
									</a></span>
									<span><input type="submit" name="submit" value="Submit" class="btn btn-success" id="sucBtn"></span>
								</div>
							</form> 								

						</div>
					</div>
				</div>
			</div>
		</div>	
		
		<!-- Add Incoming Entry Functionality-->
		<?php include('addIncoming.php'); ?>
	</body>
</html>