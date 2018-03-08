<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<script src="js-scripts.js"></script>
    <form action="professor-list.php" name="add_professor" id="add_professor" onsubmit="validateAddProfessor()">
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