function validateForm() {
	if (document.getElementById('prod').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter product.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('prod').style.borderColor = "red";
		return false;
	}
	
	if (document.getElementById('addQty').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter quantity.",
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
		title: "Adding of entry cancelled.",
		type: "success"
		});
		return false;		
	}
}

var check;
function validateForm2() {
	if (document.getElementById('prod').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter product.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('prod').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addQty').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter quantity.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addQty').style.borderColor = "red";
		return false;
	}
	if (document.getElementById('addSupplier').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter supplier.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addSupplier').style.borderColor = "red";
		return false;
	}
	if(check != true) {
		event.preventDefault();
		swal({
		  title: '<b>Confirm New Entry</b>',
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

function validateForm3() {
	if(confirm('Are you sure you want to update this entry?')) {
		return true;			
	}
	else {
		swal({
		title: "Updating of entry cancelled",
		type: "success"
		});
		return false;		
	}
}

var check;
function validateForm4() {
	if (document.getElementById('addSupplier').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter supplier.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addSupplier').style.borderColor = "red";
		return false;
	}
	
	if(check != true) {
		event.preventDefault();
		swal({
		  title: '<b>Confirm New Supplier Returns</b>',
		  type: 'info',
		  text: "Are you sure you want to add this entry/s?",
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
function validateForm5() {
	if (document.getElementById('addSupplier').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter supplier.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addSupplier').style.borderColor = "red";
		return false;
	}
	
	if(check != true) {
		event.preventDefault();
		swal({
		  title: '<b>Confirm Update Supplier Returns</b>',
		  type: 'info',
		  text: "Are you sure you want to update this entry/s?",
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

function deleteRow(tableID) {
	try {
		var table = document.getElementById(tableID);
		var rowCount = table.rows.length;
		var current = '';
		for(var i=0; i<rowCount; i++) {
			var row = table.rows[i];
			var chkbox = row.cells[0].childNodes[0];
			if(null != chkbox && true == chkbox.checked) {
				if(rowCount <= 2) {
					swal({
		title: "Error!",
		text: "Cannot delete all Rows",
		type: "error",
		confirmButtonText: "Ok"
		});
					break;
				}
					  
				table.deleteRow(i);
				rowCount--;
				i--;
			  regroup(i,rowCount,tableID);
			}
		}
	}catch(e) {
		alert(e);
	}
}

function addRow(dataTable) {
	var table = document.getElementById(dataTable);
	var rowCount = table.rows.length;
	var row = table.insertRow(rowCount);
	var colCount = table.rows[1].cells.length;
	for(var i=0; i<colCount; i++) {
		var newcell = row.insertCell(i);
		if(i==99999999){
			newcell.innerHTML = table.rows[1].cells[i].innerHTML;
		}
		else{
			newcell.innerHTML = table.rows[1].cells[i].innerHTML;
		}
		switch(newcell.childNodes[0].type) {
			case "text":
			newcell.childNodes[0].value="";
			break;
			case "checkbox":
			newcell.childNodes[0].checked = false;
			break;
			case "select-one":
			newcell.childNodes[0].selectedIndex = 0;
			break;
		}
	}
	$('.thisProduct').autocomplete({
		minLength:2,
		source: "search.php"
	});	
}
			
function regroup(i,rc,ti){
	for(j = (i+1);j<rc;j++){
//		document.getElementById(ti).rows[j].cells[1].innerHTML = j+1;
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
