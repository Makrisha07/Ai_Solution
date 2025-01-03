<?php
session_start();

// Redirect to login page if not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit;
}

// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ai_solution';

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = $conn->real_escape_string($_POST['productName']);
    $description = $conn->real_escape_string($_POST['description']);
    $link = $conn->real_escape_string($_POST['link']);

    // Validate inputs
    if (empty($productName) || empty($description) || empty($link)) {
        $error = "All fields are required.";
    } else {
        // Insert data into promotions table
        $query = "INSERT INTO promotions (title, description, link) VALUES ('$productName', '$description', '$link')";
        if ($conn->query($query)) {
            $success = "Promotion added successfully!";
        } else {
            $error = "Error adding promotion: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Promotion</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { width: 50%; margin: auto; background: white; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h1 { text-align: center; }
        form { margin-top: 20px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], textarea { width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 5px; }
        button { background-color: #28a745; color: white; border: none; padding: 10px 20px; cursor: pointer; border-radius: 5px; }
        button:hover { background-color: #218838; }
        .error { color: red; margin-bottom: 10px; }
        .success { color: green; margin-bottom: 10px; }
        a { text-decoration: none; color: #007bff; display: inline-block; margin-top: 10px; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add New Promotion</h1>
        <?php if (!empty($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <?php if (!empty($success)): ?>
            <p class="success"><?php echo $success; ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="productName">Product Name</label>
            <input type="text" id="productName" name="productName" placeholder="Enter the product name" required>

            <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="Enter the promotion description" rows="5" required></textarea>

            <label for="link">Link</label>
            <input type="text" id="link" name="link" placeholder="Enter the product link" required>

            <button type="submit">Add Promotion</button>
        </form>
        <a href="admin_panel.php">Back to Admin Panel</a>
    </div>
</body>
</html>

<?php $conn->close(); ?>
