<?php
// Include the database connection file
include('ai_solution.php'); // Ensure this file contains your database connection setup

// Check if email and verification code are set in the URL
if (isset($_GET['email']) && isset($_GET['v_code'])) {
    $email = htmlspecialchars($_GET['email']);
    $v_code = htmlspecialchars($_GET['v_code']);

    try {
        // Query to check if the email and verification code exist in the database
        $sql = "SELECT * FROM users WHERE email = :email AND v_code = :v_code AND is_verified = 0"; // Check if it's not verified
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email, 'v_code' => $v_code]);

        if ($stmt->rowCount() > 0) {
            // Update the user's verification status
            $update_sql = "UPDATE users SET is_verified = 1 WHERE email = :email";
            $update_stmt = $pdo->prepare($update_sql);
            $update_stmt->execute(['email' => $email]);

            echo "<h2>Your email has been successfully verified!</h2>";
            echo "<p>You can now <a href='index.php'>login</a> to your account.</p>";
        } else {
            echo "<h2>Invalid verification link or the account is already verified.</h2>";
        }
    } catch (PDOException $e) {
        echo "<h2>Error: " . $e->getMessage() . "</h2>";
    }
} else {
    echo "<h2>Invalid request. Missing email or verification code.</h2>";
}
?>
