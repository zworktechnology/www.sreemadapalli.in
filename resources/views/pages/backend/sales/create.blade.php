<div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel" style="margin-bottom: 20px;">Create New Sales</h5>
        </div>
        <form autocomplete="off" method="POST" action="{{ route('sales.store') }}">
            @csrf
            <div class="row mb-4 col-12 ">
                <label for="date" class="col-md-1 col-form-label" hidden>
                    Date <span style="color: red;">*</span></label>
                <div class="col-9 col-md-2">
                    <input type="date" class="form-control" name="date" placeholder="Enter Your " required value="{{ $today }}">
                </div>
            </div>
            <div class="row mb-4 col-12 ">
                <label for="customer_id" class="col-md-1 col-form-label" hidden>
                    Customer <span style="color: red;">*</span></label>
                <div class="col-9 col-md-2">
                    <select class="form-control js-example-basic-single" name="customer_id" required>
                        <option value="" disabled selected hidden class="text-muted">
                            Select Customer</option>
                        @foreach ($customer as $customers)
                        <option value="{{ $customers->id }}">{{ $customers->name }} - ({{ $customers->contact_number }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-4 col-12 ">
                <label for="invoice_no" class="col-md-1 col-form-label" hidden>
                    Bill No <span style="color: red;">*</span></label>
                <div class="col-9 col-md-2">
                    <input type="number" class="form-control" name="invoice_no" placeholder="Bill No" required>
                </div>
            </div>
            <div class="row mb-4 col-12 ">
                <label for="bill_amount" class="col-md-1 col-form-label" hidden>
                    Bill Amount <span style="color: red;">*</span></label>
                <div class="col-9 col-md-2">
                    <input type="number" class="form-control" name="bill_amount" id="bill_amount" placeholder="Bill Amount" required onchange="totalbreakfast()">
                </div>
            </div>
            <div class="row mb-4 col-12 ">
                <label for="delivery_boy_id" class="col-md-1 col-form-label" hidden>
                    Delivery By <span style="color: red;">*</span></label>
                <div class="col-9 col-md-2">
                    <select class="form-select js-example-basic-single" name="delivery_boy_id" required>
                        <option value="" disabled selected hidden class="text-muted">
                            Delivery By</option>
                        @foreach ($deliveryboy as $deliveryboys)
                        <option value="{{ $deliveryboys->id }}">{{ $deliveryboys->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-4 col-12 ">
                <label for="session" class="col-md-1 col-form-label" hidden>
                    Session <span style="color: red;">*</span></label>
                <div class="col-9 col-md-2">
                    <select class="form-control js-example-basic-single" name="session" required>
                        <option value="" disabled selected hidden class="text-muted">Select Session</option>
                        <option value="Break_Fast" class="text-muted">Breakfast</option>
                        <option value="Lunch" class="text-muted">Lunch</option>
                        <option value="Dinner" class="text-muted">Dinner</option>
                    </select>
                </div>
            </div>
            <div class="row mb-4 col-12 col-md-12">
                <label for="payment_method" class="col-md-1 col-form-label" hidden>
                    Payment Via <span style="color: red;">*</span></label>
                <div class="col-9 col-md-2">
                    <select class="form-control js-example-basic-single" name="payment_method" required>
                        <option value="" disabled selected hidden class="text-muted">Select Payment Via</option>
                        <option value="Cash" class="text-muted">Cash</option>
                        <option value="Pending" class="text-muted">Pending</option>
                        <option value="G-Pay" class="text-muted">G Pay</option>
                        <option value="G-Pay Business" class="text-muted">G-Pay Business</option>
                        <option value="Phone Pe" class="text-muted">Phone Pe</option>
                        <option value="Paytm" class="text-muted">Paytm</option>
                        <option value="Card" class="text-muted">Card</option>
                    </select>
                </div>
            </div>
            <div style="display: flex;" hidden>
                <div class="row mb-4 col-12">
                    <label for="payment_status" class="col-md-1 col-form-label">
                        Payment Status <span style="color: red;">*</span></label>
                    <div class="col-9 col-md-2">
                        <select class="form-control" name="payment_status">
                            <option value="No" selected class="text-muted">
                                Enter Your</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4 col-6 ">
                    <label for="payment_amount" class="col-sm-3 col-form-label">
                        Payment Amount <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="payment_amount" id="payment_amount_total" placeholder="Enter Your " value="00">
                    </div>
                </div>
                <div class="row mb-4 col-6 ">
                    <label for="delivery_amount" class="col-sm-3 col-form-label">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Delivery Charge <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="delivery_amount" id="delivery_amount" placeholder="Enter Your " onchange="totalbreakfast()" value="00">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
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
