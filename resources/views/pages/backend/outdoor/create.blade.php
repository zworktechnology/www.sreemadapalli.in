<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel" style="margin-bottom: 20px;">New Order</h5>
        </div>
        <form autocomplete="off" method="POST" action="{{ route('outdoor.store') }}">
            @csrf
            <div class="modal-body">
                <div class="row mb-2">
                    <label for="employee_id" class="col-sm-3 col-form-label">
                        Name <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" placeholder="Enter Your " required>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="employee_id" class="col-sm-3 col-form-label">
                        Phone <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="contact_number" placeholder="Enter Your " required>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="employee_id" class="col-sm-3 col-form-label">
                        Address <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <textarea type="number" class="form-control" name="address" placeholder="Enter Your " required></textarea>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="date" class="col-sm-3 col-form-label">
                        Booking <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="booking_date" placeholder="Enter Your " required value="{{ $today }}">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="date" class="col-sm-3 col-form-label">
                        Delivery <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="delivery_date" placeholder="Enter Your " required>
                    </div>
                </div><div class="row mb-2">
                    <label for="employee_id" class="col-sm-3 col-form-label">
                        Ordernote <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <textarea type="number" class="form-control" name="order_note" placeholder="Enter Your " required></textarea>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="note" class="col-sm-3 col-form-label">
                        Note</label>
                    <div class="col-sm-9">
                        <textarea type="number" class="form-control" name="note" placeholder="Enter Your " required></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
</div>
