function validateForm() {
	if (document.getElementById('addQty').value == "") {
		alert('Please Enter Quantity');
		document.getElementById('addQty').style.borderColor = "red";
		return false;
	}
	if(confirm('Are you sure you want to add this entry?')) {
		alert("Returned Product Successfully Added");
		return true;			
	}
	else {
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
