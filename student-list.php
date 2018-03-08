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
        <tr>
            <td>Marko</td>
            <td>Markovic</td>
            <td>Male</td>
            <td>06.09.1997</td>
            <td>Course 1</td>
        </tr>
        <tr>
            <td>Ivan</td>
            <td>Ivanovic</td>
            <td>Male</td>
            <td>07.08.1998</td>
            <td>Course 2</td>
        </tr>
        <tr>
            <td>Srdjan</td>
            <td>Medojevic</td>
            <td>Male</td>
            <td>01.03.1996</td>
            <td>Course 3</td>
        </tr>
    </table>
</body>

</html>