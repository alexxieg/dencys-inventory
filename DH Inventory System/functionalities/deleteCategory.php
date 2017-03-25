<?php

	require_once 'dbcon.php';

    $usethisid= $_GET['useId'];
    $result = $conn->prepare("DELETE FROM category WHERE category = '$usethisid'");
    $result->execute();
    header("location: category.php");

?>