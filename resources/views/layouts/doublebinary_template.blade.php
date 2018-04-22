  <div class="row">





    <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-arrow-left"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">History-Left Points</span>
              <span class="info-box-number">{{$hpoints['left-points']}}</span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
           
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

           <!-- Info Boxes Style 2 -->
          <div class="info-box bg-blue">
            <span class="info-box-icon"><i class="fa fa-arrow-left"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Available-Left Points</span>
              <span class="info-box-number">{{$points['left-points']}}</span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                 
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
    </div>


    <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-green">
              <div class="col-md-4">
                       <center>
                       <span class="info-box-text">Mid-Left</span>
                          <span class="info-box-number">{{$hpoints['middle-left-points']}}</span>
                        </center>
              </div>
              <div class="col-md-4">
                   <span class="info-box-icon"><i class="fa fa-circle-o-notch"></i></span>
              </div>
              <div class="col-md-4">
                         <center>
                           <span class="info-box-text">Mid-Right</span>
                          <span class="info-box-number">{{$hpoints['middle-right-points']}}</span>
                          </center>
              </div>

        
          </div>
          <!-- /.info-box -->

           <!-- Info Boxes Style 2 -->
          <div class="info-box bg-blue">
               <div class="col-md-4">
                       <center>
                       <span class="info-box-text">Mid-Left</span>
                          <span class="info-box-number">{{$points['middle-left-points']}}</span>
                        </center>
              </div>
              <div class="col-md-4">
                   <span class="info-box-icon"><i class="fa fa-circle-o-notch"></i></span>
              </div>
              <div class="col-md-4">
                         <center>
                           <span class="info-box-text">Mid-Right</span>
                          <span class="info-box-number">{{$points['middle-right-points']}}</span>
                          </center>
              </div>
          </div>
          <!-- /.info-box -->
    </div>




    <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-arrow-right"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">History-Right Points</span>
              <span class="info-box-number">{{$hpoints['right-points']}}</span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
             
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

           <!-- Info Boxes Style 2 -->
          <div class="info-box bg-blue">
            <span class="info-box-icon"><i class="fa fa-arrow-right"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Available-Right Points</span>
              <span class="info-box-number">{{$points['right-points']}}</span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                  
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
    </div>


    <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Points History</div>

                   <table class="table table-hover">
                    <thead>
                      <tr>
                      <th>Account</th>
                      <th>Leg</th>
                      <th>Commision Point(s)</th>
                      <th>Date/Time</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($info as $i)
                      <tr>
                          <td>{{$i['username']}}</td>
                          <td>{{$i['side']}}</td>
                          <td>{{$i['points']}}</td>
                          <td>{{$i['time']}}</td>
                      </tr>
                      @endforeach
                     

                    </tbody>
                  </table>
            </div>
        </div>

  </div>

  
