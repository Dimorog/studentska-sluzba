<?php
require "db_connection.php";
$id = $_REQUEST['id'];
$is_admin = $_REQUEST['is_admin'];
$student_id = $_REQUEST['student_id'];
$professor_id = $_REQUEST['professor_id'];
/*
 * Deletes user data but also the relevant student/professor data
 *  based on their roles and then redirects back to the user list
 */
if($is_admin != 0)
{
    mysqli_query($conn,"DELETE FROM users WHERE id = '$id'");
}elseif ($professor_id != 0)
{
    mysqli_query($conn,"DELETE FROM users WHERE id = '$id'");
    mysqli_query($conn,"DELETE FROM professor WHERE id = '$professor_id'");
}else
{
    mysqli_query($conn,"DELETE FROM users WHERE id = '$id'");
    mysqli_query($conn,"DELETE FROM student WHERE id = '$student_id'");
}

header("location: user-list.php");