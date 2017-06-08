<?php

	 require_once 'dbcon.php';

    $proid= $_GET['proId'];
    $result = $conn->prepare("UPDATE product SET status = 'Inactive' WHERE prodID = '$proid'");
    $result->execute();
	
	$result1 = $conn->prepare("UPDATE product SET archiveDate = CURDATE() WHERE prodID = '$proid'");
	$result1->execute();
	
    header("location: ../product.php");

?>