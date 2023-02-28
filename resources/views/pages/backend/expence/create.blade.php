<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel" style="margin-bottom: 20px;">New Expense</h5>
        </div>
        <form autocomplete="off" method="POST" action="{{ route('expence.store') }}">
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
                    <label for="employee_id" class="col-sm-3 col-form-label">
                        Employee <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <select class="form-control js-example-basic-single" name="employee_id" required>
                            <option value="" disabled selected hidden class="text-muted">
                                Enter Your</option>
                            @foreach ($employee as $employees)
                            <option value="{{ $employees->id }}">{{ $employees->name }}</option>
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
