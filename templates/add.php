<?php
include '../add.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student Data</title>
</head>

<body>
    <h1>Add Student Data</h1>
    <form action="add.php" method="post" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Student ID:</label>
        <input type="text" name="student_id" required><br>
        <label>Date of birth:</label>
        <input type="date" name="date_of_birth" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Address:</label>
        <textarea name="address" required></textarea><br>
        <input type="submit" value="Add">
    </form>
    <a href="../index.php">Home</a>
</body>

</html>