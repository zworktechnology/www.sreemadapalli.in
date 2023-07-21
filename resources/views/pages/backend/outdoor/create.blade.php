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
                                    <form autocomplete="off" method="POST" action="{{ route('outdoor.store') }}">
                                        @csrf
                                        <div class="modal-body">
                                            <div style="display: flex" class="col-12">
                                            <div class="row mb-2 col-6">
                                                <label for="employee_id" class="col-sm-3 col-form-label">
                                                    Name <span style="color: red;">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="name"
                                                        placeholder="Enter Your " required>
                                                </div>
                                            </div>
                                            <div class="row mb-2 col-6">
                                                <label for="employee_id" class="col-sm-3 col-form-label">
                                                    Phone <span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" name="contact_number"
                                                        placeholder="Enter Your " required>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="display: flex" class="col-12">

                                            <div class="row mb-2 col-6">
                                                <label for="date" class="col-sm-3 col-form-label">
                                                    Booking <span style="color: red;">*</span></label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" name="booking_date"
                                                        placeholder="Enter Your " required value="{{ $today }}">
                                                </div>
                                            </div>
                                            <div class="row mb-2 col-6">
                                                <label for="date" class="col-sm-3 col-form-label">
                                                    Delivery <span style="color: red;">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="datetime-local" class="form-control" name="delivery_date"
                                                        placeholder="Enter Your " required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="employee_id" class="col-sm-3 col-form-label">
                                                Address <span style="color: red;">*</span></label>
                                            <div class="col-sm-9">
                                                <textarea type="text" class="form-control" name="address" placeholder="Enter Your " required></textarea>
                                            </div>
                                        </div>


                                            <div class="row mb-4">
                                                <label for="note" class="col-sm-3 col-form-label">
                                                    Note</label>
                                                <div class="col-sm-9">
                                                    <textarea type="number" class="form-control" name="note" placeholder="Enter Your " required></textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-3 file-1">
                                                <div class="col-sm-3">
                                                    <p>Pricing</p>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" name="field_title_1"
                                                        placeholder="Product Name">
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control" name="field_unit_1"
                                                        id="field_unit_1" placeholder="Unit" onchange="totalcalculate()">
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control" name="field_unit_price_1"
                                                        id="field_unit_price_1" placeholder="Price"
                                                        onchange="totalcalculate()">
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control" name="field_total_1"
                                                        id="field_total_1" placeholder="Total" onchange="totalcalculate()">
                                                </div>
                                                <div class="col-sm-1">
                                                            <input data-repeater-create type="button" class="btn btn-success inner" value="Add"/>
                                                </div>
                                            </div>
                                            <div class="row mb-3 file-6">
                                                <label for="note" class="col-sm-6 col-form-label">
                                                    Over All Total Amount</label>
                                                <div class="col-sm-5">
                                                    <input type="number" class="form-control" name="over_all_total"
                                                        id="over_all_total" placeholder="Total">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Create New Order</button>
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
