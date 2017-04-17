function validateForm() {
	if(document.getElementById('addBrandID').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Brand ID.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBrandID').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addBrandName').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Brand Name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBrandName').style.borderColor = "red";
		return false;
	}
	if(confirm('Are you sure you want to add this entry?')) {
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