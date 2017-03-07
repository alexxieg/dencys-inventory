<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Products</title>
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
				$query = $conn->prepare("SELECT prodID, prodName, brand, type, price, reorderLevel 
				FROM product
				ORDER BY $sort");
			} else if (!empty($searching)) {
				$query = $conn->prepare("SELECT prodID, prodName, brand, type, price, reorderLevel 
				FROM product
				WHERE prodName LIKE '%".$searching."%'");
			} else {
				$query = $conn->prepare("SELECT prodID, prodName, brand, type, price, reorderLevel 
				FROM product
				ORDER BY prodID");
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
							<li><a href="userinventory.php">Inventory</a></li>
							<li><a href="userincoming.php">Incoming</a></li>
							<li><a href="useroutgoing.php">Outgoing</a></li>
							<li><a href="userreturns.php">Returns</a></li>
							<li><a href="userproduct.php">Product</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>	
		<div class="pages">
	<div id="tableHeader">
	<table class="table table-striped table-bordered">	
		
			<h1 id="headers">PRODUCTS</h1>
		
			<form action="?" method="post">
				<input type="text" class="form-control" placeholder="Search" id="searchBar" name="search">
				<button type="submit" name="submit">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			</form>	
		
	</table>
	</div>

			<div class="prodTable">
				<br>
				<table class="table table-striped table-bordered">
					<tr>
						<th>Product ID</th>
						
						<th>
							Product Description
							<button type="button" class="btn btn-default" value="?orderBy=prodID DESC" onclick="location = this.value;">
								<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
							</button>
							<button type="button" class="btn btn-default" value="?orderBy=prodID ASC" onclick="location = this.value;">
								<span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
							</button>							
						</th>
						<th>
							Model
						</th>
						<th>
							Brand
							<button type="button" class="btn btn-default" value="?orderBy=prodName DESC" onclick="location = this.value;">
								<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
							</button>
							<button type="button" class="btn btn-default" value="?orderBy=prodName ASC" onclick="location = this.value;">
								<span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
							</button>
						</th>
						<th>
							Type
							<button type="button" class="btn btn-default" value="?orderBy=brand DESC" onclick="location = this.value;">
								<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
							</button>
							<button type="button" class="btn btn-default" value="?orderBy=brand ASC" onclick="location = this.value;">
								<span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
							</button>
						</th>
						<th>
							Product Price
							<button type="button" class="btn btn-default" value="?orderBy=type DESC" onclick="location = this.value;">
								<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
							</button>
							<button type="button" class="btn btn-default" value="?orderBy=type ASC" onclick="location = this.value;">
								<span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
							</button>
						</th>
						<th>
							Reorder Level
							<button type="button" class="btn btn-default" value="?orderBy=price DESC" onclick="location = this.value;">
								<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
							</button>
							<button type="button" class="btn btn-default" value="?orderBy=price ASC" onclick="location = this.value;">
								<span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
							</button>
						</th>
				
						</tr>
						
						<?php
							foreach ($result as $item):
							$proID = $item["prodID"];
						?>

						<tr>
							<td><?php echo $item["prodID"]; ?></td>
							<td><?php echo $item["prodName"]; ?></td>
							<td></td>
							<td><?php echo $item["brand"]; ?></td>
							<td><?php echo $item["type"]; ?></td>
							<td><?php echo $item["price"]; ?></td>
							<td><?php echo $item["reorderLevel"]; ?></td>								
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
          <h4 class="modal-title">Add Product</h4>
        </div>
        <div class="modal-body">
		
   <form action="" method="POST">
					<h3>Product ID</h3>
					<input type="text" class="form-control" id ="addEntry" placeholder="Name" name="prodCode"> <br>
					
					<h3>Product Name</h3>
					<input type="text" class="form-control" id ="addEntry" placeholder="Name" name="prodItem"> <br>
					
					<h3>Quantity</h3>
					<input type="text" class="form-control" id ="addEntry" placeholder="Name" name="prodQty"> <br>
						
					<h3>Product Type</h3>
					<input type="text" class="form-control" id ="addEntry" placeholder="Item Type" name="prodType"> <br>
				
					<h3>Brand</h3>
					<input type="text" class="form-control" id ="addEntry" placeholder="Brand" name="prodBrand"> <br>
					
					<h3>Price</h3>
					<input type="text" class="form-control" id ="addEntry" placeholder="Unit Price" name="prodPrice"> <br>
					
					<h3>Reorder Level</h3>
					<input type="text" class="form-control" id ="addEntry" placeholder="Unit Price" name="prodRO"> <br>
						
					<br>
				<input type="submit" value="Add" class="btn btn-success" name="addProd" onclick="alert('New Product Successfully Added');">
				<input type="submit" value="Cancel" class="btn btn-default" style="width: 100px">
				</form> 
				
					<br>
			
			</form> 
			
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
  </body>
</html>
