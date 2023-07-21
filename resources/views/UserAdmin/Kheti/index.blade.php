@extends('layouts.app')

@section('css')
    <link href="{{ asset('assets/vendor/DataTables/datatables.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <section class="section profile">

        <div class="row ">
            <div class="col-md-2 float-end text-center">
                <div class="card">
                    <div class="card-header">
                        <h5>કુલ મુલતવી</h5>
                    </div>
                    <div class="card-body">
                        <h5 class="mt-3"><strong id="mulatviTotal"> {{ $mulatvi }}</strong></h5>
                    </div>
                </div>
            </div>
             <div class="col-md-2 float-end text-center">
                <div class="card">
                    <div class="card-header">
                        <h5>કુલ સરકારી</h5>
                    </div>
                    <div class="card-body">
                        <h5 class="mt-3"><strong id="sarkariTotal"> {{ $sarkari }}</strong></h5>
                    </div>
                </div>
            </div>
             <div class="col-md-2 float-end text-center">
                <div class="card">
                    <div class="card-header">
                        <h5>કુલ લોકલ</h5>
                    </div>
                    <div class="card-body">
                        <h5 class="mt-3"><strong id="localTotal"> {{ $local }}</strong></h5>
                    </div>
                </div>
            </div>
             <div class="col-md-2 float-end text-center">
                <div class="card">
                    <div class="card-header">
                        <h5>કુલ માંગણું</h5>
                    </div>
                    <div class="card-body">
                        <h5 class="mt-3"><strong id="total"> {{ $total }}</strong></h5>
                    </div>
                </div>
            </div>
             <div class="col-md-2 float-end text-center">
                <div class="card">
                    <div class="card-header">
                        <h5>કુલ છૂટ</h5>
                    </div>
                    <div class="card-body">
                        <h5 class="mt-3"><strong id="chhutTotal"> {{ $chhut }}</strong></h5>
                    </div>
                </div>
            </div>
             <div class="col-md-2 float-end text-center">
                <div class="card">
                    <div class="card-header">
                        <h5>કુલ ગત વર્ષની જાદે</h5>
                    </div>
                    <div class="card-body">
                        <h5 class="mt-3"><strong id="pastJadeTotal"> {{ $past_jadde }}</strong></h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12  ">

                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                            data-bs-target="#createAccount"><i class="bi bi-plus-square"></i> Create
                            New Account</button>
                    </div>
                    <div class="card-body mt-3">

                        <div class="table-responsive">
                            <table class="table talble-strip mt-3 display responsive nowrap" id="kheti_table"
                                style="width:100%">
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
                                        <th>Receipt</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.allModal')
@endsection

@section('script')
    <script src="{{ asset('assets\vendor\DataTables\datatables.min.js') }}"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.13.5/api/sum().js"></script>
    <script src="{{ asset('AllPageJS/Kheti/list.js') }}"></script>
    <script>
        var listDataUrl = "{{ route('kheti.listdata') }}";
        var createAccountUrl = "{{ route('kheti.store') }}";
    </script>
@endsection
