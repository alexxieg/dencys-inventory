<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script>
			function validateForm() {
				if(document.getElementById('addReceip').value == "") {
					alert('Please Enter Receipt Number');
					document.getElementById('addReceip').style.borderColor = "red";
					return false;
				}
				if (document.getElementById('addQnty').value == "") {
					alert('Please Enter Quantity');
					document.getElementById('addQnty').style.borderColor = "red";
					return false;
				}
				if(confirm('Are you sure you want to add this entry?')) {
					alert("Incoming Product Successfully Added");
					return true;
					
				}
				else {
					return false;		
				}
			}
		</script>
		<title>Incoming</title>
		
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
				$query = $conn->prepare("SELECT product.prodName, product.prodID, product.model, product.unitType,product.model, incoming.inID, incoming.inQty, incoming.inDate, employee.empName, incoming.receiptNo, incoming.receiptDate, incoming.inRemarks 
										FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID
										ORDER BY $sort");
			} else if (!empty($searching)) {
				$query = $conn->prepare("SELECT product.prodName, product.prodID, product.model, product.unitType, product.model, incoming.inID, incoming.inQty, incoming.inDate, employee.empName, incoming.receiptNo, incoming.receiptDate, incoming.inRemarks 
										FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID
										WHERE prodName LIKE '%".$searching."%'");
			} else {
				$query = $conn->prepare("SELECT product.prodName, product.prodID, product.model, product.unitType, product.model, incoming.inID, incoming.inQty, incoming.inDate, employee.empName, incoming.receiptNo, incoming.receiptDate, incoming.inRemarks 
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

		<div id="contents">
			<div class="pages">
				<div id="tableHeader">
					<table class="table table-striped table-bordered">
						
						<h1 id="headers">INCOMING PRODUCTS</h1>
						<form action="?" method="post">
							<input type="text" class="form-control" placeholder="Search" id="searchBar" name="search">
						</form>

						<button type="button" class="btn btn-info btn-lg btnclr" data-toggle="modal" data-target="#myModal" id="modbutt">Add Incoming Product</button>

					</table>
				</div>
				
				<table class="table table-striped table-bordered table-responsive">	
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
						<th></th>
					</tr>
							
					<?php
						foreach ($result as $item):
						$incID = $item["inID"];
					?>

					<tr>
						<td><?php echo $item["inDate"]; ?></td>	
						<td><?php echo $item["prodID"];?></td>
						<td><?php echo $item["prodName"]; ?></td>
						<td><?php echo $item["model"]; ?></td>
						<td><?php echo $item["inQty"]; ?></td>
						<td><?php echo $item["unitType"]; ?></td>
						<td><?php echo $item["empName"]; ?></td>
						<td><?php echo $item["receiptNo"]; ?></td>
						<td><?php echo $item["inRemarks"]; ?></td>
						<td>
							<a href="editIn.php?incId=<?php echo $incID; ?>" target="_blank"> 
							<button type="button" class="btn btn-default">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</button>
							</a>
							<a href="deleteInc.php?incId=<?php echo $incID; ?>"> 
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
						<div class="modal-content table-responsive">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Add Incoming Product</h4>
							</div>
							<div class="modal-body">
								<form action="" method="POST" onsubmit="return validateForm()">
								  Receipt No. 
								  <input type="text" class="form-control" id ="addRcpt" placeholder="Receipt Number" name="rcno"><br>
							  <table class="table table-striped" id="tblGrid">
								<thead id="tblHead">
								  <tr>
								  	<th class="hide-on-mobile">#</th>
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
									<input type="number" min="1" class="form-control" id ="addQty" placeholder="Item Quantity" name="incQty"> <br>
									
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
									<input type="submit" value="Add" class="btn btn-default btnclr" name="addInc">
									<input type="submit" value="Cancel" class="btn btn-default btnclr" style="width: 100px" data-dismiss="modal" onclick="this.form.reset()">
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
					<li><a href="logout.php">Logout</a></li>
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
				
				$emp1 = $conn->query("SELECT empID AS empA FROM employee WHERE empName = '$emp'");
				$emp2 = $emp1->fetch(PDO::FETCH_ASSOC);
				$emp3 = $emp2['empA'];
						
				$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prod'");
				$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
				$prod3 = $prod2['prodA'];
				
				$sql = "INSERT INTO incoming (inQty, inDate, receiptNo, inRemarks, empID, prodID)
				VALUES ('".$_POST['incQty']."',CURDATE(),'".$_POST['inRecN']."','".$_POST['inRemarks']."','$emp3','$prod3')";
				$conn->exec($sql);
				echo "<meta http-equiv='refresh' content='0'>";
				
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