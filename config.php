<?php
// Database configuration
$host = 'localhost'; // Usually localhost
$db_name = 'wordpress_test'; // Replace with your database name
$username = 'root'; // Default username for XAMPP and WAMP
$password = ''; // Default password for XAMPP and WAMP (usually empty)

// Create connection
$conn = new mysqli($host, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
