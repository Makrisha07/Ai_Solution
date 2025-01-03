<?php
// Start session for session management (optional depending on your needs)
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Explore the services offered by AI-Solutions, AI-powered software solutions for businesses.">
    <meta name="keywords" content="AI, software solutions, design, engineering, business services, automation, prototyping">
    <meta name="author" content="AI-Solutions">
    <title>Services - AI-Solutions</title>
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
    <section id="services">
        <h1>Our Services</h1>
        <p>At AI-Solutions, we provide a range of AI-powered software solutions designed to streamline processes, enhance business efficiency, and drive innovation across industries. Explore our services below:</p>

        <!-- Service 1 -->
        <div class="service">
            <h2>AI-Powered Virtual Assistant</h2>
            <p>Our virtual assistant helps automate repetitive tasks, enhance decision-making, and improve overall efficiency by leveraging advanced AI technology. It can be tailored to meet the specific needs of your business, from customer service to process optimization.</p>
        </div>

        <!-- Service 2 -->
        <div class="service">
            <h2>AI-Driven Prototyping & Design</h2>
            <p>Accelerate your design process with AI tools that generate prototypes and simulations. Our AI solutions predict design modifications and recommend improvements based on real-time data and feedback, reducing time-to-market for new products.</p>
        </div>

        <!-- Service 3 -->
        <div class="service">
            <h2>Custom AI Solutions for Businesses</h2>
            <p>We understand that every business is unique. Our team works with you to develop custom AI-powered solutions that fit your specific business goals, whether it’s enhancing customer experiences, improving operational efficiency, or innovating new products and services.</p>
        </div>

        <!-- Service 4 -->
        <div class="service">
            <h2>AI-Based Analytics & Insights</h2>
            <p>Our AI tools analyze large datasets to provide actionable insights, allowing you to make data-driven decisions. By leveraging machine learning and predictive analytics, we help you uncover trends, optimize performance, and improve business strategies.</p>
        </div>

        <!-- Service 5 -->
        <div class="service">
            <h2>24/7 AI-Powered Support</h2>
            <p>Our AI-powered support tools are available around the clock to assist you and your customers. From troubleshooting issues to answering queries, our AI solutions ensure seamless and timely assistance, improving customer satisfaction and reducing operational costs.</p>
        </div>

        <!-- Service 6 -->
        <div class="service">
            <h2>Cloud-Based AI Solutions</h2>
            <p>We provide cloud-based AI solutions that are scalable, flexible, and secure. Whether you're a small business or a large enterprise, our cloud solutions ensure you have access to the latest AI technologies, without the need for extensive infrastructure.</p>
        </div>

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
