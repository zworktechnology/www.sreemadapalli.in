<div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Delivery</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form autocomplete="off" method="POST" action="{{ route('sales.store') }}">
            @csrf
            <div class="modal-body col-12">
                <div style="display: flex;">
                    <div class="row mb-4 col-6 ">
                        <label for="date" class="col-sm-3 col-form-label">
                            Date <span style="color: red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="date" placeholder="Enter Your " required value="{{ $today }}">
                        </div>
                    </div>
                    <div class="row mb-4 col-6 ">
                        <label for="delivery_boy" class="col-sm-3 col-form-label">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Delivery BY <span style="color: red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="delivery_boy" placeholder="Enter Your " required>
                        </div>
                    </div>
                </div>
                <div style="display: flex;">
                    <div class="row mb-4 col-6 ">
                        <label for="customer_id" class="col-sm-3 col-form-label">
                            Customer <span style="color: red;">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-control" name="customer_id" required>
                                <option value="" disabled selected hidden class="text-muted">
                                    Enter Your</option>
                                @foreach ($customer as $customers)
                                <option value="{{ $customers->id }}">{{ $customers->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4 col-6 ">
                        <label for="session" class="col-sm-3 col-form-label">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Session <span style="color: red;">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-control" name="session" required>
                                <option value="" disabled selected hidden class="text-muted">Enter Your</option>
                                <option value="Break_Fast" class="text-muted">Break Fast</option>
                                <option value="Lunch" class="text-muted">Lunch</option>
                                <option value="Dinner" class="text-muted">Dinner</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div style="display: flex;">
                    <div class="row mb-4 col-6 ">
                        <label for="invoice_no" class="col-sm-3 col-form-label">
                            Bill No <span style="color: red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="invoice_no" placeholder="Enter Your " required>
                        </div>
                    </div>
                    <div class="row mb-4 col-6">
                        <label for="payment_status" class="col-sm-3 col-form-label">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Payment Status <span style="color: red;">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-control" name="payment_status" required>
                                <option value="" disabled selected hidden class="text-muted">
                                    Enter Your</option>
                                <option value="Payed" class="text-muted">Payed</option>
                                <option value="Pending" class="text-muted">Pending</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div style="display: flex;">
                    <div class="row mb-4 col-6 ">
                        <label for="bill_amount" class="col-sm-3 col-form-label">
                            Bill Amount <span style="color: red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="bill_amount" id="bill_amount" placeholder="Enter Your " required onchange="totalbreakfast()">
                        </div>
                    </div>
                    <div class="row mb-4 col-6 ">
                        <label for="payment_method" class="col-sm-3 col-form-label">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Payment Via</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="payment_method">
                                <option value="" disabled selected hidden class="text-muted">
                                    Enter Your</option>
                                <option value="Cash" class="text-muted">Cash</option>
                                <option value="Card" class="text-muted">Card</option>
                                <option value="G-Pay" class="text-muted">G Pay</option>
                                <option value="G-Pay Business" class="text-muted">G-Pay Business</option>
                                <option value="Phone Pe" class="text-muted">Phone Pe</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div style="display: flex;" hidden>
                    <div class="row mb-4 col-6 ">
                        <label for="payment_amount" class="col-sm-3 col-form-label">
                            Payment Amount <span style="color: red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="payment_amount" id="payment_amount_total" placeholder="Enter Your " required>
                        </div>
                    </div>
                    <div class="row mb-4 col-6 ">
                        <label for="delivery_amount" class="col-sm-3 col-form-label">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Delivery Charge <span style="color: red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="delivery_amount" id="delivery_amount" placeholder="Enter Your " required onchange="totalbreakfast()" value="20">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
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
