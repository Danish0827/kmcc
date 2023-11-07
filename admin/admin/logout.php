<?php
// Include configuration file
require_once './../config.php';

// Remove admin data from the session
unset($_SESSION['adminData']);

unset($_SESSION);

// Destroy entire session data
session_destroy();

// Redirect to login page
header("Location: login.php");
?>