<?php
class Cart {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Add item to cart
    public function addToCart($productId, $quantity, $sessionId) {
        $stmt = $this->pdo->prepare("SELECT * FROM cart_items WHERE product_id = :product_id AND session_id = :session_id");
        $stmt->execute(['product_id' => $productId, 'session_id' => $sessionId]);
        $item = $stmt->fetch();

        if ($item) {
            $stmt = $this->pdo->prepare("UPDATE cart_items SET quantity = quantity + :quantity WHERE id = :id");
            $stmt->execute(['quantity' => $quantity, 'id' => $item['id']]);
        } else {
            $stmt = $this->pdo->prepare("INSERT INTO cart_items (product_id, quantity, session_id) VALUES (:product_id, :quantity, :session_id)");
            $stmt->execute(['product_id' => $productId, 'quantity' => $quantity, 'session_id' => $sessionId]);
        }
    }

    // Get cart items for a session
    public function getCartItems($sessionId) {
        $stmt = $this->pdo->prepare("SELECT cart_items.*, products.name, products.price FROM cart_items JOIN products ON cart_items.product_id = products.id WHERE session_id = :session_id");
        $stmt->execute(['session_id' => $sessionId]);
        return $stmt->fetchAll();
    }

    // Calculate total price of cart items
    public function calculateTotalPrice($sessionId) {
        $stmt = $this->pdo->prepare("SELECT SUM(products.price * cart_items.quantity) AS total FROM cart_items JOIN products ON cart_items.product_id = products.id WHERE session_id = :session_id");
        $stmt->execute(['session_id' => $sessionId]);
        $result = $stmt->fetch();
        return $result['total'] ?? 0;
    }

    // Remove item from cart
    public function removeFromCart($cartItemId) {
        $stmt = $this->pdo->prepare("DELETE FROM cart_items WHERE id = :id");
        $stmt->execute(['id' => $cartItemId]);
    }

    // Complete order and clear cart
    public function completeOrder($sessionId, $total) {
        $stmt = $this->pdo->prepare("INSERT INTO orders (session_id, total) VALUES (:session_id, :total)");
        $stmt->execute(['session_id' => $sessionId, 'total' => $total]);

        // Clear cart items
        $stmt = $this->pdo->prepare("DELETE FROM cart_items WHERE session_id = :session_id");
        $stmt->execute(['session_id' => $sessionId]);
    }
}
