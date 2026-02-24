<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize data from the form
    $name     = $conn->real_escape_string($_POST['customer_name']);
    $email    = $conn->real_escape_string($_POST['customer_email']);
    $phone    = $conn->real_escape_string($_POST['phone']);
    $products = $conn->real_escape_string($_POST['products']);
    $color    = $conn->real_escape_string($_POST['product_color']); // THE NEW COLOR FIELD
    $total    = intval($_POST['total_price']);
    $delivery = $conn->real_escape_string($_POST['delivery']);

    // Prepared Statement to match your NEW database structure
    $stmt = $conn->prepare("INSERT INTO orders (customer_name, phone, products, product_color, total_price, delivery) VALUES (?, ?, ?, ?, ?, ?)");
    
    // "ssisss" means: string, string, string, string, integer, string
    $stmt->bind_param("ssssis", $name, $phone, $products, $color, $total, $delivery);

    if ($stmt->execute()) {
        // SUCCESS: Redirect to a thank you message or WhatsApp
        $wa_text = "Hello Alh Dan Maigoro, I have paid ₦" . number_format($total) . " for $color plywood. Please confirm my order!";
        header("Location: https://wa.me/2348000000000?text=" . urlencode($wa_text));
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>