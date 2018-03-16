<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'db_connection.php';?>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<script src="js-scripts.js"></script>
        <?php

        /*
     * Gets the form data from the edit subject form
     * and inserts the changes made in the input fields containg existing subject data.
     * Finally it redirects back to subjects list
     */

        $id = $_REQUEST['id'];
        $sql = "SELECT * from subject where id=".$id;
        $result = $conn->query($sql);
        $name;$semester;$ecdl;$description;
        if($result->num_rows>0) {
            while ($row = $result->fetch_assoc()) {
                $name = $row['name'];
                $semester = $row['semester'];
                $ecdl = $row['ecdl_credits'];
                $description = $row['description'];
            }
        }
        ?>
    <form method="post" name="edit_subject" onsubmit="return validateEditSubject()">
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $semester = $_POST['semester'];
            $ecdl = $_POST['ecdl'];
            $description = $_POST['description'];
            $sql = "UPDATE subject SET name='".$name."',semester=".$semester.",ecdl_credits=".$ecdl.",description='".$description."' WHERE id=".$id;
            if ($conn->query($sql) == true) {
                echo '<script type="text/javascript"> window.location = "subject-list.php"</script>';
            }else{
                echo $sql;
            }
        }
        ?>
        Name:<br>
        <input type="text" name="name" value="<?php echo $name ?>"><br>

        Semester: <br>
        <select name="semester" id="semester">
            <?php
                for ($i = 1; $i<=6; $i++){
                    if($i==$semester){
                        echo "<option value='".$i."' selected>".$i."</option>";
                    }else{
                        echo "<option value='".$i."'>".$i."</option>";
                    }
                }
            ?>
        </select> <br>

        ECDL:<br>
        <input type="number" name="ecdl" value="<?php echo $ecdl ?>"><br>

        Description:<br>
        <textarea rows="4" cols="50" name="description" id="description"><?php echo $description ?></textarea>
        <br><br>

        <input type="submit" value="Submit">
    </form>

</body>
</html>