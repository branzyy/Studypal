<?php
        incluude 'connectdb3.0.php';
        $connect = mysqli_connect($server_name,$server_user,$server_password);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT groupID, groupname FROM groups";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo '<option value="' . $row["groupID"] . '">' . $row["groupname"] . '</option>';
          }
        }
        $conn->close();
      ?>




<!DOCTYPE html>
<html>
<head>
  <title>Register Student</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1>Register Student</h1>
  <form method="post" action="insert-student.php">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <label for="groupID">Group:</label>
    <select id="groupID" name="groupID" required>
      <option value="">Select Group</option>
      
    </select>
    <button type="submit" name="register">Register</button>
  </form>
</body>
</html>