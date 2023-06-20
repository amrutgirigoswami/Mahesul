@extends('Admin.Layouts.master')

@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('superAdmin/assets/extra-libs/multicheck/multicheck.css') }}" />
    <link href="{{ asset('superAdmin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Users List</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('superAdmin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                User List
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <!-- Column -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User List
                            <a href="{{ route('users.create') }}" class="btn btn-primary float-end">Add New User</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive" id="userTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Contact No.</th>
                                    <th>Status</th>
                                    <th>User Type</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('superAdmin/assets/extra-libs/multicheck/datatable-checkbox-init.js') }}"></script>
    <script src="{{ asset('superAdmin/assets/extra-libs/multicheck/jquery.multicheck.js') }}"></script>
    <script src="{{ asset('superAdmin/assets/extra-libs/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('AllPageJS/UserJS/userlistdata.js') }}"></script>
    <script>
        var listDataUrl = "{{ route('users.listdata') }}"
    </script>
@endsection
