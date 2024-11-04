<?php
class ProductController {
    private $product;

    public function __construct($product) {
        $this->product = $product;
    }

    public function showCatalog($search = null) {
        $products = $search ? $this->product->searchProducts($search) : $this->product->getAllProducts();
        include '../app/Views/products/catalog.php';
    }

    public function viewProduct($productId) {
        $product = $this->product->getProductById($productId);
        include '../app/Views/products/product.php';
    }
}
