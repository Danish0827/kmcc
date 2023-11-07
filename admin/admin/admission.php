<?php
// Include configuration file 
require_once './../config.php';

// Include User library file 
require_once 'Admin.class.php';

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
    // select all details from category in asc order
    $sql = "SELECT * FROM " . DB_ADMISSION_TBL . " ORDER BY catid ASC";
    $result = mysqli_query($con, $sql);
  }
}

// updating existing category
if (isset($_POST['update'])) {
  $catid = !empty($_POST['catid']) ? $_POST['catid'] : '';
  $category_name = !empty($_POST['category_name']) ? $_POST['category_name'] : '';
  $category_desc = !empty($_POST['category_desc']) ? $_POST['category_desc'] : '';

  // $output_dir = "./../images/services/";
  // $folder_name = $category_name;
  // if (!file_exists($output_dir . $folder_name)) /* Check folder exists or not */ {
  //   @mkdir($output_dir . $folder_name, 0777); /* Create folder by using mkdir function */
  //   echo "Folder Created"; /* Success Message */
  // }

  // $name = $_FILES['category_image']['name'];
  // $target_dir = "./../images/services/";
  // $target_file = $target_dir . basename($_FILES["category_image"]["name"]);

  // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // $extension_arr = array("jpg", "jpeg", "png", "gif");

  // $img = "images/services/" . $name;

  // if (in_array($imageFileType, $extension_arr)) {
  //   if (move_uploaded_file($_FILES['category_image']['tmp_name'], $target_dir . $name)) {
  //   } else {
  //     echo "Failed to upload image";
  //   }
  // }

  // if (empty($_FILES['category_image']['name'])) {
  //   $img = $_POST['category_image_copy'];
  // }
  $sql = "UPDATE " . DB_ADMISSION_TBL . " SET category_name = ?, category_desc = ? WHERE catid = ?";

  $stmt = mysqli_prepare($con, $sql);

  if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssi", $category_name, $category_desc, $catid);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
      $msg = "Notice News Updated!";
      $alertClass = "alert-success";
    } else {
      $msg = "Something went wrong! Please try again.";
      $alertClass = "alert-danger";
    }

    mysqli_stmt_close($stmt);
  } else {
    $msg = "Database error. Please try again.";
    $alertClass = "alert-danger";
  }

  $_SESSION['msg'] = "
      <div class='alert alert-dismissible fade show my-3 $alertClass'>
          <strong>" . ($result ? "Success!" : "Error!") . "</strong> $msg
          <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
      </div>
  ";

  header("Location: admission.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin Manage Categories - Archic</title>
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
  <style>
    .category_image {
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
      <h1>Home Section</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Home Page</li>
          <li class="breadcrumb-item active">Notice New</li>
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
                  <h5 class="card-title">Notice New<span></span></h5>

                  <div class="mb-4">
                    <?php
                    if ($msg) {
                      echo $msg;
                      $_SESSION['msg'] = "";
                    }
                    ?>
                  </div>
                  <!-- 
                  <div class="mb-4">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addForm_modal">Add New Notice</button>
                  </div> -->

                  <div class="table-responsive">
                    <table class="table table-borderless datatable">
                      <thead>
                        <tr>
                          <!-- <th scope="col">#ID</th> -->
                          <th scope="col">Degree Admission</th>
                          <th scope="col">Junior Admission</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach ($result as $key => $row) {
                        ?>
                          <tr>
                            <td><a style="font-weight: bold;" class="text-black">
                                <?php echo $row['category_name']; ?>
                              </a>
                            </td>
                            <td>
                              <a style="font-weight: bold;" class="text-black">
                                <?php echo $row['category_desc']; ?>
                              </a>
                            </td>
                            <td class="d-flex">
                              <div class="col-6">
                                <button class="btn btn-outline-primary icon" data-bs-toggle="modal" data-bs-target="#updateForm_modal<?php echo $row['catid'] ?>"><i class="bi bi-pencil-square"></i></button>
                              </div>
                            </td>
                          </tr>


                          <!-- Update Category Modal -->
                          <div class="modal fade" id="updateForm_modal<?php echo $row['catid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="staticBackdropLabel">Update Notice</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <p class="statusMsg"></p>
                                  <!-- Multi Columns Form -->
                                  <form class="row g-3" method="POST" action="admission.php" enctype='multipart/form-data'>
                                    <div class="col-md-12 mt-3">
                                      <label for="category_name" class="form-label">Degree Admission</label>
                                      <input type="hidden" class="form-control" name="catid" value="<?php echo $row['catid'] ?>" />
                                      <textarea type="text" class="form-control" id="category_name" name="category_name" rows="6" value="" required><?php echo $row['category_name'] ?></textarea>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                      <label for="category_desc" class="form-label">Junior Admission</label>
                                      <textarea class="form-control" id="category_desc" name="category_desc" value="" rows="6" required><?php echo $row['category_desc'] ?></textarea>
                                    </div>
                                    <!-- <div class="col-md-6 col-12 mt-3">
                                      <label for="category_image" class="form-label">Image</label><br>
                                      <img src="../<?php //echo $row['category_image'] 
                                                    ?>" style="width:20vw;margin:10px 0px;" alt="">
                                      <input class="form-control" id="category_image" name="category_image" type="file">
                                      <input type="hidden" class="form-control" name="category_image_copy" value="<?php echo $row['category_image'] ?>" />
                                    </div> -->

                                    <!-- End Multi Columns Form -->
                                </div>
                                <div style="clear:both;"></div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary" name="update">Update</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>


                        <?php
                        }
                        ?>
                    </table>
                  </div>

                </div>

              </div>
            </div><!-- End Recent Sales -->


          </div><!-- End Right side columns -->

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