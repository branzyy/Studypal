<?php
// Database connection
$servername = "localhost";
$username = "username";
$password = " ";
$database = "studypal";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$planID = $_POST['planID'];
$studentID = $_POST['studentID'];
$planname = $_POST['planname'];
$plandescription = $_POST['plan_description'];

// Insert query
$sql = "INSERT INTO studyplan (planID, planname, studentID, plandescription)
VALUES ('$planid',  '$studentid','$planname', '$plandescription')";

if ($conn->query($sql) === TRUE) {
    echo "New plan created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>