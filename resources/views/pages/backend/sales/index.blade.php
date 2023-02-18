@extends('layouts.login')

@section('content')
<div id="layout-wrapper">

    @include('layouts.general.left-bar')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-5">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Sales</h4>
                        </div>
                    </div>
                    <div class="col-5" style="display: flex;">
                        <div class="row mb-4 col-10 ">
                            <div class="col-sm-12">
                                <input type="date" class="form-control" name="from_date" placeholder="Enter Your " required>
                            </div>
                        </div>
                        <div class="row mb-4 col-2" style="margin-left: 10px; margin-right: 10px;">
                            <button type="button" class="btn btn-success w-md" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Search</button>
                        </div>
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-success w-md" data-bs-toggle="modal" data-bs-target="#exampleModalFullscreen">Create</button>

                        <div id="exampleModalFullscreen" class="modal fade" tabindex="-1" aria-labelledby="#exampleModalFullscreenLabel" aria-hidden="true">
                            @include('pages.backend.sales.create')
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
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Total Delivery Sales</p>
                                        <h4 class="mb-0">{{ $breakfast_data_total + $lunch_data_total + $dinner_data_total }}</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="mini-stat-icon avatar-sm rounded-circle">
                                            <span class="avatar-title" style="background-color: black !important">
                                                <i class="bx bx-copy-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Cash</p>
                                        <h4 class="mb-0">{{ $breakfast_data_pm_cash + $lunch_data_pm_cash + $dinner_data_pm_cash }}</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="mini-stat-icon avatar-sm rounded-circle">
                                            <span class="avatar-title" style="background-color: black !important">
                                                <i class="bx bx-copy-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Wallet</p>
                                        <h4 class="mb-0">{{ $breakfast_data_pm_wallet + $lunch_data_pm_wallet + $dinner_data_pm_wallet }}</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="mini-stat-icon avatar-sm rounded-circle">
                                            <span class="avatar-title" style="background-color: black !important">
                                                <i class="bx bx-copy-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Pending</p>
                                        <h4 class="mb-0">{{ $breakfast_data_ps_pending + $lunch_data_ps_pending + $dinner_data_ps_pending }}</h4>
                                    </div>

                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="mini-stat-icon avatar-sm rounded-circle">
                                            <span class="avatar-title" style="background-color: black !important">
                                                <i class="bx bx-copy-alt font-size-24"></i>
                                            </span>
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
                                    <thead style="background: lightgrey">
                                        <tr>
                                            <th>Session</th>
                                            <th>Date</th>
                                            <th>Invoice ID</th>
                                            <th>Customer</th>
                                            <th>Price</th>
                                            <th>Delivery By</th>
                                            <th>Payment Status</th>
                                            @hasrole('Super-Admin')
                                            <th>Status</th>
                                            <th>Action</th>
                                            @endhasrole
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($breakfast_data as $keydata => $datas)
                                        <tr>
                                            <td>Break Fast</td>
                                            <td>{{ date('d - m - Y', strtotime($datas->date)) }}</td>
                                            <td>#{{ $datas->invoice_no }}</td>
                                            <td>{{ $datas->customer->name }}</td>
                                            <td>{{ $datas->bill_amount }}</td>
                                            <td>{{ $datas->delivery_boy }}</td>
                                            <td>{{ $datas->payment_status }}</td>
                                            @hasrole('Super-Admin')
                                            <td>
                                                @if ($datas->soft_delete == 1)
                                                <span class="badge bg-danger">Deleted</span>
                                                @else
                                                <span class="badge bg-success">Active</span>
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="list-unstyled hstack gap-1 mb-0">
                                                    <li>
                                                        <a href="{{ route('breakfast.edit', ['id' => $datas->id]) }}" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#jobDelete{{ $datas->id }}" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                            @endhasrole
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
                                                        <p class="text-muted font-size-16 mb-4">Please confirm that you wish to remove the record.</p>

                                                        <div class="hstack gap-2 justify-content-center mb-0">
                                                            <form autocomplete="off" method="POST" action="{{ route('breakfast.delete', ['id' => $datas->id]) }}">
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
                                        @foreach ($lunch_data as $keydata => $datas)
                                        <tr>
                                            <td>Lunch</td>
                                            <td>{{ date('d - m - Y', strtotime($datas->date)) }}</td>
                                            <td>#{{ $datas->invoice_no }}</td>
                                            <td>{{ $datas->customer->name }}</td>
                                            <td>{{ $datas->bill_amount }}</td>
                                            <td>{{ $datas->delivery_boy }}</td>
                                            <td>{{ $datas->payment_status }}</td>
                                            @hasrole('Super-Admin')
                                            <td>
                                                @if ($datas->soft_delete == 1)
                                                <span class="badge bg-danger">Deleted</span>
                                                @else
                                                <span class="badge bg-success">Active</span>
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="list-unstyled hstack gap-1 mb-0">
                                                    <li>
                                                        <a href="{{ route('lunch.edit', ['id' => $datas->id]) }}" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#jobDelete{{ $datas->id }}" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                            @endhasrole
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
                                                        <p class="text-muted font-size-16 mb-4">Please confirm that you wish to remove the record.</p>

                                                        <div class="hstack gap-2 justify-content-center mb-0">
                                                            <form autocomplete="off" method="POST" action="{{ route('lunch.delete', ['id' => $datas->id]) }}">
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
                                        @foreach ($dinner_data as $keydata => $datas)
                                        <tr>
                                            <td>Dinner</td>
                                            <td>{{ date('d - m - Y', strtotime($datas->date)) }}</td>
                                            <td>#{{ $datas->invoice_no }}</td>
                                            <td>{{ $datas->customer->name }}</td>
                                            <td>{{ $datas->bill_amount }}</td>
                                            <td>{{ $datas->delivery_boy }}</td>
                                            <td>{{ $datas->payment_status }}</td>
                                            @hasrole('Super-Admin')
                                            <td>
                                                @if ($datas->soft_delete == 1)
                                                <span class="badge bg-danger">Deleted</span>
                                                @else
                                                <span class="badge bg-success">Active</span>
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="list-unstyled hstack gap-1 mb-0">
                                                    <li>
                                                        <a href="{{ route('dinner.edit', ['id' => $datas->id]) }}" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#jobDelete{{ $datas->id }}" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                            @endhasrole
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
                                                        <p class="text-muted font-size-16 mb-4">Please confirm that you wish to remove the record.</p>

                                                        <div class="hstack gap-2 justify-content-center mb-0">
                                                            <form autocomplete="off" method="POST" action="{{ route('dinner.delete', ['id' => $datas->id]) }}">
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

    </div>
</div>
@endsection
