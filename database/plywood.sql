-- Database structure for ALH DAN MAIGORO PLYWOOD
CREATE TABLE orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  customer_name VARCHAR(100) NOT NULL,
  phone VARCHAR(20) NOT NULL,
  products TEXT NOT NULL, -- JSON string of items
  total_price INT NOT NULL,
  delivery VARCHAR(50), -- Pickup or Delivery
  order_status VARCHAR(20) DEFAULT 'Pending', -- For tracking
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);