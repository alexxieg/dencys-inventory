<?php

	require_once 'dbcon.php';

    $usethisid= $_GET['useId'];
    $result = $conn->prepare("UPDATE category SET status = 'Inactive' WHERE categoryID = '$usethisid'");
    $result->execute();
    header("location: ../category.php");

?>