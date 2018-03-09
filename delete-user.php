<?php
require 'db_connection.php';
$id = $_REQUEST['id'];
mysqli_query($conn,"DELETE FROM users WHERE id = '$id'");
header("location: user-list.php");