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
        $year = Year::all();
        return view('home', [
            'title' => 'Dashboard',
            'breadcrumb' => array(),
            'year' => $year,
        ]);
    }

    public function setYear(Request $request)
    {
        $fetchYear = Year::where('id', $request->year)->first();
        if($fetchYear->status == 0)
        {
            $fetchYear->status = 1;
            $fetchYear->update();
            Year::where('id', '!=', $request->year)->update(['status' => 0]);
            return response()->json([
                'message' => 'Year Changed SuccessFull',
                'status' => true,
                'setData' => $fetchYear,
            ]);
        }
    }
}
