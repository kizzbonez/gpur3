<div id="ActivationModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Activate/Upgrade Slot</h4>
      </div>
      <div class="modal-body">
        
          {{ csrf_field() }}

 

          <div class="alert alert-danger print-error-msg" style="display:none">
            <ul></ul>
        </div>


       
              <div class="form-group self-info">
                <label for="usr">Activation/Upgrade Code:</label>
                <input type="text" class="form-control info" id="code-act" name="code-act"  >
              </div>
              




      </div>




      <div class="modal-footer">
        <button id="account-activation" type="button" name="account-activation"  class="btn btn-default btn-success">Submit</button>
      </div>
    </div>
 </form>
  </div>
</div>