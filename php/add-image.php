<?php
require('db_connect.php');
require('logincheck.php');
require('load-session-data.php');

if (isset($_FILES['image']))
{
    //Build array of allowable MIME types
    $allowed = ['image/gif', 'image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png'];
    
    //Validate the type. Should be GIF, JPEG, or PNG.
    if (in_array($_FILES['image']['type'], $allowed))
    {
        // Move the file over.
        $filename = "../data/profile-pictures/" . $_SESSION['user_name'] . "_profile-pic.png";
        $filename2 = "data/profile-pictures/" . $_SESSION['user_name'] . "_profile-pic.png";
        if (move_uploaded_file($_FILES['image']['tmp_name'], $filename))
        {
            //Save image filename in session data:
            $_SESSION['image'] = $_FILES['image']['name'];
            
            //add file to users table
            @mysqli_query($dbc, "UPDATE users SET profile_pic = '$filename2' WHERE user_name = '$uname'");

            //add file path to session data
            $_SESSION['profile_pic'] = $filename2;#
            //Redirect user back to profile info page:
            redirect_user('../update-profile.php');
        } // End of move IF.
    }
    else //Invalid type.
    { 
        //Set error flag
        $error = true;
        
        $errorMsg = "Please upload a GIF, JPEG, or PNG image.<br>";
    }
    
    //Check for an error:
        if ($_FILES['image']['error'] > 0)
        {
            //Set error flag
            $error = true;
            
            $errorMsg .= "The file could not be uploaded because: <strong>";
            // Print a message based upon the error.
            switch ($_FILES['image']['error']) {
                case 1:
                    $errorMsg .= "The file exceeds the upload_max_filesize setting in php.ini.";
                    break;
                    case 2:
            $errorMsg .= "The file exceeds the MAX_FILE_SIZE setting in the HTML form.";
            break;
        case 3:
            $errorMsg .= "The file was only partially uploaded.";
            break;
        case 4: //No file was uploaded
            //Set the filename in session data to NULL:
            $_SESSION['image'] = "";
            
            //Redirect user to next page for remainder of movie info:
            redirect_user('../update-profile.php');
            break;	
        case 6:
            $errorMsg .= "No temporary folder was available.";
            break;
        case 7:
            $errorMsg .= "Unable to write to the disk.";
            break;
        case 8:
            $errorMsg .= "File upload stopped.";
            break;
        default:
            $errorMsg .= "A system error occurred.";
            break;
        } // End of switch.
        $errorMsg .= "</strong>";
    
        } // End of error IF.

    // Delete the file if it still exists:
    if (file_exists($_FILES['image']['tmp_name']) && is_file($_FILES['image']['tmp_name']))
    {
        unlink($_FILES['image']['tmp_name']);
    }
} //End of isset($_FILES['image']) IF.
?>