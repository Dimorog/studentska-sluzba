<?php
require 'db_connection.php';
$id = $_REQUEST['id'];
mysqli_query($conn,"DELETE FROM student WHERE id = '$id'");
header("location: student-list.php");