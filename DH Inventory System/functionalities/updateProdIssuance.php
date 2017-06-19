
		<!-- Update Function -->
		<?php
			$outid= $_GET['outId'];
			$prodTem=(isset($_REQUEST['prodItem']) ? $_REQUEST['prodItem'] : null);
			$prodTem2=(isset($_REQUEST['prodItem2']) ? $_REQUEST['prodItem2'] : null);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			if (isset($_POST["updateOut"])){
			
				for ($index = 0; $index < count($prodTem); $index++) {
					$prodItem = $_POST['prodItem'][$index];
					$outQty = $_POST['outQty'][$index];
					$emp = $_POST['emp'];
					$branch = $_POST['branch'];
					$rcpNo = $_POST['rcno'];
					$outgoingID = $_POST['productOutID'][$index];
					$userID = $_POST['userID'];

					$emp1 = $conn->query("SELECT empID AS empA FROM employee WHERE empFirstName = '$emp'");
					$emp2 = $emp1->fetch(PDO::FETCH_ASSOC);
					$emp3 = $emp2['empA'];
					
					$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prodItem'");
					$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
					$prod3 = $prod2['prodA'];
						
					$branch1 = $conn->query("SELECT branchID AS branchA from branch WHERE location = '$branch'");
					$branch2 = $branch1->fetch(PDO::FETCH_ASSOC);
					$branch3 = $branch2['branchA'];
					
					$checkQuant = current($conn->query("SELECT inventory.qty FROM product LEFT JOIN inventory ON product.prodID = inventory.prodID 
													LEFT JOIN incoming ON product.prodID = incoming.prodID 
													LEFT JOIN outgoing ON product.prodID = outgoing.prodID
													WHERE product.status = 'Active' AND product.prodID = '$prod3' 
													AND prodName = '$prodItem'
													GROUP BY qty")->fetch());
					
					if ($outQty > $checkQuant) {
						echo '<script language="javascript">';
						echo 'swal(
							  "Error!",
							  "The quantity should not be greater than the current quantity of the product: '.$prodItem.'",
							  "error");';
						echo '</script>';
						$stop = true;
						return false;
					} else {
									
					$sql = "UPDATE outgoing SET outQty = $outQty, outDate = CURDATE(), receiptNo = '$rcpNo', branchID = $branch3, empID = '$emp3', prodID = '$prod3', userID = '$userID' 
							WHERE outID = $outgoingID";
					$conn->exec($sql);	
						}
					
					/* $sql = "UPDATE outgoing SET outQty = ".$_POST['outQty']." , outDate = CURDATE(), outRemarks = ".$_POST['outRemarks'].", branchID = $branch3, empID = $emp3, prodID = $prod3
						WHERE outID = '$outid'"; */
				}
				$url="viewProdIssuance.php?outId=$outid";
				echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
			}
			
		?>
		
		<?php
			require_once 'dbcon.php';
			$outid = $_GET['outId'];
			$prodTem=(isset($_REQUEST['prodItem']) ? $_REQUEST['prodItem'] : null);
			for ($index2 = 0; $index2 < count($prodTem); $index2++) {
				if (isset($_POST["updateOut"])){
					$outgoingID = $_POST['productOutID'][$index2];
					$prodItem = $_POST['prodItem'][$index2];
					$outQty = $_POST['outQty'][$index2];
					$iniDate = $_POST['iniDate'][$index2];
					$iniUser = $_POST['iniUser'][$index2];
					
					$editProdItem = $_POST['editProdItem'][$index2];
					$editOutQty = $_POST['editOutQty'][$index2];
					
					$emp = $_POST['emp'];
					$branch = $_POST['branch'];
					$rcpNo = $_POST['rcno'];
					$userID = $_POST['userID'];

					$emp1 = $conn->query("SELECT empID AS empA FROM employee WHERE empFirstName = '$emp'");
					$emp2 = $emp1->fetch(PDO::FETCH_ASSOC);
					$emp3 = $emp2['empA'];
					
					$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$editProdItem'");
					$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
					$prod3 = $prod2['prodA'];
						
					$branch1 = $conn->query("SELECT branchID AS branchA from branch WHERE location = '$branch'");
					$branch2 = $branch1->fetch(PDO::FETCH_ASSOC);
					$branch3 = $branch2['branchA'];
					
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					
					if ($prodItem != $editProdItem || $outQty != $editOutQty) {
						$sql = "INSERT INTO editoutgoing (outEditDate, outID, outQty, outDate, receiptNo, branchID, empID, prodID, userID, prodNew, qtyNew, userNew)
								VALUES (CURDATE(),$outgoingID,'$editOutQty','$iniDate','$rcpNo','$branch3','$emp3','$prod3','$iniUser','$prodItem',$outQty,'$userID')";
						$conn->exec($sql);						
					} else {
						//Do Nothing
					}
	
				}
			}
		?>
		