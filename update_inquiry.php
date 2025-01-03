<?php
session_start();

// Redirect to login page if not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit;
}

// Database connection settings
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ai_solution';

// Establish the database connection
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the ID is provided
if (!isset($_GET['id'])) {
    die("Invalid request. Inquiry ID is missing.");
}

$id = intval($_GET['id']);

// Fetch the existing inquiry details
$query = "SELECT * FROM inquiries WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Inquiry not found.");
}

$inquiry = $result->fetch_assoc();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $job_requirements = trim($_POST['job_requirements']);

    // Validate the inputs
    if (empty($name) || empty($email) || empty($job_requirements)) {
        $error = "All fields are required.";
    } else {
        // Update the inquiry in the database
        $update_query = "UPDATE inquiries SET name = ?, email = ?, job_requirements = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param("sssi", $name, $email, $job_requirements, $id);

        if ($update_stmt->execute()) {
            header("Location: admin_panel.php?update_success=true");
            exit;
        } else {
            $error = "Failed to update the inquiry. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Inquiry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin: 10px 0 5px;
        }
        input, textarea {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .btn {
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #555;
        }
        .error {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Update Inquiry</h1>

    <?php if (isset($error)): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($inquiry['name']); ?>" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($inquiry['email']); ?>" required>

        <label for="job_requirements">Job Requirements</label>
        <textarea id="job_requirements" name="job_requirements" rows="5" required><?php echo htmlspecialchars($inquiry['job_requirements']); ?></textarea>

        <button type="submit" class="btn">Update Inquiry</button>
    </form>

    <a href="admin_panel.php" style="display: block; text-align: center; margin-top: 15px;">Back to Admin Panel</a>
</div>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
