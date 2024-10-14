<?php
require('db_connect.php');
require('logincheck.php');
require('load-session-data.php');



if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $debug = false;
    
    $thread_id = $_GET['thread_id'];
    $cbody = mysqli_real_escape_string($dbc, trim($_POST['body']));
    $uid = mysqli_real_escape_string($dbc, trim($_SESSION['user_id']));


        //Add the new thread to the database:
        $q = "INSERT INTO comments (thread_id, body, post_date, user_id) 
            VALUES ($thread_id, '$cbody', NOW(), $uid)";
        $r = @mysqli_query($dbc, $q);

        if($debug){
            echo $thread_id . $uname . $cbody ;
        }
    //Close the database connection:
    $url = "../view-thread.php?thread_id=" . $thread_id;
    redirect_user($url);
}
$url2 = "components/forms/new-comment.php?thread_id=" . $_GET['thread_id'];
?>