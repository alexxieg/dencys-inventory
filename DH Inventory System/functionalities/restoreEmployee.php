<?php

	require_once 'dbcon.php';

    $employID = $_GET['emplId'];
    $result = $conn->prepare("UPDATE employee SET status = 'Active' WHERE empID = '$employID'");
    $result->execute();
    header("location: ../employees.php");

?>