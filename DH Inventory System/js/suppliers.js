function validateForm() {
	if(document.getElementById('supName').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Supplier Name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('supName').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('supName').value.length < 3){
		swal({
		title: "Warning!",
		text: "The Supplier Name should have more than 2 characters",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('supName').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('supContact').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Contact Number.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('supContact').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('supContact').value.length < 7){
		swal({
		title: "Warning!",
		text: "The Supplier Contact Number should have more than 6 characters",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('supContact').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('supLoc').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Location.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('supLoc').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('supLoc').value.length < 3){
		swal({
		title: "Warning!",
		text: "The Supplier Location should have more than 2 characters",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('supLoc').style.borderColor = "red";
		return false;
	}
	
	if(confirm('Are you sure you want to add this supplier?')) {
		return true;
	}
	else {
		swal({
		title: "Adding of Supplier Cancelled",
		type: "success"
		});
		return false;		
	}
}

function validateForm2() {
	if(document.getElementById('supName').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Supplier Name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('supName').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('supName').value.length < 3){
		swal({
		title: "Warning!",
		text: "The Supplier Name should have more than 2 characters",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('supName').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('supContactNum').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Contact Number.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('supContactNum').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('supContactNum').value.length < 7){
		swal({
		title: "Warning!",
		text: "The Supplier Contact Number should have more than 6 characters",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('supContactNum').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('supLoc').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Location.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('supLoc').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('supLoc').value.length < 3){
		swal({
		title: "Warning!",
		text: "The Supplier Location should have more than 2 characters",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('supLoc').style.borderColor = "red";
		return false;
	}
	
	if(confirm('Are you sure you want to update this supplier?')) {
		return true;
	}
	else {
		swal({
		title: "Updating of Supplier Cancelled",
		type: "success"
		});
		return false;		
	}
}