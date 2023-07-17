@extends('Admin.Layouts.master')

@section('page_css')
@endsection
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Edit User</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('users.list') }}">User List</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Edit User
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
                        <h4>Create User
                            <a href="{{ route('users.list') }}" class="btn btn-danger text-white float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data"
                            name="userProfileUpdate">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-4 col-lg-3 col-form-label">Profile
                                    Image</label>
                                <div class="col-md-3">
                                    @if ($user->profile_image && Storage::exists($user->profile_image))
                                        <img src="{{ Storage::url($user->profile_image) }}" alt="Profile"
                                            class="rounded-circle" style="width: 150px;height: 150px;">
                                    @else
                                        <img src="{{ asset('commonImage/avatar.png') }}" alt="Profile"
                                            class="rounded-circle" style="width: 150px;height: 150px;">
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-4 col-lg-3 col-form-label">Select Profile
                                    Image</label>
                                <div class="col-md-8 col-lg-9">
                                    <input class="form-control" name="profile_image" type="file" id="profile_image">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-lg-3 col-form-label">Full name</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                        value="{{ old('name',$user->name ? $user->name : '') }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="row mb-3">
                                <label for="village_name" class="col-md-4 col-lg-3 col-form-label">Village Name</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="village_name" type="text"
                                        class="form-control  @error('village_name') is-invalid @enderror" id="village_name"
                                        value="{{ old('village_name',$user->village_name ? $user->village_name : '') }}">
                                    @error('village_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="taluka_name" class="col-md-4 col-lg-3 col-form-label">Taluka Name</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="taluka_name" type="text"
                                        class="form-control @error('taluka_name') is-invalid @enderror" id="taluka_name"
                                        value="{{ old('taluka_name',$user->taluka_name ? $user->taluka_name : '') }}">
                                    @error('taluka_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="district_name" class="col-md-4 col-lg-3 col-form-label">District Name</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="district_name" type="text"
                                        class="form-control @error('district_name') is-invalid @enderror" id="district_name"
                                        value="{{ old('district_name',$user->district_name ? $user->district_name : '') }}">
                                    @error('district_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="full_address" class="col-md-4 col-lg-3 col-form-label">Panchayat Name</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="full_address" type="text" class="form-control" id="full_address"
                                        value="{{ old('full_address',$user->full_address ? $user->full_address : '') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="pincode" class="col-md-4 col-lg-3 col-form-label">Pincode No.</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="pincode" type="text" class="form-control" id="pincode"
                                        value="{{ old('pincode',$user->pincode ? $user->pincode : '') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="contact_no" class="col-md-4 col-lg-3 col-form-label">Panchayat Contact
                                    No.</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="contact_no" type="text"
                                        class="form-control @error('contact_no') is-invalid @enderror" id="contact_no"
                                        value="{{ old('contact_no',$user->contact_no ? $user->contact_no : '') }}">
                                    @error('contact_no')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Email" class="col-md-4 col-lg-3 col-form-label">Panchayat Email</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" id="Email"
                                        value="{{ old('email',$user->email ? $user->email : '') }}">
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
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
@endsection
