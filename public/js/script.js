$(function () {
    $('.parent').click(function () {
        $(this).siblings('.child').slideToggle('fast');
    });
});
/////////////////////////////
$(document).ready(function () {
    $('.alert-success').fadeIn().delay(3000).fadeOut();
});
$(document).ready(function () {
    $('.alert-warning').fadeIn().delay(3000).fadeOut();
});
//////////////////////////////////


