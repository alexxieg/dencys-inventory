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
			'YES',
		  cancelButtonText:
			'CANCEL'
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

var remove;	
function validateRemove(clicked_id) {
	if(remove != true) {
		event.preventDefault();
		swal({
		  title: 'Confirm Remove Employee',
		  text: "Are you sure you want to remove this employee?",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonText:
			'YES',
		  cancelButtonText:
			'Cancel'
		}).then(function () {
			remove = true;
			document.getElementById(clicked_id).click();
		})
	}
}

var restore;	
function validateRestore(clicked_id) {
	
	if(restore != true) {
		event.preventDefault();
		swal({
		  title: 'Confirm Restore Employee',
		  text: "Are you sure you want to restore this employee?",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonText:
			'YES',
		  cancelButtonText:
			'Cancel'
		}).then(function () {
			restore = true;
			document.getElementById(clicked_id).click();
		})
	}
}