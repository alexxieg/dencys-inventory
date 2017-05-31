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
			if (!isset($_SESSION['id']) || $role!="admin") {
				header('Location: index.php');
			}
			$session_id = $_SESSION['id'];
			$session_query = $conn->query("select * from users where userName = '$session_id'");
			$user_row = $session_query->fetch();
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
			$query = $conn->prepare("SELECT purchaseorders.poID, purchaseorders.poNumber, purchaseorders.poDate, purchaseorders.qtyOrder, purchaseorders.supID, product.unitType, product.prodName, purchaseorders.userID
									FROM purchaseorders INNER join product ON purchaseorders.prodID = product.prodID
									WHERE poNumber = '$varPO'
									ORDER BY poID DESC;");
			$query->execute();
			$result = $query->fetchAll();
			
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
					<a class="navbar-brand" href="../inventory.php">DENCY'S HARDWARE AND GENERAL MERCHANDISE</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li id="adminhead"><a href="#">Admin |</a></li>
						<li><a href="Logout.php"><i class="glyphicon glyphicon-off"></i> LOGOUT</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- End of Top Main Header -->
		
		<div class="container-fluid">
			<div class="row navbar-collapse">
				<div id="sidebarCol" class="col-sm-3 col-md-2 sidebar">
					<ul class="nav nav-sidebar">
						<div id="sidebarLogo"><img src="../logo.png" alt=""/></div>
						<li><a href="#"data-toggle="collapse" data-target="#inventory"><i class="glyphicon glyphicon-list-alt"></i> Inventory<i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="inventory">
								<li><a href="../inventory.php"><i class="glyphicon glyphicon-list"></i> Current Inventory</a></li>
								<li><a href="addDefective.php"><i class="glyphicon glyphicon-list"></i> Add Defectives</a></li>
							</ul>
						</li>
						<li class="active"><a href="#" data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="incoming">
								<li><a href="../purchaseOrder.php"><i class="glyphicon glyphicon-list"></i> Purchase Orders</a></li>
								<li><a href="../prodDeliveries.php"><i class="glyphicon glyphicon-list"></i> Delivered Products</a></li>
							</ul>
						</li>
						<li><a href="../prodIssuance.php"><i class="glyphicon glyphicon-export"></i> Product Issuance</a></li>
						<li><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-retweet"></i> Returns <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="returns">
								<li><a href="../returnsWarehouse.php"><i class="glyphicon glyphicon-home"></i> Warehouse Returns</a></li>
								<li><a href="../returnSupplier.php"><i class="glyphicon glyphicon-shopping-cart"></i> Supplier Returns</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#reports"><i class="glyphicon glyphicon-th-list"></i> Reports <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="reports">
								<li><a href="../branchReport.php"><i class="glyphicon glyphicon-list-alt"></i> Branch Report</a></li>
								<li><a href="../monthlyIncoming.php"><i class="glyphicon glyphicon-list-alt"></i> Product Summary (IN)</a></li>
								<li><a href="../monthlyOutgoing.php"><i class="glyphicon glyphicon-list-alt"></i> Product Summary (OUT)</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#manage"><i class="glyphicon glyphicon-pencil"></i> Manage<i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="manage">
								<li><a href="../accounts.php"><i class="glyphicon glyphicon-lock"></i> Accounts</a></li>
								<li><a href="../branches.php"><i class="glyphicon glyphicon-home"></i> Branches</a></li>
								<li><a href="../employees.php"><i class="glyphicon glyphicon-user"></i> Employees</a></li>
								<li><a href="../suppliers.php"><i class="glyphicon glyphicon-user"></i> Suppliers</a></li>
								<li><a href="../product.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a></li>
								<li><a href="../brands.php"><i class="glyphicon glyphicon-sort-by-attributes"></i> Product Brands</a></li>
								<li><a href="../category.php"><i class="glyphicon glyphicon-book"></i> Product Categories</a></li>
							</ul>
						</li>
						<li><a href="../backup.php"><i class="glyphicon glyphicon-cog"></i> System Settings</a></li>
					</ul>
				</div>
				<!-- End of Sidebar -->	

				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<div id="contents">
						<div class="pages">
							<div id="tableHeader">
								<table class="table table-striped table-bordered">		
									<h1 id="headers">ADD PRODUCT DELIVERY</h1>
								</table>
							</div>
		
							<form action="" method="POST">
								<h3>User</h3>
								<input type="text" class="form-control" id="userID" value = "<?php echo $_SESSION['id']; ?>"placeholder="User" name="userID" readonly>
								
								<h3>Product Order Number</h3>				
								<input type="text" class="form-control" id="poNum" value="<?php echo $varPO; ?>" name="po" readonly>
								
								<h3>Receipt No.</h3> 
								<input type="text" class="form-control" id ="addRcpt" placeholder="Receipt Number" name="rcno">
								
								<h3>Receipt Date</h3> 
								<input type="date" class="form-control" id ="addRcptDate" placeholder="Receipt Date" name="rcdate">
								
								<h3>Supplier</h3> 
									<div class="ui-widget">
										<input id="supplierName" name="supplier" value="<?php echo $supplierName;?>">
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

								<h5>Product/s</h5>
								<table class="table table-striped" id="dataTable" name="chk">				
									<tbody>
										<?php foreach ($result as $row): ?>
										<tr id="thisRow">
											<td><input type="checkbox" name="chk"></TD>
											<td><input type="hidden" value="1" name="num" id="orderdata">1</TD>
											<td>	
												<div class="ui-widget">
													<input class="thisProduct" id="addInProd" name="prodItem[]" value="<?php echo $row["prodName"]; ?>" placeholder="<?php echo $row["prodName"]; ?>">
												</div>
											</td>
													
											<td>
												<input type="number" min="1" class="form-control" id="addInQty" value="<?php echo $row["qtyOrder"]; ?>" placeholder="<?php echo $row["qtyOrder"]; ?>" name="incQty[]">
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
										<a href="../prodDeliveries.php">
											<input type="button" class="btn btn-danger" id="canBtn" value="Cancel" data-dismiss="modal" onclick="this.form.reset()">
										</a>
									</span>
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