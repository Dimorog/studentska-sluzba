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
        $id = $_REQUEST['id'];
        $sql = "SELECT * from professor where id=".$id;
        $result = $conn->query($sql);
        $firstname;$lastname;$age;$subject;
        if($result->num_rows>0) {
            while ($row = $result->fetch_assoc()) {
                $firstname = $row['first_name'];
                $lastname = $row['last_name'];
                $age = $row['age'];
                $subject = $row['subject_id'];
            }
        }
        ?>
        <form method="post" name="edit_professor" id="edit_professor" onsubmit="return validateEditProfessor()">
            <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $age = $_POST['age'];
                $subject = $_POST['subject'];
                $sql = "UPDATE professor SET first_name='".$firstname."',last_name='".$lastname."',age=".$age.",subject_id=".$subject." WHERE id=".$id;
                if ($conn->query($sql) == true) {
                    echo '<script type="text/javascript"> window.location = "professor-list.php"</script>';
                }else{
                    echo $sql;
                }
            }
            ?>
            First name:<br>
            <input type="text" name="firstname" id="firstname" value="<?php echo $firstname ?>"><br>

            Last name:<br>
            <input type="text" name="lastname" id="lastname" value="<?php echo $lastname ?>"><br>

            Age:<br>
            <input type="text" name="age"  id="age" value="<?php echo $age ?>"><br>

            Subject:<br>
            <select name="subject" id="subject">
                <?php
                $sql = "select * from subject";
                $result = $conn->query($sql);
                if($result->num_rows>0) {
                    while ($row = $result->fetch_assoc()) {
                        if ($subject == $row['id']){
                            echo '<option value='.$row['id'].' selected>'.$row['name'].'</option>';
                        }else{
                            echo "<option value='".$row['id']."'>".$row['name']."</option>";
                        }

                    }
                }
                ?>
            </select><br><br>

            <input type="submit" value="Submit">
        </form>

</body>
</html>