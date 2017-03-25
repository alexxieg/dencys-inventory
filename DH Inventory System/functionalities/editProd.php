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
					<h3>Product ID</h3>
					<input type="text" class="form-control" id ="addEntry" placeholder="Name" name="prodCode"> <br>
					
					<h3>Product Name</h3>
					<input type="text" class="form-control" id ="addEntry" placeholder="Name" name="prodItem"> <br>
					
					<h3>Quantity</h3>
					<input type="text" class="form-control" id ="addEntry" placeholder="Name" name="prodQty"> <br>
						
					<h3>Product Type</h3>
					<input type="text" class="form-control" id ="addEntry" placeholder="Item Type" name="prodType"> <br>
				
					<h3>Brand</h3>
					<input type="text" class="form-control" id ="addEntry" placeholder="Brand" name="prodBrand"> <br>
					
					<h3>Price</h3>
					<input type="text" class="form-control" id ="addEntry" placeholder="Unit Price" name="prodPrice"> <br>
					
					<h3>Reorder Level</h3>
					<input type="text" class="form-control" id ="addEntry" placeholder="Unit Price" name="prodRO"> <br>
						
					<br>
				<input type="submit" value="Update" class="btn btn-success" name="addProd" onclick="alert('New Product Successfully Added');">
				<input type="submit" value="Cancel" class="btn btn-default" style="width: 100px">
				</form> 
			</div>
		</div>
	
		<?php
			$proid= $_GET['proId'];
			$itemName=(isset($_REQUEST['prodItem']) ? $_REQUEST['prodItem'] : null);
			$itemNType=(isset($_REQUEST['prodType']) ? $_REQUEST['prodType'] : null);
			$itemBrand=(isset($_REQUEST['prodBrand']) ? $_REQUEST['prodBrand'] : null);
			$itemPrice=(isset($_REQUEST['prodPrice']) ? $_REQUEST['prodPrice'] : null);
			$itemRL=(isset($_REQUEST['prodRO']) ? $_REQUEST['prodRO'] : null);
			$quant=(isset($_REQUEST['prodQty']) ? $_REQUEST['prodQty'] : null);
			
			if (isset($_POST["addProd"])){
			
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$sql = "UPDATE product SET prodName = '$itemName', type = '$itemNType', brand = '$itemBrand', price = '$itemPrice', reorderLevel = '$itemRL' WHERE prodID= $proid";
				$conn->exec($sql);
				
				$sql1 = "UPDATE inventory SET qty = $quant WHERE prodID= $proid";
				$conn->exec($sql1);	
			}    

		?>
	</body>
</html>