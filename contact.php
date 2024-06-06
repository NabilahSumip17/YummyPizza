<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Yummy Pizza</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Contact Us</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="aboutus.php">About Us</a></li>
               <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="contact">
            <h2>Contact Information</h2>
            <p>Email: info@yummypizza.com</p>
            <p>Phone: 06 976 4823</p>
            <p>Address: 123 Pizza Street, Pizza City</p>
        </section>
        <section id="contact-form">
            <h2>Get in Touch</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>

                <button type="submit">Send</button>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $message = $_POST["message"];
                $to = "your_email@example.com"; // Replace with your email address
                $subject = "New Contact Form Submission";
                $body = "Name: $name\nEmail: $email\nMessage:\n$message";
                if (mail($to, $subject, $body)) {
                    echo "<p class='success'>Thank you for contacting us! We will get back to you soon.</p>";
                } else {
                    echo "<p class='error'>Oops! Something went wrong. Please try again later.</p>";
                }
            }
            ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Yummy Pizza. All rights reserved.</p>
    </footer>
</body>
</html>
