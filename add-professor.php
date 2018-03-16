<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'db_connection.php'; ?>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="js-scripts.js"></script>
</head>
<body>

<form method="post" name="add_professor" onsubmit="return validateAddProfessor()">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];
        $subject = $_POST['subject'];
        $sql = "Select * from professor where first_name='$firstname' and last_name='$lastname'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<p style='color:red; text-align:center; font-weight:bold;'>Professor already exists</p>";
            return;
        }
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "Select * from users where email = '$email' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<p style='color:red; text-align:center; font-weight:bold;'>User already exists</p>";
            return;
        }
        $sql = "INSERT INTO professor( first_name, last_name, age, subject_id) VALUES ('$firstname', '$lastname', $age, $subject)";
        if ($conn->query($sql) == false) {
            return $sql;
        }
        $sql = "Select * from professor where first_name='$firstname' and last_name='$lastname'";
        $result = $conn->query($sql);
        if ($row = $result->fetch_assoc()) {
            $professor = $row['id'];
        }
        $admin = 0;
        $sql = "INSERT INTO users( username, email, password, is_admin, student_id, professor_id) VALUES ('$username', '$email', '$password', '$admin', 0, $professor)";
        if ($conn->query($sql) == true) {
            echo '<script type="text/javascript"> window.location = "professor-list.php"</script>';
        }
    }
    ?>
    <div>
        <label>Email</label><br>
        <input type="text" class="form-control" name="email" placeholder="Enter email">
    </div>
    <div>
        <label>Username</label><br>
        <input type="text" name="username" placeholder="Enter username">
    </div>
    <div>
        <label>Password</label><br>
        <input type="password" name="password" placeholder="Enter password">
    </div>

    <div>
        <label>First Name</label><br>
        <input type="text" name="firstname" placeholder="Enter first name">
    </div>
    <div>
        <label>Last Name</label><br>
        <input type="text" name="lastname" placeholder="Enter last name">
    </div>
    <div>
        <label>Age</label><br>
        <input type="text" name="age" placeholder="Enter age">
    </div>
    <div>
        <label>Subject</label><br>
        <select name="subject">
            <?php
            $sql = "select * from subject where id not in (select subject_id from professor)";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                }
            }
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>