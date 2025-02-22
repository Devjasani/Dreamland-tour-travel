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

//  echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// die();
$servername = "localhost";
$username = "root";
$password = "";
$database = "booking_dp";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $conn = new mysqli($servername, $username, $password, $database);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Get form data
  $Id = $_POST['id'];
  $name = $_POST['Name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $location = $_POST['location'];
  $Price = $_POST['Price'];
  $guests = $_POST['guests'];
  $night = $_POST['night'];
  $total = $_POST['total'];
  $arrivals = $_POST['arrivals'];
  $leaving = $_POST['leaving'];
  $payment = $_POST['payment'];
  // echo "<pre>";
  //    print_r("hii");
  //    echo "</pre>";
  //    die();
  if (!empty($Id)) {
    $stmt = $conn->prepare("UPDATE book_form SET name=?, email=?, phone=?, address=?, location=?, price=?, guests=?, night=?, total=?, arrivals=?, leaving=?, payment=? WHERE id =" . $Id . " ");
    $stmt->bind_param("ssissiiiisss", $name, $email, $phone, $address, $location, $Price, $guests, $night, $total, $arrivals, $leaving, $payment);
  } else {

    echo "<h4>Something Went Wrong Please Try Again</h4>";
  }
  if ($stmt->execute()) {
    header("Location: booking_detail.php");
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();
}

if (isset($_GET['id'])) {
  $conn = "";
  $id = base64_decode($_GET['id']);
  $conn = new mysqli($servername, $username, $password, $database);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM book_form WHERE id =" . $id . "";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  if ($result->num_rows == 0) {
    header("Location: booking_detail.php");
  }

  $conn->close();
}


?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dreamland | Packages</title>

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
            <a href="booking_detail.php" class="nav-link" style="color: #FD8234;">
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
  <div class="content-wrapper" style="min-height: 700px;">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Booking Detail</h1>
          </div>
          <div class="col-sm-6">
            <div class="breadcrumb float-sm-right">
              <a href="booking_detail.php">
                <button type="button" class="btn btn-dark" style="background-color: #09213b;">Back</button>
              </a>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header" style="background-color: #09213b;">
            <h3 class="card-title">Modify user data</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="row">

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="text" class="form-control" required placeholder="Name" name="Name" value="<?php echo $row['name']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" required placeholder="Email" name="email" value="<?php echo $row['email']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Phone No</label>
                    <input type="text" class="form-control" required placeholder="Phone No" name="phone" value="<?php echo $row['phone']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" required placeholder="Address" name="address" value="<?php echo $row['address']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Where To</label>
                    <input type="text" class="form-control" required placeholder="Where To" name="location" value="<?php echo $row['location']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>price</label>
                    <input type="number" class="form-control" required placeholder="Price" name="Price" value="<?php echo $row['price']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>How Many</label>
                    <input type="number" class="form-control" required placeholder="How Many" name="guests" value="<?php echo $row['guests']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Total Night</label>
                    <input type="number" class="form-control" required placeholder="Total Night" name="night" value="<?php echo $row['night']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Total Bills</label>
                    <input type="number" class="form-control" required placeholder="Total Bills" name="total" value="<?php echo $row['total']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Arrivals</label>
                    <input type="date" class="form-control" required placeholder="Arrivals" name="arrivals" value="<?php echo $row['arrivals']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Leaving</label>
                    <input type="date" class="form-control" required placeholder="Leaving" name="leaving" value="<?php echo $row['leaving']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Payment Type</label>
                    <input type="text" class="form-control" required placeholder="Payment Type" name="payment" value="<?php echo $row['payment']; ?>">
                  </div>
                </div>

              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- <div class="row"> -->
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