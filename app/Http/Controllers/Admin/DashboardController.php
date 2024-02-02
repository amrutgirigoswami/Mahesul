<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\YearCreateRequest;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function index()
    {
        return view('Admin.AdminDashboard');
    }

    public function addYear(YearCreateRequest $request)
    {
        if($request->year == '' && $request->year==NULL)
        {
            Session::flash('error', 'Year Field is required');
            return redirect()->back();
        } else{
            $year = new Year();
            $year->year= $request->year;
            $year->save();
    
        }
       
        
        Session::flash('success', 'Year Added Successfully');
        return redirect(route('superAdmin.dashboard'));
    }
}
