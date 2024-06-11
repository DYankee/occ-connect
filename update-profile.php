<?php
//Restrict access and redirect if necessary
require('php/logincheck.php');
require('php/db_connect.php');
require('php/load-session-data.php');

//Initialize error flag and error message
$error = false;
$errorMsg = "";

//Check if the form has been submitted:

?>

<!doctype html>
<html lang="en">
	<head>
<meta charset="utf-8">
<title>Update Profile</title>
<style>
.error {
	font-weight: bold;
	color: #C00;
}
</style>
</head>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Update Profile</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php include('components/navbar.php') ?> 
<p class="center"><img src=<?= $profilePic?> alt="profile pic" width="500"></p>
<h2 class="center">Welcome <?= $uname ?>!</h2>
<h2 class="center">Update your profile here!</h2>
<?php
//If there were upload errors
if ($error)
{
	echo "<p class=\"center error\">$errorMsg</p>";
}
?>

<div>
	<!-- change username-->
	<form action="php/update-username.php" method="post">
		<label for="user_name">user name</label>
		<input type="text" name="user_name" id="user_name" value="" size="15" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{4,15}$" title="userID must be between 4 and 15 characters, start with a letter, and contain only letters and numbers " maxlength="15" required>	
		

		<input type="reset" name="Reset" id="button" value="Reset">
		<input type="submit" value="Update">
	</form>
</div>

<div>
	<!-- add or change profile picture -->
	<form enctype="multipart/form-data" action="php/add-image.php" method="post">
		<h3 class="center">Select an optional GIF, JPEG, or PNG image of 2MB or smaller to be uploaded as your profile picture.</h3>
		<div class="center">
			<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
			<p>
				<label for="image">Choose an image file to upload:</label> 
				<input type="file" name="image" id="image">
			</p>
		</div>
		<div class="center">
			<input type="submit" name="submit" id="submit" value="upload">
		</div>
	</form>
</div>
</body>
</html>