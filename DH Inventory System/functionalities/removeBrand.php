<?php
	require_once 'dbcon.php';

    $brandRemoveID= $_GET['brandID'];
    $result = $conn->prepare("UPDATE brand SET status = 'Inactive' WHERE brandID = '$brandRemoveID'");
    $result->execute();

	$result2 = $conn->prepare("UPDATE branch SET archiveDate = CURDATE() WHERE branchID = '$brandRemoveID'");
	$result2->execute();
	
    header("location: ../brands.php");

?>