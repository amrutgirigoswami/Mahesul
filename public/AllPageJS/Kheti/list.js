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
            {
                data: "id",
            },
            {
                data: "account_id",
            },
            {
                data: "account_holder_name",
            },
            {
                data: "mulatvi",
            },
            {
                data: "sarkari",
            },
            {
                data: "local",
            },
            {
                data: "farti",
            },
            {
                data: "total",
            },
            {
                data: "chhut",
            },
            {
                data: "past_jadde",
            },
            {
                data: "status",
            },
            {
                data: "actions",

            },
        ],
        columnDefs: [
            {
                width: "50px",
                targets: 0,
                title: "#",
            },
            {
                width: "75px",
                targets: 1,

            },
            {
                width: "300px",
                targets: 2,

            },
            {
                width: "75px",
                targets: 3,

            },

            {
                width: "75px",
                targets: 4,


            },
            {
                width: "75px",
                targets: 5,

            },
            {
                width: "75px",
                targets: 6,

            },
            {
                width: "75px",
                targets: 7,

            },
            {
                width: "75px",
                targets: 8,

            },
            {
                width: "120px",
                targets: 9,

            },
            {
                width: "75px",
                targets: 10,

            },
            {
                width: "75px",
                targets: 11,

            },

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
                //toastr.error(response.message);
                $.each(response.errors, function (key, err_value) {
                    toastr.error(err_value.message);
                });
            }
            if (response.status == 200) {
                toastr.success(response.message);
            }
        }
    });

});

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
                    $("#userTable").DataTable().ajax.reload();
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
                    $("#userTable").DataTable().ajax.reload();
                    toastr.info("User Deleted Successfully");
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