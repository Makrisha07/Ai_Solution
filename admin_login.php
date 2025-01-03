<?php
session_start();

$error = ''; // Variable to hold any login error

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hardcoded admin credentials (change for real applications)
    $admin_username = 'admin';
    $admin_password = 'Bless@123'; // Use a more secure password in production

    // Get username and password from POST
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Check if the entered credentials match the hardcoded ones
    if ($username == $admin_username && $password == $admin_password) {
        // Set session to indicate that the admin is logged in
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_panel.php"); // Redirect to admin panel
    } else {
        $error = 'Invalid username or password. Please try again.';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - AI-Solutions</title>
    <style>
        body {
    background-image: url('assets/three.jpg');
    background-size: cover; /* Ensure the background image covers the whole viewport */
    background-position: center; /* Center the image */
    background-repeat: no-repeat; /* Prevent repeating the image */
    height: 100%; /* Make the body take the full height of the page */
    font-family: Arial, sans-serif;
    color: #343a40;
}

        .container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 100px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .input-group {
            margin-bottom: 15px;
        }
        .input-group label {
            font-size: 14px;
            color: #555;
        }
        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        .button {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .button:hover {
            background-color: #555;
        }
        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<div>
        <a href="index.php" class="Index.php">Home Page</a>
    </div>
<body>

<div class="container">
    <h2>Admin Login</h2>
    <?php if ($error): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    
    <!-- Admin login form -->
    <form method="POST" action="admin_login.php">
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="button">Login</button>
    </form>
</div>

</body>
</html>
