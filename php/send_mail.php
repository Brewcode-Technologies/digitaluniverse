<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    $to = "laxman.a@brewcode.co"; 
    $email_subject = "Contact Form Submission: $subject";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    $body = "You have received a new message from your contact form:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Subject: $subject\n\n";
    $body .= "Message:\n$message\n";

    if (mail($to, $email_subject, $body, $headers)) {
        echo "<script>alert('Message sent successfully.'); window.location.href = 'contact.html';</script>";
    } else {
        echo "<script>alert('Failed to send message. Please try again later.'); window.history.back();</script>";
    }
} else {
    echo "Invalid request method.";
}
?>
