<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="/ecommerce-site/public/css/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="/ecommerce-site/public/admin/login" method="POST" class="login-form">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
