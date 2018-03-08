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
        <th>Name</th>
        <th>Semester</th>
        <th>ECDL</th>
    </tr>
    <?php
    $result = mysqli_query($conn,"SELECT * FROM subject");

    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['semester'] . "</td>";
        echo "<td>" . $row['ecdl_credits'] . "</td>";
        echo "</tr>";
    }
    mysqli_close($conn);
    ?>
</table>

</body>

</html>