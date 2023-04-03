@extends('layouts.login')

@section('content')
<div id="layout-wrapper">

    @include('layouts.general.notify-leftbar')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Denomination - {{ date('d M Y', strtotime($today)) }}</h4>
                            <div class="page-title-right">
                                <div style="display: flex;">
                                    <form autocomplete="off" method="POST" action="{{ route('determination.dailyfilter') }}" style="display: flex;">
                                        @method('PUT')

                                        @csrf
                                        <div style="margin-right: 10px;">
                                            <input type="date" class="form-control" name="date" id="date" placeholder="Enter Your " required value="{{ $today }}">
                                        </div>
                                        <div style="margin-right: 10px;">
                                            <button type="submit" class="px-4 py-2 bg-black text-white rounded font-bold font-serif shadow-sm shadow-red-300">
                                                Search</button>
                                        </div>
                                    </form>
                                    <button type="button" class="btn btn-success w-md" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Create</button>

                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        @include('pages.backend.determination.create')
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

                <div class="col-md-12">
                    <div class="card mini-stats-wid">
                        <div class="card-body" style="background-color: #B8FF72;">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium" style="color: black !important; font-weight: bold;">Total Denomination</p>
                                    <h4 class="mb-0" style="color: red !important;">₹ {{ $total }}</h4>
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
                                    <thead style="background: #F4EA8F">
                                        <tr>
                                            <th>2000</th>
                                            <th>500</th>
                                            <th>200</th>
                                            <th>100</th>
                                            <th>50</th>
                                            <th>20</th>
                                            <th>10</th>
                                            <th>5</th>
                                            <th>2</th>
                                            <th>1</th>
                                            <th hidden>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $keydata => $datas)
                                        <tr>
                                            <td>{{ $datas->count_2000 }} = {{ $datas->total_2000 }}</td>
                                            <td>{{ $datas->count_500 }} = {{ $datas->total_500 }}</td>
                                            <td>{{ $datas->count_200 }} = {{ $datas->total_200 }}</td>
                                            <td>{{ $datas->count_100 }} = {{ $datas->total_100 }}</td>
                                            <td>{{ $datas->count_50 }} = {{ $datas->total_50 }}</td>
                                            <td>{{ $datas->count_20 }} = {{ $datas->total_20 }}</td>
                                            <td>{{ $datas->count_10 }} = {{ $datas->total_10 }}</td>
                                            <td>{{ $datas->count_5 }} = {{ $datas->total_5 }}</td>
                                            <td>{{ $datas->count_2 }} = {{ $datas->total_2 }}</td>
                                            <td>{{ $datas->count_1 }} = {{ $datas->total_1 }}</td>
                                            <td hidden>{{ $datas->total }}</td>
                                            <td>
                                                <ul class="list-unstyled hstack gap-1 mb-0">
                                                    <li>
                                                        <a href="{{ route('determination.edit', ['id' => $datas->id]) }}" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i> Edit</a>
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
                                                        <p class="text-muted font-size-16 mb-4">Please confirm that you wish to remove the record.</p>

                                                        <div class="hstack gap-2 justify-content-center mb-0">
                                                            <form autocomplete="off" method="POST" action="{{ route('determination.delete', ['id' => $datas->id]) }}">
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
