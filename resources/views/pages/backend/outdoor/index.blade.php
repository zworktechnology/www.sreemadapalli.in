@extends('layouts.login')

@section('content')
    <div id="layout-wrapper">

        @include('layouts.general.notify-leftbar')

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Out door</h4>
                            <div class="page-title-right">
                                <div style="display: flex;">
                                    <div>
                                        <button type="button" class="btn btn-success w-md" data-bs-toggle="modal"
                                            data-bs-target=".bs-example-modal-lg">Create</button>

                                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            @include('pages.backend.outdoor.create')
                                        </div>
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
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="expensedatatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead style="background: #CBE2DF">
                                        <tr>
                                            <th>Sl. No</th>
                                            <th>Name</th>
                                            <th>Contact Number</th>
                                            <th>Booking Date</th>
                                            <th>Delivery Date & Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $keydata => $datas)
                                            <tr>
                                                <td>{{ ++$keydata }}</td>
                                                <td>{{ $datas->name }}</td>
                                                <td>{{ $datas->contact_number }}</td>
                                                <td>{{ date('d-m-Y', strtotime($datas->booking_date)) }}</td>
                                                <td>{{ date('d-m-Y | h:i A', strtotime($datas->delivery_date)) }}</td>
                                                <td>
                                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                                        <li>
                                                            <a href="#jobDelivered{{ $datas->id }}"
                                                                data-bs-toggle="modal"
                                                                class="btn btn-sm btn-soft-warning"><i
                                                                    class="mdi mdi-pencil-outline"></i> Delivered</a>
                                                        </li>
                                                        <li>
                                                            <a href="#jobView{{ $datas->id }}" data-bs-toggle="modal"
                                                                class="btn btn-sm btn-soft-secondary"><i
                                                                    class="mdi mdi-eye-circle-outline"></i> View</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('outdoor.edit', ['id' => $datas->id]) }}"
                                                                class="btn btn-sm btn-soft-info"><i
                                                                    class="mdi mdi-pencil-outline"></i> Edit</a>
                                                        </li>
                                                        <li>
                                                            <a href="#jobDelete{{ $datas->id }}" data-bs-toggle="modal"
                                                                class="btn btn-sm btn-soft-danger"><i
                                                                    class="mdi mdi-delete-outline"></i> Delete</a>
                                                        </li>
                                                        <li>
                                                        <a href="/outdoor_export/{{ $datas->id }}" class="nofilter ">
                                                            <button
                                                            class="btn btn-sm btn-soft-primary"
                                                            style="border-top-left-radius: 4px; border-bottom-left-radius: 4px;">
                                                            Export as</button>
                                                        </a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="jobDelete{{ $datas->id }}" tabindex="-1"
                                                aria-labelledby="jobDeleteLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-body px-4 py-5 text-center">
                                                            <div class="avatar-sm mb-4 mx-auto">
                                                                <div
                                                                    class="avatar-title bg-primary text-primary bg-opacity-10 font-size-20 rounded-3">
                                                                    <i class="mdi mdi-trash-can-outline"></i>
                                                                </div>
                                                            </div>
                                                            <p class="text-muted font-size-16 mb-4">Please confirm that
                                                                you wish to remove the outdoor.</p>

                                                            <div class="hstack gap-2 justify-content-center mb-0">
                                                                <form autocomplete="off" method="POST"
                                                                    action="{{ route('outdoor.delete', ['id' => $datas->id]) }}">
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-danger">Yes,
                                                                        Delete</button>
                                                                </form>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">No, Get Back</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="jobView{{ $datas->id }}" tabindex="-1"
                                                aria-labelledby="jobViewLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-body px-4 py-5 text-center">
                                                            <div>
                                                                <p class="font-size-16 mb-4" style="color:red;">
                                                                    Address <br><span style="color:black;">
                                                                        {{ $datas->address }}</span></p>
                                                                <p class="font-size-16 mb-4" style="color:red;">Note<br><span style="color:black;">
                                                                        {!! $datas->note !!}</span></p>
                                                                <p class="font-size-16 mb-4" style="color:red;">Order
                                                                    Summary <br>
                                                                    <span style="color:black;">{!! $datas->field_title_1 !!}  {!! $datas->field_unit_1 !!}</span><br>
                                                                    <span style="color:black;">{!! $datas->field_title_2 !!}  {!! $datas->field_unit_2 !!}</span><br>
                                                                    <span style="color:black;">{!! $datas->field_title_3 !!}  {!! $datas->field_unit_3 !!}</span><br>
                                                                    <span style="color:black;">{!! $datas->field_title_4 !!}  {!! $datas->field_unit_4 !!}</span><br>
                                                                    <span style="color:black;">{!! $datas->field_title_5 !!}  {!! $datas->field_unit_5 !!}</span><br>
                                                                    <span style="color:black;">{!! $datas->field_title_6 !!}  {!! $datas->field_unit_6 !!}</span><br>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="jobDelivered{{ $datas->id }}" tabindex="-1"
                                                aria-labelledby="jobDeliveredLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-body px-4 py-5 text-center">
                                                            <div class="avatar-sm mb-4 mx-auto">
                                                                <div
                                                                    class="avatar-title bg-primary text-primary bg-opacity-10 font-size-20 rounded-3">
                                                                    <i class="mdi mdi-trash-can-outline"></i>
                                                                </div>
                                                            </div>
                                                            <p class="text-muted font-size-16 mb-4">Please confirm that
                                                                you delivery the order.</p>

                                                            <div class="hstack gap-2 justify-content-center mb-0">
                                                                <form autocomplete="off" method="POST"
                                                                    action="{{ route('outdoor.delivered', ['id' => $datas->id]) }}">
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-danger">Yes,
                                                                        Delivered</button>
                                                                </form>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">No, Get Back</button>
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
