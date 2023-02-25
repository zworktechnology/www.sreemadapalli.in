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
                    <th>Delivery Count</th>
                </tr>
            </thead>
            <tbody id="breakfast_daily">
                @foreach ($deliveryboy as $keydata => $deliveryboys)
                <tr>
                    <td>{{ $deliveryboys->name }}</td>
                    <td>{{ $breakfast_data_count + $lunch_data_count + $dinner_data_count }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
