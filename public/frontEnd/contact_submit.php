<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $query = $_POST['query'];
    $message = $_POST['message'];

    $to = "admin@galaxystaffing.co.uk"; // Replace with your email address
    $subject = $query;
    $body = "Name: $name\nEmail: $email\nContact Number: $contact\nAddress: $address\nQuery: $query\nMessage: $message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "<p>Message sent successfully!</p>";
    } else {
        echo "<p>Failed to send message.</p>";
    }
} else {
    echo "<p>Invalid request.</p>";
}
?>
