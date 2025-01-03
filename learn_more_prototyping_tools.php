<?php
// Start session if needed
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn More About Prototyping Tools | AI-Solutions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }

        header {
            background-color: #333;
            color: #7926B6;
            padding: 10px 0;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #7926B6;
            text-decoration: none;
        }

        section h2 {
            color: #333;
        }

        .btn {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #555;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        .prototyping-tool {
            padding: 10px;
            background-color: #fff;
            margin: 15px 0;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .prototyping-tool h3 {
            margin: 0;
            color: #7926B6;
        }

        .prototyping-tool p {
            color: #555;
        }
    </style>
</head>
<body>

<header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="promotions.php">Promotions</a></li>
            <li><a href="learn_more_prototyping_tools.php">Learn More About Prototyping Tools</a></li>
        </ul>
    </nav>
</header>

<div class="container">
    <!-- Company Introduction Section -->
    <section id="intro">
        <h1>Prototyping Tools Offered by AI-Solutions</h1>
        <p>At AI-Solutions, we provide state-of-the-art AI-powered tools that help businesses create high-quality prototypes quickly and affordably. Our prototyping tools are designed to streamline the design process, reduce costs, and allow businesses to explore new ideas with ease.</p>
    </section>

    <!-- Prototyping Tools Section -->
    <section id="prototyping-tools">
        <h2>Our Prototyping Tools</h2>

        <div class="prototyping-tool">
            <h3>AI-Powered Design Simulation</h3>
            <p>Our design simulation tool uses artificial intelligence to generate realistic simulations of product designs. It allows businesses to test their concepts virtually before committing to physical prototypes.</p>
        </div>

        <div class="prototyping-tool">
            <h3>3D Printing Prototyping</h3>
            <p>AI-Solutions integrates 3D printing technologies into our prototyping process. We provide quick, affordable, and customizable 3D prototypes that help companies visualize and refine their product designs faster.</p>
        </div>

        <div class="prototyping-tool">
            <h3>Interactive Virtual Prototyping</h3>
            <p>Our interactive virtual prototyping tool enables users to interact with product designs in a virtual environment. This tool allows you to experience your designs from every angle, making it easier to identify potential issues and make improvements.</p>
        </div>

        <div class="prototyping-tool">
            <h3>Collaborative Feedback System</h3>
            <p>With our AI-driven collaborative platform, you can share your prototypes with stakeholders, get real-time feedback, and make informed decisions before moving into production. This system saves time and reduces the chances of costly mistakes.</p>
        </div>
    </section>

    <!-- Call to Action (CTA) Section -->
    <section id="cta">
        <h2>Interested in Trying Our Prototyping Tools?</h2>
        <p>Contact us today to learn more about how our AI-powered prototyping tools can help your business innovate and grow.</p>
        <a href="contact.php" class="btn">Contact Us</a>
    </section>
</div>

<footer>
    <p>&copy; 2024 AI-Solutions. All Rights Reserved.</p>
</footer>

</body>
</html>
