<?php
// Start session for session management (optional depending on your needs)
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Learn more about AI-Solutions, a leading provider of AI-powered software solutions.">
    <meta name="keywords" content="AI, software solutions, design, engineering, innovation, about us">
    <meta name="author" content="AI-Solutions">
    <title>About Us - AI-Solutions</title>
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
    <section id="about">
        <h1>About AI-Solutions</h1>
        <p>At AI-Solutions, we are at the forefront of technological innovation. Our company provides AI-powered software solutions designed to streamline processes across various industries, including engineering, design, and business operations. With a focus on enhancing productivity, we aim to make cutting-edge technology accessible and affordable for businesses worldwide.</p>

        <h2>Our Mission</h2>
        <p>Our mission is to revolutionize how businesses integrate artificial intelligence to optimize workflows, improve decision-making, and accelerate innovation. By harnessing the power of AI, we aim to deliver scalable solutions that meet the evolving needs of our clients.</p>

        <h2>Our Vision</h2>
        <p>To be a global leader in AI-powered business solutions, creating a smarter future by enabling businesses to adapt and thrive in an increasingly digital world.</p>

        <h2>Why Choose AI-Solutions?</h2>
        <ul>
            <li><strong>Innovative Solutions:</strong> We provide cutting-edge AI tools that empower businesses to stay ahead of the curve.</li>
            <li><strong>Customization:</strong> Our solutions are designed to be adaptable to various industries and business models.</li>
            <li><strong>Expertise:</strong> With a team of experts in AI and business processes, we deliver high-quality solutions that solve real-world problems.</li>
            <li><strong>Support:</strong> We offer 24/7 support, ensuring your business operates seamlessly with our AI tools.</li>
        </ul>

        <h2>Meet the Team</h2>
        <p>Our team is composed of passionate professionals with expertise in AI, software development, engineering, and business operations. Together, we are committed to helping businesses achieve their goals through innovative technology.</p>

        <!-- Optional: Add team members and photos -->
        <ul>
            <li><strong>John Doe</strong> - CEO & Founder</li>
            <li><strong>Jane Smith</strong> - Chief Technology Officer</li>
            <li><strong>Mark Johnson</strong> - Lead AI Engineer</li>
            <li><strong>Sarah Lee</strong> - Director of Business Development</li>
        </ul>
    </section>
</div>

<footer>
    <p>&copy; 2024 AI-Solutions. All Rights Reserved.</p>
    <p>
        <a href="privacy_policy.php" style="color: white; text-decoration: none;">Privacy Policy</a> |
        <a href="terms_of_service.php" style="color: white; text-decoration: none;">Terms of Service</a>
    </p>
    <p>Follow us on:
        <a href="https://facebook.com" target="_blank" style="color: white; text-decoration: none;">Facebook</a> |
        <a href="https://twitter.com" target="_blank" style="color: white; text-decoration: none;">Twitter</a> |
        <a href="https://linkedin.com" target="_blank" style="color: white; text-decoration: none;">LinkedIn</a>
    </p>
</footer>

</body>
</html>
