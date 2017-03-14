function validateForm() {
	if (document.getElementById('addQty').value == "") {
		alert('Please Enter Quantity');
		document.getElementById('addQty').style.borderColor = "red";
		return false;
	}
	if(confirm('Are you sure you want to add this entry?')) {
		alert("Outgoing Product Successfully Added");
		return true;			
	}
	else {
		return false;		
	}
}