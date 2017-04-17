function validateForm() {
	if (document.getElementById('addFName').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter First Name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addFName').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addMName').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Middle Name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addMName').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addLName').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Last Name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addLName').style.borderColor = "red";
		return false;
	}
	if(confirm('Are you sure you want to add this entry?')) {
		return true;			
	}
	else {
		swal({
		title: "Adding of Employee Canceled",
		type: "success"
		});
		return false;		
	}
}