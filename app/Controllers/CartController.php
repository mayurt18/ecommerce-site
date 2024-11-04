<?php
class CartController {
    private $cart;

    public function __construct($cart) {
        $this->cart = $cart;
    }

    // Display cart items and calculate total price
    public function viewCart($sessionId) {
        $cartItems = $this->cart->getCartItems($sessionId);
        $totalPrice = $this->cart->calculateTotalPrice($sessionId);
        include '../app/Views/cart/view.php';
    }

    // Add item to cart via AJAX
    public function addToCart($productId, $quantity, $sessionId) {
        $this->cart->addToCart($productId, $quantity, $sessionId);
        echo json_encode(["status" => "success"]);
    }

    // Remove item from cart via AJAX
    public function removeFromCart($cartItemId) {
        $this->cart->removeFromCart($cartItemId);
        echo json_encode(["status" => "success"]);
    }

    // Complete checkout process
    public function checkout($sessionId) {
        $totalPrice = $this->cart->calculateTotalPrice($sessionId);
        if ($totalPrice > 0) {
            $this->cart->completeOrder($sessionId, $totalPrice);
            include '../app/Views/cart/checkout.php';
        } else {
            echo "Your cart is empty.";
        }
    }
}
