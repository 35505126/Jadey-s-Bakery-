<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = htmlspecialchars($_POST['name']);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$message = htmlspecialchars($_POST['message']);

	$mail = new PHPMailer(true);

	try {
		// SMTP settings for Amazon SES
		$mail->isSMTP();
		$mail->Host       = 'email-smtp.ap-southeast-1.amazonaws.com'; 
		$mail->SMTPAuth   = true;
		$mail->Username   = 'YOUR_SES_SMTP_USERNAME';
		$mail->Password   = 'YOUR_SES_SMTP_PASSWORD';
		$mail->SMTPSecure = 'tls';
		$mail->Port       = 587;

		$mail->setFrom('jadeysbakery.site', $name); // SES email
		$mail->addAddress('jadeysbakery@gmail.com');       // Receiving email
		$mail->addReplyTo($email, $name);

		$mail->Subject = "New Contact Form Submission from $name";
		$mail->Body    = "Name: $name\nEmail: $email\n\nMessage:\n$message";

		$mail->send();
		echo "Thank you, $name. Your message has been sent.";
	} catch (Exception $e) {
		echo "Sorry, there was an error sending your message. Mailer Error: {$mail->ErrorInfo}";
	}
} else {
	echo "Invalid request.";
}
?>
