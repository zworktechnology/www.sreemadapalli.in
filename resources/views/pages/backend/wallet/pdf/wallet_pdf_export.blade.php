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
            background-color: #e5ff8e;
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
    <div class="logoname">
        <div>
            <img src="{{ asset('assets/images/logo2.png') }}" alt="" height="40">
        </div>
        <div>
            <h5>Wallet</h5>
        </div>
    </div>
    <table id="customers">
        <thead style="background: #CAF1DE">
            <tr>
                <th>Sl. No</th>
                <th>Date</th>
                <th>Customer</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody id="customer_index">
            @foreach ($datas as $keydata => $outputs)
            <tr>
                <td>{{ ++$keydata }}</td>
                <td style="font-size: 12px;">{{ $outputs->customer->name }}</td>
                <td style="font-size: 12px;">{{ $outputs->customer->name }}</td>
                <td style="font-size: 12px;">₹ {{ $outputs->amount }}</td>
                @if ($outputs->status == '1')
                    <td style="color: white;font-size: 12px; background-color:green;">PAID</td>
                @else
                    <td style="color: white;font-size: 12px; background-color:red;">PENDING</td>
                @endif
               
            </tr>
            @endforeach
        </tbody>
    </table>
    <table id="customers">
        <thead>
            <tr>
                <th style="background-color: #C1D1DB;">Paid - Rs. {{ $wallet_paid }}</th>
                <th style="background-color: #FFE972;">Pending - Rs. {{ $wallet_pending }}</th>
                <th style="background-color: #D8E79D;">total - Rs. {{ $wallet_paid + $wallet_pending }}</th>
            </tr>
        </thead>
    </table>
    
</body>
</html>
