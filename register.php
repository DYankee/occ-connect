<?php
//Start session
session_start();

//Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
        //import required helper files:
        require('php/login_functions.php');
        require('php/db_connect.php');

    //Read the posted data from the form into local variables:
    $uid = mysqli_real_escape_string($dbc, trim($_POST['user_name']));
    $passwd = mysqli_real_escape_string($dbc, $_POST['user_passwd']);
    $fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
    $ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
    $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
    

    //New user has no "last login"
    $login = NULL;    

    //Set the session data:
    $_SESSION['user_id'] = $uid;
    $_SESSION['first_name'] = $fn;
    $_SESSION['last_login'] = $login;
    $_SESSION['last_activity'] = time();

    //Add the new user to the database:
    $q = "INSERT INTO users (user_name, last_name, first_name, date_joined, user_passwd, email) VALUES ('$uid', '$ln', '$fn', NOW(), SHA1('$passwd'), '$email')";
    $r = @mysqli_query($dbc, $q);

    //Close the database connection:
    mysqli_close($dbc);

    //Redirect:
    redirect_user('login.php');
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registration Form</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<!--JavaScript code to verify the two password fields match -->
<!--JavaScript code to verify the two password fields match -->
<script type="text/javascript">
function checkPasswd()
{
    //Store the password field objects into variables
    var passwd1 = document.getElementById("user_passwd");
    var passwd2 = document.getElementById("user_passwd2");

    //Store the Confimation Message Object
    var message = document.getElementById("confirmMessage");

    //Set the colors we will be using
    var goodColor = "#66cc66";
    var badColor = "#ff6666";

    //Compare the values in the password field 
    //and the confirmation field
    if (passwd1.value == passwd2.value) //The passwords match 
    {
        //Set the color to the good color and
        //inform the user that they have entered the correct password 
        passwd2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords match!"
    }
    else //The passwords do not match
    {
        //Set the color to the bad color and
        //notify the user
        passwd2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords must match!"
    }
}
</script>
</head>

<body>
<div class="center">
  <p><img src="data/img/occ-logo.jpg" width="600" height="600" alt="logo"></p>
</div>
<div class="middle">
  <p>Please fill out the following form to register for the site. <br> User ID must be between 4 and 15 characters, start with a letter and contain only letters and numbers. <br>The password must be between 6 and 12 characters, and include at least 1 upper case letter, 1 lowercase letter, 1 number and 1 of the special characters ! @ # $ & *. All fields are required.</p>
</div>
<form action="register.php" method="post">
  <table>
    <tbody>
      <tr>
        <td class="right">
          <label for="user_name">User ID:</label>
        </td>
        <td class="left">
          <input type="text" name="user_name" id="user_name" value="" size="15" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{4,15}$" title="userID must be between 4 and 15 characters, start with a letter, and contain only letters and numbers " maxlength="15" required autofocus>
        </td>
      </tr>
      
      <tr>
        <td class="right">
          <label for="user_passwd">User Password:</label>
        </td>
        <td class="left">
          <input type="password" name="user_passwd" id="user_passwd" value="" size="12" pattern="^(?=.*[A-Z])(?=.*[a-z]).{6,12}$" title="The password must be between 6 and 12 characters, and include at least 1 upper case letter, 1 lowercase letter, 1 number and 1 of the special characters ! @ # $ & *" maxlength="12" required>
        </td>
      </tr>
      
      <tr>
        <td class="right">
          <label for="user_passwd2">Re-enter User Password:</label>
        </td>
        <td class="left">
          <input type="password" name="user_passwd2" id="user_passwd2" value="" size="12" min="6" maxlength="12" required onkeyup="checkPasswd(); return false;">
          <span id="confirmMessage" class="confirmMessage"></span>
        </td>
      </tr>
      
      <tr>
        <td class="right">
          <label for="first_name">First Name:</label>
        </td>
        <td class="left">
          <input type="text" name="first_name" id="first_name" value="" size="10" maxlength="10" required>
        </td>
      </tr>
      
      <tr>
        <td class="right">
          <label for="last_name">Last Name:</label>
        </td>
        <td class="left">
          <input type="text" name="last_name" id="last_name" value="" size="15" maxlength="15" pattern=".{3,15}" required>
        </td>
      </tr>

      <tr>
        <td class="right">
          <label for="email">Email:</label>
        </td>
        <td class="left">
          <input type="text" name="email" id="email" value="" size="30" maxlength="40" pattern=".{3,15}" required>
        </td>
      </tr>
     
      <tr>
        <td class="right">
          <input type="reset" name="Reset" id="button" value="Reset">
        </td>
        <td class="left">
          <input type="submit" value="Register">
        </td>
      </tr>
    </tbody>
  </table>
</form>
</body>
</html>