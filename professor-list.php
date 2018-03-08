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
                echo "</tr>";
            }
        mysqli_close($conn);
        ?>



       <!-- <tr>
            <td>Jill</td>
            <td>Smith</td>
            <td>50</td>
            <td>1</td>
        </tr>
        <tr>
            <td>Eve</td>
            <td>Jackson</td>
            <td>34</td>
            <td>2</td>
        </tr>
        <tr>
            <td>Mark</td>
            <td>Marcus</td>
            <td>41</td>
            <td>3</td>
        </tr>-->
    </table>
</body>

</html>