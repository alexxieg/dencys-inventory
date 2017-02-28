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
		if (isset($_SESSION['id'])){
				header('Location: inventory.php');
				$session_id = $_SESSION['id'];
				$session_query = $conn->query("select * from users where userName = '$session_id'");
				$user_row = $session_query->fetch();
				if (!isset($_SESSION['id']) || $_SESSION['id'] == false) {
				session_destroy();
				header('Location: index.php');
			}
		}
	?>
		
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="logo.jpg">
    <link rel="stylesheet" type ="text/css" href="css/bootstrap.css">
	<script src="js/bootstrap.js"></script>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
	<body>
		<?php
			$query = $conn->prepare("SELECT userName, password FROM users");
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

		<div class="pages">
			<h1 id="headers">View Accounts</h1>
					
			<input type="text" class="form-control" placeholder="Search" id="searchBar" name="search">
			
			<br>
				
			<div class="prodTable">
				<br>
				<table class="table table-bordered" id="tables">
					<tr>
						<th>Username</th>
						<th>Password</th>
	
						<th></th>
					</tr>
						
						<?php
							foreach ($result as $item):
						?>

						<tr>
							<td><?php echo $item["userName"]; ?></td>
							<td><?php echo $item["password"]; ?></td>
					
							<td>
								<button type="button" class="btn btn-default">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
								</button>
						
								<button type="button" class="btn btn-default">
									<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
								</button>
							</td>		
									
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
			</div>
			</div>
		</nav>
  </body>
</html>

