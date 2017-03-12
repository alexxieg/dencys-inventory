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
			$role = $_SESSION['sess_role'];
			if (!isset($_SESSION['id']) && $role!="user") {
				header('Location: index.php');
			}
			$session_id = $_SESSION['id'];
			$session_query = $conn->query("select * from users where userName = '$session_id'");
			$user_row = $session_query->fetch();
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
			$searching = (isset($_REQUEST['search']) ? $_REQUEST['search'] : null);
			if (!empty($sort)) {
				$query = $conn->prepare("SELECT product.prodName, product.prodID, product.model, product.unitType, incoming.inID, incoming.inQty, incoming.inDate, employee.empName, incoming.receiptNo, incoming.receiptDate, incoming.inRemarks 
										FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID
										ORDER BY $sort");
			} else if (!empty($searching)) {
				$query = $conn->prepare("SELECT product.prodName, product.prodID, product.model, product.unitType, incoming.inID, incoming.inQty, incoming.inDate, employee.empName, incoming.receiptNo, incoming.receiptDate, incoming.inRemarks 
										FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID
										WHERE prodName LIKE '%".$searching."%'");
			} else {
				$query = $conn->prepare("SELECT product.prodName, product.prodID, product.model, product.unitType, incoming.inID, incoming.inQty, incoming.inDate, employee.empName, incoming.receiptNo, incoming.receiptDate, incoming.inRemarks 
										FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID
										ORDER BY inID ASC;");
			}
			$query->execute();
			$result = $query->fetchAll();
		?>
		
			<div class="productHolder">
				<nav class="navbar navbar-inverse navbar-fixed-top">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<h1 id="mainHeader">Dency's Hardware and General Merchandise</h1>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right" id="categories">
								<li><a href="userInventory.php">Inventory</a></li>
								<li><a href="userIncoming.php">Incoming</a></li>
								<li><a href="userOutgoing.php">Outgoing</a></li>
								<li><a href="userReturns.php">Returns</a></li>
								<li><a href="userProduct.php">Products</a></li>
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</div>
					</div>
				</nav>
			</div>	

	<div id="contents">
		<div class="pages">
			<div class="pages no-more-tables">
				<div id="tableHeader">
					<table class="table table-striped table-bordered">	
						<h1 id="headers">INCOMING PRODUCTS</h1>
						<form action="?" method="post">
							<input type="text" class="form-control" placeholder="Search" id="searchBar" name="search">
						</form>
						<button type="button" class="btn btn-info btn-lg btnclr" data-toggle="modal" data-target="#myModal" id="modbutt">
							Add Incoming Product
						</button>		
					</table>
				</div>
					
				<table class="table table-striped table-bordered">		
					<tr>
						<th>
							Date
							<button type="button" class="btn btn-default" value="?orderBy=inDate DESC" onclick="location = this.value;" id="sortBtn">
								<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
							</button>
							<button type="button" class="btn btn-default" value="?orderBy=inDate ASC" onclick="location = this.value;" id="sortBtn">
								<span class="glyphicon glyphicon-chevron-up" aria-hidden="true" id="arrowBtn"></span>
							</button>
						</th>
						<th>
							Product ID
						</th>
						<th>
							Product Description
							<button type="button" class="btn btn-default" value="?orderBy=prodName DESC" onclick="location = this.value;" id="sortBtn">
								<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
							</button>
							<button type="button" class="btn btn-default" value="?orderBy=prodName ASC" onclick="location = this.value;" id="sortBtn">
								<span class="glyphicon glyphicon-chevron-up" aria-hidden="true" id="arrowBtn"></span>
							</button>
						</th>
						<th>
							Model
						</th>
						<th>
							Quantity
							<button type="button" class="btn btn-default" value="?orderBy=inQty DESC" onclick="location = this.value;" id="sortBtn">
								<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
							</button>
							<button type="button" class="btn btn-default" value="?orderBy=inQty ASC" onclick="location = this.value;" id="sortBtn">
								<span class="glyphicon glyphicon-chevron-up" aria-hidden="true" id="arrowBtn"></span>
							</button>
						</th>
						<th>
							Unit
						</th>
						<th>
							Employee
							<button type="button" class="btn btn-default" value="?orderBy=empName DESC" onclick="location = this.value;" id="sortBtn">
								<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
							</button>
							<button type="button" class="btn btn-default" value="?orderBy=empName ASC" onclick="location = this.value;" id="sortBtn">
								<span class="glyphicon glyphicon-chevron-up" aria-hidden="true" id="arrowBtn"></span>
							</button>
						</th>
						<th>
							Receipt No.		
						</th>
						<th>
							Remarks
						</th>
					</tr>
							
					<?php
						foreach ($result as $item):
						$incID = $item["inID"];
					?>

					<tr id="centerData">
						<td data-title="Date"><?php echo $item["inDate"]; ?></td>	
						<td data-title="Product ID"><?php echo $item["prodID"];?></td>
						<td data-title="Description"><?php echo $item["prodName"]; ?></td>
						<td data-title="Model"><?php echo $item["model"]; ?></td>
						<td data-title="Quantity"><?php echo $item["inQty"]; ?></td>
						<td data-title="Unit"><?php echo $item["unitType"]; ?></td>
						<td data-title="Employee"><?php echo $item["empName"]; ?></td>
						<td data-title="Receipt No."><?php echo $item["receiptNo"]; ?></td>
						<td data-title="Remarks"><?php echo $item["inRemarks"]; ?></td>			
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
								<h4 class="modal-title">Add Incoming Product</h4>
							</div>
							<div class="modal-body">
								<form action="/action_page.php">
									Receipt No. 
								  <input type="text" class="form-control" id ="addEntry" placeholder="Receipt Number" name="rcno"><br>
								</form>
							  <table class="table table-striped" id="tblGrid">
								<thead id="tblHead">
								  <tr>
									<th>Item</th>
									<th>Quantity</th>
									<th class="text-right">Employee</th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									<td></td>
									<td></td>
									<td class="text-right"></td>
								  </tr>
								  <tr><td></td>
									<td></td>
									<td class="text-right"></td>
								  </tr>
								  <tr>
									<td></td>
									<td></td>
									<td class="text-right"></td>
								  </tr>
								</tbody>
							  </table>
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

									<h3>Remarks</h3>
									<textarea class="form-control" id="addEntry" rows="3" name="inRemarks"></textarea> <br>

									<br>
									<input type="submit" value="Add" class="btn btn-default btnclr" name="addInc" onclick="alert('Incoming Product Successfully Added');">
									<input type="submit" value="Cancel" class="btn btn-default btnclr" style="width: 100px">
								</form> 			
							</div>
						
							<div class="modal-footer">
								<button type="button" class="btn btn-primary btnclr" onclick="alert('Saved changes successful!');">Save Changes</button>
							</div>
						</div>
					</div>			
				</div>
			</div>	
		</div>
	</div>
			
		<nav class="navbar navbar-inverse navbar-fixed-bottom">
			<div class="container">
				<ul class="nav navbar-nav navbar-left" id="report">
					<li>
						<button class="btn btn-success btn-lg" onclick="myFunction()" id="printBtn">
							<span class="glyphicon glyphicon-print"></span>
						    Print
						</button> 
					</li>
				</ul>
			</div>
		</nav>
		
		<?php include('addIncoming.php'); ?>
	</body>
</html>
