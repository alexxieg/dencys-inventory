<?php

	require_once 'dbcon.php';

    $supID = $_GET['supID'];
    $result = $conn->prepare("UPDATE suppliers SET status = 'Blacklisted' WHERE supID = '$supID'");
    $result->execute();
    header("location: ../suppliers.php");

?>