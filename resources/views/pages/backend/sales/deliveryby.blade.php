<div class="modal-dialog modal-dialog-centered" role="document" id="deliverybyid">
    <div class="modal-content" style="min-width: max-content; !important">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Delivery By</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <table class="table table-bordered dt-responsive  nowrap w-100">
            <thead style="background: #EEBE78">
                <tr>
                    <th>Name</th>
                    <th>Delivery Count</th>
                    <th>Card</th>
                    <th>G-pay</th>
                    <th>G-Pay Business</th>
                    <th>Phonepe</th>
                    <th>Paytm</th>
                    <th>Pending</th>
                    <th>Cash</th>
                </tr>
            </thead>
            <tbody id="">
                @if($deliveryboys_arr != "")
                @foreach ($deliveryboys_arr as $keydata => $deliveryboys_array)
                <tr>
                    <td>{{ $deliveryboys_array['name'] }}</td>
                    <td>{{ $deliveryboys_array['delivery_count'] }}</td>
                    <td>{{ $deliveryboys_array['card'] }}</td>
                    <td>{{ $deliveryboys_array['gpay'] }}</td>
                    <td>{{ $deliveryboys_array['gpaybusiness'] }}</td>
                    <td>{{ $deliveryboys_array['phonepe'] }}</td>
                    <td>{{ $deliveryboys_array['paytm'] }}</td>
                    <td>{{ $deliveryboys_array['pending'] }}</td>
                    <td>{{ $deliveryboys_array['cash'] }}</td>
                </tr>
                @endforeach

                @endif

            </tbody>
        </table>
    </div>
</div>
