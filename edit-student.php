<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'db_connection.php';?>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<script src="js-scripts.js"></script>
    <?php
    $id = $_REQUEST['id'];
    $sql = "SELECT * from student where id=".$id;
    $result = $conn->query($sql);
    $firstname;$lastname;$gender;$birthday;$course;$index;
    if($result->num_rows>0) {
        while ($row = $result->fetch_assoc()) {
            $firstname = $row['first_name'];
            $lastname = $row['last_name'];
            $index = $row['index_number'];
            $gender = $row['gender'];
            $birthday = $row['birthday'];
            $course = $row['course'];
        }
    }
    ?>
    <form method="post" name="edit_student" id="edit_student" onsubmit="return validateEditStudent()">
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "aaa";
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $gender = $_POST['gender'];
            $index = $_POST['index'];
            $birt_date = $_POST['birth_date'];
            $course = $_POST['course'];
            $sql = "UPDATE student SET index_number='".$index."',first_name='".$firstname."',last_name='".$lastname."',gender='".$gender."',birthday='".$birt_date."',course='".$course."' WHERE id=".$id;
            if ($conn->query($sql) == true) {
                echo '<script type="text/javascript"> window.location = "student-list.php"</script>';
            }
        }
        ?>
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