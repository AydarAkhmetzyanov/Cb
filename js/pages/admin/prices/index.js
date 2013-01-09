function addNumber(){
    $.post(
   "/admin/prices/ajax_addnumber",
   $("#addNumberForm").serialize(),
   onAddNumber,
   "text"
   );
}

function onAddNumber(data)
{
    var appendhtml = '<tr><td>'+$('#addedNumber').attr('value')+'</td><td>'+$('#addedPrice').attr('value')+'</td><td></td><td></td></tr>';
    $('#addedNumber').attr('value','');
    $('#addedPrice').attr('value','');
    $("#numbersTableBody").prepend(appendhtml);
}

function saveNumber(id,element){
    $.post(
   "/admin/prices/ajax_savenumber",
   $("#number" + id).serialize(),
   function (data) {
       $(element).hide("slow");
   },
   "text"
   );
}

function deleteNumber(id){
    var jqxhr = $.get("/admin/prices/ajax_deletenumber/" + id, function (data) {
        $('#numberRow' + id).remove();
    });
}