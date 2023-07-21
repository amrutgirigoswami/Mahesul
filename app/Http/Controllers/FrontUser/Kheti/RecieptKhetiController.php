<?php

namespace App\Http\Controllers\FrontUser\Kheti;

use App\Models\Kheti;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserAdmin\Kheti\UpdateReceiptRequest;

class RecieptKhetiController extends Controller
{

    public function index($id)
    {
        $kheti = Kheti::findOrFail($id);

        return view('UserAdmin.Kheti.receipt', [
            'title' => 'Add Receipt',
            'breadcrumb' => array(['title' => 'Add Receipt', 'link' => ""]),
            'khetiData' => $kheti
        ]);
    }

    public function UpdateReceipt(UpdateReceiptRequest $request, $id)
    {
        $updateReceiptData = $request->safe()->all();

        $receiptData = Kheti::findOrFail($id);

        $receiptData->receipt_no = $updateReceiptData['receipt_no'];
        $receiptData->receipt_date = $updateReceiptData['receipt_date'];
        $receiptData->b_adhi = $updateReceiptData['b_adhi'];
        $receiptData->total_demand = $updateReceiptData['total_demand'];
        $receiptData->total_receipt_collection = $updateReceiptData['total_receipt_collection'];
        $receiptData->charges_arrival = $updateReceiptData['charges_arrival'];
        $receiptData->total_collection = $updateReceiptData['total_collection'];
        $receiptData->chargeable = $updateReceiptData['chargeable'];
        $receiptData->remaining = $updateReceiptData['remaining'];
        $receiptData->next_year_jadde = $updateReceiptData['next_year_jadde'];
        $receiptData->update();

        Session::flash('success', 'Receipt Added Successfully');
        return redirect(route('kheti.list'));
    }
}
