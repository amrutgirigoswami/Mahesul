@extends('layouts.app')

@section('content')
    <section class="section profile">
        <div class="row">
            <div class="col-xl-12 ">
                <div class="card">
                    <div class="card-body pt-3">
                        <form action="{{ route('user.account.setting.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">

                                <label for="account_status" class="col-md-3 col-lg-2 col-form-label">Account Status</label>
                                <div class="col-md-6 col-lg-3 mt-2">
                                    <h5 class="text-success">Active</h5>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="start_date" class="col-md-3 col-lg-2 col-form-label">Start Date</label>
                                <div class="col-md-6 col-lg-3">
                                    <input name="start_date" type="text"
                                        class="form-control @error('start_date') is-invalid @enderror" readonly
                                        id="from" value="{{ $accountSettings->start_date ?? '' }}">

                                    @error('start_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <label for="end_date" class="col-md-3 col-lg-2 col-form-label">End Date</label>
                                <div class="col-md-6 col-lg-3">
                                    <input name="end_date" type="text"
                                        class="form-control @error('end_date') is-invalid @enderror" readonly id="to"
                                        value="{{ $accountSettings->end_date ?? '' }}">

                                    @error('end_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <div class="col-md-12 col-lg-12 ">
                                    <button type="submit" class="btn btn-primary float-end">Set Settings</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
