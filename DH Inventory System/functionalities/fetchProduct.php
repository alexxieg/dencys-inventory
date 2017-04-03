<?php
	$query = $conn->prepare("SELECT product.prodID, product.prodName, brand.brandName, category.categoryName, product.price, product.unitType, product.reorderLevel
								FROM product INNER JOIN brand ON product.brandID = brand.brandID INNER JOIN category ON product.categoryID = category.categoryID
								WHERE product.status = 'Active'
								ORDER BY prodID");
	$query->execute();
	$result = $query->fetchAll();
?>