<?php
// Start session to handle admin login state
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AI-Solutions offers AI-powered software solutions to streamline design, engineering, and innovation.">
    <meta name="keywords" content="AI, virtual assistant, business solutions, prototyping, engineering, design, innovation">
    <meta name="author" content="AI-Solutions">
    <title>AI-Solutions</title>
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
    <!-- Company Introduction Section -->
    <section id="intro">
    <h1>Welcome to AI-Solutions</h1>
    <p>AI-Solutions is at the forefront of technological innovation, offering AI-powered software solutions designed to enhance design, engineering, and innovation processes in businesses. Our virtual assistants use the power of AI to streamline workflows, boost productivity, and provide affordable prototyping solutions.</p>
    
    <!-- Embed YouTube Video with iframe -->
   <iframe width="560" height="315" src="https://www.youtube.com/embed/D5VN56jQMWM?si=qIwSabplQh25Uv91" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

<section id="intro">
    <h1>Demo to AI-Solutions</h1>
    <p>AI-Solutions is at the forefront of technological innovation, offering AI-powered software solutions designed to enhance design, engineering, and innovation processes in businesses. Our virtual assistants use the power of AI to streamline workflows, boost productivity, and provide affordable prototyping solutions.</p>
    
    <!-- Embed YouTube Video with iframe -->
    <iframe width="560" height="315" src="https://www.youtube.com/embed/TXhr_RrZQBQ?si=lpKAI3WMaVZ-csj4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
</section>
    <!-- Features & Benefits Section -->
    <section id="features-benefits">
        <h2>Features of Our AI-Powered Virtual Assistant</h2>
        <ul>
            <li><strong>Automation of Repetitive Tasks:</strong> Reduce human error and time spent on mundane tasks.</li>
            <li><strong>Real-Time Problem Solving:</strong> AI assistant helps in solving engineering and design problems instantly.</li>
            <li><strong>Customizable for Different Industries:</strong> Tailor our AI tools to meet the needs of various business sectors.</li>
            <li><strong>Affordable Prototyping:</strong> Quickly generate design prototypes and simulations using AI.</li>
            <li><strong>Advanced Analytics:</strong> Leverage AI insights to make data-driven decisions efficiently.</li>
            <li><strong>Seamless Integration:</strong> Easily integrate our AI tools with existing systems and workflows.</li>
            <li><strong>24/7 Support:</strong> AI-powered support available around the clock for your convenience.</li>
            <li><strong>Cloud-Based Solutions:</strong> Our AI tools are fully cloud-based for scalability and flexibility.</li>
        </ul>

        <h2>Benefits to Industries</h2>
        <ul>
            <li><strong>Engineering:</strong> Improve project timelines and efficiency with AI-driven project management tools.</li>
            <li><strong>Design:</strong> Accelerate the design process with AI tools that predict and recommend design modifications.</li>
            <li><strong>Healthcare:</strong> Streamline patient care and optimize administrative workflows using AI-powered tools.</li>
            <li><strong>Innovation:</strong> Use AI to explore new product ideas and enhance innovation in your business.</li>
            <li><strong>Retail:</strong> Enhance customer experiences with personalized AI-driven recommendations.</li>
        </ul>
    </section>

    <!-- Call to Action (CTA) Section -->
    <section id="cta">
        <h2>Ready to Enhance Your Business?</h2>
        <p>If you are interested in learning more about how AI-Solutions can help your business grow, we’d love to hear from you. Schedule a consultation or request a demo!</p>
        <a href="contact.php" class="btn">Contact Us</a>
        <a href="demo.php" class="btn">Request a Demo</a>
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
