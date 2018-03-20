<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'db_connection.php'; ?>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<style>
    table, th, td {
        border: 1px solid black;
        text-align: center;
    }
</style>
<body>
<table width="100%">
    <thead>
    <tr>
        <th>Index</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Birth date</th>
        <th>Course</th>
        <?php
        /*
         * Based on the user role it shows additional table data
         *  such as options to edit or delete the records
         */
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

    /*
     * Takes all the data from students table
     * and presents them as a table which is dynamic based on the logged in users role
     */

    $result = mysqli_query($conn, "SELECT * FROM student");
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['index_number'] . "</td>";
        echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo "<td>" . $row['birthday'] . "</td>";
        echo "<td>" . $row['course'] . "</td>";
        if (isset($_SESSION["username"])) {
            if ($_SESSION["is_admin"] == 1) {
                echo "<td><a href='edit-student.php?id=" . $row['id'] . "'>Edit</a></td>";
                echo "<td><a href='delete-student.php?id=" . $row['id'] . "'>Delete</a></td>";
            }
        }
        echo "</tr>";
    }
    ?>
    </tbody>
</table>

<br><br>
<a href="/index.php">HOMEPAGE</a>

</body>

</html>