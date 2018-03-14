<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'db_connection.php';?>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<script src="js-scripts.js"></script>
    <form method="post" name="login" onsubmit="return validateLogin()">
        <?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $sql = "SELECT * from users where email = '$email' and password = '$password'";
            $result = $conn->query($sql);
            if($result->num_rows == 1){
                $row = $result->fetch_assoc();
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['username'] = $row['username'];
                header("location: index.php");
            }else{
                header("location: login.php");
            }
        }
        ?>
        Email: <br>
        <input type="text" name="email" id="email"><br><br>
        Password: <br>
        <input type="password" name="password" id="password"><br>
        <br><br>
        <input type="submit" value="Login">
    </form>
</body>

</html>