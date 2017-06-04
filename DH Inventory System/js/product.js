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
	if (document.getElementById('addProdName').value.length < 8){
		swal({
		title: "Warning!",
		text: "The Product Name should have more than 7 characters",
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
	if (document.getElementById('addPrice').value.length < 4){
		swal({
		title: "Warning!",
		text: "The Price should have more than 3 characters",
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