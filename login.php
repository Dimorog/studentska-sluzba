<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'db_connection.php';?>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<script src="js-scripts.js"></script>
    <form action="" name="login" onsubmit="validateLogin()">
        Email: <br>
        <input type="text" name="email" id="email"><br><br>
        Password: <br>
        <input type="password" name="password" id="password"><br>
        <br><br>
        <input type="submit" value="Login">
    </form>
</body>

</html>