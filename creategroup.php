<?php
// Include the database connection file
include 'connectdb3.0.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $groupname = $_POST['groupname'];
    $description = $_POST['description'];

    // Query to insert data into the database
    $sql = "INSERT INTO groups (groupname, description) VALUES ('$groupname', '$description')";
    // Execute the query
    $result = mysqli_query($connect, $sql);
    if ($result) {
        // Redirect back to groups.html with success message
        header("location: groups.php?message=Group created successfully");
        exit();
    } else {
        // Redirect back to groups.html with error message
        header("location: groups.html?message=Failed to create group");
        exit();
    }
}
?>
