<?php
class Product {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Get all products
    public function getAllProducts() {
        $stmt = $this->pdo->prepare("SELECT * FROM products ORDER BY name ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Get product details by ID
    public function getProductById($productId) {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute(['id' => $productId]);
        return $stmt->fetch();
    }

    // Search for products by keyword
    public function searchProducts($keyword) {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE name LIKE :keyword OR category LIKE :keyword");
        $stmt->execute(['keyword' => "%$keyword%"]);
        return $stmt->fetchAll();
    }

    // Add a new product
    public function addProduct($name, $description, $price, $category, $image, $stock) {
        $stmt = $this->pdo->prepare("INSERT INTO products (name, description, price, category, image, stock) VALUES (:name, :description, :price, :category, :image, :stock)");
        return $stmt->execute([
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'category' => $category,
            'image' => $image,
            'stock' => $stock
        ]);
    }
}
