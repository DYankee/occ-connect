<?php
//This page processes the login form submission.

//Need helper functions file:
require('login_functions.php');

//Connect to the database:
require('mysqli_connect.php');

//Check the login:
list($check, $data) = check_login($dbc, $_POST['userID'], $_POST['passwd']);

if ($check) //User was validated.
{ 
    //Set the session data:
    session_start();
    $_SESSION['userID'] = $data['userID'];
    $_SESSION['firstName'] = $data['firstName'];
    $_SESSION['lastLogin'] = $data['dayName'] . ", ". $data['month'] . " " . $data['day'] . ", " . $data['year'];

    //Update login information.
    $uid = $_SESSION['userID'];
    $q = "UPDATE userTable SET lastLogin = NOW() WHERE userID = '$uid'";
    $r = @mysqli_query($dbc, $q);

    //Redirect:
    redirect_user('main.php');
}
else //Unsuccessful login!
{
    //Redirect:
    redirect_user('loginerror.html');
}

//Close the database connection.
mysqli_close($dbc);
?>
