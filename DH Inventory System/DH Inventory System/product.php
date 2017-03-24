<!DOCTYPE html>

<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<title>Products</title>
			
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">
		<link rel="stylesheet" type ="text/css" href="css/bootstrap.css">
		
		<script src="product.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<?php include('dbcon.php'); ?>
			
		<?php 
			session_start();
			$role = $_SESSION['sess_role'];
			if (!isset($_SESSION['id']) || $role!="admin") {
				header('Location: index.php');
			}
			$session_id = $_SESSION['id'];
			$session_query = $conn->query("select * from users where userName = '$session_id'");
			$user_row = $session_query->fetch();
		?>
	</head>
 
	<body>
		<?php include('fetchProduct.php'); ?>
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
						<h1 id="headers">PRODUCTS</h1>
						<form action="?" method="post">
							<input type="text" class="form-control" placeholder="Search" id="searchBar" name="search">
						</form>
						<button id="modbutt" type="button" class="btn btn-info btn-lg btnclr" data-toggle="modal" data-target="#myModal">
							Add Product
						</button>
					</table>
				</div>

				<table class="table table-striped table-bordered">
					<tr>
						<th>
							<div id="tabHead">Product ID</div>
							<button type="button" class="btn btn-default" value="?orderBy=prodID DESC" onclick="location = this.value;" id="sortBtn">
								<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn" ></span>
							</button>
							<button type="button" class="btn btn-default" value="?orderBy=prodID ASC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-up" aria-hidden="true " id="arrowBtn"></span>
							</button>
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
							<div id="tabHead">Brand</div>
							<button type="button" class="btn btn-default" value="?orderBy=brandName DESC" onclick="location = this.value;" id="sortBtn">
								<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
							</button>
							<button type="button" class="btn btn-default" value="?orderBy=brandName ASC" onclick="location = this.value;" id="sortBtn">
								<span class="glyphicon glyphicon-chevron-up" aria-hidden="true" id="arrowBtn"></span>
							</button>
						</th>
						<th>
							<div id="tabHead">Category</div>
							<button type="button" class="btn btn-default" value="?orderBy=categoryName DESC" onclick="location = this.value;" id="sortBtn">
								<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
							</button>
							<button type="button" class="btn btn-default" value="?orderBy=categoryName ASC" onclick="location = this.value;" id="sortBtn">
								<span class="glyphicon glyphicon-chevron-up" aria-hidden="true" id="arrowBtn"></span>
							</button>
						</th>
						<th>
							Unit
						</th>
						<th>
							<div id="tabHead">Price</div>
							<button type="button" class="btn btn-default" value="?orderBy=price DESC" onclick="location = this.value;" id="sortBtn">
								<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
							</button>
							<button type="button" class="btn btn-default" value="?orderBy=price ASC" onclick="location = this.value;" id="sortBtn">
								<span class="glyphicon glyphicon-chevron-up" aria-hidden="true" id="arrowBtn"></span>
							</button>
						</th>					
						<th></th>
					</tr>
						
					<?php
						foreach ($result as $item):
						$proID = $item["prodID"];
					?>
					
					<tr id="centerData">
						<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
						<td data-title="Description"><?php echo $item["prodName"]; ?></td>
						<td data-title="Model"><?php echo $item["model"];?></td>
						<td data-title="Brand"><?php echo $item["brandName"]; ?></td>
						<td data-title="Category"><?php echo $item["categoryName"]; ?></td>
						<td data-title="Unit"><?php echo $item["unitType"];?></td>
						<td data-title="Price"><?php echo $item["price"]; ?></td>
						<td>
							<a href="editProd.php?proId=<?php echo $proID; ?>" target="_blank">	
								<button type="button" class="btn btn-default" id="edBtn1">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
								</button>
							</a>	
							<a href="deletePro.php?proId=<?php echo $proID; ?>">
								<button type="button" class="btn btn-default" onclick="return confirm('Are you sure you want to delete this entry?');" id="delBtn1">
									<span class="glyphicon glyphicon-book" aria-hidden="true"></span>
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
									<h4 class="modal-title">Add New Product</h4>
								</div>
								<div class="modal-body">
									<form action="" method="POST" onsubmit="return validateForm()">
										<h3>Product Name</h3>
										<input type="text" class="form-control" id ="addQty" placeholder="Name" name="prodItem"> <br>
										
										<h3>Model</h3>
										<input type="text" class="form-control" id="addQty" placeholder="Model" name="prodModel"> <br>
											
										<h3>Quantity</h3>
										<input type="number" min = "1" class="form-control" id ="addQty" placeholder="Item Quantity" name="prodQty"> <br>
											
										<h3>Category</h3>
										<?php
											$query = $conn->prepare("SELECT categoryName FROM category ");
											$query->execute();
											$res = $query->fetchAll();
										?>
												
										<select class="form-control" id="addEntry" name="prodCateg">
											<?php foreach ($res as $row): ?>
												<option><?=$row["categoryName"]?></option>
											<?php endforeach ?>
										</select> 
										<br>
										
										<h3>Brand</h3>
										<?php
											$query = $conn->prepare("SELECT brandName FROM brand ");
											$query->execute();
											$res = $query->fetchAll();
										?>
											
										<select class="form-control" id="addEntry" name="prodBrand">
											<?php foreach ($res as $row): ?>
												<option><?=$row["brandName"]?></option>
											<?php endforeach ?>
										</select> 
										<br>
												
										<h3>Unit</h3>
										<select class="form-control" id="addEntry" name="prodUnit">
											<option>Box/es</option>
											<option>Kilogram/s</option>
											<option>Piece/s</option>
											<option>Set/s</option>
											<option>Yard/</option>
										</select> 
											
										<h3>Price</h3>
										<input type="number" class="form-control" id ="addQty" placeholder="Unit Price" name="prodPrice"> <br>
										
										<h3>Reorder Level</h3>
										<input type="number" class="form-control" id ="addQty" placeholder="Reorder Level" name="prodRO"> <br>
											
										<br>
										
										<div class="modFoot">
										<span>
											<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="this.form.reset()" id="canBtn"> Cancel</button>
										</span>
										<span>
											<input type="submit" value="Submit" class="btn btn-success" name="addProd" id="sucBtn">
										</span>
									</div>
											
										</form>

									<div class="modal-footer">
									</div>
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
		
		<?php include('addProduct.php'); ?>
	</body>
</html>

