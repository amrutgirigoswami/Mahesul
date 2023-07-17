@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('userAdmin/receipt.css') }}">
@endsection
@section('content')
    <section class="section profile">
        <div class="card card-body border shadow p-3 receiptCardDisable mb-3">
            <div class="row">
                <div class="col-md-2 mb-3">
                    <label for="account_id">ખાતા નં</label>
                    <input type="text" name="account_id" id="account_id" class="form-control"
                        value="{{ $khetiData->account_id }}" disabled>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="account_holder_name">ખાતેદારનું નામ</label>
                    <input type="text" name="account_holder_name" id="account_holder_name" class="form-control"
                        value="{{ $khetiData->account_holder_name }}" disabled>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="mulatvi">મુલતવી</label>
                    <input type="text" name="mulatvi" id="mulatvi" class="form-control"
                        value="{{ $khetiData->mulatvi }}" disabled>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="sarkari">સરકારી</label>
                    <input type="text" name="sarkari" id="sarkari" class="form-control"
                        value="{{ $khetiData->sarkari }}" disabled>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="local">લોકલ</label>
                    <input type="text" name="local" id="local" class="form-control" value="{{ $khetiData->local }}"
                        disabled>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="farti">ફરતી</label>
                    <input type="text" name="farti" id="farti" class="form-control" value="{{ $khetiData->farti }}"
                        disabled>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="total">કુલ માંગણું</label>
                    <input type="text" name="total" id="total" class="form-control" value="{{ $khetiData->total }}"
                        disabled>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="chhut">છૂટ</label>
                    <input type="text" name="chhut" id="chhut" class="form-control" value="{{ $khetiData->chhut }}"
                        disabled>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="past_jadde">ગત વર્ષની જાદે</label>
                    <input type="text" name="past_jadde" id="past_jadde" class="form-control"
                        value="{{ $khetiData->past_jadde }}" disabled>
                </div>
            </div>
        </div>
        <div class="card card-body border shadow p-3 receiptCardInput">
            <div class="row">
                <div class="col-md-2 mb-3">
                    <label for="receipt_no">પહોંચ નં</label>
                    <input type="text" name="receipt_no" id="receipt_no"
                        class="form-control @error('receipt_no') is-invalid @enderror" value="{{ old('receipt_no') }}">
                    @error('receipt_no')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-2 mb-3">
                    <label for="receipt_date">પહોંચની તારીખ</label>
                    <input type="date" name="receipt_date" id="receipt_date"
                        class="form-control @error('receipt_date') is-invalid @enderror" value="{{ old('receipt_date') }}">
                    @error('receipt_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-2 mb-3">
                    <label for="b_adhi">B_Adhi</label>
                    <input type="text" name="b_adhi" id="b_adhi"
                        class="form-control @error('b_adhi') is-invalid @enderror" value="{{ old('b_adhi') }}">
                    @error('b_adhi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-2 mb-3">
                    <label for="b_adhi">કુલ ડિમાન્ડ</label>
                    <input type="text" name="total_demand" id="total_demand"
                        class="form-control @error('total_demand') is-invalid @enderror"
                        value="{{ old('total_demand') }}">
                    @error('total_demand')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

    </section>
@endsection

@section('script')
@endsection
