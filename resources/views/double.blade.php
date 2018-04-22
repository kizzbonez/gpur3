@extends('layouts.app')

@section('content')
  <section class="content-header">
      <h1>
        Double Binary Match
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

                        <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#home">Main Account</a></li>
              <li><a data-toggle="tab" href="#menu1">Sub Account 1</a></li>
              <li><a data-toggle="tab" href="#menu2">Sub Account 2</a></li>
              <li><a data-toggle="tab" href="#menu3">Sub Account 3</a></li>
            </ul>
            <div class="tab-content">
              <div id="home" class="tab-pane fade in active">
              @include('layouts.doublebinary_template',['points'=>$points['main'],'hpoints'=>$hpoints['main'],'info'=>$info['main']])
              </div>
              <div id="menu1" class="tab-pane fade">
                   @include('layouts.doublebinary_template',['points'=>$points['left'],'hpoints'=>$hpoints['left'],'info'=>$info['left']])
              </div>
              <div id="menu2" class="tab-pane fade">
                  @include('layouts.doublebinary_template',['points'=>$points['middle'],'hpoints'=>$hpoints['middle'],'info'=>$info['middle']])
              </div>
               <div id="menu3" class="tab-pane fade">
                  @include('layouts.doublebinary_template',['points'=>$points['right'],'hpoints'=>$hpoints['right'],'info'=>$info['right']])
              </div>
            </div>
      </div>

  </div>
    










</div>

@endsection