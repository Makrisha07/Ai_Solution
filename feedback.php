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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $rating = (int)$_POST['rating']; // Star rating (1 to 5)
    $comments = htmlspecialchars(trim($_POST['comments']));

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO feedback (user_name, email, rating, user_feedback) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $name, $email, $rating, $comments);

    if ($stmt->execute()) {
        // Display thank you message and then redirect
        echo "Thank you for your feedback!";
        
        // Redirect to index.php after 3 seconds
        header("refresh:3; url=index.php");
        exit;  // Ensure no further code is executed after the redirect
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Feedback</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            color: #333;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        header {
            background-color: #2c3e50;
            color: #fff;
            padding: 15px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 90%;
            margin: 0 auto;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        nav ul li {
            margin-right: 30px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #3498db;
        }

        /* Admin Login Button (left corner) */
        .admin-login-btn {
            position: absolute;
            top: 15px;
            left: 20px;
            color: #fff;
            background-color: #3498db;
            padding: 10px 20px;
            text-decoration: none;
            border-left: 5px solid #fff;
            font-size: 16px;
            font-weight: 600;
        }

        .admin-login-btn:hover {
            background-color: #2980b9;
        }

        footer {
            background-color: #2c3e50;
            color: #fff;
            text-align: center;
            padding: 20px;
            font-size: 14px;
            margin-top: 40px;
        }

        /* Star rating styles */
        .stars {
            display: inline-block;
            direction: rtl; /* Reverse order for star ratings */
        }

        .stars input[type="radio"] {
            display: none;
        }

        .stars label {
            color: #ddd;
            font-size: 30px;
            cursor: pointer;
            transition: color 0.3s;
        }

        .stars input[type="radio"]:checked ~ label {
            color: gold;
        }

        .stars label:hover,
        .stars label:hover ~ label {
            color: gold;
        }

        /* Form styles */
        form {
            margin: 40px 0;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: 600;
            margin: 10px 0;
        }

        input[type="text"], input[type="email"], textarea {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        button[type="submit"] {
            background-color: #3498db;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
        }

        button[type="submit"]:hover {
            background-color: #2980b9;
        }

    </style>
</head>
<body>

<header>
    <div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="promotions.php">Promotions</a></li>
                <li><a href="feedback.php">Customer Feedback</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="demo.php">Request Demo</a></li>
            </ul>
        </nav>
    </div>
</header>

<h1>Customer Feedback</h1>

<form method="POST" action="feedback.php">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="rating">Rating:</label><br>
    <div class="stars">
        <input type="radio" id="star5" name="rating" value="5"><label for="star5" title="5 stars">&#9733;</label>
        <input type="radio" id="star4" name="rating" value="4"><label for="star4" title="4 stars">&#9733;</label>
        <input type="radio" id="star3" name="rating" value="3"><label for="star3" title="3 stars">&#9733;</label>
        <input type="radio" id="star2" name="rating" value="2"><label for="star2" title="2 stars">&#9733;</label>
        <input type="radio" id="star1" name="rating" value="1"><label for="star1" title="1 star">&#9733;</label>
    </div><br><br>

    <label for="comments">Comments:</label><br>
    <textarea id="comments" name="comments" rows="4" required></textarea><br><br>

    <button type="submit">Submit Feedback</button>
</form>

</body>
</html>
