<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="/ecommerce-site/public/css/style.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Your Cart</h1>
        <ul class="cart-list">
            <?php foreach ($cartItems as $item): ?>
                <li class="cart-item">
                    <span><?= htmlspecialchars($item['name']) ?> (<?= $item['quantity'] ?>)</span>
                    <span>$<?= htmlspecialchars($item['price'] * $item['quantity']) ?></span>
                    <button onclick="removeFromCart(<?= $item['id'] ?>)" class="btn btn-danger">Remove</button>
                </li>
            <?php endforeach; ?>
        </ul>
        <h3>Total: $<?= $totalPrice ?></h3>
        <a href="/ecommerce-site/public/checkout" class="btn btn-success">Proceed to Checkout</a>
    </div>
    <script src="/ecommerce-site/public/js/app.js"></script>
</body>
</html>
