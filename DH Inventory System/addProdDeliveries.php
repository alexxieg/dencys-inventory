<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Add Product Deliveries</title>

		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link rel="shortcut icon" href="../logo.jpg">
		
		<!-- Custom CSS for this template -->
		<link href="../css/custom.css" rel="stylesheet">
		<link href="../css/sidebar.css" rel="stylesheet">
			
		<!-- Javascript Files -->
		<script src="../js/incoming.js"></script>
		<script src="../js/bootstrap.js"></script>
		<script src="../js/jquery-3.2.0.min.js"></script>	
		<script src="../js/bootstrap.min.js"></script>
		<script src="../alertboxes/sweetalert2.min.js"></script>
		<link rel="stylesheet" href="../alertboxes/sweetalert2.min.css">
		
		<!-- Autocomplete Script -->
		<link rel="stylesheet" href="../css/jquery-ui.css">
		<script src="../js/jquery-1.9.1.js"></script>
		<script src="../js/jquery-ui.js"></script>
		
		<!-- Datatables CSS and JS Files -->
		<script src="../datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="../datatables/media/js/dataTables.bootstrap.min.js"></script>
		<link href="../datatables/media/css/dataTables.bootstrap.min.css" rel="stylesheet">	
		<link href="../datatables/media/css/jquery.dataTables.min.css" rel="stylesheet">
		
		<script>
		  $(function() {
			$('.thisProduct').autocomplete({
				minLength:2,
				source: "../search.php"
			});
		  });
		</script> 
		
		<script>
		  $(function() {
			$('#supplier').autocomplete({
				minLength:2,
				source: "../searchSup.php"
			});
		  });

		</script>
		
		<!-- Datatables Script -->
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
		<!-- Retrieve Incoming Data -->
		<?php 
			$varPO = $_GET['po'];
			$query = $conn->prepare("SELECT purchaseorders.poID, purchaseorders.poNumber, purchaseorders.poDate, purchaseorders.qtyOrder, purchaseorders.supID, product.unitType, product.prodName, purchaseorders.userID
									FROM purchaseorders INNER join product ON purchaseorders.prodID = product.prodID
									WHERE poNumber = '$varPO'
									ORDER BY poID DESC;");
			$query->execute();
			$result = $query->fetchAll();
			
			$supplierID = current($conn->query("SELECT purchaseorders.supID FROM purchaseorders INNER JOIN suppliers ON purchaseorders.supID = suppliers.supID WHERE purchaseorders.poNumber = '$varPO'")->fetch());
			$supplierName = current($conn->query("SELECT supplier_name FROM suppliers WHERE supID = $supplierID")->fetch());
		?>
		
		<!-- Modal for New Incoming Entry Form -->
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Add Incoming Product</h4>
		</div>
		<div class="modal-body">
			<form action="" method="POST">
				<h3> User </h3>
				<input type="text" class="form-control" id="userID" value = "<?php echo $_SESSION['id']; ?>"placeholder="User" name="userID" readonly>
				
				<h3>Product Order Number</h3>				
				<select class="form-control" id="addEmpl" name="po" onchange="this.form.submit();" readonly>
					<option SELECTED><?php echo $varPO; ?></option>
				</select>
				
				<h3>Receipt No.</h3> 
				<input type="text" class="form-control" id ="addRcpt" placeholder="Receipt Number" name="rcno">
				
				<h3>Receipt Date</h3> 
				<input type="date" class="form-control" id ="addRcptDate" placeholder="Receipt Date" name="rcdate">
				
				<h3>Supplier</h3> 
					<div class="ui-widget">
						<input id="supplier" name="supplier">
					</div>
										
				<h3>Received By</h3>
				<?php
					$query = $conn->prepare("SELECT empFirstName FROM employee ");
					$query->execute();
					$res = $query->fetchAll();
				?>
									
				<select class="form-control" id="addEmpl" name="emp">
					<?php foreach ($res as $row): ?>
						<option><?=$row["empFirstName"]?></option>
					<?php endforeach ?>
				</select> 
				
				<br>
					
				<h5>Product/s</h5>
				<table class="table table-striped" id="dataTable" name="chk">				
					<tbody>
						<?php foreach ($result as $row): ?>
						<tr id="thisRow">
							<td><input type="checkbox" name="chk"></TD>
							<td><input type="hidden" value="1" name="num" id="orderdata">1</TD>
							<td>	
								<div class="ui-widget">
									<input class="thisProduct" name="prodItem[]" value="<?php echo $row["prodName"]; ?>" placeholder="<?php echo $row["prodName"]; ?>">
								</div>
							</td>
									
							<td>
								<input type="number" min="1" class="form-control" id="addIncQty" value="<?php echo $row["qtyOrder"]; ?>" placeholder="<?php echo $row["qtyOrder"]; ?>" name="incQty[]">
							</td>
							
							<td>
								<select class="form-control"  name="inStatus[]">
									<option>Complete</option>
									<option>Partial</option>
								</select> 
							</td>
								
							<td>
								<input type="text" class="form-control" id="addRem" value="None" placeholder="Remarks" name="inRemarks[]">
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
				
				<br>
				
				<div class="modFoot">
					<span><button type="button" class="btn btn-default" value="Add Row" onclick="addRow('dataTable')">Add Product</button></span>
					<span><button type="button" value="Delete Row" class="btn btn-default" onclick="deleteRow('dataTable')">Remove from List</button></span>
					<br>
					<br>
					<span><input type="button" class="btn btn-danger" id="canBtn" value="Cancel" data-dismiss="modal" onclick="this.form.reset()"></span>
					<span><input type="submit" name="submit" value="Submit" class="btn btn-success" id="sucBtn"></span>
				</div>
			</form> 								
		</div>
		<!-- End of Modal -->		
		
		<!-- Add Incoming Entry Functionality-->
		<?php include('addIncoming.php'); ?>
	</body>
</html>