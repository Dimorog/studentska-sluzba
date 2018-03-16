<?php

/*
 * Deletes student data but also the relevant user and student_subject data
 * and redirects back to the student-list
 */

require 'db_connection.php';
$id = $_REQUEST['id'];
mysqli_query($conn,"DELETE FROM student WHERE id = '$id'");
mysqli_query($conn,"DELETE FROM users WHERE student_id = '$id'");
mysqli_query($conn, "DELETE FROM student_subject where student_id ='$id'");
header("location: student-list.php");