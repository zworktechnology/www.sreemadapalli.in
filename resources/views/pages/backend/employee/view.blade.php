@extends('layouts.login')

@section('content')
<div id="layout-wrapper">

    @include('layouts.general.left-bar')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Staff & Sales - {{ $data->name }}</h4>
                        </div>
                    </div>
                    <div class="col-8" style="display: flex;">
                        <div class="row mb-4 col-4">
                            <div class="col-sm-12">
                                <input type="date" class="form-control" name="from_date" placeholder="Enter Your " required>
                            </div>
                        </div>
                        <div class="row mb-4 col-4" style="margin-left: 5px;">
                            <div class="col-sm-12">
                                <input type="date" class="form-control" name="to_date" placeholder="Enter Your " required>
                            </div>
                        </div>
                        <div class="row mb-4 col-2" style="margin-left: 10px; margin-right: 10px;">
                            <button type="button" class="btn btn-success w-md" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Search</button>
                        </div>
                        <div class="row mb-4 col-2" style="margin-left: 10px;">
                            <button type="button" class="btn btn-success w-md" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Export as PDF</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium mb-2">Phone Number</p>
                                                <h4 class="mb-0">{{ $data->contact_number }}</h4>
                                            </div>

                                            <div class="flex-shrink-0 align-self-center">
                                                <div class="avatar-sm mini-stat-icon rounded-circle bg-primary">
                                                    <span class="avatar-title" style="background-color: blue !important">
                                                        <i class="bx bx-check-circle font-size-24"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium mb-2">Address</p>
                                                <h4 class="mb-0">{!! $data->address !!}</h4>
                                            </div>

                                            <div class="flex-shrink-0 align-self-center">
                                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                    <span class="avatar-title" style="background-color: green !important">
                                                        <i class="bx bx-check-circle font-size-24"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium mb-2">Total Amount</p>
                                                <h4 class="mb-0">{{ $expence_total_amount }}</h4>
                                            </div>

                                            <div class="flex-shrink-0 align-self-center">
                                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                    <span class="avatar-title" style="background-color: red !important">
                                                        <i class="bx bx-check-circle font-size-24"></i>
                                                    </span>
                                                </div>
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
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Note</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($expence as $keydata => $expences)
                                        <tr>
                                            <td>{{ ++$keydata }}</td>
                                            <td>{{ date('d - m - Y', strtotime($expences->date)) }}</td>
                                            <td>{{ $expences->amount }}</td>
                                            <td>{{ $expences->note }}</td>
                                            @hasrole('Super-Admin')
                                            <td>
                                                @if ($expences->soft_delete == 1)
                                                <span class="badge bg-danger">In Active</span>
                                                @else
                                                <span class="badge bg-success">Active</span>
                                                @endif
                                            </td>
                                            @endhasrole
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
