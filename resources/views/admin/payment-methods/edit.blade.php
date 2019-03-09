
<div class="modal fade" id="PaymentMethodUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">edit payment method </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{app('shared')->get('base_url')}}/managment/payment-methods/" id="paymentmethod_update_form">
       @csrf
        <div class="modal-body">
            <div class="form-group">
              <label for="ar" class="col-form-label">arabic name</label>
              <input type="text" name="ar" class="form-control" id="ar" required data-parsley-required-message="kindly enter arabic name" placeholder="ar_name">
            </div>
            <div class="form-group">
              <label for="en" class="col-form-label">english name</label>
              <input type="text" name="en" class="form-control" id="en" required data-parsley-required-message="kindly enter english name" placeholder="en_name">
            </div>
            <div class="form-group">
                <label class="col-form-label">Icon</label>
                <input type="file" class="dropify" id="icon" name="icon" data-max-file-size="6M" accept="image/*"
                data-default-file="">
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>