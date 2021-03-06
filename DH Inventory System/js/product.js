var check;
function validateForm() {
	if (document.getElementById('addProdName').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter a product name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addProdName').style.borderColor = "red";
		return false;
	}
	
	if(document.getElementById('addProdQty').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter quantity.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addProdQty').style.borderColor = "red";
		return false;
	}
	
	if(document.getElementById('addBrand').value == "") {
		swal({
		title: "Warning!",
		text: "Please select a brand.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBrand').style.borderColor = "red";
		return false;
	}
	
	if(document.getElementById('addPrice').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter the unit price.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addPrice').style.borderColor = "red";
		return false;
	}
	
	if(document.getElementById('addReorderLvl').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter the reorder level.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addReorderLvl').style.borderColor = "red";
		return false;
	}
	
	if(check != true) {
		event.preventDefault();
		swal({
		  title: '<b>Confirm New Product</b>',
		  type: 'info',
		  text: "Are you sure you want to add this entry?",
		  showCloseButton: true,
		  showCancelButton: true,
		  confirmButtonText:
			'YES',
		  cancelButtonText:
			'Cancel'
		});
		$('#thisButton').click(function(){
			check = true;
			document.getElementById('sucBtn').click();
		});
		
	} else {
		return true;
	}
}

var check;
function validateForm2() {
	if (document.getElementById('addProdName').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter product name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addProdName').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('addProductType').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter product type.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addProductType').style.borderColor = "red";
		return false;
	}
	
	if(document.getElementById('addBrand').value == "") {
		swal({
		title: "Warning!",
		text: "Please select a brand.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBrand').style.borderColor = "red";
		return false;
	}
	
	if(document.getElementById('addPrice').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter the unit price.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addPrice').style.borderColor = "red";
		return false;
	}
	
	if(document.getElementById('addReorderLvl').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter the reorder level.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addReorderLvl').style.borderColor = "red";
		return false;
	}
	
	if(check != true) {
		event.preventDefault();
		swal({
		  title: '<b>Confirm Update Product</b>',
		  type: 'info',
		  text: "Are you sure you want to update this Product?",
		  showCloseButton: true,
		  showCancelButton: true,
		  confirmButtonText:
			'YES',
		  cancelButtonText:
			'Cancel'
		});
		$('#thisButton').click(function(){
			check = true;
			document.getElementById('sucBtn').click();
		});
		
	} else {
		return true;
	}
}

var remove;	
function validateRemove(clicked_id) {
	if(remove != true) {
		event.preventDefault();
		swal({
		  title: 'Confirm Remove Product',
		  text: "Are you sure you want to remove this product?",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonText:
			'YES',
		  cancelButtonText:
			'Cancel'
		}).then(function () {
			remove = true;
			document.getElementById(clicked_id).click();
		})
	}
}

var restore;	
function validateRestore(clicked_id) {
	
	if(restore != true) {
		event.preventDefault();
		swal({
		  title: 'Confirm Restore Product',
		  text: "Are you sure you want to restore this product?",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonText:
			'YES',
		  cancelButtonText:
			'Cancel'
		}).then(function () {
			restore = true;
			document.getElementById(clicked_id).click();
		})
	}
}