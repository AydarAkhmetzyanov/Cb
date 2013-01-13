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
    "/client/billing/settings/test",
    $("#testForm").serialize(),
    function (data) {
        $('#testResult').html(data);
    },
    "text"
   );
}