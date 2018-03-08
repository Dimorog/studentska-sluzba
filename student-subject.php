<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'db_connection.php';?>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<script src="js-scripts.js"></script>
<form action="" name="student_subject">
    Points:<br>
    <input type="text" name="points" id="points"><br>
    Grade:<br>
    <input type="text" name="grade" id="grade" disabled><br>


    <input type="button" value="Submit" onclick="validateStudentSubject()">
</form>
</body>


</html>