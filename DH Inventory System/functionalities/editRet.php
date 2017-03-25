<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Returns</title>
	
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">
		<link rel="stylesheet" media="screen" type ="text/css" href="css/bootstrap.css">
		
		<script src="returns.js"></script>
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
								<li class="active"><a href="returns.php">Returns</a></li>
								<li><a href="admin.php">Admin</a></li>
							</ul>
						</div>
					</div>
				</nav>
				
		<div class="addInv">
		
			<h1 id="headers">Edit Return Entry</h1>
			<div id="contents">
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