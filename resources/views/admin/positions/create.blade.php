
<div class="modal fade" id="PositionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">اضافة منصب جديد</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="http://localhost:9000/api/position/" id="position_form">
      @csrf
        <div class="modal-body">
            <div class="form-group">
              <label for="ar" class="col-form-label">الاسم باللغة العربية</label>
              <input type="text" name="ar" class="form-control" id="ar"  placeholder="ادخل الاسم بالعربى">
            </div>
            <div class="form-group">
              <label for="en" class="col-form-label">الاسم باللغة الانجليزية</label>
              <input type="text" name="en" class="form-control" id="en" placeholder="ادخل الاسم بالانجليزى">
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