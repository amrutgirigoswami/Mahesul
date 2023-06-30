<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use Carbon\Carbon;
use App\Models\User;
use App\Traits\ImageTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Notifications\User\PasswordNotification;

class UserManageController extends Controller
{
    use ImageTrait;
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
        return view('Admin.Users.index');
    }
    public function AjaxDataTable(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'full_name',
            2 => 'email',
            3 => 'contact_no',
            4 => 'status',
            5 => 'user_type',
            6 => 'created_at'
        );

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        $users = User::where('deleted_at', NULL)->whereNot('id', Auth::id())->orderBy($order, $dir);
        $totalData = $users->count();

        $totalFiltered = $totalData;

        if (!empty($request->input('search.value'))) {
            $search = $request->input('search.value');
            $users = $users->where(function ($query) use ($search) {
                $query->where('full_name', 'LIKE', "%{$search}%")
                    ->orWhere('contact_no', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%");
            });

            $totalFiltered =  $users->count();
        }

        $users =  $users->offset($start)
            ->limit($limit)
            ->get();
        $data = array();
        if (!empty($users)) {
            $sr_no = '1';
            foreach ($users as $user) {
                $nestedData['id'] = $user->id;
                $nestedData['full_name'] = $user->name ?? 'N/A';
                $nestedData['contact_no'] = $user->contact_no ?? 'N/A';
                $nestedData['email'] = $user->email ?? '';
                if ($user->status == '0') {
                    $nestedData['status'] = '<a href="javascript:void(0)" class="btn btn-outline-success btn-sm" data-url="' . route('users.status.change', $user->id) . '" data-status="' . $user->status . '" onClick="statusChangeFunction(this)">Active</a>';
                } else {
                    $nestedData['status'] = '<a href="javascript:void(0)" class="btn btn-outline-danger btn-sm " data-url="' . route('users.status.change', $user->id) . '" data-status="' . $user->status . '" onClick="statusChangeFunction(this)">In Active</a>';
                }
                $nestedData['created_at'] = Carbon::now()->format('d-m-Y H:i', $user->created_at);
                // $nestedData['user_type'] = $user->role_as;
                // $nestedData['show_url'] = route('admin.user.show', $user->id);
                // $nestedData['edit_url'] = route('admin.user.edit', $user->id);
                // $nestedData['destroy_url'] = route('admin.user.destroy', $user->id);
                // $nestedData['status_change_url'] = route('admin.user.status.change', $user->id);
                if ($user->role_as == '1') {
                    $nestedData['user_type'] = '<h6 class="badge rounded-pill bg-success  text-white">Admin</h6>';
                } else {
                    $nestedData['user_type'] = '<h6 class="badge rounded-pill bg-warning text-dark ">User</h6>';
                }
                $nestedData['actions'] = '<a href="' . route('users.edit', $user->id) . '" class="btn btn-primary text-white btn-sm user_edit">Edit</a>
                <a href="javascript:void(0)" onClick="destroyFunction(this)" data-id="' . $user->id . '"  data-url="' . route('users.delete', $user->id) . '" class="btn btn-danger text-white btn-sm user_delete">Delete</a>';
                $data[] = $nestedData;
                $sr_no++;
            }
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );

        echo json_encode($json_data);
    }
    public function CreateUser()
    {
        return view('Admin.Users.create');
    }
    public function StoreUser(CreateUserRequest $request)
    {
        $userData = $request->safe()->all();

        $file = $request->file('profile_image');
        $password = Str::random(8);
        $userData['password'] = Hash::make($password);
        if ($file) {
            $path = $this->imageUpload($file, 'user');
            $userData['profile_image'] = $path;
            $userImage = $userData['profile_image'] ?? "";

            if (isset($userImage) && Storage::exists($userImage)) {
                $this->fileRemove($userImage);
            }
        }

        $user = User::create($userData);

        $adminNotificationData = [
            "user" => $user,
            "password" => $password,
        ];
        // $userData['email']->notify(new PasswordNotification($adminNotificationData));
        Notification::route('mail', $user->email)->notify(new PasswordNotification($adminNotificationData));
        // dd($password);
        Session::flash('success', 'User Created Successfully');
        return redirect(route('users.list'));
    }

    public function statusChange(Request $request, $id)
    {
        try {
            $user = User::find($id);
            if ($request->status == '1') {
                $status = '0';
            } else {
                $status = '1';
            }
            $user->status = $status;
            $user->save();
            return response()->json([
                'state' => true,
                'message' => 'Status Changes Successfully.',
            ]);
        } catch (Throwable $exception) {
            return response()->json([
                'state' => false,
                'message' => $exception->getMessage(),
            ]);
        }
    }

    public function EditUser($id)
    {
        $user = User::findOrFail($id);

        return view('Admin.Users.edit', [
            'user' => $user,
        ]);
    }
    public function UpdateUser(CreateUserRequest $request, $id)
    {
        $userData = $request->validated();
        $user = User::findOrFail($id);

        $file = $request->file('profile_image');
        if ($file) {
            $path = $this->imageUpload($file, 'user');
            $userData['profile_image'] = $path;
            $userImage = $user->profile_image ?? "";

            if ($userImage && Storage::exists($userImage)) {
                $this->fileRemove($userImage);
            }
        }

        // Update user fields
        $user->update($userData);

        Session::flash('success', 'User Updated Successfully');
        return redirect(route('users.list'));
    }
    public function DeleteUser($id)
    {
        try {
            $user = User::findOrFail($id);
            if ($user->delete()) {
                // Session::flash('alert-success', __('messages.admin.user_deleted_succ'));
                return response()->json([
                    'state' => true,
                    'message' => 'User Deleted Successfully',
                ]);
            }
            // return redirect(route('admin.user.list'));
        } catch (Throwable $exception) {
            return response()->json([
                'state' => false,
                'message' => $exception->getMessage(),
            ]);
        }
    }
}
