<?php
// Include the database connection file
include 'connectdb3.0.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST['title'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $description = $_POST['description'];

    // Query to insert reminder data into the database
    $sql = "INSERT INTO reminders (title, date, time, description) VALUES ('$title', '$date', '$time', '$description')";
    
    // Execute the query
    $result = mysqli_query($connect, $sql);

    if ($result) {
        // Set a flag to display success message
        $success = true;
    } else {
        // If insertion fails, display an error message
        $error_message = "Error: " . mysqli_error($connect);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reminder Submission</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        .success-message {
            color: green;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>StudyPal</h1>
    </div>
    <div class="navbar">
        <a href="home.html">Home</a>
        <a href="groups.php">Groups</a>
        <a href="studyplan.php">Study plan</a>
        <a href="reminders.html">Reminders</a>
        <a href="profile.php">Profile</a>
        <a href="logout.php">Log out</a>
    </div>
    <div class="content">
        <h2>Set Reminders and Deadlines</h2>
        <form action="submit.php" method="post" id="reminderForm">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" required><br>
            <label for="date">Date:</label><br>
            <input type="date" id="date" name="date" required><br>
            <label for="time">Time:</label><br>
            <input type="time" id="time" name="time" required><br>
            <label for="description">Description:</label><br>
            <textarea id="description" name="description" required></textarea><br>
            <input type="submit" value="Set Reminder">
        </form>
        <p id="successMessage" class="success-message" style="display:none;">Reminder set successfully</p>
    </div>

    <script>
        // Check if the success message is set and display it
        <?php if (isset($success)): ?>
            document.getElementById('successMessage').style.display = 'block';
            // Redirect to home page after 3 seconds
            setTimeout(function(){
                window.location.href = 'home.html';
            }, 3000);
        <?php endif; ?>
    </script>
</body>
</html>
