<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Incoming</title>
		
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
		<link rel="stylesheet" type ="text/css" href="css/bootstrap.css">
		<script src="js/bootstrap.js"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
  
	<body>
		<?php
			$sort = (isset($_GET['orderBy']) ? $_GET['orderBy'] : null);
			if (!empty($sort)) {
				$query = $conn->prepare("SELECT product.prodName, incoming.inQty, incoming.inDate, suppliers.supplier_name, incoming.receiptNo, incoming.receiptDate, incoming.inRemarks 
				FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN suppliers ON incoming.supID = suppliers.supID 
				ORDER BY $sort");
			} else {
				$query = $conn->prepare("SELECT product.prodName, incoming.inQty, incoming.inDate, suppliers.supplier_name, incoming.receiptNo, incoming.receiptDate, incoming.inRemarks 
				FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN suppliers ON incoming.supID = suppliers.supID 
				ORDER BY inID ASC;");
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
				<tr>
					<h1 id="headers">Incoming</h1>
				</tr>	

				<tr>
					<td>
						<select class="form-control" id="dropdown" name="sortBy" onchange="location = this.value;">
							<option value="" disabled selected hidden>--SELECTA--</option>
							<option value="?orderBy=prodName">Item</option>
							<option value="?orderBy=inQty">Quantity</option>
							<option value="?orderBy=inDate">Date</option>
							<option value="?orderBy=supplier_name">Supplier</option>
							<option value="?orderBy=receiptNo">Receipt No.</option>
							<option value="?orderBy=receiptDate">Receipt Date</option>
						</select>
					</td>
							
					<td>
						<select class="form-control" id="dropdown" name="sortby">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</td>
						
					<td>
						<input type="text" class="form-control" placeholder="Search" id="searchBar" name="search">
					</td>
					<td>
						<button id="modbutt" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Incoming Product</button>
					</td>
				</tr>
			</table>
		</div>
			
		<table class="table table-striped table-bordered">
			<tr>
				<th style="text-align:center">The Following Have been added to the Inventory</th>
			</tr>				
			<tr>
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
					<button type="button" class="btn btn-default" value="?orderBy=inQty DESC" onclick="location = this.value;">
						<span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
					</button>
					<button type="button" class="btn btn-default" value="?orderBy=inQty ASC" onclick="location = this.value;">
						<span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
					</button>
				</th>
				<th>
					Date
					<button type="button" class="btn btn-default" value="?orderBy=inDate DESC" onclick="location = this.value;">
						<span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
					</button>
					<button type="button" class="btn btn-default" value="?orderBy=inDate ASC" onclick="location = this.value;">
						<span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
					</button>
				</th>
				<th>
					Supplier
					<button type="button" class="btn btn-default" value="?orderBy=supplier_name DESC" onclick="location = this.value;">
						<span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
					</button>
					<button type="button" class="btn btn-default" value="?orderBy=supplier_name ASC" onclick="location = this.value;">
						<span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
					</button>
				</th>
				<th>
					Receipt No.
					<button type="button" class="btn btn-default" value="?orderBy=receiptNo DESC" onclick="location = this.value;">
						<span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
					</button>
					<button type="button" class="btn btn-default" value="?orderBy=receiptNo ASC" onclick="location = this.value;">
						<span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
					</button>
				</th>
				<th>
					Receipt Date
					<button type="button" class="btn btn-default" value="?orderBy=receiptDate DESC" onclick="location = this.value;">
						<span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
					</button>
					<button type="button" class="btn btn-default" value="?orderBy=receiptDate ASC" onclick="location = this.value;">
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
			?>

			<tr>
				<td><?php echo $item["prodName"]; ?></td>
				<td><?php echo $item["inQty"]; ?></td>
				<td><?php echo $item["inDate"]; ?></td>
				<td><?php echo $item["supplier_name"]; ?></td>
				<td><?php echo $item["receiptNo"]; ?></td>
				<td><?php echo $item["receiptDate"]; ?></td>
				<td><?php echo $item["inRemarks"]; ?></td>
				<td>
					<button type="button" class="btn btn-default">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</button>
				
					<button type="button" class="btn btn-default">
						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
					</button>
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
						<h4 class="modal-title">Modal Header</h4>
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
							<input type="text" class="form-control" id ="addEntry" placeholder="Item Quantity" name="incQty"> <br>
							
							<h3>Employee</h3>
							<?php
								$query = $conn->prepare("SELECT empName FROM employee ");
								$query->execute();
								$res = $query->fetchAll();
							?>
						
							<select class="form-control" id="addEntry" name="emp">
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
						
							<select class="form-control" id="addEntry" name="sup">
								<?php foreach ($res as $row): ?>
									<option><?=$row["supplier_name"]?></option>
								<?php endforeach ?>
							</select> 
							<br>
							
							<h3>Receipt Number</h3>
							<input type="text" class="form-control" id ="addEntry" placeholder="Receipt Number" name="inRecN"> <br>
				
							<h3>Remarks</h3>
							<textarea class="form-control" id="addEntry" rows="3" name="inRemarks"></textarea> <br>

							<br>
							<input type="submit" value="Add" class="btn btn-default" name="addInc">
							<input type="submit" value="Cancel" class="btn btn-default" style="width: 100px">
						</form> 			
					</div>
				
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
		
			if (isset($_POST["addInc"])){
			
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 			
				$prod = $_POST['prodItem'];
				$emp = $_POST['emp'];
				$sup = $_POST['sup'];
				
				$emp1 = $conn->query("SELECT empID AS empA FROM employee WHERE empName = '$emp'");
				$emp2 = $emp1->fetch(PDO::FETCH_ASSOC);
				$emp3 = $emp2['empA'];
						
				$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prod'");
				$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
				$prod3 = $prod2['prodA'];
				
				$sup1 = $conn->query("SELECT supID AS supA from suppliers WHERE supplier_name = '$sup'");
				$sup2 = $sup1->fetch(PDO::FETCH_ASSOC);
				$sup3 = $sup2['supA'];
				
				$sql = "INSERT INTO incoming (inQty, inDate, receiptNo, inRemarks, empID, prodID, supID)
				VALUES ('".$_POST['incQty']."',CURDATE(),'".$_POST['inRecN']."','".$_POST['inRemarks']."','$emp3','$prod3','$sup3')";
				$conn->exec($sql);
				
/*				$emp1 = $conn->prepare("SELECT empID AS emp FROM employee WHERE empName = '$emp'");
				$emp1->execute();
						
				$prod1 = $conn->prepare("SELECT prodID AS prod FROM product WHERE prodName = '$prod'");
				$prod1->execute();
				
				$sup1 = $conn->prepare("SELECT supID AS sup from suppliers WHERE supplier_name = '$sup'");
				$sup1->execute();
				
				$sql = "INSERT INTO incoming (inQty, inDate, receiptNo, inRemarks, empID, prodID, supID)
				VALUES ('".$_POST['incQty']."',CURDATE(),'".$_POST['inRecN']."','".$_POST['inRemarks']."',$emp1,$prod1,$sup1)";
				$conn->exec($sql);
*/
			}    
			
	?>
  </body>
</html>