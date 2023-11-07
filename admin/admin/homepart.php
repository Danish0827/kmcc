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
    $sql = "SELECT * FROM " . DB_slider_TBL . " ORDER BY pid ASC";
    $result = mysqli_query($con, $sql);
  }
}

// adding new project
if (isset($_POST['save'])) {

  $project_name = isset($_POST['project_name']) ? $_POST['project_name'] : '';
  $project_image = '';

  if (!empty($_FILES['project_image']['name'])) {
    $target_dir = "./../images/services/";
    $name = $_FILES['project_image']['name'];
    $target_file = $target_dir . basename($name);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extension_arr = array("jpg", "jpeg", "png", "gif");

    if (in_array($imageFileType, $extension_arr)) {
      if (move_uploaded_file($_FILES['project_image']['tmp_name'], $target_file)) {
        $project_image = "images/services/" . $name;
      }
    }
  }

  $sql = "INSERT INTO " . DB_slider_TBL . " (project_image) VALUES (?)";
  $stmt = mysqli_prepare($con, $sql);

  // Bind parameters and execute query
  mysqli_stmt_bind_param($stmt, "s", $project_image);
  $result = mysqli_stmt_execute($stmt);

  if ($result) {
    $_SESSION['msg'] = "
            <div class='alert alert-success alert-dismissible fade show my-3'>
                <strong>Success!</strong> New Slider Added!
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
            </div>
            ";
  } else {
    $_SESSION['msg'] = "
            <div class='alert alert-danger alert-dismissible fade show my-3'>
                <strong>Error!</strong> Something wrong happened! Please try again!
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
            </div>
            ";
  }
  mysqli_stmt_close($stmt); // Close the statement
  mysqli_close($con); // Close the database connection
  header("Location: homepart.php");
}

// updating existing project
if (isset($_POST['update'])) {
  // Include database connection
  // echo "<pre>";


  $pid = isset($_POST['pid']) ? $_POST['pid'] : '';
  // $project_name = isset($_POST['project_name']) ? $_POST['project_name'] : '';

  $img = ''; // Initialize image path

  if (!empty($_FILES['project_image']['name'])) {
    $target_dir = "../images/services/";
    $name = $_FILES['project_image']['name'];
    $target_file = $target_dir . basename($name);


    if (move_uploaded_file($_FILES['project_image']['tmp_name'], $target_file)) {
      $img = "images/services/" . $name;
    } else {
      echo "Failed to upload image";
    }
  }

  $sql = "UPDATE " . DB_slider_TBL . " SET project_image = '$img' WHERE pid = $pid";

  $result = mysqli_query($con, $sql);

  if ($result) {
    $_SESSION['msg'] = "
            <div class='alert alert-success alert-dismissible fade show my-3'>
                <strong>Success!</strong> Slider Updated!
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
            </div>
            ";
  } else {
    $_SESSION['msg'] = "
            <div class='alert alert-danger alert-dismissible fade show my-3'>
                <strong>Error!</strong> Something went wrong! Please try again!
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
            </div>
            ";
  }

  header("Location: homepart.php");
}

// deleting existing project
if (isset($_POST['delete'])) {
  $pid = !empty($_POST['pid']) ? $_POST['pid'] : '';

  $sql = "DELETE FROM " . DB_slider_TBL . " WHERE pid = " . $pid;
  $result = mysqli_query($con, $sql);

  if ($result) {
    $_SESSION['msg'] = "
        <div class='alert alert-success alert-dismissible fade show my-3'>
            <strong>Success!</strong> Slider Deleted!
            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
        </div>
        ";
  } else {
    $_SESSION['msg'] = "
        <div class='alert alert-danger alert-dismissible fade show my-3'>
            <strong>Error!</strong> Something wrong happened! Please try again!
            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
        </div>
        ";
  }

  header("Location: homepart.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin Manage Projects - Archic</title>
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
      <h1>Home Section</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Home Page</li>
          <li class="breadcrumb-item active">Slider</li>
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

                <!--<div class="filter">-->
                <!--  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>-->
                <!--  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">-->
                <!--    <li class="dropdown-header text-start">-->
                <!--      <h6>Filter</h6>-->
                <!--    </li>-->

                <!--    <li><a class="dropdown-item" href="#">Today</a></li>-->
                <!--    <li><a class="dropdown-item" href="#">This Month</a></li>-->
                <!--    <li><a class="dropdown-item" href="#">This Year</a></li>-->
                <!--  </ul>-->
                <!--</div>-->

                <div class="card-body">
                  <h4 class="card-title">Slider</h4>

                  <div class="mb-4">
                    <?php
                    if ($msg) {
                      echo $msg;
                      $_SESSION['msg'] = "";
                    }
                    ?>
                  </div>

                  <div class="mb-4">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addForm_modal">Add New Slider</button>
                  </div>

                  <div class="table-responsive">
                    <table class="table table-borderless datatable">
                      <thead>
                        <tr>
                          <th scope="col">#ID</th>
                          <th scope="col">Image</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 1;
                        while ($row = mysqli_fetch_array($result)) { ?>
                          <tr>
                            <th scope="row"><a href="#">#
                                <?php echo $i; ?>
                              </a></th>
                            <td>
                              <?php echo "<img class='cat_img text-center mx-auto' src='../" . $row['project_image'] . "'></img>"; ?>
                            </td>
                            <td class="d-flex">
                              <div class="col-6">
                                <button class="btn btn-outline-primary icon" data-bs-toggle="modal" data-bs-target="#updateForm_modal<?php echo $row['pid'] ?>"><i class="bi bi-pencil-square"></i></button>
                              </div>
                              <div class="col-6">
                                <button class="btn btn-outline-danger icon" data-bs-toggle="modal" data-bs-target="#delete_modal<?php echo $row['pid'] ?>"><i class="bi bi-trash-fill"></i></button>
                              </div>
                            </td>
                          </tr>


                          <!-- Update Project Modal -->
                          <div class="modal fade" id="updateForm_modal<?php echo $row['pid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="staticBackdropLabel">Update Slider</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <p class="statusMsg"></p>
                                  <!-- Multi Columns Form -->
                                  <form class="row g-3" method="POST" action="homepart.php" enctype='multipart/form-data'>
                                    <input class="form-control" id="pid" name="pid" type="hidden" value="<?php echo $row['pid'] ?>">

                                    <div class="col-md-12 col-12 mt-3">
                                      <label for="project_image" class="form-label">Image</label><br>
                                      <img src="../<?php echo $row['project_image'] ?>" style="width:20vw;margin:10px 0px;" alt="">
                                      <input class="form-control" id="project_image" name="project_image" type="file">
                                      <input type="hidden" class="form-control" name="project_image_copy" value="<?php echo $row['project_image'] ?>" />
                                    </div>

                                    <!-- End Multi Columns Form -->
                                </div>
                                <div style="clear:both;"></div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="pmit" class="btn btn-primary" name="update">Update</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>



                          <!-- Delete Project Modal -->
                          <div class="modal fade" id="delete_modal<?php echo $row['pid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Delete Slider</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <p>Are you sure you want to delete this Slider?</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <form class="row g-3" method="POST" action="homepart.php" enctype='multipart/form-data'>
                                    <input type="hidden" class="form-control" name="pid" value="<?php echo $row['pid'] ?>" />
                                    <button type="pmit" class="btn btn-danger" name="delete">Delete</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>

                        <?php
                          $i++;
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>

                </div>

              </div>
            </div><!-- End Recent Sales -->


          </div><!-- End Right side columns -->

        </div>
    </section>

    <!-- Add new Project Modal -->
    <div class="modal fade" id="addForm_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Add Slider</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p class="statusMsg"></p>
            <!-- Multi Columns Form -->
            <form class="row g-3" method="POST" action="homepart.php" enctype='multipart/form-data'>
              <!-- <div class="col-md-12">
                <label for="project_name" class="form-label">Project Name</label>
                <input type="text" class="form-control" id="project_name" name="project_name" required>
              </div> -->
              <div class="col-md-12 col-12">
                <label for="project_image" class="form-label">Image</label>
                <input class="form-control" id="project_image" name="project_image" type="file">
              </div>

              <!-- End Multi Columns Form -->
          </div>
          <div style="clear:both;"></div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="pmit" class="btn btn-primary" name="save">Save</button>
          </div>
          </form>

        </div>
      </div>
    </div>

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