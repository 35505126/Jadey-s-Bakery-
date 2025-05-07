<!-- contact.php -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contact Us - Jadey's Bakery</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<header>
		<nav>
			<img src="logo.png" alt="Jadey's Bakery Logo" id="logo">
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Spare Parts</a></li>
				<li><a href="#">Product List</a></li>
				<li><a href="contact.php">Contact Us</a></li>
			</ul>
		</nav>
	</header>

	<main>
		<h1>Contact Us</h1>
		<form action="send_mail.php" method="post">
			<label for="name">Your Name:</label><br>
			<input type="text" id="name" name="name" required><br><br>

			<label for="email">Your Email:</label><br>
			<input type="email" id="email" name="email" required><br><br>

			<label for="message">Your Message:</label><br>
			<textarea id="message" name="message" rows="6" required></textarea><br><br>

			<button type="submit">Send</button>
		</form>
	</main>

	<footer>
		<p>&copy; 2025 Jadey's Bakery</p>
	</footer>
</body>
</html>
