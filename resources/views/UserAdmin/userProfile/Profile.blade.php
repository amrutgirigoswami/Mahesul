@extends('layouts.app')

@section('content')
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        @if ($userDetails->profile_image && Storage::exists($userDetails->profile_image))
                            <img src="{{ Storage::url($userDetails->profile_image) }}" alt="Profile" class="rounded-circle">
                        @else
                            <img src="{{ asset('commonImage/avatar.png') }}" alt="Profile" class="rounded-circle">
                        @endif
                        {{-- <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle"> --}}
                        <h2>{{ $userDetails->name ? $userDetails->name : '' }}</h2>
                        <h3>{{ $userDetails->email ? $userDetails->email : '' }}</h3>

                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">



                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
                            </li>



                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Change Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active  profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="{{ route('user.profile.update', $userDetails->id) }}" method="POST"
                                    enctype="multipart/form-data" name="userProfileUpdate">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">પ્રોફાઈલ
                                            ફોટો</label>
                                        @if ($userDetails->profile_image && Storage::exists($userDetails->profile_image))
                                            <div class="col-md-8 col-lg-9">
                                                <img src="{{ Storage::url($userDetails->profile_image) }}" alt="Profile">
                                            </div>
                                        @else
                                            <div class="col-md-8 col-lg-9">
                                                <img src="{{ asset('commonImage/avatar.png') }}" alt="Profile">
                                            </div>
                                        @endif

                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputNumber" class="col-sm-4 col-lg-3 col-form-label"></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input class="form-control" name="profile_image" type="file"
                                                id="profile_image">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-lg-3 col-form-label">યુઝરનું પૂરું
                                            નામ</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                value="{{ $userDetails->name ? $userDetails->name : '' }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="row mb-3">
                                        <label for="village_name" class="col-md-4 col-lg-3 col-form-label">ગામનું
                                            નામ</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="village_name" type="text" class="form-control" id="village_name"
                                                value="{{ $userDetails->village_name ? $userDetails->village_name : '' }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="taluka_name" class="col-md-4 col-lg-3 col-form-label">તાલુકાનું
                                            નામ</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="taluka_name" type="text" class="form-control" id="taluka_name"
                                                value="{{ $userDetails->taluka_name ? $userDetails->taluka_name : '' }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="district_name" class="col-md-4 col-lg-3 col-form-label">જિલ્લાનું
                                            નામ</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="district_name" type="text" class="form-control"
                                                id="district_name"
                                                value="{{ $userDetails->district_name ? $userDetails->district_name : '' }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="full_address" class="col-md-4 col-lg-3 col-form-label">ગ્રામ પંચાયતનું
                                            પૂરું સરનામું</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="full_address" type="text" class="form-control" id="full_address"
                                                value="{{ $userDetails->full_address ? $userDetails->full_address : '' }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="pincode" class="col-md-4 col-lg-3 col-form-label">પીન કોડ નં</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="pincode" type="text" class="form-control" id="pincode"
                                                value="{{ $userDetails->pincode ? $userDetails->pincode : '' }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="contact_no" class="col-md-4 col-lg-3 col-form-label">ગ્રામ પંચાયત
                                            સંપર્ક
                                            નં.</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="contact_no" type="text" class="form-control" id="contact_no"
                                                value="{{ $userDetails->contact_no ? $userDetails->contact_no : '' }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">પંચાયત
                                            ઈ-મેઈલ</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" id="Email"
                                                value="{{ $userDetails->email ? $userDetails->email : '' }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>



                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form method="POST" action="{{ route('user.password.update', $userDetails->id) }}">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="current_password" class="col-md-4 col-lg-3 col-form-label">Current
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="current_password" type="password"
                                                class="form-control @error('current_password') is-invalid @enderror "
                                                id="current_password" value="{{ old('current_password') }}">
                                            @error('current_password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="new_password" class="col-md-4 col-lg-3 col-form-label">New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="new_password" type="password"
                                                class="form-control @error('new_password') is-invalid @enderror"
                                                id="new_password">
                                            @error('new_password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password_confirmation"
                                            class="col-md-4 col-lg-3 col-form-label">Re-enter New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password_confirmation" type="password"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                id="password_confirmation">
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
