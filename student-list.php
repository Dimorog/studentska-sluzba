<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'db_connection.php';?>
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
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Gender</th>
            <th>Birthday</th>
            <th>Course</th>
        </tr>
        <?php
        $result = mysqli_query($conn,"SELECT * FROM student");

        while($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['birthday'] . "</td>";
            echo "<td>" . $row['course'] . "</td>";
            echo "</tr>";
        }
        mysqli_close($conn);
        ?>
    </table>
</body>

</html>