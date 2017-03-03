<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Returns</title>
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
		<link rel="stylesheet" type ="text/css" href="css/bootstrap.css">
		<script src="js/bootstrap.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="shortcut icon" href="logo.jpg">
	</head>
  
	<body>
		<?php
			$sort = (isset($_GET['orderBy']) ? $_GET['orderBy'] : null);
			$searching = (isset($_REQUEST['search']) ? $_REQUEST['search'] : null);
			if (!empty($sort)) {
				$query = $conn->prepare("SELECT returns.returnDate, returns.returnID, product.prodName, returns.returnQty, returns.status, returns.returnRemark 
				FROM returns INNER JOIN product ON returns.prodID = product.prodID 
				ORDER BY $sort");
			
			} else if (!empty($searching)) {
				$query = $conn->prepare("SELECT returns.returnDate, returns.returnID, product.prodName, returns.returnQty, returns.status, returns.returnRemark 
				FROM returns INNER JOIN product ON returns.prodID = product.prodID 
				WHERE prodName LIKE '%".$searching."%'");
			} else {
				$query = $conn->prepare("SELECT returns.returnDate, returns.returnID, product.prodName, returns.returnQty, returns.status, returns.returnRemark 
				FROM returns INNER JOIN product ON returns.prodID = product.prodID 
				ORDER BY returnID ASC;");
				
			}
			$query->execute();
			$result = $query->fetchAll();
		?>
		
		<div class="productHolder">
			<nav class="navbar navbar-inverse navbar-static-top">
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
		</div>	
		<div class="pages">
			<div id="tableHeader">
				<table class="table table-striped table-bordered">	
					
						<h1 id="headers">Returns</h1>	
					
							<form action="?" method="post">
								<input type="text" class="form-control" placeholder="Search" id="searchBar" name="search">
								<button type="submit" name="submit">
									<span class="glyphicon glyphicon-search"></span>
								</button>
							</form>
						
						<button id="modbutt" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Returned Product</button>
						
					
				</table>
			</div>
			
			<div class="prodTable">
				<br>
				<table class="table table-striped table-bordered">
					<tr>
						<th>
							Date
							<button type="button" class="btn btn-default" value="?orderBy=returnDate DESC" onclick="location = this.value;">
								<span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
							</button>
							<button type="button" class="btn btn-default" value="?orderBy=returnDate ASC" onclick="location = this.value;">
								<span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
							</button>							
						</th>
						<th>
							Item
							<button type="button" class="btn btn-default" value="?orderBy=prodName DESC" onclick="location = this.value;">
								<span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
							</button>
							<button type="button" class="btn btn-default" value="?orderBy=prodName ASC" onclick="location = this.value;">
								<span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
							</button>							
						</th>
						<th>
							Quantity
							<button type="button" class="btn btn-default" value="?orderBy=returnQty DESC" onclick="location = this.value;">
								<span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
							</button>
							<button type="button" class="btn btn-default" value="?orderBy=returnQty ASC" onclick="location = this.value;">
								<span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
							</button>							
						</th>
						<th>
							Status
							<button type="button" class="btn btn-default" value="?orderBy=status DESC" onclick="location = this.value;">
								<span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
							</button>
							<button type="button" class="btn btn-default" value="?orderBy=status ASC" onclick="location = this.value;">
								<span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
							</button>							
						</th>
						<th>
							Remarks
						</th>
						<th></th>
					</tr>
					
					<?php
						foreach ($result as $item):
						$retID = $item["returnID"];
					?>
				
					<tr>
						<td><?php echo $item["returnDate"]; ?></td>
						<td><?php echo $item["prodName"]; ?></td>
						<td><?php echo $item["returnQty"]; ?></td>
						<td><?php echo $item["status"]; ?></td>
						<td><?php echo $item["returnRemark"]; ?></td>
						
						<td>
							<button type="button" class="btn btn-default">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</button>
							<a href="deleteRet.php?retId=<?php echo $retID; ?>">
							<button type="button" class="btn btn-default" onclick="return confirm('Are you sure you want to delete this entry?');">
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</button>
							</a>
						</td>
					</tr>
					
					<?php
						endforeach;
					?>
				</table>

				<div class="modal fade" id="myModal" role="dialog">
					 <div class="modal-dialog modal-lg">
						 <div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Add Returned Product</h4>
							</div>
							<div class="modal-body">
								<form action="" method="POST">
									<h3>Item</h3>
									<?php
										$query = $conn->prepare("SELECT prodName FROM product ");
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
									<input type="submit" value="Add" class="btn btn-default" name="addRet">
									<input type="submit" value="Cancel" class="btn btn-default" style="width: 100px">
								</form> 		
							</div>
							<div class="modal-footer">
							  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
	
		<nav class="navbar navbar-inverse navbar-fixed-bottom">
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
					<ul class="nav navbar-nav navbar-right" id="logout">
						<li><a href="login.html">Logout</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-left" id="report">
						<li><a href="report.html">Print Report</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<?php
			if (isset($_POST["addRet"])){
				
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							
				$prod = $_POST['prodItem'];
						
				$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prod'");
				$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
				$prod3 = $prod2['prodA'];
				
				$sql = "INSERT INTO returns (returnDate, returnQty, status, returnRemark, prodID)
				VALUES (CURDATE(),'".$_POST['retQty']."','".$_POST['status']."','".$_POST['retRemarks']."','$prod3')";
				$conn->exec($sql);
				echo "<meta http-equiv='refresh' content='0'>";
			}   
		?>

	</body>
</html>