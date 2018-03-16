<?php
include 'db_connection.php';

$id = $_REQUEST['id'];
$sid = $_SESSION['student_id'];
$sql = "INSERT INTO student_subject( subject_id, student_id) VALUES ($id, $sid)";
if ($conn->query($sql) == true) {
    header("location:students-subjects.php");
}else{
    $sql;
}