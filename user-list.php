<!doctype html>
<html lang="en">
<head>
    <?php require 'db_connection.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    table, th, td {
        border: 1px solid black;
        text-align: center;
    }
</style>
<body>


<table width="100%">
    <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php

    /** Takes all the user data from user table and presents it dynamically based on the user roles*/
    $result = mysqli_query($conn, "SELECT * FROM users");

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";

        if ($row['student_id'] != 0) {
            echo "<td>Student</td>";
            echo "<td><a href='edit-student.php?id=" . $row['student_id'] . "'>Edit</a></td>";
            echo "<td><a href='delete-user.php?id=" . $row['id'] . "&is_admin=" . $row['is_admin'] . "&student_id=" . $row['student_id'] . "&professor_id=" . $row['professor_id'] . "'>Delete</a></td>";
        } elseif ($row['professor_id'] != 0) {
            echo "<td>Professor</td>";
            echo "<td><a href='edit-professor.php?id=" . $row['professor_id'] . "'>Edit</a></td>";
            echo "<td><a href='delete-user.php?id=" . $row['id'] . "&is_admin=" . $row['is_admin'] . "&student_id=" . $row['student_id'] . "&professor_id=" . $row['professor_id'] . "'>Delete</a></td>";
        } else {
            echo "<td>Admin</td>";
            echo "<td><a href='edit-user.php?id=" . $row['id'] . "'>Edit</a></td>";
            echo "<td><a href='delete-user.php?id=" . $row['id'] . "&is_admin=" . $row['is_admin'] . "&student_id=" . $row['student_id'] . "&professor_id=" . $row['professor_id'] . "'>Delete</a></td>";
        }

    }
    mysqli_close($conn);
    ?>
</table>

<br><br>
<a href="/index.php">HOMEPAGE</a>

</body>

</html>