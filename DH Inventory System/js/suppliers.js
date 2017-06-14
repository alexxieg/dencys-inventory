var check;
function validateForm() {
	if(document.getElementById('supName').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter supplier name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('supName').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('supContact').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter contact number.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('supContact').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('supContact').value.length < 7){
		swal({
		title: "Warning!",
		text: "The contac number should have more than 6 characters",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('supContact').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('supLoc').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter location.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('supLoc').style.borderColor = "red";
		return false;
	}
	
	if(check != true) {
		event.preventDefault();
		swal({
		  title: '<b>Confirm New Supplier</b>',
		  type: 'info',
		  text: "Are you sure you want to add the entry?",
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

function validateForm2() {
	if(document.getElementById('supName').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter supplier name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('supName').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('supName').value.length < 3){
		swal({
		title: "Warning!",
		text: "The supplier name should have more than 2 characters",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('supName').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('supContactNum').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter contact number.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('supContactNum').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('supContactNum').value.length < 7){
		swal({
		title: "Warning!",
		text: "The contac number should have more than 6 characters",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('supContactNum').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('supLoc').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter location.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('supLoc').style.borderColor = "red";
		return false;
	}
	
	if(check != true) {
		event.preventDefault();
		swal({
		  title: '<b>Confirm Update Supplier</b>',
		  type: 'info',
		  text: "Are you sure you want to update this Supplier?",
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
		  title: 'Confirm Remove Supplier',
		  text: "Are you sure you want to remove this supplier?",
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

var remove;	
function validateAdd(clicked_id) {
	if(remove != true) {
		event.preventDefault();
		swal({
		  title: 'Confirm Blacklist Supplier',
		  text: "Are you sure you want to blacklist this supplier?",
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
		  title: 'Confirm Restore Supplier',
		  text: "Are you sure you want to restore this supplier?",
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

var restore;	
function validateRestoreSup(clicked_id) {
	
	if(restore != true) {
		event.preventDefault();
		swal({
		  title: 'Confirm Restore Blacklisted Supplier',
		  text: "Are you sure you want to unlist this supplier?",
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