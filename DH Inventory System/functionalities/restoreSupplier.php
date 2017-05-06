<?php

	require_once 'dbcon.php';

    $supID = $_GET['supID'];
    $result = $conn->prepare("UPDATE suppliers SET status = 'Active' WHERE supID = '$supID'");
    $result->execute();
    header("location: ../suppliers.php");

?>