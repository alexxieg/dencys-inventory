<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<link rel="shortcut icon" href="logo.jpg">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>

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

<div class="container">
  <h2>Dynamic Pills</h2>
    <li class="active"><a data-toggle="pill" href="#home">Home</a></li>
    <li><a data-toggle="pill" href="#menu1">Menu 1</a></li>
    <li><a data-toggle="pill" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="pill" href="#menu3">Menu 3</a></li>
  </ul>
  
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>HOME</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
</div>

</body>
</html>
