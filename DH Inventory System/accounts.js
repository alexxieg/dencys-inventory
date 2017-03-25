function validateForm() {
	if(document.getElementById('adduser').value == "") {
		alert('Please Enter Username');
		document.getElementById('adduser').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addpass').value == "") {
		alert('Please Enter Password');
		document.getElementById('addpass').style.borderColor = "red";
		return false;
	}
	if(confirm('Are you sure you want to add this account?')) {
		alert("New Account Successfully Added");
		return true;	
	}
	else {
	return false;		
	}
}