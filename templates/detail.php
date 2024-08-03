<?php
include '../detail.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Detail</title>
</head>

<body>
    <h1>Student Detail</h1>
    <p>Name: <?php echo $student->name; ?></p>
    <p>Student ID: <?php echo $student->student_id; ?></p>
    <p>Date of birth: <?php echo $student->date_of_birth; ?></p>
    <p>Email: <?php echo $student->email; ?></p>
    <p>Address: <?php echo $student->address; ?></p>
    <a href="../index.php">Home</a>
</body>

</html>