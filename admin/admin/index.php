<?php
// Include configuration file 
require_once './../config.php';

// Include User library file 
require_once 'Admin.class.php';

$msg = "";

if (isset($_SESSION['msg'])) {
  $msg = $_SESSION['msg'];
}

// if admin not logged in go back to login page
if (!isset($_SESSION['adminData'])) {
  header("Location: login.php");
} else {
  $adminName = $_SESSION['adminData']['first_name'];
  $adminRole = $_SESSION['adminData']['role'];

  $admin = new Admin();
  $sliderCount = $admin->sliderCount();
  $noticeCount = $admin->noticeCount();
  $degreeCount = $admin->degreeCount();
  $juniorCount = $admin->juniorCount();
  $noticeeventCount = $admin->noticeeventCount();
  $sportCount = $admin->sportCount();
  $culturalCount = $admin->culturalCount();
  $urjaCount = $admin->urjaCount();
  $nssCount = $admin->nssCount();

  $con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
  if (!$con) {
    echo "Problem in database connection! Contact administrator!" . mysqli_error($con);
  } else {
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin Dashboard - Archic</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="./../images/favicon.png" rel="icon">
  <link href="./../images/favicon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
<style>
  h5.card-title {
    height: 75px;
  }
</style>

<body>

  <!-- ======= Header ======= -->
  <?php include("assets/includes/header.php"); ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php include("assets/includes/sidebar.php"); ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Category Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card customers-card">

                <!-- <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div> -->
                <a href="homepart.php">
                  <div class="card-body">
                    <h5 class="card-title">Total Slider<span></span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-collection"></i>
                      </div>
                      <div class="ps-3">
                        <h6>
                          <?php
                          echo !empty($sliderCount) ? $sliderCount : 0;
                          ?>
                        </h6>
                        <!--
                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>-->

                      </div>
                    </div>
                  </div>
                </a>


              </div>
            </div><!-- End Category Card -->

            <!-- Subcategory Card -->
            <div class="col-xxl-4 col-md-4">

              <div class="card info-card customers-card">


                <a href="noticenew.php">
                  <div class="card-body">
                    <h5 class="card-title">Total Notice news <span></span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-collection"></i>
                      </div>
                      <div class="ps-3">
                        <h6>
                          <?php echo !empty($noticeCount) ? $noticeCount : 0; ?>
                        </h6>
                        <!--
                      <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>-->

                      </div>
                    </div>

                  </div>
                </a>
              </div>

            </div><!-- End Subcategory Card -->

            <!-- Subcategory Card -->
            <div class="col-xxl-4 col-md-4">

              <div class="card info-card customers-card">


                <a href="noticenew.php">
                  <div class="card-body">
                    <h5 class="card-title">Total News & Events <span></span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-collection"></i>
                      </div>
                      <div class="ps-3">
                        <h6>
                          <?php echo !empty($noticeeventCount) ? $noticeeventCount : 0; ?>
                        </h6>
                        <!--
        <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>-->

                      </div>
                    </div>

                  </div>
                </a>
              </div>

            </div><!-- End Subcategory Card -->


            <!-- Products Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <a href="teachingdegree.php">
                  <div class="card-body">
                    <h5 class="card-title">Total Teaching Degree <span></span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-person"></i>
                      </div>
                      <div class="ps-3">
                        <h6>
                          <?php echo !empty($degreeCount) ? $degreeCount : 0; ?>
                        </h6>
                        <!--
                      <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>-->

                      </div>
                    </div>
                  </div>
                </a>


              </div>
            </div><!-- End Products Card -->
            <!-- Products Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <a href="teachingjunior.php">
                  <div class="card-body">
                    <h5 class="card-title">Total Teaching Junior <span></span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-person"></i>
                      </div>
                      <div class="ps-3">
                        <h6>
                          <?php echo !empty($juniorCount) ? $juniorCount : 0; ?>
                        </h6>
                        <!--
                      <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>-->

                      </div>
                    </div>
                  </div>
                </a>


              </div>
            </div><!-- End Products Card -->





            <div class="col-xxl-4 col-md-4">
              <!-- <div class="card info-card sales-card"> -->
              <div class="card info-card revenue-card">
                <a href="sportsevent.php">
                  <div class="card-body">
                    <h5 class="card-title">Total Sports Report<span></span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-menu-button-wide"></i>
                      </div>
                      <div class="ps-3">
                        <h6>
                          <?php echo !empty($sportCount) ? $sportCount : 0; ?>
                        </h6>
                        <!--
                      <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>-->

                      </div>
                    </div>
                  </div>
                </a>


              </div>
            </div><!-- End Products Card -->


            <div class="col-xxl-4 col-md-4">
              <!-- <div class="card info-card sales-card"> -->
              <div class="card info-card revenue-card">
                <a href="culturalevent.php">
                  <div class="card-body">
                    <h5 class="card-title">Total Cultural Activities Report <span></span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-menu-button-wide"></i>
                      </div>
                      <div class="ps-3">
                        <h6>
                          <?php echo !empty($culturalCount) ? $culturalCount : 0; ?>
                        </h6>
                        <!--
                      <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>-->

                      </div>
                    </div>
                  </div>
                </a>


              </div>
            </div><!-- End Products Card -->



            <div class="col-xxl-4 col-md-4">
              <!-- <div class="card info-card sales-card"> -->
              <div class="card info-card revenue-card">
                <a href="urjaevent.php">
                  <div class="card-body">
                    <h5 class="card-title">Total Urja Fest Report <span></span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-menu-button-wide"></i>
                      </div>
                      <div class="ps-3">
                        <h6>
                          <?php echo !empty($urjaCount) ? $urjaCount : 0; ?>
                        </h6>
                        <!--
                      <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>-->

                      </div>
                    </div>
                  </div>
                </a>


              </div>
            </div><!-- End Products Card -->



            <div class="col-xxl-4 col-md-4">
              <!-- <div class="card info-card sales-card"> -->
              <div class="card info-card revenue-card">
                <a href="nssevent.php">
                  <div class="card-body">
                    <h5 class="card-title">Total NSS Report <span></span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-menu-button-wide"></i>
                      </div>
                      <div class="ps-3">
                        <h6>
                          <?php echo !empty($nssCount) ? $nssCount : 0; ?>
                        </h6>
                        <!--
                      <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>-->

                      </div>
                    </div>
                  </div>
                </a>


              </div>
            </div><!-- End Products Card -->





          </div>
    </section>

  </main><!-- End #main -->

  <?php include("assets/includes/footer.php"); ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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

</body>

</html>