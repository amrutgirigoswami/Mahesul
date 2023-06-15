<?php

namespace App\Http\Controllers\FrontUser;

use App\Models\User;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserAdmin\User\UserRequest;

class UserController extends Controller
{
    use ImageTrait;
    /**
     * Only for "admin" guard are allowed except
     * for logout.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $userDetails = User::where('id', Auth::user()->id)->first();


        return view('UserAdmin.userProfile.Profile', [
            'title' => 'Profile',
            'breadcrumb' => array(['title' => 'Profile', 'link' => ""]),
            'userDetails' => $userDetails,
        ]);
    }
    public function UpdateUser(UserRequest $request, $id)
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

        Session::flash('success', 'User Updated Successfully');
        return redirect(route('user.profile'));
    }
    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|max:15'
        ]);

        $user = User::findOrFail($id);

        $hashedPassword = $user->password;

        if (Hash::check($request->current_password, $hashedPassword)) {
            $user->password = Hash::make($request->new_password);
            $user->update();

            Session::flash('success', 'Password Reset Successfully');
            return redirect(route('user.profile'));
        } else {
            Session::flash('error', 'The provided current password is incorrect.');
            return redirect(route('user.profile'));
        }
    }
}
