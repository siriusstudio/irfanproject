<?php
require_once 'classes/connection.php';
require_once 'classes/Student.php';

$database = new Database();
$db = $database->getConnection();

$student = new Student($db);
$stmt = $student->read();
$num = $stmt->rowCount();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <script type="text/javascript">
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this student?")) {
                window.location.href = 'delete.php?id=' + id;
            }
        }
    </script>
</head>

<body>
    <h1>Student List</h1>
    <a href="./templates/add.php">Add New Student</a>
    <?php if ($num > 0) : ?>
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <a href="./templates/detail.php?id=<?php echo $row['id']; ?>">Detail</a>
                        <a href="./templates/edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $row['id']; ?>)">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else : ?>
        <p>Student data is not available.</p>
    <?php endif; ?>
</body>

</html>