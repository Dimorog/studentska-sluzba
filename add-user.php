<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'db_connection.php'; ?>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<a href="/index.php">HOMEPAGE</a>
<br><br>

<script src="js-scripts.js"></script>
<form method="post" name="add_user" onsubmit="return validateAddUser()">
    <?php

    /**
     * Gets the form data and checks to see if the given email address matches an existing one in the database
     * and if it doesn't it proceeds with adding the user to the database, otherwise it
     * will give a warning that email address is already in use.Finally it redirects back to the index page
     */
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $admin = 1;

        $sql = "Select * from users where email = '$email' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<p style='color:red; text-align:center; font-weight:bold;'>User already exists</p>";
            return;
        }
        $sql = "INSERT INTO users( username, email, password, is_admin, student_id, professor_id) VALUES ('$username', '$email', '$password', '$admin', 0 , 0)";
        if ($conn->query($sql) == true) {
            echo '<script type="text/javascript"> window.location = "index.php"</script>';
        }
    }
    ?>
    <div>
        <label for="exampleInputEmail1">Email address</label><br>
        <input id="exampleInputEmail1" type="text" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="exampleInputUsername1">Username</label><br>
        <input id="exampleInputUsername1" type="text" name="username" aria-describedby="emailHelp"
               placeholder="Username">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label><br>
        <input id="exampleInputPassword1" name="password" type="password" placeholder="Password">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>


</body>
</html>