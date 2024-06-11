<?php
require('db_connect.php');
require('logincheck.php');
require('load-session-data.php');



if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $debug = false;
    
    $thread_id = $_GET['thread_id'];
    $uname = mysqli_real_escape_string($dbc, trim($_SESSION['user_name']));
    $cbody = mysqli_real_escape_string($dbc, trim($_POST['body']));


        //Add the new thread to the database:
        $q = "INSERT INTO comments (thread_id, user_name, body, post_date) VALUES ($thread_id, '$uname', '$cbody', NOW())";
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