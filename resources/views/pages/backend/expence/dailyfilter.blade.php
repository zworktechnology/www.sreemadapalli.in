@extends('layouts.login')

@section('content')
<div id="layout-wrapper">

    @include('layouts.general.left-bar')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Expense - {{ date('d - M - Y', strtotime($daily_date)) }}</h4>
                        <div class="page-title-right">
                            <div style="display: flex;">
                                <form autocomplete="off" method="POST" action="{{ route('expence.dailyfilter') }}" style="display: flex;">
                                    @method('PUT')
                                    @csrf
                                    <div style="margin-right: 10px;">
                                        <input type="date" class="form-control" name="date" id="date" placeholder="Enter Your " required value="{{ $daily_date }}">
                                    </div>
                                    <div style="margin-right: 10px;">
                                        <button type="submit" class="px-4 py-2 bg-black text-white rounded font-bold font-serif shadow-sm shadow-red-300">
                                            Search</button>
                                    </div>
                                    <a href="/pdfexportexpence/{{ $daily_date }}" class="nofilter " style="margin-right: 10px;">
                                        <button type="button" class="px-4 py-2 bg-black text-white rounded font-bold font-serif shadow-sm shadow-red-300">
                                            Export as PDF</button>
                                    </a>
                                </form>
                                <div>
                                    <a href="/zwork-admin/expence">
                                        <button type="button" class="btn btn-success w-md">Back</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (\Session::has('add'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-all me-2"></i>
                {!! \Session::get('add') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (\Session::has('update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-bullseye-arrow me-2"></i>
                {!! \Session::get('update') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (\Session::has('soft_destroy'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="mdi mdi-block-helper me-2"></i>
                {!! \Session::get('soft_destroy') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (\Session::has('destroy'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="mdi mdi-block-helper me-2"></i>
                {!! \Session::get('destroy') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="row">
                <div style="display: flex;">
                    <div class="col-md-4" style="margin-right: 5px;">
                        <div class="card mini-stats-wid">
                            <div class="card-body" style="background-color: #B8FF72;">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium" style="color: black !important; font-weight: bold;">Total Expence -- Pending</p>
                                        <h4 class="mb-0" style="color: red !important;">₹ {{ $total_pending }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body" style="background-color: #01aef0;">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium" style="color: black !important; font-weight: bold;">Total Expence -- Paid</p>
                                        <h4 class="mb-0" style="color: red !important;">₹ {{ $total_paid }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body" style="background-color: #9ab3c3;">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium" style="color: black !important; font-weight: bold;">Total Expence</p>
                                        <h4 class="mb-0" style="color: red !important;">₹ {{ $total }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="expensedatatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead style="background: #EEBE78">
                                    <tr>
                                        <th>Sl. No</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Note</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expense_data as $keydata => $datas)
                                    <tr>
                                        <td>{{ ++$keydata }}</td>
                                        <td>{{ $datas->employee->name }}</td>
                                        <td>{{ date('d - m - Y', strtotime($datas->date)) }}</td>
                                        <td>₹ {{ $datas->amount }}</td>
                                        @if ( $datas->status == 'Pending')
                                        <td style="background-color: red; color: white;">G-pay</td>
                                        @else
                                        <td style="background-color: green; color: white;">Cash</td>
                                        @endif
                                        <td>{{ $datas->note }}</td>
                                        <td>
                                            <ul class="list-unstyled hstack gap-1 mb-0">
                                                <li>
                                                    <a href="{{ route('expence.edit', ['id' => $datas->id]) }}" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i> Edit</a>
                                                </li>
                                                <li>
                                                    <a href="#jobDelete{{ $datas->id }}" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i> Delete</a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="jobDelete{{ $datas->id }}" tabindex="-1" aria-labelledby="jobDeleteLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-body px-4 py-5 text-center">
                                                    <div class="avatar-sm mb-4 mx-auto">
                                                        <div class="avatar-title bg-primary text-primary bg-opacity-10 font-size-20 rounded-3">
                                                            <i class="mdi mdi-trash-can-outline"></i>
                                                        </div>
                                                    </div>
                                                    <p class="text-muted font-size-16 mb-4">Please confirm that you wish to remove the expence.</p>

                                                    <div class="hstack gap-2 justify-content-center mb-0">
                                                        <form autocomplete="off" method="POST" action="{{ route('expence.delete', ['id' => $datas->id]) }}">
                                                            @method('PUT')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                        </form>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Get Back</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <script>
        $(document).ready(function() {
            $('#expensedatatable').DataTable();
        });

    </script>
</div>
</div>
@endsection
