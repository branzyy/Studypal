<?php
// Include the database connection file
include 'connectdb3.0.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query to check if the username already exists
    $check_query = "SELECT * FROM student WHERE username='$username'";
    $check_result = mysqli_query($connect, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        echo "Username already exists. Please choose a different username."; 
    } else {
        // Prepare and bind the INSERT statement
        $stmt = $connect->prepare("INSERT INTO student (name, username, password, email) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $username, $hashed_password, $email);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Registered successfully";
            echo "<script>setTimeout(function() { window.location.href = 'home.html'; }, 3000);</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
        // Close statement
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
     <style>
       body {
        text-align: center;
         }
     </style>
 <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Register</h1>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" placeholder="Enter your name" required><br>
        
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" placeholder="Enter your username" required><br>

        <label for="email">Email:</label>
        <input type="text" name="email" id="email" placeholder="Enter your email" required><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Enter your password" required><br>

        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
        <br>

        <input type="submit" value="Register">
    </form>
    
</body>
</html>