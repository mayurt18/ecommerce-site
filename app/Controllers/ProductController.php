<?php
class ProductController {
    private $product;

    public function __construct($product) {
        $this->product = $product;
    }

    // Show product catalog with optional search functionality
    public function showCatalog($search = null) {
        $products = $search ? $this->product->searchProducts($search) : $this->product->getAllProducts();
        include '../app/Views/products/catalog.php';
    }

    // Show details of a single product
    public function viewProduct($productId) {
        $product = $this->product->getProductById($productId);
        include '../app/Views/products/product.php';
    }
}
