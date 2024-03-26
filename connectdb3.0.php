<?php
$server ='localhost';
$user ='root';
$password ='';
$database ='studypal';
//connect to db
$connect = mysqli_connect($server, $user, $password, $database);
if (!$connect) {
die (mysqli_connect_error());
}

?>