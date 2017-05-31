function validateForm() {
	if (document.getElementById('addSupplier').value == "") {
		swal({
		title: "Warning!",
		text: "Please Enter Supplier.",
		type: "warning",
		confirmButtonText: "Ok"
		});
		document.getElementById('addSupplier').style.borderColor = "red";
		return false;
	}else{
        document.getElementById('addSupplier').style.borderColor = "blue";
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
	}else{
        document.getElementById('addQty').style.borderColor = "blue";
	}
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
        document.getElementById('addQty').style.borderColor = "blue";
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

			var cell2 = row.insertCell(0);
            var element1 = document.createElement("input");
            element1.type = "number";
			element1.className = "form-control";
            element1.name = "qty[]";
			element1.id = "addQty";
			element1.min = "1";
			element1.placeholder = "Quantity";
            cell2.appendChild(element1);
			
            var cell1 = row.insertCell(0);
            var element0 = document.createElement("input");
            element0.type = "text";
			element0.className = "prodItem";
            element0.name = "prodItem[]";
			element0.id = "prod";
			element0.placeholder = "Product Name";
            cell1.appendChild(element0);
	
	$('.prodItem').autocomplete({
		minLength:2,
		source: "search.php"
	});
	
}
			
function regroup(i,rc,ti){
	for(j = (i+1);j<rc;j++){
		document.getElementById(ti).rows[j].cells[1].innerHTML = j+1;
	}
}