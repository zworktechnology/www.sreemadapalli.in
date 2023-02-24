@extends('layouts.login')

@section('content')
<div id="layout-wrapper">

    @include('layouts.general.left-bar')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Sales</h4>
                        <div class="page-title-right">
                            <div style="display: flex;">
                                <div style="margin-right: 10px;">
                                    <input type="date" class="form-control" name="daily_date" id="daily_date" placeholder="Enter Your " required value="{{ $today }}">
                                </div>
                                <div style="margin-right: 10px;">
                                    <button type="button" class="btn btn-success w-md" id="daily_datearr">Search</button>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-success w-md" data-bs-toggle="modal" data-bs-target="#exampleModalFullscreen">Create</button>

                                    <div id="exampleModalFullscreen" class="modal fade" tabindex="-1" aria-labelledby="#exampleModalFullscreenLabel" aria-hidden="true">
                                        @include('pages.backend.sales.create')
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
                    <div class="col-md-2">
                        <div class="card mini-stats-wid">
                            <div class="card-body" style="background-color: #E2CFCF;">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium" style="color: black !important; font-weight: bold;">Delivery Count</p>
                                        <h4 class="mb-0" style="color: red !important;">{{ $breakfast_data_count + $lunch_data_count + $dinner_data_count }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card mini-stats-wid">
                            <div class="card-body" style="background-color: #CADAF1;">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium" style="color: black !important; font-weight: bold;">Total Amount</p>
                                        <h4 class="mb-0" style="color: red !important;">{{ $breakfast_data_total + $lunch_data_total + $dinner_data_total }}</h4>
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
                                        <h4 class="mb-0" style="color: red !important;">{{ $breakfast_data_pm_cash + $lunch_data_pm_cash + $dinner_data_pm_cash }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card mini-stats-wid">
                            <div class="card-body" style="background-color: #E5FF8E;">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium" style="color: black !important; font-weight: bold;">Wallet</p>
                                        <h4 class="mb-0" style="color: red !important;">{{ $breakfast_data_pm_wallet + $lunch_data_pm_wallet + $dinner_data_pm_wallet }}</h4>
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
                                        <h4 class="mb-0" style="color: red !important;">{{ $breakfast_data_ps_pending + $lunch_data_ps_pending + $dinner_data_ps_pending }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card mini-stats-wid">
                            <div class="card-body" style="background-color: #93FFFF;">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium" style="color: black !important; font-weight: bold;">Delivery Charge</p>
                                        <h4 class="mb-0" style="color: red !important;">{{ ($breakfast_data_count + $lunch_data_count + $dinner_data_count) * 20 }}</h4>
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
                                    <thead style="background: #FFAD4C">
                                        <tr>
                                            <th>Session</th>
                                            <th>Date</th>
                                            <th>Bill No</th>
                                            <th>Customer</th>
                                            <th>Amount</th>
                                            <th>Delivery By</th>
                                            <th>Payment Via</th>
                                            @hasrole('Super-Admin')
                                            <th>Status</th>
                                            <th>Action</th>
                                            @endhasrole
                                        </tr>
                                    </thead>
                                    <tbody id="breakfast_daily">
                                        @foreach ($daily_Data as $keydata => $outputs)
                                        <tr>
                                            <td>{{ $outputs['title'] }}</td>
                                            <td>{{ date('d - m - Y', strtotime($outputs['date'])) }}</td>
                                            <td>#{{ $outputs['invoice_no'] }}</td>
                                            <td>{{ $outputs['customer'] }}</td>
                                            <td>{{ $outputs['bill_amount'] }}</td>
                                            <td>{{ $outputs['devlivery_by']}}</td>
                                            <td>{{ $outputs['payment_status'] }}</td>
                                            @hasrole('Super-Admin')
                                            <td>
                                                @if ($outputs['status'] == 'Deleted')
                                                <span class="badge bg-danger">{{ $outputs['status'] }}</span>
                                                @else
                                                <span class="badge bg-success">{{ $outputs['status'] }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="list-unstyled hstack gap-1 mb-0">
                                                    <li>
                                                        <a href="{{ route('breakfast.edit', ['id' => $outputs['date']]) }}" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#jobDelete{{ $outputs['date'] }}" data-bs-toggle="modal" class="btn btn-sm btn-soft-danger"><i class="mdi mdi-delete-outline"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                            @endhasrole
                                        </tr>
                                        <div class="modal fade" id="jobDelete{{ $outputs['date'] }}" tabindex="-1" aria-labelledby="jobDeleteLabel" aria-hidden="true">
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
                                                            <form autocomplete="off" method="POST" action="{{ route('breakfast.delete', ['id' => $outputs['date']]) }}">
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
                                        
                                        <tbody id="filter_breakfastdaily"></tbody>


                                   
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.general.footer')


<script>

$(document).ready(function () {
    $('#dataTable').DataTable();
});

    $(document.body).on("click", "#daily_datearr", function() {

        var daily_date = $('#daily_date').val();

        if (daily_date == "") {
            alert('Select Date');
        }

        if (daily_date != "") {

                        $.ajax({
                            url: '/getDailyBreakfastData/'
                            , type: 'get'
                            , data: {
                                _token: "{{ csrf_token() }}"
                                , daily_date: daily_date
                            }
                            , dataType: 'json'
                            , success: function(response) {

                                $('#breakfast_daily').empty();
                                $('#filter_breakfastdaily').html('');


                                console.log(response);
                                var output = response.length;

                                for (var i = 0; i < output; i++) {
                                    var column_0 = $('<td/>', {
                                        html: response[i].BreakFast
                                    , });
                                    var column_1 = $('<td/>', {
                                        html: response[i].date
                                    , });
                                    var column_2 = $('<td/>', {
                                        html: '#' + response[i].InvoiceID
                                    , });

                                    var column_3 = $('<td/>', {
                                        html: response[i].customername
                                    , });
                                    var column_4 = $('<td/>', {
                                        html: response[i].Price
                                    , });
                                    var column_5 = $('<td/>', {
                                        html: response[i].DeliveryBy
                                    , });
                                    var column_6 = $('<td/>', {
                                        html: response[i].payment_status
                                    , });
                                    var column_7 = $('<td/>', {
                                        html: response[i].status
                                    , });
                                    

                                    var row = $('<tr id=filter_breakfast/>', {}).append(column_0
                                        , column_1, column_2, column_3, column_4, column_5, column_6, column_7);

                                    $('#filter_breakfastdaily').append(row);
                                }

                            }
                        });

        }

    });
</script>









    </div>
</div>
@endsection
