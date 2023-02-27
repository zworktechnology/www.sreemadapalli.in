<div class="modal-dialog modal-dialog-centered" role="document">
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
            <tbody id="breakfast_daily">
                @foreach ($deliveryboy as $keydata => $deliveryboys)
                <tr>
                    <td>{{ $deliveryboys->name }}</td>
                    @if($breakfast_data_count = $deliveryboys->id)
                    <td>{{ $breakfast_data_count }}</td>
                    @endif
                    @if($lunch_data_count = $deliveryboys->id)
                    <td>{{ $lunch_data_count }}</td>
                    @endif
                    @if($dinner_data_count = $deliveryboys->id)
                    <td>{{ $dinner_data_count }}</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
