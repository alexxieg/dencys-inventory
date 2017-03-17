<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<title>Outgoing Products</title>
			
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">
		<link rel="stylesheet" media="screen" type ="text/css" href="css/bootstrap.css">
		
		<script src="outgoing.js"></script>
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
			$sort = (isset($_GET['orderBy']) ? $_GET['orderBy'] : null);
			$searching = (isset($_REQUEST['search']) ? $_REQUEST['search'] : null);
			if (!empty($sort)) {
				$query = $conn->prepare("SELECT product.prodName, product.prodID, product.unitType, product.model, outgoing.outID, outgoing.outQty, outgoing.outDate, employee.empName, branch.location, outgoing.outRemarks 
				FROM outgoing INNER JOIN product ON outgoing.prodID = product.prodID INNER JOIN branch ON outgoing.branchID = branch.branchID INNER JOIN employee ON outgoing.empID = employee.empID 
				ORDER BY $sort");
			} else if (!empty($searching)) {
				$query = $conn->prepare("SELECT product.prodName, product.prodID, product.unitType, product.model, outgoing.outID, outgoing.outQty, outgoing.outDate, employee.empName, branch.location, outgoing.outRemarks 
				FROM outgoing INNER JOIN product ON outgoing.prodID = product.prodID INNER JOIN branch ON outgoing.branchID = branch.branchID INNER JOIN employee ON outgoing.empID = employee.empID 
				WHERE prodName LIKE '%".$searching."%' OR product.prodID LIKE '%".$searching."%' OR model LIKE '%".$searching."%'");
			} else {
				$query = $conn->prepare("SELECT product.prodName, product.prodID, product.unitType, product.model, outgoing.outID, outgoing.outQty, outgoing.outDate, employee.empName, branch.location, outgoing.outRemarks 
				FROM outgoing INNER JOIN product ON outgoing.prodID = product.prodID INNER JOIN branch ON outgoing.branchID = branch.branchID INNER JOIN employee ON outgoing.empID = employee.empID 
				ORDER BY outID ASC;");
			}
			$query->execute();
			$result = $query->fetchAll();
		?>
		
		<nav class="navbar navbar-inverse navbar-fixed-top" >
					<center><img src="logo.png" alt="logo" id="logo"/></center>
					<div class="navName">
						<h1 class="compName">Dency's</h1>
					</div>
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

		<div id="contents">
			<div class="pages no-more-tables">
				<div id="tableHeader">
					<table class="table table-striped table-bordered">	
						<h1 id="headers">OUTGOING PRODUCTS</h1>	
						<form action="?" method="post">
							<input type="text" class="form-control" placeholder="Search" id="searchBar" name="search">
						</form>	
						<button type="button" class="btn btn-info btn-lg btnclr" data-toggle="modal" data-target="#myModal" id="modbutt">
							Add Outgoing Product
						</button>					
					</table>
				</div>
				
				<table class="table table-striped table-bordered">
						<tr>
							<th>
								Date
								<button type="button" class="btn btn-default" value="?orderBy=outDate DESC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
								</button>
								<button type="button" class="btn btn-default" value="?orderBy=outDate ASC" onclick="location = this.value;" id="sortBtn">
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
								<button type="button" class="btn btn-default" value="?orderBy=outQty DESC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
								</button>
								<button type="button" class="btn btn-default" value="?orderBy=outQty ASC" onclick="location = this.value;" id="sortBtn">
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
								Branch
								<button type="button" class="btn btn-default" value="?orderBy=location DESC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
								</button>
								<button type="button" class="btn btn-default" value="?orderBy=location ASC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-up" aria-hidden="true" id="arrowBtn"></span>
								</button>
							</th>	
							<th>
								Remarks
							</th>					
							<th></th>
							</tr>
							
						<?php
							foreach ($result as $item):
							$outid = $item["outID"];
						?>
						
						<tr id="centerData">
							<td data-title="Date"><?php echo $item["outDate"]; ?></td>
							<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
							<td data-title="Description"><?php echo $item["prodName"]; ?></td>
							<td data-title="Model"><?php echo $item["model"]; ?></td>
							<td data-title="Quantity"><?php echo $item["outQty"]; ?></td>
							<td data-title="Unit"><?php echo $item["unitType"]; ?></td>
							<td data-title="Employee"><?php echo $item["empName"]; ?></td>
							<td data-title="Branch"><?php echo $item["location"]; ?></td>
							<td data-title="Remarks"><?php echo $item["outRemarks"]; ?></td>
							<td>
								<a href="editOut.php?outsId=<?php echo $outid; ?>" target="_blank">
								<button type="button" class="btn btn-default">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
								</button>
								</a>
								<a href="deleteOut.php?outsId=<?php echo $outid; ?>">
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
									<h4 class="modal-title">Add Outgoing Product</h4>
								</div>
								<div class="modal-body">
									<form action="" method="POST" onsubmit="return validateForm()">
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
										<input type="number" min = "1" class="form-control" id ="addQty" placeholder="Item Quantity" name="outQty"> <br>
										
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
											
										<h3>Branch</h3>
										<?php
											$query = $conn->prepare("SELECT location FROM branch");
											$query->execute();
											$res = $query->fetchAll();
										?>
										
										<select class="form-control" id="addEntry" name="branch">
											<?php foreach ($res as $row): ?>
												<option><?=$row["location"]?></option>
											<?php endforeach ?>
										</select> 
										<br>
										
										<h3>Remarks</h3>
										<textarea class="form-control" id="addEntry" rows="3" name="outRemarks"></textarea>
										<br>
										
										<span>
										<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="this.form.reset()" style="float:right; margin-left:10px;"> Cancel</button>
										</span>
										
										<span>
											<input type="submit" value="Submit" class="btn btn-success" name="addOut" style="float:right;">
										</span>
									</form>																		
								</div>
								
								<div class="modal-footer">	
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
					</ul>
				<ul class="nav navbar-nav navbar-right" id="logout">
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</nav>
		
		<?php include('addOutgoing.php'); ?>
		
	</body>
</html>

