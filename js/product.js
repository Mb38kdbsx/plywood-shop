const products = {
  commercial: {
    name: "Commercial Plywood",
    price: 18000,
    image: "images/commercial.jpg",
    desc: "Our Commercial Plywood is engineered for strength and versatility. Ideal for interior partitions, ceilings, and general construction projects in Nigeria."
  },
  marine: {
    name: "Marine Board",
    price: 28000,
    image: "images/marine.jpg",
    desc: "High-grade Marine Board designed to withstand moisture. Perfect for high-humidity areas like kitchens, bathrooms, and outdoor carpentry."
  },
  block: {
    name: "Block Board",
    price: 22000,
    image: "images/block.jpg",
    desc: "Premium Block Board featuring a solid core. It offers excellent screw-holding strength, making it the top choice for custom wardrobes and heavy-duty doors."
  }
};

const params = new URLSearchParams(window.location.search);
const key = params.get("type");
const product = products[key];

if (product) {
  document.getElementById("productName").textContent = product.name;
  document.getElementById("productDesc").textContent = product.desc;
  // Format price with commas
  document.getElementById("productPrice").textContent = "₦" + product.price.toLocaleString(); 
  document.getElementById("productImage").src = product.image;

  document.getElementById("addBtn").onclick = function () {
    addToCart(product.name, product.price); // Function from cart.js
  };
} else {
  // If product doesn't exist, redirect back to products page
  window.location.href = "products.html";
}