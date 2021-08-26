$(function () {
    $('.parent').click(function () {
        $(this).siblings('.child').slideToggle('fast');
    })
});
/////////////////////////////
$(document).ready(function () {
    $('.alert-success').fadeIn().delay(3000).fadeOut();
});
$(document).ready(function () {
    $('.alert-warning').fadeIn().delay(3000).fadeOut();
});
//////////////////////////////////
function deleteItem(event) {
    event.preventDefault();
    Swal.fire({
        title: 'آیا مطمئن هستید این ایتم حذف شود؟',
        icon: 'error',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'بله حذف کن!',
        cancelButtonText: 'خیر',
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-item').submit()
        }
    })
}

