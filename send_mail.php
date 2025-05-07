<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = htmlspecialchars($_POST['name']);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$message = htmlspecialchars($_POST['message']);

	$to = "your-email@example.com";  // Replace with your real email
	$subject = "New Contact Form Submission from $name";
	$body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
	$headers = "From: $email";

	if (mail($to, $subject, $body, $headers)) {
		echo "Thank you, $name. Your message has been sent.";
	} else {
		echo "Sorry, there was an error sending your message.";
	}
} else {
	echo "Invalid request.";
}
?>
