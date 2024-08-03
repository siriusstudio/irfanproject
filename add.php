<?php
require_once 'classes/connection.php';
require_once 'classes/Student.php';

$database = new Database();
$db = $database->getConnection();

if ($_POST) {
    $student = new Student($db);

    $student->name = $_POST['name'];
    $student->student_id = $_POST['student_id'];
    $student->date_of_birth = $_POST['date_of_birth'];
    $student->email = $_POST['email'];
    $student->address = $_POST['address'];

    if ($student->create()) {
        echo "Student successfully added.";
    } else {
        echo "Something went wrong.";
    }
}
