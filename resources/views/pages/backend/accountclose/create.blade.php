<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Close Account</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form autocomplete="off" method="POST" action="{{ route('accountclose.store') }}">
            @csrf
            <div class="modal-body">
                <div class="row mb-4">
                    <label for="date" class="col-sm-3 col-form-label">
                        Date <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="date" placeholder="Enter Your " required value="{{ $today }}">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="case_on_hand" class="col-sm-3 col-form-label">
                        Cash on hand <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="case_on_hand" placeholder="Enter Your " required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="g_pay" class="col-sm-3 col-form-label">
                        G Pay <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="g_pay" placeholder="Enter Your " required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="phone_pay" class="col-sm-3 col-form-label">
                        Phone Pe <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="phone_pay" placeholder="Enter Your " required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="card" class="col-sm-3 col-form-label">
                        Card <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="card" placeholder="Enter Your " required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="other_case" class="col-sm-3 col-form-label">
                        Other Cash <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="other_case" placeholder="Enter Your " required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="sales_amount" class="col-sm-3 col-form-label">
                        Sales <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="sales_amount" placeholder="Enter Your " required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
</div>
