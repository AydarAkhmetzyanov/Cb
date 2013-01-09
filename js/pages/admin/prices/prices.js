function addPrice(){
    $.post(
   "/admin/prices/prices/ajax_addprice",
   $("#addPrice").serialize(),
   onAddPrice,
   "text"
   );
}

function onAddPrice(data)
{
    var appendhtml = '<tr><td>'+$("#addedOperator option:selected").text()+'</td><td>'+$('#addedCost').attr('value')+'</td><td>'+$('#addedShare').attr('value')+'</td><td></td></tr>';
    $('#addedCost').attr('value','');
    $('#addedShare').attr('value','');
    $("#pricesTableBody").prepend(appendhtml);
}

function savePrice(id,element){
    $.post(
   "/admin/prices/prices/ajax_saveprice",
   $("#price" + id).serialize(),
   function (data) {
       $(element).hide("slow");
   },
   "text"
   );
}

function deletePrice(id){
    var jqxhr = $.get("/admin/prices/prices/ajax_deleteprice/" + id, function (data) {
        $('#priceRow' + id).remove();
    });
}