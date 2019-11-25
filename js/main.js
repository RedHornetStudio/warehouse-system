function colorLabel(elementId) {
    var labels = document.getElementsByTagName('label');
    for(var i = 0; i < labels.length; i++) {
        if(labels[i].htmlFor == elementId) {
            labels[i].style.color = "#ff5e5e";
        }
    }
}

function unColorLabel(elementId) {
    var labels = document.getElementsByTagName('label');
    for(var i = 0; i < labels.length; i++) {
        if(labels[i].htmlFor == elementId) {
            labels[i].style.color = "grey";
        }
    }
}

function deleteRow(productId) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText == 1) {
                document.getElementById(productId).remove();
                alert('product with id ' + productId + ' successfully deleted');
            } else {
                alert(this.responseText);
            }
        }
    };
    xhttp.open("POST", "delete.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id=" + productId);
}

function updateRow(productId) {
    document.getElementById('input_update_row').value = productId;
    document.getElementById('form_update_row').submit();
}