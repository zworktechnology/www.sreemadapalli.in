<div class="modal-dialog modal-dialog-centered" role="document" id="deliverybyid">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Wallet</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <table class="table table-bordered dt-responsive  nowrap w-100">
            <thead style="background: #CAF1DE">
                <tr>
                    <th>Card</th>
                    <th>G-Pay</th>
                    <th>G-Pay Business</th>
                    <th>Phone Pe</th>
                    <th>Paytm</th>
                </tr>
            </thead>
            <tbody id="">
                <tr>
                    <td>₹ {{ $card }}</td>
                    <td>₹ {{ $gpay }}</td>
                    <td>₹ {{ $gpaybusiness }}</td>
                    <td>₹ {{ $phonepe }}</td>
                    <td>₹ {{ $paytm }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
