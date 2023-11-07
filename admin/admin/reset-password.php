<?php
// Include configuration file 
require_once './../config.php';

// Include User library file 
require_once 'Admin.class.php';

function redirect()
{
  header('Location: login.php');
  exit();
}

$msg = "";

if (isset($_SESSION['msg'])) {
  $msg = $_SESSION['msg'];
}

// Reset password for admin
if (isset($_POST['submit'])) {

  // Initialize Admin class
  $admin = new Admin();

  // Getting admin profile info
  $AdminData = array();
  $AdminData['email'] = !empty($_POST['email']) ? $_POST['email'] : '';
  $AdminData['password'] = !empty($_POST['password']) ? $_POST['password'] : '';
  $AdminData['token'] = !empty($_POST['token']) ? $_POST['token'] : '';

  // Check admin and reset password
  $adminData = $admin->reset($AdminData);

  // Render admin profile data
  if (!empty($adminData)) {
    $_SESSION['msg'] = "Your new password is being updated!";
    header("Location: login.php");
  } else {
    $_SESSION['msg'] = "Failed to reset password! Please try again!";
    redirect();
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin Reset Password - Archic</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="./../images/favicon.png" rel="icon">
  <link href="./../images/favicon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
  <?php
  if (!isset($_GET['token']) && !isset($_GET['email'])) {
    redirect();
  } else {
    $email = $_GET['email'];
    $token = $_GET['token'];
    echo '
  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  
                <img src="./../images/archic-logo.png" style="max-height: 30vh;">
                </a>
              </div><!-- End Logo -->';
    if ($msg != "") {
      echo $msg . "<br>";
      unset($_SESSION['msg']);
    }
    echo '
              <div class="card mb-3">

                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>
                    <p class="text-center small">Enter new password</p>
                  </div>

                  <form class="row g-3 needs-validation" method="post" action="reset-password.php"  onsubmit="return validate()">

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email Address*</label>
                      <div class="input-group has-validation">
                        <!--<span class="input-group-text" id="inputGroupPrepend">@</span>-->
                        <input type="email" name="email" class="form-control" id="yourEmail" value=' . $email . ' required readonly>
                        <div class="invalid-feedback">Please enter your Email!</div>
                        <input type="hidden" class="form-control" name="token" value=' . $token . '>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password" required onkeyup="check(this)">
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    
                    <div class="col-12">
                      <label for="yourCPassword" class="form-label">Confirm Password</label>
                      <input type="password" name="cpassword" class="form-control" id="cpassword" required onkeyup="confirm(this)">
                      <div class="invalid-feedback">Please enter your confirm password!</div>
                    </div>
                    <div class="col-12">
                        <error id="alert" class="text-danger"></error>
                    </div>
    
                    <!--
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>-->
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="submit">Reset Password</button>
                    </div>
                    
                  </form>

                </div>
              </div>

              <div class="credits">
                Designed by <a href="https://sagartech.co.in/" target="_blank">Sagar Tech - Technical Solutions</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
';
  }
  ?>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>

    var pass = document.getElementById('password');
    var cpass = document.getElementById('cpassword');
    var flag = 1;   // 1 -> no error , 0 -> errors

    function check(elem) {
      if (elem.value.length < 7) {
        document.getElementById("alert").innerText = "Password length must be atleast 7 characters";
        flag = 0;
      } else if (elem.value != cpass.value) {
        confirm(cpass);
      } else {
        document.getElementById("alert").innerText = "";
        flag = 1;
      }
    }

    function confirm(elem) {
      if (elem.value.length > 0) {
        if (elem.value != pass.value) {
          document.getElementById("alert").innerText = "Confirm Password does not match";
          flag = 0;
        } else {
          document.getElementById("alert").innerText = "";
          flag = 1;
        }
      } else {
        document.getElementById("alert").innerText = "Please enter Confirm Password";
        flag = 0;
      }
    }

    function validate() {
      if (flag == 1) {
        return true;
      } else {
        return false;
      }
    }
  </script>

</body>

</html>