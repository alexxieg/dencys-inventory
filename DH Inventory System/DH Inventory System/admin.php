<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">
		<link rel="stylesheet" media="screen" type ="text/css" href="css/bootstrap.css">
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	  
	<body>
		<br><nav class="navbar navbar-inverse navbar-fixed-top" >
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<h1 id="mainHeader">Dency's Hardware and General Merchandise</h1>
				</div>
				<divclass="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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
		
		<div id="adminContent">
			
			<div>
				<div id="manageAcc">
					<div class="manageHeader">
						<h3 id="is">Manage</h3>
					</div>
				</div>
				<div class="jumbotron" id="adminView">
					<div class="container" id="adminBtn">							  
						<div class="form-group">
							<form action="accounts.php">
								<button type="submit" class="btn btn-default" id="myBtn">Accounts</button>
							</form><br>
							<form action="product.php">
								<button type="submit" class="btn btn-default" id="myBtn">Products</button>
							</form></br>
							<form action="brands.php">
								<button type="submit" class="btn btn-default" id="myBtn">Product Brands</button>
							</form></br>
							<form action="category.php">
								<button type="submit" class="btn btn-default" id="myBtn">Product Categories</button>
							</form><br>
							<form action="employees.php">
								<button type="submit" class="btn btn-default" id="myBtn">Employees</button>
							</form>
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
	</body>
</html>