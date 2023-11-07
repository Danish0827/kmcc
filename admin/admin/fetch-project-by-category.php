<?php
// Include configuration file 
require_once './../config.php';

// Include User library file 
require_once 'Admin.class.php';

$category_id = $_POST["category_id"];
$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
$sql = "SELECT * FROM " . DB_PROJECTS_TBL . " where catid = $category_id";
$result = mysqli_query($con, $sql);
?>
<option value="">Select Project</option>
<?php
while ($row = mysqli_fetch_array($result)) {
    ?>
    <option value="<?php echo $row["pid"]; ?>"><?php echo $row["project_name"]; ?></option>
    <?php
}
?>