<div class="modal-dialog modal-dialog-centered" role="document" id="deliverybyid">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Full Total</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <table class="table table-bordered dt-responsive  nowrap w-100">
            <thead style="background: #CAF1DE">
                <tr>
                    <th style="background: white"></th>
                    <th>Breakfast</th>
                    <th>Lunch</th>
                    <th>Dinner</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody id="">
                <tr>
                    <td style="background: #CAF1DE">Cash</td>
                    <td>₹ {{ $breakfast_data_pm_cash }}</td>
                    <td>₹ {{ $lunch_data_pm_cash }}</td>
                    <td>₹ {{ $dinner_data_pm_cash }}</td>
                    <td>₹ {{ $total_cash }}</td>
                </tr>
                <tr>
                    <td style="background: #CAF1DE">Pending</td>
                    <td>₹ {{ $breakfast_data_ps_pending }}</td>
                    <td>₹ {{ $lunch_data_ps_pending }}</td>
                    <td>₹ {{ $dinner_data_ps_pending }}</td>
                    <td>₹ {{ $total_pending }}</td>
                </tr>
                <tr>
                    <td style="background: #CAF1DE">Wallet</td>
                    <td>₹ {{ $breakfast_data_pm_wallet }}</td>
                    <td>₹ {{ $lunch_data_pm_wallet }}</td>
                    <td>₹ {{ $dinner_data_pm_wallet }}</td>
                    <td>₹ {{ $total_wallet }}</td>
                </tr>
                <tr>
                    <td style="background: #CAF1DE" >Total Amount</td>
                    <td>₹ {{ $breakfast_data_pm_total }}</td>
                    <td>₹ {{ $lunch_data_pm_total }}</td>
                    <td>₹ {{ $dinner_data_pm_total }}</td>
                    <td>₹ {{ $total_total }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
