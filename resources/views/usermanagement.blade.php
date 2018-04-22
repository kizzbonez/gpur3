@extends('layouts.app')

@section('content')
  <section class="content-header">
      <h1>
        User Management
        <small>Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User Management</li>
      </ol>
    </section>
      <!-- Main content -->
    <section class="content">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Mangement</div>

                <div class="panel-body">
                  
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>REF ID</th>
                  <th>NAME</th>
                  <th>USERNAME</th>
                  <th>STATUS</th>
                  <th>TOTAL REFFERALS</th>
                  <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                {{ $user->id }}
                <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->name }}<</td>
                  <td>{{ $user->username}}</td>
                  <td>N/A</td>
                  <td>N/A</td>
                   <td><center><button class="btn btn-primary"><span class="fa fa-pencil"></span></button><button class="btn btn-danger"><span class="fa fa-times"></span></button></center><center></td>
                </tr>
              @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>REF ID</th>
                  <th>NAME</th>
                  <th>USERNAME</th>
                  <th>STATUS</th>
                  <th>TOTAL REFFERALS</th>
                  <th>ACTION</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  $(function () {
    $('#example2').DataTable();
  })
</script>


@endsection