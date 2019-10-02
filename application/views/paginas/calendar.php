  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="bower_components/admin-lte/plugins/fullcalendar/main.min.css">
  <!-- <link rel="stylesheet" href="bower_components/admin-lte/plugins/fullcalendar-interaction/main.min.css"> -->
  <link rel="stylesheet" href="bower_components/admin-lte/plugins/fullcalendar-daygrid/main.min.css">
  <link rel="stylesheet" href="bower_components/admin-lte/plugins/fullcalendar-timegrid/main.min.css">
  <link rel="stylesheet" href="bower_components/admin-lte/plugins/fullcalendar-bootstrap/main.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="bower_components/admin-lte/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Calendar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Calendar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="sticky-top mb-3">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Draggable Events</h4>
                </div>
                <div class="card-body">
                  <!-- the events -->
                  <div id="external-events">
                    <div class="external-event bg-success">Lunch</div>
                    <div class="external-event bg-warning">Go home</div>
                    <div class="external-event bg-info">Do homework</div>
                    <div class="external-event bg-primary">Work on UI design</div>
                    <div class="external-event bg-danger">Sleep tight</div>
                    <div class="checkbox">
                      <label for="drop-remove">
                        <input type="checkbox" id="drop-remove">
                        remove after drop
                      </label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Create Event</h3>
                </div>
                <div class="card-body">
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                    <ul class="fc-color-picker" id="color-chooser">
                      <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                    </ul>
                  </div>
                  <!-- /btn-group -->
                  <div class="input-group">
                    <input id="new-event" type="text" class="form-control" placeholder="Event Title">

                    <div class="input-group-append">
                      <button id="add-new-event" type="button" class="btn btn-primary">Add</button>
                    </div>
                    <!-- /btn-group -->
                  </div>
                  <!-- /input-group -->
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- <script src="bower_components/admin-lte/plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap -->
<!-- <script src="bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- jQuery UI -->
<!-- <script src="bower_components/admin-lte/plugins/jquery-ui/jquery-ui.min.js"></script> -->
<!-- FastClick -->
<script src="bower_components/admin-lte/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<!-- <script src="bower_components/admin-lte/dist/js/adminlte.min.js"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="bower_components/admin-lte/dist/js/demo.js"></script> -->
<!-- fullCalendar 2.2.5 -->
<!-- <script src="bower_components/admin-lte/plugins/moment/moment.min.js"></script> -->
<script src="bower_components/admin-lte/plugins/fullcalendar/main.min.js"></script>
<script src="bower_components/admin-lte/plugins/fullcalendar-daygrid/main.min.js"></script>
<script src="bower_components/admin-lte/plugins/fullcalendar-timegrid/main.min.js"></script>
<script src="bower_components/admin-lte/plugins/fullcalendar-interaction/main.min.js"></script>
<script src="bower_components/admin-lte/plugins/fullcalendar-bootstrap/main.min.js"></script>





