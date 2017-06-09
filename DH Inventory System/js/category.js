function validateForm() {
	if(document.getElementById('addCategoryID').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter a category ID.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addCategoryID').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('addCategoryID').value.length < 3){
		swal({
		title: "Warning!",
		text: "The category ID should have 3 characters.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addCategoryID').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('addCategoryName').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter category name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addCategoryName').style.borderColor = "red";
		return false;
	}

	if(confirm('Are you sure you want to add this category?')) {
		return true;	
	}
	else {
		swal({
		title: "Adding of category cancelled",
		type: "success"
		});
		return false;		
	}
}

function validateForm2() {
	if(document.getElementById('addCategoryID').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter category ID.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addCategoryID').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('addCategoryID').value.length < 3){
		swal({
		title: "Warning!",
		text: "The category ID should have 3 characters.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addCategoryID').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('addCategoryName').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter category name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addCategoryName').style.borderColor = "red";
		return false;
	}
	
	if(confirm('Are you sure you want to update this category?')) {
		return true;	
	}
	else {
		swal({
		title: "Updating of category cancelled",
		type: "success"
		});
		return false;		
	}
}