<!DOCTYPE html>
<html>
<head>
    <title>StudyPal</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
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
    <h1>Study Groups</h1>
    <p>Here are some study groups you might be interested in:</p>
    <!-- Display existing groups with their details -->
    <div class="study-groups">
        <?php
        // Include the database connection file
        include 'connectdb3.0.php';

        // Query to fetch existing groups from the database
        $query = "SELECT * FROM groups";
        $result = mysqli_query($connect, $query);

        // Check if any groups exist
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Display group details
                echo "<div class='group'>";
                echo "<h3>" . $row['groupname'] . "</h3>";
                echo "<p>Description: " . $row['description'] . "</p>";
                // Add a button to join the group
                echo "<form action='joingroup.php' method='post'>";
                echo "<input type='hidden' name='groupId' value='" . $row['groupID'] . "'>";
                echo "<input type='submit' value='Join'>";
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo "<p>No study groups available.</p>";
        }
        ?>
    </div>
    <hr>
    <!-- Form to create a new group -->
    <div class="create-group">
        <h2>Create New Group</h2>
        <!-- Form to create a new group -->
        <form action="creategroup.php" method="post">
            <label for="groupname">Group Name:</label><br>
            <input type="text" id="groupname" name="groupname" placeholder="Enter Group Name" required><br>
            <label for="description">Description:</label><br>
            <input type="text"id="description" name="description" rows="4" placeholder="Enter Group Description" required></textarea><br>
            <input type="submit" value="Create Group">
        </form>
    </div>
    <!-- Display message indicating successful group creation -->
    <?php if(isset($_GET['message'])): ?>
        <div class="message">
            <?php echo $_GET['message']; ?>
        </div>
    <?php endif; ?>
</body>
</html>
