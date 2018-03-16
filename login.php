<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'db_connection.php'; ?>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<script src="js-scripts.js"></script>
<form method="post" name="login" onsubmit="return validateLogin()">
    <?php

    /*
     * Takes the login form data and checks for matching user records
     * in the database to allow for the login to be successful
     */

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * from users where email = '$email' and password = '$password'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['is_admin'] = $row['is_admin'];
            $_SESSION['student_id'] = $row['student_id'];
            $_SESSION['professor_id'] = $row['professor_id'];
            header("location: index.php");
        } else {
            header("location: login.php");
        }
    }
    ?>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label><br>
        <input class="form-control" id="exampleInputEmail1" type="text" name="email" aria-describedby="emailHelp"
               placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label><br>
        <input class="form-control" id="exampleInputPassword1" type="password" name="password" placeholder="Password">
    </div>
    <input class="btn btn-primary btn-block" type="submit" value="Login">
</form>
</body>

</html>