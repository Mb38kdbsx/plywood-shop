let cart = JSON.parse(localStorage.getItem("cart")) || [];

function addToCart(product, price) {
  // Check if item already exists in cart
  const existingItem = cart.find(item => item.product === product);

  if (existingItem) {
    existingItem.qty += 1; // Increase quantity
  } else {
    cart.push({ product, price, qty: 1 }); // Add new item
  }

  localStorage.setItem("cart", JSON.stringify(cart));
  
  // Professional UI feedback
  showNotification(`${product} added to cart!`);
}

function showNotification(message) {
  const toast = document.createElement("div");
  toast.style.cssText = `
    position: fixed; bottom: 20px; left: 50%; transform: translateX(-50%);
    background: #c68642; color: white; padding: 12px 25px; border-radius: 5px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2); z-index: 9999; font-weight: bold;
  `;
  toast.textContent = message;
  document.body.appendChild(toast);
  
  setTimeout(() => toast.remove(), 3000);
}