@extends('layouts.login')

@section('content')
    <div id="layout-wrapper">

        @include('layouts.general.notify-leftbar')

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18 pointer">
                                <div data-bs-toggle="modal" data-bs-target="#staticBackdropfull">Sales</div>
                            </h4>
                            <div class="modal fade" id="staticBackdropfull" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                @include('pages.backend.sales.addon.full')
                            </div>

                            <div class="page-title-right">
                                <div style="display: flex;">
                                    <form autocomplete="off" method="POST" action="{{ route('sales.dailyfilter') }}"
                                        style="display: flex;">
                                        @method('PUT')

                                        @csrf
                                        <div style="margin-right: 10px;">
                                            <input type="date" class="form-control" name="daily_date" id="daily_date"
                                                placeholder="Enter Your " value="{{ $today }}" required>
                                        </div>
                                        <div style="margin-right: 10px;">
                                            <button type="submit"
                                                class="px-4 py-2 bg-black text-white rounded font-bold font-serif shadow-sm shadow-red-300">
                                                Search</button>

                                        </div>
                                    </form>
                                    <a href="javascript:void(0)" class="nofilter ">
                                        <button
                                            class="px-4 py-2 bg-black text-white font-bold font-serif shadow-sm shadow-red-300"
                                            style="border-top-left-radius: 4px; border-bottom-left-radius: 4px;">
                                            Export as</button>
                                    </a>
                                    <a href="/pdf_export/{{ $today }}" class="nofilter ">
                                        <button type="button"
                                            class="px-4 py-2 bg-black text-white font-bold font-serif shadow-sm shadow-red-300">
                                            All</button>
                                    </a>
                                    <a href="/pdfbybreafast/{{ $today }}" class="nofilter ">
                                        <button type="button"
                                            class="px-4 py-2 bg-black text-white font-bold font-serif shadow-sm shadow-red-300">
                                            Breakfast</button>
                                    </a>
                                    <a href="/pdfbylunch/{{ $today }}" class="nofilter ">
                                        <button type="button"
                                            class="px-4 py-2 bg-black text-white font-bold font-serif shadow-sm shadow-red-300">
                                            Lunch</button>
                                    </a>
                                    <a href="/pdfbydinner/{{ $today }}" class="nofilter ">
                                        <button type="button"
                                            class="px-4 py-2 bg-black text-white font-bold font-serif shadow-sm shadow-red-300"
                                            style="border-top-right-radius: 4px; border-bottom-right-radius: 4px;">
                                            Dinner</button>
                                    </a>
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
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-2 col-12 pointer">
                                    <table class="table table-bordered dt-responsive nowrap w-100"
                                        style="background-color: #CADAF1;">
                                        <thead>
                                            <tr>
                                                <th><b>Breakfast</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="color: red !important;"><b>Cash </b><span style="color: black">₹
                                                        {{ $breakfast_data_pm_cash }}</span></td>
                                            </tr>
                                            <tr>
                                                <td style="color: red !important;"><b>Pending </b><span
                                                        style="color: black">₹ {{ $breakfast_data_ps_pending }}</span></td>
                                            </tr>
                                            <tr>
                                                <td style="color: red !important;"><b>Total Amount </b><span
                                                        style="color: black">₹ {{ $breakfast_data_pm_total }}</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-2 col-12 pointer">
                                    <table class="table table-bordered dt-responsive nowrap w-100"
                                        style="background-color: #B8FF72;">
                                        <thead>
                                            <tr>
                                                <th><b>Lunch</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="color: red !important;"><b>Cash </b><span style="color: black">₹
                                                        {{ $lunch_data_pm_cash }}</span></td>
                                            </tr>
                                            <tr>
                                                <td style="color: red !important;"><b>Pending </b><span
                                                        style="color: black">₹ {{ $lunch_data_ps_pending }}</span></td>
                                            </tr>
                                            <tr>
                                                <td style="color: red !important;"><b>Total Amount </b><span
                                                        style="color: black">₹ {{ $lunch_data_pm_total }}</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-2 col-12 pointer">
                                    <table class="table table-bordered dt-responsive nowrap w-100"
                                        style="background-color: #FFEE93;">
                                        <thead>
                                            <tr>
                                                <th><b>Dinner</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="color: red !important;"><b>Cash </b><span
                                                        style="color: black">₹ {{ $dinner_data_pm_cash }}</span></td>
                                            </tr>
                                            <tr>
                                                <td style="color: red !important;"><b>Pending </b><span
                                                        style="color: black">₹ {{ $dinner_data_ps_pending }}</span></td>
                                            </tr>
                                            <tr>
                                                <td style="color: red !important;"><b>Total Amount </b><span
                                                        style="color: black">₹ {{ $dinner_data_pm_total }}</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-3 col-12 pointer">
                                    <div>
                                        <div data-bs-toggle="modal" data-bs-target="#staticBackdropwallet">
                                            <table class="table table-bordered dt-responsive nowrap w-100"
                                                style="background-color: #E5FF8E;">
                                                <thead>
                                                    <tr>
                                                        <th><b>Wallet</b></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="color: red !important;"><span style="color: black">₹
                                                                {{ $total_wallet }}</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal fade" id="staticBackdropwallet" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" role="dialog"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            @include('pages.backend.sales.addon.wallet')
                                        </div>
                                    </div>
                                    <div>
                                        <table class="table table-bordered dt-responsive nowrap w-100"
                                            style="background-color: #f0e659c2;">
                                            <thead>
                                                <tr>
                                                    <th><b>Pending Amount</b></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12 pointer">
                                    <div>
                                        <div data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            <table class="table table-bordered dt-responsive nowrap w-100"
                                                style="background-color: #E2CFCF;">
                                                <thead>
                                                    <tr>
                                                        <th><b>Total Delivery Count</b></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="color: red !important;">
                                                            <span style="color: black">
                                                                <div style="display: none">
                                                                    {{ $totalcount = 0 }}
                                                                </div>
                                                                @foreach ($deliveryboys_arr as $deliveryboys_a)
                                                                    <div style="display: none">
                                                                        {{ $totalcount += $deliveryboys_a['delivery_count'] }}
                                                                    </div>
                                                                @endforeach
                                                                {{ $total_delivey_count }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" role="dialog"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            @include('pages.backend.sales.addon.deliveryby')
                                        </div>
                                    </div>
                                    <div>
                                        <table class="table table-bordered dt-responsive nowrap w-100"
                                            style="background-color: #f0e659c2;">
                                            <thead>
                                                <tr>
                                                    <th class="mb-0 pendingamount" style="color: red !important;">₹</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="todaydatatable"
                                            class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead style="background: #CAF1DE">
                                                <tr>
                                                    <th>Bill No</th>
                                                    <th>Customer</th>
                                                    <th>Amount</th>
                                                    <th>Session</th>
                                                    <th>Delivery By</th>
                                                    <th>Payment Via</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="today_data">
                                                @foreach ($daily_Data as $keydata => $outputs)
                                                    <tr>
                                                        <td>{{ $outputs['invoice_no'] }}</td>
                                                        <td>{{ $outputs['customer'] }}</td>
                                                        <td>₹ {{ $outputs['bill_amount'] }}</td>
                                                        <td>{{ $outputs['title'] }}</td>
                                                        <td>{{ $outputs['devlivery_by'] }}</td>

                                                        @if ($outputs['payment_method'] == 'Cash')
                                                            <td style="color: white; background-color: #589b31;"><img
                                                                    src="{{ asset('assets/images/cash.jpg') }}"
                                                                    style="width: 15px; height: 15px;" />
                                                                {{ $outputs['payment_method'] }}</td>
                                                        @elseif ($outputs['payment_method'] == 'G-Pay Business')
                                                            <td style="color: white; background-color: #fbbb04;"><img
                                                                    src="{{ asset('assets/images/gpayb.png') }}"
                                                                    style="width: 15px; height: 15px;" />
                                                                {{ $outputs['payment_method'] }}</td>
                                                        @elseif ($outputs['payment_method'] == 'G-Pay')
                                                            <td style="color: white; background-color: #fbbb04;"><img
                                                                    src="{{ asset('assets/images/gpay.png') }}"
                                                                    style="width: 15px; height: 15px;" />
                                                                {{ $outputs['payment_method'] }}</td>
                                                        @elseif ($outputs['payment_method'] == 'Phone Pe')
                                                            <td style="color: white; background-color: #5f259f;"><img
                                                                    src="{{ asset('assets/images/phonepay.png') }}"
                                                                    style="width: 15px; height: 15px;" />
                                                                {{ $outputs['payment_method'] }}</td>
                                                        @elseif ($outputs['payment_method'] == 'Paytm')
                                                            <td style="color: white; background-color: #01aef0;"><img
                                                                    src="{{ asset('assets/images/paytm.png') }}"
                                                                    style="width: 15px; height: 15px;" />
                                                                {{ $outputs['payment_method'] }}</td>
                                                        @elseif ($outputs['payment_method'] == 'Card')
                                                            <td style="color: white; background-color: #9ab3c3;"><img
                                                                    src="{{ asset('assets/images/card.png') }}"
                                                                    style="width: 15px; height: 15px;" />
                                                                {{ $outputs['payment_method'] }}</td>
                                                        @else
                                                            <td style="color: white; background-color: #ff3d3d;"><img
                                                                    src="{{ asset('assets/images/pending.png') }}"
                                                                    style="width: 15px; height: 15px;" />
                                                                {{ $outputs['payment_method'] }}</td>
                                                        @endif

                                                        <td>
                                                            @if ($outputs['title'] == 'Break Fast')
                                                                <ul class="list-unstyled hstack gap-1 mb-0">
                                                                    <li>
                                                                        <a href="{{ route('breakfast.edit', ['id' => $outputs['id']]) }}"
                                                                            class="btn btn-sm btn-soft-info"><i
                                                                                class="mdi mdi-pencil-outline"></i>
                                                                            Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#jobDelete{{ $outputs['id'] }}"
                                                                            data-bs-toggle="modal"
                                                                            class="btn btn-sm btn-soft-danger"><i
                                                                                class="mdi mdi-delete-outline"></i>
                                                                            Delete</a>
                                                                    </li>
                                                                </ul>
                                                            @elseif($outputs['title'] == 'Lunch')
                                                                <ul class="list-unstyled hstack gap-1 mb-0">
                                                                    <li>
                                                                        <a href="{{ route('lunch.edit', ['id' => $outputs['id']]) }}"
                                                                            class="btn btn-sm btn-soft-info"><i
                                                                                class="mdi mdi-pencil-outline"></i>
                                                                            Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#jobDelete{{ $outputs['id'] }}"
                                                                            data-bs-toggle="modal"
                                                                            class="btn btn-sm btn-soft-danger"><i
                                                                                class="mdi mdi-delete-outline"></i>
                                                                            Delete</a>
                                                                    </li>
                                                                </ul>
                                                            @elseif($outputs['title'] == 'Dinner')
                                                                <ul class="list-unstyled hstack gap-1 mb-0">
                                                                    <li>
                                                                        <a href="{{ route('dinner.edit', ['id' => $outputs['id']]) }}"
                                                                            class="btn btn-sm btn-soft-info"><i
                                                                                class="mdi mdi-pencil-outline"></i>
                                                                            Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#jobDelete{{ $outputs['id'] }}"
                                                                            data-bs-toggle="modal"
                                                                            class="btn btn-sm btn-soft-danger"><i
                                                                                class="mdi mdi-delete-outline"></i>
                                                                            Delete</a>
                                                                    </li>
                                                                </ul>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade" id="jobDelete{{ $outputs['id'] }}"
                                                        tabindex="-1" aria-labelledby="jobDeleteLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-body px-4 py-5 text-center">
                                                                    <div class="avatar-sm mb-4 mx-auto">
                                                                        <div
                                                                            class="avatar-title bg-primary text-primary bg-opacity-10 font-size-20 rounded-3">
                                                                            <i class="mdi mdi-trash-can-outline"></i>
                                                                        </div>
                                                                    </div>
                                                                    <p class="text-muted font-size-16 mb-4">Please confirm
                                                                        that
                                                                        you wish to remove the record.</p>

                                                                    <div class="hstack gap-2 justify-content-center mb-0">
                                                                        @if ($outputs['title'] == 'Break Fast')
                                                                            <form autocomplete="off" method="POST"
                                                                                action="{{ route('breakfast.delete', ['id' => $outputs['id']]) }}">
                                                                            @elseif($outputs['title'] == 'Lunch')
                                                                                <form autocomplete="off" method="POST"
                                                                                    action="{{ route('lunch.delete', ['id' => $outputs['id']]) }}">
                                                                                @elseif($outputs['title'] == 'Dinner')
                                                                                    <form autocomplete="off"
                                                                                        method="POST"
                                                                                        action="{{ route('dinner.delete', ['id' => $outputs['id']]) }}">
                                                                        @endif
                                                                        @method('PUT')
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-danger">Yes,
                                                                            Delete</button>
                                                                        </form>
                                                                        </form>
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
                        <div class="col-md-3">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        @include('pages.backend.sales.create')
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" hidden>
                                                    <h5 class="modal-title" id="staticBackdropLabel"
                                                        style="margin-bottom: 20px;">New Customer</h5>
                                                </div>
                                                <form autocomplete="off" method="POST"
                                                    action="{{ route('customer.store') }}">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row mb-2">
                                                            <label for="name" class="col-sm-3 col-form-label" hidden>
                                                                Name <span style="color: red;">*</span></label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="name"
                                                                    placeholder="Enter Your Name" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <label for="contact_number" class="col-sm-3 col-form-label"
                                                                hidden>
                                                                Phone No <span style="color: red;">*</span></label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control"
                                                                    name="contact_number"
                                                                    placeholder="Enter Your Phone Number" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <label for="address" class="col-sm-3 col-form-label" hidden>
                                                                Addresss</label>
                                                            <div class="col-sm-12">
                                                                <textarea class="form-control" name="address" placeholder="Enter Your Address"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('layouts.general.footer')


            <script>
                $(document).ready(function() {
                    $('#todaydatatable').DataTable();
                });
            </script>









        </div>
    </div>
@endsection
