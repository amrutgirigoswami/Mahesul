<?php

namespace App\Http\Controllers\FrontUser\Kheti;

use App\Models\Kheti;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserAdmin\Kheti\KhetiCreateRequest;

class KhetiController extends Controller
{
    public function index()
    {
        return view('UserAdmin.Kheti.index', [
            'title' => 'Kheti List',
            'breadcrumb' => array(['title' => 'Kheti List', 'link' => ""]),
        ]);
    }
    public function AjaxDataTable(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'account_id',
            2 => 'account_holder_name',
            3 => 'mulatvi',
            4 => 'sarkari',
            5 => 'local',
            6 => 'farti',
            7 => 'total',
            8 => 'chhut',
            9 => 'past_jadde',
            10 => 'status',

        );

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        $kheti = Kheti::where('deleted_at', NULL)->orderBy($order, $dir);
        $totalData = $kheti->count();

        $totalFiltered = $totalData;

        if (!empty($request->input('search.value'))) {
            $search = $request->input('search.value');
            $kheti = $kheti->where(function ($query) use ($search) {
                $query->where('account_holder_name', 'LIKE', "%{$search}%")
                    ->orWhere('account_id', 'LIKE', "%{$search}%");
            });

            $totalFiltered =  $kheti->count();
        }

        $kheti =  $kheti->offset($start)
            ->limit($limit)
            ->get();
        $data = array();
        if (!empty($kheti)) {
            $sr_no = '1';
            foreach ($kheti as $row) {
                $nestedData['id'] = $row->id;
                $nestedData['account_id'] = $row->account_id;
                $nestedData['account_holder_name'] = $row->account_holder_name ?? 'N/A';
                $nestedData['mulatvi'] = $row->mulatvi ?? '';
                $nestedData['sarkari'] = $row->sarkari ?? '';
                $nestedData['local'] = $row->local ?? '';
                $nestedData['farti'] = $row->farti ?? '';
                $nestedData['total'] = $row->total ?? '';
                $nestedData['chhut'] = $row->chhut ?? '';
                $nestedData['past_jadde'] = $row->past_jadde ?? '';
                if ($row->status == '0') {
                    $nestedData['status'] = '<a href="javascript:void(0)" class="btn btn-outline-success btn-sm" data-url="' . route('users.status.change', $row->id) . '" data-status="' . $row->status . '" onClick="statusChangeFunction(this)">Active</a>';
                } else {
                    $nestedData['status'] = '<a href="javascript:void(0)" class="btn btn-outline-danger btn-sm " data-url="' . route('users.status.change', $row->id) . '" data-status="' . $row->status . '" onClick="statusChangeFunction(this)">In Active</a>';
                }

                // $nestedData['user_type'] = $user->role_as;
                // $nestedData['show_url'] = route('admin.user.show', $user->id);
                // $nestedData['edit_url'] = route('admin.user.edit', $user->id);
                // $nestedData['destroy_url'] = route('admin.user.destroy', $user->id);
                // $nestedData['status_change_url'] = route('admin.user.status.change', $user->id);

                $nestedData['actions'] = '<a href="' . route('users.edit', $row->id) . '" class="btn btn-primary text-white btn-sm user_edit">Edit</a>
                <a href="javascript:void(0)" onClick="destroyFunction(this)" data-id="' . $row->id . '"  data-url="' . route('users.delete', $row->id) . '" class="btn btn-danger text-white btn-sm user_delete">Delete</a>';
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
    public function StoreAccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'account_id' => 'required|unique:khetis,account_id',
            'account_holder_name' => 'required',
            'mulatvi' => 'required',
            'sarkari' => 'required',
            'local' => 'required',
            'farti' => 'required',
            'total' => 'required',
            'chhut' => 'required',
            'past_jadde' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->messages(),
            ]);
        } else {
            $khetiData = new Kheti();

            $khetiData->account_id = $request->input('account_id');
            $khetiData->auth_id = Auth::user()->id;
            $khetiData->account_holder_name = $request->input('account_holder_name');
            $khetiData->mulatvi = $request->input('mulatvi');
            $khetiData->sarkari = $request->input('sarkari');
            $khetiData->local = $request->input('local');
            $khetiData->farti = $request->input('farti');
            $khetiData->total = $request->input('total');
            $khetiData->chhut = $request->input('chhut');
            $khetiData->past_jadde = $request->input('past_jadde');
            $khetiData->save();

            return response()->json([
                'status' => 200,
                'message' => 'Account Created Successfully',
            ]);
        }
    }
}
