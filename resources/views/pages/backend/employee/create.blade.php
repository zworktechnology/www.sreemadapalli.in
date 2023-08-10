<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header" hidden>
            <h5 class="modal-title" id="staticBackdropLabel" style="margin-bottom: 20px;">Create New</h5>
        </div>
        <form autocomplete="off" method="POST" action="{{ route('employee.store') }}">
            @csrf
            <div class="modal-body">
                <div class="row mb-2">
                    <label for="name" class="col-sm-3 col-form-label">
                        Name <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" placeholder="Enter Your " required>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="contact_number" class="col-sm-3 col-form-label">
                        Phone No <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="contact_number" placeholder="Enter Your " required>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="salary_amount" class="col-sm-3 col-form-label">
                        Status</label>
                    <div class="col-sm-9" style="display: grid; grid-template-columns: 35% 35% 35%;">
                            <div style="background-color: #DBD9D9; border-style: solid; border-width: 1px; border-color: lightgray; margin-right: 10px; margin-bottom: 10px;">
                                <input type="radio" name="salary_amount" id="salary_amount"
                                    value="1" style="margin-left: 5px; margin-top:10px;">
                                <label style="margin-right: 10px;"
                                    for="salary_amount">EMPL</label>
                            </div>
                            <div style="background-color: #DBD9D9; border-style: solid; border-width: 1px; border-color: lightgray; margin-right: 10px; margin-bottom: 10px;">
                                <input type="radio" name="salary_amount" id="salary_amount"
                                    value="0" style="margin-left: 5px; margin-top:10px;">
                                <label style="margin-right: 10px;"
                                    for="salary_amount">SUPP</label>
                            </div>
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
