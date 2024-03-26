<?php
//working with my sql
//extension used mysqli
//connect to db server
$server_name = 'localhost';
$server_user = 'root';
$server_password = '';

//establish connection
$connect = mysqli_connect($server_name,$server_user,$server_password);
if($connect){
    echo "Connection successful";
} else{
    //mysqli_connect_error()
    die(mysqli_connect_error());
}
//create a database
$sql = "CREATE DATABASE studypal";
//execute query mysqli_query()
$result = mysqli_query($connect,$sql);
if($result){
    echo "<br>";
    echo "Database created successfully";
} else {
    //mysqli_error()
    die(mysqli_error($connect));
}




?>