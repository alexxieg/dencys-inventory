function validateForm() {
	if(document.getElementById('addCategoryID').value == "") {
		alert('Please Enter Brand ID');
		document.getElementById('addCategoryID').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addCategoryName').value == "") {
		alert('Please Enter Brand Name');
		document.getElementById('addCategoryName').style.borderColor = "red";
		return false;
	}
	if(confirm('Are you sure you want to add this entry?')) {
		alert("New Category Successfully Added");
		return true;	
	}
	else {
		return false;		
	}
}