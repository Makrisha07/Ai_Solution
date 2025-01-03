<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ai_solutions';

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mark inquiry as processed
if (isset($_GET['mark_processed'])) {
    $inquiry_id = $_GET['mark_processed'];
    $update_query = "UPDATE inquiries SET status = 'processed' WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("i", $inquiry_id);
    $stmt->execute();
    $stmt->close();
    header("Location: admin_dashboard.php");
    exit();
}

if (isset($_GET['inquiry_id'])) {
    $inquiry_id = $_GET['inquiry_id'];
    
    // Fetch inquiry details
    $sql = "SELECT * FROM inquiries WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $inquiry_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $inquiry = $result->fetch_assoc();
    $stmt->close();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $reply = htmlspecialchars($_POST['reply']);
        
        // Insert the reply into the database
        $update_query = "UPDATE inquiries SET reply = ? WHERE id = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("si", $reply, $inquiry_id);
        $stmt->execute();
        $stmt->close();

        header("Location: admin_dashboard.php");
        exit();
    }
}
?>

<!-- Reply Form -->
<h3>Reply to Inquiry</h3>
<form method="POST" action="">
    <textarea name="reply" rows="5" cols="50" placeholder="Enter your reply here..."></textarea><br><br>
    <button type="submit">Send Reply</button>
</form>

$sql = "SELECT * FROM inquiries ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - AI-Solutions</title>
</head>
<body>

<h1>Admin Dashboard</h1>
<a href="logout.php">Logout</a>

<h2>Inquiries</h2>
<table border="1">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Job Requirements</th>
        <th>Status</th>
        <th>Date Submitted</th>
        <th>Action</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['job_requirements']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td><?php if ($row['status'] == 'new'): ?>
            <a href="?mark_processed=<?php echo $row['id']; ?>">Mark as Processed</a>
            <?php endif; ?>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>

<?php $conn->close(); ?>
