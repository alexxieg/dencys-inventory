<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Product</title>
	<?php include('dbcon.php'); ?>
		
	<?php 
		session_start();
		if (isset($_SESSION['id'])){
			header('Location: inventory.php');
			$session_id = $_SESSION['id'];
			$session_query = $conn->query("select * from users where userName = '$session_id'");
			$user_row = $session_query->fetch();
			if (!isset($_SESSION['id']) || $_SESSION['id'] == false) {
				session_destroy();
				header('Location: index.php');
			}
		}
	?>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="logo.jpg">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  </head>
  
  <body>

  
  <nav class="navbar navbar-inverse navbar-static-top" >
  
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<h1>Dency's Hardware and General Merchandise</h1>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right" id="categories">
							<li><a href="inventory.php">Inventory</a></li>
							<li><a href="incoming.php">Incoming</a></li>
							<li><a href="outgoing.php">Outgoing</a></li>
							<li><a href="returns.php">Returns</a></li>
							<li><a href="admin.html">Admin</a></li>
						</ul>
				</div>
			</div>
		</nav>

	<div class="addInv">
	
	
		<h1 id="headers">Add New Product</h1>
		<div >
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
			<input type="submit" value="Add" class="btn btn-success" name="addProd">
			<input type="submit" value="Cancel" class="btn btn-default" style="width: 100px">
			</form> 
		</div>
	</div>
	
	
	
   
	<?php
    
    if (isset($_POST["addProd"])){
    
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 
		$prod = $_POST['prodCode'];
	 
		$sql = "INSERT INTO product (prodID, prodName, type, brand, price, reorderLevel)
		VALUES ('$prod','".$_POST['prodItem']."','".$_POST['prodType']."','".$_POST['prodBrand']."','".$_POST['prodPrice']."','".$_POST['prodRO']."')";
    	$conn->exec($sql);
		
		$sql1 = "INSERT INTO inventory (qty, prodID)
		VALUES ('".$_POST['prodQty']."','$prod')";
		$conn->exec($sql1);	
	}    

	?>
  </body>
</html>