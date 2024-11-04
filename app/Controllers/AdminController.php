<?php
class AdminController {
    private $product;
    private $user;

    public function __construct($product, $user) {
        $this->product = $product;
        $this->user = $user;
    }

    // Show login form
    public function showLogin() {
        include '../app/Views/admin/login.php';
    }

    // Authenticate admin login
    public function login($username, $password) {
        if ($this->user->authenticate($username, $password)) {
            $_SESSION['admin_logged_in'] = true;
            header("Location: /ecommerce-site/public/admin/manageProducts");
        } else {
            echo "Invalid credentials.";
        }
    }

    // Logout admin
    public function logout() {
        unset($_SESSION['admin_logged_in']);
        header("Location: /ecommerce-site/public/admin/login");
    }

    // Display add product form
    public function addProduct() {
        include '../app/Views/admin/addProduct.php';
    }

    // Add new product
    public function addNewProduct($name, $description, $price, $category, $image, $stock) {
        $this->product->addProduct($name, $description, $price, $category, $image, $stock);
        header("Location: /ecommerce-site/public/admin/manageProducts");
    }

    // Manage products
    public function manageProducts() {
        if (!isset($_SESSION['admin_logged_in'])) {
            header("Location: /ecommerce-site/public/admin/login");
        }
        $products = $this->product->getAllProducts();
        include '../app/Views/admin/manageProducts.php';
    }
}
