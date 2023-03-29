<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Open Account</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form autocomplete="off" method="POST" action="{{ route('accountopen.store') }}">
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
                    <label for="amount" class="col-sm-3 col-form-label">
                        Amount <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="amount" placeholder="Enter Your " required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="amount" class="col-sm-3 col-form-label">
                        Note</label>
                    <div class="col-sm-9">
                        <textarea type="text" class="form-control" name="note" placeholder="Enter Your "></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
</div>
