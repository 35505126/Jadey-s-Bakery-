<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact - Jadey's Bakery</title>
  <link rel="stylesheet" href="styles.css"> 
</head>
<body>

  <!-- Header with Logo and Navigation -->
  <header>
    <nav>
<img src="/assets/images/logo2.png" alt="Jadey's Bakery Logo" id="logo">

      <ul>
        <li><a href="https://jadeysbakery.site">Home</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="https://jadeysbakery.site/submit-a-recipe">Post your recipes!</a></li>
        <li><a href="#">Products</a></li>
      </ul>
    </nav>
  </header>

  <!-- Contact Form Section -->
  <div class="main-content">
    <h2>Contact Us</h2>
    <form action="send_mail.php" method="POST">
      <label>Name:</label><br>
      <input type="text" name="name" required><br><br>

      <label>Email:</label><br>
      <input type="email" name="email" required><br><br>

      <label>Message:</label><br>
      <textarea name="message" rows="5" required></textarea><br><br>

      <button class="btn" type="submit">Send</button>
    </form>
  </div>

</body>
</html>
