<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'db_connection.php';?>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<script src="validation-student.js"></script>
        <?php

        /*
         * Gets the selected students existing user/student table data
         * and presents them in the edit forms input fields for further
         * editing
         */

        $id = $_REQUEST['id'];
        $sql = "SELECT s.*, u.* from student s, users u where s.id = u.student_id and s.id=".$id;
        $result = $conn->query($sql);
        $firstname;$lastname;$gender;$birthday;$course;$index;$username;$password;$email;
        if($result->num_rows>0) {
            while ($row = $result->fetch_assoc()) {
                $firstname = $row['first_name'];
                $lastname = $row['last_name'];
                $index = $row['index_number'];
                $gender = $row['gender'];
                $birthday = $row['birthday'];
                $course = $row['course'];
                $username = $row['username'];
                $password = $row['password'];
                $email = $row['email'];
            }
        }
        ?>
    <form method="post" name="edit_student" id="edit_student" onsubmit="return validateEditStudent()">
        <?php

        /*
         * Takes the changed input field data and updates the database data
         * for student/user records accordingly
         */

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "aaa";
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $gender = $_POST['gender'];
            $index = $_POST['index'];
            $birt_date = $_POST['birth_date'];
            $course = $_POST['course'];
            $sql = "UPDATE student SET index_number='".$index."',first_name='".$firstname."',last_name='".$lastname."',gender='".$gender."',birthday='".$birt_date."',course='".$course."' WHERE id=".$id;
            if ($conn->query($sql) == false) {
                echo $sql;
            }
            $email =$_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sql = "UPDATE users SET email='$email', username='$username', password='$password' where student_id=".$id;
            if ($conn->query($sql) == true) {
                echo '<script type="text/javascript"> window.location = "student-list.php"</script>';
            }else{
                echo $sql;
            }
        }
        ?>
        Email:<br>
        <input type="text" name="email"  value="<?php echo $email ?>"><br>

        Username:<br>
        <input type="text" name="username"  value="<?php echo $username ?>"><br>

        Password:<br>
        <input type="password" name="password"  value="<?php echo $password ?>"><br>

        First name:<br>
        <input type="text" name="firstname"  id="firstname" value="<?php echo $firstname ?>"><br>

        Last name:<br>
        <input type="text" name="lastname"  id="lastname" value="<?php echo $lastname ?>"><br>

        Gender: <br>

        <?php if($gender == "male") {
            echo "<input type='radio' name='gender' id='gender_male' value='male' checked> Male<br>";
            echo "<input type='radio' name='gender' id='gender_male' value='female' > Female<br>";
        }else{
            echo "<input type='radio' name='gender' id='gender_male' value='male'> Male<br>";
            echo "<input type='radio' name='gender' id='gender_male' value='female' checked> Female<br>";
        } ?>


        Index:<br>
        <input type="text" name="index"  id="index" value="<?php echo $index?>"><br>

        Birth-date:<br>
        <input type="date" name="birth_date"   id="birth_date" value="<?php echo $birthday?>"><br>

        Course:<br>
        <input type="text" name="course"  id="course" value="<?php echo $course?>"><br><br>

        <input type="submit" value="Submit">
    </form>

</body>
</html>