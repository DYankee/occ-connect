<?php
//Start session
session_start();

//Need helper functions file:
require('login_functions.php');

//Check whether the session variable userID is present or not
if (!isset($_SESSION['user_name']))
{
    //Redirect to login page
    redirect_user('login.php');
}
//Check if the userID is empty
elseif (trim($_SESSION['user_name']) == "")
{
    //Redirect to login page
    redirect_user('login.php');
}
//Check for user activity time-out
/*else
{
    //Check if allowable time (15 minutes) has expired
    if ((time() - $_SESSION['lastActivity']) > 900)
    {
        redirect_user('logout.php');
    }
    //Otherwise, reset the activity to current time
    else
    {
        $_SESSION['lastActivity'] = time();
    }
}*/
?>