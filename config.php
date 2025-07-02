<?php
// config.php - DB Configuration
$host = 'localhost:3308';
$db = 'user_management';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>