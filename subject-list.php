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
        <th>Semester</th>
        <th>ECDL credits</th>
        <th>Description</th>
        <?php

        /**
         * Based on the user role it shows additional table data
         * such as options to edit or delete the records
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

    /**
     * Takes all the data from subjects table
     * and presents them as a table which is dynamic based on the logged in users role
     */
    $result = mysqli_query($conn, "SELECT * FROM subject");
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['semester'] . "</td>";
        echo "<td>" . $row['ecdl_credits'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        if (isset($_SESSION["username"])) {
            if ($_SESSION["is_admin"] == 1) {
                echo "<td><a href='edit-subject.php?id=" . $row['id'] . "'>Edit</a></td>";
                echo "<td><a href='delete-subject.php?id=" . $row['id'] . "'>Delete</a></td>";
            }
        }
        echo "</tr>";
    }
    mysqli_close($conn);
    ?>
    </tbody>
</table>

<br><br>
<a href="/index.php">HOMEPAGE</a>

</body>

</html>