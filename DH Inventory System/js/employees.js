function validateForm() {
	if (document.getElementById('addFName').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter First Name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addFName').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addFName').value.length < 3){
		swal({
		title: "Warning!",
		text: "The First Name should have more than 2 characters",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addFName').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addMName').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Middle Name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addMName').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addMName').value.length < 3){
		swal({
		title: "Warning!",
		text: "The Middle Name should have more than 2 characters",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addMName').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addLName').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Last Name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addLName').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addLName').value.length < 3){
		swal({
		title: "Warning!",
		text: "The Last Name should have more than 2 characters",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addLName').style.borderColor = "red";
		return false;
	}
	if(confirm('Are you sure you want to add this entry?')) {
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

function validateForm2() {
	if (document.getElementById('addEntry1').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter First Name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addEntry1').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addEntry1').value.length < 3){
		swal({
		title: "Warning!",
		text: "The First Name should have more than 2 characters",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addEntry1').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addEntry2').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Middle Name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addEntry2').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addEntry2').value.length < 3){
		swal({
		title: "Warning!",
		text: "The Middle Name should have more than 2 characters",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addEntry2').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addEntry3').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Last Name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addEntry3').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addEntry3').value.length < 3){
		swal({
		title: "Warning!",
		text: "The Last Name should have more than 2 characters",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addEntry3').style.borderColor = "red";
		return false;
	}
	if(confirm('Are you sure you want to update this entry?')) {
		return true;			
	}
	else {
		swal({
		title: "Updating of Employee Canceled",
		type: "success"
		});
		return false;		
	}
}