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
                            <h4 class="mb-sm-0 font-size-18">Determination - {{ date('d.m.Y', strtotime($data->date)) }}</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <form autocomplete="off" method="POST" action="{{ route('determination.update', ['id' => $data->id]) }}" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row mb-4">
                                        <label for="date" class="col-sm-4 col-form-label">
                                            Date <span style="color: red;">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" name="date" placeholder="Enter Your " required value="{{ $data->date }}">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="2000" class="col-sm-4 col-form-label">
                                            2000 <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="count_2000" id="count_2000" placeholder="Enter Your " required onchange="totaldetermination()" value="{{ $data->count_2000 }}">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="total_2000" id="total_2000" placeholder="Enter Your " required onchange="totaldetermination()" value="{{ $data->total_2000 }}">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="500" class="col-sm-4 col-form-label">
                                            500 <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="count_500" id="count_500" placeholder="Enter Your " required onchange="totaldetermination()" value="{{ $data->count_500 }}">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="total_500" id="total_500" placeholder="Enter Your " required onchange="totaldetermination()" value="{{ $data->total_500 }}">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="200" class="col-sm-4 col-form-label">
                                            200 <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="count_200" id="count_200" placeholder="Enter Your " required onchange="totaldetermination()" value="{{ $data->count_200 }}">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="total_200" id="total_200" placeholder="Enter Your " required onchange="totaldetermination()" value="{{ $data->total_200 }}">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="100" class="col-sm-4 col-form-label">
                                            100 <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="count_100" id="count_100" placeholder="Enter Your " required onchange="totaldetermination()" value="{{ $data->count_100 }}">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="total_100" id="total_100" placeholder="Enter Your " required onchange="totaldetermination()" value="{{ $data->total_100 }}">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="50" class="col-sm-4 col-form-label">
                                            50 <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="count_50" id="count_50" placeholder="Enter Your " required onchange="totaldetermination()" value="{{ $data->count_50 }}">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="total_50" id="total_50" placeholder="Enter Your " required onchange="totaldetermination()" value="{{ $data->total_50 }}">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="20" class="col-sm-4 col-form-label">
                                            20 <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="count_20" id="count_20" placeholder="Enter Your " required onchange="totaldetermination()" value="{{ $data->count_20 }}">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="total_20" id="total_20" placeholder="Enter Your " required onchange="totaldetermination()" value="{{ $data->total_20 }}">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="10" class="col-sm-4 col-form-label">
                                            10 <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="count_10" id="count_10" placeholder="Enter Your " required onchange="totaldetermination()" value="{{ $data->count_10 }}">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="total_10" id="total_10" placeholder="Enter Your " required onchange="totaldetermination()" value="{{ $data->total_10 }}">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="5" class="col-sm-4 col-form-label">
                                            5 <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="count_5" id="count_5" placeholder="Enter Your " required onchange="totaldetermination()" value="{{ $data->count_5 }}">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="total_5" id="total_5" placeholder="Enter Your " required onchange="totaldetermination()" value="{{ $data->total_5 }}">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="2" class="col-sm-4 col-form-label">
                                            2 <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="count_2" id="count_2" placeholder="Enter Your " required onchange="totaldetermination()" value="{{ $data->count_2 }}">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="total_2" id="total_2" placeholder="Enter Your " required onchange="totaldetermination()" value="{{ $data->total_2 }}">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="1" class="col-sm-4 col-form-label">
                                            1 <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="count_1" id="count_1" placeholder="Enter Your " required onchange="totaldetermination()" value="{{ $data->count_1 }}">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="total_1" id="total_1" placeholder="Enter Your " required onchange="totaldetermination()" value="{{ $data->total_1 }}">
                                        </div>
                                    </div>
                                    <div class="row mb-4" hidden>
                                        <label for="total" class="col-sm-4 col-form-label">
                                            Total <span style="color: red;">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" name="total" id="total" placeholder="Enter Your " required>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-sm-2">
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
            function totaldetermination() {
                var grand_total = 0;
                var count_2000 = $('#count_2000').val();
                var count_500 = $('#count_500').val();
                var count_200 = $('#count_200').val();
                var count_100 = $('#count_100').val();
                var count_50 = $('#count_50').val();
                var count_20 = $('#count_20').val();
                var count_10 = $('#count_10').val();
                var count_5 = $('#count_5').val();
                var count_2 = $('#count_2').val();
                var count_1 = $('#count_1').val();
                var total_2000 = $('#total_2000').val();
                var total_500 = $('#total_500').val();
                var total_200 = $('#total_200').val();
                var total_100 = $('#total_100').val();
                var total_50 = $('#total_50').val();
                var total_20 = $('#total_20').val();
                var total_10 = $('#total_10').val();
                var total_5 = $('#total_5').val();
                var total_2 = $('#total_2').val();
                var total_1 = $('#total_1').val();

                $('#total_2000').val(2000 * count_2000);
                $('#total_500').val(500 * count_500);
                $('#total_200').val(200 * count_200);
                $('#total_100').val(100 * count_100);
                $('#total_50').val(50 * count_50);
                $('#total_20').val(20 * count_20);
                $('#total_10').val(10 * count_10);
                $('#total_5').val(5 * count_5);
                $('#total_2').val(2 * count_2);
                $('#total_1').val(1 * count_1);

                if (total_2000 != "") {
                    grand_total += parseFloat(total_2000);
                }
                if (total_500 != "") {
                    grand_total += parseFloat(total_500);
                }
                if (total_200 != "") {
                    grand_total += parseFloat(total_200);
                }
                if (total_100 != "") {
                    grand_total += parseFloat(total_100);
                }
                if (total_50 != "") {
                    grand_total += parseFloat(total_50);
                }
                if (total_20 != "") {
                    grand_total += parseFloat(total_20);
                }
                if (total_10 != "") {
                    grand_total += parseFloat(total_10);
                }
                if (total_5 != "") {
                    grand_total += parseFloat(total_5);
                }
                if (total_2 != "") {
                    grand_total += parseFloat(total_2);
                }
                if (total_1 != "") {
                    grand_total += parseFloat(total_1);
                }

                $('#total').val(grand_total);

            }

        </script>

        @include('layouts.general.footer')

    </div>
</div>
@endsection
