<?php
//detete operation
include 'connectdb3.0.php';//establish connection to db
$studentID=$_GET['studentID'];
$sql ="DELETE FROM student WHERE studentID=$studentID";
//execute query
$result = mysqli_query($connect,$sql);
if($result){
    header("location:display.php");
    //echo "Deleted successfully";
} else {
    die(mysqli_error($connect));
}


?>
