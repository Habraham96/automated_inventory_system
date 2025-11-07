<?php
// Start session
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// Include database configuration
require_once '../../include/config.php';

// Get variant data from GET or POST (for demo, using GET)
$variant_id = isset($_GET['id']) ? $_GET['id'] : '';
// TODO: Fetch variant details from database using $variant_id
// For now, use placeholder values
$variant = [
  'name' => 'Sample Variant',
  'sku' => 'SKU123',
  'cost_price' => '100.00',
  'selling_price' => '150.00',
  'stock_quantity' => '50',
  'low_stock_threshold' => '10',
  'expiry_date' => '',
  'location' => 'Warehouse A',
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Edit Variant - SalesPilot</title>
  <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    .nav-tabs .nav-link.active {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: #fff;
      font-weight: 600;
    }
    .nav-tabs .nav-link {
      color: #495057;
      font-weight: 500;
      border-radius: 8px 8px 0 0;
      margin-right: 4px;
    }
    .tab-content {
      background: #fff;
      border-radius: 0 0 12px 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.08);
      padding: 30px 25px;
      margin-bottom: 30px;
    }
    .form-label { font-weight: 600; }
    .form-group { margin-bottom: 25px; }
  </style>
</head>
<body>
  <div class="container mt-5 mb-5">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0"><i class="mdi mdi-cog"></i> Edit Variant</h4>
        <a href="add_item_variant.php" class="btn btn-light"><i class="mdi mdi-arrow-left"></i> Back</a>
      </div>
      <div class="card-body">
        <ul class="nav nav-tabs" id="variantTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pricing-tab" data-bs-toggle="tab" data-bs-target="#pricing" type="button" role="tab" aria-controls="pricing" aria-selected="true">Pricing</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="stock-tab" data-bs-toggle="tab" data-bs-target="#stock" type="button" role="tab" aria-controls="stock" aria-selected="false">Stocking</button>
          </li>
        </ul>
        <div class="tab-content" id="variantTabContent">
          <!-- Pricing Tab -->
          <div class="tab-pane fade show active" id="pricing" role="tabpanel" aria-labelledby="pricing-tab">
            <form id="pricingForm">
              <div class="form-group">
                <label for="variantName" class="form-label">Variant Name</label>
                <input type="text" class="form-control" id="variantName" name="variant_name" value="<?php echo htmlspecialchars($variant['name']); ?>" required>
              </div>
              <div class="form-group">
                <label for="sku" class="form-label">SKU</label>
                <input type="text" class="form-control" id="sku" name="sku" value="<?php echo htmlspecialchars($variant['sku']); ?>" readonly>
              </div>
              <div class="form-group">
                <label for="costPrice" class="form-label">Cost Price</label>
                <input type="number" class="form-control" id="costPrice" name="cost_price" value="<?php echo htmlspecialchars($variant['cost_price']); ?>" step="0.01" min="0" required>
              </div>
              <div class="form-group">
                <label for="sellingPrice" class="form-label">Selling Price</label>
                <input type="number" class="form-control" id="sellingPrice" name="selling_price" value="<?php echo htmlspecialchars($variant['selling_price']); ?>" step="0.01" min="0" required>
              </div>
              <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i> Save Pricing</button>
            </form>
          </div>
          <!-- Stocking Tab -->
          <div class="tab-pane fade" id="stock" role="tabpanel" aria-labelledby="stock-tab">
            <form id="stockForm">
              <div class="form-group">
                <label for="stockQuantity" class="form-label">Stock Quantity</label>
                <input type="number" class="form-control" id="stockQuantity" name="stock_quantity" value="<?php echo htmlspecialchars($variant['stock_quantity']); ?>" min="0" required>
              </div>
              <div class="form-group">
                <label for="lowStockThreshold" class="form-label">Low Stock Alert (Threshold)</label>
                <input type="number" class="form-control" id="lowStockThreshold" name="low_stock_threshold" value="<?php echo htmlspecialchars($variant['low_stock_threshold']); ?>" min="0">
              </div>
              <div class="form-group">
                <label for="expiryDate" class="form-label">Expiry Date (if applicable)</label>
                <input type="date" class="form-control" id="expiryDate" name="expiry_date" value="<?php echo htmlspecialchars($variant['expiry_date']); ?>">
              </div>
              <div class="form-group">
                <label for="location" class="form-label">Storage Location</label>
                <input type="text" class="form-control" id="location" name="location" value="<?php echo htmlspecialchars($variant['location']); ?>">
              </div>
              <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i> Save Stocking</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
