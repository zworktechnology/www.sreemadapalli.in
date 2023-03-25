<!DOCTYPE html>
<html>
<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            padding-top: 20px;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #CAF1DE;
            color: black;
        }


        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Float four columns side by side */
        .column {
            float: left;
            width: 30%;
            padding: 0 10px;
        }

        /* Remove extra left and right margins, due to padding */
        .row {
            margin: 0 -5px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
                display: block;
                margin-bottom: 20px;
            }
        }

        /* Style the counter cards */
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            padding: 16px;
            text-align: center;
            background-color: #f1f1f1;
        }

        .logoname {
            display: flex;
        }

    </style>
</head>
<body>
    <div class="logoname" style="display: flex; justify-content: space-between;">
        <div>
            <img src="{{ asset('assets/images/logo2.png') }}" alt="" height="40">
        </div>
        <div>
            <h4 style="color: red;">All</h4>
        </div>
        <div>
            <h4 style="color: red;">{{ date('d M Y', strtotime($date)) }}</h4>
        </div>
    </div>
    <table id="customers" style="margin-bottom: 20px;">
        <thead>
            <tr>
                <th>Cash - {{ $total_cash }}</th>
                <th>Pending - {{ $total_pending }}</th>
                <th>Wallet - {{ $total_wallet }}</th>
                <th>Total - {{ $total_total }}</th>
            </tr>
        </thead>
    </table>
    <table id="customers">
        <thead style="background: #CAF1DE">
            <tr>
                <th>Bill No</th>
                <th>Customer</th>
                <th>Session</th>
                <th>Payment Via</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody id="customer_index">
            @foreach ($daily_Data as $keydata => $outputs)
            <tr>
                <td style="font-size: 12px;">{{ $outputs['invoice_no'] }}</td>
                <td style="font-size: 12px;">{{ $outputs['customer'] }}</td>
                <td style="font-size: 12px;">{{ $outputs['title'] }}</td>
                <td style="font-size: 12px;">{{ $outputs['payment_method'] }}</td>
                <td style="font-size: 12px;">Rs. {{ $outputs['bill_amount'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
