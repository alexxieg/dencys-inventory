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
			if (!isset($_SESSION['id']) && $role!="user") {
				header('Location: index.php');
			}
			$session_id = $_SESSION['id'];
			$session_query = $conn->query("select * from users where userName = '$session_id'");
			$user_row = $session_query->fetch();
		?>
	</head>
		
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type ="text/css" href="css/bootstrap.css">
		<script src="js/bootstrap.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="shortcut icon" href="logo.jpg">
	</head>
  
	<body>
		<?php include('fetchReturns.php'); ?>
		

		<div class="productHolder">
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
								<li><a href="userInventory.php">Inventory</a></li>
								<li><a href="userIncoming.php">Incoming</a></li>
								<li><a href="userOutgoing.php">Outgoing</a></li>
								<li class="active"><a href="userReturns.php">Returns</a></li>
								<li><a href="userProduct.php">Products</a></li>
							</ul>
						</div>
					</div>
					
				</nav>

	<div id="contents">
		<div class="pages no-more-tables">
			<div id="tableHeader">
				<table class="table table-striped table-bordered">	
					<h1 id="headers">RETURNED PRODUCTS</h1>	
					
					<form action="?" method="post">
						<input type="text" class="form-control" placeholder="Search" id="searchBar" name="search">
					</form>
						
					<button type="button" class="btn btn-info btn-lg btnclr" data-toggle="modal" data-target="#myModal" id="modbutt">Add Product</button>
										
				</table>
			</div>
			
			<div class="prodTable">
				<br>
				<table class="table table-striped table-bordered">
					<tr>
						<th>
							<div id="tabHead">Date</div>
							<button type="button" class="btn btn-default" value="?orderBy=returnDate DESC" onclick="location = this.value;" id="sortBtn">
								<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
							</button>
							<button type="button" class="btn btn-default" value="?orderBy=returnDate ASC" onclick="location = this.value;" id="sortBtn">
								<span class="glyphicon glyphicon-chevron-up" aria-hidden="true" id="arrowBtn"></span>
							</button>							
						</th>
						<th>
							Product ID
						</th>
						<th>
							<div id="tabHead">Product Description</div>
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
						</th>
						<th>
							Unit
						</th>
						<th>
							Remarks
						</th>
					</tr>
					
					<?php
						foreach ($result as $item):
						$retID = $item["returnID"];
					?>
				
					<tr id="centerData">
						<td data-title="Date"><?php echo $item["returnDate"]; ?></td>
						<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
						<td data-title="Description"><?php echo $item["prodName"]; ?></td>
						<td data-title="Model"><?php echo $item["model"]; ?></td>
						<td data-title="Quantity"><?php echo $item["returnQty"]; ?></td>
						<td data-title="Unit"><?php echo $item["unitType"];?></td>
						<td data-title="Remarks"><?php echo $item["returnRemark"]; ?></td>
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
									<input type="number" min = "1" class="form-control" id ="addQty" placeholder="Item Quantity" name="retQty"> <br>
																			
									<h3>Remarks</h3>
									<textarea class="form-control" id="addEntry" rows="3" name="retRemarks"></textarea> <br>

									<br>
									<span>
										<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="this.form.reset()" style="float:right; margin-left:10px;"> Cancel</button>
									</span>
									<span>
										<input type="submit" value="Submit" class="btn btn-success" name="addRet" style="float:right;">
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
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right" id="logout">
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</nav>

		<?php include('addReturn.php'); ?>

	</body>
</html>