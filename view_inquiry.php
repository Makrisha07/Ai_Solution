<?php
// Database connection settings
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ai_solution';

// Establish the database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the inquiry ID from the URL
$id = $_GET['id'];

// Fetch the inquiry details
$query = "SELECT * FROM inquiries WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    die("Inquiry not found.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Inquiry - AI-Solutions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 60%;
            margin: auto;
            padding: 20px;
        }
        header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .btn {
            background-color: #333;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

<header>
    <h1>View Inquiry</h1>
</header>

<div class="container">
    <h2>Inquiry Details</h2>
    <p><strong>Name:</strong> <?php echo htmlspecialchars($row['name']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
    <p><strong>Job Requirements:</strong></p>
    <p><?php echo nl2br(htmlspecialchars($row['job_requirements'])); ?></p>

    <a href="admin_area.php" class="btn">Back to Admin Area</a>
</div>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
