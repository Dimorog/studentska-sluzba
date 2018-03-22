<?php
/** Logs out the logged in user and redirects him back to index.php*/
session_start();
session_destroy();
header("location:index.php");
?>