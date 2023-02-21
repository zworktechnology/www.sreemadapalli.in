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
                            <h4 class="mb-sm-0 font-size-18">Delivery Boy</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('deliveryboy.index') }}">Delivery Boy</a></li>
                                    <li class="breadcrumb-item active">Update</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <form autocomplete="off" method="POST" action="{{ route('deliveryboy.update', ['id' => $data->id]) }}" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row mb-4">
                                        <label for="name" class="col-sm-3 col-form-label">
                                            Name <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="name" placeholder="Enter Your " value="{{ $data->name }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="contact_number" class="col-sm-3 col-form-label">
                                            Phone Number <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" name="contact_number" placeholder="Enter Your " value="{{ $data->contact_number }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="address" class="col-sm-3 col-form-label">
                                            Address</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="address" placeholder="Enter Your ">{!! $data->address !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-sm-9">
                                            <div>
                                                <button type="submit" class="btn btn-success w-md">Update</button>
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
