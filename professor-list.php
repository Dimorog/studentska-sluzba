<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'db_connection.php';?>
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
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Age</th>
            <th>Subject ID</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
        $result = mysqli_query($conn,"SELECT * FROM professor");

            while($row = mysqli_fetch_array($result))
            {
            echo "<tr>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['subject_id'] . "</td>";
                echo "<td><a href='edit-professor.php?id=".$row['id']."'>Edit</a></td>";
                echo "<td><a href='delete-professor.php?id=".$row['id']."'>Delete</a></td>";
                echo "</tr>";
            }
        mysqli_close($conn);
        ?>

    </table>
</body>

</html>