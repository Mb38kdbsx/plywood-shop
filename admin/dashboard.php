<?php include "../backend/db.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard | ALH DAN MAIGORO</title>
  <link rel="stylesheet" href="../css/style.css">
  <style>
    .admin-table { width: 100%; border-collapse: collapse; background: white; border-radius: 10px; overflow: hidden; box-shadow: var(--shadow); }
    .admin-table th { background: var(--primary); color: white; padding: 15px; text-align: left; }
    .admin-table td { padding: 15px; border-bottom: 1px solid #eee; }
    .status-badge { background: #e3f2fd; color: #1976d2; padding: 5px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: 600; }
  </style>
</head>
<body style="background: #f4f4f4;">

<div class="container" style="padding-top: 50px;">
  <h2 class="section-title">Sales & Orders Dashboard</h2>
  
  <table class="admin-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Customer</th>
        <th>Phone</th>
        <th>Total Amount</th>
        <th>Method</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $result = $conn->query("SELECT * FROM orders ORDER BY created_at DESC");
      while($row = $result->fetch_assoc()) { ?>
      <tr>
        <td>#<?= $row['id'] ?></td>
        <td><strong><?= $row['customer_name'] ?></strong></td>
        <td><?= $row['phone'] ?></td>
        <td>₦<?= number_format($row['total_price']) ?></td>
        <td><?= $row['delivery'] ?></td>
        <td><span class="status-badge">New Order</span></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>