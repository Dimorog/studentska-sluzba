<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'db_connection.php';?>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<script src="js-scripts.js"></script>
<form action="professor-list.php" name="edit_professor" id="edit_professor" onsubmit="validateEditProfessor()">
    First name:<br>
    <input type="text" name="firstname" id="firstname"><br>

    Last name:<br>
    <input type="text" name="lastname" id="lastname"><br>

    Age:<br>
    <input type="text" name="age"  id="age" ><br>

    Subject:<br>
    <input type="text" name="subject" id="subject"><br><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>