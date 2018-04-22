@extends('layouts.app')

@section('content')
  <section class="content-header">
      <h1>
        Account Setting
        <small>Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
	    <!-- Main content -->
    <section class="content">
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">



                <div class="panel-heading">Profile</div>
                 <div class="panel-body">
                <center>
                  <form method="POST" action="{{route('updateprofile')}}" enctype="multipart/form-data" accept-charset="UTF-8">
                     {{ csrf_field() }}
                  <img src="{{(empty(Auth::user()->image_path))?asset('images/default_profile.jpg'):asset('images/').'\\'.Auth::user()->image_path}}" id="profile-img-tag" name="profile-img-tag" width="200" height="200"><br>
                
                 <input type="file"  id="profile-img" name="profile-img"  style="width:200px">
            
                </center>
                <br />

                
                                     
                     <div class="form-group">
                    <label for="exampleInputEmail1">Fullname</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Fullname" value="{{Auth::user()->name}}">
                    </div>
                     <div class="form-group">
                    <label for="exampleInputEmail1">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob"  value="{{Auth::user()->dob}}">
                    </div>
                     <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" class="form-control" id="address" name="address"  value="{{Auth::user()->address}}">
                    </div>
                     <div class="form-group">
                    <label for="exampleInputEmail1">Country</label>
                    <input type="text" class="form-control" id="country" name="country" value="{{Auth::user()->country}}">
                    </div>
                     <div class="form-group">
                    <label for="exampleInputEmail1">Contact #</label>
                    <input type="text" class="form-control" id="contact" name="contact" value="{{Auth::user()->contact_no}}">
                    </div>
                     <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{Auth::user()->email}}">
                    </div>
                     <div class="form-group">
                    <label for="exampleInputEmail1">Beneficiary</label>
                    <input type="text" class="form-control" id="beneficiary" name="beneficiary" value="{{Auth::user()->beneficiary}}">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Beneficiary Relation</label>
                    <input type="text" class="form-control" id="relation" name="relation" value="{{Auth::user()->beneficiary_relation}}">
                    </div>

                    

                    <button  type="submit" class="btn form-control btn-primary">Save</button>
                  </form>

                 </div>


                </div>


                </div>


                <div class="col-md-6">
                      <div class="panel panel-default">



                <div class="panel-heading">Change Password</div>
                 <div class="panel-body">
                    <br />
                     <form method="POST" action="{{route('updatepassword')}}" >
                        {{ csrf_field() }}
                   <div class="form-group">
                    <label for="exampleInputEmail1">Current Password</label>
                    <input type="password" class="form-control" id="current" name="current" >
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">New Password</label>
                    <input type="password" class="form-control" id="new" name="new" >
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmation" name="confirmation" >
                    </div>
                       <button type="submit" class="btn form-control btn-primary">Change Now</button>
                     </form>
              </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function(){
        readURL(this);
    });
</script>
@endsection


