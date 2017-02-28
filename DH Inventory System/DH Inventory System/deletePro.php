<?php

	 require_once 'dbcon.php';

    $proid= $_GET['proId'];
    $result = $conn->prepare("DELETE FROM product WHERE prodID = '$proid'");
    $result->execute();
    header("location: product.php");

?>