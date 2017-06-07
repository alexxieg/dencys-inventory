function validateForm() {
	if (document.getElementById('addProdName').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Product Name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addProdName').style.borderColor = "red";
		return false;
	}
	if(document.getElementById('addProdQty').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Quantity.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addProdQty').style.borderColor = "red";
		return false;
	}
	if(document.getElementById('addBrand').value == "") {
		swal({
		title: "Warning!",
		text: "Please Choose a Brand.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBrand').style.borderColor = "red";
		return false;
	}
	if(document.getElementById('addPrice').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Unit Price.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addPrice').style.borderColor = "red";
		return false;
	}
	if(document.getElementById('addReorderLvl').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Reorder Level.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addReorderLvl').style.borderColor = "red";
		return false;
	}
	if(confirm('Are you sure you want to add this entry?')) {
		return true;	
	}
	else {
		swal({
		title: "Adding of Product Canceled",
		type: "success"
		});
		return false;		
	}
}

function validateForm2() {
	if (document.getElementById('addProdName').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Product Name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addProdName').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addProductType').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Product Type.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addProductType').style.borderColor = "red";
		return false;
	}
	if(document.getElementById('addBrand').value == "") {
		swal({
		title: "Warning!",
		text: "Please Choose a Brand.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBrand').style.borderColor = "red";
		return false;
	}
	if(document.getElementById('addBrand').value == "") {
		swal({
		title: "Warning!",
		text: "Please Choose a Brand.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBrand').style.borderColor = "red";
		return false;
	}
	if(document.getElementById('addPrice').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Unit Price.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addPrice').style.borderColor = "red";
		return false;
	}
	if(document.getElementById('addReorderLvl').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Reorder Level.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addReorderLvl').style.borderColor = "red";
		return false;
	}
	if(confirm('Are you sure you want to update this entry?')) {
		return true;	
	}
	else {
		swal({
		title: "Updating of Product Canceled",
		type: "success"
		});
		return false;		
	}
}