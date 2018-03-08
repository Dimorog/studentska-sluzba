<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'db_connection.php';?>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<script src="js-scripts.js"></script>
    <form method="post" name="add_professor" id="add_professor" onsubmit="return validateAddProfessor()">
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $age = $_POST['age'];
            $subject = $_POST['subject'];
            $sql = "INSERT INTO professor( first_name, last_name, age, subject_id) VALUES ('$firstname', '$lastname', $age, $subject)";
            if ($conn->query($sql) == true) {
                echo '<script type="text/javascript"> window.location = "subject-list.php"</script>';
            }
        }
        ?>
        First name:<br>
        <input type="text" name="firstname" id="firstname"><br>

        Last name:<br>
        <input type="text" name="lastname" id="lastname"><br>

        Age:<br>
        <input type="text" name="age"  id="age" ><br>

        Subject:<br>
        <select name="subject" id="subject">
            <?php
                $sql = "select * from subject";
                $result = $conn->query($sql);
                if($result->num_rows>0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='".$row['id']."'>".$row['name']."</option>";
                    }
                }
            ?>
        </select><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>