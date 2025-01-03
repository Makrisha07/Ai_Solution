<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


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

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate the form data
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['job_requirements'])) {
        $error = "All fields are required.";
    } else {
        // Sanitize input data
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $job_requirements = htmlspecialchars($_POST['job_requirements']);
        
        // Insert into database
        $stmt = $conn->prepare("INSERT INTO inquiries (name, email, job_requirements) VALUES (?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sss", $name, $email, $job_requirements);
            if ($stmt->execute()) {
                $success = "Thank you for contacting us, $name. We will get back to you shortly.";
            } else {
                $error = "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $error = "Failed to prepare the statement: " . $conn->error;
        }

    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - AI-Solutions</title>
    <style>
        
        /* Basic styles for layout */
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
    
    /* Align auth buttons (Admin Login) */
    .auth-buttons {
        display: flex;
        gap: 20px;
    }
    
    .admin-login-btn {
        color: #fff;
        background-color: #3498db;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
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
    
        /* Modal Styles */
        #addProductModal, #editProductModal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
            padding-top: 60px;
        }
    
        .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 30px;
            border-radius: 8px;
            width: 80%;
            max-width: 600px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    
        .close {
            color: #aaa;
            float: right;
            font-size: 30px;
            font-weight: bold;
        }
    
        .close:hover,
        .close:focus {
            color: #333;
            text-decoration: none;
            cursor: pointer;
        }
    
        input[type="text"], textarea, input[type="url"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
    
        input[type="submit"] {
            background-color: #3498db;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
        }
    
        input[type="submit"]:hover {
            background-color: #2980b9;
        }
    
        /* Position the Admin Login button at the top left corner */
    .admin-login-btn {
        position: absolute;
        top: 5px; /* Adjust the top value to move the button down */
        left: 1000px; /* Adjust the left value to move the button to the left */
        color: #fff;
        background-color: #3498db;
        padding: 10px 20px;
        text-decoration: none;
        border-left: 5px solid #fff; /* Add border-left for styling */
        font-size: 16px;
        font-weight: 600;
    }
    
    .admin-login-btn:hover {
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
    <div>
        <a href="admin_login.php" class="admin-login-btn">Admin Login</a>
    </div>
</header>

<div class="container">
    <h1>Contact Us</h1>

    <?php if ($error): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <?php if ($success): ?>
        <p class="success"><?php echo $success; ?></p>
    <?php endif; ?>

    <form method="POST" action="contact.php">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Your Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="job_requirements">Job Requirements:</label>
        <textarea id="job_requirements" name="job_requirements" rows="5" required></textarea>

        <button type="submit">Submit Inquiry</button>
    </form>
</div>
<section id="cta">
        
        <p>If you are interested in learning more about how AI-Solutions can help your business grow, we’d love to hear from you. Schedule a consultation or request a demo!</p>
       
        <a href="demo.php" class="btn">Request a Demo</a>
    </section>

<footer>
    <p>&copy; 2024 AI-Solutions. All Rights Reserved.</p>
</footer>

</body>
</html>
