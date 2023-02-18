@extends('layouts.login')

@section('content')
    <div id="layout-wrapper">

        @include('layouts.general.left-bar')

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Invite</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ route('invite.index') }}">Invite</a></li>
                                        <li class="breadcrumb-item active">Create</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <form autocomplete="off" method="POST" action="{{ route('invite.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-4">
                                            <label for="name" class="col-sm-3 col-form-label">
                                                Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="name"
                                                    placeholder="Enter Your ">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="contact" class="col-sm-3 col-form-label">
                                                Contact Number</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="contact"
                                                    placeholder="Enter Your ">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="email" class="col-sm-3 col-form-label">
                                                Email Address</label>
                                            <div class="col-sm-9">
                                                <input type="mail" class="form-control" name="email"
                                                    placeholder="Enter Your ">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="role_id" class="col-sm-3 col-form-label">
                                                Role</label>
                                            <div class="col-sm-9">
                                                <select class="form-select" name="role_id">
                                                    <option value="" disabled selected hidden>
                                                        -- Select one --</option>
                                                    @foreach ($data as $datas)
                                                        <option value="{{ $datas->id }}">{{ $datas->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="row justify-content-end">
                                            <div class="col-sm-9">
                                                <div>
                                                    <button type="submit" class="btn btn-success w-md">Submit</button>
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

            @include('layouts.general.footer')

        </div>
    </div>
@endsection
