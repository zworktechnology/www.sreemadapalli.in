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
                                    {{-- <a href="javascript:void(0)" class="nofilter ">
                                        <button
                                            class="px-4 py-2 bg-black text-white font-bold font-serif shadow-sm shadow-red-300"
                                            style="border-top-left-radius: 4px; border-bottom-left-radius: 4px;">
                                            Export as</button>
                                    </a>
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



                    <div class="row">
                        <div class="col-md-12">

                            <div class="col-12 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="walletdatatable" data-order='[[ 0, "desc" ]]'
                                            class="table table-bordered dt-responsive nowrap w-100">
                                            <thead style="background: #CAF1DE">
                                                <tr>

                                                    <th>Bill No</th>
                                                    <th>Customer</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="today_data">
                                                @foreach ($daily_Data as $keydata => $outputs)
                                                    <tr>

                                                        <td>{{ $outputs['invoice_no'] }}</td>
                                                        <td>{{ $outputs['customer'] }}</td>
                                                        <td>₹ {{ $outputs['bill_amount'] }}</td>

                                                        @if ($outputs['wallet_status'] == 'PAID')
                                                        <td style="color: white; background-color:green;">{{ $outputs['wallet_status'] }}</td>
                                                        @elseif ($outputs['wallet_status'] == 'PENDING')
                                                        <td style="color: white; background-color:red;">{{ $outputs['wallet_status'] }}</td>
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

                    </div>
                </div>
            </div>

            @include('layouts.general.footer')


            <script>
                $(document).ready(function() {
                    $('#walletdatatable').DataTable(
                        {
                            pageLength : 12,
                            lengthMenu: [[6, 12, 18, 24], [6, 12, 18, 24]]
                        }
                    );
                });


            </script>

        </div>
    </div>
@endsection
