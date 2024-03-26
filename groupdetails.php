<?php
include 'connectdb3.0.php';

$studentID= $_POST['studentID'];
$name = $_POST['name'];
$email =$_POST['email'];

$connect = mysqli_connect($server_name,$server_user,$server_password);

$query = "INSERT INTO groupmembers (studentID, name,email) VALUES ($studentID,$name,$email)";
$stmt = $conn->prepare($query);
$stmt->bind_param( $studentID,$name,$email);

if ($stmt->execute()) {
  header("Location: groupdetails.php?id=$studentID");
  exit;
} else {
  echo "Error: " . $query . "<br>" . $conn->error;
}

$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
  <title>Group Details</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1><?php echo $group['name']; ?></h1>
  <p><?php echo $group['description']; ?></p>

  <h2>Students in group:</h2>
  <ul>
    <?php foreach ($students as $student): ?>
      <li><?php echo $student['name']; ?></li>
    <?php endforeach; ?>
  </ul>

  <h2>Add student:</h2>
  <form method="post" action="add_student.php">
    <label for="student_id">Student ID:</label>
    <input type="number" id="student_id" name="student_id" required>
    <input type="hidden" name="group_id" value="<?php echo $group['id']; ?>">
    <button type="submit">Add Student</button>
  </form>

  <h2>Remove student:</h2>
  <form method="post" action="remove_student.php">
    <select name="student_id" id="student_id" required>
      <option value="">Select student</option>
      <?php foreach ($students as $student): ?>
        <option value="<?php echo $student['id']; ?>"><?php echo $student['name']; ?></option>
      <?php endforeach; ?>
    </select>
    <input type="hidden" name="group_id" value="<?php echo $group['id']; ?>">
    <button type="submit">Remove Student</button>
  </form>

  <button onclick="window.location.href='admin.php';">Back to Admin Page</button>
</body>
</html>