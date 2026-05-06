<?php
// Use environment variables for deployment, fallback to localhost for development
$host = getenv('DB_HOST') ?: "localhost";
$dbname = getenv('DB_NAME') ?: "mitra_career";
$username = getenv('DB_USER') ?: "root";
$password = getenv('DB_PASS') ?: "root123";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>
