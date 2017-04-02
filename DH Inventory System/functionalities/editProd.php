<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<title>Products</title>
			
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">
		<link rel="stylesheet" type ="text/css" href="css/bootstrap.css">
		
		<script src="product.js"></script>
		<script src="js/bootstrap.js"></script>
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
		
		<nav class="navbar navbar-inverse navbar-fixed-top" >
			<div class="container">
						<img src="WDF_1857921.jpg" id="headerBG"/>
				<center><img src="dencys.png" alt="logo" id="logo1"/></center>
			</div>

			<div class="splitHeader">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right" id="categories">
								<li><a href="inventory.php">Inventory</a></li>
								<li><a href="incoming.php">Incoming</a></li>
								<li><a href="outgoing.php">Outgoing</a></li>
								<li><a href="returns.php">Returns</a></li>
								<li><a href="admin.php">Admin</a></li>
							</ul>
						</div>
					</div>
				</nav>

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