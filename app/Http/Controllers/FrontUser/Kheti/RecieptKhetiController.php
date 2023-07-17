<?php

namespace App\Http\Controllers\FrontUser\Kheti;

use App\Models\Kheti;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecieptKhetiController extends Controller
{

    public function index($accout_id)
    {
        $kheti = Kheti::where(['account_id' => $accout_id])->first();

        return view('UserAdmin.Kheti.receipt', [
            'title' => 'Add Receipt',
            'breadcrumb' => array(['title' => 'Add Receipt', 'link' => ""]),
            'khetiData' => $kheti
        ]);
    }
}
