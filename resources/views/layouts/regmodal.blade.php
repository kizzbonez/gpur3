<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Member Information</h4>
      </div>
      <div class="modal-body">
        {{ csrf_field() }}
        <div class="row">

          <div class="col-md-6">
                             <div class="radio">
                <label><input type="radio" id="rad2" name="optradio" checked>New Member</label>
              </div>

            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>
 
              <div class="form-group user-info">
              <label for="usr">Name:</label>
              <input type="text" class="form-control info" id="name" name="name" >
            </div>

              <div class="form-group self-info">
                <label for="usr">Username:</label>
                <input type="text" class="form-control info" id="username" name="username"  >
              </div>

                <div class="form-group user-info">
                <label for="usr">Password:</label>
                <input type="password" class="form-control info" id="password" name="password" >
              </div>

              <div class="form-group user-info">
                <label for="usr">Confirm Password:</label>
                <input type="password" class="form-control info" id="password_confirmation" name="password_confirmation" >
              </div>

              
                 <div class="form-group user-info">
                <label for="usr">Contact #</label>
                <input type="text" class="form-control info" id="contact" name="contact" >
              </div>

               <div class="form-group user-info">
                <label for="usr">Address</label>
                <input type="text" class="form-control info" id="address" name="address" >
              </div>

          </div>



          <div class="col-md-6">
               
              <div class="form-group user-info">
                <label for="usr">Country</label>
                <input type="text" class="form-control info" id="country" name="country" >
              </div>
              <div class="form-group user-info">
                <label for="usr">Birthdate</label>
                <input type="date" class="form-control info" id="dob" name="dob" >
              </div>
               <div class="form-group user-info">
                <label for="usr">Email</label>
                <input type="email" class="form-control info" id="email" name="email" >
              </div>
              <div class="form-group user-info">
                <label for="usr">Beneficiary</label>
                <input type="text" class="form-control info" id="beneficiary" name="beneficiary" > 
              </div>
              <div class="form-group user-info">
                <label for="usr">Beneficiary Relation</label>
                <input type="text" class="form-control info" id="relationship" name="relationship" >
              </div>
              <div class="form-group self-info">
                <label for="usr">Sponsor's ID</label>
                <input type="text" class="form-control info" id="sponsor" name="sponsor" value="{{Auth::user()->username}}" >
              </div>
               <div class="form-group self-info">
                <label for="usr">Activation Code</label>
                <input type="text" class="form-control info" id="code" name="code" >
              </div>
          </div>
        </div>
          
<!--
       <div class="radio">
        <label><input type="radio" id="rad1" name="optradio" hidden><b>Sub Account: </b></label>    
      </div>
-->

     

              

       




      </div>




      <div class="modal-footer">
        <button  class="btn btn-default btn-submit">Submit</button>
      </div>
    </div>
 </form>
  </div>
</div>