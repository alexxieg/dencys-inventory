function validateForm() {
	if(document.getElementById('addRcpt').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Receipt no.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addRcpt').style.borderColor = "red";
		return false;
	}else{
        document.getElementById('addRcpt').style.borderColor = "blue";
	}
	
	if (document.getElementById('addRcptDate').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Receipt Date.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addRcptDate').style.borderColor = "red";
		return false;
	}else{
        document.getElementById('addRcptDate').style.borderColor = "blue";
	}
	
	if (document.getElementById('supplierName').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Supplier.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('supplierName').style.borderColor = "red";
		return false;
	}else{
        document.getElementById('supplierName').style.borderColor = "blue";
	}
	
	if (document.getElementById('addInQty').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Quantity.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addInQty').style.borderColor = "red";
		return false;
	}else{
        document.getElementById('addInQty').style.borderColor = "blue";
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

function addRow(dataTable) {
	var table = document.getElementById(dataTable);
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