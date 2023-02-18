<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">New Customer</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form autocomplete="off" method="POST" action="{{ route('customer.store') }}">
            @csrf
            <div class="modal-body">
                <div class="row mb-4">
                    <label for="name" class="col-sm-3 col-form-label">
                        Name <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" placeholder="Enter Your " required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="contact_number" class="col-sm-3 col-form-label">
                        Phone Number <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="contact_number" placeholder="Enter Your " required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="address" class="col-sm-3 col-form-label">
                        Addresss</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="address" placeholder="Enter Your "></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
</div>
