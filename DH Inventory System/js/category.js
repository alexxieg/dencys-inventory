var check;
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

	if(check != true) {
		event.preventDefault();
		swal({
		  title: '<b>Confirm New Category</b>',
		  type: 'info',
		  text: "Are you sure you want to add this category?",
		  showCloseButton: true,
		  showCancelButton: true,
		  confirmButtonText:
			'YES',
		  cancelButtonText:
			'CANCEL'
		});
		$('#thisButton').click(function(){
			check = true;
			document.getElementById('sucBtn').click();
		});
		
	} else {
		return true;
	}
}

var check;
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
	
	if(check != true) {
		event.preventDefault();
		swal({
		  title: '<b>Confirm Update Category</b>',
		  type: 'info',
		  text: "Are you sure you want to update this category?",
		  showCloseButton: true,
		  showCancelButton: true,
		  confirmButtonText:
			'YES',
		  cancelButtonText:
			'CANCEL'
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
		  title: 'Confirm Remove Category',
		  text: "Are you sure you want to remove this category?",
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
		  title: 'Confirm Restore Category',
		  text: "Are you sure you want to restore this category?",
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