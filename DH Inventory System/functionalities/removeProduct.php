<?php

	 require_once 'dbcon.php';

    $proid= $_GET['proId'];
    $result = $conn->prepare("UPDATE product SET status = 'Inactive' WHERE prodID = '$proid'");
    $result->execute();
    header("location: ../product.php");

?>