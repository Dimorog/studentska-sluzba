<?php
session_start();
$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "student_service";

/** Create connection */
$conn = mysqli_connect($servername, $username, $password, $dbname);
/** Check connection */
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
