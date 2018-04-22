@extends('layouts.app')

@section('content')
  <section class="content-header">
      <h1>
        Dashboard
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
      <!-- First box-->
       <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$sub_counts}}</h3>

              <p>Sub Accounts</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
            <!-- end box-->

            <!-- second box-->
       <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>150</h3>

              <p>Lifetime Earning</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
            <!-- end box-->

            <!-- third box-->
       <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3>150</h3>

              <p>Wallet Balance</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
            <!-- end box-->



             <!-- third box-->
            <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3>{{$ref_count}}</h3>

              <p>Total Downlines</p>
            </div>
            <div class="icon">
              <i class="fa fa-group"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
            <!-- end box-->
    </div>




    <div class="row">

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">My Profile</div>

                   <table class="table ">
                    <tbody>
                      <tr>
                        <td><b>Ranking</b></td>
                        <td>N/A</td>
                      </tr>
                      <tr>
                        <td><b>Sponsor ID</b></td>
                        <td>{{Auth::user()->sponsor_id}}</td>  
                      </tr>
                      <tr>

                        <td><b>Fullname</b></td>
                        <td>{{Auth::user()->name}}</td>
                      </tr>
                      <tr>
                        <td><b>Date of Birth</b></td>
                        <td>{{Auth::user()->dob}}</td>
                      </tr>
                        <tr>
                        <td><b>Address</b></td>
                        <td>{{Auth::user()->address}}</td>
                      </tr>
                       <tr>
                        <td><b>Country</b></td>
                       <td>{{Auth::user()->country}}</td>
                      </tr>
                      
                      <tr>
                        <td><b>Email</b></td>
                        <td>{{Auth::user()->email}}</td>
                      </tr>
                       <tr>
                        <td><b>Contact #</b></td>
                        <td>{{Auth::user()->contact_no}}</td>  
                      </tr>
                     
                    </tbody>
                  </table>
            </div>
        </div>


      

            <div class="row">

          


      








            </div>




    </div>
</div>
<script>


      google.charts.load('current', {packages:["orgchart"]});
      google.charts.setOnLoadCallback(drawChart);
 function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('string', 'Manager');
        data.addColumn('string', 'ToolTip');
         data.addColumn('string', 'status');
         data.addColumn('string', 'position');
          data.addColumn('string', 'id');

           data.addRows([
            [{v:'kizzbonez', f:'kizzbonez<br /><img src="'+'{{asset("images/default_profile.jpg")}}'+'" width="100" height="100">'},
           '', '','0','0','0'],
            [{v:'kizzbonez1', f:'kizzbonez1<br /><img src="'+'{{asset("images/default_profile.jpg")}}'+'" width="100" height="100">'},
           'kizzbonez', '','0','0','0'],
             [{v:'kizzbonez2', f:'kizzbonez2<br /><img src="'+'{{asset("images/default_profile.jpg")}}'+'" width="100" height="100">'},
           'kizzbonez', '','0','0','0'],
            [{v:'kizzbonez3', f:'kizzbonez3<br /><img src="'+'{{asset("images/default_profile.jpg")}}'+'" width="100" height="100">'},
           'kizzbonez', '','0','0','0'],



            ]);

               var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
        // Draw the chart, setting the allowHtml option to true for the tooltips.
        chart.draw(data, {allowHtml:true});

  }
</script>
@endsection