<div class="modal-dialog modal-dialog-centered" role="document" id="deliverybyid">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Cash</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <table class="table table-bordered dt-responsive  nowrap w-100">
            <thead style="background: #CAF1DE">
                <tr>
                    <th>Breakfast</th>
                    <th>Lunch</th>
                    <th>Dinner</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody id="">
                <tr>
                    <td>₹ {{ $breakfast_data_pm_cash }}</td>
                    <td>₹ {{ $lunch_data_pm_cash }}</td>
                    <td>₹ {{ $dinner_data_pm_cash }}</td>
                    <td>₹ {{ $total_cash }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
