function validateForm() {
	if(!$(".chixbox").is(":checked")) {
		event.preventDefault(); 
		swal({
		title: "Warning!",
		text: "No item was selected. Please select an item to be reordered.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		return false;

	} else {
		return true;	
	}
}