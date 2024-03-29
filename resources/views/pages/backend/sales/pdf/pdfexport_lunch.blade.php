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
    <table style="margin-bottom: 10px;">
        <thead>
            <tr>
                <th><img src="{{ asset('assets/images/logo2.png') }}" alt="" height="40"></th>
                <th><p>-----------------------</p></th>
                <th style="margin: 20px;">Lunch</th>
                <th><p>-----------------------</p></th>
                <th style="margin: 20px;">{{ date('d M Y', strtotime($date)) }}</th>
            </tr>
        </thead>
    </table>
    <table id="customers">
        <thead style="background: #CAF1DE">
            <tr>
                <th>Sl. No</th>
                <th>Bill No</th>
                <th>Customer Name</th>
                <th>Cash</th>
                <th>Pending</th>
                <th>Wallet</th>
            </tr>
        </thead>
        <tbody id="customer_index">
            @foreach ($data as $keydata => $data)
            <tr>
                <td>{{ ++$keydata }}</td>
                <td>{{ $data->invoice_no }}</td>
                <td style="font-size: 12px;">{{ $data->customer->name }}</td>

                @if ($data->payment_method == 'Cash')
                <td style="font-size: 12px;">Rs. {{ $data->bill_amount }}</td>
                @else
                <td style="font-size: 12px;"></td>
                @endif

                @if ($data->payment_method == 'Pending')
                <td style="font-size: 12px;">Rs. {{ $data->bill_amount }}</td>
                @else
                <td style="font-size: 12px;"></td>
                @endif

                @if ($data->payment_method != 'Pending' && $data->payment_method != 'Cash')
                <td style="font-size: 12px;">Rs. {{ $data->bill_amount }}</td>
                @else
                <td style="font-size: 12px;"></td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th style="font-size: 12px;">Cash</th>
                <th style="font-size: 12px;"><span style="color: red;">Rs. {{ $cash }}</span></th>
            </tr>
            <tr>
                <th style="font-size: 12px;">Pending</th>
                <th style="font-size: 12px;"><span style="color: red;">Rs. {{ $pending }}</span></th>
            </tr>
            <tr>
                <th style="font-size: 12px;">Wallet</th>
                <th style="font-size: 12px;"><span style="color: red;">Rs. {{ $wallet }}</span></th>
            </tr>
            <tr>
                <th style="font-size: 12px;">Total</th>
                <th style="font-size: 12px;"><span style="color: red;">Rs. {{ $total }}</span></th>
            </tr>
        </thead>
    </table>
</body>
</html>
