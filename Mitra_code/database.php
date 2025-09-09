<?php
$host = "localhost";
$dbname = "mitra_career";
$username = "root";  // Change if needed
$password = "";      // Default is empty

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>
