<?php

	require_once 'dbcon.php';

    $employID = $_GET['emplId'];
    $result = $conn->prepare("DELETE FROM employee WHERE empID = '$employID'");
    $result->execute();
    header("location: employees.php");

?>