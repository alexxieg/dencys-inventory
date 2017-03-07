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
		<?php require('dbcon.php'); ?>
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		
	</head>
    <style>
#pagination {
	float: left;
	font-size: 50px;
	text-indent: 5px;
	border: 1px solid #1B88E4;
	background-color: #4C97AF;
    left: 1250px;
    top: 1380px;
	position: absolute;
	display: inline-block;
    padding-left: 0; 
	

}

#pagination a {
    float: left;
	text-align: center;
	color: white;
	border: 3px solid white;

}

#pagination a#selected {
	font-weight: 500;
	background-color: black;

	
}

</style>		
  
	<body>
		<?php
		$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
		$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 30;
	    $start = ($page > 1) ? ($page * $perPage) - $perPage: 0;
			$sort = (isset($_GET['orderBy']) ? $_GET['orderBy'] : null);
			$searching = (isset($_REQUEST['search']) ? $_REQUEST['search'] : null);
			if (!empty($sort)) { 
				$query = $conn->prepare("SELECT SQL_CALC_FOUND_ROWS product.prodID, product.prodName, sum(incoming.inQty) AS inQty, sum(outgoing.outQty) AS outQty, inventory.qty, product.price 
										FROM product LEFT JOIN inventory ON product.prodID = inventory.prodID LEFT JOIN incoming ON product.prodID = incoming.prodID LEFT JOIN outgoing ON product.prodID = outgoing.prodID
										GROUP BY prodID, qty
										ORDER BY $sort LIMIT {$start}, {$perPage}");
			} else { 
				$query = $conn->prepare("SELECT SQL_CALC_FOUND_ROWS product.prodID, product.prodName, sum(incoming.inQty) AS inQty, sum(outgoing.outQty) AS outQty, inventory.qty, product.price 
										FROM product LEFT JOIN inventory ON product.prodID = inventory.prodID LEFT JOIN incoming ON product.prodID = incoming.prodID LEFT JOIN outgoing ON product.prodID = outgoing.prodID
										GROUP BY prodID, qty LIMIT {$start}, {$perPage}");
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
	</div>

		<div class="pages">
			
			<h1 id="headers">INVENTORY</h1>
					
			<form action="?" method="post">
				<input type="text" class="form-control" placeholder="Search" id="searchBar" name="search">
				<span class="input-group-btn">
					<button class="btn btn-default" type="submit" name="submit" id="searchIcon">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</form>
			<br>
			<br>
			
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
						Initial Quantity
						</th>
						
						<th>
							IN
						</th>
						
						<th>
							OUT
						</th>
						
						<th>
							Current Quantity
							<button type="button" class="btn btn-default" value="?orderBy=qty DESC" onclick="location = this.value;" id="sortBtn">
								<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
							</button>
							<button type="button" class="btn btn-default" value="?orderBy=qty ASC" onclick="location = this.value;" id="sortBtn">
								<span class="glyphicon glyphicon-chevron-up" aria-hidden="true" id="arrowBtn"></span>
							</button>
						</th>
						
						<th>
							Physical Count
						</th>
						
						<th>
							Unit
						</th>
						
						<th>
							Item Price
							<button type="button" class="btn btn-default" value="?orderBy=price DESC" onclick="location = this.value;" id="sortBtn">
								<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
							</button>
							<button type="button" class="btn btn-default" value="?orderBy=price ASC" onclick="location = this.value;" id="sortBtn">
								<span class="glyphicon glyphicon-chevron-up" aria-hidden="true" id="arrowBtn"></span>
							</button>
						</th>
					</tr>
					
					<?php
						foreach ($result as $item):
					?>

					<tr>
						<td><?php echo $item["prodID"]; ?></td>
						<td><?php echo $item["prodName"]; ?></td>
						<td></td>
						<td><?php echo $item["inQty"]; ?></td>
						<td><?php echo $item["outQty"]; ?></td>
						<td><?php echo $item["qty"]; ?></td>
						<td></td>
						<td><?php echo $item["unitType"];?></td>
						<td><?php echo $item["price"]; ?></td>							
					</tr>
					
					<?php
						endforeach;
					?>
				</table>
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
	</body>
</html>
