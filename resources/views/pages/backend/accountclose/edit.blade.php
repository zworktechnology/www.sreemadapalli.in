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
                            <h4 class="mb-sm-0 font-size-18">Open Account - {{ date('d.m.Y', strtotime($data->date)) }}</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <form autocomplete="off" method="POST" action="{{ route('accountclose.update', ['id' => $data->id]) }}" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row mb-4">
                                            <label for="date" class="col-sm-3 col-form-label">
                                                Date <span style="color: red;">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="date" placeholder="Enter Your " required value="{{ $data->date }}">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="case_on_hand" class="col-sm-3 col-form-label">
                                                Paytm <span style="color: red;">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="case_on_hand" placeholder="Enter Your " required value="{{ $data->case_on_hand }}">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="g_pay" class="col-sm-3 col-form-label">
                                                G Pay <span style="color: red;">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="g_pay" placeholder="Enter Your " required value={{ $data->g_pay }}>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="g_pay_business" class="col-sm-3 col-form-label">
                                                G Pay Business<span style="color: red;">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="g_pay_business" placeholder="Enter Your " required value={{ $data->g_pay_business }}>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="phone_pay" class="col-sm-3 col-form-label">
                                                Phone Pe <span style="color: red;">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="phone_pay" placeholder="Enter Your " required value={{ $data->phone_pay }}>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="card" class="col-sm-3 col-form-label">
                                                Card <span style="color: red;">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="card" placeholder="Enter Your " required value={{ $data->card }}>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="other_case" class="col-sm-3 col-form-label">
                                                Other Cash <span style="color: red;">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="other_case" placeholder="Enter Your " required value={{ $data->other_case }}>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label for="sales_amount" class="col-sm-3 col-form-label">
                                                Sales <span style="color: red;">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="sales_amount" placeholder="Enter Your " required value={{ $data->sales_amount }}>
                                            </div>
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
