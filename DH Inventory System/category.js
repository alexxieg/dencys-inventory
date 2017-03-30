function validateForm() {
	if(document.getElementById('addCategoryID').value == "") {
		swal({
		title: "Error!",
		text: "Please Enter Category ID.",
		type: "error",
		confirmButtonText: "Ok"
		});
		document.getElementById('addCategoryID').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addCategoryName').value == "") {
		swal({
		title: "Error!",
		text: "Please Enter Category Name.",
		type: "error",
		confirmButtonText: "Ok"
		});
		document.getElementById('addCategoryName').style.borderColor = "red";
		return false;
	}
	if(confirm('Are you sure you want to add this entry?')) {
		alert("New Category Successfully Added");
		return true;	
	}
	else {
		swal({
		title: "Adding of Category Canceled",
		type: "success"
		});
		return false;		
	}
}