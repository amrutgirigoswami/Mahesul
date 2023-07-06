@extends('Admin.Layouts.master')

@section('page_css')
@endsection
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Profile</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('superAdmin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Profile
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

                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.profile.update', $admin->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="file_import">Profile Image</label>
                                    <input type="file" name="profile_image" id="profile_image" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    @if ($admin->profile_image && Storage::exists($admin->profile_image))
                                        <img src="{{ Storage::url($admin->profile_image) }}" alt="Profile"
                                            style="width:100px; height:100px;">
                                    @else
                                        <img src="{{ asset('commonImage/avatar.png') }}" alt="Profile"
                                            style="width:100px; height:100px;">
                                    @endif
                                </div>
                                <div class="col-md-6 mb-3 mt-5">
                                    <label for="name">Username</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ $admin->name ?? '' }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3 mt-5">
                                    <label for="email">E-mail</label>
                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ $admin->email ?? '' }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mt-4">
                                    <button type="submit" class="btn btn-primary float-end">Update Profile</button>
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
@endsection
