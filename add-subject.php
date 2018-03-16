<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'db_connection.php'; ?>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<script src="js-scripts.js"></script>
<form method="post" name="add_subject" onsubmit="return validateAddSubject()">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $semester = $_POST['semester'];
        $description = $_POST['description'];
        $ecdl = $_POST['ecdl_credits'];
        $sql = "INSERT INTO subject(name, semester, ecdl_credits, description) VALUES ('$name','$semester', $ecdl, '$description')";
        if ($conn->query($sql) == true) {
            echo '<script type="text/javascript"> window.location = "subject-list.php"</script>';
        }
    }
    ?>
    <div>
        <label>Name</label><br>
        <input type="text" name="name" placeholder="Enter name">
    </div>
    <div>
        <label>Semester</label><br>
        <select name="semester">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>
    </div>
    <div>
        <label>ECDL</label><br>
        <input type="number" name="ecdl" placeholder="Enter ECDL points">
    </div>
    <div>
        <label>Description</label><br>
        <textarea name="description" rows="2"></textarea>
    </div>
    <button type="submit">Submit</button>
</form>
</body>
</html>