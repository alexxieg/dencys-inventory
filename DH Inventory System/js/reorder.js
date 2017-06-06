function validateForm() {
	if(!$(".chixbox").is(":checked")) {
		event.preventDefault(); 
		swal({
		title: "Warning!",
		text: "FU.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		return false;

	} else {
		swal({
		title: "OK",
		type: "success"
		});
		return true;	
	}
}