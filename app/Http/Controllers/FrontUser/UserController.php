<?php

namespace App\Http\Controllers\FrontUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        return view('UserAdmin.userProfile.Profile', [
            'title' => 'Profile',
            'breadcrumb' => array(['title' => 'Profile', 'link' => ""]),
        ]);
    }
}
