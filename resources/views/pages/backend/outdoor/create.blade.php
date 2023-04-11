<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel" style="margin-bottom: 20px;">New Order</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        <input type="number" class="form-control" name="contact_number" placeholder="Enter Your "
                            required>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="employee_id" class="col-sm-3 col-form-label">
                        Address <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <textarea type="text" class="form-control" name="address" placeholder="Enter Your " required></textarea>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="date" class="col-sm-3 col-form-label">
                        Booking <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="booking_date" placeholder="Enter Your "
                            required value="{{ $today }}">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="date" class="col-sm-3 col-form-label">
                        Delivery <span style="color: red;">*</span></label>
                    <div class="col-sm-9">
                        <input type="datetime-local" class="form-control" name="delivery_date" placeholder="Enter Your "
                            required>
                    </div>
                </div>
                <hr>
                <div class="row mb-3 file-1">
                    <div class="col-sm-3">
                        <p>Pricing</p>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="field_title_1" placeholder="Product Name">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_unit_1" id="field_unit_1"
                            placeholder="Unit" onchange="totalcalculate()">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_unit_price_1" id="field_unit_price_1"
                            placeholder="Price" onchange="totalcalculate()">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_total_1" id="field_total_1"
                            placeholder="Total" onchange="totalcalculate()">
                    </div>
                </div>
                <div class="row mb-3 file-2">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="field_title_2" placeholder="Product Name">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_unit_2" id="field_unit_2"
                            placeholder="Unit" onchange="totalcalculate()">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_unit_price_2" id="field_unit_price_2"
                            placeholder="Price" onchange="totalcalculate()">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_total_2" id="field_total_2"
                            placeholder="Total" onchange="totalcalculate()">
                    </div>
                </div>
                <div class="row mb-3 file-3">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="field_title_3" placeholder="Product Name">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_unit_3" id="field_unit_3"
                            placeholder="Unit" onchange="totalcalculate()">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_unit_price_3" id="field_unit_price_3"
                            placeholder="Price" onchange="totalcalculate()">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_total_3" id="field_total_3"
                            placeholder="Total" onchange="totalcalculate()">
                    </div>
                </div>
                <div class="row mb-3 file-4">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="field_title_4" placeholder="Product Name">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_unit_4" id="field_unit_4"
                            placeholder="Unit" onchange="totalcalculate()">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_unit_price_4" id="field_unit_price_4"
                            placeholder="Price" onchange="totalcalculate()">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_total_4" id="field_total_4"
                            placeholder="Total" onchange="totalcalculate()">
                    </div>
                </div>
                <div class="row mb-3 file-5">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="field_title_5" placeholder="Product Name">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_unit_5" id="field_unit_5"
                            placeholder="Unit" onchange="totalcalculate()">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_unit_price_5" id="field_unit_price_5"
                            placeholder="Price" onchange="totalcalculate()">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_total_5" id="field_total_5"
                            placeholder="Total" onchange="totalcalculate()">
                    </div>
                </div>
                <div class="row mb-3 file-6">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="field_title_6" placeholder="Product Name">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_unit_6" id="field_unit_6"
                            placeholder="Unit" onchange="totalcalculate()">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_unit_price_6" id="field_unit_price_6"
                            placeholder="Price" onchange="totalcalculate()">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_total_6" id="field_total_6"
                            placeholder="Total" onchange="totalcalculate()">
                    </div>
                </div>
                <div class="row mb-3 file-7">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="field_title_7" placeholder="Product Name">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_unit_7" id="field_unit_7"
                            placeholder="Unit" onchange="totalcalculate()">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_unit_price_7" id="field_unit_price_7"
                            placeholder="Price" onchange="totalcalculate()">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_total_7" id="field_total_7"
                            placeholder="Total" onchange="totalcalculate()">
                    </div>
                </div>
                <div class="row mb-3 file-8">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="field_title_8" placeholder="Product Name">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_unit_8" id="field_unit_8"
                            placeholder="Unit" onchange="totalcalculate()">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_unit_price_8" id="field_unit_price_8"
                            placeholder="Price" onchange="totalcalculate()">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_total_8" id="field_total_8"
                            placeholder="Total" onchange="totalcalculate()">
                    </div>
                </div>
                <div class="row mb-3 file-9">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="field_title_9" placeholder="Product Name">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_unit_9" id="field_unit_9"
                            placeholder="Unit" onchange="totalcalculate()">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_unit_price_9" id="field_unit_price_9"
                            placeholder="Price" onchange="totalcalculate()">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_total_9" id="field_total_9"
                            placeholder="Total" onchange="totalcalculate()">
                    </div>
                </div>
                <div class="row mb-3 file-">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="field_title_10" placeholder="Product Name">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_unit_10" id="field_unit_10"
                            placeholder="Unit" onchange="totalcalculate()">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_unit_price_10" id="field_unit_price_10"
                            placeholder="Price" onchange="totalcalculate()">
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="field_total_10" id="field_total_10"
                            placeholder="Total" onchange="totalcalculate()">
                    </div>
                </div>
                <div class="row mb-3 file-6">
                    <label for="note" class="col-sm-6 col-form-label">
                        Over All Total Amount</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="over_all_total" id="over_all_total"
                            placeholder="Total">
                    </div>
                </div>
                <hr>
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

<script>
    function totalcalculate() {
        var field_unit_1 = $('#field_unit_1').val();
        var field_unit_price_1 = $('#field_unit_price_1').val();
        $('#field_total_1').val(field_unit_1 * field_unit_price_1);

        var field_unit_2 = $('#field_unit_2').val();
        var field_unit_price_2 = $('#field_unit_price_2').val();
        $('#field_total_2').val(field_unit_2 * field_unit_price_2);

        var field_unit_3 = $('#field_unit_3').val();
        var field_unit_price_3 = $('#field_unit_price_3').val();
        $('#field_total_3').val(field_unit_3 * field_unit_price_3);

        var field_unit_4 = $('#field_unit_4').val();
        var field_unit_price_4 = $('#field_unit_price_4').val();
        $('#field_total_4').val(field_unit_4 * field_unit_price_4);

        var field_unit_5 = $('#field_unit_5').val();
        var field_unit_price_5 = $('#field_unit_price_5').val();
        $('#field_total_5').val(field_unit_5 * field_unit_price_5);

        var field_unit_6 = $('#field_unit_6').val();
        var field_unit_price_6 = $('#field_unit_price_6').val();
        $('#field_total_6').val(field_unit_6 * field_unit_price_6);

        var field_unit_7 = $('#field_unit_7').val();
        var field_unit_price_7 = $('#field_unit_price_7').val();
        $('#field_total_7').val(field_unit_7 * field_unit_price_7);

        var field_unit_8 = $('#field_unit_8').val();
        var field_unit_price_8 = $('#field_unit_price_8').val();
        $('#field_total_8').val(field_unit_8 * field_unit_price_8);

        var field_unit_9 = $('#field_unit_9').val();
        var field_unit_price_9 = $('#field_unit_price_9').val();
        $('#field_total_9').val(field_unit_9 * field_unit_price_9);

        var field_unit_10 = $('#field_unit_10').val();
        var field_unit_price_10 = $('#field_unit_price_10').val();
        $('#field_total_10').val(field_unit_10 * field_unit_price_10);

        var over_all_total = 0;
        var field_total_1 = $('#field_total_1').val();
        var field_total_2 = $('#field_total_2').val();
        var field_total_3 = $('#field_total_3').val();
        var field_total_4 = $('#field_total_4').val();
        var field_total_5 = $('#field_total_5').val();
        var field_total_6 = $('#field_total_6').val();
        var field_total_7 = $('#field_total_7').val();
        var field_total_8 = $('#field_total_8').val();
        var field_total_9 = $('#field_total_9').val();
        var field_total_10 = $('#field_total_10').val();

        if (field_total_1 != "") {
            over_all_total += parseFloat(field_total_1);
        }
        if (field_total_2 != "") {
            over_all_total += parseFloat(field_total_2);
        }
        if (field_total_3 != "") {
            over_all_total += parseFloat(field_total_3);
        }
        if (field_total_4 != "") {
            over_all_total += parseFloat(field_total_4);
        }
        if (field_total_5 != "") {
            over_all_total += parseFloat(field_total_5);
        }
        if (field_total_6 != "") {
            over_all_total += parseFloat(field_total_6);
        }
        if (field_total_7 != "") {
            over_all_total += parseFloat(field_total_7);
        }
        if (field_total_8 != "") {
            over_all_total += parseFloat(field_total_8);
        }
        if (field_total_9 != "") {
            over_all_total += parseFloat(field_total_9);
        }
        if (field_total_10 != "") {
            over_all_total += parseFloat(field_total_10);
        }

        $('#over_all_total').val(over_all_total);
    }
</script>
