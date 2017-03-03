<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Outgoing</title>
		
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
			$searching = (isset($_REQUEST['search']) ? $_REQUEST['search'] : null);
			if (!empty($sort)) {
				$query = $conn->prepare("SELECT product.prodName, outgoing.outID, outgoing.outQty, outgoing.outDate, employee.empName, branch.location, outgoing.outRemarks 
				FROM outgoing INNER JOIN product ON outgoing.prodID = product.prodID INNER JOIN branch ON outgoing.branchID = branch.branchID INNER JOIN employee ON outgoing.empID = employee.empID 
				ORDER BY $sort");
			} else if (!empty($searching)) {
				$query = $conn->prepare("SELECT product.prodName, outgoing.outID, outgoing.outQty, outgoing.outDate, employee.empName, branch.location, outgoing.outRemarks 
				FROM outgoing INNER JOIN product ON outgoing.prodID = product.prodID INNER JOIN branch ON outgoing.branchID = branch.branchID INNER JOIN employee ON outgoing.empID = employee.empID 
				WHERE prodName LIKE '%".$searching."%'");
			} else {
				$query = $conn->prepare("SELECT product.prodName, outgoing.outID, outgoing.outQty, outgoing.outDate, employee.empName, branch.location, outgoing.outRemarks 
				FROM outgoing INNER JOIN product ON outgoing.prodID = product.prodID INNER JOIN branch ON outgoing.branchID = branch.branchID INNER JOIN employee ON outgoing.empID = employee.empID 
				ORDER BY outID ASC;");
			}
			$query->execute();
			$result = $query->fetchAll();
		?>
		
		<div class="productHolder" >
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
		</div>
	
		<div class="pages">
			<div id="tableHeader">
				<table class="table table-striped table-bordered">	

							<h1 id="headers">Outgoing</h1>


					
							<form action="?" method="post">
								<input type="text" class="form-control" placeholder="Search" id="searchBar" name="search">
								<button type="submit" name="submit">
									<span class="glyphicon glyphicon-search"></span>
								</button>
							</form>
						
							<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="modbutt">Add Outgoing Product</button>
						
				</table>
			</div>
			
			<table class="table table-striped table-bordered">
				<tr>
					<th style="text-align:center">The following have been deducted from the Inventory:</th>
				</tr>
				<tr>
					<th>
						Item
						<button type="button" class="btn btn-default" value="?orderBy=prodName DESC" onclick="location = this.value;">
							<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-default" value="?orderBy=prodName ASC" onclick="location = this.value;">
							<span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
						</button>						
					</th>
					<th>
						Quantity
						<button type="button" class="btn btn-default" value="?orderBy=outQty DESC" onclick="location = this.value;">
							<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-default" value="?orderBy=outQty ASC" onclick="location = this.value;">
							<span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
						</button>
					</th>
					<th>
						Date
						<button type="button" class="btn btn-default" value="?orderBy=outDate DESC" onclick="location = this.value;">
							<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-default" value="?orderBy=outDate ASC" onclick="location = this.value;">
							<span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
						</button>
					</th>
					<th>
						Employee
						<button type="button" class="btn btn-default" value="?orderBy=empName DESC" onclick="location = this.value;">
							<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-default" value="?orderBy=empName ASC" onclick="location = this.value;">
							<span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
						</button>
					</th>
					<th>
						Branch
						<button type="button" class="btn btn-default" value="?orderBy=location DESC" onclick="location = this.value;">
							<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-default" value="?orderBy=location ASC" onclick="location = this.value;">
							<span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
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

				<tr>
					<td><?php echo $item["prodName"]; ?></td>
					<td><?php echo $item["outQty"]; ?></td>
					<td><?php echo $item["outDate"]; ?></td>
					<td><?php echo $item["empName"]; ?></td>
					<td><?php echo $item["location"]; ?></td>
					<td><?php echo $item["outRemarks"]; ?></td>
					<td>
						<button type="button" class="btn btn-default">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</button>
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
									<input type="text" class="form-control" id ="addEntry" placeholder="Item Quantity" name="outQty"> <br>
									
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
								<textarea class="form-control" id="addEntry" rows="3" name="outRemarks"></textarea> <br>
								
								<input type="submit" value="Add" class="btn btn-success" name="addOut" onclick="alert('Outgoing Product Successfully Added');">
								<input type="submit" value="Cancel"class="btn btn-default" style="width: 100px;">
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
			if (isset($_POST["addOut"])){
			
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 			
				$prod = $_POST['prodItem'];
				$emp = $_POST['emp'];
				$branch = $_POST['branch'];
								
				$emp1 = $conn->query("SELECT empID AS empA FROM employee WHERE empName = '$emp'");
				$emp2 = $emp1->fetch(PDO::FETCH_ASSOC);
				$emp3 = $emp2['empA'];
						
				$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prod'");
				$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
				$prod3 = $prod2['prodA'];
				
				$branch1 = $conn->query("SELECT branchID AS branchA from branch WHERE location = '$branch'");
				$branch2 = $branch1->fetch(PDO::FETCH_ASSOC);
				$branch3 = $branch2['branchA'];
				
				$sql = "INSERT INTO outgoing (outQty, outDate, outRemarks, branchID, empID, prodID)
				VALUES ('".$_POST['outQty']."',CURDATE(),'".$_POST['outRemarks']."','$branch3','$emp3','$prod3')";
				$conn->exec($sql);
				echo "<meta http-equiv='refresh' content='0'>";
			}    
		?>
	</body>
</html>

