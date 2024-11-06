<?php
session_start();

require_once '../config.php';
require_once '../app/Models/Product.php';
require_once '../app/Models/Cart.php';
require_once '../app/Models/User.php';
require_once '../app/Controllers/ProductController.php';
require_once '../app/Controllers/CartController.php';
require_once '../app/Controllers/AdminController.php';

$pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);

$productController = new ProductController(new Product($pdo));
$cartController = new CartController(new Cart($pdo));
$adminController = new AdminController(new Product($pdo), new User($pdo));

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base_path = '/ecommerce-site/public';

$uri = str_replace($base_path, '', $uri); // Remove base path from URI


switch ($uri) {
    case '/':
        $productController->showCatalog($_GET['search'] ?? null);
        break;
    case '/products':
        $productController->showCatalog($_GET['search'] ?? null);
        break;
    case '/product':
        $productController->viewProduct($_GET['id']);
        break;
    case '/cart':
        $cartController->viewCart(session_id());
        break;
    case '/cart/add':
        $data = json_decode(file_get_contents("php://input"), true);
        $cartController->addToCart($data['product_id'], $data['quantity'], session_id());
        break;
    case '/cart/remove':
        $data = json_decode(file_get_contents("php://input"), true);
        $cartController->removeFromCart($data['cart_item_id']);
        break;
    case '/checkout':
        $cartController->checkout(session_id());
        break;
    case '/admin/login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $adminController->login($_POST['username'], $_POST['password']);
        } else {
            $adminController->showLogin();
        }
        break;
    case '/admin/logout':
        $adminController->logout();
        break;
    case '/admin/addProduct':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $adminController->addNewProduct($_POST['name'], $_POST['description'], $_POST['price'], $_POST['category'], $_FILES['image'], $_POST['stock']);
        } else {
            $adminController->addProduct();
        }
        break;
    case '/admin/manageProducts':
        $adminController->manageProducts();
        break;
    default:
        http_response_code(404);
        echo "404 Not Found";
        break;
}
