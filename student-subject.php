<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'db_connection.php';?>
    <meta charset="UTF-8">
    <title>Title</title>
    <script>
        /*
         *Function validate subject grade
         *@params - none
         * @return boolean
         */
        function validateSubjectGrade() {
            var points = document.forms["student_subject"]["points"].value;
            if(points>=1 && points<=100){
                return true;
            }else{
                alert("points must be between 1 and 100");
                return false;
            }
        }
    </script>
</head>
<body>
Student Grades
<table width="100%" border="1px">
    <thead>
        <tr>
            <th>Index</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Birth date</th>
            <th>Course</th>
            <th>Points(Grade)</th>
        </tr>
    </thead>
    <tbody>
        <?php
        /*
         *Select and display students and number of points from subjects that the logged in professor is teaching.
         */
        $pid = $_SESSION['professor_id'];
        $sql = "select s.*, ss.number_of_points from student s, student_subject ss where ss.number_of_points IS NOT NULL and ss.student_id=s.id and ss.subject_id = (select subject_id from professor where id = '$pid')";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['index_number'] . "</td>";
            echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['birthday'] . "</td>";
            echo "<td>" . $row['course'] . "</td>";
            $grade;
            $points = $row['number_of_points'];
            switch (true){
                case ($points >= 51 && $points<60):$grade="E";break;
                case ($points >= 60 && $points<70):$grade="D";break;
                case ($points >= 70 && $points<80):$grade="C";break;
                case ($points >= 80 && $points<90):$grade="B";break;
                case ($points >= 90 && $points<=100):$grade="A";break;
                default:$grade="F";break;
            }
            echo "<td>" . $points . "(" . $grade . ")</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<form method="post" name="student_subject" onsubmit="return validateSubjectGrade()">
    <?php
    /*
     *If number of points is valid update student_subject table with student id from form.
     */
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $student = $_POST['student'];
        $points = $_POST['points'];
        switch (true){
            case ($points >= 51 && $points<60):$grade="E";break;
            case ($points >= 60 && $points<70):$grade="D";break;
            case ($points >= 70 && $points<80):$grade="C";break;
            case ($points >= 80 && $points<90):$grade="B";break;
            case ($points >= 90 && $points<=100):$grade="A";break;
            default:$grade="F";break;
        }
        $sql = "UPDATE student_subject set number_of_points = '$points', grade = '$grade' where student_id='$student' and subject_id = (select subject_id from professor where id = '$pid')";
        if ($conn->query($sql) == true) {
            echo '<script type="text/javascript"> window.location = "student-subject.php"</script>';
        }else{
            $sql;
        }
    }
    ?>
    Student:<br>
    <select name="student">
        <?php
        /*
         *Select students that are enrolled in subject but are not graded yet
         */
        $sql = "select s.* from student s, student_subject ss where ss.student_id = s.id and ss.number_of_points IS NULL and ss.subject_id = (select subject_id from professor where id = '$pid') group by s.id";
        $result = $conn->query($sql);
        if($result->num_rows>0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='".$row['id']."'>".$row['first_name']." ".$row['last_name']."</option>";
            }
        }
        ?>
    </select><br>

    Points:<br>
    <input type="text" name="points" id="points"><br>

    <input type="submit" value="Submit">
</form>
</body>


</html>