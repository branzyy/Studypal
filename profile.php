<?php
// Include the database connection file
include 'connectdb3.0.php';

// Initialize variables with default values
$name = '';
$username = '';
$email = '';

// Check if the user is logged in (assuming you have session management implemented)
session_start();
if (!isset($_SESSION['username'])) {
    // Redirect the user to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Fetch user data based on the logged-in username
$username = $_SESSION['username'];
$sql = "SELECT * FROM student WHERE username = '$username'";
$result = mysqli_query($connect, $sql);

// Check if the query executed successfully and fetched a row
if ($result && mysqli_num_rows($result) > 0) {
    // Fetch the user data
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $username = $row['username'];
    $email = $row['email'];
    // You can fetch other user details similarly
} else {
    // Handle the case where no user data is found
    echo "User data not found.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Include any CSS files or stylesheets here -->
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
    <div>
        <div class="user-info">
            <h2>User Information</h2>
            <!-- Display user information fetched from the database -->
            <p><strong>Name:</strong> <?php echo $name; ?></p>
            <p><strong>Username:</strong> <?php echo $username; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <!-- You can display other user details here -->
        </div>
        <!-- You can include more sections for additional user profile details -->
    </div>
</body>
</html>
