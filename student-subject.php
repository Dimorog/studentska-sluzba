<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'db_connection.php';?>
    <meta charset="UTF-8">
    <title>Title</title>
    <script>
        function validateSubjectGrade() {
            var points = document.forms["student_subject"]["points"].value;
            var grade = "";
            switch(true){
                case(points>=1 && points<51):grade="F";break;
                case(points>=51 && points<60):grade="E";break;
                case(points>=60 && points<70):grade="D";break;
                case(points>=70 && points<80):grade="C";break;
                case(points>=80 && points<90):grade="B";break;
                case(points>=90 && points<=100):grade="A";break;
                default:alert("points must be between 1 and 100");break;
            }
            if(grade==""){
                return false;
            }else{
                document.getElementById('grade').value = grade;
                alert("Grade is "+grade);
                return true;
            }
        }


    </script>
</head>
<body>

<form method="post" name="student_subject" onsubmit="return validateSubjectGrade()">
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $student = $_POST['student'];
        $subject = $_POST['subject'];
        $points = $_POST['points'];
        $sql = "select * from student_subject where subject_id=".$subject." and student_id=".$student;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<p style='color:red; text-align:center; font-weight:bold;'>Student already has that subject</p>";
            return;
        }
        $sql = "insert into student_subject (subject_id, student_id, number_of_points) values (".$subject.", ".$student.", ".$points.")";
        if ($conn->query($sql) == true) {
            echo '<script type="text/javascript"> window.location = "subject-list.php"</script>';
        }else{
            echo $sql;
        }
    }

    ?>
    Student:<br>
    <select name="student">
    <?php
    $result = mysqli_query($conn,"SELECT * FROM student");
    while($row = mysqli_fetch_array($result)) {
        echo "<option value='".$row['id']."'>".$row['first_name']." ".$row['last_name']."</option>";
    }
    ?>
    </select><br>

    Subject:<br>
    <select name="subject">
    <?php
    $result = mysqli_query($conn,"SELECT * FROM subject");
    while($row = mysqli_fetch_array($result)) {
        echo "<option value='".$row['id']."'>".$row['name']."</option>";
    }
    ?>
    </select><br>

    Points:<br>
    <input type="text" name="points" id="points"><br>
    Grade:<br>
    <input type="text" name="grade" id="grade" disabled><br>


    <input type="submit" value="Submit">
</form>
</body>


</html>