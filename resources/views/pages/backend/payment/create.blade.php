<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header" hidden>
            <h5 class="modal-title" id="staticBackdropLabel" style="margin-bottom: 20px;">New Payment</h5>
        </div>
        <form autocomplete="off" method="POST" action="{{ route('payment.store') }}">
            @csrf
            <div class="modal-body">
                <div class="row mb-2">
                    <label for="date" class="col-sm-3 col-form-label">
                        Date <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="date" placeholder="Enter Your " required value="{{ $today }}">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="customer_id" class="col-sm-3 col-form-label">
                        Customer <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <select class="form-control js-example-basic-single customer_id" name="customer_id" id="customer_id" required>
                            <option value=""  selected class="text-muted">
                                Enter Your</option>
                            @foreach ($customer as $customers)
                            <option value="{{ $customers->id }}">{{ $customers->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-2">
                    <label class="col-md-3 col-form-label">
                        Contact No</label>
                    <div class="col-sm-9">

                    <select class="form-control js-example-basic-single phoneno" name="phoneno" id="phoneno" required>
                        <option value="" selected  class="text-muted">
                            Select Mobile</option>
                        @foreach ($customer_mobile as $customer_mobiles)
                        <option value="{{ $customer_mobiles->contact_number }}">{{ $customer_mobiles->contact_number }}</option>
                        @endforeach
                    </select>


                    </div>
                </div>
                <div class="row mb-4">
                    <label for="amount" class="col-sm-3 col-form-label">
                        Amount <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="amount" placeholder="Enter Your " required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
</div>


<script>

$(document).ready(function(){
    $('.customer_id').on("select2:select", function(e) {
        //alert($(this).val());
        var customer_id = $(this).val();
//alert(customer_id);
                $.ajax({
                    url: '/getphoneno/' + customer_id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {

                        $('.phoneno').val('');
                        var len = response['data'];

                        $('.phoneno').val(response['data'].contact_number);
                        $('.phoneno').select2().trigger('change');

                    }
                });
    });
});


$(document).ready(function(){
    $('.phoneno').on("select2:select", function(e) {
        var phoneno = $(this).val();

                $.ajax({
                    url: '/getcustomerId/' + phoneno,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);


                        $('.customer_id').val('');
                        var len = response['data'];

                        $('.customer_id').val(response['data'].id);
                        $('.customer_id').select2().trigger('change');


                    }
                });

    });
});



</script>
