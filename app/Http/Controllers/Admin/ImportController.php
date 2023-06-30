<?php

namespace App\Http\Controllers\Admin;

use App\Imports\KhetiImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class ImportController extends Controller
{
    public function __construct()
    {
        $this->middleware('superAdmin');
    }
    public function index()
    {
        return view('Admin.FileUpload.index');
    }
    public function ImportData(Request $request)
    {
        $file = $request->file('kheti_excel_file');

        Excel::import(new KhetiImport, $file);

        Session::flash('success', 'File imported successfully.');
        return redirect(route('file.import'));
        // return redirect()->back()->with('success', 'File imported successfully.');
    }
}
