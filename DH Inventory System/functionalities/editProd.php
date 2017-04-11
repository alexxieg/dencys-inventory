<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<title>Products</title>
			
		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link rel="shortcut icon" href="../logo.jpg">

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="../css/test.css" rel="stylesheet">
		<link href="../css/sidebar.css" rel="stylesheet">
		
		<script src="../product.js"></script>
		<script src="../js/bootstrap.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<?php include('dbcon.php'); ?>
			
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
		
		<!--Top Navigation Bar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle pull-left collapsed" data-toggle="collapse" data-target="#sidebarCol" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div id="font"><h2>DENCY'S HARDWARE AND GENERAL MERCHANDISE</h2></div>
			</div>
			<div  id="navbar" class="navbar-collapse">
				<ul class="nav navbar-nav navbar-right" id="adminDrp">
				    <li class="dropdown" id="font">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="try">
                        	<i class="glyphicon glyphicon-user"></i> ADMIN
                         </a>
                            <ul class="dropdown-menu list-unstyled">
                                <li>
                                    <a href="../logout.php" class="active"><i class="glyphicon glyphicon-log-out"></i> LOGOUT</a>
								</li>
                            </ul>
                     </li>
				</ul>
			</div>


    <div class="container-fluid">
		<div class="row navbar-collapse">
			<div id="sidebarCol" class="col-sm-3 col-md-2 sidebar">
				<ul class="nav nav-sidebar">
						<img src="../logo.png" alt="" width="100px" height="100px" id="sidebarLogo"/>
					<li>
						<a href="../inventory.php">
							<i class="glyphicon glyphicon-list-alt"></i> Inventory
						</a>
					</li>
					<li><a href="../incoming.php"><i class="glyphicon glyphicon-import"></i> Incoming</a></li>
					<li><a href="../outgoing.php"><i class="glyphicon glyphicon-export"></i> Outgoing </a></li>
					<li><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-retweet"></i> Returns <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
						<ul class="list-unstyled collapse" id="returns">
							<li><a href="../returns.php"><i class="glyphicon glyphicon-home"></i> Warehouse Returns</a></li>
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
			</div>
			</div>
		</div>
	</nav>	
		<!-- End of Sidebar -->	

		
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
					<input type="submit" value="Cancel" class="btn btn-danger" id="canBtn">
				</span>
				<span>
					<input type="submit" value="Update" class="btn btn-success" id="sucBtn" name="addProd" data-dismiss="modal" onclick="alert('New Product Successfully Added');">
				</span>
				</div>
				
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