<?php
	require_once 'dbcon.php';

    $brandRemoveID= $_GET['brandID'];
    $result = $conn->prepare("UPDATE brand SET status = 'Inactive' WHERE brandID = '$brandRemoveID'");
    $result->execute();

	$result2 = $conn->prepare("UPDATE brand SET archiveDate = CURDATE() WHERE brandID = '$brandRemoveID'");
	$result2->execute();
	
    header("location: ../brands.php");

?>