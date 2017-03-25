function validateForm() {
	if (document.getElementById('addProdName').value == "") {
		alert('Please Enter Product Name');
		document.getElementById('addProdName').style.borderColor = "red";
		return false;
	}
	if(document.getElementById('addModel').value == "") {
		alert('Please Enter Model');
		document.getElementById('addModel').style.borderColor = "red";
		return false;
	}
	if(document.getElementById('addQty').value == "") {
		alert('Please Enter Quantity');
		document.getElementById('addQty').style.borderColor = "red";
		return false;
	}
	if(document.getElementById('addPrice').value == "") {
		alert('Please Enter Unit Price');
		document.getElementById('addPrice').style.borderColor = "red";
		return false;
	}
	if(document.getElementById('addReorderLvl').value == "") {
		alert('Please Enter Reorder Level');
		document.getElementById('addReorderLvl').style.borderColor = "red";
		return false;
	}
	if(confirm('Are you sure you want to add this entry?')) {
		alert("New Product Successfully Added");
		return true;	
	}
	else {
		return false;		
	}
}