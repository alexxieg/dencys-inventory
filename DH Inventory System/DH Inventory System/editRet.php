<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Edit Return</title>
		<?php include('dbcon.php'); ?>
			
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
		
			<h1 id="headers">Add Returns</h1>
			<div>
				<form action="" method="POST">
					<h3>Item</h3>
					<?php
						$retID= $_GET['retId'];
						$query = $conn->prepare("SELECT returns.returnDate, returns.returnID, product.prodName, returns.returnQty, returns.status, returns.returnRemark 
						FROM returns INNER JOIN product ON returns.prodID = product.prodID
						WHERE returnID = $retID ");
						$query->execute();
						$res = $query->fetchAll();
					?>
				
					<select class="form-control" id="addEntry" name="prodItem">
						<?php foreach ($res as $row): ?>
							<option><?=$row["prodName"]?></option>
						<?php endforeach ?>
					</select> 
					<br>
					
					<h3>Quantity</h3>
					<input type="text" class="form-control" id ="addEntry" placeholder="Item Quantity" name="retQty"> <br>
					
					<div class="form-group">
					 <h3>Status</h3>
					  <select class="form-control" id="addEntry" name="status">
						<option>Returned</option>
						<option>Pending</option>
					  </select>
					</div>
					
					<h3>Remarks</h3>
					<textarea class="form-control" id="addEntry" rows="3" name="retRemarks"></textarea> <br>
			
					<br>
					<input type="submit" value="Update" class="btn btn-success" name="addRet">
					<input type="submit" value="Cancel" class="btn btn-default" style="width: 100px">
				</form> 
			</div>
		</div>
	
		<?php
			$retID= $_GET['retId'];
			$quant=(isset($_REQUEST['retQty']) ? $_REQUEST['retQty'] : null);
			$stat=(isset($_REQUEST['status']) ? $_REQUEST['status'] : null);
			$rem=(isset($_REQUEST['retRemarks']) ? $_REQUEST['retRemarks'] : null);
			if (isset($_POST["addRet"])){
				
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							
				$prod = $_POST['prodItem'];
						
				$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prod'");
				$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
				$prod3 = $prod2['prodA'];
				
				$sql = "UPDATE returns SET returnDate = CURDATE(), returnQty = '$quant', status = '$stat', returnRemark = '$rem' WHERE returnID = $retID";
				$conn->exec($sql);
			}    
		?>

  </body>
</html>