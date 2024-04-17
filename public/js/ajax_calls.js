function handleAddEvent(form , rerouteUrl, formMethod ) {
    'use strict';
    // Datepicker
    $('.fc-datepicker').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true
    });


        $.ajax({
            url: form.attr('action'),
            type: formMethod,
            data: form.serialize(),
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}'
            },
            success: function (data) {

                if ($.isEmptyObject(data.error)) {

                    $('#success-alert').addClass('alert alert-success alert-dismissible').fadeIn().html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Success!</h4>Action Performed Successfully.');
                    setTimeout(function () {
                        $('#success-alert').fadeOut('slow');
                    }, 5000);
                    //route back to index
                    setTimeout(function () {
                        window.location.href = rerouteUrl;
                    }, 2000);

                } else {
                    printErrorMsg(data.error);
                }
            }
        });

}

function handleDriverAddEvent(form, redirectUrl, formMethod) {
    $.ajax({
        url: form.attr('action'),
        type: formMethod,
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        data: new FormData(form[0]),
        processData: false,
        contentType: false,
        success: function (resp) {
            if ($.isEmptyObject(resp.error)) {

                $('#success-alert').addClass('alert alert-success alert-dismissible').fadeIn().html
                ('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Success!</h4>Action Performed Successfully.');
                setTimeout(function () {
                    $('#success-alert').fadeOut('slow');
                }, 5000);
                //route back to index
                setTimeout(function () {
                    window.location.href = redirectUrl;
                }, 2000);

            } else {
                printErrorMsg(resp.error);
            }
        }
    });
}

function printErrorMsg(msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display', 'block');
    $.each(msg, function (key, value) {
        $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
    });
}
