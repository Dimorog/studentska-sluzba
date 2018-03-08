<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'db_connection.php';?>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<script src="js-scripts.js"></script>
    <form action="user-list.php" name="add_user" onsubmit="validateAddUser()">
        Username:<br>
        <input type="text" name="username"><br>

        Email:<br>
        <input type="text" name="email" id="email" ><br>

        Password:<br>
        <input type="password" name="password"  id="password"  ><br>

        Is this user an Admin?<br>
        <input type="checkbox" name="admin" value="1"> Yes<br>

        <input type="submit" value="Submit">
    </form>

</body>
</html>