function modalAjaxSubmit(strUrl, objData, modalID, submitBtnID, redirectUrl, successMsgTitle, successMsg, formMethod) {
    successMsgTitle = successMsgTitle || 'Success!';
    successMsg = successMsg || 'Action Performed Successfully.';
    redirectUrl = redirectUrl === undefined ? -1 : redirectUrl;
    formMethod = formMethod || 'POST';

    var myModal = $('#' + modalID);

    $.ajax({
        method: formMethod,
        url: strUrl,
        data: objData,
        success: function (success) {
            myModal.find('.form-group').removeClass('has-error');
            var successHTML = '<button type="button" id="close-success-alert" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> ' + successMsgTitle + '</h4>' + successMsg;
            myModal.find('#success-alert').addClass('alert alert-success alert-dismissible').fadeIn().html(successHTML);

            // Hide modal after 5 seconds
            window.setTimeout(function () { myModal.modal('hide'); }, 5000);

            // Hide success alert after 5 seconds
            window.setTimeout(function () { myModal.find("#success-alert").fadeOut('slow'); }, 5000);

            // Hide submit button after success action
            myModal.find("#" + submitBtnID).hide();

            // Redirect after success action on modal hide(close)
            myModal.on('hidden.bs.modal', function () {
                if (redirectUrl !== -1) {
                    window.location.href = redirectUrl;
                }
            });
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                var errors = xhr.responseJSON;
                myModal.find('.form-group').removeClass('has-error');
                var errorsHTML = '<button type="button" id="close-invalid-input-alert" class="close" aria-hidden="true">&times;</button><h4><i class="icon fa fa-ban"></i> Invalid Input(s)!</h4><ul>';
                $.each(errors, function (key, value) {
                    errorsHTML += '<li>' + value + '</li>';
                    myModal.find('#' + key).closest('.form-group').addClass('has-error');
                });
                errorsHTML += '</ul>';

                myModal.find('#invalid-input-alert').addClass('alert alert-danger alert-dismissible').fadeIn().html(errorsHTML);

                // Auto-close alert after 7 seconds
                window.setTimeout(function () { myModal.find("#invalid-input-alert").fadeOut('slow'); }, 7000);

                // Close btn click
                myModal.find('#close-invalid-input-alert').on('click', function () {
                    myModal.find("#invalid-input-alert").fadeOut('slow');
                });
            }
        }
    });
}

function modalFormDataSubmit(strUrl, formName, modalID, submitBtnID, redirectUrl, successMsgTitle, successMsg, formMethod) {
    successMsgTitle = successMsgTitle || 'Success!';
    successMsg = successMsg || 'Action Performed Successfully.';
    redirectUrl = redirectUrl === undefined ? -1 : redirectUrl;
    formMethod = formMethod || 'POST';

    const myModal = $('#' + modalID),
        csrfToken = myModal.find('input[name=_token]').val(),
        oData = new FormData(document.forms.namedItem(formName));

    $.ajax({
        method: formMethod,
        url: strUrl,
        data: oData,
        dataType: 'json',
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function (success) {
            myModal.find('.form-group').removeClass('has-error');
            var successHTML = '<button type="button" id="close-success-alert" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> ' + successMsgTitle + '</h4>' + successMsg;
            myModal.find('#success-alert').addClass('alert alert-success alert-dismissible').fadeIn().html(successHTML);

            // Hide modal after 5 seconds
            window.setTimeout(function () { myModal.modal('hide'); }, 5000);

            // Hide success alert after 5 seconds
            window.setTimeout(function () { myModal.find("#success-alert").fadeOut('slow'); }, 5000);

            // Hide submit button after success action
            myModal.find("#" + submitBtnID).hide();

            // Redirect after success action on modal hide(close)
            myModal.on('hidden.bs.modal', function () {
                if (redirectUrl !== -1) {
                    window.location.href = redirectUrl;
                }
            });
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                const errors = xhr.responseJSON;
                myModal.find('.form-group').removeClass('has-error');
                let errorsHTML = '<button type="button" id="close-invalid-input-alert" class="close" aria-hidden="true">&times;</button><h4><i class="icon fa fa-ban"></i> Invalid Input(s)!</h4><ul>';
                $.each(errors, function (key, value) {
                    errorsHTML += '<li>' + value + '</li>';
                    myModal.find('#' + key).closest('.form-group').addClass('has-error');
                });
                errorsHTML += '</ul>';

                myModal.find('#invalid-input-alert').addClass('alert alert-danger alert-dismissible').fadeIn().html(errorsHTML);

                // Auto-close alert after 7 seconds
                window.setTimeout(function () { myModal.find("#invalid-input-alert").fadeOut('slow'); }, 7000);

                // Close btn click
                myModal.find('#close-invalid-input-alert').on('click', function () {
                    myModal.find("#invalid-input-alert").fadeOut('slow');
                });
            }
        }
    });
}

// Add modal reposition
function reposition() {
    var modal = $(this),
        dialog = modal.find('.modal-dialog');
    modal.css('display', 'block');

    // Dividing by two centers the modal exactly, but dividing by three or four works better for larger screens.
    dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));
}
