<div class="modal-dialog modal-dialog-centered" role="document" id="deliverybyid">
    <div class="modal-content" style="min-width: max-content; !important">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Account Opening Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <table class="table table-bordered dt-responsive  nowrap w-100">
            <thead style="background: #CAF1DE">
                <tr>
                    <th>Account</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody id="">
                @foreach ($openaccount as $keydata => $opendates)
                <tr>
                    <td>Opening {{ ++$keydata }}</td>
                    <td>{{ $opendates->amount }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
