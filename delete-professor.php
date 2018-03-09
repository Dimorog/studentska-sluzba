<?php
require 'db_connection.php';
$id = $_REQUEST['id'];
mysqli_query($conn,"DELETE FROM professor WHERE id = '$id'");
header("location: professor-list.php");