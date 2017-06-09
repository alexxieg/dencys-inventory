function validateForm() {
	if(document.getElementById('addBrandID').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter brand ID.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBrandID').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addBrandID').value.length < 3){
		swal({
		title: "Warning!",
		text: "The brand ID should atleast have 3 characters",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBrandID').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addBrandName').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter brand name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBrandName').style.borderColor = "red";
		return false;
	}
	if(confirm('Are you sure you want to add this brand?')) {
		return true;
	}
	else {
		swal({
		title: "Adding of brand cancelled",
		type: "success"
		});
		return false;		
	}
}

function validateForm2() {
	if(document.getElementById('addBrandID').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter brand ID.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBrandID').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addBrandID').value.length < 3){
		swal({
		title: "Warning!",
		text: "The brand ID should atleast have 3 characters",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBrandID').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addBrandName').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter brand name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBrandName').style.borderColor = "red";
		return false;
	}
	if(confirm('Are you sure you want to update this brand?')) {
		return true;
	}
	else {
		swal({
		title: "Updating of brand cancelled.",
		type: "success"
		});
		return false;		
	}
}