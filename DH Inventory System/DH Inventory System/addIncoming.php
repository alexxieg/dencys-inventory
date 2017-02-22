<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Incoming Product</title>
	
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
					</ul>
				</div>
			</div>
		</nav>
	<div class="addInv">
	
	
		<h1 id="headers">Add Incoming</h1>
		<div>
			<form action="incoming.html">
				<h3>Item</h3>
				<?php
					$query = $conn->prepare("SELECT prodName FROM product ");
					$query->execute();
					$res = $query->fetchAll();
				?>
			
				<select class="form-control" id="addEntry" name="searchby">
					<?php foreach ($res as $row): ?>
						<option><?=$row["prodName"]?></option>
					<?php endforeach ?>
				</select> 
				<br>
				
				<h3>Quantity</h3>
				<input type="text" class="form-control" id ="addEntry" placeholder="Item Quantity" name="incQty"> <br>
				
				<h3>Employee</h3>
				<?php
					$query = $conn->prepare("SELECT empName FROM employee ");
					$query->execute();
					$res = $query->fetchAll();
				?>
			
				<select class="form-control" id="addEntry" name="searchby">
					<?php foreach ($res as $row): ?>
						<option><?=$row["empName"]?></option>
					<?php endforeach ?>
				</select> 
				<br>
				
				<h3>Supplier</h3>
				<?php
					$query = $conn->prepare("SELECT supplier_name FROM suppliers ");
					$query->execute();
					$res = $query->fetchAll();
				?>
			
				<select class="form-control" id="addEntry" name="searchby">
					<?php foreach ($res as $row): ?>
						<option><?=$row["supplier_name"]?></option>
					<?php endforeach ?>
				</select> 
				<br>
				
				<h3>Receipt Number</h3>
				<input type="text" class="form-control" id ="addEntry" placeholder="Receipt Number" name="incRecN"> <br>
				
				<h3>Receipt Date</h3>
				<input type="text" class="form-control" id ="addEntry" placeholder="Receipt Number" name="incRecD"> <br>
				
				<h3>Remarks</h3>
				<textarea class="form-control" id="addEntry" rows="3" name="incRemarks"></textarea> <br>

			<br>
			<input type="submit" value="Add" class="btn btn-default" style="width: 100px">
			<input type="submit" value="Cancel" class="btn btn-default" style="width: 100px">
			</form> 
		</div>
	</div>
  </body>
</html>