<?php
// ai_solution.php - Database connection file

$host = 'localhost';
$dbname = 'ai_solution';  // Replace with your actual database name
$username = 'root';       // Replace with your actual database username
$password = '';           // Replace with your actual database password

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle connection errors
    echo "Connection failed: " . $e->getMessage();
    die();
}
?>
