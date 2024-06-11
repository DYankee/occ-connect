<?php
session_start();
require('db_connect.php');
require('login_functions.php');
require('load-session-data.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

		//check for username update
	if (isset($_POST['user_name'])){
		$newname = mysqli_real_escape_string($dbc, $_POST['user_name']);
		$q = "UPDATE users SET user_name = '$newname' WHERE user_name = '$uname'";
		$r = @mysqli_query($dbc, $q);
		$_SESSION['user_name'] = $newname;
        redirect_user("../main.php");
	} //End of isset($_POST['user_name']) IF.

} //End of the POST If.
?>