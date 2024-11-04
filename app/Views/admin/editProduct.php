<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link rel="stylesheet" href="/ecommerce-site/public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Product</h1>
        <form action="/ecommerce-site/public/admin/updateProduct?id=<?= $product['id'] ?>" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Product Name" value="<?= htmlspecialchars($product['name']) ?>" required>
            <textarea name="description" placeholder="Description" required><?= htmlspecialchars($product['description']) ?></textarea>
            <input type="number" name="price" step="0.01" placeholder="Price" value="<?= htmlspecialchars($product['price']) ?>" required>
            <input type="text" name="category" placeholder="Category" value="<?= htmlspecialchars($product['category']) ?>" required>
            <input type="number" name="stock" placeholder="Stock Quantity" value="<?= htmlspecialchars($product['stock']) ?>" required>
            <input type="file" name="image">
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
        <a href="/ecommerce-site/public/admin/manageProducts" class="btn btn-secondary">Back to Product Management</a>
    </div>
</body>
</html>
