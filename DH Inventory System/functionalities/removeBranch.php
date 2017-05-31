<?php
	require_once 'dbcon.php';

    $usethisid= $_GET['useId'];
    $result = $conn->prepare("UPDATE branch SET status = 'Inactive' WHERE branchID = '$usethisid'");
    $result->execute();
	
	$result2 = $conn->prepare("UPDATE branch SET archiveDate = CURDATE() WHERE branchID = '$usethisid'");
	$result2->execute();
	
    header("location: ../branches.php");

?>