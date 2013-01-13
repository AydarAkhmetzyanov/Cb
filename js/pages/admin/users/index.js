function inSend(id,element){
    if(element.innerHTML!=1){
        var jqxhr = $.get("/admin/users/ajax_activatein/" + id, function (data) {
            element.innerHTML = '1';
        });
    }
}

function outSend(id,element){
    if(element.innerHTML!=1){
        var jqxhr = $.get("/admin/users/ajax_activateout/" + id, function (data) {
            element.innerHTML = '1';
        });
    }
}