<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'db_connection.php';?>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<script src="js-scripts.js"></script>
    <form action="subject-list.php" name="add_subject" onsubmit="validateAddSubject()">
        Name:<br>
        <input type="text" name="name"><br>

        Semester: <br>
        <select name="semester"  id="semester">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select> <br>

        ECDL:<br>
        <input type="number" name="ecdl"><br>

        Description:<br>
        <textarea rows="4" cols="50" name="description"  id="description"></textarea>
        <br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>