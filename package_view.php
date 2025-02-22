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
$sql = "SELECT * FROM package ORDER BY Id asc";
$result = $conn->query($sql);

// Check if there are rows in the result set
if ($result->num_rows > 0) {
  // Fetch each row and store data in arrays
  $i = 0;
  while ($row = $result->fetch_assoc()) {
    $Data[$i]['Id'] = $row['Id'];
    $Data[$i]['Package_Name'] = $row['Package_Name'];
    $Data[$i]['Package_Description'] = $row['Package_Description'];
    $Data[$i]['Img_Url'] = $row['Img_Url'];
    $Data[$i]['Youtu_Url'] = $row['Youtu_Url'];
    $Data[$i]['Discount_Price'] = $row['Discount_Price'];
    $Data[$i]['Price'] = $row['Price'];
    $Data[$i]['Rating'] = $row['Rating'];
    $Data[$i]['Hotel_Name'] = $row['Hotel_Name'];
    $Data[$i]['Food'] = $row['Food'];
    $i++;
  }
} else {
  echo "No records found";
}

// Close connection
$conn->close();

// Now $usernames and $emails arrays contain the data fetched from the database
?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dreamland | Package View</title>

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

    table a {
      color: #09213b;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

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
            <a href="dashboard.php" class="nav-link">
              <!-- <i class="nav-icon far fa-calendar-alt"></i> -->
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="booking_detail.php" class="nav-link">
              <!-- <i class="nav-icon far fa-calendar-alt"></i> -->
              <p>
                Booking
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="package_view.php" class="nav-link" style="color: #FD8234;">
              <!-- <i class="nav-icon far fa-calendar-alt"></i> -->
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
  <div class="content-wrapper" style="min-height: 1000px;">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Package Detail</h1>
          </div>
          <div class="col-sm-6">
            <div class="breadcrumb float-sm-right">
              <a href="Add_packages.php">
                <button type="button" class="btn btn-dark" style="background-color: #09213b;">Add Packages</button>
              </a>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <!-- <div class="row"> -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Details Table</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive" style="overflow-y: auto;">
              <table class="table table-bordered table-hover" style="width: max-content;">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Images</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>You Tube</th>
                    <th>Price</th>
                    <th>Discount Price</th>
                    <th>Rating</th>
                    <th>Hotel Name</th>
                    <th>Food</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($Data as $key => $value) { ?>
                    <tr>
                      <td><?php echo $value['Id']; ?>
                        <div><a href="Add_packages.php?id=<?php echo base64_encode($value['Id']); ?>" style="display: block; padding: 1rem 0rem;"><i class="nav-icon fas fa-edit"></i></a></div>
                      </td>
                      <td><img src="Tourisum/<?php echo $value['Img_Url']; ?>" style="width: 100px;"></td>
                      <td><?php echo $value['Package_Name']; ?></td>
                      <td><?php echo wordwrap($value['Package_Description'], 30, "<br>\n", TRUE); ?></td>
                      <td><?php echo wordwrap($value['Youtu_Url'], 30, "<br>\n", TRUE); ?></td>
                      <td><?php echo $value['Price']; ?></td>
                      <td><?php echo $value['Discount_Price']; ?></td>
                      <td><?php echo $value['Rating']; ?></td>
                      <td><?php echo $value['Hotel_Name']; ?></td>
                      <td><?php echo $value['Food']; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- </div> -->
    </section>
  </div>


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