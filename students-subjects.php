<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'db_connection.php'; ?>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<style>
    table, th, td {
        border: 1px solid black;
        text-align: center;
    }
</style>
<body>
My Subjects
<table width="100%">
    <thead>
    <tr>
        <th>Name</th>
        <th>Professor</th>
        <th>Semester</th>
        <th>ECDL credits</th>
        <th>Description</th>
        <th>Points(Grade)</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sid = $_SESSION['student_id'];
    $sql = "SELECT s.*, ss.number_of_points, p.first_name, p.last_name FROM subject s, student_subject ss, professor p where p.subject_id = s.id and s.id = ss.subject_id and ss.student_id = '$sid' and s.id in (SELECT subject_id from student_subject where student_id = '$sid') group by s.id";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
        echo "<td>" . $row['semester'] . "</td>";
        echo "<td>" . $row['ecdl_credits'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        $grade="";
        $points = $row['number_of_points'];
        switch (true){
            case ($points >= 51 && $points<60):$grade="E";break;
            case ($points >= 60 && $points<70):$grade="D";break;
            case ($points >= 70 && $points<80):$grade="C";break;
            case ($points >= 80 && $points<90):$grade="B";break;
            case ($points >= 90 && $points<=100):$grade="A";break;
            default:$grade="F";break;
        }
        if($points==0){
            echo "<td> Not Graded</td>";
        }else{
            echo "<td>" . $points . "(" . $grade . ")</td>";
        }
        echo "</tr>";
    }
    ?>
    </tbody>
</table>
<br>
Subjects
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Professor</th>
        <th>Semester</th>
        <th>ECDL credits</th>
        <th>Description</th>
        <th>Enroll</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sid = $_SESSION['student_id'];
    $sql = "SELECT s.*, p.first_name, p.last_name  FROM subject s, professor p where s.id = p.subject_id and s.id not in (SELECT subject_id from student_subject where student_id = '$sid')";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
            echo "<td>" . $row['semester'] . "</td>";
            echo "<td>" . $row['ecdl_credits'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td><a href='add-student-subject.php?id=" . $row['id'] . "'>Enroll</a></td>";
            echo "</tr>";
    }
    mysqli_close($conn);
    ?>
    </tbody>
</table>
</body>

</html>