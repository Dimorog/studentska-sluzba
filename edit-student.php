<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<script src="js-scripts.js"></script>
    <form action="student-list.php" name="edit_student" id="edit_student" onsubmit="validateEditStudent()">
        First name:<br>
        <input type="text" name="firstname"  id="firstname"><br>

        Last name:<br>
        <input type="text" name="lastname"  id="lastname"><br>

        Gender: <br>
        <input type="radio" name="gender"   id="gender_male" value="male" checked> Male<br>
        <input type="radio" name="gender"   id="gender_female" value="female"> Female<br>

        Index:<br>
        <input type="text" name="index"  id="index"><br>

        Birth-date:<br>
        <input type="date" name="birth_date"   id="birth_date" ><br>

        Course:<br>
        <input type="text" name="course"  id="course"><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>