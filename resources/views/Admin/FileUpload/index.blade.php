@extends('Admin.Layouts.master')

@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('superAdmin/assets/extra-libs/multicheck/multicheck.css') }}" />
    <link href="{{ asset('superAdmin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title"> File Upload</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('superAdmin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                File Upload
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
                        <h4>File Upload</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('file.import.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">

                                <div class="col-md-6">
                                    <label for="file_import">Select User :</label>
                                    <select name="user" class="form-select" id="user">
                                        <option value=""></option>
                                    </select>
                                </div>

                            </div>

                            <div class="row mb-3">

                                <div class="col-md-6">
                                    <label for="file_import">Select Table Name :</label>
                                    <select name="table_name" class="form-select" id="table_name">
                                        <option value=""></option>
                                    </select>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <label for="file_import">Select Excel File for Upload :</label>
                                    <input type="file" name="kheti_excel_file" id="file_import" class="form-control">
                                </div>
                                <div class="col-md-2 mt-4">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </div>
                        </form>
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
