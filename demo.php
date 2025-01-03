<?php
// Start session to handle admin login state
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Request a demo for AI-Solutions and experience our AI-powered software solutions firsthand.">
    <title>Request a Demo - AI-Solutions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 50px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            display: flex;
        }

        nav ul li {
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .form-container h2 {
            color: #333;
        }

        .form-container label {
            display: block;
            margin: 10px 0 5px;
        }

        .form-container input, .form-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container button {
            background-color: #7926B6;
            color: #fff;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #5c1c9e;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
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
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="container">
    <section id="request-demo">
        <div class="form-container">
            <h2>Request a Demo</h2>
            <p>Fill out the form below to schedule a personalized demo of AI-Solutions for your business.</p>

            <!-- Demo Request Form -->
            <form action="demo_request_handler.php" method="POST">
                <label for="full_name">Full Name:</label>
                <input type="text" id="full_name" name="full_name" required>

                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>

                <label for="company_name">Company Name:</label>
                <input type="text" id="company_name" name="company_name" required>

                <label for="phone_number">Phone Number:</label>
                <input type="tel" id="phone_number" name="phone_number" required>

                <label for="message">Message (Optional):</label>
                <textarea id="message" name="message" rows="4" placeholder="Tell us a bit about your business and what you’re looking for in a demo."></textarea>

                <button type="submit">Request Demo</button>
            </form>
        </div>
    </section>
</div>

<footer>
    <p>&copy; 2024 AI-Solutions. All Rights Reserved.</p>
</footer>

</body>
</html>
