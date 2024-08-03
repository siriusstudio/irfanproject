<?php
require_once 'classes/connection.php';
require_once 'classes/Student.php';

$database = new Database();
$db = $database->getConnection();

$student = new Student($db);

if ($_POST) {
    $student->id = $_POST['id'];
    $student->name = $_POST['name'];
    $student->student_id = $_POST['student_id'];
    $student->date_of_birth = $_POST['date_of_birth'];
    $student->email = $_POST['email'];
    $student->address = $_POST['address'];

    if ($student->update()) {
        echo "Data updated successfully.";
    } else {
        echo "Something wrong.";
    }
} else {
    $student->id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: ID not found.');
    $student->readOne();
}
