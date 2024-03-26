<?php
include "connectdb3.0.php";
$username ='username';
$password = 'password';
$unsuccess = 0;

// Start the session
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admins WHERE username='$username'";
    $result = mysqli_query($connect, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        // Verify if the password matches the hashed password stored in the database
        if (password_verify($password, $user['password'])) {
            echo "Login successful";
            // Store user data in session
            $_SESSION['username'] = $username;
            
            // Redirect to Home page after successful login with a delay
            echo "<script>setTimeout(function() { window.location.href = 'home.html'; }, 3000);</script>";
            exit();
        } else {
            // Display error message for invalid login
            $unsuccess = 1;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .error {
            color: red;
            text-align:center;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Admin Login</h1>
        <form method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username:</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" placeholder="Enter Username" required>
                <div id="emailHelp" class="form-text">We'll never share your username with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password:</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Enter Password" required>
            </div>
            <?php
            if ($unsuccess) {
                echo "<div class='error'>Invalid login</div>";
            }
            ?>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        
</body>
</html>
