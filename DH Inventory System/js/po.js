var check;
function validateForm2() {
	if (document.getElementById('addSupplier').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter supplier.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addSupplier').style.borderColor = "red";
		return false;
	}else{
        document.getElementById('addSupplier').style.borderColor = "lightblue";
	}
	if(check != true) {
		event.preventDefault();
		swal({
		  title: '<b>Confirm New Entry</b>',
		  type: 'info',
		  text: "Are you sure you want to add this entry?.",
		  showCloseButton: true,
		  showCancelButton: true,
		  confirmButtonText:
			'YES',
		  cancelButtonText:
			'CANCEL'
		});
		$('#thisButton').click(function(){
			check = true;
			document.getElementById('sucBtn').click();
		});
		
	} else {
		return true;
	}
	
}

var edit;
function validateForm() {	
	if (document.getElementById('addPO').value == "") {
		swal({
		title: "Warning!",
		text: "Please enter PO number.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addPO').style.borderColor = "red";
		return false;
	}else{
        document.getElementById('addPO').style.borderColor = "lightblue";
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
	}else{
        document.getElementById('addSupplier').style.borderColor = "lightblue";
	}
	
	if(edit != true) {
		event.preventDefault();
		swal({
		  title: '<b>Confirm New Entry</b>',
		  type: 'info',
		  text: "Are you sure you want to add this entry?.",
		  showCloseButton: true,
		  showCancelButton: true,
		  confirmButtonText:
			'<button id="thisButton" class="btn-success">YES</button>',
		  cancelButtonText:
			'<button class="btn-danger">CANCEL</button>'
		});
		$('#thisButton').click(function(){
			edit = true;
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
						text: "Cannot delete all rows.",
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