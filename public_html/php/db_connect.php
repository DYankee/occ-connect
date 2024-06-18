<?php

//Set database connection information
define('DB_HOST', 'mysql'); //Or could be a different server
define('DB_USER', 'root'); //MySQL credentials
define('DB_PASSWORD', '1019'); //MySQL credentials 
define('DB_NAME', 'geary'); //Specific database


//Database connection
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
       OR die('Connection error');

//Set the encoding
mysqli_set_charset($dbc, 'utf8'); //Or whatever PHP script encoding and database collation you are using

?>