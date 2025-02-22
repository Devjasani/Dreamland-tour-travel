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
  $hotelName = $_POST['Hotel_Name'];
  $food = $_POST['Food'];
  $price = $_POST['Price'];
  $discountPrice = $_POST['Discount_Price'];
  $rating = $_POST['rating'];
  $youTubeLink = $_POST['You_link'];
  $description = $_POST['Description'];
  $old_img = $_POST['old_img'];

  if (!empty($_FILES["img"]["name"])) {
    $targetDirectory = "Tourisum/";
    $originalFileName = $_FILES["img"]["name"];
    $extension = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));

    $randomString = bin2hex(random_bytes(8));
    $uniqueFileName = $randomString . '.' . $extension;
    $targetFile = $targetDirectory . $uniqueFileName;

    $uploadOk = 1;
    $file_error = "";

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
    $stmt = $conn->prepare("UPDATE package SET Package_Name=?, Hotel_Name=?, Food=?, Price=?, Discount_Price=?, Rating=?, Youtu_Url=?, Package_Description=?, Img_Url=? WHERE Id =" . $Id . " ");
    $stmt->bind_param("sssiissss", $name, $hotelName, $food, $price, $discountPrice, $rating, $youTubeLink, $description, $imageFileName);
  } else {
    $stmt = $conn->prepare("INSERT INTO package (Package_Name, Hotel_Name, Food, Price, Discount_Price, Rating, Youtu_Url, Package_Description, Img_Url) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)");
    $stmt->bind_param("sssiissss", $name, $hotelName, $food, $price, $discountPrice, $rating, $youTubeLink, $description, $imageFileName);
  }
  if ($stmt->execute()) {
    header("Location: package_view.php");
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

  $sql = "SELECT * FROM package WHERE Id =" . $id . "";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  if ($result->num_rows == 0) {
    header("Location: package_view.php");
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
  <div class="content-wrapper" style="min-height: 700px;">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Package Detail</h1>
          </div>
          <div class="col-sm-6">
            <div class="breadcrumb float-sm-right">
              <a href="package_view.php">
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
            <h3 class="card-title">Modify package detail</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="row">

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Package Name</label>
                    <input type="hidden" name="id" value="<?php echo $row['Id']; ?>">
                    <input type="text" class="form-control" required placeholder="Package Name" name="Name" value="<?php echo $row['Package_Name']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Hotel Name</label>
                    <input type="text" class="form-control" required placeholder="Hotel Name" name="Hotel_Name" value="<?php echo $row['Hotel_Name']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Food</label>
                    <input type="text" class="form-control" required placeholder="Food" name="Food" value="<?php echo $row['Food']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Price</label>
                    <input type="number" class="form-control" required placeholder="Price" name="Price" value="<?php echo $row['Price']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Discount Price</label>
                    <input type="number" class="form-control" required placeholder="Discount Price" name="Discount_Price" value="<?php echo $row['Discount_Price']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Rating</label>
                    <select name="rating" class="form-control select2 select2-hidden-accessible" required>
                      <!-- <?php echo ($row['Discount_Price'] == 1) ? 'selected' : ''; ?> -->
                      <option value="">Select Rating</option>
                      <option value="1" <?php echo ($row['Rating'] == 1) ? 'selected' : ''; ?>>1</option>
                      <option value="2" <?php echo ($row['Rating'] == 2) ? 'selected' : ''; ?>>2</option>
                      <option value="3" <?php echo ($row['Rating'] == 3) ? 'selected' : ''; ?>>3</option>
                      <option value="4" <?php echo ($row['Rating'] == 4) ? 'selected' : ''; ?>>4</option>
                      <option value="5" <?php echo ($row['Rating'] == 5) ? 'selected' : ''; ?>>5</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Image</label>
                    <?php $req = "required";
                    if (isset($_GET['id'])) {
                      $req = "";
                    } ?>
                    <input type="file" name="img" <?php echo $req; ?>>
                    <input type="hidden" name="old_img" value="<?php echo $row['Img_Url']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>You Tube Link</label>
                    <input type="text" class="form-control" required placeholder="You Tube Link" name="You_link" value="<?php echo $row['Youtu_Url']; ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Package Description</label>
                    <textarea name="Description" required placeholder="Package Description" required rows="3" class="form-control"><?php echo $row['Package_Description']; ?></textarea>
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