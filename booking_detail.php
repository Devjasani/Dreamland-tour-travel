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
if (!empty($_POST['delete_id'])) 
{
$delete = "DELETE FROM book_form WHERE id=".$_POST['delete_id']." ";
$de = $conn->query($delete);
}
// SQL query to fetch data

$sql = "SELECT * FROM book_form ORDER BY id asc";
$result = $conn->query($sql);

// Check if there are rows in the result set
if ($result->num_rows > 0) {
    // Fetch each row and store data in arrays
  $i =0;
    while ($row = $result->fetch_assoc()) {
        $Data[$i]['id'] = $row['id'];
        $Data[$i]['name'] = $row['name'];
        $Data[$i]['email'] = $row['email'];
        $Data[$i]['phone'] = $row['phone'];
        $Data[$i]['address'] = $row['address'];
        $Data[$i]['location'] = $row['location'];
        $Data[$i]['price'] = $row['price'];
        $Data[$i]['guests'] = $row['guests'];
        $Data[$i]['total'] = $row['total'];
        $Data[$i]['arrivals'] = $row['arrivals'];
        $Data[$i]['leaving'] = $row['leaving'];
        $Data[$i]['payment'] = $row['payment'];
        $i++;
    }
    // echo "<pre>";
    // print_r($Data);
    // echo "</pre>";
    // die();
} else {
    echo "No records found";
}

// Close connection
$conn->close();

// Now $usernames and $emails arrays contain the data fetched from the database
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dreamland | Booking</title>

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
    table a{
        color: #09213b;
    }
    [class*=sidebar-dark-] 
    {
        background-color: #09213b !important;
    }
    table{color: #09213b;}
    th{    
      background-color: #09213b;
      color: white;
    }
   .content-wrapper{
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
            <a href="booking_detail.php" class="nav-link" style="color: #FD8234;">
              <!-- <i class="nav-icon far fa-calendar-alt"></i> -->
              <p>
                Booking
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="package_view.php" class="nav-link">
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
            <h1>Booking Detail</h1>
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
                      <th>Name</th>
                      <th>Contact Details</th>
                      <th>location</th>
                      <th>price</th>
                      <th>Guests</th>
                      <th>Nights</th>
                      <th>Total</th>
                      <th>Date</th>
                      <th>Payment Type</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($Data as $key => $value){?>
                    <tr>
                        <td><?php echo $value['id'];?>
                          <button class="btn"><a href="Update_booking.php?id=<?php echo base64_encode($value['id']);?>" ><i class="nav-icon fas fa-edit"></i></a></button>
                          <form method="post" action="booking_detail.php">
                            <input type="hidden" name="delete_id" value="<?php echo $value['id'];?>">
                            <button type="submit" class="btn"><i class="nav-icon fas fa-trash"></i></button></form>
                        </td>
                        <td><?php echo $value['name'];?></td>
                        <td><?php echo "<b>Emali :</b>".$value['email']."</br><b>Phone :</b>".$value['phone'];?></td>
                        <td><?php echo $value['location'];?></td>
                        <td><?php echo $value['price'];?></td>
                        <td><?php echo $value['guests'];?></td>
                        <td><?php echo $value['id'];?></td>
                        <td><?php echo $value['total'];?></td>
                        <td><?php echo "<b>Arrivals :</b>".$value['arrivals']."</br><b>Leaving :</b>".$value['leaving'];?></td>
                        <td><?php echo $value['payment'];?></td>
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
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script    >
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