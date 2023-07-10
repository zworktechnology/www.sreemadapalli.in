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
                                <div data-bs-toggle="modal" data-bs-target="#staticBackdropfull">Wallet</div>
                            </h4>
                            <div class="page-title-right">
                                <div style="display: flex;">
                                     <form autocomplete="off" method="POST" action="{{ route('wallet.wallet_dailyfilter') }}"
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
                                    <a href="/walletpdf_export/{{ $today }}" class="nofilter ">
                                        <button
                                            class="px-4 py-2 bg-black text-white font-bold font-serif shadow-sm shadow-red-300"
                                            style="border-top-left-radius: 4px; border-bottom-left-radius: 4px;">
                                            Export as</button>
                                    </a>
                                    {{-- 
                                    <a href="/wallet_pdf_export/{{ $today }}" class="nofilter ">
                                        <button type="button"
                                            class="px-4 py-2 bg-black text-white font-bold font-serif shadow-sm shadow-red-300">
                                            All</button>
                                    </a>
                                    <a href="/walletpdfbybreafast/{{ $today }}" class="nofilter ">
                                        <button type="button"
                                            class="px-4 py-2 bg-black text-white font-bold font-serif shadow-sm shadow-red-300">
                                            Breakfast</button>
                                    </a>
                                    <a href="/walletpdfbylunch/{{ $today }}" class="nofilter ">
                                        <button type="button"
                                            class="px-4 py-2 bg-black text-white font-bold font-serif shadow-sm shadow-red-300">
                                            Lunch</button>
                                    </a>
                                    <a href="/walletpdfbydinner/{{ $today }}" class="nofilter ">
                                        <button type="button"
                                            class="px-4 py-2 bg-black text-white font-bold font-serif shadow-sm shadow-red-300"
                                            style="border-top-right-radius: 4px; border-bottom-right-radius: 4px;">
                                            Dinner</button>
                                    </a> --}}
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



                    <div class="row">
                        <div class="col-md-12" style="display: flex">

                            <div class="col-12 col-md-7">
                                <table class="table table-bordered dt-responsive nowrap w-100"
                                    style="background-color: #CADAF1;">
                                    <thead>
                                        <tr style="font-size: 16px; font-weight: bold;">
                                            <th><b>Today Wallet</b></th>
                                            <th style="color: red !important;"><span style="color: black">Paid:</span> ₹
                                                {{ $wallet_paid }}</th>
                                            <th style="color: red !important;"><span style="color: black">Pending:</span>
                                                ₹ {{ $wallet_pending }}</th>
                                            <th style="color: red !important;"><span style="color: black">total:</span>
                                                ₹
                                                {{ $wallet_paid + $wallet_pending }}
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                                <div class="card">
                                    <div class="card-body">
                                        <table id="walletdatatable" data-order='[[ 0, "desc" ]]'
                                            class="table table-bordered dt-responsive nowrap w-100">
                                            <thead style="background: #CAF1DE">
                                                <tr>

                                                    <th>Date</th>
                                                    <th>Customer</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="today_data">
                                                @foreach ($datas as $keydata => $outputs)
                                                    <tr>

                                                        <td>{{ $outputs->date }}</td>
                                                        <td>{{ $outputs->customer->name }}</td>
                                                        <td>₹ {{ $outputs->amount }}</td>

                                                        @if ($outputs->status == '1')
                                                            <td style="color: white; background-color:green;">PAID</td>
                                                        @else
                                                            <td style="color: white; background-color:red;">PENDING</td>
                                                        @endif

                                                        <td>
                                                            <ul class="list-unstyled hstack gap-1 mb-0">
                                                                @if ($outputs->status == '1')
                                                                    <li>
                                                                        <a href="#jobPending{{ $outputs->id }}"
                                                                            data-bs-toggle="modal"
                                                                            class="btn btn-sm btn-soft-danger"><i
                                                                                class="mdi mdi-delete-outline"></i>
                                                                            Mark as Pending</a>
                                                                    </li>
                                                                @else
                                                                    <li>
                                                                        <a href="#jobDelete{{ $outputs->id }}"
                                                                            data-bs-toggle="modal"
                                                                            class="btn btn-sm btn-soft-danger"><i
                                                                                class="mdi mdi-delete-outline"></i>
                                                                            Mark as paid</a>
                                                                    </li>
                                                                @endif
                                                                <li>
                                                                    <a href="{{ route('wallet.edit', ['id' => $outputs->id]) }}" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i> Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#jobSoftDelete{{ $outputs->id }}" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i> Delete</a>
                                                                </li>
                                                            </ul>
                                                            
                                                        </td>

                                                    </tr>
                                                    <div class="modal fade" id="jobDelete{{ $outputs->id }}" tabindex="-1"
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
                                                                    <p class="text-muted font-size-16 mb-4">Please confirm
                                                                        he or she paid the amount today</p>

                                                                    <div class="hstack gap-2 justify-content-center mb-0">
                                                                        <form autocomplete="off" method="POST"
                                                                            action="{{ route('wallet.paid', ['id' => $outputs->id]) }}">
                                                                            @method('PUT')
                                                                            @csrf
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Yes, Paid</button>
                                                                        </form>
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">No, Get Back</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="jobPending{{ $outputs->id }}" tabindex="-1"
                                                        aria-labelledby="jobPendingLabel" aria-hidden="true">
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
                                                                        he or she pending the amount today</p>

                                                                    <div class="hstack gap-2 justify-content-center mb-0">
                                                                        <form autocomplete="off" method="POST"
                                                                            action="{{ route('wallet.pending', ['id' => $outputs->id]) }}">
                                                                            @method('PUT')
                                                                            @csrf
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Yes, Pending</button>
                                                                        </form>
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">No, Get Back</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="jobSoftDelete{{ $outputs->id }}" tabindex="-1" aria-labelledby="jobDeleteLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-body px-4 py-5 text-center">
                                                                    <div class="avatar-sm mb-4 mx-auto">
                                                                        <div class="avatar-title bg-primary text-primary bg-opacity-10 font-size-20 rounded-3">
                                                                            <i class="mdi mdi-trash-can-outline"></i>
                                                                        </div>
                                                                    </div>
                                                                    <p class="text-muted font-size-16 mb-4">Please confirm that you wish to remove the wallet.</p>
            
                                                                    <div class="hstack gap-2 justify-content-center mb-0">
                                                                        <form autocomplete="off" method="POST" action="{{ route('wallet.delete', ['id' => $outputs->id]) }}">
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

                            <div class="col-12 col-md-5" style="margin-left:15px;">
                                <div class="card">
                                    <div class="card-body">
                                        <form autocomplete="off" method="POST" action="{{ route('wallet.store') }}">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row mb-2">
                                                    <div class="col-sm-12">
                                                        <input type="date" class="form-control" name="date"
                                                            placeholder="Enter Your " value="{{ $today }}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-12">
                                                        <select class="form-control js-example-basic-single customer_id"
                                                            name="customer_id" id="customer_id" required>
                                                            <option value="" selected class="text-muted">
                                                                Select Customer</option>
                                                            @foreach ($customer as $customers)
                                                                <option value="{{ $customers->id }}">
                                                                    {{ $customers->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="amount"
                                                            placeholder="Enter Your Amount " required>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-9 col-md-2" style="display: flex;">
                                                        <div
                                                            style="background-color: #f17d64; border-style: solid; border-width: 0.5px; border-color: lightgray; margin-right: 10px; display:flex;">
                                                            <input type="radio" name="status" value="1"
                                                                id="walletpaid"
                                                                style="margin-left: 5px; margin-top:10px;">
                                                            <label
                                                                style="margin-left: 10px; margin-top: 10px; margin-right: 15px;"
                                                                for="walletpaid">PAID</label>
                                                        </div>
                                                        <div
                                                            style="background-color: #f17d64; border-style: solid; border-width: 0.5px; border-color: lightgray; margin-right: 10px; display:flex;">
                                                            <input type="radio" name="status" value="0"
                                                                id="walletPending" checked
                                                                style="margin-left: 5px; margin-top:10px;">
                                                            <label
                                                                style="margin-left: 10px; margin-top: 10px; margin-right: 15px;"
                                                                for="walletPending">PENDING</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <table id="walletdatatables" data-order='[[ 0, "desc" ]]'
                                            class="table table-bordered dt-responsive nowrap w-100">
                                            <thead style="background: #CAF1DE">
                                                <tr>

                                                    <th>Date</th>
                                                    <th>Customer</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="today_data">
                                                @foreach ($data as $keydata => $outputs)
                                                    <tr>

                                                        <td>{{ $outputs->date }}</td>
                                                        <td>{{ $outputs->customer->name }}</td>
                                                        <td>₹ {{ $outputs->amount }}</td>

                                                        @if ($outputs->status == '1')
                                                            <td style="color: white; background-color:green;">PAID</td>
                                                        @else
                                                            <td style="color: white; background-color:red;">PENDING</td>
                                                        @endif

                                                        <td>
                                                            <ul class="list-unstyled hstack gap-1 mb-0">
                                                                @if ($outputs->status == '1')
                                                                    <li>
                                                                        <a href="#jobDelete{{ $outputs->id }}"
                                                                            data-bs-toggle="modal"
                                                                            class="btn btn-sm btn-soft-danger"><i
                                                                                class="mdi mdi-delete-outline"></i>
                                                                            Mark as pending</a>
                                                                    </li>
                                                                @else
                                                                    <li>
                                                                        <a href="#jobDelete{{ $outputs->id }}"
                                                                            data-bs-toggle="modal"
                                                                            class="btn btn-sm btn-soft-danger"><i
                                                                                class="mdi mdi-delete-outline"></i>
                                                                            Mark as paid</a>
                                                                    </li>
                                                                @endif
                                                            </ul>
                                                        </td>

                                                    </tr>
                                                    <div class="modal fade" id="jobDelete{{ $outputs->id }}" tabindex="-1"
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
                                                                    <p class="text-muted font-size-16 mb-4">Please confirm
                                                                        he or she paid the amount today</p>

                                                                    <div class="hstack gap-2 justify-content-center mb-0">
                                                                        <form autocomplete="off" method="POST"
                                                                            action="{{ route('wallet.paid', ['id' => $outputs->id]) }}">
                                                                            @method('PUT')
                                                                            @csrf
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Yes, Paid</button>
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
            </div>

            @include('layouts.general.footer')


            <script>
                $(document).ready(function() {
                    $('#walletdatatable').DataTable({
                        pageLength: 12,
                        lengthMenu: [
                            [6, 12, 18, 24],
                            [6, 12, 18, 24]
                        ]
                    });
                });
                $(document).ready(function() {
                    $('#walletdatatables').DataTable({
                        pageLength: 12,
                        lengthMenu: [
                            [6, 12, 18, 24],
                            [6, 12, 18, 24]
                        ]
                    });
                });
            </script>

        </div>
    </div>
@endsection
