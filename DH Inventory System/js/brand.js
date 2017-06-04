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
	if (document.getElementById('addBrandID').value.length < 3){
		swal({
		title: "Warning!",
		text: "The Brand ID should atleast have 3 characters",
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
	if (document.getElementById('addBrandName').value.length < 3){
		swal({
		title: "Warning!",
		text: "The Brand Name should atleast have more than 2 characters",
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
		title: "Adding of Brand Cancelled",
		type: "success"
		});
		return false;		
	}
}