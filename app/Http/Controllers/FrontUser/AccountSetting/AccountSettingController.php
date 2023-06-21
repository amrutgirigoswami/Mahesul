<?php

namespace App\Http\Controllers\FrontUser\AccountSetting;

use Illuminate\Http\Request;
use App\Models\AccountSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Models\AccountSettings;
use Illuminate\Support\Facades\Session;
use App\Models\Models\AccountSettings as ModelsAccountSettings;
use Carbon\Carbon;

class AccountSettingController extends Controller
{
    /**
     * account setting fetch
     *
     * redirect account seting 
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function index()
    {
        $accountSetting = AccountSetting::first();
        return view('UserAdmin.AccountSetting.index', [
            'title' => 'Account Settings',
            'breadcrumb' => array(['title' => 'Account Settings', 'link' => ""]),
            'accountSettings' => $accountSetting,
        ]);
    }
    /**
     * accountsettings
     *
     * store account settings
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function store(Request $request)
    {
        $this->validate($request, [
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        $AccountSettings = AccountSetting::first();

        if (empty($AccountSettings)) {
            $AccountData = new AccountSetting();
            $AccountData->user_id = Auth::user()->id;
            $AccountData->start_date =  $request->start_date;
            $AccountData->end_date =  $request->end_date;
            $AccountData->save();

            Session::flash('success', 'Account Setting Updated Successfully');
            return redirect(route('user.account.setting'));
        } else {
            $AccountSettings->start_date =  $request->start_date;
            $AccountSettings->end_date =  $request->end_date;
            $AccountSettings->update();
            Session::flash('success', 'Account Setting Updated Successfully');
            return redirect(route('user.account.setting'));
        }
    }
}
