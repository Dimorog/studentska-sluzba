<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'db_connection.php';?>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<a href="/index.php">HOMEPAGE</a>
<br><br>

<script src="validation-professor.js"></script>
        <?php

        /*
         * Gets the professor and user table data for selected professor and places it into the form inputs
         * for editing
         */

        $id = $_REQUEST['id'];
        $sql = "SELECT p.*, u.*  from professor p, users u where p.id = u.professor_id and p.id=".$id;
        $result = $conn->query($sql);
        $firstname;$lastname;$age;$subject;$username;$password;$email;$admin;
        if($result->num_rows>0) {
            while ($row = $result->fetch_assoc()) {
                $firstname = $row['first_name'];
                $lastname = $row['last_name'];
                $age = $row['age'];
                $subject = $row['subject_id'];
                $username = $row['username'];
                $password = $row['password'];
                $email = $row['email'];
            }
        }
        ?>
        <form method="post" name="edit_professor" id="edit_professor" onsubmit="return validateEditProfessor()">
            <?php

            /*
                * Updates relevant professor data changed in the inputs
                *  containing existing professor information
            */

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $age = $_POST['age'];
                $subject = $_POST['subject'];
                $sql = "UPDATE professor SET first_name='".$firstname."',last_name='".$lastname."',age=".$age.",subject_id=".$subject." WHERE id=".$id;
                if ($conn->query($sql) == false) {
                    echo $sql;
                }
                $email =$_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $admin = 0;
                $sql = "UPDATE users SET email='$email', username='$username', password='$password', is_admin='$admin' where professor_id=".$id;
                if ($conn->query($sql) == true) {
                    echo '<script type="text/javascript"> window.location = "professor-list.php"</script>';
                }else{
                    echo $sql;
                }
            }
            ?>
            Email:<br>
            <input type="text" name="email"  value="<?php echo $email ?>"><br>

            Username:<br>
            <input type="text" name="username"  value="<?php echo $username ?>"><br>

            Password:<br>
            <input type="password" name="password"  value="<?php echo $password ?>"><br>

            First name:<br>
            <input type="text" name="firstname" id="firstname" value="<?php echo $firstname ?>"><br>

            Last name:<br>
            <input type="text" name="lastname" id="lastname" value="<?php echo $lastname ?>"><br>

            Age:<br>
            <input type="text" name="age"  id="age" value="<?php echo $age ?>"><br>

            Subject:<br>
            <select name="subject" id="subject">
                <?php

                /*
             * Gives select options about the assignment of a certain subject to
             * the professor based on the data that says if the subject is already
             * taken by another professor
             */

                $sql = "select * from subject where id not in (select subject_id from professor where id not like '$id')";
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