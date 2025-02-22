<?php
session_start();
if (!empty($_SESSION["login1"])) {
  // echo "string";
  // Redirect to login page
  header("Location: dashboard.php");
  exit;
}
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

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  // Check if email and password are provided
  if (!empty($email) && !empty($password)) {
    // Prepare a SQL statement to select user with given email and password
    $sql = "SELECT * FROM admin WHERE UserName = ? AND Password = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
      die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("ss", $email, $password);

    // Execute the statement
    $stmt->execute();

    // Store the result
    $result = $stmt->get_result();

    // Check if there is a matching user
    if ($result->num_rows == 1) {
      // Valid credentials, set session variable
      $user = $result->fetch_assoc();
      // session_set_cookie_params(3600, '/', '', false, true);
      // Valid credentials, set session variables
      $_SESSION['loggedin'] = $user['Id'];
      $_SESSION['username'] = $user['UserName'];
      $_SESSION['login1'] = "true";
      setcookie("user_id", $user['Id'], time() + 3600, '/');
      header("Location: dashboard.php"); // Redirect to welcome page or any other page you desire
      // exit;
    } else {
      // Invalid credentials
      echo "Invalid email or password";
    }
  } else {
    // Email or password field is empty
    echo "Email and password are required";
  }
}
?>
<style type="text/css">
  /* 'Open Sans' font from Google Fonts */
  @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);

  body {
    background: #09213B;
    font-family: 'Open Sans', sans-serif;
  }

  .login {
    width: 400px;
    margin: 16px auto;
    font-size: 16px;
  }

  /* Reset top and bottom margins from certain elements */
  .login-header,
  .login p {
    margin-top: 0;
    margin-bottom: 0;
  }

  /* The triangle form is achieved by a CSS hack */
  .login-triangle {
    width: 0;
    margin-right: auto;
    margin-left: auto;
    border: 12px solid transparent;
    border-bottom-color: #2BB3D9;
  }

  .login-header {
    background: #2BB3D9;
    padding: 20px;
    font-size: 1.4em;
    font-weight: normal;
    text-align: center;
    text-transform: uppercase;
    color: #fff;
  }

  .login-container {
    background: #ebebeb;
    padding: 12px;
  }

  /* Every row inside .login-container is defined with p tags */
  .login p {
    padding: 12px;
  }

  .login input {
    box-sizing: border-box;
    display: block;
    width: 100%;
    border-width: 1px;
    border-style: solid;
    padding: 16px;
    outline: 0;
    font-family: inherit;
    font-size: 0.95em;
  }

  .login input[type="email"],
  .login input[type="password"] {
    background: #fff;
    border-color: #bbb;
    color: #555;
  }

  /* Text fields' focus effect */
  .login input[type="email"]:focus,
  .login input[type="password"]:focus {
    border-color: #888;
  }

  .login input[type="submit"] {
    background: #2BB3D9;
    border-color: transparent;
    color: #fff;
    cursor: pointer;
  }

  .login input[type="submit"]:hover {
    background: #17c;
  }

  /* Buttons' focus effect */
  .login input[type="submit"]:focus {
    border-color: #05a;
  }
</style>
<div class="login">
  <div class="login-triangle"></div>

  <h2 class="login-header">Log in</h2>

  <form class="login-container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <p><input type="email" placeholder="Email" name="email" required></p>
    <p><input type="password" placeholder="Password" name="password" required></p>
    <p><input type="submit" value="Log in"></p>
  </form>
</div>