<?php
// Include the database connection file
include('ai_solution.php'); // Ensure this file contains your database connection setup

// Include necessary files for sending email
require 'vendor/autoload.php'; // If you're using Composer's autoload
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Define your SMTP email details
$mail_id = 'makrishasapkota00@gmail.com'; // Your Gmail address
$mail_pass = 'oblwagzmnwzmaado'; // Your Gmail App Password (for 2FA enabled accounts)
$mail_refname = 'AI-Solutions'; // The name you want to show as the sender

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $full_name = htmlspecialchars($_POST['full_name']);
    $email = htmlspecialchars($_POST['email']);
    $company_name = htmlspecialchars($_POST['company_name']);
    $phone_number = htmlspecialchars($_POST['phone_number']);
    $message = htmlspecialchars($_POST['message']);

    // Generate a unique verification code (this can be replaced with your own logic)
    $v_code = md5(uniqid(rand(), true)); // Example verification code

    try {
        // Insert user into the database with the generated verification code and status as not verified
        $sql = "INSERT INTO users (email, v_code, is_verified) VALUES (:email, :v_code, 0)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email, 'v_code' => $v_code]);

        // Call sendmail function to send email
        sendmail($email, $v_code);

        echo "<p>A verification link has been sent to your email address. Please check your inbox.</p>";
    } catch (PDOException $e) {
        echo "<h2>Error: " . $e->getMessage() . "</h2>";
    }
}

function sendmail($email, $v_code) {
    global $mail_id, $mail_pass, $mail_refname;

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                        // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                    // Enable SMTP authentication
        $mail->Username   = $mail_id;                                // SMTP username
        $mail->Password   = $mail_pass;                              // SMTP password (use app password if 2FA is enabled)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;          // Enable TLS encryption
        $mail->Port       = 587;                                     // TCP port to connect to

        // Recipients
        $mail->setFrom($mail_id, $mail_refname);                     // Sender's email address
        $mail->addAddress($email);                                   // Recipient's email address

        // Content
        $mail->isHTML(true);                                         // Set email format to HTML
        $mail->Subject = 'Email Verification from Product Development';
        $mail->Body    = "Thanks for registering! Click the link below to verify your email: 
        <a href='http://localhost:81/makrisha/verify.php?email=" . urlencode($email) . "&v_code=" . urlencode($v_code) . "'>Verify</a>";

        // Send the email
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
