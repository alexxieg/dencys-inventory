var check;
function validateForm() {	
	if (document.getElementById('addQty').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter quantity.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addQty').style.borderColor = "red";
		return false;
	}else{
        document.getElementById('addQty').style.borderColor = "lightblue";
	}
	
	if(check != true) {
		event.preventDefault();
		swal({
		  title: '<b>Confirm Add Defective</b>',
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

function regroup(i,rc,ti){
	for(j = (i+1);j<rc;j++){
		document.getElementById(ti).rows[j].cells[1].innerHTML = j+1;
	}
}