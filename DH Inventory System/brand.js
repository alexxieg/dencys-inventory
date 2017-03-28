function validateForm() {
	if(document.getElementById('addBrandID').value == "") {
		swal({
		title: "Error!",
		text: "Please Enter Brand ID.",
		type: "error",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBrandID').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addBrandName').value == "") {
		swal({
		title: "Error!",
		text: "Please Enter Brand Name.",
		type: "error",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBrandName').style.borderColor = "red";
		return false;
	}
	if(confirm('Are you sure you want to add this entry?')) {
		alert("New Brand Successfully Added");
		return true;
	}
	else {
		swal({
		title: "Adding of Brand Canceled",
		type: "success"
		});
		return false;		
	}
}