<?php

//Set database connection information
define('DB_HOST', 'localhost'); //Or could be a different server
define('DB_USER', 'zgeary'); //MySQL credentials
define('DB_PASSWORD', '23196Z'); //MySQL credentials 
define('DB_NAME', 'geary'); //Specific database

//Database connection
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
       OR die('Connection error');

//Set the encoding
mysqli_set_charset($dbc, 'utf8'); //Or whatever PHP script encoding and database collation you are using

?>