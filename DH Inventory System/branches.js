function validateForm() {
	if(document.getElementById('addBranchID').value == "") {
		swal({
		title: "Error!",
		text: "Please Enter Branch ID.",
		type: "error",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBranchID').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addBranch').value == "") {
		swal({
		title: "Error!",
		text: "Please Enter Branch Name.",
		type: "error",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBranch').style.borderColor = "red";
		return false;
	}
	if(confirm('Are you sure you want to add this entry?')) {
		alert("New Branch Successfully Added");
		return true;	
	}
	else {
		swal({
		title: "Adding of Branch Canceled",
		type: "success"
		});
		return false;		
	}
}