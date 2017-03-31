<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Accounts</title>

		<!-- CSS Files -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">
		<link rel="stylesheet" type ="text/css" href="../css/bootstrap.css">
		
		<!-- Javascript Files -->
		<script src="../accounts.js"></script>
		<script src="../js/bootstrap.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="../alertboxes/sweetalert2.min.js"></script>
		<link rel="stylesheet" href="../alertboxes/sweetalert2.min.css">
		
		<script src="../datatables/media/js/jquery.dataTables.min.js"></script>
		<link href="../datatables/media/css/jquery.dataTables.min.css" rel="stylesheet">
		<script src="maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>
		<script src="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css"></script>
		
		<!-- Datatables -->
		<script>
			$(document).ready(function(){
				$('#myTable').dataTable();
			});
		</script>
		
		<!-- Database Connection -->
		<?php include('dbcon.php'); ?>	
		
		<!-- Login Session -->
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
		<nav class="navbar navbar-inverse navbar-fixed-top" >
			<!-- Header -->
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-collapse" id="togBtn">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<img src="../logohead.png" id="logohead"/>

					<div class="dropdown">
						<button class="dropbtn"><i class="glyphicon glyphicon-user"></i> Admin</button>
						<div class="dropdown-content">
							<a href="logout.php">
								<i class="glyphicon glyphicon-log-out"></i> 
								Logout
							</a>
							<a href="#">
								<button class="btn btn-success btn-md" onclick="myFunction()" id="printBtn">
									<i class="glyphicon glyphicon-print"></i> 
									Print
								</button>
							</a>
						</div>
					</div>	
				</div>
				<form action="?" method="post">
						<input type="text" class="form-control" placeholder="Search" id="searchBar" name="search">
				</form>
			</div><!-- /container -->
		</nav>

		<!-- Side bar -->
		<div class="row row-offcanvas row-offcanvas-left">
			<div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">
				<div class="collapse navbar-collapse">
					<ul class="nav nav-pills nav-stacked affix">
					<li><a href="../inventory.php"><i class="glyphicon glyphicon-list-alt"></i> Inventory</a></li>
					<li><a href="../incoming.php"><i class="glyphicon glyphicon-import"></i> Incoming</a></li>
					<li><a href="../outgoing.php"><i class="glyphicon glyphicon-export"></i> Outgoing</a></li>
					<li><a href="../returns.php"><i class="glyphicon glyphicon-sort"></i> Returns</a></li>
					<li><a href="../reports.php"><i class=""></i>Reports</a></li>

					<li class="nav-header">  	
						<a href="#" data-toggle="collapse" data-target="#menu2">
							<i class="glyphicon glyphicon-pencil"></i> Manage <i class="glyphicon glyphicon-chevron-right"></i>
						</a>
						<ul class="list-unstyled collapse" id="menu2">
							<li><a href="../accounts.php"><i class="glyphicon glyphicon-lock"></i> Accounts</a>
							</li>
							<li><a href="../employees.php"><i class="glyphicon glyphicon-user"></i> Employees</a>
							</li>
							<li><a href="../product.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a>
							</li>
							<li><a href="../brands.php"><i class="glyphicon glyphicon-sort-by-attributes"></i> Product Brands</a>
							</li>
							<li><a href="../category.php"><i class="glyphicon glyphicon-book"></i> Product Categories</a>
							</li>
							<li><a href="../branches.php"><i class="glyphicon glyphicon-random"></i> Branches</a>
							</li>                              
						</ul>
					</ul>
				 </div><!--/span-->	
		   </div><!-- end of side  bar -->
		 </div><!-- /Header -->
		 
		<div id="contents">
			<div class="pages no-more-tables">
				<h1 id="headers">Edit Account</h1>
				<div>
					<form action="" method="POST">
						<h3>Username</h3>
						<input type="text" class="form-control" id ="addEntry" placeholder="Name" name="userName"> <br>
						
						<h3>Password</h3>
						<input type="password" class="form-control" id ="addEntry" placeholder="User Password" name="psw"> <br>
						
						<div class="form-group">
							 <h3>User Role</h3>
							  <select class="form-control" id="addEntry" name="user_role">
								<option>admin</option>
								<option>user</option>
							  </select>
						</div>
						
						<br>
					<input type="submit" value="Update" class="btn btn-success" name="addAccnt" onclick="alert('New Account Successfully Added');">
					<input type="submit" value="Cancel" class="btn btn-default" style="width: 100px">
					</form> 
				</div>
			</div>
		</div>
	   
		<?php
			$useThisID= $_GET['useID'];
			$useName=(isset($_REQUEST['userName']) ? $_REQUEST['userName'] : null);
			$passW=(isset($_REQUEST['psw']) ? $_REQUEST['psw'] : null);
			$urole=(isset($_REQUEST['user_role']) ? $_REQUEST['user_role'] : null);
		if (isset($_POST["addAccnt"])){
		
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		 
			$sql = "UPDATE users SET userName = '$useName', password = '$passW' WHERE userID = '$useThisID'";
		
			$conn->exec($sql);
		}    

		?>
  </body>
</html>