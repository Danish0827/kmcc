<?php
// Include configuration file 
require_once './../config.php';

// Include User library file 
require_once 'Admin.class.php';

$link .= $_SERVER['REQUEST_URI'];
$url_components = parse_url($link);
parse_str($url_components['query'], $params);
$pimgid = $params['project'];

$msg = "";

if (isset($_SESSION['msg'])) {
  $msg = $_SESSION['msg'];
}

if (!isset($_SESSION['adminData'])) {
  header("Location: login.php");
} else {
  $admin = new Admin();
  $adminName = $_SESSION['adminData']['first_name'];
  $adminRole = $_SESSION['adminData']['role'];

  $con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
  if (!$con) {
    echo "Problem in database connection! Contact administrator!" . mysqli_error($con);
  } else {
    $sql = "SELECT * FROM " . DB_PROJECT_IMAGES_TBL . " WHERE pimgid = " . $pimgid;
    $result = mysqli_query($con, $sql);

    $sql = "SELECT * FROM " . DB_PROJECTS_TBL . " ORDER BY pid ASC";
    $project_result = mysqli_query($con, $sql);

    $sql = "SELECT * FROM " . DB_CATEGORY_TBL . " ORDER BY catid ASC";
    $cat_result = mysqli_query($con, $sql);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin Update Project Image - Archic</title>
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
  <style>
    .cat_img {
      width: 120px;
      height: auto;
      padding: 5px;
    }
  </style>

</head>

<body>

  <!-- ======= Header ======= -->
  <?php include("assets/includes/header.php"); ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php include("assets/includes/sidebar.php"); ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Update Project Image</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="manage-project-images.php">Manage Project Images</a></li>
          <li class="breadcrumb-item active">Update Project Image</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales">


                <div class="card-body">
                  <h5 class="card-title">Update Project Image<span></span></h5>

                  <div class="mb-4">
                    <?php
                    if ($msg) {
                      echo $msg;
                      $_SESSION['msg'] = "";
                    }
                    ?>
                  </div>

                  <?php
                  while ($row = mysqli_fetch_array($result)) { ?>
                    <!-- Multi Columns Form -->
                    <form class="row g-3" method="POST" action="manage-project-images.php" enctype='multipart/form-data'>
                      <div class="col-md-6 col-12 mt-3">
                        <label for="cat_id" class="form-label">Select Category</label>
                        <select id="category_dropdown" name="catid" class="form-select">
                          <option value="">Select Category</option>
                          <?php
                          foreach ($cat_result as $cat) {
                            if ($cat['catid'] == $row['catid']) {
                              echo '<option value="' . $cat['catid'] . '" selected>' . $cat['category_name'] . '</option>';
                            } else {
                              echo '<option value="' . $cat['catid'] . '">' . $cat['category_name'] . '</option>';
                            }
                          }
                          ?>
                        </select>
                      </div>
                      <div class="col-md-6 col-12 mt-3">
                        <label for="pid" class="form-label">Select Project</label>
                        <select id="project_dropdown" name="pid" class="form-select">
                          <?php
                          foreach ($project_result as $project) {
                            if ($project['pid'] == $row['pid']) {
                              echo '<option value="' . $project['pid'] . '" selected>' . $project['project_name'] . '</option>';
                            }
                          }
                          ?>
                        </select>
                      </div>
                      <!--<div class="col-md-12 mt-3">-->
                      <!--  <label for="project_name" class="form-label">Project Name</label>-->
                      <input type="hidden" class="form-control" name="pimgid" value="<?php echo $row['pimgid'] ?>" />
                      <!--  <input type="text" class="form-control" id="project_name" name="project_name" value="<?php //echo $row['project_name']?>" required readonly>-->
                      <!--</div>-->
                      <!--<div class="col-md-12 mt-3">-->
                      <!--  <label for="project_desc" class="form-label">Description</label>-->
                      <!--  <textarea class="form-control" id="project_desc" name="project_desc"><?php //echo $row['project_desc']?></textarea>-->
                      <!--</div>-->
                      <div class="col-md-6 col-12 mt-3">
                        <label for="pro_img" class="form-label">Image</label><br>
                        <img src="../<?php echo $row['project_image'] ?>" style="width:20vw;margin:10px 0px;" alt="">
                        <input class="form-control" id="pro_img" name="pro_img" type="file">
                        <input type="hidden" class="form-control" name="pro_img_copy"
                          value="<?php echo $row['project_image'] ?>" />
                      </div>


                      <!-- End Multi Columns Form -->
                  </div>
                  <div style="clear:both;"></div>
                  <div class="modal-footer">
                    <a type="button" class="btn btn-secondary" href="manage-project-images.php">Back</a>
                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                  </div>
                  </form>
                  <?php
                  }
                  ?>

              </div>

            </div>
          </div><!-- End Recent Sales -->


        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <?php include("assets/includes/footer.php"); ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

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

  <!-- JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script type="text/javascript">
    document.getElementById('manage-project').classList.remove('collapsed');

    $(document).ready(function () {
      $('#category_dropdown').on('change', function () {
        var category_id = this.value;
        $.ajax({
          url: "fetch-project-by-category.php",
          type: "POST",
          data: {
            category_id: category_id
          },
          cache: false,
          success: function (result) {
            $("#project_dropdown").html(result);
          }
        });
      });
    });
  </script>
</body>

</html>