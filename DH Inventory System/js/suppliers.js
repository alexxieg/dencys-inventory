function validateForm() {
	if(document.getElementById('supName').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Supplier Name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('supName').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('supContact').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Contact Number.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('supContact').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('supLoc').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Location.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('supLoc').style.borderColor = "red";
		return false;
	}
	
	if(confirm('Are you sure you want to add this supplier?')) {
		return true;
	}
	else {
		swal({
		title: "Adding of Supplier Cancelled",
		type: "success"
		});
		return false;		
	}
}