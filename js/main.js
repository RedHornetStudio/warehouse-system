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