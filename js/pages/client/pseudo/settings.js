$(document).ready(function () {
    
});

function openStatic(){
    $('#dynamicParams').hide("slow");
    $('input[name="dynamicResponderURL"]').removeAttr("required");
}

function openDynamic(){
    $('#dynamicParams').show("slow");
    $('input[name="dynamicResponderURL"]').attr("required","required");
}

function testResponder(){
    $.post(
    "/client/pseudo/settings/test",
    $("#testForm").serialize(),
    function (data) {
        $('#testResult').html(data);
    },
    "text"
   );
}
	
	function start_text(){
    $.post(
    "/client/pseudo/settings/start_text",
    $("#start_text").serialize(),
    function (data) {
        $('#starttextResult').html(data);
    },
    "text"
   );
	}
	
	
	
		function cancel_new_text(){
    $.post(
    "/client/pseudo/settings/cancel_new_text",
    $("#cancel_new_text").serialize(),
    function (data) {
        $('#cancelnewtextResult').html(data);
    },
    "text"
   );
	}