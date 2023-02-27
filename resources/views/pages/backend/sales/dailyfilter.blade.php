@extends('layouts.login')

@section('content')
<div id="layout-wrapper">

    @include('layouts.general.left-bar')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Sales   -  {{ $date }}</h4>
                        <div class="page-title-right">
                            <div style="display: flex;">
                                <div>
                                <a href="/zwork-admin/sales">
                                    <button type="button" class="btn btn-success w-md" >Back</button>
                                    </a>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-2">
                        <div class="card mini-stats-wid">
                            <div class="card-body" style="background-color: #CADAF1;">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium" style="color: black !important; font-weight: bold;">Total Amount</p>
                                        <h4 class="mb-0" style="color: red !important;">{{ $total_bill_amount }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card mini-stats-wid">
                            <div class="card-body" style="background-color: #FFEE93;">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium" style="color: black !important; font-weight: bold;">Cash</p>
                                        <h4 class="mb-0" style="color: red !important;">{{ $total_cash }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card mini-stats-wid">
                            <div class="card-body" style="background-color: #B8FF72;">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium" style="color: black !important; font-weight: bold;">Pending</p>
                                        <h4 class="mb-0" style="color: red !important;">{{ $total_pending }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 pointer">
                        <div data-bs-toggle="modal" data-bs-target="#staticBackdropwallet">
                            <div class="card mini-stats-wid">
                                <div class="card-body" style="background-color: #E5FF8E;">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium" style="color: black !important; font-weight: bold;">Wallet</p>
                                            <h4 class="mb-0" style="color: red !important;">{{ $total_wallet }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="staticBackdropwallet" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            @include('pages.backend.sales.wallet')
                        </div>
                    </div>
                    <div class="col-md-4 pointer">
                        <div data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <div class="card mini-stats-wid">
                                <div class="card-body" style="background-color: #E2CFCF;">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium" style="color: black !important; font-weight: bold;">Total Delivery Count</p>
                                            <h4 class="mb-0" style="color: red !important;">
                                            <div style="display: none">
                                                {{ $totalcount = 0 }}
                                            </div>
                                            @foreach ($deliveryboys_arr as $deliveryboys_a)
                                                    <div style="display: none">
                                                {{ $totalcount += $deliveryboys_a['delivery_count'] }}</div>
                                            @endforeach
                                            {{ $totalcount }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            @include('pages.backend.sales.deliveryby')
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="dailylistdatatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead style="background: #EEBE78">
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
                                    <tbody id="breakfast_daily_data">
                                        @foreach ($daily_Data as $keydata => $outputs)
                                        <tr>
                                            <td>{{ $outputs['invoice_no'] }}</td>
                                            <td>{{ $outputs['customer'] }}</td>
                                            <td>{{ $outputs['bill_amount'] }}</td>
                                            <td>{{ $outputs['title'] }}</td>
                                            <td>{{ $outputs['devlivery_by']}}</td>
                                            <td>{{ $outputs['payment_method'] }}</td>
                                            <td>

                                                @if ($outputs['title'] == 'Break Fast')
                                                <ul class="list-unstyled hstack gap-1 mb-0">
                                                    <li>
                                                        <a href="{{ route('breakfast.edit', ['id' => $outputs['id']]) }}" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"> Edit</i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#jobDelete{{ $outputs['id'] }}" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"> Delete</i></a>
                                                    </li>
                                                </ul>
                                                @elseif($outputs['title'] == 'Lunch')
                                                <ul class="list-unstyled hstack gap-1 mb-0">
                                                    <li>
                                                        <a href="{{ route('lunch.edit', ['id' => $outputs['id']]) }}" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"> Edit</i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#jobDelete{{ $outputs['id'] }}" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"> Delete</i></a>
                                                    </li>
                                                </ul>
                                                @elseif($outputs['title'] == 'Dinner')
                                                <ul class="list-unstyled hstack gap-1 mb-0">
                                                    <li>
                                                        <a href="{{ route('dinner.edit', ['id' => $outputs['id']]) }}" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"> Edit</i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#jobDelete{{ $outputs['id'] }}" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"> Delete</i></a>
                                                    </li>
                                                </ul>
                                                @endif
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="jobDelete{{ $outputs['id'] }}" tabindex="-1" aria-labelledby="bfjobDeleteLabel{{ $outputs['id'] }}" aria-hidden="true">
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

                                                        @if ($outputs['title'] == 'Break Fast')
                                                        <form autocomplete="off" method="POST" action="{{ route('breakfast.delete', ['id' => $outputs['id']]) }}">
                                                        @elseif($outputs['title'] == 'Lunch')
                                                        <form autocomplete="off" method="POST" action="{{ route('lunch.delete', ['id' => $outputs['id']]) }}">
                                                        @elseif($outputs['title'] == 'Dinner')
                                                        <form autocomplete="off" method="POST" action="{{ route('dinner.delete', ['id' => $outputs['id']]) }}">
                                                        @endif

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
                $('#dailylistdatatable').DataTable();
            });





        </script>









    </div>
</div>
@endsection
