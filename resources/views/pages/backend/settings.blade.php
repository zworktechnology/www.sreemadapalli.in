@extends('layouts.login')

@section('content')
    <div id="layout-wrapper">

        @include('layouts.general.notify-leftbar')

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Settings</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                                        <li class="breadcrumb-item active">Update Password</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('change.password') }}" autocomplete="off">
                                        @csrf

                                        <div class="col-sm-9">
                                            @foreach ($errors->all() as $error)
                                                <p class="text-danger">{{ $error }}</p>
                                            @endforeach
                                        </div>

                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Current
                                                Password </label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" id="password"
                                                    name="current_password" placeholder="Enter Your ">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">New
                                                Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" id="new_password"
                                                    name="new_password" placeholder="Enter Your ">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">New
                                                Confirm Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" id="new_confirm_password"
                                                    name="new_confirm_password" placeholder="Enter Your ">
                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="col-sm-9">
                                                <div>
                                                    <button type="submit" class="btn btn-primary w-md">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.general.footer')

    </div>
    </div>
@endsection
