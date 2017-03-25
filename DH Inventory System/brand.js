function validateForm() {
	if(document.getElementById('addBrandID').value == "") {
		alert('Please Enter Brand ID');
		document.getElementById('addBrandID').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addBrandName').value == "") {
		alert('Please Enter Brand Name');
		document.getElementById('addBrandName').style.borderColor = "red";
		return false;
	}
	if(confirm('Are you sure you want to add this entry?')) {
		alert("New Brand Successfully Added");
		return true;
	}
	else {
		return false;		
	}
}