<?php
session_start();

$cart_items = isset($_SESSION["cart"]) ? $_SESSION["cart"] : array();
$total_price = 0;

foreach ($cart_items as $item) {
    $total_price += $item["price"];
}

// Payment processing logic goes here

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Clear the cart after successful payment
    unset($_SESSION["cart"]);
    $payment_successful = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Yummy Pizza</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Checkout</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="cart.php">Cart</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="checkout">
            <h2>Checkout Summary</h2>
            <?php if (!empty($cart_items)): ?>
                <ul>
                    <?php foreach ($cart_items as $item): ?>
                        <li><?php echo $item["name"]; ?> - $<?php echo $item["price"]; ?></li>
                    <?php endforeach; ?>
                </ul>
                <p>Total Price: $<?php echo $total_price; ?></p>
                <?php if (isset($payment_successful) && $payment_successful): ?>
                    <p>Thank you for your purchase! Your order has been placed successfully.</p>
                <?php else: ?>
                    <form action="checkout.php" method="POST">
                        <button type="submit">Confirm Payment</button>
                    </form>
                <?php endif; ?>
            <?php else: ?>
                <p>Your cart is empty. <a href="menu.php">Go back to menu</a></p>
            <?php endif; ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Yummy Pizza. All rights reserved.</p>
    </footer>
</body>
</html>
