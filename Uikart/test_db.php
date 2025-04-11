<?php
// Test database connection
$servername = "localhost"; // Default for XAMPP
$username = "root";  // Default for XAMPP
$password = "";  // Default (empty password)
$database = "uikart";  // Make sure this matches your database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}
echo "✅ Database connected successfully!";
?>
