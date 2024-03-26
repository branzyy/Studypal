<?php
// Update operation
// Connect to the database
include 'connectdb3.0.php';

// Initialize variables with default values
$name = 'name';
$username = 'username';
$email = 'email';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pick the data the user entered
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Get the student ID from the form or query string
    $studentID = $_POST['studentID'] ?? $_GET['studentID'] ?? null;

    if ($studentID) {
        // Query to update user data
        $sql = "UPDATE student SET name='$name', username='$username', email='$email' WHERE studentID=$studentID";

        // Execute query
        $result = mysqli_query($connect, $sql);
        if ($result) {
            // Success message with redirection after 3 seconds
            echo "<script>alert('Details updated Successfully'); setTimeout(function() { window.location.href = 'profile.php'; }, 3000);</script>";
            exit; // Terminate script execution after displaying the message
        } else {
            die(mysqli_error($connect));
        }
    }
} elseif (isset($_GET['studentID'])) {
    // Fetch existing details if studentID is provided in URL
    $studentID = $_GET['studentID'];
    $mysql = "SELECT * FROM student WHERE studentID=$studentID";
    $result = mysqli_query($connect, $mysql);

    if ($result && mysqli_num_rows($result) > 0) {
        $record = mysqli_fetch_assoc($result); // The data in the database is fetched as an associative array
        // Assign fetched values to variables
        $name = $record['name'];
        $username = $record['username'];
        $email = $record['email'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Update Student Details</h1>
    <form action="" method="post">
        <!-- Hidden input field to carry the studentID -->
        <input type="hidden" name="studentID" value="<?php echo $_GET['studentID'] ?? ''; ?>">
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter name" required value="<?php echo $name; ?>"><br>
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Enter username" value="<?php echo $username; ?>"><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter email" value="<?php echo $email; ?>"><br>
        
        <input type="submit" name="Register" value="Update">
    </form>
</body>
</html>
