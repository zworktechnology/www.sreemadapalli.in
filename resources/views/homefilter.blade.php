@extends('layouts.login')

@section('content')
<div id="layout-wrapper">

    @include('layouts.general.left-bar')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Dashboard - {{ date('d.m.Y', strtotime($today)) }}</h4>
                        <div class="page-title-right">
                            <div style="display: flex;">

                                <div style="margin-right: 10px;" hidden>
                                    <input type="date" class="form-control" name="dashboarddate" id="dashboarddate" placeholder="Enter Your " required value="{{ $today }}">
                                </div>
                                <div style="margin-right: 10px;">
                                    <div>
                                        <a href="/home">
                                            <button type="button" class="btn btn-success w-md" >Back</button>
                                            </a>

                                        </div>
                                </div>



                                @if (count($opendate) >= 1)
                                @else
                                <div>
                                    <button style="margin-right: 10px;" type="button" class="btn btn-success w-md" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Open Account</button>

                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        @include('pages.backend.accountopen.create')
                                    </div>
                                </div>
                                @endif
                                @if (count($determinationdate) >= 1)
                                @else
                                <div>
                                    <button style="margin-right: 10px;" type="button" class="btn btn-success w-md" data-bs-toggle="modal" data-bs-target="#staticBackdropdeter">Denomination</button>

                                    <div class="modal fade" id="staticBackdropdeter" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        @include('pages.backend.determination.create')
                                    </div>
                                </div>
                                @endif
                                @if (count($closedate) >= 1)
                                @else
                                <div>
                                    <button type="button" class="btn btn-success w-md" data-bs-toggle="modal" data-bs-target="#staticBackdropclose">Close Account</button>

                                    <div class="modal fade" id="staticBackdropclose" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        @include('pages.backend.accountclose.create')
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @if (\Session::has('add'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-check-all me-2"></i>
                    {!! \Session::get('add') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (\Session::has('update'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-bullseye-arrow me-2"></i>
                    {!! \Session::get('update') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="row" style="font-weight: bold;">
                    <div class="col-xl-6 col-12" style="padding-right: 10px;">
                        <div class="card" style="background-color: #ACDDDE;">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap mb-0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">Cash on Hand</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $totaldeterminationdate }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">Pending Bills</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $total_pending }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">G Pay</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $g_pay }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">G-Pay Business</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $g_pay_business }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">Phone Pe</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $phone_pay }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">Card</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $card }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">Paytm</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $paytm }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">Other Cash</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $payment + $other_case }}</td>
                                            </tr>
                                            <tr style="color: red;">
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">Total</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $total_card_one }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card" style="background-color: #CAF1DE;">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap mb-0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">Opening</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $opening }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">Sales</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $sales_amount }}</td>
                                            </tr>
                                            <tr style="color: red;">
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">Total</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $open_sales }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">Expense</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $expense }}</td>
                                            </tr>
                                            <tr style="color: red;">
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">Total</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $open_sales_exp }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card" style="background-color: #E1F8DC;">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap mb-0">
                                        <tr style="color: red;">
                                            <th scope="col" style="font-weight: bold;font-size: 16px !important;">Over All</th>
                                            <th scope="col" style="font-weight: bold;font-size: 16px !important;">₹ {{ $over_all }}</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-12" style="padding-left: 10px;">
                        <div class="card" style="background-color: #FEF8DD;">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap mb-0">
                                        <tbody id="current_date_denomination">
                                            @foreach ($determination as $determinations)
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">₹ 2000</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">{{ $determinations->count_2000 }}</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $determinations->total_2000 }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">₹ 500</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">{{ $determinations->count_500 }}</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $determinations->total_500 }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">₹ 200</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">{{ $determinations->count_200 }}</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $determinations->total_200 }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">₹ 100</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">{{ $determinations->count_100 }}</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $determinations->total_100 }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">₹ 50</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">{{ $determinations->count_50 }}</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $determinations->total_50 }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">₹ 20</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">{{ $determinations->count_20 }}</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $determinations->total_20 }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">₹ 10</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">{{ $determinations->count_10 }}</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $determinations->total_10 }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">₹ 5</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">{{ $determinations->count_5 }}</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $determinations->total_5 }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">₹ 2</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">{{ $determinations->count_2 }}</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $determinations->total_2 }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">₹ 1</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">{{ $determinations->count_1 }}</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $determinations->total_1 }}</td>
                                            </tr>
                                            <tr style="color: red;">
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">Total</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;"></td>
                                                <td style="font-weight: bold;font-size: 16px !important;"></td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $determinations->total_2000 + $determinations->total_500 + $determinations->total_200 + $determinations->total_100 + $determinations->total_50 + $determinations->total_20 + $determinations->total_10 + $determinations->total_5 + $determinations->total_2 + $determinations->total_1 }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                        <tbody id="filter_date_denomination" style="display:none">
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">2000</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="count2000"></td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="total2000"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">500</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="count500"></td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="total500"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">200</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="count200"></td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="total200"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">100</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="count100"></td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="total100"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">50</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="count50"></td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="total50"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">20</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="count20"></td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="total20"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">10</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="count10"></td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="total10"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">5</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="count5"></td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="total5"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">2</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="count2"></td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="total2"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">1</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="count1"></td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="total1"></td>
                                            </tr>
                                            <tr style="color: red;">
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">Total</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;"></td>
                                                <td style="font-weight: bold;font-size: 16px !important;"></td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="all_amount_count"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        @include('layouts.general.footer')

        <script>
            $(document.body).on("click", ".dashboard_search", function() {
                var dashboarddate = $('#dashboarddate').val();


                if (dashboarddate != "") {


                    $.ajax({
                        url: '/getDashboardData/'
                        , type: 'get'
                        , data: {
                            _token: "{{ csrf_token() }}"
                            , dashboarddate: dashboarddate
                        }
                        , dataType: 'json'
                        , success: function(response) {

                            //$('.cash_on_hand').empty();
                            $('#filter_array').html('');


                            console.log(response);
                            var output = response.length;

                            for (var i = 0; i < output; i++) {
                                $('.cash_on_hand').html(response[i].cashonhand);
                                $('.pending_bill').html(response[i].pendingBill);
                                $('.gpay').html(response[i].g_pay);
                                $('.gpaybusiness').html(response[i].g_pay_business);
                                $('.phonepay').html(response[i].phone_pay);
                                $('.debitorcredit_card').html(response[i].debitorcredit_card);
                                $('.other_cash').html(response[i].otherCash);
                                $('.total_amount').html(response[i].totalAmount);
                                $('.opening').html(response[i].opening);
                                $('.sales_amount').html(response[i].sales_amount);
                                $('.totalopening_sales').html(response[i].totalopening_sales);
                                $('.expenseamt').html(response[i].expense);
                                $('.p_total').html(response[i].p_total);
                                $('.overall_amt').html(response[i].overall_amt);

                            }

                        }
                    });


                    $.ajax({
                        url: '/getDenomination/'
                        , type: 'get'
                        , data: {
                            _token: "{{ csrf_token() }}"
                            , dashboarddate: dashboarddate
                        }
                        , dataType: 'json'
                        , success: function(response) {


                            $('#current_date_denomination').empty();

                            console.log(response);
                            var output = response.length;

                            for (var i = 0; i < output; i++) {
                                $('.count2000').html(response[i].count2000);
                                $('.total_2000').html(response[i].total_2000);
                                $('.count500').html(response[i].count500);
                                $('.total_500').html(response[i].total_500);
                                $('.count200').html(response[i].count200);
                                $('.total_200').html(response[i].total_200);
                                $('.count100').html(response[i].count100);
                                $('.total_100').html(response[i].total_100);
                                $('.count50').html(response[i].count50);
                                $('.total_50').html(response[i].total_50);
                                $('.count20').html(response[i].count20);
                                $('.total_20').html(response[i].total_20);
                                $('.count10').html(response[i].count10);
                                $('.total_10').html(response[i].total_10);

                                $('.count5').html(response[i].count5);
                                $('.total_5').html(response[i].total_5);
                                $('.count2').html(response[i].count2);
                                $('.total_2').html(response[i].total_2);
                                $('.count1').html(response[i].count1);
                                $('.total_1').html(response[i].total_1);
                                $('.all_amount_count').html(response[i].all_amount_count);


                                $('#filter_date_denomination').show();
                            }

                        }
                    });

                }
            });

        </script>

    </div>

</div>
@endsection
