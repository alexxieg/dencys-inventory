<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Edit Product Delivery Entry</title>

		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link rel="shortcut icon" href="../logo.jpg">

		<!-- Custom styles for this template -->
		<link href="../css/custom.css" rel="stylesheet">
		<link href="../css/sidebar.css" rel="stylesheet">
		
		<!-- Javascript Files -->
		<script src="../js/incoming.js"></script>
		<script src="../js/bootstrap.js"></script>
		<script src="../js/jquery-3.2.0.min.js"></script>	
		<script src="../js/bootstrap.min.js"></script>
		
		<!-- Database Connection -->
		<?php include('dbcon.php'); ?>
		
		<!-- Login Session -->
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
									WHERE incoming.receiptNo = '$incID'
									ORDER BY inID DESC;");
			$query2->execute();
			$result2 = $query2->fetchAll();
			
			$reciptNum = current($conn->query("SELECT incoming.receiptNo FROM incoming WHERE incoming.receiptNo = '$incID'")->fetch());
			$reciptDate = current($conn->query("SELECT incoming.receiptDate FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID WHERE incoming.receiptNo = '$incID'")->fetch());
			$supplier = current($conn->query("SELECT incoming.supplier FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID WHERE incoming.receiptNo = '$incID'")->fetch());
			$employ = current($conn->query("SELECT employee.empFirstName FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID WHERE incoming.receiptNo = '$incID'")->fetch());
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

		<div class="container-fluid" >
			<div class="row">
				<div class="col-sm-3 col-md-2 sidebar">
					<!-- Sidebar -->
					<ul class="nav nav-sidebar">
						<div id="sidebarLogo"><img src="../logo.png" alt=""/></div>
						<li><a href="../inventory.php"><i class="glyphicon glyphicon-list-alt"></i> Inventory</a></li>
						<li class="active"><a href="#" data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="incoming">
								<li><a href="../userincoming.php"><i class="glyphicon glyphicon-list"></i> Purchase Orders</a></li>
								<li><a href="../userproductdeliveries.php"><i class="glyphicon glyphicon-list"></i> Delivered Products</a></li>
							</ul>
						</li>
						<li><a href="../outgoing.php"><i class="glyphicon glyphicon-export"></i> Product Issuance</a></li>
						<li><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-retweet"></i> Returns <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="returns">
								<li><a href="../userReturnsWarehouse.php"><i class="glyphicon glyphicon-home"></i> Warehouse Returns</a></li>
								<li><a href="../userreturnSupplier.php"><i class="glyphicon glyphicon-shopping-cart"></i> Supplier Returns</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#reports"><i class="glyphicon glyphicon-th-list"></i> Reports <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="reports">
								<li><a href="../userbranchreport.php"><i class="glyphicon glyphicon-list-alt"></i> Branch Report</a></li>
								<li><a href="../usermonthlyin.php"><i class="glyphicon glyphicon-list-alt"></i> Product Summary (IN)</a></li>
								<li><a href="../usermonthlyout.php"><i class="glyphicon glyphicon-list-alt"></i> Product Summary (OUT)</a></li>
							</ul>
						</li>
						<li><a href="../userproduct.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a></li>
					</ul>
					</ul>
				</div>
				<!-- End of Sidebar -->
  
				<div class="addInv">
					<h1 id="headers">Edit Product Delivery Entry</h1>
					<br>
					<div id="content">
						<form action="" method="POST" class="editPgs">
							<h5>Receipt No.</h5> 
							<input type="text" class="form-control" id ="addRcpt" placeholder="<?php echo $reciptNum; ?>" value="<?php echo $reciptNum; ?>" name="rcno"><br>
									
							<h5>Receipt Date</h5> 
							<input type="date" class="form-control" id ="addRcptDate" placeholder="<?php echo $reciptDate;?>" value="<?php echo $reciptDate;?>" name="rcdate"><br>
								
							<h5>Supplier</h5> 
							<input type="text" class="form-control" id ="addSupplier" placeholder="<?php echo $supplier;?>" value="<?php echo $supplier;?>" name="supplier"><br>
							
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
									<option SELECTED><?=$employ?></option>
							</select> 
								
							<br>
									
							<h5>Product/s</h5>
							<table class="table table-striped" name="chk">				
								<tbody>
									<?php foreach ($result2 as $row): ?>
										<tr>
											<td><input type="checkbox" name="chk"></td>
											<td><input type="hidden" value="1" name="num" id="orderdata">1</td>
												
											<input type="hidden" name="productInID[]" value="<?php echo $row["inID"]; ?>" />
											
											<td>	
												<?php
													$query = $conn->prepare("SELECT prodName FROM product ");
													$query->execute();
													$res = $query->fetchAll();
												?>
													
												<select class="form-control" id="addItem" name="prodItem[]">
													<option><?=$row["prodName"]?></option>
													<?php foreach ($res as $row3): ?>
														<option><?=$row3["prodName"]?></option>
													<?php endforeach ?>
												</select> 
											</td>
													
											<td>
												<input type="text" class="form-control" id ="addQty" placeholder="<?php echo $row["inQty"]; ?>" value="<?php echo $row["inQty"]; ?>" name="incQty[]">
											</td>
											
											<td>
												<select class="form-control" id="addInStatus" name="inStatus[]">
													<option>Complete</option>
													<option>Partial</option>
												</select> 
											</td>
												
											<td>
												<input type="text" class="form-control" id="addRem" placeholder="<?php echo $row["inRemarks"]; ?>" value="<?php echo $row["inRemarks"]; ?>" name="inRemarks[]">
											</td>
											<td>
												<a href="removeIncomingProduct.php?incID=<?php echo $row["inID"];?>"> 
													<button type="button" value="Delete Row" class="btn btn-default" name="RemoveThis">ReMoVe</button>
												</a>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
								
							<br>
							
							<div class="modFoot">
								<span><button type="button" name="addProduct" class="btn btn-default" data-toggle="modal" data-target="#myModal" id="modbutt">Add Product</button></span>
								<br>
								<br>
								<span>
									<a href="../userincoming.php">
										<input type="button" class="btn btn-danger" id="canBtn" value="Cancel" data-dismiss="modal" onclick="this.form.reset()">
									</a>
								</span>
								<span>
									<input type="submit" name="updateIn" value="Update" class="btn btn-success" id="sucBtn">
								</span>
							</div>
						</form> 								
					</div>								
				</div>
			</div>	
		</div>

		<!-- Modal for New Incoming Entry Form -->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add Incoming Product</h4>
					</div>
					<div class="modal-body">
						<form action="" method="POST" onsubmit="return validateForm()">
							<h5>Receipt No.</h5> 
							<input type="text" class="form-control" id ="addRcpt" placeholder="<?php echo $reciptNum; ?>" value="<?php echo $reciptNum; ?>" name="rcnoEdit" readonly><br>
							
							<h5>Receipt Date</h5> 
							<input type="date" class="form-control" id ="addRcptDate" placeholder="<?php echo $reciptDate;?>" value="<?php echo $reciptDate;?>" name="rcdateEdit" readonly><br>
							
							<h5>Supplier</h5> 
							<input type="text" class="form-control" id ="addSupplier" placeholder="<?php echo $supplier;?>" value="<?php echo $supplier;?>" name="supplierEdit" readonly><br>
													
							<h5>Received By</h5>
							<select class="form-control" id="addEmpl" name="empEdit" READONLY>
									<option SELECTED><?=$employ?></option>
							</select>  
							
							<br>
								
							<h5>Product/s</h5>
							
							<table class="table table-striped" id="dataTable" name="chk">				
								<tbody>
									<tr>
										<td><input type="checkbox" name="chk"></td>
										<td><input type="hidden" value="1" name="num" id="orderdata">1</TD>
										<td>	
											<?php
												$query = $conn->prepare("SELECT prodName FROM product ");
												$query->execute();
												$res = $query->fetchAll();
											?>
									
											<select class="form-control" id="addItem" name="prodItem[]">
												<?php foreach ($res as $row): ?>
														<option><?=$row["prodName"]?></option>
											<?php endforeach ?>
											</select> 
										</td>
												
										<td>
											<input type="text" class="form-control" id ="addQty" placeholder="Quantity" name="incQty[]">
										</td>
										
										<td>
											<select class="form-control" id="addInStatus" name="inStatus[]">
												<option>Complete</option>
												<option>Partial</option>
											</select> 
										</td>
											
										<td>
											<input type="text" class="form-control" id="addRem" placeholder="Remarks" name="inRemarks[]">
										</td>
										<td>
											<input type="text" class="form-control" id="userID" value = "<?php echo $_SESSION['id']; ?>"placeholder="User" name="userID" readonly>
										</td>
									</tr>
								</tbody>
							</table>
							
							<br>
							
							<div class="modFoot">
								<span><button type="button" class="btn btn-default" value="Add Row" onclick="addRow('dataTable')">Add Product</button></span>
								<span><button type="button" value="Delete Row" class="btn btn-default" onclick="deleteRow('dataTable')">Remove from List</button></span>
								<br>
								<br>
								<span><input type="button" class="btn btn-danger" id="canBtn" value="Cancel" data-dismiss="modal" onclick="this.form.reset()"></span>
								<span><input type="submit" name="addEditProducts" value="Add Products" class="btn btn-success" id="sucBtn"></span>
							</div>
						</form> 	
					
						<div class="modal-footer">
						</div>								
					</div>
				</div>
			</div>
		</div> 
		<!-- End of Modal -->
		
		<?php
			$incID= $_GET['incId'];
			$prodTem=(isset($_REQUEST['prodItem']) ? $_REQUEST['prodItem'] : null);
			if (isset($_POST["updateIn"])){
			
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
				for ($index = 0; $index < count($prodTem); $index++) {	
					$inRemarks = $_POST['inRemarks'][$index];
					$prodItem = $_POST['prodItem'][$index];
					$inQty = $_POST['incQty'][$index];
					$inStat = $_POST['inStatus'][$index];
					$rcpNo = $_POST['rcno'];
					$recDate = $_POST['rcdate'];
					$sup = $_POST['supplier'];
					$incomingID = $_POST['productInID'][$index];
					
					$emp = $_POST['emp'];
					$emp1 = $conn->query("SELECT empID AS empA FROM employee WHERE empFirstName = '$emp'");
					$emp2 = $emp1->fetch(PDO::FETCH_ASSOC);
					$emp3 = $emp2['empA'];

					$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prodItem'");
					$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
					$prod3 = $prod2['prodA'];
					
					if (isset($_POST["addProduct"])) {
						$sql = "INSERT INTO incoming (inQty, inDate, receiptNo, receiptDate, supplier, status, inRemarks, empID, prodID)
						VALUES ('$inQty',CURDATE(),'$rcpNo','".$_POST['rcdate']."','".$_POST['supplier']."','$inStat','$inRemarks','$emp3','$prod3')";
						$result = $conn->query($sql); 	
					} else {
						$sql = "UPDATE incoming SET inQty = $inQty, inDate = CURDATE(), receiptNo = '$rcpNo', receiptDate = '$recDate', supplier = '$sup', status = '$inStat', inRemarks = '$inRemarks', empID = '$emp3', prodID = '$prod3'
							WHERE inID = $incomingID";
						$conn->exec($sql);
					}						
					
					/* $sql = "UPDATE outgoing SET outQty = ".$_POST['outQty']." , outDate = CURDATE(), outRemarks = ".$_POST['outRemarks'].", branchID = $branch3, empID = $emp3, prodID = $prod3
					WHERE outID = '$outid'"; */
					  echo "<meta http-equiv='refresh' content='0'>";
				}
			}

			if (isset($_POST["addEditProducts"])){
				for ($index2 = 0; $index2 < count($prodTem); $index2++) {		
					$inRemarks = $_POST['inRemarks'][$index2];
					$prodItem = $_POST['prodItem'][$index2];
					$inQty = $_POST['incQty'][$index2];
					$inStat = $_POST['inStatus'][$index2];
					
					$emp = $_POST['empEdit'];
					$emp1 = $conn->query("SELECT empID AS empA FROM employee WHERE empFirstName = '$emp'");
					$emp2 = $emp1->fetch(PDO::FETCH_ASSOC);
					$emp3 = $emp2['empA'];

					$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prodItem'");
					$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
					$prod3 = $prod2['prodA'];
						
					$sql = "INSERT INTO incoming (inQty, inDate, receiptNo, receiptDate, supplier, status, inRemarks, empID, prodID)
						VALUES ('$inQty',CURDATE(),'$reciptNum','$reciptDate','$supplier','$inStat','$inRemarks','$emp3','$prod3')";
						$result = $conn->query($sql);
				}
				echo "<meta http-equiv='refresh' content='0'>";
			}
			
		?>
	
  </body>
</html>