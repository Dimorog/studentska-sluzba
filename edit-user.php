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
         *Gets the selected user form data containing his existing data and
         * updates them according to the changes made inside the input fields.
         * Finally it redirects back to the user list
         */

    $id = $_REQUEST['id'];
    $sql = "SELECT * from users where id=".$id;
    $result = $conn->query($sql);
    $username;$email;$password;$admin;$role;
    if($result->num_rows>0) {
        while ($row = $result->fetch_assoc()) {
            $username = $row['username'];
            $email = $row['email'];
            $password = $row['password'];
            $admin = $row['is_admin'];
            $role = $row['role'];
        }
    }
    ?>
    <form method="post" name="edit_user" onsubmit="return validateEditUser()">
        <?php

        /*
         * Updates the user data inside the database based on the changes
         * made inside the input fields
         */

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];
            if(isset($_POST['admin'])) {
                $admin = 1;
            }else {
                $admin = 0;
            }
            $sql = "UPDATE users SET username='".$username."',password='".$password."',email='".$email."',is_admin=".$admin." WHERE id=".$id;
            if ($conn->query($sql) == true) {
                echo '<script type="text/javascript"> window.location = "user-list.php"</script>';
            }
        }
        ?>
        Username:<br>
        <input type="text" name="username" id="username" value="<?php echo $username ?>"><br>

        Email:<br>
        <input type="text" name="email" id="email" value="<?php echo $email ?>"><br>

        Password:<br>
        <input type="password" name="password"  id="password"  value="<?php echo $password ?>"><br>


        Is this user an Admin?<br>
        <?php
            if($admin == 1){
                echo "<input type='checkbox' name='admin' value='1' checked> Yes<br>";
            }else{
                echo "<input type='checkbox' name='admin' value='1'> Yes<br>";
            }
        ?>
        <input type="submit" value="Submit">
    </form>

</body>
</html>