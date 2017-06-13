var check;
function validateForm() {
	if (document.getElementById('addFName').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter first name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addFName').style.borderColor = "red";
		return false;
	}

	if (document.getElementById('addMName').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter middle name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addMName').style.borderColor = "red";
		return false;
	}
		
	if (document.getElementById('addLName').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter last name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addLName').style.borderColor = "red";
		return false;
	}

	if(check != true) {
		event.preventDefault();
		swal({
		  title: '<b>Confirm New Employee</b>',
		  type: 'info',
		  text: "Are you sure you want to add this employee?",
		  showCloseButton: true,
		  showCancelButton: true,
		  confirmButtonText:
			'<button id="thisButton" class="btn-success">YES</button>',
		  cancelButtonText:
			'<button class="btn-danger">CANCEL</button>'
		});
		$('#thisButton').click(function(){
			check = true;
			document.getElementById('sucBtn').click();
		});
		
	} else {
		return true;
	}
}

var check;
function validateForm2() {
	if (document.getElementById('addEntry1').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter first name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addEntry1').style.borderColor = "red";
		return false;
	}

	if (document.getElementById('addEntry2').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter middle name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addEntry2').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('addEntry3').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter last name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addEntry3').style.borderColor = "red";
		return false;
	}

	if(check != true) {
		event.preventDefault();
		swal({
		  title: '<b>Confirm Update Employee</b>',
		  type: 'info',
		  text: "Are you sure you want to update this employee?",
		  showCloseButton: true,
		  showCancelButton: true,
		  confirmButtonText:
			'YES',
		  cancelButtonText:
			'Cancel'
		});
		$('#thisButton').click(function(){
			check = true;
			document.getElementById('sucBtn').click();
		});
		
	} else {
		return true;
	}
}