<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Yummy Pizza</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Our Menu</h1>
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
        <section id="menu">
            <h2>Our Menu</h2>
            <div class="menu-item">
                <img src="images/pizza1.jpg" alt="Pepperoni Pizza">
                <h3>Pepperoni Pizza</h3>
                <p>RM15</p>
                <form action="cart.php" method="POST">
                    <input type="hidden" name="item_name" value="Pepperoni Pizza">
                    <input type="hidden" name="item_price" value="10">
                    <button type="submit">Add to Cart</button>
                </form>
            </div>
            <div class="menu-item">
                <img src="images/pizza2.jpg" alt="Margherita Pizza">
                <h3>Margherita Pizza</h3>
                <p>RM8</p>
                <form action="cart.php" method="POST">
                    <input type="hidden" name="item_name" value="Margherita Pizza">
                    <input type="hidden" name="item_price" value="8">
                    <button type="submit">Add to Cart</button>
                </form>
            </div>
            <!-- Add more menu items as needed -->
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Yummy Pizza. All rights reserved.</p>
    </footer>
</body>
</html>
