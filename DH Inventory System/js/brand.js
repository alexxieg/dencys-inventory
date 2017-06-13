var check;
function validateForm() {
	if(document.getElementById('addBrandID').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter brand ID.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBrandID').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addBrandID').value.length < 3){
		swal({
		title: "Warning!",
		text: "The brand ID should atleast have 3 characters",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBrandID').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addBrandName').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter brand name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBrandName').style.borderColor = "red";
		return false;
	}
	if(check != true) {
		event.preventDefault();
		swal({
		  title: '<b>Confirm New Brand</b>',
		  type: 'info',
		  text: "Are you sure you want to add this brand?",
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
	if(document.getElementById('addBrandID').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter brand ID.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBrandID').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addBrandID').value.length < 3){
		swal({
		title: "Warning!",
		text: "The brand ID should atleast have 3 characters",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBrandID').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addBrandName').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter brand name.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addBrandName').style.borderColor = "red";
		return false;
	}
	if(check != true) {
		event.preventDefault();
		swal({
		  title: '<b>Confirm Update Brand</b>',
		  type: 'info',
		  text: "Are you sure you want to update this brand?",
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