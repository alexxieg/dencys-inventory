<?php

	 require_once 'dbcon.php';

    $usethisid= $_GET['useId'];
    $result = $conn->prepare("DELETE FROM brand WHERE brandID = '$usethisid'");
    $result->execute();
    header("location: brands.php");

?>