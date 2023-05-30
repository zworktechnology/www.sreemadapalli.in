<div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
        <div class="modal-header" hidden>
            <h5 class="modal-title" id="staticBackdropLabel" style="margin-bottom: 20px;">Create New Sales</h5>
        </div>
        <form autocomplete="off" method="POST" action="{{ route('sales.store') }}">
            @csrf
            <div class="row mb-2 col-12 ">
                <label for="date" class="col-md-1 col-form-label" hidden>
                    Date <span style="color: red;">*</span></label>
                <div class="col-9 col-md-2">
                    <input type="date" class="form-control" name="date" placeholder="Enter Your " required
                        value="{{ $today }}">
                </div>
            </div>
            <div class="row mb-2 col-12 ">
                <label for="customer_id" class="col-md-1 col-form-label" hidden>
                    Customer <span style="color: red;">*</span></label>
                <div class="col-9 col-md-2">
                    <select class="form-control js-example-basic-single customer_id" name="customer_id" id="customer_id"
                        required>
                        <option value="" selected class="text-muted">
                            Select Customer</option>
                        @foreach ($customerarr as $customers)
                            <option value="{{ $customers['id'] }}">{{ $customers['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-2 col-12 ">
                <label class="col-md-1 col-form-label" hidden>
                    Contact Number <span style="color: red;">*</span></label>
                <div class="col-9 col-md-2">
                    <select class="form-control js-example-basic-single phoneno" name="phoneno" id="phoneno" required>
                        <option value="" selected class="text-muted">
                            Select Mobile</option>
                        @foreach ($customer_mobile as $customer_mobiles)
                            <option value="{{ $customer_mobiles->contact_number }}">
                                {{ $customer_mobiles->contact_number }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-2 col-12 ">
                <label for="invoice_no" class="col-md-1 col-form-label" hidden>
                    Bill No <span style="color: red;">*</span></label>
                <div class="col-9 col-md-2">
                    <input type="number" class="form-control" name="invoice_no" placeholder="Bill No" required>
                </div>
            </div>
            <div class="row mb-2 col-12 ">
                <label for="bill_amount" class="col-md-1 col-form-label" hidden>
                    Bill Amount <span style="color: red;">*</span></label>
                <div class="col-9 col-md-2">
                    <input type="number" class="form-control" name="bill_amount" id="bill_amount"
                        placeholder="Bill Amount" required onchange="totalbreakfast()">
                </div>
            </div>
            <div class="row mb-2 col-12 ">
                <label for="session" class="col-md-1 col-form-label" hidden>
                    Session <span style="color: red;">*</span></label>
                {{-- @if ($todaytime <= '11:00')
                    <div class="col-9 col-md-2" style="display: flex;">
                        <div
                            style="background-color: #ffecec; border-style: solid; border-width: 0.5px; border-color: lightgray; margin-right: 10px;">
                            <input type="radio" name="session" id="Breakfast" value="Break_Fast"
                                style="margin-left: 5px; margin-top:10px;" checked>
                            <label style="margin-right: 10px;" for="Breakfast">BREA</label>
                        </div>
                        <div
                            style="background-color: #ffecec; border-style: solid; border-width: 0.5px; border-color: lightgray; margin-right: 10px;">
                            <input type="radio" name="session" id="Lunch" value="Lunch"
                                style="margin-left: 5px; margin-top:10px;">
                            <label style="margin-right: 10px;" for="Lunch">LUNC</label>
                        </div>
                        <div
                            style="background-color: #ffecec; border-style: solid; border-width: 0.5px; border-color: lightgray;">
                            <input type="radio" name="session" id="Dinner" value="Dinner"
                                style="margin-left: 5px; margin-top:10px;">
                            <label style="margin-right: 10px;" for="Dinner">DINN</label>
                        </div>
                    </div>
                @elseif ($todaytime >= '11:01')
                    <div class="col-9 col-md-2" style="display: flex;">
                        <div
                            style="background-color: #ffecec; border-style: solid; border-width: 0.5px; border-color: lightgray; margin-right: 10px;">
                            <input type="radio" name="session" id="Breakfast" value="Break_Fast"
                                style="margin-left: 5px; margin-top:10px;">
                            <label style="margin-right: 10px;" for="Breakfast">BREA</label>
                        </div>
                        <div
                            style="background-color: #ffecec; border-style: solid; border-width: 0.5px; border-color: lightgray; margin-right: 10px;">
                            <input type="radio" name="session" id="Lunch" value="Lunch"
                                style="margin-left: 5px; margin-top:10px;" checked>
                            <label style="margin-right: 10px;" for="Lunch">LUNC</label>
                        </div>
                        <div
                            style="background-color: #ffecec; border-style: solid; border-width: 0.5px; border-color: lightgray;">
                            <input type="radio" name="session" id="Dinner" value="Dinner"
                                style="margin-left: 5px; margin-top:10px;">
                            <label style="margin-right: 10px;" for="Dinner">DINN</label>
                        </div>
                    </div>
                @elseif ($todaytime >= '15:01')
                    <div class="col-9 col-md-2" style="display: flex;">
                        <div
                            style="background-color: #ffecec; border-style: solid; border-width: 0.5px; border-color: lightgray; margin-right: 10px;">
                            <input type="radio" name="session" id="Breakfast" value="Break_Fast"
                                style="margin-left: 5px; margin-top:10px;">
                            <label style="margin-right: 10px;" for="Breakfast">BREA</label>
                        </div>
                        <div
                            style="background-color: #ffecec; border-style: solid; border-width: 0.5px; border-color: lightgray; margin-right: 10px;">
                            <input type="radio" name="session" id="Lunch" value="Lunch"
                                style="margin-left: 5px; margin-top:10px;">
                            <label style="margin-right: 10px;" for="Lunch">LUNC</label>
                        </div>
                        <div
                            style="background-color: #ffecec; border-style: solid; border-width: 0.5px; border-color: lightgray;">
                            <input type="radio" name="session" id="Dinner" value="Dinner"
                                style="margin-left: 5px; margin-top:10px;" checked>
                            <label style="margin-right: 10px;" for="Dinner">DINN</label>
                        </div>
                    </div>
                @else --}}
                    <div class="col-9 col-md-2" style="display: flex;">
                        <div
                            style="background-color: #ffecec; border-style: solid; border-width: 0.5px; border-color: lightgray; margin-right: 10px;">
                            <input type="radio" name="session" id="Breakfast" value="Break_Fast"
                                style="margin-left: 5px; margin-top:10px;">
                            <label style="margin-right: 10px;" for="Breakfast">BREA</label>
                        </div>
                        <div
                            style="background-color: #ffecec; border-style: solid; border-width: 0.5px; border-color: lightgray; margin-right: 10px;">
                            <input type="radio" name="session" id="Lunch" value="Lunch"
                                style="margin-left: 5px; margin-top:10px;">
                            <label style="margin-right: 10px;" for="Lunch">LUNC</label>
                        </div>
                        <div
                            style="background-color: #ffecec; border-style: solid; border-width: 0.5px; border-color: lightgray;">
                            <input type="radio" name="session" id="Dinner" value="Dinner"
                                style="margin-left: 5px; margin-top:10px;">
                            <label style="margin-right: 10px;" for="Dinner">DINN</label>
                        </div>
                    </div>
                {{-- @endif --}}
            </div>
            <div class="row mb-2 col-12 col-md-12">
                <label for="payment_method" class="col-md-1 col-form-label" hidden>
                    Payment Via <span style="color: red;">*</span></label>
                <div class="col-9 col-md-2" style="display: flex;">
                    <div
                        style="background-color: #eaf7c3; border-style: solid; border-width: 0.5px; border-color: lightgray; margin-right: 10px;">
                        <input type="radio" name="payment_method" value="Cash" id="Cash"
                            style="margin-left: 5px; margin-top:10px;" checked>
                        <label style="margin-right: 10px;" for="Cash">CASH</label>
                    </div>
                    <div
                        style="background-color: #eaf7c3; border-style: solid; border-width: 0.5px; border-color: lightgray; margin-right: 10px;">
                        <input type="radio" name="payment_method" value="Pending" id="Pending"
                            style="margin-left: 5px; margin-top:10px;">
                        <label style="margin-right: 10px;" for="Pending">PEND</label>
                    </div>
                    <div
                        style="background-color: #eaf7c3; border-style: solid; border-width: 0.5px; border-color: lightgray;">
                        <input type="radio" name="payment_method" value="G-Pay" id="G Pay"
                            style="margin-left: 5px; margin-top:10px;">
                        <label style="margin-right: 10px;" for="G Pay">WALT</label>
                    </div>
                </div>
            </div>
            <div class="row mb-2 col-12 ">
                <label for="delivery_boy_id" class="col-md-1 col-form-label" hidden>
                    Delivery By <span style="color: red;">*</span></label>

                <div class="col-9 col-md-2" style="display: grid; grid-template-columns: 35% 35% 35%;">
                    @foreach ($deliveryboy as $deliveryboys)
                        <div
                            style="background-color: #DBD9D9; border-style: solid; border-width: 1px; border-color: lightgray; margin-right: 10px; margin-bottom: 10px;">
                            <input type="radio" name="delivery_boy_id" id="{{ $deliveryboys->id }}"
                                value="{{ $deliveryboys->id }}" style="margin-left: 5px; margin-top:10px;">
                            <label style="margin-right: 10px;"
                                for="{{ $deliveryboys->id }}">{{ substr($deliveryboys->name, 0, 4) }}</label>
                        </div>
                    @endforeach
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
                        <input type="number" class="form-control" name="payment_amount" id="payment_amount_total"
                            placeholder="Enter Your " value="00">
                    </div>
                </div>
                <div class="row mb-4 col-6 ">
                    <label for="delivery_amount" class="col-sm-3 col-form-label">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Delivery Charge <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="delivery_amount" id="delivery_amount"
                            placeholder="Enter Your " onchange="totalbreakfast()" value="00">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success" onclick="submitForm(this);" >Save</button>
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


    $(document).ready(function() {
        $('.customer_id').on("select2:select", function(e) {
            //alert($(this).val());
            var customer_id = $(this).val();
            //alert(customer_id);
            $.ajax({
                url: '/getphoneno/' + customer_id,
                type: 'get',
                dataType: 'json',
                success: function(response) {

                    console.log(response);
                    $('.phoneno').val('');
                    var output = response.length;
                    for (var i = 0; i < output; i++) {
                        $('.phoneno').val(response[i].contact_number);
                        $('.phoneno').select2().trigger('change');
                        $('.pendingamount').html('₹ ' + response[i].pending);

                        if (response[i].pending > 0) {
                            $('.customer_pending').show();
                        } else {
                            $('.customer_pending').hide();
                        }
                        // Local
                        // $(".pendingamtroute").append("<a href='http://127.0.0.1:8000/zwork-admin/customer/view/" + response[i].id +"'>" + response[i].pending + "</a>");
                        // Live
                        $(".pendingamtroute").append("<a href='http://www.sreemadapalli.in/zwork-admin/customer/view/" + response[i].id +"'>" + response[i].pending + "</a>");
                    }

                    //$('.phoneno').val(response['data'].contact_number);
                    //$('.phoneno').select2().trigger('change');

                }
            });
        });


        // get system local time
        var d = new Date();
        var m = d.getMinutes();
        var h = d.getHours();
        if (h == '0') {
            h = 24
        }

        var currentTime = h + "." + m;
        console.log(currentTime);

        var Breakfast = $('#Breakfast').val();
        var Lunch = $('#Lunch').val();
        var Dinner = $('#Dinner').val();

        var b_time = '11:00';
        var l_time = '15:00';
        var d_time = '22:00';

        var morning_time = '06:00';

        if ((currentTime > morning_time) && (currentTime <= b_time)) {
            $('#Breakfast').prop('checked', true);
            $('#Lunch').prop('checked', false);
            $('#Dinner').prop('checked', false);
        } else if ((currentTime > b_time) && (currentTime <= l_time)) {
            $('#Breakfast').prop('checked', false);
            $('#Lunch').prop('checked', true);
            $('#Dinner').prop('checked', false);
        } else if ((currentTime > l_time) && (currentTime <= d_time)) {
            $('#Breakfast').prop('checked', false);
            $('#Lunch').prop('checked', false);
            $('#Dinner').prop('checked', true);
        }

    });


    $(document).ready(function() {
        $('.phoneno').on("select2:select", function(e) {
            var phoneno = $(this).val();

            $.ajax({
                url: '/getcustomerId/' + phoneno,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    console.log(response);


                    $('.customer_id').val('');
                    var output = response.length;


                    for (var i = 0; i < output; i++) {
                        $('.customer_id').val(response[i].id);
                        $('.customer_id').select2().trigger('change');
                        $('.pendingamount').html('₹ ' + response[i].pending);

                        if (response[i].pending > 0) {
                            $('.customer_pending').show();
                        } else {
                            $('.customer_pending').hide();
                        }

                        // Local
                        // $(".pendingamtroute").append("<a href='http://127.0.0.1:8000/zwork-admin/customer/view/" + response[i].id +"'>" + response[i].pending + "</a>");
                        // Live
                        $(".pendingamtroute").append("<a href='https://www.sreemadapalli.in/zwork-admin/customer/view/" + response[i].id +"'>" + response[i].pending + "</a>");
                    }




                }
            });

        });
    });



    function submitForm(btn) {
        // disable the button
        btn.disabled = true;
        // submit the form
        btn.form.submit();
    }
</script>
