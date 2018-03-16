<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'db_connection.php'; ?>
    <meta charset="UTF-8">
    <title>Title</title>

    <style>
        table, th, td {
            border: 1px solid black;
            text-align: center;
        }
    </style>
</head>

<body>
<table width="100%">
    <thead>
    <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Subject</th>
        <?php
        if (isset($_SESSION["username"])) {
            if ($_SESSION["is_admin"] == 1) {
                echo "<th>Edit</th>";
                echo "<th>Delete</th>";
            }
        }
        ?>
    </tr>
    </thead>
    <tbody>
    <?php
    $result = mysqli_query($conn, "SELECT p.id, p.first_name, p.last_name, p.age, s.name FROM professor p, subject s WHERE p.subject_id = s.id");
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
        echo "<td>" . $row['age'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";

        if (isset($_SESSION["username"])) {
            if ($_SESSION["is_admin"] == 1) {
                echo "<td><a href='edit-professor.php?id=" . $row['id'] . "'>Edit</a></td>";
                echo "<td><a href='delete-professor.php?id=" . $row['id'] . "'>Delete</a></td>";
            }
        }
        echo "</tr>";
    }
    ?>
    </tbody>
</table>
</body>

</html>