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

// Fetch inquiries
$query = "SELECT * FROM inquiries ORDER BY id DESC";
$result = $conn->query($query);
$has_inquiries = $result && $result->num_rows > 0;

// Fetch promotions
$promotions_query = "SELECT * FROM promotions ORDER BY id DESC";
$promotions_result = $conn->query($promotions_query);
$has_promotions = $promotions_result && $promotions_result->num_rows > 0;

// Fetch feedback
$feedback_query = "SELECT * FROM feedback ORDER BY id DESC";
$feedback_result = $conn->query($feedback_query);
$has_feedback = $feedback_result && $feedback_result->num_rows > 0;

// Fetch demo requests
$demo_query = "SELECT * FROM demo_requests ORDER BY id DESC";
$demo_result = $conn->query($demo_query);
$has_demo_requests = $demo_result && $demo_result->num_rows > 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; }
        .container { width: 90%; margin: auto; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        a { text-decoration: none; color: blue; }
        h1, h2 { text-align: center; }
        footer { text-align: center; padding: 10px; background-color: #333; color: white; }
        .nav-links { margin-top: 20px; }
        .nav-links a { padding: 10px 20px; background-color: #3498db; color: white; margin-right: 10px; border-radius: 5px; }
        .nav-links a:hover { background-color: #2980b9; }
    </style>
</head>
<body>
<div class="container">
    <h1>Admin Panel</h1>
    <a href="admin_logout.php" style="float:right;">Logout</a>

    <!-- Navigation Links to Other Pages -->
    <div class="nav-links">
        <a href="feedback.php">View Feedback</a>
        <a href="demo.php">View Demo Requests</a>
    </div>

    <!-- Inquiries Section -->
    <h2>Customer Inquiries</h2>
    <?php if ($has_inquiries): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Job Requirements</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo nl2br($row['job_requirements']); ?></td>
                        <td>
                            <a href="update_inquiry.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                            <a href="delete_inquiry.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this inquiry?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No inquiries found.</p>
    <?php endif; ?>

    <!-- Promotions Section -->
    <h2>Promotions</h2>
    <?php if ($has_promotions): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($promotion = $promotions_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $promotion['id']; ?></td>
                        <td><?php echo $promotion['title']; ?></td>
                        <td><?php echo nl2br($promotion['description']); ?></td>
                        <td><?php echo $promotion['start_date']; ?></td>
                        <td><?php echo $promotion['end_date']; ?></td>
                        <td>
                            <a href="update_promotion.php?id=<?php echo $promotion['id']; ?>">Edit</a> | 
                            <a href="delete_promotion.php?id=<?php echo $promotion['id']; ?>" onclick="return confirm('Are you sure you want to delete this promotion?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No promotions found.</p>
    <?php endif; ?>

    <!-- Customer Feedback Section -->
    <h2>Customer Feedback</h2>
    <?php if ($has_feedback): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Rating</th>
                    <th>Comments</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($feedback = $feedback_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $feedback['id']; ?></td>
                        <td><?php echo $feedback['user_name']; ?></td>
                        <td><?php echo $feedback['email']; ?></td>
                        <td><?php echo $feedback['rating']; ?> stars</td>
                        <td><?php echo nl2br($feedback['user_feedback']); ?></td>
                        <td>
                            <a href="delete_feedback.php?id=<?php echo $feedback['id']; ?>" onclick="return confirm('Are you sure you want to delete this feedback?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No feedback found.</p>
    <?php endif; ?>

    <!-- Demo Requests Section -->
    <h2>Demo Requests</h2>
    <?php if ($has_demo_requests): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Job Requirements</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($demo = $demo_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $demo['id']; ?></td>
                        <td><?php echo $demo['name']; ?></td>
                        <td><?php echo $demo['email']; ?></td>
                        <td><?php echo nl2br($demo['job_requirements']); ?></td>
                        <td>
                            <a href="delete_demo.php?id=<?php echo $demo['id']; ?>" onclick="return confirm('Are you sure you want to delete this demo request?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No demo requests found.</p>
    <?php endif; ?>

</div>

<footer>
    <p>&copy; 2024 AI-Solutions. All Rights Reserved.</p>
</footer>
</body>
</html>

<?php $conn->close(); ?>
