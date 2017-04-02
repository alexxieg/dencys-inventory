<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<title>Products</title>
			
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="../logo.jpg">
		<link rel="stylesheet" media="screen" type ="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" media="screen" type ="text/css" href="../css/responsive.css">
		
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
			$query = $conn->prepare("SELECT product.prodID, product.prodName, product.model, brand.brandName, category.categoryName, product.price, product.unitType, product.reorderLevel
										FROM product INNER JOIN brand ON product.brandID = brand.brandID INNER JOIN category ON product.categoryID = category.categoryID
										ORDER BY prodID");
			$query->execute();
			$result = $query->fetchAll();
			
			$query2 = $conn->prepare("SELECT product.prodID, product.prodName, product.model, brand.brandName, category.categoryName, product.price, product.unitType, product.reorderLevel
										FROM product INNER JOIN brand ON product.brandID = brand.brandID INNER JOIN category ON product.categoryID = category.categoryID
										WHERE prodID = '$proID'
										ORDER BY prodID");
			$query2->execute();
			$result2 = $query2->fetchAll();
		?>
		
				<!-- Page Header and Navigation Bar -->
		<nav class="navbar navbar-inverse navbar-fixed-top" >
		<!-- Header -->
		  <div class="container-fluid" id="navFix">
		    <div class="navbar-header">
			<div id="dencysname"><h2>Dency's Hardware and General Merchandise</h2></div>
		      <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-collapse" id="togBtn">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
		      </button>
				<div class="dropdown">
				  <button class="dropbtn"><i class="glyphicon glyphicon-user"></i> Admin</button>
				  <div class="dropdown-content">
					<a href="../logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a>
					<a href="#"><button class="btn btn-success btn-md" onclick="myFunction()" id="printBtn">
					<i class="glyphicon glyphicon-print"></i> Print</button></a>
					</div>
				</div>
   			</div>
		  </div><!-- /container -->
		</nav>

		<!-- Side bar -->
		<div class="row row-offcanvas row-offcanvas-left">
			<div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">
			<div class="collapse navbar-collapse">	
				<ul class="nav nav-pills nav-stacked affix">
				      <div id="sidelogo"><img src="../logo.png" alt=""/></div>
		        <li><a href="../inventory.php" ><i class="glyphicon glyphicon-list-alt"></i> Inventory</a></li>
		        <li><a href="../incoming.php"><i class="glyphicon glyphicon-import"></i> Incoming</a></li>
		        <li><a href="../outgoing.php"><i class="glyphicon glyphicon-export"></i> Outgoing</a></li>
		        <li><a href="../returns.php"><i class="glyphicon glyphicon-sort"></i> Returns</a></li>	
		        <li><a href="../reports.php"><i class="glyphicon glyphicon-list-alt"></i> Reports</a></li>					
		        <li class="nav-header">
		        	<a href="#" data-toggle="collapse" data-target="#menu2">
		          		<i class="glyphicon glyphicon-pencil"></i>Manage<i class="glyphicon glyphicon-chevron-down"></i>
		          	</a>
		            	<ul class="list-unstyled collapse affix" id="menu2">
		                <li><a href="../accounts.php"><i class="glyphicon glyphicon-lock"></i>Accounts</a>
		                </li>
		                <li><a href="../employees.php"><i class="glyphicon glyphicon-user"></i> Employees</a>
		                </li>
		                <li class="active"><a href="../product.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a>
		                </li>
		                <li><a href="../brands.php"><i class="glyphicon glyphicon-sort-by-attributes"></i> Product Brands</a>
		                </li>
		                <li><a href="../category.php"><i class="glyphicon glyphicon-book"></i> Product Categories</a>
		                </li>
		                <li><a href="../branches.php"><i class="glyphicon glyphicon-random"></i> Branches</a>
		                </li>
		                </ul>
		          </li>                              
		          </ul>
		 	 </div><!--/span-->	
		   </div>
		<!-- end of side  bar -->

		<div class="addInv">
			
			<h1 id="headers">Edit Product Information</h1>
			<div id="contents">
				<form action="" method="POST">
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
				<input type="submit" value="Update" class="btn btn-success" name="addProd" onclick="alert('New Product Successfully Added');">
				<input type="submit" value="Cancel" class="btn btn-default" style="width: 100px">
				</form> 
			</div>
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