$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $(document).on('submit', '.ajax-form', function (e) {
        e.preventDefault()
        $(".loader").show()

        let $this = $(this);
        let formData = new FormData(this);

        $this.find(".has-danger").removeClass('has-error');
        $this.find(".form-errors").remove();

        $.ajax({
            type: $this.attr('method'),
            url: $this.attr('action'),
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            success: function (response) {
                successResponseProcess(response, true, true)
            },

            error: function (response) {
                errorResponseProcess(response, true, true)
            }
        })
    })


})

function successResponseProcess(response,modalHide, dbReload) {
    $(".loader").hide();

    if(response.status == "success"){


        if(modalHide){
            $("#myModal").modal('hide');
            $("#largeModal").modal('hide');
            $("#extraLargeModal").modal('hide');

        }
        if(dbReload){
            if ($("#dataGrid").length && $.fn.DataTable.isDataTable("#dataGrid")) {
                $("#dataGrid").DataTable().ajax.reload();
            }
        }
    }
    if (response.hasOwnProperty('status') && (response.status === 'error' || response.status === 'warning' || response.status === 'info')) {

        $(".loader").hide();
        if (response.status === 'error') {

        } else if (response.status === 'warning') {

        } else if (response.status === 'info') {

        } else {
            // Handle other alert types or defaults here
        }
    }
}

function errorResponseProcess(response, modalHide, dbReload) {
    $(".loader").hide()
    if (response.status === 500) {
        let error = JSON.parse(response.responseText);

    } else if (response.status === 503) {

    } else {
        let data = JSON.parse(response.responseText);
        console.log(data.errors)
        $.each(data.errors, (key, value) => {
            $("[name^=" + key + "]").parent().addClass('text-danger')
            $("[name^=" + key + "]").parent().append('<small class="text-danger text-danger form-errors">' + value[0] + '</small>');
            console.log($("[name^=" + key + "]").parent());
        })
    }
}
