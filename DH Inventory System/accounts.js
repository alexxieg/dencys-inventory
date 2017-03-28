function validateForm() {
	if(document.getElementById('adduser').value == "") {
		swal({
		title: "Error!",
		text: "Please Enter Username.",
		type: "error",
		confirmButtonText: "Ok"
		});
		document.getElementById('adduser').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addpass').value == "") {
		swal({
		title: "Error!",
		text: "Please Enter Password.",
		type: "error",
		confirmButtonText: "Ok"
		});
		document.getElementById('addpass').style.borderColor = "red";
		return false;
	}
	if(confirm('Are you sure you want to add this account?')) {
		alert("New Account Successfully Added");
		return true;	
	}
	else {
		swal({
		title: "Adding of User Canceled",
		type: "success"
		});
	return false;		
	}
}