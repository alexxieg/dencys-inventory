<?php
	  if (isset($_POST['submit'])){
		  if(!empty($_POST["chk"])) {
			  foreach($_POST["chk"] as $chk) {
				foreach($_POST["num"] as $num){
						
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									
					$prod = $_POST['prodItem'];
					$emp = $_POST['emp'];
						
					$emp1 = $conn->query("SELECT empID AS empA FROM employee WHERE empName = '$emp'");
					$emp2 = $emp1->fetch(PDO::FETCH_ASSOC);
					$emp3 = $emp2['empA'];
							
					$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prod'");
					$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
					$prod3 = $prod2['prodA'];
							
					$sql = "INSERT INTO incoming (inQty, inDate, receiptNo, inRemarks, empID, prodID)
							VALUES ('".$_POST['incQty']."',CURDATE(),'".$_POST['rcno']."','".$_POST['inRemarks']."','$emp3','$prod3')";
					$result = $conn->query($sql);
					echo '<td>'.$chk.$num.'</td>';
					echo "<meta http-equiv='refresh' content='0'>";
				}
			}
		}
				
/*		$emp1 = $conn->prepare("SELECT empID AS emp FROM employee WHERE empName = '$emp'");
		$emp1->execute();
						
		$prod1 = $conn->prepare("SELECT prodID AS prod FROM product WHERE prodName = '$prod'");
		$prod1->execute();
		
		$sup1 = $conn->prepare("SELECT supID AS sup from suppliers WHERE supplier_name = '$sup'");
		$sup1->execute();
				
		$sql = "INSERT INTO incoming (inQty, inDate, receiptNo, inRemarks, empID, prodID, supID)
		VALUES ('".$_POST['incQty']."',CURDATE(),'".$_POST['inRecN']."','".$_POST['inRemarks']."',$emp1,$prod1,$sup1)";
		$conn->exec($sql);
*/  	
	  }		  
	?>