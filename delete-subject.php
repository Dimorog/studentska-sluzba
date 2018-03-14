<?php
require 'db_connection.php';
$id = $_REQUEST['id'];
mysqli_query($conn,"DELETE FROM subject WHERE id = '$id'");
header("location: subject-list.php");