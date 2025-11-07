<?php
// Start session
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// Include database configuration
require_once '../../include/config.php';

// Check if user is logged in (you can customize this based on your authentication system)
// if (!isset($_SESSION['user_id'])) {
//   header('Location: ../../index.php');
//   exit();
// }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Bundled Item - SalesPilot</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- endinject -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
      /* Body and page setup */
      body {
        margin: 0;
        padding: 20px 0;
        background: #f8f9fa;
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }

      /* Modal Overlay - Enhanced with blur effect */
      .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(8px);
        z-index: 9998;
        opacity: 0;
        animation: fadeIn 0.5s ease-out forwards;
      }

      @keyframes fadeIn {
        to {
          opacity: 1;
        }
      }

      /* Modal Container - Centered with smart design */
      .modal-container {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0.8);
        width: 90%;
        max-width: 1200px;
        max-height: 90vh;
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        z-index: 9999;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        animation: smartZoomIn 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
      }

      @keyframes smartZoomIn {
        to {
          transform: translate(-50%, -50%) scale(1);
        }
      }

      /* Responsive design */
      @media (max-width: 768px) {
        .modal-container {
          width: 95%;
          max-height: 95vh;
          top: 50%;
          border-radius: 15px;
        }
      }

      /* Modal Header - Enhanced design */
      .modal-header-custom {
        padding: 15px 25px;
        background: linear-gradient(135deg, #ffc107 0%, #ffb300 100%);
        color: #2c3e50;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 3px solid rgba(255, 255, 255, 0.3);
        position: sticky;
        top: 0;
        z-index: 10;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      }

      .modal-header-custom h4 {
        margin: 0;
        font-size: 1.4rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 10px;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
      }

      .modal-header-custom h4 i {
        font-size: 1.5rem;
        filter: drop-shadow(0 1px 2px rgba(0, 0, 0, 0.1));
      }

      .close-btn {
        background: rgba(44, 62, 80, 0.1);
        border: 2px solid rgba(44, 62, 80, 0.2);
        color: #2c3e50;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        padding: 0;
        position: relative;
        overflow: hidden;
      }

      .close-btn:hover {
        background: rgba(44, 62, 80, 0.2);
        transform: rotate(90deg) scale(1.1);
        box-shadow: 0 4px 15px rgba(44, 62, 80, 0.2);
      }

      .close-btn:active {
        transform: rotate(90deg) scale(0.95);
      }

      /* Modal Body - Enhanced */
      .modal-body-custom {
        flex: 1;
        overflow-y: auto;
        padding: 35px 40px;
        background: linear-gradient(to bottom, #ffffff, #f8f9fa);
      }

      /* Enhanced scrollbar */
      .modal-body-custom::-webkit-scrollbar {
        width: 12px;
      }

      .modal-body-custom::-webkit-scrollbar-track {
        background: rgba(0, 0, 0, 0.05);
        border-radius: 6px;
      }

      .modal-body-custom::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #ffc107, #ff9800);
        border-radius: 6px;
        border: 2px solid transparent;
        background-clip: content-box;
      }

      .modal-body-custom::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #ffb300, #ff8f00);
        background-clip: content-box;
      }

      /* Smart intro text */
      .intro-text {
        background: linear-gradient(135deg, #fff8e1, #ffe0b2);
        border-left: 4px solid #ffc107;
        padding: 20px 25px;
        border-radius: 10px;
        margin-bottom: 30px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
      }

      .intro-text p {
        margin: 0;
        color: #795548;
        font-size: 1.1rem;
        line-height: 1.5;
      }

      .card-header {
        background: #f8f9fa;
        border-bottom: 1px solid #e9ecef;
        font-weight: 600;
        color: #495057 !important;
        padding: 12px 20px;
        border-radius: 12px 12px 0 0;
        position: relative;
        overflow: hidden;
      }

      .card-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(255,255,255,0.3) 0%, transparent 50%);
      }

      .card-header h5 {
        color: #495057 !important;
        margin: 0;
        font-size: 1.1rem;
        position: relative;
        z-index: 1;
      }

      .card-header i {
        margin-right: 8px;
        font-size: 1.2rem;
      }

      .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
        transition: all 0.3s ease;
        background: white;
      }

      .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
      }

      .card-body {
        padding: 30px 25px;
      }

      .section-divider {
        margin: 2.5rem 0;
        position: relative;
      }

      .required-field::after {
        content: " *";
        color: #e74c3c;
        font-weight: bold;
        font-size: 1.1em;
      }

      .form-label {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 10px;
        font-size: 0.95rem;
        letter-spacing: 0.3px;
      }

      .form-group {
        margin-bottom: 25px;
      }

      .form-control, .form-select {
        border-radius: 8px;
        border: 2px solid #e9ecef;
        padding: 12px 15px;
        font-size: 0.95rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        background: #ffffff;
      }

      .form-control:hover, .form-select:hover {
        border-color: #ffc107;
        box-shadow: 0 2px 10px rgba(255, 193, 7, 0.1);
      }

      .form-control:focus, .form-select:focus {
        border-color: #ffc107;
        box-shadow: 0 0 0 4px rgba(255, 193, 7, 0.1);
        outline: none;
        transform: translateY(-1px);
      }

      .input-group-text {
        background: linear-gradient(135deg, #ffc107, #ff9800);
        color: white;
        border: 2px solid #ffc107;
        font-weight: 600;
        border-radius: 8px 0 0 8px;
      }

      .input-group .form-control {
        border-left: none;
        border-radius: 0 8px 8px 0;
      }

      .input-group .form-control:focus {
        border-left: 2px solid #ffc107;
      }

      /* Action buttons - Enhanced */
      .action-buttons {
        position: sticky;
        bottom: 0;
        background: linear-gradient(to top, #ffffff, #f8f9fa);
        padding: 25px 40px;
        border-top: 2px solid rgba(255, 193, 7, 0.1);
        display: flex;
        justify-content: flex-end;
        gap: 15px;
        z-index: 10;
        box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.08);
      }

      .btn {
        border-radius: 10px;
        padding: 12px 30px;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid transparent;
        position: relative;
        overflow: hidden;
        text-transform: uppercase;
        letter-spacing: 0.5px;
      }

      .btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        transition: left 0.5s;
      }

      .btn:hover::before {
        left: 100%;
      }

      .btn-primary {
        background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
        border: 2px solid #ffc107;
        color: white;
        box-shadow: 0 4px 15px rgba(255, 193, 7, 0.3);
      }

      .btn-primary:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 8px 25px rgba(255, 193, 7, 0.4);
        background: linear-gradient(135deg, #ffb300 0%, #ff8f00 100%);
      }

      .btn-secondary {
        background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
        border: 2px solid #6c757d;
        color: white;
      }

      .btn-secondary:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 8px 25px rgba(108, 117, 125, 0.4);
        background: linear-gradient(135deg, #5a6268 0%, #343a40 100%);
      }

      .btn-light {
        background: #ffffff;
        border: 2px solid #e9ecef;
        color: #495057;
      }

      .btn-light:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        background: #f8f9fa;
        border-color: #dee2e6;
      }

      .btn-success {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        border: 2px solid #28a745;
        color: white;
        box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
      }

      .btn-success:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 8px 25px rgba(40, 167, 69, 0.4);
        background: linear-gradient(135deg, #218838 0%, #1e7e34 100%);
      }

      .btn-danger {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        border: 2px solid #dc3545;
        color: white;
        box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
      }

      .btn-danger:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 8px 25px rgba(220, 53, 69, 0.4);
        background: linear-gradient(135deg, #c82333 0%, #a71e2a 100%);
      }

      /* Bundle items table */
      .bundle-table {
        border: 2px solid #e9ecef;
        border-radius: 12px;
        overflow: hidden;
        background: white;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      }

      .bundle-table th {
        background: linear-gradient(135deg, #ffc107 0%, #ffb300 100%);
        color: #2c3e50;
        font-weight: 600;
        padding: 15px 12px;
        border: none;
        text-align: center;
        font-size: 0.9rem;
      }

      .bundle-table td {
        padding: 12px 8px;
        border-color: #f1f3f4;
        vertical-align: middle;
        text-align: center;
      }

      .bundle-table .form-control, .bundle-table .form-select {
        border-radius: 6px;
        border: 1px solid #e9ecef;
        padding: 8px 12px;
        font-size: 0.9rem;
      }

      .bundle-table .form-control:focus, .bundle-table .form-select:focus {
        border-color: #ffc107;
        box-shadow: 0 0 0 2px rgba(255, 193, 7, 0.2);
      }

      /* Alert styling */
      .alert {
        border-radius: 10px;
        border: none;
        padding: 15px 20px;
        margin-bottom: 20px;
      }

      .alert-info {
        background: linear-gradient(135deg, #d1ecf1 0%, #bee5eb 100%);
        color: #0c5460;
        border-left: 4px solid #17a2b8;
      }

      .alert-warning {
        background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
        color: #856404;
        border-left: 4px solid #ffc107;
      }

      /* Form validation styles */
      .form-control:invalid {
        border-color: #e74c3c;
      }

      .form-control:valid {
        border-color: #27ae60;
      }

      /* Loading state for buttons */
      .btn.loading {
        position: relative;
        color: transparent !important;
      }

      .btn.loading::after {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        top: 50%;
        left: 50%;
        margin-left: -10px;
        margin-top: -10px;
        border: 2px solid transparent;
        border-top: 2px solid currentColor;
        border-radius: 50%;
        animation: spin 1s linear infinite;
      }

      @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
      }

      /* Responsive design */
      @media (max-width: 992px) {
        .modal-body-custom {
          padding: 25px 20px;
        }
        
        .action-buttons {
          padding: 20px;
          flex-direction: column-reverse;
        }
        
        .action-buttons .btn {
          width: 100%;
          margin-bottom: 10px;
        }
      }

      @media (max-width: 576px) {
        .modal-container {
          width: 98%;
          margin: 1%;
        }
        
        .modal-header-custom {
          padding: 20px;
        }
        
        .modal-header-custom h4 {
          font-size: 1.3rem;
        }
      }

      /* Bundle pricing calculation display */
      .pricing-summary {
        background: linear-gradient(135deg, #fff8e1 0%, #ffe0b2 100%);
        border: 2px solid #ffc107;
        border-radius: 10px;
        padding: 20px;
        margin-top: 20px;
      }

      .pricing-summary h6 {
        color: #e65100;
        font-weight: 700;
        margin-bottom: 15px;
      }

      .pricing-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px 0;
        border-bottom: 1px solid rgba(255, 193, 7, 0.3);
      }

      .pricing-row:last-child {
        border-bottom: none;
        font-weight: 700;
        font-size: 1.1rem;
        color: #e65100;
      }

      /* Success state indicators */
      .form-group.success .form-control {
        border-color: #27ae60;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%2327ae60' d='m2.3 6.73.94-.94 2.94-2.94.94.94-3.88 3.88z'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right calc(0.375em + 0.1875rem) center;
        background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
      }

      /* Bundle item row animations */
      .bundle-item-row {
        transition: all 0.3s ease;
      }

      .bundle-item-row:hover {
        background-color: rgba(255, 193, 7, 0.05);
      }

      .bundle-item-row.removing {
        animation: slideOut 0.3s ease-out forwards;
      }

      @keyframes slideOut {
        to {
          opacity: 0;
          transform: translateX(-100%);
          height: 0;
          padding: 0;
        }
      }
    </style>
  </head>
  <body>
    <!-- Modal Overlay -->
    <div class="modal-overlay"></div>

    <!-- Modal Container -->
    <div class="modal-container">
      <!-- Modal Header -->
      <div class="modal-header-custom">
        <h4>
          <i class="mdi mdi-package-variant-closed"></i> Add New Bundled Item
        </h4>
        <button type="button" class="close-btn" onclick="closeModal()" title="Close">
          <i class="mdi mdi-close"></i>
        </button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body-custom">
        <div class="intro-text">
          <p>
            <i class="mdi mdi-information-outline"></i>
            Create a bundle package containing multiple existing products sold together as one unit. 
            Selling a bundle automatically deducts stock from all included items.
          </p>
        </div>

        <form class="forms-sample" id="addBundleForm" method="POST" action="process_add_bundle.php" enctype="multipart/form-data">
          
          <!-- Section 1: Bundle Details -->
          <div class="card mb-4">
            <div class="card-header">
              <h5 class="mb-0">
                <i class="mdi mdi-information-outline"></i> <strong>Bundle Information</strong>
              </h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="bundleName" class="form-label required-field">Bundle Name</label>
                    <input type="text" class="form-control" id="bundleName" name="bundle_name" placeholder="Enter bundle name" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="bundleCode" class="form-label">Bundle Code/SKU</label>
                    <input type="text" class="form-control" id="bundleCode" name="bundle_code" placeholder="Auto-generated or enter custom code">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="category" class="form-label required-field">Category</label>
                    <select class="form-select" id="category" name="category" required>
                      <option value="">Select Category</option>
                      <option value="bundles">Bundles & Packages</option>
                      <option value="starter-kits">Starter Kits</option>
                      <option value="combo-offers">Combo Offers</option>
                      <option value="gift-sets">Gift Sets</option>
                      <option value="promotional">Promotional Packs</option>
                      <option value="office-supplies">Office Supply Sets</option>
                      <option value="tech-bundles">Tech Bundles</option>
                      <option value="other">Other</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="supplier" class="form-label">Primary Supplier</label>
                    <select class="form-select" id="supplier" name="supplier">
                      <option value="">Select Supplier</option>
                      <option value="supplier1">Supplier 1</option>
                      <option value="supplier2">Supplier 2</option>
                      <option value="supplier3">Supplier 3</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="unit" class="form-label required-field">Unit of Measurement</label>
                    <select class="form-select" id="unit" name="unit" required>
                      <option value="">Select Unit</option>
                      <option value="bundle">Bundle</option>
                      <option value="pack">Pack</option>
                      <option value="set">Set</option>
                      <option value="kit">Kit</option>
                      <option value="box">Box</option>
                      <option value="pcs">Piece (pcs)</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="barcode" class="form-label">Bundle Barcode</label>
                    <input type="text" class="form-control" id="barcode" name="barcode" placeholder="Enter or scan bundle barcode">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="description" class="form-label">Bundle Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Describe what's included in this bundle and its benefits"></textarea>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="bundleImage" class="form-label">Bundle Image</label>
                    <input type="file" class="form-control" id="bundleImage" name="bundle_image" accept="image/*">
                    <small class="form-text text-muted">Supported formats: JPG, PNG, GIF (Max: 2MB)</small>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Section 2: Bundle Items -->
          <div class="card mb-4">
            <div class="card-header">
              <h5 class="mb-0">
                <i class="mdi mdi-package-variant"></i> <strong>Bundle Components</strong>
              </h5>
            </div>
            <div class="card-body">
              <div class="alert alert-info" role="alert">
                <i class="mdi mdi-information me-2"></i>
                <strong>Select the items to include in this bundle:</strong> Each item's stock will be deducted when the bundle is sold.
                You can add multiple quantities of the same item if needed.
              </div>

              <div class="table-responsive">
                <table class="table bundle-table" id="bundleItemsTable">
                  <thead>
                    <tr>
                      <th width="25%">Product</th>
                      <th width="15%">Available Stock</th>
                      <th width="15%">Quantity in Bundle</th>
                      <th width="15%">Unit Cost</th>
                      <th width="15%">Subtotal</th>
                      <th width="15%">Action</th>
                    </tr>
                  </thead>
                  <tbody id="bundleItemsBody">
                    <tr class="bundle-item-row">
                      <td>
                        <select class="form-select product-select" name="bundle_items[]" onchange="updateItemInfo(this)" required>
                          <option value="">Select Product</option>
                          <!-- Dynamic options from database -->
                          <option value="1" data-cost="500" data-stock="50">Wireless Mouse</option>
                          <option value="2" data-cost="1200" data-stock="30">Keyboard</option>
                          <option value="3" data-cost="800" data-stock="25">Mouse Pad</option>
                          <option value="4" data-cost="2500" data-stock="15">Headset</option>
                        </select>
                      </td>
                      <td>
                        <input type="text" class="form-control available-stock" placeholder="0" readonly>
                      </td>
                      <td>
                        <input type="number" class="form-control bundle-quantity" name="bundle_quantities[]" placeholder="1" min="1" value="1" onchange="calculateSubtotal(this)" required>
                      </td>
                      <td>
                        <div class="input-group">
                          <span class="input-group-text">₦</span>
                          <input type="text" class="form-control unit-cost" placeholder="0.00" readonly>
                        </div>
                      </td>
                      <td>
                        <div class="input-group">
                          <span class="input-group-text">₦</span>
                          <input type="text" class="form-control subtotal" placeholder="0.00" readonly>
                        </div>
                      </td>
                      <td>
                        <button type="button" class="btn btn-sm btn-danger" onclick="removeBundleItem(this)" title="Remove Item">
                          <i class="mdi mdi-delete"></i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="d-flex justify-content-between align-items-center mt-3">
                <button type="button" class="btn btn-success btn-sm" onclick="addBundleItem()">
                  <i class="mdi mdi-plus"></i> Add Another Item
                </button>
                <small class="text-muted">Minimum 2 items required for a bundle</small>
              </div>

              <!-- Bundle Cost Summary -->
              <div class="pricing-summary">
                <h6><i class="mdi mdi-calculator"></i> Bundle Cost Calculation</h6>
                <div class="pricing-row">
                  <span>Total Item Cost:</span>
                  <span id="totalItemCost">₦0.00</span>
                </div>
                <div class="pricing-row">
                  <span>Assembly/Packaging Cost:</span>
                  <div class="input-group" style="width: 150px;">
                    <span class="input-group-text">₦</span>
                    <input type="number" class="form-control" id="assemblyFee" name="assembly_fee" placeholder="0.00" step="0.01" min="0" value="0" onchange="calculateBundlePricing()">
                  </div>
                </div>
                <div class="pricing-row">
                  <strong>Total Bundle Cost:</strong>
                  <strong id="totalBundleCost">₦0.00</strong>
                </div>
              </div>
            </div>
          </div>

          <!-- Section 3: Bundle Pricing -->
          <div class="card mb-4">
            <div class="card-header">
              <h5 class="mb-0">
                <i class="mdi mdi-currency-usd"></i> <strong>Bundle Pricing</strong>
              </h5>
            </div>
            <div class="card-body">
              <div class="alert alert-warning" role="alert">
                <i class="mdi mdi-lightbulb-outline me-2"></i>
                <strong>Bundle Pricing Strategy:</strong> Set a competitive price that offers savings compared to buying items individually.
                Consider the convenience value customers get from the bundled package.
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="bundleSellingPrice" class="form-label required-field">Bundle Selling Price</label>
                    <div class="input-group">
                      <span class="input-group-text">₦</span>
                      <input type="number" class="form-control" id="bundleSellingPrice" name="bundle_selling_price" placeholder="0.00" step="0.01" min="0" required onchange="calculateBundlePricing()">
                    </div>
                    <small class="form-text text-muted">Price customers pay for the bundle</small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="individualTotal" class="form-label">Individual Items Total</label>
                    <div class="input-group">
                      <span class="input-group-text">₦</span>
                      <input type="text" class="form-control" id="individualTotal" placeholder="0.00" readonly>
                    </div>
                    <small class="form-text text-muted">If bought separately</small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="bundleSavings" class="form-label">Customer Savings</label>
                    <div class="input-group">
                      <span class="input-group-text">₦</span>
                      <input type="text" class="form-control" id="bundleSavings" placeholder="0.00" readonly>
                    </div>
                    <small class="form-text text-muted">Discount amount</small>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="bundleMargin" class="form-label">Profit Margin</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="bundleMargin" placeholder="0%" readonly>
                      <span class="input-group-text">%</span>
                    </div>
                    <small class="form-text text-muted">Bundle profit margin</small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="bundleProfit" class="form-label">Bundle Profit</label>
                    <div class="input-group">
                      <span class="input-group-text">₦</span>
                      <input type="text" class="form-control" id="bundleProfit" placeholder="0.00" readonly>
                    </div>
                    <small class="form-text text-muted">Profit per bundle</small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="taxRate" class="form-label">Tax Rate</label>
                    <select class="form-select" id="taxRate" name="tax_rate">
                      <option value="0">No Tax (0%)</option>
                      <option value="5">VAT 5%</option>
                      <option value="7.5">VAT 7.5%</option>
                      <option value="10">VAT 10%</option>
                      <option value="15">VAT 15%</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Section 4: Stock Details -->
          <div class="card mb-4">
            <div class="card-header">
              <h5 class="mb-0">
                <i class="mdi mdi-warehouse"></i> <strong>Bundle Stock Management</strong>
              </h5>
            </div>
            <div class="card-body">
              <div class="alert alert-info" role="alert">
                <i class="mdi mdi-information me-2"></i>
                <strong>Note:</strong> Bundle stock is limited by the available stock of individual items. 
                The maximum bundles you can create is determined by the item with the lowest available stock.
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="maxPossibleBundles" class="form-label">Maximum Possible Bundles</label>
                    <input type="text" class="form-control" id="maxPossibleBundles" placeholder="0" readonly>
                    <small class="form-text text-muted">Based on current stock levels</small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="initialBundleStock" class="form-label required-field">Initial Bundle Stock</label>
                    <input type="number" class="form-control" id="initialBundleStock" name="initial_bundle_stock" placeholder="0" min="0" required>
                    <small class="form-text text-muted">Number of bundles to make available</small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="lowStockAlert" class="form-label">Low Stock Alert</label>
                    <input type="number" class="form-control" id="lowStockAlert" name="low_stock_alert" placeholder="5" min="0">
                    <small class="form-text text-muted">Alert when bundles fall below this level</small>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="storageLocation" class="form-label">Storage Location</label>
                    <input type="text" class="form-control" id="storageLocation" name="storage_location" placeholder="e.g., Warehouse B, Bundle Section">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="expiryDate" class="form-label">Expiry Date (if applicable)</label>
                    <input type="date" class="form-control" id="expiryDate" name="expiry_date">
                  </div>
                </div>
              </div>
            </div>
          </div>

        </form>
      </div>

      <!-- Action Buttons (Sticky Footer) -->
      <div class="action-buttons">
        <button type="reset" class="btn btn-light" onclick="resetForm()">
          <i class="mdi mdi-refresh"></i> Reset
        </button>
        <button type="button" class="btn btn-secondary" onclick="closeModal()">
          <i class="mdi mdi-close"></i> Cancel
        </button>
        <button type="button" class="btn btn-primary" onclick="submitForm()">
          <i class="mdi mdi-content-save"></i> Save Bundle
        </button>
      </div>
    </div>

    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="../assets/vendors/select2/select2.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/template.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../assets/js/file-upload.js"></script>
    <script src="../assets/js/typeahead.js"></script>
    <script src="../assets/js/select2.js"></script>
    <!-- End custom js for this page-->

    <script>
      // Close modal and return to previous page
      function closeModal() {
        const modalContainer = document.querySelector('.modal-container');
        const modalOverlay = document.querySelector('.modal-overlay');
        
        // Add slide out animation
        modalContainer.style.animation = 'slideOut 0.3s cubic-bezier(0.55, 0.085, 0.68, 0.53) forwards';
        modalOverlay.style.animation = 'fadeOut 0.3s ease-out forwards';
        
        // Redirect after animation
        setTimeout(function() {
          // Check if there's a previous page in history
          if (document.referrer && document.referrer !== window.location.href) {
            // Go back to the previous page
            window.history.back();
          } else {
            // Fallback to dashboard if no referrer
            window.location.href = '../index.php';
          }
        }, 300);
      }

      // Add slide out animation keyframe
      const style = document.createElement('style');
      style.textContent = `
        @keyframes slideOut {
          to {
            transform: translate(-50%, -50%) scale(0.8);
            opacity: 0;
          }
        }
        @keyframes fadeOut {
          to {
            opacity: 0;
          }
        }
      `;
      document.head.appendChild(style);

      // Close on escape key
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
          closeModal();
        }
      });



      // Close on overlay click
      document.querySelector('.modal-overlay').addEventListener('click', closeModal);

      // Update item information when product is selected
      function updateItemInfo(selectElement) {
        const row = selectElement.closest('tr');
        const option = selectElement.options[selectElement.selectedIndex];
        const stock = option.getAttribute('data-stock') || '0';
        const cost = option.getAttribute('data-cost') || '0';
        
        // Update stock and cost fields
        row.querySelector('.available-stock').value = stock;
        row.querySelector('.unit-cost').value = parseFloat(cost).toFixed(2);
        
        // Calculate subtotal
        calculateSubtotal(row.querySelector('.bundle-quantity'));
        
        // Update maximum possible bundles
        updateMaxPossibleBundles();
        
        // Calculate individual items total for pricing comparison
        calculateIndividualTotal();
      }

      // Calculate subtotal for a bundle item row
      function calculateSubtotal(quantityInput) {
        const row = quantityInput.closest('tr');
        const quantity = parseInt(quantityInput.value) || 0;
        const unitCost = parseFloat(row.querySelector('.unit-cost').value) || 0;
        const subtotal = quantity * unitCost;
        
        row.querySelector('.subtotal').value = subtotal.toFixed(2);
        
        // Update total bundle cost
        calculateBundlePricing();
        
        // Update maximum possible bundles
        updateMaxPossibleBundles();
      }

      // Add new bundle item row
      function addBundleItem() {
        const tbody = document.getElementById('bundleItemsBody');
        const newRow = document.createElement('tr');
        newRow.className = 'bundle-item-row';
        newRow.innerHTML = `
          <td>
            <select class="form-select product-select" name="bundle_items[]" onchange="updateItemInfo(this)" required>
              <option value="">Select Product</option>
              <option value="1" data-cost="500" data-stock="50">Wireless Mouse</option>
              <option value="2" data-cost="1200" data-stock="30">Keyboard</option>
              <option value="3" data-cost="800" data-stock="25">Mouse Pad</option>
              <option value="4" data-cost="2500" data-stock="15">Headset</option>
            </select>
          </td>
          <td>
            <input type="text" class="form-control available-stock" placeholder="0" readonly>
          </td>
          <td>
            <input type="number" class="form-control bundle-quantity" name="bundle_quantities[]" placeholder="1" min="1" value="1" onchange="calculateSubtotal(this)" required>
          </td>
          <td>
            <div class="input-group">
              <span class="input-group-text">₦</span>
              <input type="text" class="form-control unit-cost" placeholder="0.00" readonly>
            </div>
          </td>
          <td>
            <div class="input-group">
              <span class="input-group-text">₦</span>
              <input type="text" class="form-control subtotal" placeholder="0.00" readonly>
            </div>
          </td>
          <td>
            <button type="button" class="btn btn-sm btn-danger" onclick="removeBundleItem(this)" title="Remove Item">
              <i class="mdi mdi-delete"></i>
            </button>
          </td>
        `;
        tbody.appendChild(newRow);
        
        // Initialize Select2 for new row
        if (typeof $ !== 'undefined' && $.fn.select2) {
          $(newRow).find('.product-select').select2({
            theme: 'bootstrap',
            width: '100%',
            placeholder: 'Select Product'
          });
        }
        
        showNotification('New item row added to bundle', 'success');
      }

      // Remove bundle item row
      function removeBundleItem(button) {
        const tbody = document.getElementById('bundleItemsBody');
        const row = button.closest('tr');
        
        if (tbody.children.length > 1) {
          row.classList.add('removing');
          setTimeout(() => {
            row.remove();
            calculateBundlePricing();
            updateMaxPossibleBundles();
            calculateIndividualTotal();
            showNotification('Item removed from bundle', 'info');
          }, 300);
        } else {
          showNotification('At least one item is required for a bundle', 'warning');
        }
      }

      // Calculate bundle pricing and margins
      function calculateBundlePricing() {
        const subtotalInputs = document.querySelectorAll('.subtotal');
        const assemblyFee = parseFloat(document.getElementById('assemblyFee').value) || 0;
        const sellingPrice = parseFloat(document.getElementById('bundleSellingPrice').value) || 0;
        
        let totalItemCost = 0;
        subtotalInputs.forEach(input => {
          totalItemCost += parseFloat(input.value) || 0;
        });
        
        const totalBundleCost = totalItemCost + assemblyFee;
        const profit = sellingPrice - totalBundleCost;
        const margin = totalBundleCost > 0 ? (profit / totalBundleCost) * 100 : 0;
        
        // Update display
        document.getElementById('totalItemCost').textContent = '₦' + totalItemCost.toFixed(2);
        document.getElementById('totalBundleCost').textContent = '₦' + totalBundleCost.toFixed(2);
        document.getElementById('bundleMargin').value = margin.toFixed(2) + '%';
        document.getElementById('bundleProfit').value = profit.toFixed(2);
        
        // Calculate customer savings
        calculateCustomerSavings();
      }

      // Calculate individual items total for comparison
      function calculateIndividualTotal() {
        // This would typically fetch individual selling prices from database
        // For now, assuming 30% markup on cost as example
        const subtotalInputs = document.querySelectorAll('.subtotal');
        let individualTotal = 0;
        
        subtotalInputs.forEach(input => {
          const cost = parseFloat(input.value) || 0;
          individualTotal += cost * 1.3; // 30% markup example
        });
        
        document.getElementById('individualTotal').value = individualTotal.toFixed(2);
        calculateCustomerSavings();
      }

      // Calculate customer savings
      function calculateCustomerSavings() {
        const individualTotal = parseFloat(document.getElementById('individualTotal').value) || 0;
        const bundlePrice = parseFloat(document.getElementById('bundleSellingPrice').value) || 0;
        const savings = individualTotal - bundlePrice;
        
        document.getElementById('bundleSavings').value = savings.toFixed(2);
        
        // Update savings display color
        const savingsInput = document.getElementById('bundleSavings');
        if (savings > 0) {
          savingsInput.style.color = '#28a745';
          savingsInput.style.fontWeight = 'bold';
        } else if (savings < 0) {
          savingsInput.style.color = '#dc3545';
          savingsInput.style.fontWeight = 'bold';
        } else {
          savingsInput.style.color = '#6c757d';
          savingsInput.style.fontWeight = 'normal';
        }
      }

      // Update maximum possible bundles based on stock levels
      function updateMaxPossibleBundles() {
        const rows = document.querySelectorAll('.bundle-item-row');
        let maxBundles = Infinity;
        
        rows.forEach(row => {
          const productSelect = row.querySelector('.product-select');
          const quantityInput = row.querySelector('.bundle-quantity');
          const stockInput = row.querySelector('.available-stock');
          
          if (productSelect.value && quantityInput.value) {
            const availableStock = parseInt(stockInput.value) || 0;
            const quantityNeeded = parseInt(quantityInput.value) || 1;
            const possibleBundles = Math.floor(availableStock / quantityNeeded);
            maxBundles = Math.min(maxBundles, possibleBundles);
          }
        });
        
        const maxBundlesDisplay = maxBundles === Infinity ? '0' : maxBundles.toString();
        document.getElementById('maxPossibleBundles').value = maxBundlesDisplay;
        
        // Validate initial stock against maximum possible
        const initialStock = document.getElementById('initialBundleStock');
        if (parseInt(initialStock.value) > maxBundles && maxBundles !== Infinity) {
          initialStock.style.borderColor = '#dc3545';
          showNotification(`Initial stock cannot exceed ${maxBundles} bundles based on available inventory`, 'warning');
        } else {
          initialStock.style.borderColor = '#28a745';
        }
      }

      // Reset form
      function resetForm() {
        document.getElementById('addBundleForm').reset();
        
        // Reset calculated fields
        document.getElementById('totalItemCost').textContent = '₦0.00';
        document.getElementById('totalBundleCost').textContent = '₦0.00';
        document.getElementById('bundleMargin').value = '0%';
        document.getElementById('bundleProfit').value = '0.00';
        document.getElementById('individualTotal').value = '0.00';
        document.getElementById('bundleSavings').value = '0.00';
        document.getElementById('maxPossibleBundles').value = '0';
        
        // Reset bundle items table to single row
        const tbody = document.getElementById('bundleItemsBody');
        while (tbody.children.length > 1) {
          tbody.removeChild(tbody.lastChild);
        }
        
        // Clear first row
        const firstRow = tbody.querySelector('.bundle-item-row');
        firstRow.querySelector('.product-select').value = '';
        firstRow.querySelector('.available-stock').value = '';
        firstRow.querySelector('.bundle-quantity').value = '1';
        firstRow.querySelector('.unit-cost').value = '';
        firstRow.querySelector('.subtotal').value = '';
        
        showNotification('Form has been reset', 'info');
      }

      // Submit form with validation
      function submitForm() {
        const form = document.getElementById('addBundleForm');
        const submitBtn = document.querySelector('.btn-primary');
        
        // Add loading state
        submitBtn.classList.add('loading');
        submitBtn.disabled = true;
        
        setTimeout(() => {
          // Validate bundle items
          const productSelects = document.querySelectorAll('.product-select');
          const validItems = Array.from(productSelects).filter(select => select.value !== '');
          
          if (validItems.length < 2) {
            showNotification('A bundle must contain at least 2 different items', 'error');
            removeLoading(submitBtn);
            return false;
          }
          
          // Check for duplicate items
          const selectedProducts = validItems.map(select => select.value);
          const uniqueProducts = [...new Set(selectedProducts)];
          if (selectedProducts.length !== uniqueProducts.length) {
            showNotification('Cannot have duplicate items in a bundle. Use quantity instead.', 'error');
            removeLoading(submitBtn);
            return false;
          }
          
          // Validate stock levels
          const initialStock = parseInt(document.getElementById('initialBundleStock').value) || 0;
          const maxPossible = parseInt(document.getElementById('maxPossibleBundles').value) || 0;
          
          if (initialStock > maxPossible) {
            showNotification(`Initial stock (${initialStock}) cannot exceed maximum possible bundles (${maxPossible})`, 'error');
            removeLoading(submitBtn);
            return false;
          }
          
          // Validate selling price
          const sellingPrice = parseFloat(document.getElementById('bundleSellingPrice').value) || 0;
          const totalCost = parseFloat(document.getElementById('totalBundleCost').textContent.replace('₦', '')) || 0;
          
          if (sellingPrice <= 0) {
            showNotification('Bundle selling price must be greater than zero', 'error');
            removeLoading(submitBtn);
            return false;
          }
          
          if (sellingPrice <= totalCost) {
            showNotification('Warning: Selling price should be greater than total cost for profit!', 'warning');
            // Don't return false, just warn
          }
          
          // Check if required fields are filled
          if (!form.checkValidity()) {
            form.reportValidity();
            removeLoading(submitBtn);
            return false;
          }
          
          // If all validations pass
          showNotification('Bundle validation passed! Ready to be saved.', 'success');
          
          // Simulate save process
          setTimeout(() => {
            removeLoading(submitBtn);
            showNotification('Bundle successfully created!', 'success');
            
            // Remove beforeunload warning since bundle is saved
            window.removeEventListener('beforeunload', arguments.callee);
            
            // After successful save, return to previous page
            setTimeout(() => {
              // Check if there's a previous page in history
              if (document.referrer && document.referrer !== window.location.href) {
                // Go back to the previous page
                window.history.back();
              } else {
                // Fallback to dashboard if no referrer
                window.location.href = '../index.php';
              }
            }, 1000); // Give time to see the success message
            
            // Uncomment the line below when you have the backend ready
            // form.submit();
          }, 1500);
        }, 800);
      }

      // Helper function to remove loading state
      function removeLoading(button) {
        button.classList.remove('loading');
        button.disabled = false;
      }

      // Smart notification system
      function showNotification(message, type = 'info') {
        // Remove existing notifications
        const existingNotification = document.querySelector('.smart-notification');
        if (existingNotification) {
          existingNotification.remove();
        }

        const notification = document.createElement('div');
        notification.className = `smart-notification alert alert-${type === 'error' ? 'danger' : type}`;
        notification.style.cssText = `
          position: fixed;
          top: 20px;
          right: 20px;
          z-index: 10000;
          min-width: 300px;
          max-width: 500px;
          padding: 15px 20px;
          border-radius: 10px;
          box-shadow: 0 8px 25px rgba(0,0,0,0.2);
          transform: translateX(100%);
          transition: all 0.3s ease;
        `;

        const icon = type === 'success' ? 'mdi-check-circle' : 
                    type === 'warning' ? 'mdi-alert-circle' : 
                    type === 'error' ? 'mdi-close-circle' : 'mdi-information';

        notification.innerHTML = `
          <i class="mdi ${icon} me-2"></i>
          ${message}
        `;

        document.body.appendChild(notification);

        // Animate in
        setTimeout(() => {
          notification.style.transform = 'translateX(0)';
        }, 100);

        // Auto remove after 4 seconds
        setTimeout(() => {
          notification.style.transform = 'translateX(100%)';
          setTimeout(() => notification.remove(), 300);
        }, 4000);
      }

      // Event listeners and form initialization
      document.addEventListener('DOMContentLoaded', function() {
        // Auto-generate bundle code
        document.getElementById('bundleName').addEventListener('input', function() {
          const bundleCode = document.getElementById('bundleCode');
          if (!bundleCode.value) {
            const name = this.value.replace(/\s+/g, '').toUpperCase();
            const timestamp = Date.now().toString().slice(-4);
            bundleCode.value = 'BDL-' + name.slice(0, 6) + timestamp;
          }
        });

        // Initialize Select2 for better dropdowns
        if (typeof $ !== 'undefined' && $.fn.select2) {
          $('#category, #supplier, #unit, #taxRate').select2({
            theme: 'bootstrap',
            width: '100%',
            placeholder: 'Select an option'
          });
          
          $('.product-select').select2({
            theme: 'bootstrap',
            width: '100%',
            placeholder: 'Select Product'
          });
        }

        // Bundle pricing event listeners
        document.getElementById('assemblyFee').addEventListener('input', calculateBundlePricing);
        document.getElementById('bundleSellingPrice').addEventListener('input', calculateBundlePricing);
        document.getElementById('initialBundleStock').addEventListener('input', updateMaxPossibleBundles);

        // Enhanced image upload with preview
        document.getElementById('bundleImage').addEventListener('change', function(e) {
          const file = e.target.files[0];
          if (file) {
            if (file.size > 2 * 1024 * 1024) {
              showNotification('File size must be less than 2MB', 'error');
              this.value = '';
              return;
            }
            showNotification('Bundle image selected successfully', 'success');
          }
        });

        // Form validation visual feedback
        const formInputs = document.querySelectorAll('.form-control, .form-select');
        formInputs.forEach(input => {
          input.addEventListener('blur', function() {
            if (this.required && !this.value.trim()) {
              this.closest('.form-group').classList.add('error');
              this.closest('.form-group').classList.remove('success');
            } else if (this.value.trim()) {
              this.closest('.form-group').classList.add('success');
              this.closest('.form-group').classList.remove('error');
            }
          });
        });

        // Show welcome message
        showNotification('Ready to create a new bundled item for your inventory!', 'info');
      });
    </script>
  </body>
</html>
