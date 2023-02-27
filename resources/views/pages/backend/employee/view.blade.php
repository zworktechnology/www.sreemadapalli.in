@extends('layouts.login')

@section('content')
<div id="layout-wrapper">

    @include('layouts.general.left-bar')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Staff & Sales - {{ $data->name }}</h4>
                        <div class="page-title-right" hidden>
                            <div style="display: flex;">
                                <div style="margin-right: 10px;">
                                    <input type="date" class="form-control" name="from_date" id="from_date" placeholder="Enter Your " required value="{{ $today }}">
                                </div>
                                <div style="margin-right: 10px;">
                                    <input type="date" class="form-control" name="to_date" id="to_date" placeholder="Enter Your " required value="{{ $today }}">
                                </div>
                                <div style="margin-right: 10px;">
                                    <button type="button" class="btn btn-success w-md" id="customer_datearr">Search</button>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-success w-md" id="customer_datearr">Export as PDF</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mini-stats-wid">
                                    <div class="card-body" style="background-color: #D9A5F9;">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium mb-2" style="color: black !important; font-weight: bold;">Total Amount</p>
                                                <h4 class="mb-0" style="color: red !important;">₹ {{ $expence_total_amount }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Sl. No</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Note</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($expence as $keydata => $expences)
                                        <tr>
                                            <td>{{ ++$keydata }}</td>
                                            <td>{{ date('d - m - Y', strtotime($expences->date)) }}</td>
                                            <td>₹ {{ $expences->amount }}</td>
                                            <td>{{ $expences->note }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
