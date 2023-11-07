<?php
/* 
 * Admin Class 
 * This class is used for database related (connect, insert, and update) operations 
 * @author               Aditi Patil
 */

class Admin
{
    private $dbHost = DB_HOST;
    private $dbUsername = DB_USERNAME;
    private $dbPassword = DB_PASSWORD;
    private $dbName = DB_NAME;
    private $adminTbl = DB_ADMIN_TBL;
    private $categoryTbl = DB_TEACHINGDE_TBL;
    private $projectsTbl = DB_TEACHINGJR_TBL;

    function __construct()
    {
        if (!isset($this->db)) {
            // Connect to the database 
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if ($conn->connect_error) {
                die("Failed to connect with MySQL: " . $conn->connect_error);
            } else {
                $this->db = $conn;
            }
        }
    }

    // function to login for admin
    function login($data = array())
    {
        if (!empty($data)) {
            $checkQuery = "SELECT * FROM " . $this->adminTbl . " WHERE email = '" . $data['email'] . "' AND password = '" . $data['password'] . "'";
            $checkResult = $this->db->query($checkQuery);

            if ($checkResult->num_rows > 0) {
                // Get admin data from the database  
                $adminData = $checkResult->fetch_assoc();
            }
        }
        return !empty($adminData) ? $adminData : false;
    }

    // function to forgot password for admin
    function forgot($data = array())
    {
        if (!empty($data)) {
            $checkQuery = "SELECT * FROM " . $this->adminTbl . " WHERE email = '" . $data['email'] . "'";
            $checkResult = $this->db->query($checkQuery);

            $token = "0123456789qwertzuioplkjhgfdsayxcvbnm";
            $token = str_shuffle($token);
            $token = substr($token, 0, 5);
            $data['token'] = $token;

            if ($checkResult->num_rows > 0) {
                // update token field
                $query = "UPDATE " . $this->adminTbl . " SET token = '" . $data['token'] . "' WHERE email = '" . $data['email'] . "'";
                $update = $this->db->query($query);

                // Get admin data from the database
                $checkQuery = "SELECT * FROM " . $this->adminTbl . " WHERE email = '" . $data['email'] . "'";
                $checkResult = $this->db->query($checkQuery);
                $adminData = $checkResult->fetch_assoc();
            }
        }
        return !empty($adminData) ? $adminData : false;
    }

    // function to reset password for admin
    function reset($data = array())
    {
        if (!empty($data)) {
            $checkQuery = "SELECT * FROM " . $this->adminTbl . " WHERE email = '" . $data['email'] . "' AND token = '" . $data['token'] . "'";
            $checkResult = $this->db->query($checkQuery);

            // Add modified time to the data array 
            if (!array_key_exists('modified', $data)) {
                $data['modified'] = date("Y-m-d H:i:s");
            }

            if ($checkResult->num_rows > 0) {
                // update password, token and modified field
                $query = "UPDATE " . $this->adminTbl . " SET password = '" . $data['password'] . "', token = '', date_modified = '" . $data['modified'] . "' WHERE email = '" . $data['email'] . "'";
                $update = $this->db->query($query);

                // Get admin data from the database
                $adminData = $checkResult->fetch_assoc();
            }
        }
        return !empty($adminData) ? $adminData : false;
    }



    // function that return the total number of products
    function sliderCount()
    {
        $checkQuery = "SELECT * FROM slider";
        $checkResult = $this->db->query($checkQuery);

        $sliderCount = $checkResult->num_rows;
        return !empty($sliderCount) ? $sliderCount : false;
    }
    function noticeCount()
    {
        $checkQuery = "SELECT * FROM noticenew";
        $checkResult = $this->db->query($checkQuery);

        $noticeCount = $checkResult->num_rows;
        return !empty($noticeCount) ? $noticeCount : false;
    }
    function noticeeventCount()
    {
        $checkQuery = "SELECT * FROM noticenewevents";
        $checkResult = $this->db->query($checkQuery);

        $noticeeventCount = $checkResult->num_rows;
        return !empty($noticeeventCount) ? $noticeeventCount : false;
    }



    function degreeCount()
    {
        $checkQuery = "SELECT * FROM teachingdr";
        $checkResult = $this->db->query($checkQuery);

        $degreeCount = $checkResult->num_rows;
        return !empty($degreeCount) ? $degreeCount : false;
    }
    function juniorCount()
    {
        $checkQuery = "SELECT * FROM teachingjr";
        $checkResult = $this->db->query($checkQuery);

        $juniorCount = $checkResult->num_rows;
        return !empty($juniorCount) ? $juniorCount : false;
    }




    function sportCount()
    {
        $checkQuery = "SELECT * FROM sportevent";
        $checkResult = $this->db->query($checkQuery);

        $sportCount = $checkResult->num_rows;
        return !empty($sportCount) ? $sportCount : false;
    }
    function culturalCount()
    {
        $checkQuery = "SELECT * FROM culturalevent";
        $checkResult = $this->db->query($checkQuery);

        $culturalCount = $checkResult->num_rows;
        return !empty($culturalCount) ? $culturalCount : false;
    }
    function urjaCount()
    {
        $checkQuery = "SELECT * FROM urjaevent";
        $checkResult = $this->db->query($checkQuery);

        $urjaCount = $checkResult->num_rows;
        return !empty($urjaCount) ? $urjaCount : false;
    }
    function nssCount()
    {
        $checkQuery = "SELECT * FROM nssevent";
        $checkResult = $this->db->query($checkQuery);

        $nssCount = $checkResult->num_rows;
        return !empty($nssCount) ? $nssCount : false;
    }
}
