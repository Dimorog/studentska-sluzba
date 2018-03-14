<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'db_connection.php';?>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<script src="js-scripts.js"></script>
    <form action="" name="add_user" onsubmit="return validateAddUser()" method="POST">
        <?php
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
            $sql = "Select * from users where email = '$email' " ;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<p style='color:red; text-align:center; font-weight:bold;'>User already exists</p>";
                return;
            }
            $sql = "INSERT INTO users( username, email, password, is_admin, role) VALUES ('$username', '$email', '$password', '$admin', '$role')";
            if ($conn->query($sql) == true) {
                echo '<script type="text/javascript"> window.location = "user-list.php"</script>';
            }
        }
        ?>

        Username:<br>
        <input type="text" name="username"><br>

        Email:<br>
        <input type="text" name="email" id="email" ><br>

        Password:<br>
        <input type="password" name="password"  id="password"  ><br>

        Is the user student or professor:
        <select name="role"  id="role">
            <option value="student">Student</option>
            <option value="professor">Professor</option>
        </select> <br>

        Is this user an Admin?<br>
        <input type="checkbox" name="admin" > Yes<br>

        <input type="submit" value="Submit">
    </form>



</body>
</html>