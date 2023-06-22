@extends('layouts.app')

@section('css')
    <link href="{{ asset('DataTables/datatables.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <section class="section profile">
        <div class="row">
            <div class="col-xl-12 ">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                            data-bs-target="#createAccount"><i class="bi bi-plus-square"></i> Create
                            New Account</button>
                    </div>
                    <div class="card-body mt-3">
                        <table class="table talble-strip mt-3 table-responsive" id="kheti_table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ખાતા નં</th>
                                    <th>ખાતેદારનું નામ</th>
                                    <th>મુલતવી</th>
                                    <th>સરકારી</th>
                                    <th>લોકલ</th>
                                    <th>ફરતી</th>
                                    <th>કુલ માંગણું</th>
                                    <th>છૂટ</th>
                                    <th>ગત વર્ષની જાદે</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('DataTables/pdfmake-0.2.7/pdfmake.min.js') }}"></script>
    <script src="{{ asset('DataTables/pdfmake-0.2.7/vfs_fonts.js') }}"></script>
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>

    <script src="{{ asset('AllPageJS/Kheti/list.js') }}"></script>
    <script>
        var listDataUrl = "{{ route('kheti.listdata') }}";
        var createAccountUrl = "{{ route('kheti.store') }}";
    </script>
@endsection
