var check;
function validateForm() {
	if(document.getElementById('adduser').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter username.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('adduser').style.borderColor = "red";
		return false;
	} else if (document.getElementById('adduser').value == " "){
		swal({
		title: "Warning!",
		text: "Please enter username.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('adduser').style.borderColor = "red";
		return false;
	}   else if (document.getElementById('adduser').value.length < 6){
		swal({
		title: "Warning!",
		text: "The username should have more than 5 characters.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('adduser').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('addpass').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter password.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addpass').style.borderColor = "red";
		return false;
	} else if (document.getElementById('addpass').value == " ") {
		swal({
		title: "Warning!",
		text: "Please enter password.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addpass').style.borderColor = "red";
		return false;
	} else if (document.getElementById('addpass').value.length < 6) {
		swal({
		title: "Warning!",
		text: "The password length should at least be 6.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addpass').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('addpassconf').value == "") {
		swal({
		title: "Warning!",
		text: "Please confirm password.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addpassconf').style.borderColor = "red";
		return false;
	}
	
	var pass1 = document.getElementById("addpass").value;
    var pass2 = document.getElementById("addpassconf").value;
    var ok = true;
    if (pass1 != pass2) {
        swal({
		title: "Error!",
		text: "Password does not match.",
		type: "error",
		confirmButtonText: "Ok"
		});
        document.getElementById("addpass").style.borderColor = "#E34234";
        document.getElementById("addpassconf").style.borderColor = "#E34234";
        return false;
    }
	
	if (document.getElementById('addpass').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter password.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addpass').style.borderColor = "red";
		return false;
	}
	
	if(check != true) {
		event.preventDefault();
		swal({
		  title: '<b>Confirm New Account</b>',
		  type: 'info',
		  text: "Are you sure you want to add this entry?",
		  showCloseButton: true,
		  showCancelButton: true,
		  confirmButtonText:
			'YES',
		  cancelButtonText:
			'Cancel'
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
	if(document.getElementById('addEntry').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter username.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addEntry').style.borderColor = "red";
		return false;
	}   
	
	if (document.getElementById('addEntry').value.length < 6){
		swal({
		title: "Warning!",
		text: "The username should have more than 5 characters",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addEntry').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('addEntrys').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter password.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addEntrys').style.borderColor = "red";
		return false;	
	} 
	
	if (document.getElementById('addEntrys').value.length < 6) {
		swal({
		title: "Warning!",
		text: "The password length should at least be 6.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addEntrys').style.borderColor = "red";
		return false;
	}
	
	if(check != true) {
		event.preventDefault();
		swal({
		  title: '<b>Confirm New Entry</b>',
		  type: 'info',
		  text: "Are you sure you want to update this entry?",
		  showCloseButton: true,
		  showCancelButton: true,
		  confirmButtonText:
			'YES',
		  cancelButtonText:
			'Cancel'
		});
		$('#thisButton').click(function(){
			check = true;
			document.getElementById('sucBtn').click();
		});
		
	} else {
		return true;
	}
}