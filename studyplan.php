<?php
$server ='localhost';
$user ='root';
$password ='';
$database ='studypal';

//initialize arrays
$planID = 'planID';
$studentID ='studentID';
$planname = 'planname';
$plandescription = 'plandescription';

//connect to db
$connect = mysqli_connect($server, $user, $password, $database);
if (!$connect) {
    die (mysqli_connect_error());
}

// Retrieve data from POST
$planID = $_POST['planID'];
$studentID = $_POST['studentID'];
$planname = $_POST['planname'];
$plandescription = $_POST['plandescription'];

// Insert query
$sql = "INSERT INTO studyplan (planID, studentID, planname, plandescription)
VALUES ('$planID', '$studentID', '$planname', '$plandescription')";

if (mysqli_query($connect, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Study Plan</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="header">
      <h1>StudyPal</h1>
    </div>
    <div class="navbar">
      <a href="home.html">Home</a>
      <a href="groups.php">Groups</a>
      <a href="studyplan.php">Study plan </a>
      <a href="reminders.html">Reminders</a>
      <a href="profile.php">Profile</a>
      <a href="logout.php">Log out</a>
    </div>
    <form action="insert.php" method="post">
        <label for="planID">Plan ID:</label><br>
        <input type="text" id="planID" name="planID"><br>
        <label for="studentID">Student ID:</label><br>
        <input type="text" id="studentID" name="studentID"><br>
        <label for="planname">Plan Name:</label><br>
        <input type="text" id="planname" name="planname"><br>
        <label for="plandescription">Plan Description:</label><br>
        <textarea id="plandescription" name="plandescription"></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
