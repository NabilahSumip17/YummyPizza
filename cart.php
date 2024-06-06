<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_name = $_POST["item_name"];
    $item_price = $_POST["item_price"];

    $cart_item = array("name" => $item_name, "price" => $item_price);

    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    $_SESSION["cart"][] = $cart_item;
}

if (isset($_GET['action']) && $_GET['action'] == 'clear') {
    unset($_SESSION["cart"]);
}

$cart_items = isset($_SESSION["cart"]) ? $_SESSION["cart"] : array();
$total_price = 0;

foreach ($cart_items as $item) {
    $total_price += $item["price"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Yummy Pizza</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Your Cart</h1>
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
        <section id="cart">
            <h2>Cart Items</h2>
            <?php if (empty($cart_items)): ?>
                <p>Your cart is empty.</p>
            <?php else: ?>
                <ul>
                    <?php foreach ($cart_items as $item): ?>
                        <li><?php echo $item["name"]; ?> - $<?php echo $item["price"]; ?></li>
                    <?php endforeach; ?>
                </ul>
                <p>Total Price: $<?php echo $total_price; ?></p>
                <form action="checkout.php" method="POST">
                    <button type="submit">Proceed to Checkout</button>
                </form>
                <form action="cart.php?action=clear" method="POST">
                    <button type="submit">Clear Cart</button>
                </form>
            <?php endif; ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Yummy Pizza. All rights reserved.</p>
    </footer>
</body>
</html>
