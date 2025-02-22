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
  $Post = $_POST['Post'];
  $Instagram = $_POST['Instagram'];
  $Facebook = $_POST['Facebook'];
  $Whatsapp = $_POST['Whatsapp'];
  $Telegram = $_POST['Telegram'];
  $Staff_Type = $_POST['Staff_Type'];
  $description = $_POST['Description'];
  $old_img = $_POST['old_img'];

  if (!empty($_FILES["img"]["name"])) {
    $targetDirectory = "staff-image/";
    $originalFileName = $_FILES["img"]["name"];
    $extension = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));

    $randomString = bin2hex(random_bytes(8));
    $uniqueFileName = $randomString . '.' . $extension;
    $targetFile = $targetDirectory . $uniqueFileName;

    $uploadOk = 1;
    $file_error = "";
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if ($uploadOk == 0) {
      $file_error = "Sorry, your file was not uploaded.";
    } else {
      if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile)) {
        $file_error = "The file " . htmlspecialchars($originalFileName) . " has been uploaded as " . htmlspecialchars($uniqueFileName);
        // Insert file name into database
        $imageFileName = $uniqueFileName;
      } else {
        $file_error = "Sorry, there was an error uploading your file.";
      }
    }
  } else {
    $imageFileName = $old_img;
  }

  if (!empty($Id)) {
    $stmt = $conn->prepare("UPDATE staff_data SET Name=?, Post=?, Instagram=?, Facebook=?, Whatsapp=?, Telegram=?, Staff_Type=?, Description=?, Staff_Img=? WHERE Staff_Id =" . $Id . " ");
    $stmt->bind_param("sssssssss", $name, $Post, $Instagram, $Facebook, $Whatsapp, $Telegram, $Staff_Type, $description, $imageFileName);
  } else {
    $stmt = $conn->prepare("INSERT INTO staff_data (Name, Post, Instagram, Facebook, Whatsapp, Telegram, Staff_Type, Description, Staff_Img) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)");
    $stmt->bind_param("sssssssss", $name, $Post, $Instagram, $Facebook, $Whatsapp, $Telegram, $Staff_Type, $description, $imageFileName);
  }
  if ($stmt->execute()) {
    header("Location: staff_view.php");
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

  $sql = "SELECT * FROM staff_data WHERE Staff_Id =" . $id . "";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  if ($result->num_rows == 0) {
    header("Location: staff_view.php");
  }

  $conn->close();
}
?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dreamland | Staffs</title>

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
            <a href="package_view.php" class="nav-link">
              <!-- <i class="nav-icon far fa-calendar-alt"></i> -->
              <p>
                Package
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="staff_view.php" class="nav-link" style="color: #FD8234;">
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
            <h1>Staff Detail</h1>
          </div>
          <div class="col-sm-6">
            <div class="breadcrumb float-sm-right">
              <a href="staff_view.php">
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
            <h3 class="card-title">Modify stff detail</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="row">

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="hidden" name="id" value="<?php echo $row['Staff_Id']; ?>">
                    <input type="text" class="form-control" required placeholder="Name" name="Name" value="<?php echo $row['Name']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Post</label>
                    <input type="text" class="form-control" required placeholder="Post" name="Post" value="<?php echo $row['Post']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Instagram Url</label>
                    <input type="text" class="form-control" required placeholder="Instagram Url" name="Instagram" value="<?php echo $row['Instagram']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Facebook Url</label>
                    <input type="text" class="form-control" required placeholder="Facebook Url" name="Facebook" value="<?php echo $row['Facebook']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Whatsapp Url</label>
                    <input type="text" class="form-control" required placeholder="Whatsapp Url" name="Whatsapp" value="<?php echo $row['Whatsapp']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Telegram Url</label>
                    <input type="text" class="form-control" required placeholder="Telegram Url" name="Telegram" value="<?php echo $row['Telegram']; ?>">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Staff Type</label>
                    <select name="Staff_Type" class="form-control select2 select2-hidden-accessible" required>
                      <option value="">Select Staff Type</option>
                      <option value="0" <?php echo ($row['Staff_Type'] == 0) ? 'selected' : ''; ?>>Guide</option>
                      <option value="1" <?php echo ($row['Staff_Type'] == 1) ? 'selected' : ''; ?>>Admin</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Staff Image</label>
                    <?php $req = "required";
                    if (isset($_GET['id'])) {
                      $req = "";
                    } ?>
                    <input type="file" name="img" <?php echo $req; ?>>
                    <input type="hidden" name="old_img" value="<?php echo $row['Staff_Img']; ?>">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Description</label>
                    <textarea name="Description" required placeholder="Description" required rows="3" class="form-control"><?php echo $row['Description']; ?></textarea>
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