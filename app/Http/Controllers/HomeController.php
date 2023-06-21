<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $year = Year::first();
        return view('home', [
            'title' => 'Dashboard',
            'breadcrumb' => array(),
            'year' => $year,
        ]);
    }

    public function SetYear(Request $request)
    {
        $authId = Auth::user()->id;

        $fetchYear = Year::where('auth_id', $authId)->first();
        if (empty($fetchYear)) {
            $setYear = $request->year;
            $yearData = new Year();
            $yearData->year = $setYear;
            $yearData->auth_id = Auth::user()->id;
            $yearData->save();
            return response()->json([
                'message' => 'Year Set SuccessFull',
                'status' => true,
                'setData' => $setYear,
            ]);
        } else {
            $setYear = Year::where('auth_id', $authId)->first();
            $setData = $request->year;
            $setYear->year = $setData;
            $setYear->update();
            return response()->json([
                'message' => 'Year Changed SuccessFull',
                'status' => true,
                'setData' => $setData,
            ]);
        }
    }
}
