<?php
include 'db_connection.php';

/**Insert logged student's id and subject id into student_subject table and redirect back*/
$id = $_REQUEST['id'];
$sid = $_SESSION['student_id'];
$sql = "INSERT INTO student_subject( subject_id, student_id) VALUES ($id, $sid)";
if ($conn->query($sql) == true) {
    header("location:students-subjects.php");
}else{
    $sql;
}