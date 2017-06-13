var check;
function validateForm() {
	if(document.getElementById('addBranchName').value == "") {
		swal({
		title: "Warning!",
		text: "Please branch name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBranchName').style.borderColor = "red";
		return false;
	}

	if (document.getElementById('addBranchLoc').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter branch location.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBranchLoc').style.borderColor = "red";
		return false;
	}
	
	if(check != true) {
		event.preventDefault();
		swal({
		  title: '<b>Confirm New Branch</b>',
		  type: 'info',
		  text: "Are you sure you want to add this branch?",
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

var edit;
function validateForm2() {
	if(document.getElementById('addEntry').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter branch name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addEntry').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('addEntrys').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter branch location.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addEntrys').style.borderColor = "red";
		return false;
	}

	if(edit != true) {
		event.preventDefault();
		swal({
		  title: '<b>Confirm Update Branch</b>',
		  type: 'info',
		  text: "Are you sure you want to update this branch?",
		  showCloseButton: true,
		  showCancelButton: true,
		  confirmButtonText:
			'YES',
		  cancelButtonText:
			'Cancel'
		});
		$('#thisButton').click(function(){
			edit = true;
			document.getElementById('sucBtn').click();
		});
		
	} else {
		return true;
	}
}

var check;	
function validateRemove() {
	
	if(check != true) {
		event.preventDefault();
		swal({
		  title: '<b>Confirm Remove Entry</b>',
		  type: 'info',
		  text: "Are you sure you want to remove this entry?",
		  showCloseButton: true,
		  showCancelButton: true,
		  confirmButtonText:
			'YES',
		  cancelButtonText:
			'Cancel'
		});
		$('#thisButton').click(function(){
			check = true;
			document.getElementById('rem').click();
		});
		
	} else {
		return true;
	}
}

var check;	
function validateRestore() {
	
	if(check != true) {
		event.preventDefault();
		swal({
		  title: '<b>Confirm Restore Entry</b>',
		  type: 'info',
		  text: "Are you sure you want to restore this entry?",
		  showCloseButton: true,
		  showCancelButton: true,
		  confirmButtonText:
			'YES',
		  cancelButtonText:
			'Cancel'
		});
		$('#thisButton').click(function(){
			check = true;
			document.getElementById('edBtn').click();
		});
		
	} else {
		return true;
	}
}