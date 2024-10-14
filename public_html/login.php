<?php 
    //Check if the form has been submitted:
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        //import required helper files:
        require('php/login_functions.php');
        require('php/db_connect.php');

        //Check the login:
        list($check, $data) = check_login($dbc, $_POST['user_name'], $_POST['passwd']);

        if($check){
            session_start();
            $_SESSION['user_name'] = $data['user_name'];
            $_SESSION['first_name'] = $data['first_name'];
            $_SESSION['last_login'] = $data['dayName'] . ", " . $data['month'] . " " . $data['day'] . ", " . $data['year'];
            $_SESSION['profile_pic'] = $data['profile_pic'];
            $_SESSION['user_id'] = $data['user_id'];
            
            //Update login information.
            $uid = $_SESSION['user_name'];
            $q = "UPDATE users SET last_login=NOW() WHERE user_name='$uid'";
            $r = @mysqli_query($dbc, $q);
            //redirect
            redirect_user('index.php');
        }
        else{
            //Assign $data to $errors for login_page.php:
            $errors = $data;
        }

        //Close the database connection.
        mysqli_close($dbc);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Login Page</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div>
    <?php
    //Print any error messages, if they exist:
    if (isset($errors) && !empty($errors))
    {
        echo "<h1>Error!</h1>";

        echo "<p>The following error(s) occurred:<br>";

        foreach ($errors as $msg)
        {
            echo " - $msg<br>\n";
        }

        echo "</p>";
        echo "<p>Please try again.</p>";
    }
    ?>

    <!-- Display the form -->
    <h1>Login</h1>
    <form action="login.php" method="post">
        <p>
            <label for="user_name">Username:</label>
            <input type="text" name="user_name" id="user_name" size="15" maxlength="15" autofocus>
        </p>
        <p>
            <label for="passwd">Password:</label>
            <input type="password" name="passwd" id="passwd" size="32" maxlength="32">
        </p>
        <p>
            <input type="submit" name="submit" value="Login">
        </p>
        <p>Not a member? <a href="register.php" title="Register for the forum!">Register today!</a></p>
    </form>
</div>
</body>
</html>