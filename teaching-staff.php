<?php include "./admin/config.php"?>
<!DOCTYPE html>
<html class="wide wow-animation scrollTo" lang="en">

<head>
    <title>Teaching Staff</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="keywords" content="intense web design multipurpose template">
    <meta name="date" content="Dec 26">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,700%7CMerriweather:400,300,300italic,400italic,700,700italic">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/novi.css">
    <!--[if lt IE 10]><div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div><script src="js/html5shiv.min.js"></script><![endif]-->
</head>

<body>
    <?php
        $sql = "SELECT * FROM teachingdr";
        $res = mysqli_query($con, $sql);
        
        $data = mysqli_fetch_all($res, MYSQLI_ASSOC); // Fetch all rows as an associative array
    ?>
    <?php
        $sql1 = "SELECT * FROM teachingjr";
        $res1 = mysqli_query($con, $sql1);
        
        $data1 = mysqli_fetch_all($res1, MYSQLI_ASSOC); // Fetch all rows as an associative array
    ?>
    <div class="page-loader">
        <div class="page-loader-body"><span class="cssload-loader"><span class="cssload-loader-inner"></span></span></div>
    </div>
    <div class="page text-center">
    <?php include 'header.php' ?>
        <section class="section breadcrumb-modern context-dark parallax-container" data-parallax-img="https://www.b2bgenie.in/images/contact-banner.jpg">
            <div class="parallax-content section-30 section-sm-70" style="background: #000000b5;">
                <div class="shell">
                    <h2 class="reveal-sm-block"> Teaching Staff </h2>
                    <div class="offset-sm-top-35">
                        <ul class="list-inline list-inline-lg list-inline-dashed p">
                            <li><a href="index.html">Home</a></li>
                            <li>Teaching Staff</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="section novi-background bg-cover section-70 section-md-114 bg-default">
            <div class="shell">
                <h2 class="text-bold"> Degree College Teaching Staff </h2>
                <hr class="divider bg-madison">
                <div class="range range-30 text-md-left offset-top-60" style="justify-content:center">
                <?php foreach ($data as $row): ?>
                    <div class="cell-sm-6 cell-md-3 text-md-center">
                        <!-- <img class="img-responsive reveal-inline-block img-rounded" src="images/users/user-julie-weaver-270x270.jpg" width="270" height="270" alt=""> -->
                        <div class="offset-top-20">
                            <h6 class="text-bold text-primary"><?php echo $row['category_name']; ?></h6>
                        </div>
                        <div class="offset-top-5">
                            <p><?php echo $row['category_desc']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>   
                </div>
            </div>
        </section>
        <section class="section novi-background bg-cover section-70 section-md-114 bg-default">
            <div class="shell">
                <h2 class="text-bold"> Junior College Teaching Staff </h2>
                <hr class="divider bg-madison">
                <div class="range range-30 text-md-left offset-top-60" style="justify-content:center">
                <?php foreach ($data1 as $row1): ?>
                    <div class="cell-sm-6 cell-md-3 text-md-center">
                        <!-- <img class="img-responsive reveal-inline-block img-rounded" src="images/users/user-peter-wong-270x270.jpg" width="270" height="270" alt=""> -->
                        <div class="offset-top-20">
                            <h6 class="text-bold text-primary"><?php echo $row1['category_name']; ?></h6>
                        </div>
                        <div class="offset-top-5">
                        <p><?php echo $row1['category_desc']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?> 
                </div>
            </div>
        </section>
        <?php include 'footer.php' ?>
    </div>
        
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>