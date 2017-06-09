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

	if(confirm('Are you sure you want to update this branch?')) {
		alert("Updated branch successfully!");
		return true;	
	}
	else {
		swal({
		title: "Update Cancelled",
		type: "success"
		});
		return false;		
	}
}