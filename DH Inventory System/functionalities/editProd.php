<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<title>Edit Products</title>
			
		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link rel="shortcut icon" href="../logo.jpg">

		<!-- Custom styles for this template -->
		<link href="../css/custom.css" rel="stylesheet">
		<link href="../css/sidebar.css" rel="stylesheet">
		
		<!-- Javascript Files -->
		<script src="../js/product.js"></script>
		<script src="../js/bootstrap.js"></script>
		<script src="../js/jquery-3.2.0.min.js"></script>	
		<script src="../js/bootstrap.min.js"></script>

		<!-- Database Connection -->
		<?php include('dbcon.php'); ?>
		
		<!-- Login Session -->
		<?php 
			session_start();
			$role = $_SESSION['sess_role'];
			if (!isset($_SESSION['id']) && $role!="admin") {
				header('Location: index.php');
			}
			$session_id = $_SESSION['id'];
			$session_query = $conn->query("select * from users where userName = '$session_id'");
			$user_row = $session_query->fetch();
		?>
	</head>
  
	<body>
		<?php
			$proID = $_GET['proId'];
			$query = $conn->prepare("SELECT product.prodID, product.prodName, brand.brandName, category.categoryName, product.price, product.unitType, product.reorderLevel
										FROM product INNER JOIN brand ON product.brandID = brand.brandID INNER JOIN category ON product.categoryID = category.categoryID
										ORDER BY prodID");
			$query->execute();
			$result = $query->fetchAll();
			
			$query2 = $conn->prepare("SELECT product.prodID, product.prodName, brand.brandName, category.categoryName, product.price, product.unitType, product.reorderLevel
										FROM product INNER JOIN brand ON product.brandID = brand.brandID INNER JOIN category ON product.categoryID = category.categoryID
										WHERE prodID = '$proID'
										ORDER BY prodID");
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
					<a class="navbar-brand" href="#">DENCY'S HARDWARE AND GENERAL MERCHANDISE</a>
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
						<li><a href="#"data-toggle="collapse" data-target="#inventory"><i class="glyphicon glyphicon-list-alt"></i> Inventory </span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="inventory">
								<li><a href="../inventory.php"><i class="glyphicon glyphicon-list"></i> Current Inventory</a></li>
								<li><a href="../functionalities/addDefective.php"><i class="glyphicon glyphicon-list"></i> Add Defectives</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="incoming">
								<li><a href="../purchaseOrder.php"><i class="glyphicon glyphicon-list"></i> Purchase Orders</a></li>
								<li><a href="../incoming.php"><i class="glyphicon glyphicon-list"></i> Delivered Products</a></li>
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
								<li><a href="../monthlyIncoming.php"><i class="glyphicon glyphicon-list-alt"></i> Product Summary (IN)</a></li>
								<li><a href="../monthlyOutgoing.php"><i class="glyphicon glyphicon-list-alt"></i> Product Summary (OUT)</a></li>
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

				<!-- Retrieve Selected Entry Details -->
				<div class="addInv">
					<h1 id="headers">Edit Product Information</h1>
					<div id="contents">
						<form action="" method="POST" class="editPgs">
							<?php foreach ($result2 as $row): ?>
							<h3>Product ID</h3>
							<input type="text" class="form-control" id ="addEntry" placeholder="<?php echo $row["prodID"]; ?>" value="<?php echo $row["prodID"]; ?>" name="prodCode"> <br>
							<?php endforeach ?>
							
							<?php foreach ($result2 as $row): ?>
							<h3>Product Name</h3>
							<input type="text" class="form-control" id ="addEntry" placeholder="<?php echo $row["prodName"]; ?>" value="<?php echo $row["prodName"]; ?>" name="prodItem"> <br>
							<?php endforeach ?>
								
							<?php foreach ($result2 as $row): ?>	
							<h3>Product Type</h3>
							<input type="text" class="form-control" id ="addEntry" placeholder="<?php echo $row["unitType"]; ?>" value="<?php echo $row["unitType"]; ?>" name="prodType"> <br>
							<?php endforeach ?>
							
							<?php foreach ($result2 as $row): ?>
							<h3>Brand</h3>
							<input type="text" class="form-control" id ="addEntry" placeholder="<?php echo $row["brandName"]; ?>" value="<?php echo $row["brandName"]; ?>" name="prodBrand"> <br>
							<?php endforeach ?>
							
							<?php foreach ($result2 as $row): ?>
							<h3>Price</h3>
							<input type="text" class="form-control" id ="addEntry" placeholder="<?php echo $row["price"]; ?>" value="<?php echo $row["price"]; ?>" name="prodPrice"> <br>
							<?php endforeach ?>
							
							<?php foreach ($result2 as $row): ?>
							<h3>Reorder Level</h3>
							<input type="text" class="form-control" id ="addEntry" placeholder="<?php echo $row["reorderLevel"]; ?>" value="<?php echo $row["reorderLevel"]; ?>" name="prodRO"> <br>
							<?php endforeach ?>	
								
							<br>
							<div class="modFoot">
								<span>
									<a href="../product.php">
										<input type="button" value="Cancel" class="btn btn-danger" id="canBtn">
									</a>
								</span>
								<span>
									<input type="submit" value="Update" class="btn btn-success" id="sucBtn" name="addProd" data-dismiss="modal" onclick="alert('New Product Successfully Added');">
								</span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
			
		<!-- Update Function -->
		<?php
			$proID = $_GET['proId'];
			$itemName=(isset($_REQUEST['prodItem']) ? $_REQUEST['prodItem'] : null);
			$itemNType=(isset($_REQUEST['prodType']) ? $_REQUEST['prodType'] : null);
			$itemBrand=(isset($_REQUEST['prodBrand']) ? $_REQUEST['prodBrand'] : null);
			$itemPrice=(isset($_REQUEST['prodPrice']) ? $_REQUEST['prodPrice'] : null);
			$itemRL=(isset($_REQUEST['prodRO']) ? $_REQUEST['prodRO'] : null);
			
			if (isset($_POST["addProd"])){
			
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$sql = "UPDATE product SET prodName = '$itemName', unitType = '$itemNType', price = $itemPrice, reorderLevel = $itemRL WHERE prodID= '$proID'";
				$conn->exec($sql);
				
				$sql = "UPDATE brand JOIN product SET brandName = '$itemBrand' WHERE prodID= '$proID'";
				$conn->exec($sql);
			}    

		?>
	</body>
</html>