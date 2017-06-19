<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<title>Edit Product Issuance Entry</title>
			
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

		<!-- Custom styles for this template -->
		<link href="../css/custom.css" rel="stylesheet">
		<link href="../css/sidebar.css" rel="stylesheet">
		
		<!-- Javascript Files -->
		<script src="../js/outgoing.js"></script>
		<script src="../js/bootstrap.js"></script>
		<script src="../js/jquery-3.2.0.min.js"></script>	
		<script src="../js/bootstrap.min.js"></script>
		<script src="../alertboxes/sweetalert2.min.js"></script>
		<link rel="stylesheet" href="../alertboxes/sweetalert2.min.css">
		
		<!-- Autocomplete Script -->
		<link rel="stylesheet" href="../css/jquery-ui.css">
		<script src="../js/jquery-1.9.1.js"></script>
		<script src="../js/jquery-ui.js"></script>
		
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
	</head>
	
	<body>
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
					<a class="navbar-brand" href="../inventory.php">Dency's Hardware and General Merchandise</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
					<li id="adminhead"><a href="#">Admin |</a></li>
						<li id="loghead"><a href="../Logout.php"><i class="glyphicon glyphicon-off"></i> LOGOUT</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- End of Top Main Header -->
		
		<div class="container-fluid">
			<div class="row">
			
				<!-- Sidebar -->
				<div class="col-sm-3 col-md-2 sidebar">
					<ul class="nav nav-sidebar">
						<div id="sidebarLogo"><img src="../logo.png" alt=""/></div>
						<li><a href="#"data-toggle="collapse" data-target="#inventory"><i class="glyphicon glyphicon-list-alt"></i> Inventory <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="inventory">
								<li><a href="../inventory.php"><i class="glyphicon glyphicon-list"></i> Current Inventory</a></li>
								<li><a href="../defectives.php"><i class="glyphicon glyphicon-list"></i> Defectives</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries<i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="incoming">
								<li><a href="../purchaseOrder.php"><i class="glyphicon glyphicon-list"></i> Purchase Orders</a></li>
								<li><a href="../prodDeliveries.php"><i class="glyphicon glyphicon-list"></i> Delivered Products</a></li>
							</ul>
						</li>
						<li class="active"><a href="../prodIssuance.php"><i class="glyphicon glyphicon-export"></i> Product Issuance <span class="sr-only">(current)</span></a></li>
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
						<li><a href="#" data-toggle="collapse" data-target="#manage"><i class="glyphicon glyphicon-pencil"></i> Manage <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="manage">
								<li><a href="../accounts.php"><i class="glyphicon glyphicon-lock"></i> Accounts</a></li>
								<li><a href="../branches.php"><i class="glyphicon glyphicon-home"></i> Branches</a></li>
								<li><a href="../employees.php"><i class="glyphicon glyphicon-user"></i> Employees</a></li>
								<li><a href="../product.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a></li>
								<li><a href="../brands.php"><i class="glyphicon glyphicon-sort-by-attributes"></i> Product Brands</a></li>
								<li><a href="../category.php"><i class="glyphicon glyphicon-book"></i> Product Categories</a></li>
							</ul>
						</li>
						<li><a href="../backup.php"><i class="glyphicon glyphicon-cog"></i> System Settings</a></li>
					</ul>
				</div>
				<!-- End of Sidebar -->	

				<!-- Retrieve Selected Entry's Details -->
				<?php
					$outid= $_GET['outId'];
					$query = $conn->prepare("SELECT product.prodName, product.prodID, product.unitType, outgoing.receiptNo, outgoing.outID, outgoing.outQty, outgoing.outQty, outgoing.outDate, MONTHNAME(outgoing.outDate) AS nowMonthDate, YEAR(outDate) AS nowYearDate, CONCAT(employee.empLastName,', ',employee.empFirstName) AS empName, branch.location, outgoing.userID 
											FROM outgoing INNER JOIN product ON outgoing.prodID = product.prodID INNER JOIN branch ON outgoing.branchID = branch.branchID INNER JOIN employee ON outgoing.empID = employee.empID");
					$query->execute();
					$res = $query->fetchAll();
					
					$query2 = $conn->prepare("SELECT product.prodName, product.prodID, product.unitType, outgoing.receiptNo, outgoing.outID, outgoing.outQty, outgoing.outQty, outgoing.outDate, MONTHNAME(outgoing.outDate) AS nowMonthDate, YEAR(outDate) AS nowYearDate, CONCAT(employee.empLastName,', ',employee.empFirstName) AS empName, branch.location, outgoing.userID 
											FROM outgoing INNER JOIN product ON outgoing.prodID = product.prodID INNER JOIN branch ON outgoing.branchID = branch.branchID INNER JOIN employee ON outgoing.empID = employee.empID  
											WHERE receiptNo = '$outid'");
					$query2->execute();
					$resul = $query2->fetchAll();
					
					$reciptNum = current($conn->query("SELECT outgoing.receiptNo FROM outgoing WHERE outgoing.receiptNo = '$outid'")->fetch());
					$employ = current($conn->query("SELECT DISTINCT employee.empFirstName FROM outgoing JOIN employee ON outgoing.empID = employee.empID WHERE outgoing.receiptNo = '$outid'")->fetch());
					$branch = current($conn->query("SELECT DISTINCT location FROM outgoing JOIN branch ON outgoing.branchID = branch.branchID WHERE outgoing.receiptNo = '$outid'")->fetch());
				?>
				
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">				
					<div id="contents">
						<div class="pages no-more-tables">	
							<h1 id="headers">Edit Product Issuance Entry</h1>
							<br>
							<div id="content">
								<form action="" method="POST" onsubmit="return validateForm2()">
									<h3>User</h3>
									<input type="text" class="form-control" id="userID" value = "<?php echo $_SESSION['id']; ?>"placeholder="User" name="userID" readonly>
									
									<h3>Receipt No.</h3> 
									<input type="text" class="form-control" id ="addRcpt" placeholder="<?php echo $reciptNum; ?>" value="<?php echo $reciptNum; ?>" name="rcno" Readonly>
											
									<h3>Handled By</h3>
									<?php
										$query = $conn->prepare("SELECT empFirstName FROM employee ");
										$query->execute();
										$result = $query->fetchAll();
										?>
													
									<select class="form-control" id="addEmpl" name="emp">
										<?php foreach ($result as $row): ?>
											<option><?=$row["empFirstName"]?></option>
										<?php endforeach ?>
											<option SELECTED><?=$employ?></option>
									</select> 
																		
									<h3>Branch</h3>
									<?php
										$query = $conn->prepare("SELECT location FROM branch");
										$query->execute();
										$res = $query->fetchAll();
									?>
										
									<select class="form-control" id="addEntry" name="branch">
										<?php foreach ($res as $row): ?>
											<option><?=$row["location"]?></option>
										<?php endforeach ?>
											<option SELECTED><?=$branch?></option>
									</select> 
									<br>
											
									<h5 id="prodHeader">Product/s</h5>
									<table class="table table-striped" name="chk">
										<tbody>
											<tr>
												<td>Product Description</td>
												<td>Quantity</td>
											</tr>
											<?php foreach ($resul as $row): ?>
											
											<tr>												
												<input type="hidden" name="productOutID[]" value="<?php echo $row["outID"]; ?>" />		
												<td>	
													<div class="ui-widget">
														<input class="thisProduct" id="prod" name="prodItem[]" value="<?php echo htmlspecialchars($row["prodName"]);?>" placeholder="<?php echo $row["prodName"]; ?>" required>
														<input type="hidden" name="editProdItem[]" value="<?php echo htmlspecialchars($row["prodName"]);?>" />
														<input type="hidden" name="iniDate[]" value="<?php echo $row["outDate"];?>" />	
														<input type="hidden" name="iniUser[]" value="<?php echo $row["userID"];?>" />			
													</div>
												</td>
																
												<td>
													<input type="number" min="1" id ="addQty" class="form-control" placeholder="<?php echo $row["outQty"]; ?>" value="<?php echo $row["outQty"]; ?>"  name="outQty[]" required>
													<input type="hidden" name="editOutQty[]" value="<?php echo $row["outQty"]; ?>" />	
												</td>
											</tr>
											<?php endforeach ?>
										</tbody>
									</table>
													
									<div class="modFoot">
										<span>
											<a href="../ProdIssuance.php">
												<input type="button" class="btn btn-danger" id="canBtn" value="Cancel" data-dismiss="modal" onclick="this.form.reset()">
											</a>
										</span>
										<span>
											<input type="submit" name="updateOut" value="Update" class="btn btn-success" id="sucBtn">
										</span>
									</div>
									<div class="modal-footer">
									</div>
								</form>																		
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Update Branch -->
		<?php include('updateProdIssuance.php'); ?>
	
  </body>
</html>