$(document).ready(function () {
    countrySelected();


});

function countrySelected(){
    $.get("/price/getNumbers/" + $('#countrySelect').val(), function (data) {
        renderNumberTable(jQuery.parseJSON(data));
    });
}

function renderNumberTable(data){
    $("#numbersTBody").html('');
	var appendhtml;
	$.each(data, function (key, value) {
	    if (key == 0) {
	        numberSelected(value.number);
	    }
	    appendhtml = '<tr onclick="numberSelected(' + value.number + ')" class="numberSelect"><td>' + value.number + '</td><td>~ ' + value.price / 100 + ' руб.</td></tr>';
	    $("#numbersTBody").append(appendhtml);
	});
}

function numberSelected(number){
    $.get("/price/getPrices/" + number, function (data) {
        $('#numberSpan').html(number);
        renderPricesTable(jQuery.parseJSON(data));
    });
}

function renderPricesTable(data){
    $("#pricesTBody").html('');
	var appendhtml;
	$.each(data, function(key, value) {
	    appendhtml='<tr><td>'+value.operator_short_name+'</td><td>'+value.cost /100+' руб.</td><td>'+((value.share/100)*0.85).toFixed(2)+' руб.</td><td>'+((value.share/100)*0.88).toFixed(2)+' руб.</td><td>'+((value.share/100)*0.90).toFixed(2)+' руб.</td></tr>';
		$("#pricesTBody").append(appendhtml);
    });
}