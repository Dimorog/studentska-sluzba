<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'db_connection.php'; ?>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<a href="/index.php">HOMEPAGE</a>
<br><br>

<script src="js-scripts.js"></script>
<form method="post" name="add_student" onsubmit="return validateAddStudent()">
    <?php

    /**
     *Gets the form data and checks to see if the given index-number matches an existing one in the database
     * and if it doesn't it proceeds with adding the user to the database, otherwise it
     * will give a warning that index number is already assigned to another student
     */
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $index = $_POST['index'];
        $birt_date = $_POST['birth_date'];
        $course = $_POST['course'];
        $sql = "Select * from student where index_number='$index'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<p style='color:red; text-align:center; font-weight:bold;'>Students can't have the same index</p>";
            return;
        }

        /**
         * Gets the form data and checks to see if the given email address matches an existing one in the database
         * and if it doesn't it proceeds with adding the user to the database, otherwise it
         * will give a warning that email address is already in use
         */
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "Select * from users where email = '$email' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<p style='color:red; text-align:center; font-weight:bold;'>User already exists</p>";
            return;
        }

        /**
         * Inserts form data into relevant tables, in this case adds the students data to student table
         * and his register credentials to the user table.Finally it will redirect back to the students list.
         */
        $sql = "INSERT INTO student(index_number, first_name, last_name, gender, birthday, course) VALUES ('$index', '$firstname', '$lastname', '$gender', '$birt_date', '$course')";
        if ($conn->query($sql) == false) {
            return $sql;
        }
        $sql = "Select * from student where index_number='$index'";
        $result = $conn->query($sql);
        if ($row = $result->fetch_assoc()) {
            $student = $row['id'];
        }
        $sql = "INSERT INTO users( username, email, password, is_admin, student_id, professor_id) VALUES ('$username', '$email', '$password', 0, $student, 0)";
        if ($conn->query($sql) == true) {
            echo '<script type="text/javascript"> window.location = "student-list.php"</script>';
        } else {
            echo $sql;
        }
    }
    ?>
    <div>
        <label>Email</label><br>
        <input type="text" name="email" placeholder="Enter email">
    </div>
    <div>
        <label>Username</label><br>
        <input type="text" name="username" placeholder="Enter username">
    </div>
    <div>
        <label>Password</label><br>
        <input type="password" name="password" placeholder="Enter password">
    </div>
    <div class="form-group">
        <label>First Name</label><br>
        <input type="text" name="firstname" placeholder="Enter firstname">
    </div>
    <div>
        <label>Last Name</label><br>
        <input type="text" name="lastname" placeholder="Enter lastname">
    </div>
    <div><label>Gender</label><br>
        <div>
            <input type="radio" name="gender" id="gender_male" value="male" checked> Male<br>
        </div>
        <div class="form-check">
            <input type="radio" name="gender" id="gender_female" value="female"> Female<br>
        </div>
    </div>
    <div>
        <label>Index</label><br>
        <input type="text" name="index" placeholder="Enter index">
    </div>
    <div>
        <label>Birth date</label><br>
        <input type="date" name="birth_date" placeholder="Enter birth date">
    </div>
    <div class="form-group">
        <label>Course</label><br>
        <input type="text" name="course" placeholder="Enter course">
    </div>
    <button type="submit">Submit</button>
</form>

</body>
</html>