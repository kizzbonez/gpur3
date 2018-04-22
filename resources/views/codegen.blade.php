@extends('layouts.app')

@section('content')
  <section class="content-header">
      <h1>
        Code Generation
        <small>Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Code Generation</li>
      </ol>
    </section>
      <!-- Main content -->
    <section class="content">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Manage Codes</div>

                <div class="panel-body">

                        <div class="col-md-3">
                             <div class="panel panel-default">
                                 <div class="panel-heading">Generate Code</div>
                                    <div class="panel-body">
                                      <form method="POST" action="{{route('generating')}}">
                                             {{ csrf_field() }}
                                        <div class="form-group">
                                              <label for="pwd">OR/SI #:</label>
                                              <input type="text" class="form-control" id="or_si" name="or_si" required>
                                      </div>
                                        <div class="form-group">
                                              <label for="pwd">Full Name:</label>
                                              <input type="text" class="form-control" id="name" name="name" required>
                                      </div>
                                        <div class="form-group">
                                              <label for="pwd">Account Type:</label>
                                              <select class="form-control" id="type" name="type">
                                               @foreach($account_types as $types)
                                               <option value="{{$types->label}}" data-price="{{$types->price}}">{{$types->label}}</option>

                                               @endforeach

                                              </select>
                                      </div> 

                                        <div class="form-group">
                                              <label for="pwd">Quantity:</label>
                                              <input type="number" class="form-control" id="qty" name="qty"  value="1" required> 
                                      </div>     
                                    
                                      <div class="form-group">
                                              <label for="pwd">Total Amount:</label>
                                              <input type="number" class="form-control" id="total" name="total" required> 
                                      </div>
                                       <div class="form-group">
                                              <label for="pwd">Submit to Generate</label>
                                             <button  type="submit" class="form-control btn btn-primary">Generate</button>
                                      </div>


                                    


                                    </div>
                             </div>


                        </div>



                            <div class="col-md-9">
                             <div class="panel panel-default">
                                 <div class="panel-heading">Code List</div>
                                    <div class="panel-body">

                                      <div class="box-body">
                                      <table id="example2" class="table table-bordered table-striped table-hover">
                                        <thead>
                                        <tr>
                                          <th>ID</th>
                                          <th>CODE</th>
                                          <th>OR/SI</th>
                                          <th>NAME</th>
                                           <th>TYPE</th>
                                          <th>STATUS</th>

                                       
                                        </thead>
                                        <tbody>
                                    @foreach ($codes as $code)
                                        <tr>
                                            <td>{{$code->id}}</td>
                                           <td>{{$code->code}}</td>
                                           <td>{{$code->or_si}}</td>
                                            <td>{{$code->name}}</td>
                                           <td>{{$code->acc_type}}</td>
                                        @if($code->status_id === '1')
                                            <td><font color="red">Used</font></td>
                                        @else
                                            <td><font color="Green">Available</font></td>
                                        @endif
                                        
                                        
                                          
                                        </tr>
                                      @endforeach
                                        </tbody>
                                    
                                      </table>
                                    </div>

                                    </div>
                             </div>


                        </div>

                  
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  $(function () {

    $('#example2').DataTable();


    var compute = function(){

      var price = $('#type option:selected').attr('data-price');
      
      var total = $('#qty').val() * price;
       $('#total').val(total);


    };

    compute();

 $('#type,#qty').change(function(){

      compute();


    });

  })
</script>
@endsection