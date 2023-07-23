@extends('layouts.login')

@section('content')
    <div id="layout-wrapper">

        @include('layouts.general.left-bar')

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Out door</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ route('outdoor.index') }}">Outdoor</a></li>
                                        <li class="breadcrumb-item active">Update</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <form autocomplete="off" method="POST"
                                        action="{{ route('outdoor.update', ['id' => $data->id]) }}"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="employee_id" class="col-sm-3 col-form-label">
                                                Name <span style="color: red;">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="name"
                                                    placeholder="Enter Your " required value="{{ $data->name }}">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="employee_id" class="col-sm-3 col-form-label">
                                                Phone <span style="color: red;">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="contact_number"
                                                    placeholder="Enter Your " required value="{{ $data->contact_number }}">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="employee_id" class="col-sm-3 col-form-label">
                                                Address <span style="color: red;">*</span></label>
                                            <div class="col-sm-9">
                                                <textarea type="text" class="form-control" name="address" placeholder="Enter Your " required>{!! $data->address !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="date" class="col-sm-3 col-form-label">
                                                Booking <span style="color: red;">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="booking_date"
                                                    placeholder="Enter Your " required value="{{ $data->booking_date }}">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="date" class="col-sm-3 col-form-label">
                                                Delivery <span style="color: red;">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="datetime-local" class="form-control" name="delivery_date"
                                                    placeholder="Enter Your " required value="{{ $data->delivery_date }}">
                                            </div>
                                        </div>
                                        <hr>
                                        
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                    <p>Pricing</p>
                                                </div>
                                            <div class="col-sm-9">
                                            <input type="button" id="addproductfields"  class="btn btn-success inner" value="Add"/>
                                                    <div class="table-responsive col-lg-12 col-sm-12 col-12">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Product</th>
                                                                    <th>Unit</th>
                                                                    <th>Price</th>
                                                                    <th>Total</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="product_fields">
                                                            @foreach ($OutdoorData as $index => $OutdoorDatas)
                                                                <tr>
                                                                    <td><input type="hidden"id="outdoor_detailid"name="outdoor_detailid[]"value="{{ $OutdoorDatas->id }}" />
                                                                        <input type="text" style="background:#eee" class="form-control" name="outdoor_product[]" placeholder="Product Name" value="{{ $OutdoorDatas->outdoor_product }}"></td>
                                                                    <td><input type="number" style="background:#eee" class="form-control outdoor_unit" name="outdoor_unit[]" id="outdoor_unit" placeholder="Unit" value="{{ $OutdoorDatas->outdoor_unit }}"></td>
                                                                    <td><input type="number" style="background:#eee" class="form-control outdoor_price" name="outdoor_price[]" id="outdoor_price" placeholder="Price" value="{{ $OutdoorDatas->outdoor_price }}"></td>
                                                                    <td><input type="number" style="background:#eee" class="form-control outdoor_total" name="outdoor_total[]" readonly id="outdoor_total" placeholder="Total" value="{{ $OutdoorDatas->outdoor_total }}"></td>
                                                                    <td><button style="width: 35px;" class="text-white font-medium rounded-lg text-sm  text-center btn btn-danger remove-tr" type="button" >-</button></td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                
                                            </div>
                                        </div>
                                        <div class="row mb-3 file-6">
                                                <label for="note" class="col-sm-6 col-form-label">
                                                    Over All Total Amount</label>
                                                <div class="col-sm-5">
                                                    <input type="number" class="form-control over_all_total" readonly name="over_all_total" value="{{ $data->over_all_total }}"
                                                        id="over_all_total" placeholder="Total">
                                                </div>
                                            </div>
                                        <hr>
                                        <div class="row mb-3">
                                            <label for="note" class="col-sm-3 col-form-label">
                                                Note</label>
                                            <div class="col-sm-9">
                                                <textarea type="number" class="form-control" name="note" placeholder="Enter Your " required>{!! $data->note !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="col-sm-9">
                                                <div>
                                                    <button type="submit" class="btn btn-success w-md">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
    $(document).ready(function() {
        $("#addproductfields").click(function() {
            $("#product_fields").append(
                    '<tr>' +
                    '<td><input type="hidden"id="outdoor_detailid"name="outdoor_detailid[]" />' +
                    '<input type="text" class="form-control" name="outdoor_product[]" placeholder="Product Name"></td>' +
                    '<td><input type="number" class="form-control outdoor_unit" name="outdoor_unit[]" id="outdoor_unit" placeholder="Unit" ></td>' +
                    '<td><input type="number" class="form-control outdoor_price" name="outdoor_price[]" id="outdoor_price" placeholder="Price" ></td>' +
                    '<td><input type="number" class="form-control outdoor_total" readonly name="outdoor_total[]" id="outdoor_total" placeholder="Total"></td>' +
                    '<td><button style="width: 35px;" class="text-white font-medium rounded-lg text-sm  text-center btn btn-danger remove-tr" type="button" >-</button></td>' +
                    '</tr>'
                );
        });
    });
    $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
    });


    $(document).on("blur", "input[name*=outdoor_price]", function() {
        var outdoor_price = $(this).val();
        var outdoor_unit = $(this).parents('tr').find('.outdoor_unit').val();
        var total = outdoor_price * outdoor_unit;
        $(this).parents('tr').find('.outdoor_total').val(total);

        var totalAmount = 0;
            $("input[name='outdoor_total[]']").each(
                                    function() {
                                        //alert($(this).val());
                                        totalAmount = Number(totalAmount) +
                                            Number($(this).val());
                                        $('.over_all_total').val(
                                            totalAmount);
                                    });
    });

    $(document).on("blur", "input[name*=outdoor_unit]", function() {
        var outdoor_unit = $(this).val();
        var outdoor_price = $(this).parents('tr').find('.outdoor_price').val();
        var total = outdoor_price * outdoor_unit;
        $(this).parents('tr').find('.outdoor_total').val(total);

        var totalAmount = 0;
            $("input[name='outdoor_total[]']").each(
                                    function() {
                                        //alert($(this).val());
                                        totalAmount = Number(totalAmount) +
                                            Number($(this).val());
                                        $('.over_all_total').val(
                                            totalAmount);
                                    });
    });
</script>

            @include('layouts.general.footer')

        </div>
    </div>
@endsection
