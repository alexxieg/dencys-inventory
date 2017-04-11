<?php

	require_once 'dbcon.php';

    $categRemoveID= $_GET['categoryID'];
    $result = $conn->prepare("UPDATE category SET status = 'Inactive' WHERE categoryID = '$categRemoveID'");
    $result->execute();
    header("location: ../category.php");

?>