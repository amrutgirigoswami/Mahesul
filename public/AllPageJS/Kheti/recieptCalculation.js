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