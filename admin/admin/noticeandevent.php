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
    $sql = "SELECT * FROM " . DB_NOTICENEWEVENTS_TBL . " ORDER BY catid ASC";
    $result = mysqli_query($con, $sql);
  }
}

// adding new category
if (isset($_POST['save'])) {
  $category_name = !empty($_POST['category_name']) ? $_POST['category_name'] : '';
  $category_desc = !empty($_POST['category_desc']) ? $_POST['category_desc'] : '';
  $category_date = !empty($_POST['category_date']) ? $_POST['category_date'] : '';

  // directory path for storing images
  // $output_dir = "./../images/services/";

  // folder name will be category name
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
  //     echo "Image uploaded succesfully";
  //   } else {
  //     echo "Failed to upload image";
  //   }
  // }

  // if (empty($_FILES['category_image']['name'])) {
  //   $img = "";
  // }

  // insert the category into the db along with the image path
  $sql = "INSERT INTO " . DB_NOTICENEWEVENTS_TBL . " (category_name, category_desc,category_date) VALUES (?, ?,?)";

  $stmt = mysqli_prepare($con, $sql);

  if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sss", $category_name, $category_desc, $category_date);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
      $msg = "New Notice News Added!";
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


  header("Location: noticeandevent.php");
}

// updating existing category
if (isset($_POST['update'])) {
  $catid = !empty($_POST['catid']) ? $_POST['catid'] : '';
  $category_name = !empty($_POST['category_name']) ? $_POST['category_name'] : '';
  $category_desc = !empty($_POST['category_desc']) ? $_POST['category_desc'] : '';
  $category_date = !empty($_POST['category_date']) ? $_POST['category_date'] : '';

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
  $sql = "UPDATE " . DB_NOTICENEWEVENTS_TBL . " SET category_name = ?, category_desc = ?, category_date = ? WHERE catid = ?";

  $stmt = mysqli_prepare($con, $sql);

  if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sssi", $category_name, $category_desc, $category_date, $catid);
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

  header("Location: noticeandevent.php");
}

// deleting existing category
if (isset($_POST['delete'])) {
  $catid = !empty($_POST['catid']) ? $_POST['catid'] : '';

  $sql = "DELETE FROM " . DB_NOTICENEWEVENTS_TBL . " WHERE catid = " . $catid;
  $result = mysqli_query($con, $sql);

  if ($result) {
    $_SESSION['msg'] = "
        <div class='alert alert-success alert-dismissible fade show my-3'>
            <strong>Success!</strong> Notice News Deleted!
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

  header("Location: noticeandevent.php");
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
          <li class="breadcrumb-item active">Notice New & Events</li>
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
                  <h5 class="card-title">Notice New & Events<span></span></h5>

                  <div class="mb-4">
                    <?php
                    if ($msg) {
                      echo $msg;
                      $_SESSION['msg'] = "";
                    }
                    ?>
                  </div>

                  <div class="mb-4">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addForm_modal">Add New Notice</button>
                  </div>

                  <div class="table-responsive">
                    <table class="table table-borderless datatable">
                      <thead>
                        <tr>
                          <th scope="col">#ID</th>
                          <th scope="col">Notice Head</th>
                          <th scope="col">Notice Discription</th>
                          <th scope="col">Notice Date</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach ($result as $key => $row) {
                        ?>
                          <tr>
                            <th scope="row"><a href="#">#
                                <?php echo $key + 1; ?>
                              </a></th>
                            <td><a style="font-weight: bold;" href="#" class="text-black">
                                <?php echo $row['category_name']; ?>
                              </a></td>
                            <td>
                              <?php echo $row['category_desc'];
                              ?>
                            </td>
                            <td>
                            <?php
                            $date = $row['category_date'];
                            $newDate = date("d M y", strtotime($date));
                            echo $newDate;
                            ?>
                            </td>

                            <td class="d-flex">
                              <div class="col-6">
                                <button class="btn btn-outline-primary icon" data-bs-toggle="modal" data-bs-target="#updateForm_modal<?php echo $row['catid'] ?>"><i class="bi bi-pencil-square"></i></button>
                              </div>
                              <div class="col-6">
                                <button style="margin-left: 5px;" class="btn btn-outline-danger icon" data-bs-toggle="modal" data-bs-target="#delete_modal<?php echo $row['catid'] ?>"><i class="bi bi-trash-fill"></i></button>
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
                                  <form class="row g-3" method="POST" action="noticeandevent.php" enctype='multipart/form-data'>
                                    <div class="col-md-12 mt-3">
                                      <label for="category_name" class="form-label">Notice Head</label>
                                      <input type="hidden" class="form-control" name="catid" value="<?php echo $row['catid'] ?>" />
                                      <input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo $row['category_name'] ?>" required>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                      <label for="category_desc" class="form-label">Notice Discription</label>
                                      <textarea type="text" class="form-control" id="category_desc" name="category_desc" value="" required><?php echo $row['category_desc'] ?></textarea>
                                    </div>
                                    <div class="col-md-12 col-12">
                                      <label for="category_image" class="form-label">Notice Date</label>
                                      <input class="form-control" id="category_date" name="category_date" type="date" value="<?php echo $row['category_date'] ?>" required>
                                    </div>

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



                          <!-- Delete Category Modal -->
                          <div class="modal fade" id="delete_modal<?php echo $row['catid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Delete Notice</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <p>Are you sure you want to delete this Notice?</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <form class="row g-3" method="POST" action="noticeandevent.php" enctype='multipart/form-data'>
                                    <input type="hidden" class="form-control" name="catid" value="<?php echo $row['catid'] ?>" />
                                    <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                                  </form>
                                </div>
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

    <!-- Modal -->
    <div class="modal fade" id="addForm_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Add Notice</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p class="statusMsg"></p>
            <!-- Multi Columns Form -->
            <form class="row g-3" method="POST" action="noticeandevent.php" enctype='multipart/form-data'>
              <div class="col-md-12">
                <label for="category_name" class="form-label">Notice Head</label>
                <input type="text" class="form-control" id="category_name" name="category_name" required>
              </div>
              <div class="col-md-12">
                <label for="category_desc" class="form-label">Notice Discription</label>
                <textarea type="text" class="form-control" id="category_desc" name="category_desc"></textarea>
              </div>
              <div class="col-md-12 col-12">
                <label for="category_image" class="form-label">Notice Date</label>
                <input class="form-control" id="category_date" name="category_date" type="date">
              </div>

              <!-- End Multi Columns Form -->
          </div>
          <div style="clear:both;"></div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="save">Save</button>
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