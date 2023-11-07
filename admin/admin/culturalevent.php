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
    $sql = "SELECT * FROM " . DB_CULTURAL_TBL . " ORDER BY catid ASC";
    $result = mysqli_query($con, $sql);
  }
}



// adding new category
if (isset($_POST['save'])) {
  $category_name = !empty($_POST['category_name']) ? $_POST['category_name'] : '';

  // Directory path for storing images
  $image_output_dir = "./../images/services/";
  $pdf_output_dir = "./../pdfs/";

  // Folder name will be category name
  $folder_name = $category_name;

  // if (!file_exists($image_output_dir . $folder_name)) {
  //   @mkdir($image_output_dir . $folder_name, 0777);
  //   echo "Image Folder Created"; // Success Message
  // }

  // if (!file_exists($pdf_output_dir . $folder_name)) {
  //   @mkdir($pdf_output_dir . $folder_name, 0777);
  //   echo "PDF Folder Created"; // Success Message
  // }

  // Handle image upload
  $image_name = $_FILES['category_image']['name'];
  $image_target_dir = "./../images/services/";
  $image_target_file = $image_target_dir . basename($_FILES["category_image"]["name"]);
  $imageFileType = strtolower(pathinfo($image_target_file, PATHINFO_EXTENSION));
  $image_extension_arr = array("jpg", "jpeg", "png", "gif");

  if (in_array($imageFileType, $image_extension_arr)) {
    if (move_uploaded_file($_FILES['category_image']['tmp_name'], $image_target_dir . $image_name)) {
      echo "Image uploaded successfully";
    } else {
      echo "Failed to upload image";
    }
  }

  // Handle PDF upload
  $pdf_name = $_FILES['category_image']['name'];
  $pdf_target_dir = "./../pdfs/";
  $pdf_target_file = $pdf_target_dir . basename($_FILES["category_image"]["name"]);
  $pdfFileType = strtolower(pathinfo($pdf_target_file, PATHINFO_EXTENSION));
  $pdf_extension_arr = array("pdf");

  if (in_array($pdfFileType, $pdf_extension_arr)) {
    if (move_uploaded_file($_FILES['category_image']['tmp_name'], $pdf_target_dir . $pdf_name)) {
      echo "PDF uploaded successfully";
    } else {
      echo "Failed to upload PDF";
    }
  }

  if (empty($_FILES['category_image']['name'])) {
    $image_name = "";
  }

  if (empty($_FILES['category_image']['name'])) {
    $pdf_name = "";
  }

  // Insert the category into the database along with the image and PDF paths
  $sql = "INSERT INTO " . DB_CULTURAL_TBL . " VALUES('', '" . $category_name . "', '" . $pdf_name . "')";
  // echo $sql;
  // die();
  $result = mysqli_query($con, $sql);

  if ($result) {
    $_SESSION['msg'] = "
      <div class='alert alert-success alert-dismissible fade show my-3'>
          <strong>Success!</strong> New Cultural Activities Report Added!
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

  header("Location: culturalevent.php");
}

// updating existing category
if (isset($_POST['update'])) {
  $catid = !empty($_POST['catid']) ? $_POST['catid'] : '';
  $category_name = !empty($_POST['category_name']) ? $_POST['category_name'] : '';

  // Directory path for storing images and PDFs
  $image_output_dir = "./../images/services/";
  $pdf_output_dir = "./../pdfs/";

  // Folder name will be category name
  $folder_name = $category_name;

  // if (!file_exists($image_output_dir . $folder_name)) {
  //   @mkdir($image_output_dir . $folder_name, 0777);
  //   echo "Image Folder Created"; // Success Message
  // }

  // if (!file_exists($pdf_output_dir . $folder_name)) {
  //   @mkdir($pdf_output_dir . $folder_name, 0777);
  //   echo "PDF Folder Created"; // Success Message
  // }

  // Handle image update
  $image_name = $_FILES['category_image']['name'];
  $image_target_dir = "./../images/services/";
  $image_target_file = $image_target_dir . basename($_FILES["category_image"]["name"]);
  $imageFileType = strtolower(pathinfo($image_target_file, PATHINFO_EXTENSION));
  $image_extension_arr = array("jpg", "jpeg", "png", "gif");

  if (in_array($imageFileType, $image_extension_arr)) {
    if (move_uploaded_file($_FILES['category_image']['tmp_name'], $image_target_dir . $image_name)) {
      echo "Image uploaded successfully";
    } else {
      echo "Failed to upload image";
    }
  }

  // Handle PDF update
  $pdf_name = $_FILES['category_image']['name'];
  $pdf_target_dir = "./../pdfs/";
  $pdf_target_file = $pdf_target_dir . basename($_FILES["category_image"]["name"]);
  $pdfFileType = strtolower(pathinfo($pdf_target_file, PATHINFO_EXTENSION));
  $pdf_extension_arr = array("pdf");

  if (in_array($pdfFileType, $pdf_extension_arr)) {
    if (move_uploaded_file($_FILES['category_image']['tmp_name'], $pdf_target_dir . $pdf_name)) {
      echo "PDF uploaded successfully";
    } else {
      echo "Failed to upload PDF";
    }
  }

  // Handle cases where no new image or PDF was provided
  if (empty($_FILES['category_image']['name'])) {
    $image_name = $_POST['category_image_copy'];
  }

  if (empty($_FILES['category_image']['name'])) {
    $pdf_name = $_POST['category_image_copy'];
  }

  // Update the category in the database with the image and PDF paths
  $sql = "UPDATE " . DB_CULTURAL_TBL . " SET category_name = '" . $category_name . "', category_image = '" . $image_name . "', category_image = '" . $pdf_name . "' WHERE catid = " . $catid;
  $result = mysqli_query($con, $sql);

  if ($result) {
    $_SESSION['msg'] = "
      <div class='alert alert-success alert-dismissible fade show my-3'>
          <strong>Success!</strong> Cultural Activities Report Updated!
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

  header("Location: culturalevent.php");
}


// deleting existing category
if (isset($_POST['delete'])) {
  $catid = !empty($_POST['catid']) ? $_POST['catid'] : '';

  $sql = "DELETE FROM " . DB_CULTURAL_TBL . " WHERE catid = " . $catid;
  $result = mysqli_query($con, $sql);

  if ($result) {
    $_SESSION['msg'] = "
        <div class='alert alert-success alert-dismissible fade show my-3'>
            <strong>Success!</strong> Cultural Activities Report Deleted!
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

  header("Location: culturalevent.php");
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
      <h1>Events Section</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Events</li>
          <li class="breadcrumb-item active">Cultural Activities Report</li>
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
                  <h5 class="card-title">Cultural Activities Report<span></span></h5>

                  <div class="mb-4">
                    <?php
                    if ($msg) {
                      echo $msg;
                      $_SESSION['msg'] = "";
                    }
                    ?>
                  </div>

                  <div class="mb-4">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addForm_modal">Add New Cultural Activities</button>
                  </div>

                  <div class="table-responsive">
                    <table class="table table-borderless datatable">
                      <thead>
                        <tr>
                          <th scope="col">#ID</th>
                          <th scope="col">Cultural Activities Name</th>
                          <th scope="col">Cultural Activities PDF</th>
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
                              <a target="_blank" href="./../pdfs/<?= $row['category_image']  ?>">View</a>
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
                                  <h5 class="modal-title" id="staticBackdropLabel">Update Cultural Activities</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <p class="statusMsg"></p>
                                  <!-- Multi Columns Form -->
                                  <form class="row g-3" method="POST" action="culturalevent.php" enctype='multipart/form-data'>
                                    <div class="col-md-12 mt-3">
                                      <label for="category_name" class="form-label">Cultural Activities Year</label>
                                      <input type="hidden" class="form-control" name="catid" value="<?php echo $row['catid'] ?>" />
                                      <input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo $row['category_name'] ?>" required>
                                    </div>
                                    <div class="col-md-12 col-12 mt-3">
                                      <label for="category_image" class="form-label">PDF</label><br>

                                      <input class="form-control" id="category_image" name="category_image" type="file">
                                      <h5 class="my-3"><?php echo $row['category_image'] ?></h5>
                                      <input type="hidden" class="form-control" name="category_image_copy" value="<?php echo $row['category_image'] ?>" />
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
                                  <h5 class="modal-title" id="exampleModalLabel">Delete Cultural Activities</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <p>Are you sure you want to delete this Cultural Activities?</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <form class="row g-3" method="POST" action="culturalevent.php" enctype='multipart/form-data'>
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
            <h5 class="modal-title" id="staticBackdropLabel">Add Cultural Activities</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p class="statusMsg"></p>
            <!-- Multi Columns Form -->
            <form class="row g-3" method="POST" action="culturalevent.php" enctype='multipart/form-data'>
              <div class="col-md-12">
                <label for="category_name" class="form-label">Cultural Activities Year</label>
                <input type="text" class="form-control" id="category_name" name="category_name" required>
              </div>
              <div class="col-md-12 col-12">
                <label for="category_image" class="form-label">PDF</label>
                <input class="form-control" id="category_image" name="category_image" type="file">
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