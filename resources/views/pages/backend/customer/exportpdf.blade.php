<!DOCTYPE html>
<html>
<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
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
            background-color: lightgrey;
            color: black;
        }

    </style>
</head>
<body>

    <h1>Customer - {{ $customerdata->name }}</h1>

    <table id="customers">
        <thead style="background: #EEBE78">
            <tr>
                <th>Sl. No</th>
                <th>Date</th>
                <th>Break Fast</th>
                <th>Lunch</th>
                <th>Dinner</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody id="customer_index">
            @foreach ($Custumer_pdf_array as $index => $Custumer_pdf_arr)
            <tr>
                <td>{{ ++$index }}</td>
                <td>{{ $Custumer_pdf_arr['date'] }}</td>
                <td>Rs. {{ $Custumer_pdf_arr['CustomersBreakfastAmt'] }}</td>
                <td>Rs. {{ $Custumer_pdf_arr['CustomersLunchAmt'] }}</td>
                <td>Rs. {{ $Custumer_pdf_arr['CustomersDinnerAmt'] }}</td>
                <td>Rs. {{ $Custumer_pdf_arr['TotalAmount'] }}</td>
            </tr>
            @endforeach
        </tbody>




    </table>

</body>
</html>
