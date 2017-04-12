<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Edit Incoming Entries</title>

		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link rel="shortcut icon" href="../logo.jpg">

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="../css/test.css" rel="stylesheet">
		<link href="../css/sidebar.css" rel="stylesheet">
		
		<script src="../incoming.js"></script>
		<script src="../js/bootstrap.js"></script>
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
			$incID= $_GET['incId'];
			$query = $conn->prepare("SELECT product.prodName, product.prodID, product.unitType, incoming.inID, incoming.inQty, incoming.inDate, MONTHNAME(incoming.inDate) AS nowMonthDate, YEAR(inDate) AS nowYearDate, employee.empFirstName, incoming.receiptNo, incoming.receiptDate, incoming.supplier, incoming.status, incoming.inRemarks 
									FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID
									ORDER BY inID DESC;");
			$query->execute();
			$result = $query->fetchAll();
			
			$query2 = $conn->prepare("SELECT product.prodName, product.prodID, product.unitType, incoming.inID, incoming.inQty, incoming.inDate, MONTHNAME(incoming.inDate) AS nowMonthDate, YEAR(inDate) AS nowYearDate, employee.empFirstName, incoming.receiptNo, incoming.receiptDate, incoming.supplier, incoming.status, incoming.inRemarks
									FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID
									WHERE incoming.inID = $incID
									ORDER BY inID DESC;");
			$query2->execute();
			$result2 = $query2->fetchAll();
			
			$reciptNum = current($conn->query("SELECT incoming.receiptNo FROM incoming WHERE incoming.inID = $incID")->fetch());
			$reciptDate = current($conn->query("SELECT incoming.receiptDate FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID WHERE incoming.inID = $incID")->fetch());
			$prodName = current($conn->query("SELECT product.prodName FROM incoming INNER JOIN product ON incoming.prodID = product.prodID WHERE incoming.inID = $incID")->fetch());
			$incomingQty = current($conn->query("SELECT incoming.inQty FROM incoming WHERE incoming.inID = $incID")->fetch());
			$incomingRemarks = current($conn->query("SELECT incoming.inRemarks FROM incoming WHERE incoming.inID = $incID")->fetch());
			$supplier = current($conn->query("SELECT incoming.supplier FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID WHERE incoming.inID = $incID")->fetch());
			$employ = current($conn->query("SELECT employee.empFirstName FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID WHERE incoming.inID = $incID")->fetch());
		?>

		<!-- Top Main Header -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Dency's Hardware and General Merchandise</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
					<li><a href="Logout.php">Logout</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- End of Top Main Header -->

		<div class="container-fluid">
			<div class="row">
				<!-- Sidebar -->
				<div class="col-sm-3 col-md-2 sidebar">
					<ul class="nav nav-sidebar">
						<div id="sidebarLogo"><img src="../logo.png" alt=""/></div>
						<li class="active">
							<a href="inventory.php">
								<i class="glyphicon glyphicon-list-alt"></i> Inventory<span class="sr-only">(current)</span>
							</a>
						</li>
						<li><a href="../incoming.php"><i class="glyphicon glyphicon-import"></i> Incoming</a></li>
						<li><a href="../outgoing.php"><i class="glyphicon glyphicon-export"></i> Outgoing</a></li>
						<li><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-retweet"></i> Returns <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="returns">
								<li><a href="../returns.php"><i class="glyphicon glyphicon-home"></i> Warehouse Returns</a></li>
								<li><a href="../returnSupplier.php"><i class="glyphicon glyphicon-shopping-cart"></i> Supplier Returns</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#reports"><i class="glyphicon glyphicon-th-list"></i> Reports <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="reports">
								<li><a href="../branchReport.php"><i class="glyphicon glyphicon-list-alt"></i> Branch Report</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#manage"><i class="glyphicon glyphicon-pencil"></i> Manage <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="manage">
								<li><a href="../accounts.php"><i class="glyphicon glyphicon-lock"></i> Accounts</a></li>
								<li><a href="../branches.php"><i class="glyphicon glyphicon-home"></i> Branches</a></li>
								<li><a href="../employees.php"><i class="glyphicon glyphicon-user"></i> Employees</a></li>
								<li><a href="../product.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a></li>
								<li><a href="../brands.php"><i class="glyphicon glyphicon-sort-by-attributes"></i> Product Brands</a></li>
								<li><a href="../category.php"><i class="glyphicon glyphicon-book"></i> Product Categories</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- End of Sidebar -->
		
		
  
		<!-- Table for Partial -->
			<div class="addInv">
				<h1 id="headers">Resolve partial delivery</h1>
				<div id="content">
					<form action="" method="POST" onsubmit="return validateForm()" class="editPgs">
						<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
							<tr>
								<th>Initial Receipt No.</th>
								<th>Receipt Date</th>
								<th>Supplier</th>
								<th>Received By</th>
								<th>Product/s</th>
								<th>Initial Quantity</th>
								<th>Remarks</th>
							</tr>
							<tr>
								<td><?php echo $reciptNum; ?></td>
								<td><?php echo $reciptDate; ?></td>
								<td><?php echo $supplier; ?></td>
								<td><?php echo $employ; ?></td>
								<td><?php echo $prodName; ?></td>
								<td><?php echo $incomingQty; ?></td>
								<td><?php echo $incomingRemarks; ?></td>
							</tr>
						</table>
						
						
							<h5>Receipt No.</h5> 
							<input type="text" class="form-control" id ="addRcpt" placeholder="Receipt No" name="rcno"><br>
							
							<h5>Receipt Date</h5> 
							<input type="date" class="form-control" id ="addRcptDate" placeholder="Receipt Date" name="rcdate"><br>
							
							<h5>Supplier</h5> 
							<input type="text" class="form-control" id ="addSupplier" placeholder="Supplier" name="supplier"><br>
						
						<h5>Received By</h5>				
						<select class="form-control" id="addEmpl" name="emp">
							<?php
								$query = $conn->prepare("SELECT empFirstName FROM employee ");
								$query->execute();
								$res = $query->fetchAll();
							?>
							<?php foreach ($res as $row): ?>
								<option><?=$row["empFirstName"]?></option>
							<?php endforeach ?>
						</select> 
						
						<br>
								
						<h5>Product/s</h5>
						<table class="table table-striped" id="dataTable" name="chk">				
							<tbody>
								
									<tr>
										
										<td>	
											<input type="text" class="form-control" id ="addRcpt" placeholder="<?php echo $prodName; ?>" value="<?php echo $prodName; ?>" name="prodItem" readonly>
										</td>
												
										<td>
											<input type="text" class="form-control" id ="addQty" placeholder="Quantity" name="incQty">
										</td>
										
										<td>
											<select class="form-control" id="addInStatus" name="inStatus">
												<option>Complete</option>
												<option>Partial</option>
											</select> 
										</td>
										
										<td>
											<input type="text" class="form-control" id="addRem" placeholder="Remarks" name="inRemarks">
										</td>
									</tr>
							</tbody>
						</table>
						
						<br>
						
						<div class="modFoot">
						<br>
						<br>
						<span>
							<a href="../incoming.php">
								<input type="button" class="btn btn-danger" id="canBtn" value="Cancel" data-dismiss="modal" onclick="this.form.reset()">
							</a>
						</span>
						<span>
							<input type="submit" name="updateIn" value="Resolve" class="btn btn-success" id="sucBtn">
						</span>
						</div>
					</form> 	
				
					
				</div>								
			</div>
			 
			<!-- End of Modal -->
		
	<?php
			$incID= $_GET['incId'];
			if (isset($_POST["updateIn"])){
			
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$inRemarks = $_POST['inRemarks'];
				$prodItem = $_POST['prodItem'];
				$inQty = $_POST['incQty'];
				$inStat = $_POST['inStatus'];
				$rcpNo = $_POST['rcno'];
				$recDate = $_POST['rcdate'];
				$sup = $_POST['supplier'];
				$incomingID = $_POST['productInID'];
				
				$emp = $_POST['emp'];
				$emp1 = $conn->query("SELECT empID AS empA FROM employee WHERE empFirstName = '$emp'");
				$emp2 = $emp1->fetch(PDO::FETCH_ASSOC);
				$emp3 = $emp2['empA'];

				$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prodItem'");
				$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
				$prod3 = $prod2['prodA'];
				
				$sql = "INSERT INTO incoming (inQty, inDate, receiptNo, receiptDate, supplier, status, inRemarks, empID, prodID, partialRcptNo, partialRcptDate)
				VALUES ('$inQty',CURDATE(),'$rcpNo','".$_POST['rcdate']."','".$_POST['supplier']."','$inStat','$inRemarks','$emp3','$prod3', '$reciptNum', '$reciptDate')";
				$result = $conn->query($sql); 	
							
				
				/* $sql = "UPDATE outgoing SET outQty = ".$_POST['outQty']." , outDate = CURDATE(), outRemarks = ".$_POST['outRemarks'].", branchID = $branch3, empID = $emp3, prodID = $prod3
				WHERE outID = '$outid'"; */
				echo "<meta http-equiv='refresh' content='0'>";
			}    
	?>
	
  </body>
</html>