$(document).ready(function () {
    var userTable = $("#kheti_table").DataTable({
        searchDelay: 500,
        processing: true,
        serverSide: true,
        responsive: true,

        order: [[0, "desc"]],
        ajax: {
            url: listDataUrl,
            type: "POST",
            data: {
                // parameters for custom backend script demo
                _token: csrfToken,
            },

            error: function (jqXHR, ajaxOptions, thrownError) {
                if (jqXHR.status == 419) {
                    Swal.fire({
                        title: "Session Expired",
                        text: "You'll be take to the login page",
                        icon: "warning",
                        confirmButtonText: "Ok",
                        allowOutsideClick: false,
                        customClass: {
                            confirmButton: "btn btn-sm btn-success",
                        },
                    }).then(function (result) {
                        location.reload();
                    });
                }
            },
        },
        columns: [
            { data: "id", responsivePriority: -1, width: "50px" },
            { data: "account_id", width: "50px" },
            { data: "account_holder_name", responsivePriority: -1, width: "50px" },
            { data: "mulatvi", width: "50px" },
            { data: "sarkari", width: "50px" },
            { data: "local", width: "50px" },
            { data: "farti", width: "50px" },
            { data: "total", width: "50px" },
            { data: "chhut", width: "50px" },
            { data: "past_jadde", width: "50px" },
            { data: "status", width: "50px" },
            { data: "actions", width: "50px" },
        ],


    });

});

$('.CreateAccount').on("click", function () {
    var data = {
        account_id: $('#account_id').val(),
        account_holder_name: $('#account_holder_name').val(),
        mulatvi: $('#mulatvi').val(),
        sarkari: $('#sarkari').val(),
        local: $('#local').val(),
        farti: $('#farti').val(),
        total: $('#total').val(),
        chhut: $('#chhut').val(),
        past_jadde: $('#past_jadde').val(),
        _token: csrfToken,
    }
    $.ajax({
        type: "POST",
        url: createAccountUrl,
        data: data,
        dataType: "JSON",
        success: function (response) {

            if (response.status == 400) {
                $.each(response.message, function (key, err_value) {
                    toastr.error(err_value);
                });
            }
            if (response.status == 200) {
                $("#kheti_table").DataTable().ajax.reload();
                toastr.success(response.message);
                // $('#createAccount').modal('hide');
                $('#createAccount').find('input').val('');
                $('#mulatviTotal').html(response.data.mulatvi);
            }
        }
    });

});
$('.UpdateAccount').on("click", function () {
    var khetiID = $('#kheti_id').val();
    console.log(khetiID);
    var data = {
        account_id: $('.account_id').val(),
        account_holder_name: $('.account_holder_name').val(),
        mulatvi: $('.mulatvi').val(),
        sarkari: $('.sarkari').val(),
        local: $('.local').val(),
        farti: $('.farti').val(),
        total: $('.total').val(),
        chhut: $('.chhut').val(),
        past_jadde: $('.past_jadde').val(),
        _token: csrfToken,
    }
    $.ajax({
        type: "POST",
        url: "kheti/update/" + khetiID,
        data: data,
        dataType: "json",
        success: function (response) {
            // console.log(response);

            if (response.status == 400) {

                $.each(response.message, function (key, err_value) {
                    toastr.error(err_value);
                });
            }
            if (response.status == 200) {
                $("#kheti_table").DataTable().ajax.reload();
                toastr.success(response.message);
                $('#updateAccount').modal('hide');
                $('#updateAccount').find('input').val('');
            }
        }
    });
});
function UpdateAccount(e) {

    var KhetiID = $(e).attr("data-id");
    var dataUrl = $(e).attr("data-url");

    $.ajax({
        type: "GET",
        url: dataUrl,
        dataType: "json",
        success: function (response) {
            if (response.status == 200) {
                $('.account_id').val(response.kheti.account_id);
                $('.account_holder_name').val(response.kheti.account_holder_name);
                $('.mulatvi').val(response.kheti.mulatvi);
                $('.sarkari').val(response.kheti.sarkari);
                $('.local').val(response.kheti.local);
                $('.farti').val(response.kheti.farti);
                $('.total').val(response.kheti.total);
                $('.chhut').val(response.kheti.chhut);
                $('.past_jadde').val(response.kheti.past_jadde);
                $('#kheti_id').val(response.kheti.id);
            }
            else {
                console.log(response.status);
            }
        }
    });
}
var statusChangeAjax = null;
function statusChangeFunction(e) {
    var url = $(e).attr("data-url");
    var status = $(e).attr("data-status");
    Swal.fire({
        title: "Are you sure?",
        text: "You want to change status!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, change it!",
        customClass: {
            confirmButton: "btn btn-sm btn-success",
            cancelButton: "btn btn-sm btn-danger",
        },
    }).then(function (result) {
        if (result.value) {


            statusChangeAjax = $.ajax({
                method: "POST",
                url: url,
                data: {
                    status: status,
                    _token: csrfToken,
                },
                beforeSend: function () {
                    if (statusChangeAjax != null) {
                        statusChangeAjax.abort();
                    }
                },
                success: function (resultData) {
                    $("#kheti_table").DataTable().ajax.reload();
                    toastr.success("Status Change Successfully");
                },
                error: function (jqXHR, ajaxOptions, thrownError) {
                    if (jqXHR.status == 401 || jqXHR.status == 419) {
                        noData = true;
                        Swal.fire({
                            title: "Session Expired",
                            text: "You'll be take to the login page",
                            icon: "warning",
                            confirmButtonText: "Ok",
                            allowOutsideClick: false,
                            customClass: {
                                confirmButton: "btn btn-sm btn-success",
                            },
                        }).then(function (result) {
                            location.reload();
                        });
                    }
                }
            });
        }
    });
}

destroyFunctionAjax = null;
function destroyFunction(e) {
    var id = $(e).attr("data-id");
    var url = $(e).attr("data-url");

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        customClass: {
            confirmButton: "btn btn-sm btn-success",
            cancelButton: "btn btn-sm btn-danger",
        },
    }).then(function (result) {
        if (result.value) {

            destroyFunctionAjax = $.ajax({
                method: "POST",
                url: url,
                data: {
                    id: id,
                    _method: "delete",
                    _token: csrfToken,
                },
                beforeSend: function () {
                    if (destroyFunctionAjax != null) {
                        destroyFunctionAjax.abort();
                    }
                },
                success: function (resultData) {
                    $("#kheti_table").DataTable().ajax.reload();
                    toastr.info("Kheti Account Deleted Successfully");
                },
                error: function (jqXHR, ajaxOptions, thrownError) {
                    if (jqXHR.status == 401 || jqXHR.status == 419) {
                        console.log(jqXHR.status);
                        Swal.fire({
                            title: "Session Expired",
                            text: "You'll be take to the login page",
                            icon: "warning",
                            confirmButtonText: "Ok",
                            allowOutsideClick: false,
                            customClass: {
                                confirmButton: "btn btn-sm btn-success",
                            },
                        }).then(function (result) {
                            location.reload();
                            return false;
                        });
                    } else {

                        toastr.error(jqXHR.responseJSON.message);


                    }
                },
            });
        }
    });
}


function khetiCalculation() {
    var mulatvi = $('#mulatvi').val();
    var sarkari = $('#sarkari').val();

    var farti = $('#farti').val();


    var past_jadde = $('#past_jadde').val();

    var local = Math.ceil(sarkari / 2 / 0.05) * 0.05;

    $('#local').val(local.toFixed(2));

    var total = parseFloat(mulatvi) + parseFloat(sarkari) + parseFloat(farti) + parseFloat(local);

    $('#total').val(total.toFixed(2));
    $('#chhut').val(sarkari);
}

function updateKhetiCalculation() {

    var mulatvi = $('.mulatvi').val();
    var sarkari = $('.sarkari').val();

    var farti = $('.farti').val();




    var local = Math.ceil(sarkari / 2 / 0.05) * 0.05;
    $('.local').val(local.toFixed(2));

    var total = parseFloat(mulatvi) + parseFloat(sarkari) + parseFloat(farti) + parseFloat(local);

    $('.total').val(total);
    $('.chhut').val(sarkari);
}