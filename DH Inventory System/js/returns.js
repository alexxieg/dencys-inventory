function validateForm() {
	if (document.getElementById('addQty').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Quantity.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addQty').style.borderColor = "red";
		return false;
	}
	if(confirm('Are you sure you want to add this entry?')) {
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

		 
function test(){
	BootstrapDialog.show({
				title: 'Sign In',
				message: 'Your sign-in form goes here.',
				cssClass: 'login-dialog',
				buttons: [{
					label: 'Sign In Now!',
					cssClass: 'btn-primary',
					action: function(dialog){
						dialog.close();
					}
				}]
			});
	}
