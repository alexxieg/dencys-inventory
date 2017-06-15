<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Edit Supplier Return Entry</title>
	
		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link rel="shortcut icon" href="../logo.jpg">

		<!-- Custom styles for this template -->
		<link href="../css/custom.css" rel="stylesheet">
		<link href="../css/sidebar.css" rel="stylesheet">
		
		<!-- Javascript Files -->
		<script src="../js/returnSupplier.js"></script>
		<script src="../js/bootstrap.js"></script>
		<script src="../js/jquery-3.2.0.min.js"></script>	
		<script src="../js/bootstrap.min.js"></script>
		<script src="../alertboxes/sweetalert2.min.js"></script>
		<link rel="stylesheet" href="../alertboxes/sweetalert2.min.css">
		
		<!-- Autocomplete Script -->
		<link rel="stylesheet" href="../css/jquery-ui.css">
		<script src="../js/jquery-1.9.1.js"></script>
		<script src="../js/jquery-ui.js"></script>
		
		<!-- Database Connection -->
		<?php include('dbcon.php'); ?>
		
		<script>
		  $(function() {
			$('#addSupplier').autocomplete({
				minLength:2,
				source: "../searchSup.php"
			});
		  });

		</script>
		
		<script>
		  $(function() {
			$('.thisProduct').autocomplete({
				minLength:2,
				source: "../search.php"
			});
		  });
		</script>
		
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
		<!-- Retrieved Selected Entry Details -->
		<?php
			$retID= $_GET['retId'];
			$query = $conn->prepare("SELECT product.prodID, returns.returnDate, returns.returnID, product.prodName, returns.returnQty, returns.returnRemark, returns.userID, returns.receiptNo, branch.branchID, branch.location
					FROM returns INNER JOIN product ON returns.prodID = product.prodID JOIN branch ON branch.branchID = returns.branchID  ");
			$query->execute();
			$res = $query->fetchAll();
			
			$query2 = $conn->prepare("SELECT product.prodID, returns.returnDate, returns.returnID, product.prodName, returns.returnQty, returns.returnRemark, returns.userID, returns.receiptNo, branch.branchID, branch.location
					FROM returns INNER JOIN product ON returns.prodID = product.prodID JOIN branch ON branch.branchID = returns.branchID  
					WHERE receiptNo = '$retID' ");
			$query2->execute();
			$resul = $query2->fetchAll();
			
			$supplierName = current($conn->query("SELECT supplier_name FROM suppliers JOIN returns ON suppliers.supID = returns.supID WHERE returns.receiptNo = '$retID'")->fetch());
			$employName = current($conn->query("SELECT empFirstName FROM employee JOIN returns ON employee.empID = returns.empID WHERE returns.receiptNo = '$retID'")->fetch());
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
					<a class="navbar-brand" href="../userinventory">DENCY'S HARDWARE AND GENERAL MERCHANDISE</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
					<li id="adminhead"><a href="#">User |</a></li>
						<li id="loghead"><a href="../Logout.php"><i class="glyphicon glyphicon-off"></i> LOGOUT</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- End of Top Main Header -->

		<div class="container-fluid">
			<div class="row navbar-collapse">
				<div id="sidebarCol" class="col-sm-3 col-md-2 sidebar">
					<ul class="nav nav-sidebar">
						<div id="sidebarLogo"><img src="../logo.png" alt=""/></div>
							<li><a href="#"data-toggle="collapse" data-target="#inventory"><i class="glyphicon glyphicon-list-alt"></i> Inventory<i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
								<ul class="list-unstyled collapse" id="inventory">
									<li><a href="../userinventory.php"><i class="glyphicon glyphicon-list"></i> Current Inventory</a></li>
									<li><a href="../userDefectives.php"><i class="glyphicon glyphicon-list"></i> Defectives</a></li>
								</ul>
							</li>
						<li><a href="#" data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries<i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="incoming">
								<li><a href="../userPurchaseOrders.php"><i class="glyphicon glyphicon-list"></i> Purchase Orders</a></li>
								<li><a href="../userproductdeliveries.php"><i class="glyphicon glyphicon-list"></i> Delivered Products</a></li>
							</ul>
						</li>
						<li><a href="../userProdIssuance.php"><i class="glyphicon glyphicon-export"></i> Product Issuance</a></li>
						<li class="active"><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-retweet"></i> Returns <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="returns">
								<li><a href="../userReturnsWarehouse.php"><i class="glyphicon glyphicon-home"></i> Warehouse Returns</a></li>
								<li><a href="../userReturnSupplier.php"><i class="glyphicon glyphicon-shopping-cart"></i> Supplier Returns</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#reports"><i class="glyphicon glyphicon-th-list"></i> Reports <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="reports">
								<li><a href="../userbranchreport.php"><i class="glyphicon glyphicon-list-alt"></i> Branch Report</a></li>
								<li><a href="../usermonthlyin.php"><i class="glyphicon glyphicon-list-alt"></i> Product Summary (IN)</a></li>
								<li><a href="../usermonthlyout.php"><i class="glyphicon glyphicon-list-alt"></i> Product Summary (OUT)</a></li>
							</ul>
						</li>
						<li><a href="../usersuppliers.php"><i class="glyphicon glyphicon-user"></i> Suppliers</a></li>
						<li><a href="../userproduct.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a></li>
					</ul>
				</div>
				<!-- End of Sidebar -->	
					
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">				
					<div id="contents">
						<div class="pages no-more-tables">
							<h1 id="headers">Edit Supplier Return Entry</h1>
							<br>
							<div id="contents">
								<form action="" method="POST" onsubmit="return validateForm5()">
									<h3>User</h3>
									<input type="text" class="form-control" id="userID" value = "<?php echo $_SESSION['id']; ?>" placeholder="User" name="userID" readonly>
									
									<h3>Receipt No.</h3>
									<input type="text" class="form-control" id="userID" value = "<?php echo $retID; ?>"placeholder="User" name="recID" readonly>
									
									<h3>Supplier</h3>  
									<div class="ui-widget">
										<input id="addSupplier" name="supplier" placeholder="Supplier" value = "<?php echo $supplierName; ?>">
									</div>
								
									<h3>Handled By</h3>
									<?php
										$query = $conn->prepare("SELECT empFirstName FROM employee ");
										$query->execute();
										$res = $query->fetchAll();
									?>
														
									<select class="form-control" id="addEmpl" name="emp">
										<option SELECTED><?=$employName?></option>
										<?php foreach ($res as $row): ?>
											<option><?=$row["empFirstName"]?></option>
										<?php endforeach ?>
									</select> 
									<br>
									
									<h5 id="multipleProd">Product/s</h5>
									<table class="table table-striped" id="dataTable2" name="chk">
										<tbody>
											<tr>
												<td>
												</td>
												<td>
													Product Name
												</td>
												<td>
													Quantity
												</td>
												<td>
													Remarks
												</td>
											</tr>
											<?php foreach ($resul as $row2): ?>
											<tr>
												<td>
													<input type="hidden" name="returnID[]" value="<?php echo $row2["returnID"]; ?>" />
												</td>
												<td>	
													<div class="ui-widget">
														<input class="thisProduct" name="prodItem[]" value="<?php echo $row2["prodName"]; ?>" placeholder="<?php echo $row2["prodName"]; ?>" required>
														<input type="hidden" name="editProdItem[]" value="<?php echo $row2["prodName"]; ?>" />
														<input type="hidden" name="iniDate[]" value="<?php echo $row2["returnDate"];?>" />
														<input type="hidden" name="iniUser[]" value="<?php echo $row2["userID"];?>" />
													</div>		
												</td>
														
												<td>
													<input type="number" min="1" class="form-control" id ="addQty" value="<?php echo $row2["returnQty"]; ?>" placeholder="<?php echo $row2["returnQty"]; ?>" name="retQty[]" required>
													<input type="hidden" name="editRetQty[]" value="<?php echo $row2["returnQty"]; ?>" />
												</td>
																								
												<td>
													<input type="text" class="form-control" id="addEntry" placeholder="<?php echo $row2["returnRemark"]; ?>" value="<?php echo $row2["returnRemark"]; ?>" name="retRemarks[]">
													<input type="hidden" name="editRetRemarks[]" value="<?php echo $row2["returnRemark"]; ?>" />
												</td>
											</tr>
											<?php endforeach ?>
										</tbody>
									</table>
											
									<div class="modFoot">
										<span>
											<a href="../userreturnSupplier.php">
												<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="this.form.reset()" id="canBtn"> Cancel</button>
											</a>
										</span>
										<span>
											<input type="submit" value="Update" class="btn btn-success" name="addRet" id="sucBtn">
										</span>
									</div>
									<div class="modal-footer">
									</div>	
								</form> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
			
	<!-- Edit Log -->
		<?php
		require_once 'dbcon.php';
		$retID= $_GET['retId'];
		$prodTem=(isset($_REQUEST['prodItem']) ? $_REQUEST['prodItem'] : null);
		if (isset($_POST["addRet"])){
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			for ($index2 = 0; $index2 < count($prodTem); $index2++) {		
				$returnID = $_POST['returnID'][$index2];
				$iniDate = $_POST['iniDate'][$index2];
				$iniUser = $_POST['iniUser'][$index2];
				$userID = $_POST['userID'];
				$employ = $_POST['emp'];
				$prod = $_POST['prodItem'][$index2];
				$supp = $_POST['supplier'];
				$rem = $_POST['retRemarks'][$index2];
				$quant = $_POST['retQty'][$index2];
				
				$editProd = $_POST['editProdItem'][$index2];
				$editQuant = $_POST['editRetQty'][$index2];
				$editRem = $_POST['editRetRemarks'][$index2];
				$editQuant = $_POST['editRetQty'][$index2];
				
				$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$editProd'");
				$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
				$prod3 = $prod2['prodA'];	
				
				$suppID = current($conn->query("SELECT supID FROM suppliers WHERE supplier_name = '$supp'")->fetch());
				$employID = current($conn->query("SELECT empID FROM employee WHERE empFirstName = '$employ'")->fetch());
				
				if ($prod != $editProd || $quant != $editQuant || $rem != $editRem || $quant != $editQuant) {
					$sql = "INSERT INTO editreturn (returnEditDate, receiptNo, returnDate, returnQty, returnType, returnRemark, supID, prodID, userID, returnID, prodNew, qtyNew, userNew)
						VALUES (CURDATE(),'$retID','$iniDate',$editQuant,'Supplier Return','$rem',$suppID,'$prod3','$iniUser',$returnID,'$prod',$quant,'$userID')";
					$conn->exec($sql);
				} else {
					//Do Nothing
				}		
			}
		}
		?>
		
		<!-- Update -->
		<?php
			$retID= $_GET['retId'];	
			$prodTem=(isset($_REQUEST['prodItem']) ? $_REQUEST['prodItem'] : null);
			$prodTem2=(isset($_REQUEST['prodItem2']) ? $_REQUEST['prodItem2'] : null);
			if (isset($_POST["addRet"])){
				
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				for ($index = 0; $index < count($prodTem); $index++) {			
					$prod = $_POST['prodItem'][$index];
					$userID = $_POST['userID'];
					$employ = $_POST['emp'];
					$quant = $_POST['retQty'][$index];
					$rem = $_POST['retRemarks'][$index];
					$quant = $_POST['retQty'][$index];
					$supp = $_POST['supplier'];
					
					$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prod'");
					$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
					$prod3 = $prod2['prodA'];	
					
					$suppID = current($conn->query("SELECT supID FROM suppliers WHERE supplier_name = '$supp'")->fetch());
					$employID = current($conn->query("SELECT empID FROM employee WHERE empFirstName = '$employ'")->fetch());
					
					$sql = "UPDATE returns SET returnDate = CURDATE(), returnQty = $quant, returnRemark = '$rem', userID = '$userID', supID = $suppID, empID = $employID WHERE receiptNo = '$retID' AND prodID = '$prod3'";
					$conn->exec($sql);
				}
				$url="userViewRetSupplier.php?retId=$retID";
				echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
			}    
		?>

	</body>
</html>