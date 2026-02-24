<?php
// Database configuration
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "plywood_db";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    // Log error to a file instead of showing details to users
    error_log("Connection failed: " . $conn->connect_error);
    die("Database connection error. Please try again later.");
}

// Set charset to utf8mb4 for Nigerian Naira symbol support
$conn->set_charset("utf8mb4");
?>
