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

$sql = "SELECT * FROM feedback ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Feedback</title>
    <style>
        .stars {
            font-size: 20px;
            color: gold;
        }
    </style>
</head>
<body>

<h1>Customer Feedback</h1>

<?php while ($row = $result->fetch_assoc()): ?>
    <div class="feedback">
        <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
        <p><strong>Email:</strong> <?php echo $row['email']; ?></p>

        <p><strong>Rating:</strong> 
            <?php
            // Display stars based on rating value
            for ($i = 1; $i <= 5; $i++) {
                echo ($i <= $row['rating']) ? "&#9733;" : "&#9734;";
            }
            ?>
        </p>

        <p><strong>Comments:</strong> <?php echo $row['comments']; ?></p>
    </div>
    <hr>
<?php endwhile; ?>

</body>
</html>

<?php $conn->close(); ?>
