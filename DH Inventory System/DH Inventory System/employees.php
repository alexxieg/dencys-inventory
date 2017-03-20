<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Employees</title>
				
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">
		<link rel="stylesheet" type ="text/css" href="css/bootstrap.css">
		
		<script src="employees.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
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
	</head>
  
	<body>
		<?php
			$query = $conn->prepare("SELECT empID, empName FROM employee");
			$query->execute();
			$result = $query->fetchAll();
		?>

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
								<li><a href="inventory.php">Inventory</a></li>
								<li><a href="incoming.php">Incoming</a></li>
								<li><a href="outgoing.php">Outgoing</a></li>
								<li><a href="returns.php">Returns</a></li>
								<li><a href="admin.php">Admin</a></li>
							</ul>
						</div>
					</div>
				</nav>
		</div>	

		<div id="contents">
			<div class="pages">
				<div id="tableHeader">
					<table class="table table-striped table-bordered">		
						<h1 id="headers">EMPLOYEES</h1>
							<form action="" method="post">
								<input type="text" class="form-control" placeholder="Search" id="searchBar" name="search">
							</form>
						<button type="button" class="btn btn-info btn-lg btnclr" data-toggle="modal" data-target="#myModal" id="modbutt">Add New Employee</button>							
					</table>
				</div>
					
				<div class="prodTable">
					<table class="table table-bordered" id="tables">
						<tr>
							<th>Employee ID</th>
							<th>Name</th>
							<th></th>
						</tr>
							
						<?php
							foreach ($result as $item):
							$employID = $item["empID"];
						?>

						<tr>
							<td><?php echo $item["empID"]; ?></td>
							<td><?php echo $item["empName"]; ?></td>
							<td>
								<a href="editEmployees.php?emplId=<?php echo $employID; ?>" target="_blank">
								<button type="button" class="btn btn-default">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
								</button>
								</a>	
							
								<a href="deleteEmployee.php?emplId=<?php echo $employID; ?>"> 
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
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Add New Employee</h4>
								</div>
								<div class="modal-body">
									<form action="" method="POST" onsubmit="return validateForm()">									
										<h3>Name</h3>
										<input type="text" class="form-control" id ="addEmpl" placeholder="Name" name="empName"> <br>
										<br>
										
										<div class="modFoot">
										<span>
											<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="this.form.reset()" id="canBtn"> Cancel</button>
										</span>
										<span>
											<input type="submit" value="Submit" class="btn btn-success" name="addEmp" id="sucBtn">
										</span>
									</div>
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
					</ul>
				<ul class="nav navbar-nav navbar-right" id="logout">
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</nav>
		
		<?php include('addEmployee.php'); ?>
		
	</body>
</html>

