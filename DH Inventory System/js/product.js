function validateForm() {
	if (document.getElementById('addProdName').value == "") {
		swal({
		title: "Error!",
		text: "Please Enter Product Name.",
		type: "error",
		confirmButtonText: "Ok"
		});
		document.getElementById('addProdName').style.borderColor = "red";
		return false;
	}
	if(document.getElementById('addModel').value == "") {
		swal({
		title: "Error!",
		text: "Please Enter Model.",
		type: "error",
		confirmButtonText: "Ok"
		});
		document.getElementById('addModel').style.borderColor = "red";
		return false;
	}
	if(document.getElementById('addQty').value == "") {
		swal({
		title: "Error!",
		text: "Please Enter Quantity.",
		type: "error",
		confirmButtonText: "Ok"
		});
		document.getElementById('addQty').style.borderColor = "red";
		return false;
	}
	if(document.getElementById('addPrice').value == "") {
		swal({
		title: "Error!",
		text: "Please Enter Unit Price.",
		type: "error",
		confirmButtonText: "Ok"
		});
		document.getElementById('addPrice').style.borderColor = "red";
		return false;
	}
	if(document.getElementById('addReorderLvl').value == "") {
		swal({
		title: "Error!",
		text: "Please Enter Reorder Level.",
		type: "error",
		confirmButtonText: "Ok"
		});
		document.getElementById('addReorderLvl').style.borderColor = "red";
		return false;
	}
	if(confirm('Are you sure you want to add this entry?')) {
		alert("New Product Successfully Added");
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