@extends('layouts.login')

@section('content')
<div id="layout-wrapper">

    @include('layouts.general.left-bar')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Customer - {{ $data->name }}</h4>
                        <div class="page-title-right">
                            <div style="display: flex;">
                                <div style="margin-right: 10px;">
                                    <input type="date" class="form-control" name="from_date" id="from_date" placeholder="Enter Your " required value="{{ $today }}">
                                </div>
                                <div style="margin-right: 10px;">
                                    <input type="date" class="form-control" name="to_date" id="to_date" placeholder="Enter Your " required value="{{ $today }}">
                                    <input type="hidden" name="customer_ids" id="customer_ids" class="customer_ids" value="{{ $data->id }}">
                                </div>
                                <div style="margin-right: 10px;">
                                    <button type="button" class="btn btn-success w-md" id="customer_datearr">Search</button>
                                </div>
                                <div>
                                    <a href="/export_customerorder_pdf/{{ $data->id }}" class="nofilter"><button type="button" class="btn btn-success w-md">Export as PDF</button></a>
                                    <a style="display:none" class="filter"><button type="button" class="btn btn-success w-md ">Export as PDF</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body" style="background-color: #D9A5F9;">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium mb-2" style="color: black !important; font-weight: bold;">Total Amount</p>
                                                <h4 class="mb-0" style="color: red !important;">{{ $breakfast_total_amount + $lunch_total_amount + $dinner_total_amount }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body" style="background-color: #FFE972;">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium mb-2" style="color: black !important; font-weight: bold;">Total Payed Amount</p>
                                                <h4 class="mb-0" style="color: red !important;">{{ $breakfast_amount_paid + $lunch_amount_paid + $dinner_amount_paid + $payment_total_amount }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body" style="background-color: #D8E79D;">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium mb-2" style="color: black !important; font-weight: bold;">Pending Amount</p>
                                                <h4 class="mb-0" style="color: red !important;">{{ $breakfast_amount_pending + $lunch_amount_pending + $dinner_amount_pending - $payment_total_amount }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead style="background: lightgrey">
                                        <tr>
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>Brak Fast</th>
                                            <th>Lunch</th>
                                            <th>Dinner</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>

                                    <tbody id="customer_index">
                                        @foreach ($Custumer_index_array as $index => $Custumer_index_arr)
                                        <tr>
                                            <td>{{ ++$index }}</td>
                                            <td>{{ $Custumer_index_arr['date'] }}</td>
                                            <td>{{ $Custumer_index_arr['CustomersBreakfastAmt'] }}</td>
                                            <td>{{ $Custumer_index_arr['CustomersLunchAmt'] }}</td>
                                            <td>{{ $Custumer_index_arr['CustomersDinnerAmt'] }}</td>
                                            <td>{{ $Custumer_index_arr['TotalAmount'] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tbody id="filter_array">

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead style="background: lightgrey">
                                        <tr>
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($payment as $keydata => $payments)
                                        <tr>
                                            <td>{{ ++$keydata }}</td>
                                            <td>{{ date('d - m - Y', strtotime($payments->date)) }}</td>
                                            <td>{{ $payments->amount }}</td>
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


        <script>
            $(document.body).on("click", "#customer_datearr", function() {

                $('.nofilter').hide();
                $('.filter').show();
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                var customer_id = $('#customer_ids').val();

                if (from_date == "") {
                    alert('Select From Date');
                }
                if (to_date == "") {
                    alert('Select To Date');
                }



                if (from_date != "") {
                    if (to_date != "") {






                        $.ajax({
                            url: '/getdatewiseCustomerOrders/'
                            , type: 'get'
                            , data: {
                                _token: "{{ csrf_token() }}"
                                , from_date: from_date
                                , to_date: to_date
                                , customer_id: customer_id
                            }
                            , dataType: 'json'
                            , success: function(response) {

                                $('#customer_index').empty();
                                $('#filter_array').html('');


                                console.log(response);
                                var output = response.length;

                                for (var i = 0; i < output; i++) {
                                    var column_0 = $('<td/>', {
                                        html: i + 1
                                    , });
                                    var column_1 = $('<td/>', {
                                        html: response[i].date
                                    , });
                                    var column_2 = $('<td/>', {
                                        html: response[i].BreakfastAmount
                                    , });

                                    var column_3 = $('<td/>', {
                                        html: response[i].LunchAmount
                                    , });
                                    var column_4 = $('<td/>', {
                                        html: response[i].DinnerAmount
                                    , });
                                    var column_5 = $('<td/>', {
                                        html: response[i].TotalCustomerAmount
                                    , });

                                    var row = $('<tr id=filter_row/>', {}).append(column_0
                                        , column_1, column_2, column_3, column_4, column_5);

                                    $('#filter_array').append(row);
                                }

                            }
                        });
                    }
                }

            });


            $(document.body).on("click", ".filter", function() {

                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                var customer_id = $('#customer_ids').val();



                $.ajax({
                    url: '/filtercustomerorders/'
                    , type: 'get'
                    , data: {
                        from_date: from_date
                        , to_date: to_date
                        , customer_id: customer_id
                    }
                    , dataType: 'json'


                });

            });

        </script>
    </div>
</div>
@endsection
