@extends('layouts.app')

@section('content')
  <section class="content-header">
      <h1>
        Follow Me
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
      <div class="col-md-12">

        <div class="panel panel-default">
                <div class="panel-heading">Indirect Refferal Bonus</div>

                <div class="panel-body">
                       <div id="chart_div">
                            
           
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Level</th>
                <th>Referrals</th>
                <th>Multiplier</th>
                <th>Amount</th>
                </tr>
            <thead>
              <tbody>
                @foreach($levels as $level => $key)
                <tr>
                  <td>{{$key['level']}}</td>
                  <td>{{$key['active_ref']}}</td>
                  <td>{{$key['com']}}</td>
                   <td>{{$key['commission']}}</td>
                </tr>
              @endforeach

               <tr>
                  <td></td>
                  <td></td>
                  <td><b>Total</b></td>
                   <td><b>{{$total}}</b></td>
                </tr>

              </tbody>
          </table>

                         </div>
                </div>
            </div>
             
      </div>

  </div>
    










</div>

@endsection