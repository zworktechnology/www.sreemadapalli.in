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
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card mini-stats-wid">
                                        <div class="card-body" style="background-color: #C1D1DB;">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="text-muted fw-medium mb-2"
                                                        style="color: black !important; font-weight: bold;">Total Amount</p>
                                                    <h4 class="mb-0" style="color: red !important;">₹
                                                        {{ $breakfast_total_amount + $lunch_total_amount + $dinner_total_amount }}
                                                    </h4>
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
                                                    <p class="text-muted fw-medium mb-2"
                                                        style="color: black !important; font-weight: bold;">Paid Amount</p>
                                                    <h4 class="mb-0" style="color: red !important;">₹
                                                        {{ $breakfast_amount_paid + $lunch_amount_paid + $dinner_amount_paid + $payment_total_amount }}
                                                    </h4>
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
                                                    <p class="text-muted fw-medium mb-2"
                                                        style="color: black !important; font-weight: bold;">Pending Amount
                                                    </p>
                                                    <h4 class="mb-0" style="color: red !important;">₹
                                                        {{ $breakfast_amount_pending + $lunch_amount_pending + $dinner_amount_pending - $payment_total_amount }}
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Filter</h4>
                            <div class="page-title-right">
                                <div class="py-3 px-2 text-right" style="display: flex;">
                                    <form autocomplete="off" method="post"
                                        action="{{ route('customer.getdatewiseCustomerOrders') }}">
                                        @method('PUT')
                                        @csrf
                                        <div style="display: flex;">
                                            <div style="margin-right: 10px;">
                                                <input type="date" class="form-control" name="from_date" id="from_date"
                                                    placeholder="Enter Your " required value="2023-01-01">
                                            </div>
                                            <div style="margin-right: 10px;">
                                                <input type="date" class="form-control" name="to_date" id="to_date"
                                                    placeholder="Enter Your " required value="{{ $today }}">
                                                <input type="hidden" name="customer_ids" id="customer_ids"
                                                    class="customer_ids" value="{{ $data->id }}">
                                            </div>
                                            <div style="margin-right: 10px;">
                                                <button type="submit" class="btn btn-success w-md">
                                                    Search</button>
                                            </div>
                                        </div>
                                    </form>
                                    <a href="/export_customerorder_pdf/{{ $data->id }}" class="nofilter "><button
                                            type="button" class="btn btn-success w-md">Export as PDF</button></a>

                                    <div style="margin-left: 10px;">
                                        <a href="{{ route('customer.edit', ['id' => $data['id']]) }}">
                                            <button class="btn btn-success w-md">
                                                Edit</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div class="card">
                                <div class="card-body">
                                    <form autocomplete="off" method="post"
                                        action="{{ route('customer.getdatewiseCustomerOrders') }}">
                                        @method('PUT')
                                        @csrf
                                        <div style="display: flex;">
                                            <div style="margin-right: 10px;" hidden>
                                                <input type="date" class="form-control" name="from_date" id="from_date"
                                                    placeholder="Enter Your " required value="2023-01-01">
                                            </div>
                                            <div style="margin-right: 10px;" hidden>
                                                <input type="date" class="form-control" name="to_date" id="to_date"
                                                    placeholder="Enter Your " required value="2023-01-31">
                                                <input type="hidden" name="customer_ids" id="customer_ids" class="customer_ids"
                                                    value="{{ $data->id }}">
                                            </div>
                                            <div style="margin-right: 10px; margin-bottom: 10px;">
                                                <button type="submit" class="btn btn-success w-md">
                                                    January</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form autocomplete="off" method="post"
                                        action="{{ route('customer.getdatewiseCustomerOrders') }}">
                                        @method('PUT')
                                        @csrf
                                        <div style="display: flex;">
                                            <div style="margin-right: 10px;" hidden>
                                                <input type="date" class="form-control" name="from_date" id="from_date"
                                                    placeholder="Enter Your " required value="2023-02-01">
                                            </div>
                                            <div style="margin-right: 10px;" hidden>
                                                <input type="date" class="form-control" name="to_date" id="to_date"
                                                    placeholder="Enter Your " required value="2023-02-28">
                                                <input type="hidden" name="customer_ids" id="customer_ids" class="customer_ids"
                                                    value="{{ $data->id }}">
                                            </div>
                                            <div style="margin-right: 10px;  margin-bottom: 10px;">
                                                <button type="submit" class="btn btn-success w-md">
                                                    February</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form autocomplete="off" method="post"
                                        action="{{ route('customer.getdatewiseCustomerOrders') }}">
                                        @method('PUT')
                                        @csrf
                                        <div style="display: flex;">
                                            <div style="margin-right: 10px;" hidden>
                                                <input type="date" class="form-control" name="from_date" id="from_date"
                                                    placeholder="Enter Your " required value="2023-03-01">
                                            </div>
                                            <div style="margin-right: 10px;" hidden>
                                                <input type="date" class="form-control" name="to_date" id="to_date"
                                                    placeholder="Enter Your " required value="2023-03-31">
                                                <input type="hidden" name="customer_ids" id="customer_ids" class="customer_ids"
                                                    value="{{ $data->id }}">
                                            </div>
                                            <div style="margin-right: 10px;  margin-bottom: 10px;">
                                                <button type="submit" class="btn btn-success w-md">
                                                    March</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form autocomplete="off" method="post"
                                        action="{{ route('customer.getdatewiseCustomerOrders') }}">
                                        @method('PUT')
                                        @csrf
                                        <div style="display: flex;">
                                            <div style="margin-right: 10px;" hidden>
                                                <input type="date" class="form-control" name="from_date" id="from_date"
                                                    placeholder="Enter Your " required value="2023-04-01">
                                            </div>
                                            <div style="margin-right: 10px;" hidden>
                                                <input type="date" class="form-control" name="to_date" id="to_date"
                                                    placeholder="Enter Your " required value="2023-04-30">
                                                <input type="hidden" name="customer_ids" id="customer_ids" class="customer_ids"
                                                    value="{{ $data->id }}">
                                            </div>
                                            <div style="margin-right: 10px;  margin-bottom: 10px;">
                                                <button type="submit" class="btn btn-success w-md">
                                                    April</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form autocomplete="off" method="post"
                                        action="{{ route('customer.getdatewiseCustomerOrders') }}">
                                        @method('PUT')
                                        @csrf
                                        <div style="display: flex;">
                                            <div style="margin-right: 10px;" hidden>
                                                <input type="date" class="form-control" name="from_date" id="from_date"
                                                    placeholder="Enter Your " required value="2023-05-01">
                                            </div>
                                            <div style="margin-right: 10px;" hidden>
                                                <input type="date" class="form-control" name="to_date" id="to_date"
                                                    placeholder="Enter Your " required value="2023-05-31">
                                                <input type="hidden" name="customer_ids" id="customer_ids" class="customer_ids"
                                                    value="{{ $data->id }}">
                                            </div>
                                            <div style="margin-right: 10px;  margin-bottom: 10px;">
                                                <button type="submit" class="btn btn-success w-md">
                                                    May</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form autocomplete="off" method="post"
                                        action="{{ route('customer.getdatewiseCustomerOrders') }}">
                                        @method('PUT')
                                        @csrf
                                        <div style="display: flex;">
                                            <div style="margin-right: 10px;" hidden>
                                                <input type="date" class="form-control" name="from_date" id="from_date"
                                                    placeholder="Enter Your " required value="2023-06-01">
                                            </div>
                                            <div style="margin-right: 10px;" hidden>
                                                <input type="date" class="form-control" name="to_date" id="to_date"
                                                    placeholder="Enter Your " required value="2023-06-30">
                                                <input type="hidden" name="customer_ids" id="customer_ids" class="customer_ids"
                                                    value="{{ $data->id }}">
                                            </div>
                                            <div style="margin-right: 10px;  margin-bottom: 10px;">
                                                <button type="submit" class="btn btn-success w-md">
                                                    June</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form autocomplete="off" method="post"
                                        action="{{ route('customer.getdatewiseCustomerOrders') }}">
                                        @method('PUT')
                                        @csrf
                                        <div style="display: flex;">
                                            <div style="margin-right: 10px;" hidden>
                                                <input type="date" class="form-control" name="from_date" id="from_date"
                                                    placeholder="Enter Your " required value="2023-07-01">
                                            </div>
                                            <div style="margin-right: 10px;" hidden>
                                                <input type="date" class="form-control" name="to_date" id="to_date"
                                                    placeholder="Enter Your " required value="2023-07-31">
                                                <input type="hidden" name="customer_ids" id="customer_ids" class="customer_ids"
                                                    value="{{ $data->id }}">
                                            </div>
                                            <div style="margin-right: 10px;  margin-bottom: 10px;">
                                                <button type="submit" class="btn btn-success w-md">
                                                    July</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form autocomplete="off" method="post"
                                        action="{{ route('customer.getdatewiseCustomerOrders') }}">
                                        @method('PUT')
                                        @csrf
                                        <div style="display: flex;">
                                            <div style="margin-right: 10px;" hidden>
                                                <input type="date" class="form-control" name="from_date" id="from_date"
                                                    placeholder="Enter Your " required value="2023-08-01">
                                            </div>
                                            <div style="margin-right: 10px;" hidden>
                                                <input type="date" class="form-control" name="to_date" id="to_date"
                                                    placeholder="Enter Your " required value="2023-08-31">
                                                <input type="hidden" name="customer_ids" id="customer_ids" class="customer_ids"
                                                    value="{{ $data->id }}">
                                            </div>
                                            <div style="margin-right: 10px;  margin-bottom: 10px;">
                                                <button type="submit" class="btn btn-success w-md">
                                                    August</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form autocomplete="off" method="post"
                                        action="{{ route('customer.getdatewiseCustomerOrders') }}">
                                        @method('PUT')
                                        @csrf
                                        <div style="display: flex;">
                                            <div style="margin-right: 10px;" hidden>
                                                <input type="date" class="form-control" name="from_date" id="from_date"
                                                    placeholder="Enter Your " required value="2023-09-01">
                                            </div>
                                            <div style="margin-right: 10px;" hidden>
                                                <input type="date" class="form-control" name="to_date" id="to_date"
                                                    placeholder="Enter Your " required value="2023-09-30">
                                                <input type="hidden" name="customer_ids" id="customer_ids" class="customer_ids"
                                                    value="{{ $data->id }}">
                                            </div>
                                            <div style="margin-right: 10px;  margin-bottom: 10px;">
                                                <button type="submit" class="btn btn-success w-md">
                                                    September</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form autocomplete="off" method="post"
                                        action="{{ route('customer.getdatewiseCustomerOrders') }}">
                                        @method('PUT')
                                        @csrf
                                        <div style="display: flex;">
                                            <div style="margin-right: 10px;" hidden>
                                                <input type="date" class="form-control" name="from_date" id="from_date"
                                                    placeholder="Enter Your " required value="2023-10-01">
                                            </div>
                                            <div style="margin-right: 10px;" hidden>
                                                <input type="date" class="form-control" name="to_date" id="to_date"
                                                    placeholder="Enter Your " required value="2023-10-31">
                                                <input type="hidden" name="customer_ids" id="customer_ids" class="customer_ids"
                                                    value="{{ $data->id }}">
                                            </div>
                                            <div style="margin-right: 10px;  margin-bottom: 10px;">
                                                <button type="submit" class="btn btn-success w-md">
                                                    October</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form autocomplete="off" method="post"
                                        action="{{ route('customer.getdatewiseCustomerOrders') }}">
                                        @method('PUT')
                                        @csrf
                                        <div style="display: flex;">
                                            <div style="margin-right: 10px;" hidden>
                                                <input type="date" class="form-control" name="from_date" id="from_date"
                                                    placeholder="Enter Your " required value="2023-11-01">
                                            </div>
                                            <div style="margin-right: 10px;" hidden>
                                                <input type="date" class="form-control" name="to_date" id="to_date"
                                                    placeholder="Enter Your " required value="2023-11-30">
                                                <input type="hidden" name="customer_ids" id="customer_ids" class="customer_ids"
                                                    value="{{ $data->id }}">
                                            </div>
                                            <div style="margin-right: 10px;  margin-bottom: 10px;">
                                                <button type="submit" class="btn btn-success w-md">
                                                    November</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form autocomplete="off" method="post"
                                        action="{{ route('customer.getdatewiseCustomerOrders') }}">
                                        @method('PUT')
                                        @csrf
                                        <div style="display: flex;">
                                            <div style="margin-right: 10px;" hidden>
                                                <input type="date" class="form-control" name="from_date" id="from_date"
                                                    placeholder="Enter Your " required value="2023-12-01">
                                            </div>
                                            <div style="margin-right: 10px;" hidden>
                                                <input type="date" class="form-control" name="to_date" id="to_date"
                                                    placeholder="Enter Your " required value="2023-12-31">
                                                <input type="hidden" name="customer_ids" id="customer_ids" class="customer_ids"
                                                    value="{{ $data->id }}">
                                            </div>
                                            <div style="margin-right: 10px;  margin-bottom: 10px;">
                                                <button type="submit" class="btn btn-success w-md">
                                                    December</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">

                                <div class="card-body">

                                    <table id="customer_datatable"
                                        class="table table-bordered dt-responsive  nowrap w-100">
                                        <thead style="background: #CAF1DE">
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
                                            @foreach ($Custumer_index_array as $index => $Custumer_index_arr)
                                                <tr>
                                                    <td>{{ ++$index }}</td>
                                                    <td>{{ $Custumer_index_arr['date'] }}</td>


                                                    <td {{ $Custumer_index_arr['bf_status'] }}>₹
                                                        {{ $Custumer_index_arr['CustomersBreakfastAmt'] }}</td>



                                                    <td {{ $Custumer_index_arr['l_status'] }}>₹
                                                        {{ $Custumer_index_arr['CustomersLunchAmt'] }}</td>
                                                    <td {{ $Custumer_index_arr['d_status'] }}>₹
                                                        {{ $Custumer_index_arr['CustomersDinnerAmt'] }}</td>
                                                    <td>₹ {{ $Custumer_index_arr['TotalAmount'] }}</td>
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
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" hidden>
                                                <h5 class="modal-title" id="staticBackdropLabel"
                                                    style="margin-bottom: 20px;">New Payment</h5>
                                            </div>
                                            <form autocomplete="off" method="POST"
                                                action="{{ route('payment.store') }}">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row mb-2">
                                                        <label for="date" class="col-sm-3 col-form-label">
                                                            Date <span style="color: red;">*</span></label>
                                                        <div class="col-sm-9">
                                                            <input type="date" class="form-control" name="date"
                                                                placeholder="Enter Your " required
                                                                value="{{ $today }}">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label for="customer_id" class="col-sm-3 col-form-label">
                                                            Customer <span style="color: red;">*</span></label>
                                                        <div class="col-sm-9">
                                                            <select
                                                                class="form-control js-example-basic-single not-allowed"
                                                                name="customer_id" required>
                                                                <option value="" disabled selected hidden
                                                                    class="text-muted">
                                                                    Enter Your</option>
                                                                @foreach ($customer as $customers)
                                                                    <option value="{{ $customers->id }}"
                                                                        @if ($customers->id === $data->id) selected='selected' @endif>
                                                                        {{ $customers->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="amount" class="col-sm-3 col-form-label">
                                                            Amount <span style="color: red;">*</span></label>
                                                        <div class="col-sm-9">
                                                            <input type="number" class="form-control" name="amount"
                                                                placeholder="Enter Your " required>
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
                            <div class="card">
                                <div class="card-body">
                                    <table id="paymenttable" class="table table-bordered dt-responsive  nowrap w-100">
                                        <thead style="background: #CAF1DE">
                                            <tr>
                                                <th>Sl. No</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($payment as $keydata => $payments)
                                                <tr>
                                                    <td>{{ ++$keydata }}</td>
                                                    <td>{{ date('d - m - Y', strtotime($payments->date)) }}</td>
                                                    <td>₹ {{ $payments->amount }}</td>
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
