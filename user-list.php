<!doctype html>
<html lang="en">
<head>
    <?php require 'db_connection.php';?>
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
    </tr>
    <?php
    $result = mysqli_query($conn,"SELECT * FROM users");

    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['role'] . "</td>";
        echo "<td><a href='edit-user.php?id=".$row['id']."'>Edit</a></td>";
        echo "</tr>";
    }
    mysqli_close($conn);
    ?>
</table>
</body>

</html>