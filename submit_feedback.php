<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ai_solution';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $rating = (int)$_POST['rating'];
    $comments = htmlspecialchars($_POST['comments']);

    $stmt = $conn->prepare("INSERT INTO feedback (name, email, rating, comments) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $name, $email, $rating, $comments);

    if ($stmt->execute()) {
        echo "Thank you for your feedback!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
