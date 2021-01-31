<?php

error_reporting( ~E_DEPRECATED & ~E_NOTICE );


define ('DBHOST', '173.212.235.205');
define('DBUSER', 'schedler_portfolio');
define('DBPASS', 'soonto_beDeveloper!2020');
define ('DBNAME', 'schedler_portfolio');

$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);


if  ( !$conn ) {
 die("Connection failed : " . mysqli_error());
}


?>