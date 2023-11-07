<?php include "./admin/config.php"?>
<!DOCTYPE html>
<html class="wide wow-animation scrollTo" lang="en">

<head>
    <title>Home</title>
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
        $sql = "SELECT * FROM slider LIMIT 5";
        $res = mysqli_query($con, $sql);
        
        $data = mysqli_fetch_all($res, MYSQLI_ASSOC); // Fetch all rows as an associative array
    ?>
    <?php
        $sql1 = "SELECT * FROM noticenew";
        $res1 = mysqli_query($con, $sql1);
        
        $data1 = mysqli_fetch_all($res1, MYSQLI_ASSOC); // Fetch all rows as an associative array
    ?>
    <?php
        $sql2 = "SELECT * FROM noticenewevents";
        $res2 = mysqli_query($con, $sql2);
        
        $data2 = mysqli_fetch_all($res2, MYSQLI_ASSOC); // Fetch all rows as an associative array
    ?>
    <?php
        $sql3 = "SELECT * FROM admission";
        $res3 = mysqli_query($con, $sql3);
        
        $data3 = mysqli_fetch_all($res3, MYSQLI_ASSOC); // Fetch all rows as an associative array
    ?>
    <div class="page-loader">
        <div class="page-loader-body"><span class="cssload-loader"><span class="cssload-loader-inner"></span></span></div>
    </div>
    <div class="page text-center">
       <?php include 'header.php' ?>
        <div class="banner-part">
            <div class="row">
                <div class="col-md-8">
                <section class="section">
                    <div class="swiper-container swiper-slider swiper-slider-modern swiper-slider-2" data-loop="true" data-dragable="false" data-slide-effect="fade">
                        <div class="swiper-wrapper">
                        <!-- ./images/users/slider-1.jpg -->
                        <?php foreach ($data as $row): ?>
                            <div class="swiper-slide" data-slide-bg="admin/<?php echo $row['project_image']; ?>" style="background-position: 80% center">
                                <div class="swiper-slide-caption section-70">
                                    <div class="container">
                                        <div class="range range-xs-center">
                                            <div class="cell-md-9 cell-xs-10">
                                                <!-- <div data-caption-animate="fadeInUp" data-caption-delay="100">
                                                    <h1 class="text-bold">Providing Higher Education</h1>
                                                </div>
                                                <div class="offset-top-20 offset-xs-top-40 offset-xl-top-15" data-caption-animate="fadeInUp" data-caption-delay="150">
                                                    <h6 class=""><span data-novi-id="1">Besides providing you with new knowledge and training in chosen disciplines, our university also gives you an opportunity to benefit from spending your free time by playing .</span></h6>
                                                </div>
                                                <div class="offset-top-20 offset-xl-top-30" data-caption-animate="fadeInUp" data-caption-delay="400">
                                                    <div class="group-xl group-middle"><a class="btn btn-primary" href="#">Start a Journey</a><a class="btn btn-default" href="#"><span data-novi-id="3">Get Template Now</span></a></div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="swiper-button-prev fa-arrow-left"></div>
                        <div class="swiper-button-next fa-arrow-right"></div>
                        <div class="swiper-pagination"></div>
                    </div>
        </section>
                </div>  
                <div class="col-md-4 akwdhformb">
                    <div class="text-partfor-dym">                        
                        <marquee style="font:Arial;height:500px;" scrollamount="3" scrolldelay="5" direction="up" onmouseover="this.stop()" onmouseout="this.start()">
                            <ol style="list-style-type: disclosure-closed;padding-left: 20px;">
                            <?php foreach ($data1 as $row1): ?>
                                <li style="margin-bottom: 15px;"><a target="_blanks" href="<?php echo $row1['category_desc']; ?>"><?php echo $row1['category_name']; ?></a></li>   
                            <?php endforeach; ?>
                            </ol>
                        </marquee>
                    </div>
                </div>      
            </div>
        </div>
       

        <section class="section novi-background bg-cover section-70 section-md-114 bg-catskill">
            <div class="shell isotope-wrap">
                <h2 class="text-bold">Latest Activities</h2>
                <hr class="divider bg-madison">
                <div class="row range-30 isotope offset-top-50 text-left">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 isotope-item">
                        <article class="post-news" style="height: 400px;box-shadow: 0 0 30px rgba(0, 0, 0, .5);border-radius: 10px;"><a>
                            <img style="border-radius: 10px;" class="img-responsive" src="images/Banner/370x240px.jpg" alt="" width="370" height="240"></a>
                            <div class="post-news-body">
                                <h6 style="text-align:center"><a> Skill India  Study Center </a></h6>
                                <div class="offset-top-20">
                                    <p">Coming Soon...</p>
                                </div>
                                <!-- <div class="post-news-meta offset-top-20"><span class="icon novi-icon icon-xs mdi mdi-calendar-clock text-middle text-madison"></span><span class="text-middle inset-left-10 text-italic text-black">3 days ago</span></div> -->
                            </div>
                        </article>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 isotope-item">
                        <article class="post-news" style="height: 400px; overflow: hidden;overflow-y: scroll;box-shadow: 0 0 30px rgba(0, 0, 0, .5);border-radius: 10px;">
                            <div class="post-news-body">
                                <h6 style="text-align:center"><a> News & Events</a></h6>
                                <div class="news-all-part">
                                <?php foreach ($data2 as $row2): ?>
                                    <div class="offset-top-20">
                                        <div class="post-news-meta offset-top-20" style="display: flex;align-items: end;margin-right: 0;">
                                            <span class="icon novi-icon icon-xs mdi mdi-calendar-clock text-middle text-madison"></span>
                                            <span class="text-middle inset-left-10 text-italic text-black"><?php $date = $row2['category_date'];
                                                                                                                        $newDate = date("d M y", strtotime($date));
                                                                                                                        echo $newDate;
                                                                                                                        ?>  </span>
                                            <h6 style="padding-left:10px"><?php echo $row2['category_name']; ?></h6>
                                        </div>
                                        <p><?php echo $row2['category_desc']; ?></p>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                
                            </div>
                        </article>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 isotope-item">
                        <article class="post-news" style="height: 400px;box-shadow: 0 0 30px rgba(0, 0, 0, .5);border-radius: 10px;">
                            <div class="post-news-body" style="padding:20px">
                                <h6 style="text-align:center"><a>Admission</a></h6>
                                <!-- <h6 style="text-align:center">First Merit List</h6> -->
                                <?php foreach ($data3 as $row3): ?>
                                <div style="text-align:center" class="offset-top-10">
                                    <div style="text-align: left;line-height: 20px;padding:7px 15px;cursor: unset;" class="btn btn-primary">
                                    <?php echo $row3['category_name']; ?>
                                    </div>
                                </div>
                                <div style="text-align:center" class="offset-top-20">
                                    <div style="text-align: left;line-height: 20px;padding: 15px;cursor: unset;" class="btn btn-primary">
                                    <?php echo $row3['category_desc']; ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </article>
                    </div>
                </div>
               
            </div>
        </section>
        <?php include 'footer.php'?>
    </div>
    
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>



<!-- <b> Degree College </b><br>
<b> B.com Section </b><br>
Nazneen Sayyed - 8424974019<br>
Binita Singh -  9869911086<br><br>

<b> BMS Section </b><br>
Pranav N. Panchal - 7700073433<br>
Degree Admission<a style="color:white" target="_blank" href="https://kmccerp.pssm.in/admission.php"> Click Here</a> -->


<!-- <b>Junior College</b><br>
Vishnu Jadhav - 9930314306<br>
Surajprakash Nirmal - 9167742292<br>
Nandkumar Tiwari - 9702165982<br>
Junior Admission<a style="color:white" target="_blank" href="https://kmccerp.pssm.in/junior/admission.php"> Click Here</a> -->