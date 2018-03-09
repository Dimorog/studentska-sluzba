<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'db_connection.php';?>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

        <?php
        if(isset($_SESSION["user_id"])){
            echo $_SESSION['username'];
            echo '<a href="logout.php">LOGOUT</a>';
        }else{
            echo '<a href="login.php">LOGIN</a>';
        }
        ?>
        <h1>Student service</h1>
        <a href="add-student.php"><h3>Add Student</h3></a>
        <a href="edit-student.php"><h3>Edit Student</h3></a>
        <a href="student-subject.php"><h3>Student Subject</h3></a>
        <a href="student-list.php"><h3>Show Students</h3></a><br><br>

        <a href="add-professor.php"><h3>Add Professor</h3></a>
        <a href="edit-professor.php"><h3>Edit Professor</h3></a>
        <a href="professor-list.php"><h3>Show Professors</h3></a><br><br>

        <a href="add-subject.php"><h3>Add subject</h3></a>
        <a href="edit-subject.php"><h3>Edit subject</h3></a>
        <a href="subject-list.php"><h3>Show subjects</h3></a><br>

        <a href="add-user.php"><h3>Add user</h3></a>
        <a href="edit-user.php"><h3>Edit user</h3></a>
        <a href="user-list.php"><h3>Show users</h3></a><br>

        <a href="login.php">LOGIN</a>


</body>
</html>