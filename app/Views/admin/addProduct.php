<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <link rel="stylesheet" href="/ecommerce-site/public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Add New Product</h1>
        <form action="/ecommerce-site/public/admin/addProduct" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Product Name" required>
            <textarea name="description" placeholder="Description" required></textarea>
            <input type="number" name="price" step="0.01" placeholder="Price" required>
            <input type="text" name="category" placeholder="Category" required>
            <input type="number" name="stock" placeholder="Stock Quantity" required>
            <input type="file" name="image" required>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
        <a href="/ecommerce-site/public/admin/manageProducts" class="btn btn-secondary">Back to Product Management</a>
    </div>
</body>
</html>
