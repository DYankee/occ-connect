<?php
    require('php/db_connect.php');
    require('php/load-session-data.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OCConnect</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require('components/navbar.php')?>
    <div id="forum-view-controls">
        <?php require('components/forms/forum-view-control.php')?>
    </div>

    <div id="forum-view">
        <?php require('components/views/forum-view.php')?>
    </div> 
</body>
</html>
<?php 
    mysqli_close($dbc);
?>