function newRecieptCalculation() {
    var newbAdhi = $('#new_b_adhi').val();
    var newtotalDemand = $('#new_total_demand').val();

    var newtotalRecieptCollection = parseFloat(newbAdhi) + parseFloat(newtotalDemand);
    $('#new_total_receipt_collection').val(newtotalRecieptCollection.toFixed(2));

}

function recieptCalculation() {
    var bAdhi = $('#b_adhi').val();
    var totalDemand = $('#total_demand').val();

    var totalRecieptCollection = parseFloat(bAdhi) + parseFloat(totalDemand);
    $('#total_receipt_collection').val(totalRecieptCollection);
    $('#charges_arrival').val(totalRecieptCollection.toFixed(2));

    var past_jadde = $('#past_jadde').val();

    var total_collection = parseFloat(totalRecieptCollection) + parseFloat(past_jadde);
    $('#total_collection').val(total_collection.toFixed(2));

    var total = $('#total').val();
    var chhut = $('#chhut').val();

    if (total_collection > 0) {
        var otherTotal = parseFloat(total) - parseFloat(chhut);
        if (total_collection < otherTotal) {
            $('#chargeable').val(total_collection.toFixed(2));
        }
        else {
            $('#chargeable').val(otherTotal.toFixed(2));
        }
    }
    else {
        $('#chargeable').val(0);
    }

    var remaining = parseFloat(total) - parseFloat(chhut) - parseFloat(total_collection);
    if (remaining < 0) {

        $('#remaining').val(0);
    } else {
        $('#remaining').val(Math.ceil(remaining.toFixed(2)));
    }
    var chargeable = $('#chargeable').val();
    var next_year_jadde = parseFloat(total_collection) - parseFloat(chargeable);
    $('#next_year_jadde').val(next_year_jadde.toFixed(2));
}

$("#toggleButton").click(function () {
    $("#toggleDiv").toggle();
});

$("#toggleButtonNew").click(function () {
    $("#toggleDivNew").toggle();
})

$(document).on('click', '.newReceiptUpdate', function () {
    var data = {
        account_id: $('#account_id').val(),
        new_receipt_no: $('#new_receipt_no').val(),
        new_receipt_date: $('#new_receipt_date').val(),
        new_b_adhi: $('#new_b_adhi').val(),
        new_total_demand: $('#new_total_demand').val(),
        new_total_receipt_collection: $('#new_total_receipt_collection').val(),
        _token: csrfToken,
    }
    $.ajax({
        type: "POST",
        url: addNewReceiptUrl,
        data: data,
        dataType: "json",
        success: function (response) {
            console.log(response.status);
            if (response.status == true) {
                $('#new_receipt_no').val('');
                $('#new_receipt_date').val('');
                $('#new_b_adhi').val('');
                $('#new_total_demand').val('');
                $('#new_total_receipt_collection').val('');
                $('#toggleDiv').css('display', 'none');
                toastr.success(response.message);

            } else {
                toastr.error('Something went to wrong');

            }
        }
    });
});