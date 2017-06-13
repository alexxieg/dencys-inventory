function valRestoreFile() {
	if(document.getElementById('fileUpload').value == "") {
		swal({
		title: "Warning!",
		text: "Please Choose a File",
		type: "warning",
		confirmButtonText: "Ok"
		});
		return false;
	}
}