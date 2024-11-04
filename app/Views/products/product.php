<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Details</title>
    <link rel="stylesheet" href="/ecommerce-site/public/css/style.css">
</head>
<body>

    <div class="container">
        

        <div class="product-details">
            <img src="/ecommerce-site/public/images/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="product-image">
            <h2><?= htmlspecialchars($product['name']) ?></h2>
            <p><?= htmlspecialchars($product['description']) ?></p>
            <p><strong>Price:</strong> $<?= htmlspecialchars($product['price']) ?></p>
            <form id="add-to-cart-form">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" value="1" min="1" class="quantity-input">
                <button type="button" class="btn btn-primary" onclick="addToCart(<?= $product['id'] ?>)">Add to Cart</button>
            </form>
        </div>
    </div>
    <div class="navigation">
            <a href="/ecommerce-site/public" class="btn btn-home">Home</a>
            <a href="/ecommerce-site/public/cart" class="btn btn-cart">Go to Cart</a>
        </div>
    <script src="/ecommerce-site/public/js/app.js"></script>
</body>
</html>
