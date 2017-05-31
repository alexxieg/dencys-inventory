<?php

	require_once 'dbcon.php';

    $supID = $_GET['supID'];
    $result = $conn->prepare("UPDATE suppliers SET status = 'Inactive' WHERE supID = '$supID'");
    $result->execute();
	
	$result2 = $conn->prepare("UPDATE suppliers SET archiveDate = CURDATE() WHERE supID = '$supID'");
	$result2->execute();
	
    header("location: ../suppliers.php");

?>