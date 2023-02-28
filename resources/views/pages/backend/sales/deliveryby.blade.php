<div class="modal-dialog modal-dialog-centered" role="document" id="deliverybyid">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Delivery By</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <table class="table table-bordered dt-responsive  nowrap w-100">
            <thead style="background: #EEBE78">
                <tr>
                    <th>Name</th>
                    <th>Breakfast</th>
                    <th>Lunch</th>
                    <th>Dinner</th>
                </tr>
            </thead>
            <tbody id="">
                
                    @foreach ($deliveryboys_arr as $keydata => $deliveryboys_array)
                    <tr>
                        <td>{{ $deliveryboys_array['name'] }}</td>
                        <td>{{ $deliveryboys_array['delivery_count'] }}</td>
                    </tr>
                    @endforeach
                

            </tbody>
        </table>
    </div>
</div>

