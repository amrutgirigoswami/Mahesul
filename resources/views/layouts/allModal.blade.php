{{-- Need Help Model --}}
<div class="modal fade" id="needHelp" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Need Help ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body  justify-content-center">
                <h5>Contact No : 9375333232</h5>
                <h5>Email Support : apgoswami.info@gmail.com</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- Create Account --}}
<div class="modal fade" id="createAccount" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg p-2">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="account_id" class="col-md-3 col-lg-3"
                        style="color: #000000;font-size: 18px;margin-top: 5px;font-weight: 400;">ખાતા નં</label>
                    <div class="col-md-8 col-lg-8 col-sm-4">
                        <input type="number" name="account_id" id="account_id"
                            class="form-control @error('account_id')
                            is-invalid
                        @enderror">
                        @error('account_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="account_holder_name" class="col-md-3 col-lg-3"
                        style="color: #000000;font-size: 18px;margin-top: 5px;font-weight: 400;">ખાતેદારનું નામ</label>
                    <div class="col-md-8 col-lg-8 col-sm-4">
                        <input type="text" name="account_holder_name" id="account_holder_name"
                            class="form-control @error('account_holder_name')
                            is-invalid
                        @enderror">
                        @error('account_holder_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="mulatvi" class="col-md-3 col-lg-3"
                        style="color: #000000;font-size: 18px;margin-top: 5px;font-weight: 400;">મુલતવી નહિ તેવી</label>
                    <div class="col-md-8 col-lg-8 col-sm-4">
                        <input type="text" name="mulatvi" id="mulatvi"
                            class="form-control @error('mulatvi')
                            is-invalid
                        @enderror">
                        @error('mulatvi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sarkari" class="col-md-3 col-lg-3"
                        style="color: #000000;font-size: 18px;margin-top: 5px;font-weight: 400;">સરકારી</label>
                    <div class="col-md-8 col-lg-8 col-sm-4">
                        <input type="number" name="sarkari" id="sarkari"
                            class="form-control @error('sarkari')
                            is-invalid
                        @enderror">
                        @error('sarkari')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="local" class="col-md-3 col-lg-3"
                        style="color: #000000;font-size: 18px;margin-top: 5px;font-weight: 400;">લોકલ</label>
                    <div class="col-md-8 col-lg-8 col-sm-4">
                        <input type="number" name="local" id="local"
                            class="form-control @error('local')
                            is-invalid
                        @enderror">
                        @error('local')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="farti" class="col-md-3 col-lg-3"
                        style="color: #000000;font-size: 18px;margin-top: 5px;font-weight: 400;">ફરતી</label>
                    <div class="col-md-8 col-lg-8 col-sm-4">
                        <input type="number" name="farti" id="farti"
                            class="form-control @error('farti')
                            is-invalid
                        @enderror">
                        @error('farti')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="total" class="col-md-3 col-lg-3"
                        style="color: #000000;font-size: 18px;margin-top: 5px;font-weight: 400;">કુલ માંગણું</label>
                    <div class="col-md-8 col-lg-8 col-sm-4">
                        <input type="number" name="total" id="total"
                            class="form-control @error('total')
                            is-invalid
                        @enderror">
                        @error('total')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="chhut" class="col-md-3 col-lg-3"
                        style="color: #000000;font-size: 18px;margin-top: 5px;font-weight: 400;">છૂટ</label>
                    <div class="col-md-8 col-lg-8 col-sm-4">
                        <input type="number" name="chhut" id="chhut"
                            class="form-control @error('chhut')
                            is-invalid
                        @enderror">
                        @error('chhut')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="past_jadde" class="col-md-3 col-lg-3"
                        style="color: #000000;font-size: 18px;margin-top: 5px;font-weight: 400;">ગત વર્ષની જાદે</label>
                    <div class="col-md-8 col-lg-8 col-sm-4">
                        <input type="number" name="past_jadde" id="past_jadde"
                            class="form-control @error('past_jadde')
                            is-invalid
                        @enderror">
                        @error('past_jadde')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary CreateAccount">Create Account</button>
            </div>
        </div>
    </div>
</div><!-- End Large Modal-->

{{-- Edit Account --}}
<div class="modal fade" id="updateAccount" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg p-2">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update New Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="account_id" class="col-md-3 col-lg-3"
                        style="color: #000000;font-size: 18px;margin-top: 5px;font-weight: 400;">ખાતા નં</label>
                    <div class="col-md-8 col-lg-8 col-sm-4">
                        <input type="number" name="account_id" id="account_id"
                            class="form-control account_id @error('account_id')
                            is-invalid
                        @enderror">
                        @error('account_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="account_holder_name" class="col-md-3 col-lg-3"
                        style="color: #000000;font-size: 18px;margin-top: 5px;font-weight: 400;">ખાતેદારનું નામ</label>
                    <div class="col-md-8 col-lg-8 col-sm-4">
                        <input type="text" name="account_holder_name" id="account_holder_name"
                            class="form-control account_holder_name @error('account_holder_name')
                            is-invalid
                        @enderror">
                        @error('account_holder_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="mulatvi" class="col-md-3 col-lg-3"
                        style="color: #000000;font-size: 18px;margin-top: 5px;font-weight: 400;">મુલતવી નહિ
                        તેવી</label>
                    <div class="col-md-8 col-lg-8 col-sm-4">
                        <input type="text" name="mulatvi" id="mulatvi"
                            class="form-control mulatvi @error('mulatvi')
                            is-invalid
                        @enderror">
                        @error('mulatvi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sarkari" class="col-md-3 col-lg-3"
                        style="color: #000000;font-size: 18px;margin-top: 5px;font-weight: 400;">સરકારી</label>
                    <div class="col-md-8 col-lg-8 col-sm-4">
                        <input type="number" name="sarkari" id="sarkari"
                            class="form-control sarkari @error('sarkari')
                            is-invalid
                        @enderror">
                        @error('sarkari')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="local" class="col-md-3 col-lg-3"
                        style="color: #000000;font-size: 18px;margin-top: 5px;font-weight: 400;">લોકલ</label>
                    <div class="col-md-8 col-lg-8 col-sm-4">
                        <input type="number" name="local" id="local"
                            class="form-control local @error('local')
                            is-invalid
                        @enderror">
                        @error('local')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="farti" class="col-md-3 col-lg-3"
                        style="color: #000000;font-size: 18px;margin-top: 5px;font-weight: 400;">ફરતી</label>
                    <div class="col-md-8 col-lg-8 col-sm-4">
                        <input type="number" name="farti" id="farti"
                            class="form-control farti @error('farti')
                            is-invalid
                        @enderror">
                        @error('farti')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="total" class="col-md-3 col-lg-3"
                        style="color: #000000;font-size: 18px;margin-top: 5px;font-weight: 400;">કુલ માંગણું</label>
                    <div class="col-md-8 col-lg-8 col-sm-4">
                        <input type="number" name="total" id="total"
                            class="form-control total @error('total')
                            is-invalid
                        @enderror">
                        @error('total')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="chhut" class="col-md-3 col-lg-3"
                        style="color: #000000;font-size: 18px;margin-top: 5px;font-weight: 400;">છૂટ</label>
                    <div class="col-md-8 col-lg-8 col-sm-4">
                        <input type="number" name="chhut" id="chhut"
                            class="form-control chhut @error('chhut')
                            is-invalid
                        @enderror">
                        @error('chhut')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="past_jadde" class="col-md-3 col-lg-3"
                        style="color: #000000;font-size: 18px;margin-top: 5px;font-weight: 400;">ગત વર્ષની જાદે</label>
                    <div class="col-md-8 col-lg-8 col-sm-4">
                        <input type="number" name="past_jadde" id="past_jadde"
                            class="form-control past_jadde @error('past_jadde')
                            is-invalid
                        @enderror">
                        @error('past_jadde')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary CreateAccount">Create Account</button>
            </div>
        </div>
    </div>
</div><!-- End Large Modal-->
