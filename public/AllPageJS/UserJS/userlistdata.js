$(document).ready(function () {
    var userTable = $("#userTable").DataTable({
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
            beforeSend: function () {
                if (userTable != null) {
                    userTable.settings()[0].jqXHR.abort();
                }
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
                data: "full_name",
            },
            {
                data: "email",
            },
            {
                data: "contact_no",
            },
            {
                data: "status",
            },
            {
                data: "user_type",
            },
            {
                data: "created_at",
            },
            {
                data: "actions",

            },
        ],
        columnDefs: [
            {
                width: "80px",
                targets: 0,
                title: "#",
            },
            {
                width: "300px",
                targets: 1,

            },
            {
                width: "200px",
                targets: 2,

            },
            {
                width: "100px",
                targets: 3,

            },

            {
                width: "120px",
                targets: 4,


            },
            {
                width: "75px",
                targets: 5,

            },
        ],
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