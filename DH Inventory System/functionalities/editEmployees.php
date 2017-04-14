<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Edit Employee</title>

		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link rel="shortcut icon" href="../logo.jpg">
		
		<!-- Custom styles for this template -->
		<link href="../css/custom.css" rel="stylesheet">
		<link href="../css/sidebar.css" rel="stylesheet">
		
		<!-- Javascript Files -->
		<script src="../js/employees.js"></script>
		<script src="../js/bootstrap.js"></script>
		<script src="../js/jquery-3.2.0.min.js"></script>	
		<script src="../js/bootstrap.min.js"></script>
		
		<!-- Database Connection -->
		<?php include('dbcon.php'); ?>
			
		<!-- Login Session -->
		<?php 
			session_start();
			if (isset($_SESSION['id'])){
				$session_id = $_SESSION['id'];
				$session_query = $conn->query("select * from users where userName = '$session_id'");
				$user_row = $session_query->fetch();
				if (!isset($_SESSION['id']) || $_SESSION['id'] == false) {
					session_destroy();
					header('Location: index.php');
				}
			}
		?>
	</head>
  
	<body>
		<?php
			$employID= $_GET['emplId'];
			$query = $conn->prepare("SELECT empID, empFirstName, empLastName, empMidName, empExtensionName 
									FROM employee");
			$query->execute();
			$result = $query->fetchAll();
			
			$query2 = $conn->prepare("SELECT empID, empFirstName, empLastName, empMidName, empExtensionName 
									FROM employee
									WHERE empID = $employID");
			$query2->execute();
			$result2 = $query2->fetchAll();
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
					<a class="navbar-brand" href="#">Dency's Hardware and General Merchandise</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="Logout.php">Logout</a></li>
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
						<li><a href="inventory.php"><i class="glyphicon glyphicon-list-alt"></i> Inventory</a></li>
						<li><a href="#" data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="incoming">
								<li><a href="../purchaseOrder.php"><i class="glyphicon glyphicon-list"></i> Purchase Orders</a></li>
								<li><a href="../incoming.php"><i class="glyphicon glyphicon-list"></i> Deliveries</a></li>
							</ul>
						</li>
						<li><a href="../outgoing.php"><i class="glyphicon glyphicon-export"></i> Product Issuance</a></li>
						<li><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-retweet"></i> Returns <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="returns">
								<li><a href="../returnsWarehouse.php"><i class="glyphicon glyphicon-home"></i> Warehouse Returns</a></li>
								<li><a href="../returnSupplier.php"><i class="glyphicon glyphicon-shopping-cart"></i> Supplier Returns</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#reports"><i class="glyphicon glyphicon-th-list"></i> Reports <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="reports">
								<li><a href="../branchReport.php"><i class="glyphicon glyphicon-list-alt"></i> Branch Report</a></li>
							</ul>
						</li>
						<li class="active"><a href="#" data-toggle="collapse" data-target="#manage"><i class="glyphicon glyphicon-pencil"></i> Manage <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="manage">
								<li><a href="../accounts.php"><i class="glyphicon glyphicon-lock"></i> Accounts</a></li>
								<li><a href="../branches.php"><i class="glyphicon glyphicon-home"></i> Branches</a></li>
								<li><a href="../employees.php"><i class="glyphicon glyphicon-user"></i> Employees</a></li>
								<li><a href="../product.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a></li>
								<li><a href="../brands.php"><i class="glyphicon glyphicon-sort-by-attributes"></i> Product Brands</a></li>
								<li><a href="../category.php"><i class="glyphicon glyphicon-book"></i> Product Categories</a></li>
							</ul> 
						</li>
					</ul>
				</div>
				<!-- End of Sidebar -->
		
				<div class="addInv">
					<h1 id="headers">Edit Employee Entry</h1>
					<br>
					<div class="contents">
						<form action="" method="POST" class="editPgs">
																					
							<h3>First Name</h3>
							<?php foreach ($result2 as $row): ?>
								<input type="text" class="form-control" id ="addEntry" placeholder="<?php echo $row["empFirstName"]; ?>" value="<?php echo $row["empFirstName"]; ?>" name="empFName"> <br>
							<?php endforeach ?>
								
							<h3>Middle Name</h3>
							<?php foreach ($result2 as $row): ?>
								<input type="text" class="form-control" id ="addEntry" placeholder="<?php echo $row["empMidName"]; ?>" value="<?php echo $row["empMidName"]; ?>" name="empMName"> <br>
							<?php endforeach ?>
							
							<h3>Last Name</h3>
							<?php foreach ($result2 as $row): ?>
								<input type="text" class="form-control" id ="addEntry" placeholder="<?php echo $row["empLastName"]; ?>" value="<?php echo $row["empLastName"]; ?>" name="empLName"> <br>
							<?php endforeach ?>

							<h3>Extension Name</h3>
							<?php foreach ($result2 as $row): ?>
								<input type="text" class="form-control" id ="addEntry" placeholder="<?php echo $row["empExtensionName"]; ?>" value="<?php echo $row["empExtensionName"]; ?>" name="empEName"> <br>
							<?php endforeach ?>					
							<br>
										
							<div class="modFoot">
								<span>
									<a href="../employees.php">
										<input type="button" class="btn btn-danger" id="canBtn" value="Cancel" data-dismiss="modal" onclick="this.form.reset()">
									</a>
								</span>
								<span>
									<input type="submit" name="editEmp" value="Update" class="btn btn-success" id="sucBtn">
								</span>
							</div>
	
						</form> 
					</div>
				</div>
			</div>
		</div>
				   
		<?php
		$emploFirstName=(isset($_REQUEST['empFName']) ? $_REQUEST['empFName'] : null);
		$emploMiddleName=(isset($_REQUEST['empMName']) ? $_REQUEST['empMName'] : null);
		$emploLastName=(isset($_REQUEST['empLName']) ? $_REQUEST['empLName'] : null);
		$emploExtenName=(isset($_REQUEST['empEName']) ? $_REQUEST['empEName'] : null);
		
		if (isset($_POST["editEmp"])){
				
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				 
						 
		$sql = "UPDATE employee SET empFirstName = '$emploFirstName', empMidName = '$emploMiddleName', empLastName = '$emploLastName', empExtensionName = '$emploExtenName'
				WHERE empID = '$employID'";
		$conn->exec($sql);
					
		}

		?>
	</body>
</html>
