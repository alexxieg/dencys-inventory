<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Products</title>
	<?php include('dbcon.php'); ?>
		
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
				$query = $conn->prepare("SELECT product.prodID, product.prodName, product.model, brand.brandName, category.categoryName, product.price, product.unitType, product.reorderLevel
										FROM product INNER JOIN brand ON product.brandID = brand.brandID INNER JOIN category ON product.categoryID = category.categoryID
										ORDER BY $sort");
			} else if (!empty($searching)) {
				$query = $conn->prepare("SELECT product.prodID, product.prodName, product.model, brand.brandName, category.categoryName, product.price, product.unitType, product.reorderLevel
										FROM product INNER JOIN brand ON product.brandID = brand.brandID INNER JOIN category ON product.categoryID = category.categoryID
										WHERE prodName LIKE '%".$searching."%'");
			} else {
				$query = $conn->prepare("SELECT product.prodID, product.prodName, product.model, brand.brandName, category.categoryName, product.price, product.unitType, product.reorderLevel
										FROM product INNER JOIN brand ON product.brandID = brand.brandID INNER JOIN category ON product.categoryID = category.categoryID
										ORDER BY prodID");
			}
			$query->execute();
			$result = $query->fetchAll();
		?>
	
		<div class="productHolder" >
			<nav class="navbar navbar-inverse navbar-fixed-top" >
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
						<h1 id="headers">PRODUCTS</h1>
						<form action="?" method="post">
							<input type="text" class="form-control" placeholder="Search" id="searchBar" name="search">
						</form>
						<button id="modbutt" type="button" class="btn btn-info btn-lg btnclr" data-toggle="modal" data-target="#myModal">
							Add Product
						</button>
					</table>
				</div>

				<div class="prodTable">
					<table class="table table-striped table-bordered">
						<tr>
							<th>Product ID
								<button type="button" class="btn btn-default" value="?orderBy=prodID DESC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn" ></span>
								</button>
								<button type="button" class="btn btn-default" value="?orderBy=prodID ASC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-up" aria-hidden="true " id="arrowBtn"></span>
								</button>
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
								Brand
								<button type="button" class="btn btn-default" value="?orderBy=brand DESC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
								</button>
								<button type="button" class="btn btn-default" value="?orderBy=brand ASC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-up" aria-hidden="true" id="arrowBtn"></span>
								</button>
							</th>
							<th>
								Category
								<button type="button" class="btn btn-default" value="?orderBy=type DESC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
								</button>
								<button type="button" class="btn btn-default" value="?orderBy=type ASC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-up" aria-hidden="true" id="arrowBtn"></span>
								</button>
							</th>
							<th>
								Unit
							</th>
							<th>
								Product Price
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

						<tr>
							<td><?php echo $item["prodID"]; ?></td>
							<td><?php echo $item["prodName"]; ?></td>
							<td><?php echo $item["model"];?></td>
							<td><?php echo $item["brandName"]; ?></td>
							<td><?php echo $item["categoryName"]; ?></td>
							<td><?php echo $item["unitType"];?></td>
							<td><?php echo $item["price"]; ?></td>
							<td>
								<a href="editProd.php?proId=<?php echo $proID; ?>" target="_blank">	
									<button type="button" class="btn btn-default">
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</button>
								</a>	
								<a href="deletePro.php?proId=<?php echo $proID; ?>">
									<button type="button" class="btn btn-default">
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
									<h4 class="modal-title">Add New Product</h4>
								</div>
								<div class="modal-body">
									<form action="" method="POST">
										<h3>Product ID</h3>
										<input type="text" class="form-control" id ="addEntry" placeholder="Product ID" name="prodCode"> <br>
										
										<h3>Product Name</h3>
										<input type="text" class="form-control" id ="addEntry" placeholder="Name" name="prodItem"> <br>
										
										<h3>Model</h3>
										<input type="text" class="form-control" id="addEntry" placeholder="Model" name="prodModel"> <br>
											
										<h3>Quantity</h3>
										<input type="text" class="form-control" id ="addEntry" placeholder="Name" name="prodQty"> <br>
											
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
										<select class="form-control" id="addEntry" name="prodBrand">
											<option>Box/es</option>
											<option>Kilogram/s</option>
											<option>Piece/s</option>
											<option>Set/s</option>
											<option>Yard/</option>
										</select> 
											
										<h3>Price</h3>
										<input type="text" class="form-control" id ="addEntry" placeholder="Unit Price" name="prodPrice"> <br>
										
										<h3>Reorder Level</h3>
										<input type="text" class="form-control" id ="addEntry" placeholder="Reorder Level" name="prodRO"> <br>
											
										<br>
										<input type="submit" value="Add" class="btn btn-success btnclr" name="addProd" onclick="alert('New Product Successfully Added');">
										<input type="submit" value="Cancel" class="btn btn-default btnclr" style="width: 100px">
									</form> 
									<br>
								</div>
								<div class="modal-footer">
								  <button type="button" class="btn btn-default btnclr" data-dismiss="modal">Close</button>
								</div>
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
				</div>
			</div>
		</nav>
			
		<?php
			if (isset($_POST["addProd"])){
			
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 
				$prod = $_POST['prodCode'];
			 
				$sql = "INSERT INTO product (prodID, prodName, model, categoryID, brandID, price, reorderLevel, unitType)
				VALUES ('$prod','".$_POST['prodItem']."','".$_POST['prodModel']."','".$_POST['prodCateg']."','".$_POST['prodBrand']."','".$_POST['prodPrice']."','".$_POST['prodRO']."','".$_POST['prodUnit']."')";
				$conn->exec($sql);
				
				$sql1 = "INSERT INTO inventory (initialQty, qty, phyCount, prodID)
				VALUES (NULL,'".$_POST['prodQty']."',NULL,'$prod')";
				$conn->exec($sql1);	
			}    
		?>
	</body>
</html>

