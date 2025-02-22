<?php
session_start();
error_reporting(0);

if (empty($_SESSION["login1"])) {
  header("Location: Admin.php");
  exit;
}


// Your protected page content goes here
?>
<?php
// Change these to match your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "booking_dp";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Define arrays to store data
$usernames = array();
$emails = array();

// SQL query to fetch data
$sql = "SELECT * FROM book_form ORDER BY id asc";
$book_num = $conn->query($sql);

// Check if there are rows in the book_num set
if ($book_num->num_rows > 0) {
  $booking = $book_num->num_rows;
} else {
  $booking = "No booking";
}


$sql = "SELECT * FROM staff_data";
$staff = $conn->query($sql);

// Check if there are rows in the staff set
if ($staff->num_rows > 0) {
  $Total_Staff = $staff->num_rows;
} else {
  $Total_Staff = "No Staff";
}

$sql = "SELECT Id FROM package";
$package = $conn->query($sql);

// Check if there are rows in the package set
if ($package->num_rows > 0) {
  $Packages = $package->num_rows;
} else {
  $Packages = "No Package";
}

$sql = "SELECT DATE_FORMAT(arrivals, '%M') AS month, COUNT(*) AS count FROM book_form GROUP BY MONTH(arrivals)";

// Execute the query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  $i = 0;
  $month .= "'";
  while ($row = $result->fetch_assoc()) {
    if ($i != 0) {
      $month .= "','";
      $count .= ",";
    }
    $month .= $row["month"];
    $count .= $row["count"];
    $i++;
    // Output or use the month and count as needed
    // echo "Month: $month, Count: $count <br>";
  }
  $month .= "'";
} else {
  echo "0 results";
}

// Close the connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dreamland | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <script src="dist/js/jquery.min.js"></script>
  <style type="text/css">
    [class*=sidebar-dark-] {
      background-color: #09213b !important;
    }

    table {
      color: #09213b;
    }

    th {
      background-color: #09213b;
      color: white;
    }

    .content-wrapper {
      background-color: white;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">



    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <a class="nav-link" href="logout.php">
          <li class="nav-item">
            <i class="fas fa-sign-out-alt"> Logout</i>
          </li>
        </a>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="dashboard.php" class="brand-link">
        <img src="logo2.JPG" alt="Dreamland Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Dreamland</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="dashboard.php" class="nav-link" style="color: #FD8234;">
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="booking_detail.php" class="nav-link">
                <p>
                  Booking
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="package_view.php" class="nav-link">
                <p>
                  Package
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="staff_view.php" class="nav-link">
                <!-- <i class="nav-icon far fa-calendar-alt"></i> -->
                <p>
                  Staff
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <div class="row">
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo $booking; ?></h3>

                  <p>Total Booking</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="booking_detail.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php echo $Packages; ?></h3>

                  <p>Packages</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="package_view.php" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo $Total_Staff; ?></h3>

                  <p>Staff</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="staff_view.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <!--  -->
            <!-- ./col -->
          </div>

        </div>

      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header" style="background-color: #09213b;">
              <h3 class="card-title" style="color: aliceblue;">Visitor month-wise chart</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </section>
    </div>

    <footer class="main-footer">
      <strong>Created By :- <a href="javascript:void(0)" style="color: #09213b;">Dev Jasani , Urvish Koshiya , Dhvanil Bhigradiya</a>.</strong>
      <div class="float-right d-none d-sm-inline-block">
      </div>
    </footer>


  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script type="text/javascript">
    $(function() {
      var areaChartCanvas = $('#areaChart').get(0).getContext('2d');
      var month = [<?php echo $month; ?>];
      var count = [<?php echo $count; ?>];
      var areaChartData = {
        labels: month,
        datasets: [{
            label: 'Digital Goods',
            backgroundColor: '#2BB3D9',
            borderColor: '#2BB3D9',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: '#2BB3D9',
            pointHighlightFill: '#fff',
            pointHighlightStroke: '#2BB3D9',
            data: count
          },

        ]
      };

      var areaChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
          display: false
        },
        scales: {
          xAxes: [{
            gridLines: {
              display: false,
            }
          }],
          yAxes: [{
            gridLines: {
              display: false,
            }
          }]
        }
      };

      // This will get the first returned node in the jQuery collection.
      new Chart(areaChartCanvas, {
        type: 'line',
        data: areaChartData,
        options: areaChartOptions
      });
    });
  </script>
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
</body>

</html>