<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'db_connection.php';?>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<script src="js-scripts.js"></script>
    <form method="post" name="add_student" onsubmit="return validateAddStudent();">
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $gender = $_POST['gender'];
            $index = $_POST['index'];
            $birt_date = $_POST['birth_date'];
            $course = $_POST['course'];
            $sql = "INSERT INTO student(index_number, first_name, last_name, gender, birthday, course) VALUES ('$index', '$firstname', '$lastname', '$gender', '$birt_date', '$course')";
            if ($conn->query($sql) == true) {
                echo '<script type="text/javascript"> window.location = "student-list.php"</script>';
            }
        }
        ?>
        First name:<br>
        <input type="text" name="firstname" id="firstname"><br>

        Last name:<br>
        <input type="text" name="lastname" id="lastname" ><br>

        Gender: <br>
        <input type="radio" name="gender"  id="gender_male"  value="male" checked> Male<br>
        <input type="radio" name="gender"  id="gender_female"  value="female"> Female<br>

        Index:<br>
        <input type="text" name="index" id="index" ><br>

        Birth-date:<br>
        <input type="date" name="birth_date"  id="birth_date"  ><br>

       Course:<br>
        <input type="text" name="course" id="course" ><br><br>

        <input type="submit" value="Submit">
    </form>

</body>
</html>