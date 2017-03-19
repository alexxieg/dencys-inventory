<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Inventory</title>
		
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
		<?php require('dbcon.php'); ?>
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
	</head>
  
	<body>
		<?php
			$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
			$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 30;
			$start = ($page > 1) ? ($page * $perPage) - $perPage: 0;
			$sort = (isset($_GET['orderBy']) ? $_GET['orderBy'] : null);
			$searching = (isset($_REQUEST['search']) ? $_REQUEST['search'] : null);
			if (!empty($sort)) { 
				$query = $conn->prepare("SELECT SQL_CALC_FOUND_ROWS product.prodID, product.prodName, product.model, product.unitType, product.reorderLevel, SUM(incoming.inQty + inventory.initialQty) AS qty, sum(incoming.inQty) AS inQty, sum(outgoing.outQty) AS outQty, inventory.initialQty, product.reorderLevel
										FROM product LEFT JOIN inventory ON product.prodID = inventory.prodID LEFT JOIN incoming ON product.prodID = incoming.prodID LEFT JOIN outgoing ON product.prodID = outgoing.prodID
										GROUP BY prodID, initialQty, qty
										ORDER BY $sort LIMIT {$start}, {$perPage}");
			} else if (!empty($searching)) {
				$query = $conn->prepare("SELECT product.prodID, product.prodName, product.unitType, product.model, product.unitType, product.reorderLevel, SUM(incoming.inQty + inventory.initialQty) AS qty, sum(incoming.inQty) AS inQty, sum(outgoing.outQty) AS outQty, inventory.initialQty, product.reorderLevel
										FROM product LEFT JOIN inventory ON product.prodID = inventory.prodID LEFT JOIN incoming ON product.prodID = incoming.prodID LEFT JOIN outgoing ON product.prodID = outgoing.prodID
										WHERE prodName LIKE '%".$searching."%'
										GROUP BY prodID, initialQty, qty ");
			} else { 
				$query = $conn->prepare("SELECT SQL_CALC_FOUND_ROWS product.prodID, product.prodName,  product.model, product.unitType, product.reorderLevel, SUM(incoming.inQty + inventory.initialQty) AS qty, sum(incoming.inQty) AS inQty, sum(outgoing.outQty) AS outQty, inventory.initialQty, product.reorderLevel
										FROM product LEFT JOIN inventory ON product.prodID = inventory.prodID LEFT JOIN incoming ON product.prodID = incoming.prodID LEFT JOIN outgoing ON product.prodID = outgoing.prodID
										GROUP BY prodID, initialQty, qty LIMIT {$start}, {$perPage}");
			}	
			$query->execute();
			$result = $query->fetchAll();
			$total = $conn->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
			$pages = ceil($total / $perPage);
		?>	
		
		<?php foreach($query as $queri): ?>
		<div class="queri">
			<p><?php echo $queri['title']; ?></p>
		</div>
		<?php endforeach; ?>
		<div id="pagination">
			<?php for ($x = 1; $x <= $pages; $x++): ?>
			<a href="?page=<?php echo $x; ?>$per-page=<?php echo $perPage; ?>"<?php if($page === $x){echo ' id="selected"';}?>><?php echo $x; ?></a>
			<?php endfor; ?>
	    </div>
	
		<div id="contents">
			<div class="productHolder" >
				<nav class="navbar navbar-inverse navbar-fixed-top" >
					<center><img src="logo.png" alt="logo" id="logo"/></center>
					<div class="navName">
						<h1 class="compName">Dency's Hardware and<br>General Merchandise</h1>
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
								<li><a href="userInventory.php">Inventory</a></li>
								<li><a href="userIncoming.php">Incoming</a></li>
								<li><a href="userOutgoing.php">Outgoing</a></li>
								<li><a href="userReturns.php">Returns</a></li>
								<li><a href="userProduct.php">Products</a></li>
							</ul>
						</div>
					</div>
				</nav>
			</div>

		<div class="pages no-more-tables">
			<div id="tableHeader">
				<h1 id="headers">INVENTORY</h1>				
				<form action="?" method="post">
					<input type="text" class="form-control" placeholder="Search" id="searchBar" name="search">
				</form>
				<br>
				<br>
			</div>
				<div class="prodTable">
					<br>				
					<table class="table table-striped table-bordered">
						<tr>
							<th>
								Product ID
								<button type="button" class="btn btn-default" value="?orderBy=prodID DESC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
								</button>
								<button type="button" class="btn btn-default" value="?orderBy=prodID ASC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-up" aria-hidden="true" id="arrowBtn"></span>
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
								Beginning Quantity
							</th>
							
							<th>
								IN
							</th>
							
							<th>
								OUT
							</th>
							
							<th>
								Current Quantity
								
							</th>
							
							<th>
								Physical Count
							</th>
							
							<th>
								Reorder Level
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
							$currQty = $item["initialQty"] + $item["inQty"] - $item["outQty"];
							if ($currQty <= $item["reorderLevel"]){
						?> 
						
						<tr style='background-color: #ff9999' id="centerData">
							<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
							<td data-title="Description"><?php echo $item["prodName"]; ?></td>
							<td data-title="Model"><?php echo $item["model"]; ?> </td>
							<td data-title="Beg. Quantity"><?php echo $item["initialQty"]; ?></td>
							<td data-title="IN"><?php echo $item["inQty"]; ?></td>
							<td data-title="OUT"><?php echo $item["outQty"]; ?></td>
							<td data-title="Current Quantity"><?php echo $currQty; ?></td>
							<td data-title="Physical Count"></td>
							<td data-title="Reorder Level"><?php echo $item["reorderLevel"]?></td>
							<td data-title="Unit"><?php echo $item["unitType"];?></td>	
							<td data-title="Remarks"></td>
						</tr>
						<?php	
							}else if ($currQty > $item["reorderLevel"]){
						?>
						<tr id="centerData">
							<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
							<td data-title="Description"><?php echo $item["prodName"]; ?></td>
							<td data-title="Model"><?php echo $item["model"]; ?> </td>
							<td data-title="Beg. Quantity"><?php echo $item["initialQty"]; ?></td>
							<td data-title="IN"><?php echo $item["inQty"]; ?></td>
							<td data-title="OUT"><?php echo $item["outQty"]; ?></td>
							<td data-title="Current Quantity"><?php echo $currQty; ?></td>
							<td data-title="Physical Count"></td>
							<td data-title="Reorder Level"><?php echo $item["reorderLevel"]?></td>
							<td data-title="Unit"><?php echo $item["unitType"];?></td>
							<td data-title="Remarks"></td>
						</tr>
						<?php
						}	
						?>
						
						<?php
							endforeach;
						?>
					</table>
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
	</body>
</html>
