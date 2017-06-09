var check;
function validateForm() {
	if(document.getElementById('addBranchName').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Branch Name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBranchName').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addBranchName').value.length < 3){
		swal({
		title: "Warning!",
		text: "The Branch Name should have more than 2 characters",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBranchName').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addBranchLoc').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Branch Location.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBranchLoc').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addBranchLoc').value.length < 3){
		swal({
		title: "Warning!",
		text: "The Branch Location should have more than 2 characters",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBranchLoc').style.borderColor = "red";
		return false;
	}
	if(check != true) {
		event.preventDefault();
		swal({
		  title: '<i>Add New Branch</u>',
		  type: 'info',
		  text: "Are you sure you want to add the entry/s?.",
		  showCloseButton: true,
		  showCancelButton: true,
		  confirmButtonText:
			'<button id="thisButton">YES</button>',
		  cancelButtonText:
			'<button>Cancel</button>'
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
		text: "Please Enter Branch Name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addEntry').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addEntry').value.length < 3){
		swal({
		title: "Warning!",
		text: "The Branch Name should have more than 2 characters",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addEntry').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addEntrys').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Branch Location.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addEntrys').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addEntrys').value.length < 3){
		swal({
		title: "Warning!",
		text: "The Branch Location should have more than 2 characters",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addEntrys').style.borderColor = "red";
		return false;
	}
	if(confirm('Are you sure you want to update this entry?')) {
		alert("New Branch Successfully Added");
		return true;	
	}
	else {
		swal({
		title: "Update Canceled",
		type: "success"
		});
		return false;		
	}
}