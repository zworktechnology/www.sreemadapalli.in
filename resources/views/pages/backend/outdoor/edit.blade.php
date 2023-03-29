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
                            <h4 class="mb-sm-0 font-size-18">Out door</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('outdoor.index') }}">Outdoor</a></li>
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
                                <form autocomplete="off" method="POST" action="{{ route('outdoor.update', ['id' => $data->id]) }}" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="employee_id" class="col-sm-3 col-form-label">
                                            Name <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="name" placeholder="Enter Your " required value="{{ $data->name }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="employee_id" class="col-sm-3 col-form-label">
                                            Phone <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" name="contact_number" placeholder="Enter Your " required value="{{ $data->contact_number }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="employee_id" class="col-sm-3 col-form-label">
                                            Address <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <textarea type="text" class="form-control" name="address" placeholder="Enter Your " required>{!! $data->address !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="date" class="col-sm-3 col-form-label">
                                            Booking <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" name="booking_date" placeholder="Enter Your " required value="{{ $data->booking_date }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="date" class="col-sm-3 col-form-label">
                                            Delivery <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" name="delivery_date" placeholder="Enter Your " required value="{{ $data->delivery_date }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="employee_id" class="col-sm-3 col-form-label">
                                            Ordernote <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <textarea type="number" class="form-control" name="order_note" placeholder="Enter Your " required>{!! $data->order_note !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="note" class="col-sm-3 col-form-label">
                                            Note</label>
                                        <div class="col-sm-9">
                                            <textarea type="number" class="form-control" name="note" placeholder="Enter Your " required>{!! $data->note !!}</textarea>
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
