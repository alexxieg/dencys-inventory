<?php
	require_once 'dbcon.php';

    $usethisid= $_GET['useId'];
    $result = $conn->prepare("UPDATE category SET status = 'Active' WHERE categoryID = '$usethisid'");
    $result->execute();
	
	$result2 = $conn->prepare("UPDATE category SET restoreDate = CURDATE() WHERE categoryID = '$usethisid'");
	$result2->execute();
	
    header("location: ../category.php");

?>