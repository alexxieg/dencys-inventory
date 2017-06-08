<?php
	include("dbcon.php"); /* ESTABLISH CONNECTION IN THIS FILE; MAKE SURE THAT IT IS mysqli_* */

	$stmt = $conn->prepare("SELECT prodName FROM product WHERE prodName LIKE :term AND status ='Active'"); /* START PREPARED STATEMENT */
	$stmt->execute(array('term' => '%'.$_GET['term'].'%'));

	//return json data
	try {
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		while($row = $stmt->fetch()) {
		  $return_arr[] =  $row['prodName'];
		}
		
	} catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}

	/* Toss back results as json encoded array. */
	echo json_encode($return_arr);

?>