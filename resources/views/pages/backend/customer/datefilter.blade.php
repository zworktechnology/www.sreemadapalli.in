@extends('layouts.login')

@section('content')
<div id="layout-wrapper">

    @include('layouts.general.left-bar')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Customer - {{ $customerdata->name }}</h4>
                        <div class="page-title-right">
                            <a href="/export_customerorder_filter_pdf/{{ $customer_id }}/{{ $from_date }}/{{ $to_date }}" class="nofilter "><button type="button" class="btn btn-success w-md">Export as PDF</button></a>
                            <a href="{{ route('customer.index') }}">
                                <button type="button" class="btn btn-success w-md">Back</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <table id="customer_datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead style="background: #EEBE78">
                                        <tr>
                                            <th>Sl. No</th>
                                            <th>Date</th>
                                            <th>Breakfast</th>
                                            <th>Lunch</th>
                                            <th>Dinner</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>


                                    <tbody id="customer_index">
                                        @foreach ($Custumer_filter_array as $index => $Custumer_index_arr)
                                        <tr>
                                            <td>{{ ++$index }}</td>
                                            <td>{{ $Custumer_index_arr['date'] }}</td>
                                            <td>₹ {{ $Custumer_index_arr['BreakfastAmount'] }}</td>
                                            <td>₹ {{ $Custumer_index_arr['LunchAmount'] }}</td>
                                            <td>₹ {{ $Custumer_index_arr['DinnerAmount'] }}</td>
                                            <td>₹ {{ $Custumer_index_arr['TotalCustomerAmount'] }}</td>
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
            $(document).ready(function() {
                $('#customer_datatable').DataTable();
            });

            $(document).ready(function() {
                $('#paymenttable').DataTable();
            });

        </script>

    </div>
</div>
@endsection
