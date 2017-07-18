$(document).ready(function(){
    $('.field-registrationform-person_type .radio input').change(function(){
    if ($(this).val() == 2) {
        $('.field-registrationform-company').show();
    } else {
        $('.field-registrationform-company').hide();
    }
    });
});