<?php
// Include the database connection file
include 'connectdb3.0.php';

// Check if form is submitted and if the required fields are set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['groupID']) && isset($_POST['groupname'])) {
    // Retrieve group ID and group name from the form
    $groupID = $_POST['groupID'];
    $groupname = $_POST['groupname'];

    // You might want to retrieve the logged-in user's ID from session or elsewhere
    // For this example, let's assume the user ID is 1
    $userId = 1;

    // Query to check if the user is already a member of the group
    $check_query = "SELECT * FROM groups WHERE groupID='$groupID'";
    
    // Execute the query
    $check_result = mysqli_query($connect, $check_query);
    
    // Check if query execution was successful
    if ($check_result) {
        // Check if there are any rows returned
        if (mysqli_num_rows($check_result) > 0) {
            // User is already a member of the group
            echo "You are already a member of this group.";
        } else {
            // Query to insert user into the group
            $insert_query = "INSERT INTO groups (groupID, groupname) VALUES ('$groupID', '$groupname')";
            
            // Execute the insertion query
            $insert_result = mysqli_query($connect, $insert_query);
            
            // Check if insertion was successful
            if ($insert_result) {
                // User added to the group successfully
                echo "You have joined the group successfully.";
            } else {
                // Failed to join the group
                echo "Failed to join the group. Please try again.";
            }
        }
    } else {
        // Display error message if query execution failed
        echo "Error: " . mysqli_error($connect);
    }
}
?>
