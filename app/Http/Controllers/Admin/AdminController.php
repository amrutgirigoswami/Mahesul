<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateAdminProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserAdmin\User\UserRequest;

class AdminController extends Controller
{
    use ImageTrait;
    public function index()
    {
        $admin = User::where('id', Auth::id())->first();
        return view('Admin.Admin.index', [
            'admin' => $admin,
        ]);
    }
    public function UpdateProfile(UpdateAdminProfileRequest $request, $id)
    {
        $updateData = $request->safe()->all();
        $file = $request->file('profile_image');
        $userData = User::where('id', $id);
        if ($file) {
            $path = $this->imageUpload($file, 'user');
            $updateData['profile_image'] = $path;
            $userImage = $userData->first('profile_image')->profile_image ?? "";

            if (isset($userImage) && Storage::exists($userImage)) {
                $this->fileRemove($userImage);
            }
        }
        $userData->update($updateData);

        Session::flash('success', 'Admin Updated Successfully');
        return redirect(route('admin.profile'));
    }
    public function ChangePassword()
    {
        return view('Admin.Admin.changePassword');
    }

    
}
