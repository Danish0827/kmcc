<?php
/*
 * Basic Site Settings and API Configuration
 */


// Database configuration
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'kmccdanish');
define('DB_TEACHINGDE_TBL', 'teachingdr');
define('DB_TEACHINGJR_TBL', 'teachingjr');
define('DB_NOTICENEW_TBL', 'noticenew');
define('DB_NOTICENEWEVENTS_TBL', 'noticenewevents');
define('DB_ADMISSION_TBL', 'admission');
define('DB_slider_TBL', 'slider');
define('DB_ADMIN_TBL', 'admin');
define('DB_SPORTSEVENT_TBL', 'sportevent');
define('DB_CULTURAL_TBL', 'culturalevent');
define('DB_URJA_TBL', 'urjaevent');
define('DB_NSS_TBL', 'nssevent');

$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if (!$con) {
    echo "Problem in database connection! Contact administrator!" . mysqli_error($con);
}

// Start session
if (!session_id()) {
    session_start();
}
