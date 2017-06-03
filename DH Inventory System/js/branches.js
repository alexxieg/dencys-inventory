function validateForm() {
	if(document.getElementById('addBranchName').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Branch ID.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBranchName').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addBranchLoc').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Branch Name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBranchLoc').style.borderColor = "red";
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