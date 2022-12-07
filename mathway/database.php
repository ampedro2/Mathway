<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'usr72');
define('DB_PASSWORD', 'XpR3DbFs');
define('DB_NAME', 'usr72');
 
$ms = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
if($ms === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>