<?php
require_once 'classes/connection.php';
require_once 'classes/Student.php';

$database = new Database();
$db = $database->getConnection();

$student = new Student($db);

$student->id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: ID tidak ditemukan.');

if ($student->delete()) {
    echo "Mahasiswa berhasil dihapus.";
} else {
    echo "Terjadi kesalahan.";
}

header("Location: index.php");
