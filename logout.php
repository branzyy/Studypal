<?php
// Start session
session_start();

// Destroy session
session_destroy();

// Redirect to login page after 3 seconds
header("refresh:3;url=login.php");

// Display logout message
echo "<p style='color:green;'>You have successfully logged out.</p>";
?>