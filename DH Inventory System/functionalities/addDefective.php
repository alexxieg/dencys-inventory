<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Add Defectives</title>
		
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
		<script src="../js/defectives.js"></script>
		<script src="../js/bootstrap.js"></script>
		<script src="../js/jquery-3.2.0.min.js"></script>	
		<script src="../js/bootstrap.min.js"></script>
		<script src="../alertboxes/sweetalert2.min.js"></script>
		<link rel="stylesheet" href="../alertboxes/sweetalert2.min.css">
		
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
			<div class="row navbar-collapse">
				<!-- Sidebar -->
				<div id="sidebarCol" class="col-sm-3 col-md-2 sidebar">
					<ul class="nav nav-sidebar">
						<div id="sidebarLogo"><img src="../logo.png" alt=""/></div>
						<li class="active"><a href="#"data-toggle="collapse" data-target="#inventory"><i class="glyphicon glyphicon-list-alt"></i> Inventory<span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="inventory">
								<li><a href="../inventory.php"><i class="glyphicon glyphicon-list"></i> Current Inventory</a></li>
								<li><a href="../defectives.php"><i class="glyphicon glyphicon-list"></i>Defectives</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
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
						<li><a href="#" data-toggle="collapse" data-target="#manage"><i class="glyphicon glyphicon-pencil"></i> Manage  <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
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
						<div class="pages no-more-tables">
							<div id="tableHeader">
								<h1 id="headers">ADD DEFECTIVE ITEMS</h1>
							<div>
							
							<form action="" method="POST" onsubmit="return validateForm()">

								<h3>User</h3>
								<input type="text" class="form-control" id="userID" value = "<?php echo $_SESSION['id']; ?>"placeholder="User" name="userID" readonly>
								
								<h3>Product</h3>
								<?php
									$query = $conn->prepare("SELECT prodName FROM product");
									$query->execute();
									$res = $query->fetchAll();
								?>
															
								<select class="form-control" id="addItem" name="prodItem">
									<?php foreach ($res as $row): ?>
										<option value = "<?=$row["prodName"]?>"><?=$row["prodName"]?></option>
									<?php endforeach ?>
								</select> 
								
								<h3>Handled By</h3>
								<?php
									$query = $conn->prepare("SELECT empFirstName FROM employee ");
									$query->execute();
									$result = $query->fetchAll();
								?>
																	
								<select class="form-control" id="addEmpl" name="emp">
								<?php foreach ($result as $row): ?>
									<option value = "<?=$row["empFirstName"]?>"><?=$row["empFirstName"]?></option>
								<?php endforeach ?>
								</select> 
											
								<h3>Quantity</h3>
								<input type="number" min="1" class="form-control" id ="addQty" placeholder="Quantity" name="qty">
								<br>
								
								<div class="modFoot">
									<span>
										<a href="../defectives.php">
										<input type="button" class="btn btn-danger" id="canBtn" value="Cancel" data-dismiss="modal" onclick="this.form.reset()">
										</a>
									</span>
									<span>
										<input type="submit" name="addDefect" value="Add Item" class="btn btn-success" id="sucBtn">
									</span>
								</div>
							</form> 
						</div>
					</div>
				</div>
			</div>
		</div>
			
		<!-- Update Function -->
		<?php
			if (isset($_POST['qty'])){
				$receiptRetrieve = $conn->prepare("SELECT receiptNO FROM product");
				$receiptRetrieve->execute();
				$receipts = $receiptRetrieve->fetchAll();
				$recNum = 00001;
				$rec = 'DEF-' . str_pad((string)$recNum,5,0,STR_PAD_LEFT);
				foreach ($receipts AS $list):
					if ($rec == $list["receiptNO"]){
						$recNum = $recNum + 1;
						$rec = 'DEF-' . str_pad((string)$recNum,5,0,STR_PAD_LEFT);
					}
				endforeach; 
				
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$qty = $_POST['qty'];
				$userID = $_POST['userID'];
				
				$prodName = $_POST['prodItem'];
				$prodSQL = $conn->query("SELECT prodID from product WHERE prodName = '$prodName'");
				$prodSQLRes = $prodSQL->fetch(PDO::FETCH_ASSOC);
				$prodRef = $prodSQLRes['prodID'];
				
				$defSQL = $conn->query("SELECT defectProdID AS defID from defectives WHERE prodID = '$prodRef'");
				$defRes = $defSQL->fetch(PDO::FETCH_ASSOC);
				$defID = $defRes['defID'];
				
				$emp = $_POST['emp'];
				$emp1 = $conn->query("SELECT empID AS empA FROM employee WHERE empFirstName = '$emp'");
				$emp2 = $emp1->fetch(PDO::FETCH_ASSOC);
				$emp3 = $emp2['empA'];
				
				$sqlIn = "INSERT INTO incoming (inQty, inDate, receiptNo, receiptDate, inRemarks, supID, status, inType, empID, prodID, userID, poNumber)
							VALUES ('$qty', CURDATE(), '$rec', CURDATE(), 'None', 999, 'Defective', 'Defective', '$emp3', '$defID', '$userID', 'None')";
				$conn->exec($sqlIn);
				
				$sqlOut = "INSERT INTO outgoing (outQty, outDate, receiptNo, branchID, empID, prodID, userID)
						   VALUES ('$qty', CURDATE(), '$rec', 0, '$emp3', '$prodRef', '$userID')";
				$conn->exec($sqlOut);
				
				$activate = "UPDATE defectives SET status = 'Active' WHERE prodID = '$prodRef'";
				$conn->exec($activate);
				
				$role = $_SESSION['sess_role'];
				$url='../defectives.php';
				echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
			}    		
		?>
	</body>
</html>