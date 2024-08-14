<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipientEmail = $_POST['recipient_email'];
    $subject = $_POST['email_subject'];
    $message = $_POST['email_body'];

    // Set additional headers
    $headers = "From: your_email@example.com"; // Replace with your email address
    $headers .= "Content-type: text/html; charset=UTF-8";

    // Attempt to send the email
    if (mail($recipientEmail, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email. Please try again.";
    }
}
?>
