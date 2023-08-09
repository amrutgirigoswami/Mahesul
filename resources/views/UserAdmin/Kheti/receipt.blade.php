@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('userAdmin/receipt.css') }}">
@endsection
@section('content')
    <section class="section profile">
        <div class="card card-body border shadow p-3 receiptCardDisable mb-3">
            <div class="row">
                <div class="col-md-2 mb-3">
                    <label for="account_id" class="mb-3">ખાતા નં</label>
                    <input type="text" name="account_id" id="account_id" class="form-control"
                        value="{{ $khetiData->account_id }}" disabled>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="account_holder_name" class="mb-3">ખાતેદારનું નામ</label>
                    <input type="text" name="account_holder_name" id="account_holder_name" class="form-control"
                        value="{{ $khetiData->account_holder_name }}" disabled>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="mulatvi" class="mb-3">મુલતવી</label>
                    <input type="text" name="mulatvi" id="mulatvi" class="form-control"
                        value="{{ number_format($khetiData->mulatvi, 2) }}" disabled>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="sarkari" class="mb-3">સરકારી</label>
                    <input type="text" name="sarkari" id="sarkari" class="form-control"
                        value="{{ number_format($khetiData->sarkari, 2) }}" disabled>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="local" class="mb-3">લોકલ</label>
                    <input type="text" name="local" id="local" class="form-control"
                        value="{{ number_format($khetiData->local, 2) }}" disabled>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="farti" class="mb-3">ફરતી</label>
                    <input type="text" name="farti" id="farti" class="form-control"
                        value="{{ number_format($khetiData->farti, 2) }}" disabled>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="total" class="mb-3">કુલ માંગણું</label>
                    <input type="text" name="total" id="total" class="form-control"
                        value="{{ number_format($khetiData->total, 2) }}" disabled>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="chhut" class="mb-3">છૂટ</label>
                    <input type="text" name="chhut" id="chhut" class="form-control"
                        value="{{ number_format($khetiData->chhut, 2) }}" disabled>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="past_jadde" class="mb-3">ગત વર્ષની જાદે</label>
                    <input type="text" name="past_jadde" id="past_jadde" class="form-control"
                        value="{{ number_format($khetiData->past_jadde, 2) }}" disabled>
                </div>
            </div>
        </div>
        <form action="{{ route('kheti.receipt.update', $khetiData->id) }}" method="POST">
            @csrf
            <div class="row mt-2 mb-3">
                <div class="col-md-6">
                    <div class="card card-body border shadow p-3 receiptCardInput">
                        <div class="row">
                            <div class="col-md-2 mb-3 text-center">
                                <label for="receipt_no" class="mb-3">પહોંચ નં</label>
                                <input type="number" name="receipt_no" id="receipt_no"
                                    class="form-control @error('receipt_no') is-invalid @enderror"
                                    value="{{ old('receipt_no', $khetiData->receipt_no) }}">
                                @error('receipt_no')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3 text-center">
                                <label for="receipt_date" class="mb-3">પહોંચની તારીખ</label>
                                <input type="date" name="receipt_date" id="receipt_date"
                                    class="form-control @error('receipt_date') is-invalid @enderror"
                                    value="{{ old('receipt_date', $khetiData->receipt_date) }}">
                                @error('receipt_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-3 text-center">
                                <label for="b_adhi" class="mb-3">B_Adhi</label>
                                <input type="number" name="b_adhi" id="b_adhi" onkeyup="recieptCalculation(this)"
                                    class="form-control @error('b_adhi') is-invalid @enderror"
                                    value="{{ old('b_adhi', number_format($khetiData->b_adhi, 2)) }}">
                                @error('b_adhi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-3 text-center">
                                <label for="total_demand" class="mb-3">કુલ ડિમાન્ડ</label>
                                <input type="number" name="total_demand" id="total_demand"
                                    onkeyup="recieptCalculation(this)"
                                    class="form-control @error('total_demand') is-invalid @enderror"
                                    value="{{ old('total_demand', number_format($khetiData->total_demand, 2)) }}">
                                @error('total_demand')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3 text-center">
                                <label for="total_receipt_collection" class="mb-3">કુલ </label>
                                <input type="number" name="total_receipt_collection" onkeyup="recieptCalculation(this)"
                                    id="total_receipt_collection"
                                    class="form-control @error('total_receipt_collection') is-invalid @enderror"
                                    value="{{ old('total_receipt_collection', number_format($khetiData->total_receipt_collection, 2)) }}"
                                    readonly>
                                @error('total_receipt_collection')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <div class="col-md-12">
                                @if ($khetiData->receipt_no)
                                    <button type="button" id="toggleButton" class="btn btn-warning float-end">Add More
                                        Receipt</button>
                                @endif
                            </div>
                        </div>
                        {{-- new Add reciept --}}
                        <div class="row " id="toggleDiv" style="display: none;">
                            <hr>

                            <div class="col-md-12 ">
                                <!-- Your content goes here -->
                                <div class="row">
                                    <div class="col-md-2 mb-3 text-center">
                                        <label for="new_receipt_no" class="mb-3">પહોંચ નં</label>
                                        <input type="number" name="new_receipt_no" id="new_receipt_no"
                                            class="form-control @error('new_receipt_no') is-invalid @enderror"
                                            value="{{ old('new_receipt_no') }}">
                                        @error('new_receipt_no')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3 text-center">
                                        <label for="new_receipt_date" class="mb-3">પહોંચની તારીખ</label>
                                        <input type="date" name="new_receipt_date" id="new_receipt_date"
                                            class="form-control @error('new_receipt_date') is-invalid @enderror"
                                            value="{{ old('new_receipt_date') }}">
                                        @error('new_receipt_date')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 mb-3 text-center">
                                        <label for="new_b_adhi" class="mb-3">B_Adhi</label>
                                        <input type="number" name="new_b_adhi" id="new_b_adhi"
                                            onkeyup="newRecieptCalculation(this)"
                                            class="form-control @error('new_b_adhi') is-invalid @enderror"
                                            value="{{ old('new_b_adhi') }}">
                                        @error('new_b_adhi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 mb-3 text-center">
                                        <label for="new_total_demand" class="mb-3">કુલ ડિમાન્ડ</label>
                                        <input type="number" name="new_total_demand" id="new_total_demand"
                                            onkeyup="newRecieptCalculation(this)"
                                            class="form-control @error('new_total_demand') is-invalid @enderror"
                                            value="{{ old('new_total_demand') }}">
                                        @error('new_total_demand')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3 text-center">
                                        <label for="new_total_receipt_collection" class="mb-3">કુલ </label>
                                        <input type="number" name="new_total_receipt_collection"
                                            onkeyup="newRecieptCalculation(this)" id="new_total_receipt_collection"
                                            class="form-control @error('new_total_receipt_collection') is-invalid @enderror"
                                            value="{{ old('new_total_receipt_collection') }}" readonly>
                                        @error('new_total_receipt_collection')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <button type="button"
                                            class="btn btn-primary float-end newReceiptUpdate">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- newdata --}}
                <div class="col-md-6">
                    <div class="card card-body border shadow p-3 receiptCardInputNew">
                        <div class="row">
                            <div class="col-md-3 mb-3 text-center">
                                <label for="charges_arrival" class="mb-3">પહોંચ મુજબ વસુલાત</label>
                                <input type="text" name="charges_arrival" id="charges_arrival" class="form-control"
                                    value="{{ old('charges_arrival', number_format($khetiData->charges_arrival, 2)) }}"
                                    readonly>

                            </div>
                            <div class="col-md-2 mb-3 text-center">
                                {{-- (ગત વર્ષની જાદે + પહોંચમુજબ વસુલાત) --}}
                                <label for="total_collection" class="mb-3">કુલ વસુલાત </label>
                                <input type="text" name="total_collection" id="total_collection" class="form-control"
                                    value="{{ old('total_collection', number_format($khetiData->total_collection, 2)) }}"
                                    readonly>
                            </div>
                            <div class="col-md-2 mb-3 text-center">
                                <label for="chargeable" class="mb-3">વસુલવા પાત્ર</label>
                                <input type="text" name="chargeable" id="chargeable" class="form-control"
                                    value="{{ old('chargeable', number_format($khetiData->chargeable, 2)) }}">

                            </div>
                            <div class="col-md-2 mb-3 text-center">
                                <label for="remaining" class="mb-3">બાકી</label>
                                <input type="text" name="remaining" id="remaining" class="form-control "
                                    value="{{ old('remaining', number_format($khetiData->remaining, 2)) }}">

                            </div>
                            <div class="col-md-3 mb-3 text-center">
                                <label for="next_year_jadde" class="mb-3">આવતા વર્ષેની જાદે </label>
                                <input type="text" name="next_year_jadde" id="next_year_jadde" class="form-control "
                                    value="{{ old('next_year_jadde', number_format($khetiData->next_year_jadde, 2)) }}">

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success float-end ">Add Reciept</button>
                    <a href="{{ route('kheti.list') }}" class="btn btn-danger float-end me-2">Cancel</a>
                </div>
            </div>
        </form>
    </section>
@endsection

@section('script')
    <script src="{{ asset('AllPageJS/Kheti/recieptCalculation.js') }}"></script>
    <script>
        var addNewReceiptUrl = "{{ route('kheti.newreceipt.store') }}";
    </script>
@endsection
