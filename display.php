<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <style>
        body{
            text-align: center;
        }
        table,th,td{
            border:1px solid black;
            border-collapse:collapse;
            padding:8px;
        }
        table{
            margin:auto;
            width:50%
        }
        th{
            background-color:lightgrey;
        }
        
    </style>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Registered students</h1>
    <table>
        <tr>
            <th>Student ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Delete</th>
            <th>Update<th>
        </tr>
        <?php
       //read operation/select
       //connecting to db
       include 'connectdb3.0.php';
       $sql="SELECT * FROM student";
       //execute query
       $result= mysqli_query($connect,$sql);
       if($result){
        //display the data
        //mysqli_fetch_assoc()
       /* $students=mysqli_fetch_assoc($result);//creates an asssociative array for the data in the database
         echo $students['first_name'];
       }*/
       while ($student= mysqli_fetch_assoc($result)) {
        $studentID=$student['studentID'];
        $Name=$student['Name'];
        $username=$student['username'];
        $email=$student['email'];
       
        echo " <tr>
        <td>$studentID</td>
        <td>$Name</td>
        <td>$username</td>
        <td>$email</td>
        <td>
        <button>
         <a href=delete.php?studentID=$studentID'>Delete</a>
         </button>
         </td>
        <td>
        <button>
        <a href=update.php?studentID=$studentID'>Update</button></php
</tr>";
    }
       }
       //loops through row by row in the db hence displays the data present in all rows in the db
?>
    </table>
</body>
</html>