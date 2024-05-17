
$.fn.digits = function(){
    return this.each(function(){
        $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, ",") );
    })
};

$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /*Delete*/
    $('.btnDelete').on('click', function () {
        var id = $(this).data('id');
        var route = $(this).data('route');
        swal({
            title: "مطمئنی ؟؟",
            text: "میخوای این فایل رو پاک کنی؟؟",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "بله . پاکش کن!",
            cancelButtonText: "نه  . بیخیال!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: route,
                    type: 'DELETE',
                    data: id,
                    success: function (data) {
                        if ((data.success)) {
                            $('.item' + data.id).remove();
                            $('.Dlt').each(function (index) {
                                $(this).html(index + 1);
                            });
                            swal("پاک شد!", "فایل با موفقیت پاک شد", "success");
                        } else if (data.error) {
                            swal("خطا!!", data.message, "error");
                        }
                    }
                });
            } else {
                swal("لغو شد", "حذف متوقف شد", "info");
            }
        });
    });
    /*Delete*/

    /*Create Product Category*/
    var parent = $('#parent_id').val();
    if (parent =! '0'){
        $('#menu_id').fadeOut();
    }
    $('#parent_id').on('change',function () {
        var category = $(this).val();

        if (category == '0'){
            $('#select_menu_id').removeAttr('disabled');
            $('#menu_id').slideDown();
        }else {
            $('#select_menu_id').attr('disabled', 'disabled');
            $('#menu_id').slideUp();
        }
    });
    /*Create Product Category*/


    if ($(".description").val()){
        /*Count Description*/
        var description = $(".description").val();
        $(".count").text(description.length);
        /*Count Description*/
    }
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

/*Count Description*/
$(".description").on("input", function() {
    $(".count").text(this.value.length);
});
/*Count Description*/

/*Number format*/
function PriceNumber(Number)
{
    Number+= '';
    Number= Number.replace(',', ''); Number= Number.replace(',', ''); Number= Number.replace(',', '');
    Number= Number.replace(',', ''); Number= Number.replace(',', ''); Number= Number.replace(',', '');
    x = Number.split('.');
    y = x[0];
    z= x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(y))
        y= y.replace(rgx, '$1' + ',' + '$2');
    return y+ z;
}
/*Number format*/


/*Input MultiSelect*/
$('.select2').select2();
/*Input MultiSelect*/
