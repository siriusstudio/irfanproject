<?php
include '../edit.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Data</title>
</head>

<body>
    <h1>Edit Student Data</h1>
    <form action="edit.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $student->id; ?>">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $student->name; ?>" required><br>
        <label>Student ID:</label>
        <input type="text" name="student_id" value="<?php echo $student->student_id; ?>" required><br>
        <label>Date of birth:</label>
        <input type="date" name="date_of_birth" value="<?php echo $student->date_of_birth; ?>" required><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $student->email; ?>" required><br>
        <label>Address:</label>
        <textarea name="address" required><?php echo $student->address; ?></textarea><br>
        <input type="submit" value="Edit">
    </form>
    <a href="../index.php">Home</a>
</body>

</html>