<?php

//Set database connection information
define('DB_HOST', "mysql"); //Or could be a different server
define('DB_USER',     $_ENV["MYSQL_USER"]); //MySQL credentials
define('DB_PASSWORD', $_ENV["MYSQL_PASSWORD"]); //MySQL credentials 
define('DB_NAME',     $_ENV["MYSQL_DATABASE"]); //Specific database


//Database connection
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME,)
       OR die('Connection error');

//Set the encoding
mysqli_set_charset($dbc, 'utf8'); //Or whatever PHP script encoding and database collation you are using

?>