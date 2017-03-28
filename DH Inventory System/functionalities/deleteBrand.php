<?php
	require_once 'dbcon.php';

    $usethisid= $_GET['useId'];
    $result = $conn->prepare("UPDATE brand SET status = 'Inactive' WHERE brandID = '$usethisid'");
    $result->execute();
	
    header("location: ../brands.php");

?>