<?php

require __DIR__ . '/database.php';

<?php
// trial_inventory.php
require __DIR__ . '/db.php';

// 1. Handle form POST (add/update)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sku  = strtoupper(trim($_POST['sku']));
    $name = trim($_POST['name']);
    $qty  = (int) $_POST['quantity'];

    $stmt = $pdo->prepare("
      INSERT INTO inventory (sku, name, quantity)
      VALUES (:sku, :name, :qty)
      ON DUPLICATE KEY UPDATE
        name     = VALUES(name),
        quantity = VALUES(quantity)
    ");
    $stmt->execute(['sku'=>$sku, 'name'=>$name, 'qty'=>$qty]);
    header('Location: trial_inventory.php');
    exit;
}

// 2. Fetch all inventory items
$items = $pdo->query("SELECT sku, name, quantity FROM inventory ORDER BY sku")
             ->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Trial Inventory • Jadey’s Bakery</title>
  <!-- Optional: Bootstrap CSS for quick styling -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet">
  <link rel="stylesheet" href="../style.css">
</head>
<body class="p-4">
  <div class="container">
    <h1 class="mb-4">📦 Trial Inventory System</h1>

    <!-- Inventory Table -->
    <div class="table-responsive mb-4">
      <table class="table table-striped table-hover">
        <thead class="table-dark">
          <tr>
            <th>SKU</th>
            <th>Product Name</th>
            <th>Quantity</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($items as $it): ?>
            <tr>
              <td><?= htmlspecialchars($it['sku']) ?></td>
              <td><?= htmlspecialchars($it['name']) ?></td>
              <td><?= intval($it['quantity']) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Add / Update Form -->
    <h2>Add or Update Item</h2>
    <form method="post" class="row g-3 mb-5">
      <div class="col-md-4">
        <label class="form-label">SKU</label>
        <input name="sku" class="form-control" placeholder="e.g. FLOUR001" required>
      </div>
      <div class="col-md-4">
        <label class="form-label">Product Name</label>
        <input name="name" class="form-control" placeholder="Plain Flour" required>
      </div>
      <div class="col-md-2">
        <label class="form-label">Quantity</label>
        <input name="quantity" type="number" class="form-control" min="0" value="0" required>
      </div>
      <div class="col-md-2 align-self-end">
        <button type="submit" class="btn btn-primary w-100">Save Item</button>
      </div>
    </form>

    <!-- Optional: Call to action -->
    <div class="p-4 bg-light rounded text-center">
      <h3>Enjoying the trial?</h3>
      <p>Subscribe now to unlock the full Jadey's Bakery Inventory App!</p>
      <a href="subscribe.html" class="btn btn-success">Subscribe Today</a>
    </div>
  </div>

  <!-- Optional: Bootstrap JS bundle for interactive components -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js">
  </script>
</body>
</html>
