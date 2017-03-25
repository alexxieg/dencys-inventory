<?php
	$sort = (isset($_GET['orderBy']) ? $_GET['orderBy'] : null);
	$searching = (isset($_REQUEST['search']) ? $_REQUEST['search'] : null);
	if (!empty($sort)) {
		$query = $conn->prepare("SELECT product.prodID, product.prodName, product.model, brand.brandName, category.categoryName, product.price, product.unitType, product.reorderLevel
								FROM product INNER JOIN brand ON product.brandID = brand.brandID INNER JOIN category ON product.categoryID = category.categoryID
								ORDER BY $sort");
	} else if (!empty($searching)) {
		$query = $conn->prepare("SELECT product.prodID, product.prodName, product.model, brand.brandName, category.categoryName, product.price, product.unitType, product.reorderLevel
								FROM product INNER JOIN brand ON product.brandID = brand.brandID INNER JOIN category ON product.categoryID = category.categoryID
								WHERE prodName LIKE '%".$searching."%'");
	} else {
		$query = $conn->prepare("SELECT product.prodID, product.prodName, product.model, brand.brandName, category.categoryName, product.price, product.unitType, product.reorderLevel
								FROM product INNER JOIN brand ON product.brandID = brand.brandID INNER JOIN category ON product.categoryID = category.categoryID
								ORDER BY prodID");
	}
	$query->execute();
	$result = $query->fetchAll();
?>