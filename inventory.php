<?php
// html/inventory.php
require __DIR__.'/db.php';

// Handle add/update via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $sku = strtoupper(trim($_POST['sku']));
  $name = trim($_POST['name']);
  $qty = intval($_POST['quantity']);

  // Upsert pattern
  $stmt = $pdo->prepare("
    INSERT INTO inventory (sku,name,quantity)
    VALUES (:sku,:name,:qty)
    ON DUPLICATE KEY UPDATE
      name = VALUES(name),
      quantity = VALUES(quantity)
  ");
  $stmt->execute(['sku'=>$sku,'name'=>$name,'qty'=>$qty]);
  header('Location: inventory.php');
  exit;
}

// Fetch all items
$stmt = $pdo->query("SELECT sku,name,quantity FROM inventory ORDER BY sku");
$items = $stmt->fetchAll();

// If scanned via GET
$highlight = '';
if (!empty($_GET['scan'])) {
  $highlight = strtoupper($_GET['scan']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Inventory • Jadey’s Bakery</title>
  <link rel="stylesheet" href="../style.css">
  <style>.highlight{background:#fffae6;}</style>
</head>
<body>
  <h1>📊 Inventory Tracker</h1>
  <p><a href="scan_sku.html" class="btn">Scan SKU 📱</a></p>

  <table>
    <thead>
      <tr><th>SKU</th><th>Product</th><th>Qty</th></tr>
    </thead>
    <tbody>
      <?php foreach($items as $it): ?>
      <?php $cls = ($it['sku']===$highlight)?'highlight':''; ?>
      <tr class="<?= $cls ?>">
        <td><?= htmlspecialchars($it['sku']) ?></td>
        <td><?= htmlspecialchars($it['name']) ?></td>
        <td><?= intval($it['quantity']) ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <h2><?= empty($_GET['scan']) ? 'Add / Update Item' : 'Confirm or Edit Scanned Item' ?></h2>
  <form method="post">
    <label>SKU:<br><input name="sku"
      value="<?= htmlspecialchars($highlight) ?>" required></label><br>
    <label>Name:<br><input name="name" required></label><br>
    <label>Quantity:<br><input name="quantity" type="number" min="0" required></label><br>
    <button type="submit">Save</button>
  </form>
</body>
</html>
