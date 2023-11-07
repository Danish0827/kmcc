<?php
require_once './../config.php';

require_once 'Admin.class.php';

function h($s) {
    echo htmlspecialchars($s, ENT_QUOTES);
}
function u($s) {
    echo urlencode($s);
}
function m($con,$s) {
    return "'".mysqli_real_escape_string($con,$s)."'";
}

// Create connection by passing these connection parameters
$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($con) { 
//sql query to find total strength with respect to the department
$sql = "SELECT * FROM projects";
$result = mysqli_query($con,$sql);
$projects = array();
while ($projects[]= mysqli_fetch_assoc($result));
print_r($projects);


foreach ($projects as $project) { ?>
    <h2><?php echo !isset($project['project_name']) ? '': $project['project_name']; ?></h2>
    <p><?php echo !isset($project['project_desc'])? '': $project['project_desc']; ?></p>
    <?php
        // Get all products for a project
        //
        $pid = !isset($project['pid'])? null : $project['pid'];
        $q = mysqli_query($con,'SELECT pimgid, project_image FROM project_images where pid='.$pid);
        // print_r(mysqli_fetch_assoc($q));
    ?>
    <ul>
        <?php 
        if($q) {
        while ($product = mysqli_fetch_array($q, MYSQLI_ASSOC)) { ?>
            <li>
                <a href="/product.php?id=<?php echo ($product['pimgid']); ?>">
                    <?php echo ($product['project_image']); ?>
                </a>
            </li>
        <?php }} ?>
    </ul>
<?php } 
    }
?>


















