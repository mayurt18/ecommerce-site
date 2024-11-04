<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Products</title>
    <link rel="stylesheet" href="/ecommerce-site/public/css/style.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Manage Products</h1>
        <div class="product-list">
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <h3><?= htmlspecialchars($product['name']) ?></h3>
                    <p>$<?= htmlspecialchars($product['price']) ?></p>
                    <a href="/ecommerce-site/public/admin/editProduct?id=<?= $product['id'] ?>" class="btn btn-secondary">Edit</a>
                    <a href="/ecommerce-site/public/admin/deleteProduct?id=<?= $product['id'] ?>" class="btn btn-danger">Delete</a>
                </div>
            <?php endforeach; ?>
        </div>
        <a href="/ecommerce-site/public/admin/addProduct" class="btn btn-primary">Add New Product</a>
        <a href="/ecommerce-site/public/admin/logout" class="btn btn-secondary">Logout</a>
    </div>
</body>
</html>
