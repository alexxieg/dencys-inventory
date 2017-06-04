function validateForm() {
	if(document.getElementById('addCategoryID').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Category ID.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addCategoryID').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addCategoryID').value.length < 3){
		swal({
		title: "Warning!",
		text: "The Category ID should have atleast 3 characters",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addCategoryID').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addCategoryName').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Category Name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addCategoryName').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addCategoryName').value.length < 3){
		swal({
		title: "Warning!",
		text: "The Category Name should have more than 2 characters",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addCategoryName').style.borderColor = "red";
		return false;
	}
	if(confirm('Are you sure you want to add this entry?')) {
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