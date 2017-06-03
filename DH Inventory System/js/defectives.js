function validateForm() {	
	if (document.getElementById('addQty').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter PO Number.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addQty').style.borderColor = "red";
		return false;
	}else{
        document.getElementById('addQty').style.borderColor = "lightblue";
	}
	
	if(confirm('Are you sure you want to update this entry?')) {
		return true;		
	}
	else {
		swal({
		title: "Adding of Entry Canceled",
		type: "success"
		});
		return false;		
	}
}

function regroup(i,rc,ti){
	for(j = (i+1);j<rc;j++){
		document.getElementById(ti).rows[j].cells[1].innerHTML = j+1;
	}
}