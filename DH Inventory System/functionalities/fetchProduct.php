<?php
	$query1 = $conn->prepare("SELECT brandID, brandName FROM brand WHERE status = 'Active' ");
	$query1->execute();
	$brandType = $query1->fetchAll();
	
	$query2 = $conn->prepare("SELECT categoryID, categoryName FROM category WHERE status = 'Active' ");
	$query2->execute();
	$categoryType = $query2->fetchAll();
	
	$sortByBrand = (isset($_REQUEST['brand_Name']) ? $_REQUEST['brand_Name'] : null);
	$sortByCategory = (isset($_REQUEST['category_Name']) ? $_REQUEST['category_Name'] : null);
	
	if (!empty($sortByBrand)) {
		$query = $conn->prepare("SELECT product.prodID, product.prodName, brand.brandName, category.categoryName, product.price, product.unitType, product.reorderLevel
								FROM product INNER JOIN brand ON product.brandID = brand.brandID INNER JOIN category ON product.categoryID = category.categoryID
								WHERE product.status = 'Active' AND product.brandID = '$sortByBrand'
								ORDER BY prodID");	
		$query->execute();
		$result = $query->fetchAll();
	} else if (!empty($sortByCategory)) {
		$query = $conn->prepare("SELECT product.prodID, product.prodName, brand.brandName, category.categoryName, product.price, product.unitType, product.reorderLevel
								FROM product INNER JOIN brand ON product.brandID = brand.brandID INNER JOIN category ON product.categoryID = category.categoryID
								WHERE product.status = 'Active' AND product.categoryID = '$sortByCategory'
								ORDER BY prodID");	
		$query->execute();
		$result = $query->fetchAll();
	} else if (!empty($sortByCategory)&&!empty($sortByBrand)){
		$query = $conn->prepare("SELECT product.prodID, product.prodName, brand.brandName, category.categoryName, product.price, product.unitType, product.reorderLevel
								FROM product INNER JOIN brand ON product.brandID = brand.brandID INNER JOIN category ON product.categoryID = category.categoryID
								WHERE product.status = 'Active' AND product.brandID = '$sortByBrand' AND product.categoryID = '$sortByCategory'
								ORDER BY prodID");	
		$query->execute();
		$result = $query->fetchAll();
	} else {
		$query = $conn->prepare("SELECT product.prodID, product.prodName, brand.brandName, category.categoryName, product.price, product.unitType, product.reorderLevel
								FROM product INNER JOIN brand ON product.brandID = brand.brandID INNER JOIN category ON product.categoryID = category.categoryID
								WHERE product.status = 'Active'
								ORDER BY prodID");	
		$query->execute();
		$result = $query->fetchAll();
	}
	
	$selectedBrand =(isset($_REQUEST['brand_Name']) ? $_REQUEST['brand_Name'] : null);
	if (!empty($selectedBrand)) {
		$filterBrand = current($conn->query("SELECT brandName FROM brand WHERE brandID = '$selectedBrand'")->fetch());
	} else {
		$filterBrand = "None";
	}
	
	$selectedCategory =(isset($_REQUEST['category_Name']) ? $_REQUEST['category_Name'] : null);
	if (!empty($selectedCategory)) {
		$filterCategory = current($conn->query("SELECT categoryName FROM category WHERE categoryID = '$selectedCategory'")->fetch());
	} else {
		$filterCategory = "None";
	}
?>