// Add item to cart via AJAX
function addToCart(productId) {
    const quantity = document.querySelector("input[name='quantity']").value;

    fetch(`/ecommerce-site/public/cart/add`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ product_id: productId, quantity })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') alert('Item added to cart!');
    })
    .catch(error => console.error('Error:', error));
}

// Remove item from cart via AJAX
function removeFromCart(cartItemId) {
    fetch(`/ecommerce-site/public/cart/remove`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ cart_item_id: cartItemId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') location.reload();
    })
    .catch(error => console.error('Error:', error));
}
