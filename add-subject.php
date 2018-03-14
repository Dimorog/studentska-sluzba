<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'db_connection.php';?>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<script src="js-scripts.js"></script>
    <form method="post" name="add_subject" onsubmit="return validateAddSubject()">
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $semester = $_POST['semester'];
            $ecdl = $_POST['ecdl'];
            $description = $_POST['description'];
            $sql = "INSERT INTO subject(name, semester, ecdl_credits, description) VALUES ('$name','$semester', $ecdl, '$description')";
            if ($conn->query($sql) == true) {
                echo '<script type="text/javascript"> window.location = "subject-list.php"</script>';
            }
        }
        ?>
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