<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel" style="margin-bottom: 20px;">New Expense</h5>
        </div>
        <form autocomplete="off" method="POST" action="{{ route('expence.store') }}">
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
                    <label for="employee_id" class="col-sm-3 col-form-label">
                        Name <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <select class="form-control js-example-basic-single employee_id" name="employee_id" id="employee_id" required>
                            <option value=""  selected hidden class="text-muted">
                                Enter Your</option>
                            @foreach ($employee as $employees)
                            <option value="{{ $employees->id }}">{{ $employees->name }}</option>
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
                        @foreach ($employee_mobile as $employee_mobiles)
                        <option value="{{ $employee_mobiles->contact_number }}">{{ $employee_mobiles->contact_number }}</option>
                        @endforeach
                    </select>

                    </div>
                </div>
                <div class="row mb-2">
                    <label for="amount" class="col-sm-3 col-form-label">
                        Amount <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="amount" placeholder="Enter Your " required>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="status" class="col-sm-3 col-form-label">
                        Status <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <select class="form-control js-example-basic-single" name="status" required>
                            <option value="Pending" selected class="text-muted">G-pay</option>
                            <option value="Paid" class="text-muted">Cash</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="note" class="col-sm-3 col-form-label">
                        Note</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="note" placeholder="Enter Your ">
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
    $('.employee_id').on("select2:select", function(e) {
        //alert($(this).val());
        var employee_id = $(this).val();
//alert(employee_id);
                $.ajax({
                    url: '/getemployeephoneno/' + employee_id,
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
                    url: '/getemployeeId/' + phoneno,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);


                        $('.employee_id').val('');
                        var len = response['data'];

                        $('.employee_id').val(response['data'].id);
                        $('.employee_id').select2().trigger('change');


                    }
                });

    });
});



</script>
