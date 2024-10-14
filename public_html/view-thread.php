<?php
    require('php/db_connect.php');
    require('php/load-session-data.php');
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
<?php require('components/navbar.php')?>

<?php require('components/views/thread-view.php')?>
<br>
<?php require('components/forms/new-comment.php')?> 
<br>
<?php require('components/views/comment-view.php')?>
</body>
</html>