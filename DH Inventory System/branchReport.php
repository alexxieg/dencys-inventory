<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Branch Reports</title>
		<?php include('dbcon.php'); ?>
				
		<?php 
			session_start();
			if (isset($_SESSION['id'])){
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
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	</head>
	  
	<body>
		<?php 
			/* For Camdas Query */
			$query = $conn->prepare("SELECT prodName, outQty, model, location FROM outgoing JOIN product ON outgoing.prodID = product.prodID JOIN branch ON branch.branchID = outgoing.branchID WHERE location='Camdas';");
			$query->execute();
			$result = $query->fetchAll();
			
			/* For Hilltop Query */
			$query2 = $conn->prepare("SELECT prodName, outQty, model, location FROM outgoing JOIN product ON outgoing.prodID = product.prodID JOIN branch ON branch.branchID = outgoing.branchID WHERE location='Hilltop';");
			$query2->execute();
			$result2 = $query2->fetchAll();
			
			/* For KM 4 Query */
			$query3 = $conn->prepare("SELECT prodName, outQty, model, location FROM outgoing JOIN product ON outgoing.prodID = product.prodID JOIN branch ON branch.branchID = outgoing.branchID WHERE location='KM 4';");
			$query3->execute();
			$result3 = $query3->fetchAll();
			
			/* For KM 5 Query */
			$query4 = $conn->prepare("SELECT prodName, outQty, model, location FROM outgoing JOIN product ON outgoing.prodID = product.prodID JOIN branch ON branch.branchID = outgoing.branchID WHERE location='KM 5';");
			$query4->execute();
			$result4 = $query4->fetchAll();
			
			/* For San Fernando Query */
			$query5 = $conn->prepare("SELECT prodName, outQty, model, location FROM outgoing JOIN product ON outgoing.prodID = product.prodID JOIN branch ON branch.branchID = outgoing.branchID WHERE location='San Fernando';");
			$query5->execute();
			$result5 = $query5->fetchAll();
			
			/* For Branch Overall Query */
			$query6 = $conn->prepare("SELECT SUM(outQty) AS 'TOTAL_QUANTITY', location 
										FROM outgoing JOIN branch ON outgoing.branchID = branch.branchID 
										GROUP BY location ORDER BY TOTAL_QUANTITY DESC;");
			$query6->execute();
			$result6 = $query6->fetchAll();
		?>
		<!-- Page Header and Navigation Bar -->
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

		      <img src="logohead.png" id="logohead"/>

				<div class="dropdown">
				  <button class="dropbtn"><i class="glyphicon glyphicon-user"></i> Admin</button>
				  <div class="dropdown-content">
					<a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a>
					<a href="#"><button class="btn btn-success btn-md" onclick="myFunction()" id="printBtn">
					<i class="glyphicon glyphicon-print"></i> Print</button></a>
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
		        <li><a href="inventory.php"><i class="glyphicon glyphicon-list-alt"></i> Inventory</a></li>
		        <li><a href="incoming.php"><i class="glyphicon glyphicon-import"></i> Incoming</a></li>
		        <li><a href="outgoing.php"><i class="glyphicon glyphicon-export"></i> Outgoing</a></li>
		        <li><a href="returns.php"><i class="glyphicon glyphicon-sort"></i> Returns</a></li>
				<li><a href="reports.php"><i class="glyphicon glyphicon-sort"></i> Reports</a></li>
		   	
		        <li class="nav-header">  	
		        	<a href="#" data-toggle="collapse" data-target="#menu2">
		          		<i class="glyphicon glyphicon-pencil"></i> Manage <i class="glyphicon glyphicon-chevron-right"></i>
		          	</a>
		            <ul class="list-unstyled collapse" id="menu2">
		                <li><a href="accounts.php"><i class="glyphicon glyphicon-lock"></i> Accounts</a>
		                </li>
		                <li><a href="employees.php"><i class="glyphicon glyphicon-user"></i> Employees</a>
		                </li>
		                <li><a href="product.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a>
		                </li>
		                <li><a href="brands.php"><i class="glyphicon glyphicon-sort-by-attributes"></i> Product Brands</a>
		                </li>
		                <li><a href="category.php"><i class="glyphicon glyphicon-book"></i> Product Categories</a>
		                </li>
		                <li><a href="branches.php"><i class="glyphicon glyphicon-random"></i> Branches</a>
		                </li>                              
		            </ul>
		    	</ul>
		 	 </div><!--/span-->	
		   </div>
		<!-- end of side  bar -->
		 </nav><!-- /Header -->
	
		<div id="contents">
			<div class="pages no-more-tables">
				<div id="tableHeader">
					
		<div id="exTab1" class="container">	
		<ul class="nav nav-pills">
			<li><a href="#10a" data-toggle="tab"style="color:white;">Outgoing</a>
			</li>
			</li>
			<li role="presentation" class="dropdown">
          </a>
            <li>
              <a href="#5a" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1" style="color:white;">
                <span>Camdas</span>
              </a>
            </li>
            <li>
              <a href="#6a" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2"style="color:white;">
                <span>Hilltop</span>
              </a>
            </li>
			<li>
              <a href="#7a" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1"style="color:white;">
                <span>KM 4</span>
              </a>
            </li>
			<li>
              <a href="#8a" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1"style="color:white;">
                <span>KM 5</span>
              </a>
            </li>
			<li>
              <a href="#9a" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1"style="color:white;">
                <span>San Fernando</span>
              </a>
            </li>
        </li>
		</ul>

			<div class="tab-content clearfix">
		<div class="tab-pane active" id="1a">
          <h3>Content's background color is the same for the tab</h3>
		</div>
		
		<div class="tab-pane" id="2a">
          <h3>We use the class nav-pills instead of nav-tabs which automatically creates a background color for the tab</h3>
		</div>
		
        <div class="tab-pane" id="3a">
          <h3>We applied clearfix to the tab-content to rid of the gap between the tab and the content</h3>
		</div>
		
        <div class="tab-pane" id="4a">
          <h3>We use css to change the background color of the content to be equal to the tab</h3>
		</div>
		
		
		<!-- For Camdas Query -->
		<div class="tab-pane" id="5a">
          <table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
					<thead>
						<tr>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">prodName</th>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">outQty</th>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">model</th>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">location</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($result as $item):
						?>

						<tr>
							<td><?php echo $item["prodName"]; ?></td>
							<td><?php echo $item["outQty"]; ?></td>
							<td><?php echo $item["model"]; ?></td>
							<td><?php echo $item["location"]; ?></td>
						</tr>
						
						<?php
							endforeach;
						?>
					</tbody>
				</table>
		</div>
		<!-- For Hilltop Query -->
		 <div class="tab-pane" id="6a">
			<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
					<thead>
						<tr>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">prodName</th>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">outQty</th>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">model</th>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">location</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($result2 as $item2):
						?>

						<tr>
							<td><?php echo $item2["prodName"]; ?></td>
							<td><?php echo $item2["outQty"]; ?></td>
							<td><?php echo $item2["model"]; ?></td>
							<td><?php echo $item2["location"]; ?></td>
						</tr>
						
						<?php
							endforeach;
						?>
					</tbody>
				</table>
		 </div>
		 
		 <!-- For KM 4 Query -->
		<div class="tab-pane" id="7a">
          <table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
					<thead>
						<tr>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">prodName</th>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">outQty</th>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">model</th>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">location</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($result3 as $item3):
						?>

						<tr>
							<td><?php echo $item3["prodName"]; ?></td>
							<td><?php echo $item3["outQty"]; ?></td>
							<td><?php echo $item3["model"]; ?></td>
							<td><?php echo $item3["location"]; ?></td>
						</tr>
						
						<?php
							endforeach;
						?>
					</tbody>
				</table>
		</div>
		
		<!-- For KM 5 Query -->
		<div class="tab-pane" id="8a">
          <table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
					<thead>
						<tr>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">prodName</th>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">outQty</th>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">model</th>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">location</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($result4 as $item4):
						?>

						<tr>
							<td><?php echo $item4["prodName"]; ?></td>
							<td><?php echo $item4["outQty"]; ?></td>
							<td><?php echo $item4["model"]; ?></td>
							<td><?php echo $item4["location"]; ?></td>
						</tr>
						
						<?php
							endforeach;
						?>
					</tbody>
				</table>
		</div>
		
		<!-- For San Fernando Query -->
		<div class="tab-pane" id="9a">
          <table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
					<thead>
						<tr>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">prodName</th>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">outQty</th>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">model</th>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">location</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($result5 as $item5):
						?>

						<tr>
							<td><?php echo $item5["prodName"]; ?></td>
							<td><?php echo $item5["outQty"]; ?></td>
							<td><?php echo $item5["model"]; ?></td>
							<td><?php echo $item5["location"]; ?></td>
						</tr>
						
						<?php
							endforeach;
						?>
					</tbody>
				</table>
		</div>
		
		<!-- For Outgoing Query -->
		<div class="tab-pane" id="10a">
          <table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
					<thead>
						<tr>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Total Quantity</th>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Location</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($result6 as $item6):
						?>

						<tr>
							<td><?php echo $item6["TOTAL_QUANTITY"]; ?></td>
							<td><?php echo $item6["location"]; ?></td>
						</tr>
						
						<?php
							endforeach;
						?>
					</tbody>
				</table>
		</div>
		
			</div>
  </div>

<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
				</div>
			</div>
		</div>
					
		
	</body>
</html>
