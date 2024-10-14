<?php
// user variables for page use
    if(isset($_SESSION)){
        $uname = $_SESSION['user_name'];
        $fname = $_SESSION['first_name'];
        $lastLog = $_SESSION['last_login'];
        $profilePic = $_SESSION['profile_pic'];
    } else {
        session_start();
    }
?>