function checkPasswd()
{
    //Store the password field objects into variables
    var passwd1 = document.getElementById("userPasswd");
    var passwd2 = document.getElementById("userPasswd2");
	
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