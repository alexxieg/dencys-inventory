<?php

	require_once 'dbcon.php';

    $categRemoveID= $_GET['categoryID'];
    $result = $conn->prepare("UPDATE category SET status = 'Inactive' WHERE categoryID = '$categRemoveID'");
    $result->execute();
	
	$result2 = $conn->prepare("UPDATE category SET archiveDate = CURDATE() WHERE categoryID = '$categRemoveID'");
	$result2->execute();
    
	header("location: ../category.php");

?>