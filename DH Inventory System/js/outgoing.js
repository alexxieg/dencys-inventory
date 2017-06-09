function validateForm() {
	if (document.getElementById('prods').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Product.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('prods').style.borderColor = "red";
		return false;
	}else{
        document.getElementById('prods').style.borderColor = "blue";
	}
	
	if (document.getElementById('addOutQty').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Quantity.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addOutQty').style.borderColor = "red";
		return false;
	}
	
	if(confirm('Are you sure you want to add this entry?')) {
		return true;		
	}
	else {
		swal({
		title: "Adding of Entry Cancelled",
		type: "success"
		});
		return false;		
	}
}

function validateForm2() {
	if (document.getElementById('prod').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Product.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('prod').style.borderColor = "red";
		return false;
	}else{
        document.getElementById('prod').style.borderColor = "blue";
	}
	
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
	
	if(confirm('Are you sure you want to update this entry?')) {
		return true;		
	}
	else {
		swal({
		title: "Adding of Entry Cancelled",
		type: "success"
		});
		return false;		
	}
}
var check;
function validateForm3() {	
	if(check != true) {
		event.preventDefault();
		swal({
		  title: '<i>Product Issuance</u>',
		  type: 'info',
		  text: "Are you sure you want to add the entry/s?.",
		  showCloseButton: true,
		  showCancelButton: true,
		  confirmButtonText:
			'<button id="thisButton">YES</button>',
		  cancelButtonText:
			'<button>Cancel</button>'
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
				if(rowCount <= 1) {
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

function addRow(tableID) {
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	var row = table.insertRow(rowCount);
	var colCount = table.rows[1].cells.length;
	for(var i=0; i<colCount; i++) {
		var newcell = row.insertCell(i);
		if(i==1){
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
		document.getElementById(ti).rows[j].cells[1].innerHTML = j+1;
	}
}