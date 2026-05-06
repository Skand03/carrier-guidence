<?php
require_once 'database.php';

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "<h1>Success!</h1>";
    echo "<p>The 'users' table has been created successfully in your Aiven database.</p>";
    echo "<a href='index.php'>Go to Home Page</a>";
} else {
    echo "<h1>Error</h1>";
    echo "<p>Error creating table: " . $conn->error . "</p>";
}

$conn->close();
?>
