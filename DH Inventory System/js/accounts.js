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
	
	if(confirm('Are you sure you want to add this account?')) {
		return true;	
	}
	else {
		swal({
		title: "Adding of account cancelled",
		type: "success"
		});
	return false;		
	}
}

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
	
	if(confirm('Are you sure you want to add this account?')) {
		return true;	
	}
	else {
		swal({
		title: "Editing of account cancelled",
		type: "success"
		});
	return false;		
	}
}