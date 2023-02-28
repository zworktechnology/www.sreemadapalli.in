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

        .card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}

    </style>
</head>
<body>

    <h1>Customer - {{ $customerdata->name }}</h1>
                
    
    <div class="card">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p class="text-muted fw-medium mb-2" style="color: black !important; font-weight: bold;">Total Amount</p>
                    <h4 class="mb-0" style="color: red !important;">₹ {{ $total_amount }}</h4> 
                </div>
                <div class="col-md-4">
                    <p class="text-muted fw-medium mb-2" style="color: black !important; font-weight: bold;">Total Amount</p>
                    <h4 class="mb-0" style="color: red !important;">₹ {{ $total_amount }}</h4> 
                </div>
            </div>
        </div>
    </div>


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
