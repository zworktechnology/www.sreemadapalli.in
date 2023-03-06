@extends('layouts.login')

@section('content')
<div id="layout-wrapper">

    @include('layouts.general.left-bar')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Sales</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Sales</a></li>
                                    <li class="breadcrumb-item active">Dinner</li>
                                    <li class="breadcrumb-item active">Update</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <form autocomplete="off" method="POST" action="{{ route('dinner.update', ['id' => $data->id]) }}" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row mb-4">
                                        <label for="date" class="col-sm-3 col-form-label">
                                            Date <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" name="date" placeholder="Enter Your " value="{{ $data->date }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="customer_id js-example-basic-single" class="col-sm-3 col-form-label">
                                            Customer <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="customer_id" required>
                                                <option value="" disabled selected hidden class="text-muted">
                                                    Enter Your</option>
                                                @foreach ($customer as $customers)
                                                <option value="{{ $customers->id }}" @if ($customers->id === $data->customer_id) selected='selected' @endif>{{ $customers->name }} - ({{ $customers->contact_number }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="invoice_no" class="col-sm-3 col-form-label">
                                            Invoice ID <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" name="invoice_no" placeholder="Enter Your " value="{{ $data->invoice_no }}" required>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="bill_amount" class="col-sm-3 col-form-label">
                                            Bill Amount <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" name="bill_amount" placeholder="Enter Your " id="bill_amount" value="{{ $data->bill_amount }}" required onchange="totalbreakfast()">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="delivery_boy" class="col-sm-3 col-form-label">
                                            Delivery BY <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control js-example-basic-single" name="delivery_boy_id" required>
                                                <option value="" disabled selected hidden class="text-muted">
                                                    Enter Your</option>
                                                @foreach ($deliveryboy as $deliveryboys)
                                                <option value="{{ $deliveryboys->id }}" @if ($deliveryboys->id === $data->delivery_boy_id) selected='selected' @endif>{{ $deliveryboys->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="session" class="col-sm-3 col-form-label">
                                            Session <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control js-example-basic-single" name="payment_method" required disabled>
                                                <option value="" disabled hidden class="text-muted">Enter Your</option>
                                                <option value="Break_Fast" class="text-muted">Breakfast</option>
                                                <option value="Lunch" class="text-muted">Lunch</option>
                                                <option value="Dinner" selected class="text-muted">Dinner</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4" hidden>
                                        <label for="payment_status" class="col-sm-3 col-form-label">
                                            Payment Status <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="payment_status" required>
                                                <option value="No" selected class="text-muted">Enter Your</option>
                                                <option value="Payed" class="text-muted" {{ $data->payment_status == "Payed" ? 'selected' : '' }}>Paid</option>
                                                <option value="Pending" class="text-muted" {{ $data->payment_status == "Pending" ? 'selected' : '' }}>Pending</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="payment_method js-example-basic-single" class="col-sm-3 col-form-label">
                                            Payment Via <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="payment_method">
                                                <option value="" disabled selected hidden class="text-muted">
                                                    Enter Your</option>
                                                    <option value="Cash" class="text-muted" {{ $data->payment_method == "Cash" ? 'selected' : '' }}>Cash</option>
                                                    <option value="Pending" class="text-muted" {{ $data->payment_method == "Pending" ? 'selected' : '' }}>Pending</option>
                                                    <option value="G-Pay" class="text-muted" {{ $data->payment_method == "G-Pay" ? 'selected' : '' }}>G Pay</option>
                                                    <option value="G-Pay Business" class="text-muted" {{ $data->payment_method == "G-Pay Business" ? 'selected' : '' }}>G-Pay Business</option>
                                                    <option value="Phone Pe" class="text-muted" {{ $data->payment_method == "Phone Pe" ? 'selected' : '' }}>Phone Pe</option>
                                                    <option value="Paytm" class="text-muted" {{ $data->payment_method == "Paytm" ? 'selected' : '' }}>Paytm</option>
                                                    <option value="Card" class="text-muted" {{ $data->payment_method == "Card" ? 'selected' : '' }}>Card</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-4" hidden>
                                        <label for="delivery_amount" class="col-sm-3 col-form-label">
                                            Delivery Charge <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" name="delivery_amount" placeholder="Enter Your " id="delivery_amount" value="{{ $data->delivery_amount }}" required onchange="totalbreakfast()">
                                        </div>
                                    </div>
                                    <div class="row mb-4" hidden>
                                        <label for="payment_amount" class="col-sm-3 col-form-label">
                                            Payment Amount <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" name="payment_amount" placeholder="Enter Your " id="payment_amount_total" value="{{ $data->payment_amount }}" required>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-sm-9">
                                            <div>
                                                <button type="submit" class="btn btn-success w-md">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function totalbreakfast() {
                var payment_amount = 0;
                var bill_amount = $('#bill_amount').val();
                var delivery_amount = $('#delivery_amount').val();

                if (bill_amount != "") {
                    payment_amount += parseFloat(bill_amount);
                }
                if (delivery_amount != "") {
                    payment_amount += parseFloat(delivery_amount);
                }

                $('#payment_amount_total').val(payment_amount);
            }

        </script>

        @include('layouts.general.footer')

    </div>
</div>
@endsection
