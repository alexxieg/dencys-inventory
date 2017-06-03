function validateForm() {
	if(document.getElementById('addBranchName').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Branch Name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBranchID').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('addBranch').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Branch Name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBranch').style.borderColor = "red";
		return false;
	}
	
	if(confirm('Are you sure you want to add this entry?')) {
		return true;	
	}
	
	else {
		swal({
		title: "Adding of Branch Cancelled",
		type: "success"
		});
		return false;		
	}
}