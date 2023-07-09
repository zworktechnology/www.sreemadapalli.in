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
    <div class="logoname">
        <div>
            <img src="{{ asset('assets/images/logo2.png') }}" alt="" height="40">
        </div>
        <div>
            <h5>{{ $outdoor_name }}</h5>
        </div>
    </div>
    <table id="customers">

        <tbody id="customer_index">
            @foreach ($index_arr as $index => $index_array)
            <tr>
                <td>NAME</td>
                <td> {{ $index_array['name'] }}</td>
            </tr>

            <tr>
                <td>CONTACT NUMBER</td>
                <td> {{ $index_array['contact_number'] }}</td>
            </tr>

            <tr>
                <td>ADDRESS</td>
                <td> {{ $index_array['address'] }}</td>
            </tr>

            <tr>
                <td>BOOKING DATE</td>
                <td> {{ $index_array['booking_date'] }}</td>
            </tr>

            <tr>
                <td>DELIVERY DATE</td>
                <td> {{ $index_array['delivery_date'] }}</td>
            </tr>

            <tr>
                <td>NOTE</td>
                <td> {{ $index_array['note'] }}</td>
            </tr>

            <tr>
               <th>PRODUCT NAME</th>
               <th>UNIT</th>
            </tr>

             <tr>
                <td>{{ $index_array['field_title_1'] }}</td>
                <td>{{ $index_array['field_unit_1'] }}</td>
             </tr>
             <tr>
                <td>{{ $index_array['field_title_2'] }}</td>
                <td>{{ $index_array['field_unit_2'] }}</td>
             </tr>
             <tr>
                <td>{{ $index_array['field_title_3'] }}</td>
                <td>{{ $index_array['field_unit_3'] }}</td>
             </tr>
             <tr>
                <td>{{ $index_array['field_title_4'] }}</td>
                <td>{{ $index_array['field_unit_4'] }}</td>
             </tr>
             <tr>
                <td>{{ $index_array['field_title_5'] }}</td>
                <td>{{ $index_array['field_unit_5'] }}</td>
             </tr>
             <tr>
                <td>{{ $index_array['field_title_6'] }}</td>
                <td>{{ $index_array['field_unit_6'] }}</td>
             </tr>
             <tr>
                <td>{{ $index_array['field_title_7'] }}</td>
                <td>{{ $index_array['field_unit_7'] }}</td>
             </tr>
             <tr>
                <td>{{ $index_array['field_title_8'] }}</td>
                <td>{{ $index_array['field_unit_8'] }}</td>
             </tr>
             <tr>
                <td>{{ $index_array['field_title_9'] }}</td>
                <td>{{ $index_array['field_unit_9'] }}</td>
             </tr>
             <tr>
                <td>{{ $index_array['field_title_10'] }}</td>
                <td>{{ $index_array['field_unit_10'] }}</td>
             </tr>

            @endforeach
        </tbody>
    </table>

</body>
</html>
