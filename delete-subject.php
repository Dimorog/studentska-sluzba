<?php

/*
 * Deletes the selected subject and relevatn student_subject data
 */

require 'db_connection.php';
$id = $_REQUEST['id'];
mysqli_query($conn,"DELETE FROM subject WHERE id = '$id'");
mysqli_query($conn, "DELETE FROM student_subject where subject_id ='$id'");
header("location: subject-list.php");