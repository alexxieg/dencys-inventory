function validateForm() {
	if (document.getElementById('addEmpl').value == "") {
		alert('Please Enter Employee Name');
		document.getElementById('addEmpl').style.borderColor = "red";
		return false;
	}
	if(confirm('Are you sure you want to add this entry?')) {
		alert("New Employee Successfully Added");
		return true;			
	}
	else {
		return false;		
	}
}