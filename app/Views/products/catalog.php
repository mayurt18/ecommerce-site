<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Catalog</title>
    <link rel="stylesheet" href="/ecommerce-site/public/css/style.css">
</head>
<body>
    <header>
        <h1 class="text-center">Product Catalog</h1>
        <div class="navigation">
            <a href="/ecommerce-site/public" class="btn btn-home">Home</a>
            <a href="/ecommerce-site/public/cart" class="btn btn-cart">Go to Cart</a>
        </div>
    </header>

    <form method="GET" action="/ecommerce-site/public/products" class="search-form">
        <input type="text" name="search" placeholder="Search products..." class="search-bar" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <div class="product-list">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <img src="/ecommerce-site/public/images/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="product-image">
                    <h3><?= htmlspecialchars($product['name']) ?></h3>
                    <p>$<?= htmlspecialchars($product['price']) ?></p>
                    <a href="/ecommerce-site/public/product?id=<?= $product['id'] ?>" class="btn btn-info">View Details</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No products found for "<?= htmlspecialchars($_GET['search'] ?? '') ?>"</p>
        <?php endif; ?>
    </div>
</body>
</html>
