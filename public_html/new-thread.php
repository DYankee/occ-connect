<?php 
    require('php/logincheck.php');
    require('php/db_connect.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $debug = false;
    
    $uname = mysqli_real_escape_string($dbc, trim($_SESSION['user_name']));
    $tname = mysqli_real_escape_string($dbc, trim($_POST['thread_name']));
    $tbody = mysqli_real_escape_string($dbc, trim($_POST['body']));
    $forumName = mysqli_real_escape_string($dbc, trim($_POST['forum_name']));
    $res = mysqli_query($dbc, "SELECT forum_id FROM forums where forum_name = '$forumName'");
    $row = mysqli_fetch_array($res);
    $forumId = $row['forum_id'];
    $res2 = mysqli_query($dbc, "SELECT user_id from users where user_name = '$uname'");
    $row2 = mysqli_fetch_array($res2);
    $userid = $row2['user_id'];
        //Add the new thread to the database:
        $q = "INSERT INTO threads (forum_id, thread_name, body, post_date, user_id) VALUES ($forumId, '$tname', '$tbody', NOW(), $userid)";
        $r = @mysqli_query($dbc, $q);

        if($debug){
            echo $uname . $tname . $tbody . $forumName . $forumId;
        }
    //Close the database connection:
    mysqli_close($dbc);
    redirect_user("index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include('components/navbar.php') ?>
    <form action="new-thread.php" method="post">
        <p>
            <label for="forum_name">Select a forum to post to: </label>
            <select name="forum_name" id="forum_name">
                <?php
                    $result = mysqli_query($dbc, "SELECT forum_name FROM forums ORDER BY forum_name ASC");
                    while($row = mysqli_fetch_array($result)){
                        echo $row
                ?>
                        <option value='<?= $row['forum_name']; ?>'><?= $row['forum_name'];?></option>
                <?php 
                    }
                    mysqli_free_result($result);
                    mysqli_close($dbc); 
                ?>
            </select>
        </p>
        <p>
            <label for="thread_name">Thread name: </label>
            <input type="text" name="thread_name" id="thread_name" size='30' max='30'>
        <br>
            <label for="body">Thread content</label>
            <input type="text" name="body" id="body" size='100' max='3000'>
        <br>
            <input type="submit" value="Post">
            <input type="reset" value="Reset">
        </p>
    </form>
</body>
</html>
