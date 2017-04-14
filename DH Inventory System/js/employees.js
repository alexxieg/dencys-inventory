function validateForm() {
	if (document.getElementById('addEmpl').value == "") {
		swal({
		title: "Error!",
		text: "Please Enter Employee Name.",
		type: "error",
		confirmButtonText: "Ok"
		});
		document.getElementById('addEmpl').style.borderColor = "red";
		return false;
	}
	if(confirm('Are you sure you want to add this entry?')) {
		alert("New Employee Successfully Added");
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