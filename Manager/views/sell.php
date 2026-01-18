<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sell - SalesPilot</title>
    <?php include '../../include/responsive.php'; ?>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
    <?php include '../layouts/sidebar_styles.php'; ?>
    
    <!-- Custom Sell Page Styles -->
    <style>
      /* Main panel positioning to avoid sidebar overlap */
      .main-panel {
        margin-left: 280px !important;
        transition: margin-left 0.2s ease !important;
      }

      /* Adjust main panel when sidebar is collapsed */
      body.sidebar-collapsed .main-panel {
        margin-left: 70px !important;
      }

      /* POS specific styles */
      .sell-container {
        padding: 20px;
      }

      .pos-content {
        background: white;
        border-radius: 8px;
        padding: 25px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      }

      /* POS Layout Styles */
      .pos-layout {
        display: flex;
        flex-direction: row;
        gap: 20px;
        height: calc(100vh - 140px);
        width: 100%;
      }

      .items-section {
        flex: 1;
        overflow-y: auto;
        padding-right: 10px;
        order: 1;
        min-width: 0;
      }

      .items-container {
        background: white;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      }

      .filter-controls {
        display: flex;
        gap: 15px;
        margin-bottom: 25px;
        flex-wrap: wrap;
        align-items: center;
      }

      .filter-left {
        flex: 1;
        min-width: 250px;
      }

      .filter-right {
        display: flex;
        gap: 10px;
        align-items: center;
      }

      .search-box {
        position: relative;
      }

      .search-box input {
        width: 100%;
        padding: 12px 45px 12px 45px;
        border: 2px solid #e0e0e0;
        border-radius: 25px;
        font-size: 14px;
        transition: all 0.3s ease;
        outline: none;
      }

      .search-box input:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
      }

      .search-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #999;
        font-size: 18px;
      }

      .clear-icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #999;
        font-size: 18px;
        cursor: pointer;
        display: none;
      }

      .clear-icon:hover {
        color: #667eea;
      }

      .category-filter select {
        padding: 10px 15px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 14px;
        outline: none;
        cursor: pointer;
        background: white;
      }

      .filter-badge {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 18px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        font-size: 15px;
        font-weight: 700;
        color: #fff;
        box-shadow: 0 6px 18px rgba(102, 126, 234, 0.18);
      }

      /* Make the item count text extra prominent */
      #itemCount {
        font-size: 15px;
        font-weight: 700;
        color: #fff;
        text-shadow: 0 1px 0 rgba(0,0,0,0.25);
      }

      /* Items Grid */
      .items-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 20px;
      }

      .item-card {
        background: white;
        border: 2px solid #f0f0f0;
        border-radius: 12px;
        overflow: hidden;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        height: 200px;
      }

      .item-card:hover {
        border-color: #667eea;
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.2);
      }

      .item-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        position: absolute;
        top: 0;
        left: 0;
      }

      .item-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 15px;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.4), transparent);
        color: white;
      }

      .item-name {
        font-size: 14px;
        font-weight: 600;
        color: white;
        margin-bottom: 8px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
      }

      .item-price {
        font-size: 16px;
        font-weight: 700;
        color: white;
        margin-bottom: 5px;
      }

      .item-stock {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.9);
      }

      /* Cart Panel */
      .cart-panel {
        width: 400px;
        background: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        display: flex;
        flex-direction: column;
        order: 2;
        flex-shrink: 0;
      }

      .cart-header {
        font-size: 20px;
        font-weight: 700;
        color: #333;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
      }

      .customer-section {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
      }

      .customer-label {
        font-size: 12px;
        color: #666;
        margin-bottom: 8px;
        text-transform: uppercase;
        font-weight: 600;
      }

      .customer-display {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .customer-name {
        font-size: 16px;
        font-weight: 600;
        color: #333;
      }

      .customer-change {
        background: #667eea;
        color: white;
        border: none;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .customer-change:hover {
        background: #5568d3;
      }

      .cart-items {
        flex: 1;
        overflow-y: auto;
        margin-bottom: 20px;
      }

      .cart-empty {
        text-align: center;
        padding: 40px 20px;
        color: #999;
      }

      .cart-empty-icon {
        font-size: 48px;
        margin-bottom: 15px;
        opacity: 0.5;
      }

      .cart-item {
        display: flex;
        gap: 15px;
        padding: 15px;
        border-bottom: 1px solid #f0f0f0;
        position: relative;
      }

      .cart-item-info {
        flex: 1;
      }

      .cart-item-name {
        font-size: 14px;
        font-weight: 600;
        color: #333;
        margin-bottom: 5px;
      }

      .cart-item-details {
        font-size: 12px;
        color: #666;
      }

      .cart-item-price {
        font-size: 14px;
        font-weight: 700;
        color: #667eea;
      }

      .cart-item-remove {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #ff4444;
        color: white;
        border: none;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        font-size: 18px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
      }

      .cart-item-remove:hover {
        background: #cc0000;
      }

      .cart-summary {
        border-top: 2px solid #f0f0f0;
        padding-top: 20px;
      }

      .cart-action-btn {
        width: 100%;
        padding: 12px;
        background: #f8f9fa;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        margin-bottom: 10px;
        transition: all 0.3s ease;
      }

      .cart-action-btn:hover {
        background: #e9ecef;
        border-color: #667eea;
      }

      .cart-total {
        display: flex;
        justify-content: space-between;
        font-size: 20px;
        font-weight: 700;
        color: #333;
        margin: 20px 0;
      }

      .checkout-btn {
        width: 100%;
        padding: 15px;
        background: #667eea;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .checkout-btn:hover {
        background: #5568d3;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
      }

      /* Modal Styles */
      .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 10000;
      }

      .modal-overlay.active {
        display: flex;
      }

      .modal-content {
        background: white;
        border-radius: 16px;
        padding: 35px 40px;
        max-width: 650px;
        width: 92%;
        max-height: 85vh;
        overflow-y: auto;
        position: relative;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
      }

      .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f0f0f0;
      }

      .modal-title {
        font-size: 26px;
        font-weight: 700;
        color: #2c3e50;
        margin: 0;
      }

      .modal-close {
        background: #f8f9fa;
        border: none;
        font-size: 32px;
        color: #6c757d;
        cursor: pointer;
        padding: 0;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
      }

      .modal-close:hover {
        background: #e9ecef;
        color: #333;
        transform: rotate(90deg);
      }

      .item-preview {
        display: flex;
        gap: 18px;
        padding: 20px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 12px;
        margin-bottom: 25px;
        border: 1px solid #e0e0e0;
      }

      .item-preview img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      }

      .item-preview-info {
        flex: 1;
      }

      .item-preview-name {
        font-weight: 600;
        font-size: 18px;
        color: #2c3e50;
        margin-bottom: 6px;
      }

      .item-preview-price {
        color: #667eea;
        font-weight: bold;
        font-size: 20px;
        margin-bottom: 4px;
      }

      .item-preview-stock {
        font-size: 14px;
        color: #6c757d;
        margin-top: 6px;
      }

      .form-group {
        margin-bottom: 24px;
      }

      .form-label {
        display: block;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 10px;
        font-size: 15px;
      }

      .form-control {
        width: 100%;
        padding: 14px 16px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 15px;
        transition: all 0.3s ease;
        outline: none;
      }

      .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
      }

      .quantity-control {
        display: flex;
        align-items: center;
        gap: 12px;
      }

      .quantity-btn {
        width: 48px;
        height: 48px;
        border: 2px solid #e0e0e0;
        background: white;
        border-radius: 10px;
        font-size: 22px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .quantity-btn:hover {
        border-color: #667eea;
        background: #667eea;
        color: white;
        transform: scale(1.05);
      }

      .quantity-input {
        width: 100px;
        text-align: center;
        font-weight: 600;
        font-size: 16px;
      }

      .add-to-cart-btn, .select-customer-btn {
        width: 100%;
        padding: 16px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white;
        font-weight: 700;
        border-radius: 12px;
        cursor: pointer;
        font-size: 17px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin-top: 10px;
      }

      .add-to-cart-btn:hover, .select-customer-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
      }

      /* Customer Dropdown */
      .customer-dropdown {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: white;
        border: 2px solid #667eea;
        border-radius: 8px;
        margin-top: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        z-index: 100;
        max-height: 300px;
        overflow-y: auto;
        display: none;
      }

      .customer-dropdown.active {
        display: block;
      }

      .cart-discount-info {
        font-size: 14px;
        color: #28a745;
        margin-top: 6px;
        display: none;
      }

      .customer-dropdown-search {
        padding: 10px;
        border-bottom: 1px solid #e0e0e0;
        position: sticky;
        top: 0;
        background: white;
        z-index: 10;
      }

      .customer-dropdown-search input {
        width: 100%;
        padding: 8px 12px;
        border: 2px solid #e0e0e0;
        border-radius: 6px;
        font-size: 14px;
        outline: none;
      }

      .customer-dropdown-list {
        padding: 5px;
      }

      .customer-dropdown-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px;
        border-radius: 6px;
        cursor: pointer;
        transition: background 0.2s;
      }

      .customer-dropdown-item:hover {
        background: #f8f9fa;
      }

      .customer-dropdown-item.selected {
        background: rgba(102, 126, 234, 0.1);
      }

      .customer-dropdown-item.new-customer {
        border-top: 1px solid #e0e0e0;
        color: #28a745;
        font-weight: 600;
      }

      .customer-dropdown-icon {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 14px;
        flex-shrink: 0;
      }

      .customer-dropdown-item.new-customer .customer-dropdown-icon {
        background: #28a745;
      }

      .customer-dropdown-info {
        flex: 1;
      }

      .customer-dropdown-name {
        font-weight: 600;
        font-size: 14px;
        color: #2c3e50;
      }

      .customer-dropdown-phone {
        font-size: 12px;
        color: #6c757d;
      }

      .customer-dropdown-check {
        color: #667eea;
        font-size: 18px;
      }

      /* Customer List Styles */
      .customer-list {
        max-height: 300px;
        overflow-y: auto;
      }

      .customer-list-item {
        padding: 12px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        margin-bottom: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .customer-list-item:hover {
        border-color: #667eea;
        background: #f8f9fa;
      }

      .customer-item-name {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 3px;
      }

      .customer-item-phone {
        font-size: 13px;
        color: #6c757d;
      }

      .new-customer-form {
        display: none;
        padding-top: 15px;
        border-top: 2px solid #e0e0e0;
        margin-top: 15px;
      }

      .new-customer-form.active {
        display: block;
      }

      .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
      }

      /* Saved Cart Styles */
      .saved-cart-warning {
        background: #e7f3ff;
        border-left: 4px solid #007bff;
        padding: 12px;
        border-radius: 6px;
        margin-bottom: 20px;
        font-size: 14px;
        color: #004085;
      }

      .saved-carts-list {
        max-height: 200px;
        overflow-y: auto;
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid #e0e0e0;
      }

      .saved-cart-item {
        padding: 10px;
        background: #f8f9fa;
        border-radius: 6px;
        margin-bottom: 8px;
      }

      .saved-cart-item-name {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 3px;
      }

      .saved-cart-item-details {
        font-size: 12px;
        color: #6c757d;
      }

      .saved-cart-item-date {
        font-size: 11px;
        color: #999;
        margin-top: 3px;
      }

      /* Receipt Modal */
      .receipt-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        z-index: 10001;
        align-items: center;
        justify-content: center;
      }

      .receipt-modal.active {
        display: flex;
      }

      .receipt-container {
        background: white;
        width: 100%;
        height: 100%;
        max-width: 100%;
        max-height: 100%;
        border-radius: 0;
        box-shadow: none;
        overflow: hidden;
        transform: translateY(100%);
        animation: flyInFull 0.5s ease forwards;
      }

      @keyframes flyInFull {
        from {
          transform: translateY(100%);
          opacity: 0;
        }
        to {
          transform: translateY(0);
          opacity: 1;
        }
      }

      .receipt-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 25px 20px;
        text-align: center;
      }

      .receipt-header h2 {
        margin: 0 0 5px 0;
        font-size: 24px;
        font-weight: bold;
      }

      .receipt-header .business-name {
        font-size: 16px;
        opacity: 0.95;
      }

      .receipt-header .receipt-date {
        font-size: 12px;
        opacity: 0.85;
        margin-top: 8px;
      }

      .receipt-body {
        padding: 30px 20%;
        max-height: calc(100vh - 300px);
        overflow-y: auto;
      }

      .receipt-info {
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px dashed #e0e0e0;
      }

      .receipt-info-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 8px;
        font-size: 14px;
      }

      .receipt-info-label {
        color: #6c757d;
        font-weight: 500;
      }

      .receipt-info-value {
        color: #2c3e50;
        font-weight: 600;
      }

      .receipt-items {
        margin-bottom: 20px;
      }

      .receipt-items-header {
        font-weight: bold;
        color: #2c3e50;
        margin-bottom: 15px;
        font-size: 15px;
      }

      .receipt-item {
        margin-bottom: 15px;
        padding-bottom: 12px;
        border-bottom: 1px solid #f0f0f0;
      }

      .receipt-item:last-child {
        border-bottom: none;
      }

      .receipt-item-name {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 5px;
        font-size: 14px;
      }

      .receipt-item-details {
        display: flex;
        justify-content: space-between;
        font-size: 13px;
        color: #6c757d;
      }

      .receipt-item-note {
        font-size: 12px;
        color: #6c757d;
        font-style: italic;
        margin-top: 4px;
      }

      .receipt-totals {
        padding-top: 15px;
        border-top: 2px dashed #e0e0e0;
      }

      .receipt-total-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        font-size: 15px;
      }

      .receipt-total-row.grand-total {
        margin-top: 15px;
        padding-top: 15px;
        border-top: 2px solid #2c3e50;
        font-size: 20px;
        font-weight: bold;
        color: #2c3e50;
      }

      .receipt-footer {
        background: #f8f9fa;
        padding: 20px;
        text-align: center;
        border-top: 2px dashed #e0e0e0;
      }

      .receipt-actions {
        display: flex;
        gap: 10px;
        margin-bottom: 15px;
      }

      .receipt-btn {
        flex: 1;
        padding: 12px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
      }

      .receipt-btn-print {
        background: #667eea;
        color: white;
      }

      .receipt-btn-print:hover {
        background: #5568d3;
        transform: translateY(-2px);
      }

      .receipt-btn-close {
        background: #e0e0e0;
        color: #2c3e50;
      }

      .receipt-btn-close:hover {
        background: #d0d0d0;
      }

      .receipt-thank-you {
        font-size: 13px;
        color: #6c757d;
        margin-top: 10px;
      }

      .receipt-thank-you .bi-heart-fill {
        color: #dc3545;
      }

      /* Print Styles */
      @media print {
        body * {
          visibility: hidden;
        }
        .receipt-container, .receipt-container * {
          visibility: visible;
        }
        .receipt-container {
          position: absolute;
          left: 0;
          top: 0;
          width: 100%;
          max-width: 100%;
          box-shadow: none;
        }
        .receipt-actions {
          display: none;
        }
      }

      /* Responsive */
      @media (max-width: 768px) {
        .pos-layout {
          flex-direction: column;
          height: auto;
        }

        .items-section {
          order: 2;
        }

        .cart-panel {
          width: 100%;
          order: 1;
          margin-bottom: 20px;
        }

        .items-grid {
          grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        }
      }
    </style>
  </head>
  <body class="with-welcome-text">
    <?php include '../layouts/preloader.php'; ?>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        <!-- Sidebar include -->
        <?php include '../layouts/sidebar_content_pages.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Sell content starts here -->
            <div class="row">
              <div class="col-sm-12">
                <div class="home-tab">
                  
                  <!-- Page Content -->
                  <div class="sell-container">
                    <div class="pos-layout">
                      <!-- Items Section -->
                      <div class="items-section">
                        <div class="items-container">
                          <!-- Filter Controls -->
                          <div class="filter-controls">
                            <div class="filter-left">
                              <div class="search-box">
                                <i class="bi bi-search search-icon"></i>
                                <input type="text" id="searchInput" placeholder="Search items by name..." autocomplete="off">
                                <i class="bi bi-x-circle clear-icon" id="clearSearch"></i>
                              </div>
                            </div>
                            
                            <div class="filter-right">
                              <div class="category-filter">
                                <select id="categoryFilter">
                                  <option value="">All Categories</option>
                                  <option value="laptops">Laptops</option>
                                  <option value="accessories">Accessories</option>
                                  <option value="storage">Storage Devices</option>
                                  <option value="peripherals">Peripherals</option>
                                  <option value="components">Components</option>
                                  <option value="cables">Cables & Adapters</option>
                                </select>
                              </div>
                              
                              <div class="filter-badge">
                                <i class="bi bi-box-seam"></i>
                                <span id="itemCount">20 Items</span>
                              </div>
                            </div>
                          </div>
                          
                          <div class="items-grid">
                            <!-- Item 1 -->
                            <div class="item-card" data-name="Laptop HP Pavilion" data-price="450000" data-stock="15" data-img="../assets/images/faces/face1.jpg">
                              <img src="../assets/images/faces/face1.jpg" alt="Product">
                              <div class="item-overlay">
                                <div class="item-name">Laptop HP Pavilion</div>
                                <div class="item-price">₦450,000</div>
                                <div class="item-stock">Stock: 15</div>
                              </div>
                            </div>

                            <!-- Item 2 -->
                            <div class="item-card" data-name="Wireless Mouse" data-price="8500" data-stock="45" data-img="../assets/images/faces/face2.jpg">
                              <img src="../assets/images/faces/face2.jpg" alt="Product">
                              <div class="item-overlay">
                                <div class="item-name">Wireless Mouse</div>
                                <div class="item-price">₦8,500</div>
                                <div class="item-stock">Stock: 45</div>
                              </div>
                            </div>

                            <!-- Item 3 -->
                            <div class="item-card" data-name="USB Flash Drive 64GB" data-price="5200" data-stock="120" data-img="../assets/images/faces/face3.jpg">
                              <img src="../assets/images/faces/face3.jpg" alt="Product">
                              <div class="item-overlay">
                                <div class="item-name">USB Flash Drive 64GB</div>
                                <div class="item-price">₦5,200</div>
                                <div class="item-stock">Stock: 120</div>
                              </div>
                            </div>

                            <!-- Item 4 -->
                            <div class="item-card" data-name="Gaming Keyboard" data-price="25000" data-stock="30" data-img="../assets/images/faces/face4.jpg">
                              <img src="../assets/images/faces/face4.jpg" alt="Product">
                              <div class="item-overlay">
                                <div class="item-name">Gaming Keyboard</div>
                                <div class="item-price">₦25,000</div>
                                <div class="item-stock">Stock: 30</div>
                              </div>
                            </div>

                            <!-- Item 5 -->
                            <div class="item-card" data-name="Monitor 24&quot; LED" data-price="85000" data-stock="22" data-img="../assets/images/faces/face5.jpg">
                              <img src="../assets/images/faces/face5.jpg" alt="Product">
                              <div class="item-overlay">
                                <div class="item-name">Monitor 24" LED</div>
                                <div class="item-price">₦85,000</div>
                                <div class="item-stock">Stock: 22</div>
                              </div>
                            </div>

                            <!-- Item 6 -->
                            <div class="item-card" data-name="Headphones Bluetooth" data-price="15500" data-stock="60" data-img="../assets/images/faces/face6.jpg">
                              <img src="../assets/images/faces/face6.jpg" alt="Product">
                              <div class="item-overlay">
                                <div class="item-name">Headphones Bluetooth</div>
                                <div class="item-price">₦15,500</div>
                                <div class="item-stock">Stock: 60</div>
                              </div>
                            </div>

                            <!-- Item 7 -->
                            <div class="item-card" data-name="External HDD 1TB" data-price="32000" data-stock="18" data-img="../assets/images/faces/face7.jpg">
                              <img src="../assets/images/faces/face7.jpg" alt="Product">
                              <div class="item-overlay">
                                <div class="item-name">External HDD 1TB</div>
                                <div class="item-price">₦32,000</div>
                                <div class="item-stock">Stock: 18</div>
                              </div>
                            </div>

                            <!-- Item 8 -->
                            <div class="item-card" data-name="Webcam HD 1080p" data-price="22000" data-stock="25" data-img="../assets/images/faces/face8.jpg">
                              <img src="../assets/images/faces/face8.jpg" alt="Product">
                              <div class="item-overlay">
                                <div class="item-name">Webcam HD 1080p</div>
                                <div class="item-price">₦22,000</div>
                                <div class="item-stock">Stock: 25</div>
                              </div>
                            </div>

                            <!-- Item 9 -->
                            <div class="item-card" data-name="Router WiFi Dual Band" data-price="18500" data-stock="35" data-img="../assets/images/faces/face1.jpg">
                              <img src="../assets/images/faces/face1.jpg" alt="Product">
                              <div class="item-overlay">
                                <div class="item-name">Router WiFi Dual Band</div>
                                <div class="item-price">₦18,500</div>
                                <div class="item-stock">Stock: 35</div>
                              </div>
                            </div>

                            <!-- Item 10 -->
                            <div class="item-card" data-name="Smart Watch" data-price="45000" data-stock="28" data-img="../assets/images/faces/face2.jpg">
                              <img src="../assets/images/faces/face2.jpg" alt="Product">
                              <div class="item-overlay">
                                <div class="item-name">Smart Watch</div>
                                <div class="item-price">₦45,000</div>
                                <div class="item-stock">Stock: 28</div>
                              </div>
                            </div>

                            <!-- Item 11 -->
                            <div class="item-card" data-name="Power Bank 20000mAh" data-price="12000" data-stock="75" data-img="../assets/images/faces/face3.jpg">
                              <img src="../assets/images/faces/face3.jpg" alt="Product">
                              <div class="item-overlay">
                                <div class="item-name">Power Bank 20000mAh</div>
                                <div class="item-price">₦12,000</div>
                                <div class="item-stock">Stock: 75</div>
                              </div>
                            </div>

                            <!-- Item 12 -->
                            <div class="item-card" data-name="Graphics Tablet" data-price="38000" data-stock="15" data-img="../assets/images/faces/face4.jpg">
                              <img src="../assets/images/faces/face4.jpg" alt="Product">
                              <div class="item-overlay">
                                <div class="item-name">Graphics Tablet</div>
                                <div class="item-price">₦38,000</div>
                                <div class="item-stock">Stock: 15</div>
                              </div>
                            </div>

                            <!-- Item 13 -->
                            <div class="item-card" data-name="SSD 500GB" data-price="42000" data-stock="40" data-img="../assets/images/faces/face5.jpg">
                              <img src="../assets/images/faces/face5.jpg" alt="Product">
                              <div class="item-overlay">
                                <div class="item-name">SSD 500GB</div>
                                <div class="item-price">₦42,000</div>
                                <div class="item-stock">Stock: 40</div>
                              </div>
                            </div>

                            <!-- Item 14 -->
                            <div class="item-card" data-name="RAM 16GB DDR4" data-price="35000" data-stock="50" data-img="../assets/images/faces/face6.jpg">
                              <img src="../assets/images/faces/face6.jpg" alt="Product">
                              <div class="item-overlay">
                                <div class="item-name">RAM 16GB DDR4</div>
                                <div class="item-price">₦35,000</div>
                                <div class="item-stock">Stock: 50</div>
                              </div>
                            </div>

                            <!-- Item 15 -->
                            <div class="item-card" data-name="Laptop Bag Premium" data-price="8000" data-stock="65" data-img="../assets/images/faces/face7.jpg">
                              <img src="../assets/images/faces/face7.jpg" alt="Product">
                              <div class="item-overlay">
                                <div class="item-name">Laptop Bag Premium</div>
                                <div class="item-price">₦8,000</div>
                                <div class="item-stock">Stock: 65</div>
                              </div>
                            </div>

                            <!-- Item 16 -->
                            <div class="item-card" data-name="USB-C Hub 7-in-1" data-price="15000" data-stock="42" data-img="../assets/images/faces/face8.jpg">
                              <img src="../assets/images/faces/face8.jpg" alt="Product">
                              <div class="item-overlay">
                                <div class="item-name">USB-C Hub 7-in-1</div>
                                <div class="item-price">₦15,000</div>
                                <div class="item-stock">Stock: 42</div>
                              </div>
                            </div>

                            <!-- Item 17 -->
                            <div class="item-card" data-name="Cooling Pad Laptop" data-price="9500" data-stock="38" data-img="../assets/images/faces/face1.jpg">
                              <img src="../assets/images/faces/face1.jpg" alt="Product">
                              <div class="item-overlay">
                                <div class="item-name">Cooling Pad Laptop</div>
                                <div class="item-price">₦9,500</div>
                                <div class="item-stock">Stock: 38</div>
                              </div>
                            </div>

                            <!-- Item 18 -->
                            <div class="item-card" data-name="Cable HDMI 2.0" data-price="3500" data-stock="95" data-img="../assets/images/faces/face2.jpg">
                              <img src="../assets/images/faces/face2.jpg" alt="Product">
                              <div class="item-overlay">
                                <div class="item-name">Cable HDMI 2.0</div>
                                <div class="item-price">₦3,500</div>
                                <div class="item-stock">Stock: 95</div>
                              </div>
                            </div>

                            <!-- Item 19 -->
                            <div class="item-card" data-name="Bluetooth Speaker" data-price="12000" data-stock="22" data-img="../assets/images/faces/face3.jpg">
                              <img src="../assets/images/faces/face3.jpg" alt="Product">
                              <div class="item-overlay">
                                <div class="item-name">Bluetooth Speaker</div>
                                <div class="item-price">₦12,000</div>
                                <div class="item-stock">Stock: 22</div>
                              </div>
                            </div>

                            <!-- Item 20 -->
                            <div class="item-card" data-name="Phone Case" data-price="1500" data-stock="200" data-img="../assets/images/faces/face4.jpg">
                              <img src="../assets/images/faces/face4.jpg" alt="Product">
                              <div class="item-overlay">
                                <div class="item-name">Phone Case</div>
                                <div class="item-price">₦1,500</div>
                                <div class="item-stock">Stock: 200</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <!-- Cart Panel -->
                      <div class="cart-panel">
                        <div class="cart-header">
                          <i class="bi bi-cart3"></i> Cart
                        </div>
                        
                        <!-- Customer Section -->
                        <div class="customer-section" id="customerSection">
                          <div class="customer-label">Customer</div>
                          <div class="customer-display">
                            <span class="customer-name" id="customerName">Walk-in Customer</span>
                            <button class="customer-change" id="addCustomerBtn">
                              <i class="bi bi-person-plus"></i> Change
                            </button>
                          </div>
                          
                          <!-- Customer Dropdown -->
                          <div class="customer-dropdown" id="customerDropdown">
                            <div class="customer-dropdown-search">
                              <input type="text" id="customerSearchInput" placeholder="Search customers..." autocomplete="off">
                            </div>
                            <div class="customer-dropdown-list" id="customerDropdownList">
                              <!-- Customers will be loaded here dynamically -->
                            </div>
                          </div>
                        </div>
                        
                        <div class="cart-items" id="cartItems">
                          <div class="cart-empty">
                            <i class="bi bi-cart-x cart-empty-icon"></i>
                            <p>Your cart is empty</p>
                            <small>Add items to get started</small>
                          </div>
                        </div>
                        
                        <div class="cart-summary">
                          <!-- Add Discount Button -->
                          <button class="cart-action-btn" id="addDiscountBtn">
                            <i class="bi bi-percent"></i> Add Discount
                          </button>
                          <!-- Discount modal will be used (see modal markup later) -->
                          
                          <div class="cart-subtotals">
                            <div style="display:flex; justify-content:space-between; margin-bottom:6px;">
                              <span>Subtotal:</span>
                              <span id="cartSubtotal">₦0.00</span>
                            </div>
                            <div id="cartDiscountRow" style="display:none; justify-content:space-between; margin-bottom:6px;">
                              <span>Discount:</span>
                              <span id="cartDiscountAmount">-₦0.00</span>
                            </div>
                          </div>

                          <div class="cart-total">
                            <span>Total:</span>
                            <span id="cartTotal">₦0.00</span>
                          </div>

                          <div style="display:flex; gap:8px; align-items:center;">
                            <div class="cart-discount-info" id="cartDiscountInfo">
                              <!-- Discount info shown here when applied -->
                            </div>
                            <button class="cart-action-btn" id="removeDiscountBtn" style="display:none; padding:8px 10px;">Remove Discount</button>
                          </div>
                          
                          <!-- Cart Actions -->
                          <div class="cart-actions">
                            <button class="cart-action-btn" id="saveCartBtn">
                              <i class="bi bi-bookmark"></i> Save
                            </button>
                          </div>
                          
                          <button class="checkout-btn" id="checkoutBtn">
                            <i class="bi bi-check-circle"></i> Checkout
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Page Content -->
                  
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    
    <!-- Add Item Modal -->
    <div class="modal-overlay" id="itemModal">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="modalTitle"></h3>
          <button class="modal-close" id="closeModal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="item-preview" id="itemPreview">
            <img src="" alt="Item" id="modalItemImg">
            <div class="item-preview-info">
              <div class="item-preview-name" id="modalItemName"></div>
              <div class="item-preview-price" id="modalItemPrice"></div>
              <div class="item-preview-stock" id="modalItemStock"></div>
            </div>
          </div>
          
          <div class="form-group">
            <label class="form-label">Quantity</label>
            <div class="quantity-control">
              <button class="quantity-btn" id="decreaseQty">-</button>
              <input type="number" class="form-control quantity-input" id="itemQuantity" value="1" min="1">
              <button class="quantity-btn" id="increaseQty">+</button>
            </div>
          </div>
          
          <div class="form-group">
            <label class="form-label">Note (Optional)</label>
            <textarea class="form-control" id="itemNote" rows="3" placeholder="Add any special instructions..."></textarea>
          </div>
        </div>
        <button class="add-to-cart-btn" id="addToCartBtn">
          <i class="bi bi-cart-plus"></i> Add to Cart
        </button>
      </div>
    </div>
    
    <!-- Customer Selection Modal -->
    <div class="modal-overlay" id="customerModal">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Select Customer</h3>
          <button class="modal-close" id="closeCustomerModal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="customer-list" id="customerList">
            <!-- New Customer Option -->
            <div class="customer-list-item new-customer" data-customer-id="new">
              <div class="customer-info">
                <div class="customer-item-name">
                  <i class="bi bi-plus-circle"></i> New Customer
                </div>
                <div class="customer-item-phone">Add a new customer</div>
              </div>
              <i class="bi bi-chevron-right customer-select-icon"></i>
            </div>
            
            <!-- Walk-in Customer -->
            <div class="customer-list-item" data-customer-id="walk-in" data-customer-name="Walk-in Customer">
              <div class="customer-info">
                <div class="customer-item-name">Walk-in Customer</div>
                <div class="customer-item-phone">Anonymous customer</div>
              </div>
              <i class="bi bi-check-circle customer-select-icon"></i>
            </div>
            
            <!-- Sample Customers (will be loaded from localStorage/database) -->
            <div class="customer-list-item" data-customer-id="1" data-customer-name="John Doe" data-customer-phone="08012345678">
              <div class="customer-info">
                <div class="customer-item-name">John Doe</div>
                <div class="customer-item-phone">08012345678</div>
              </div>
              <i class="bi bi-check-circle customer-select-icon"></i>
            </div>
            
            <div class="customer-list-item" data-customer-id="2" data-customer-name="Jane Smith" data-customer-phone="08087654321">
              <div class="customer-info">
                <div class="customer-item-name">Jane Smith</div>
                <div class="customer-item-phone">08087654321</div>
              </div>
              <i class="bi bi-check-circle customer-select-icon"></i>
            </div>
            
            <div class="customer-list-item" data-customer-id="3" data-customer-name="David Johnson" data-customer-phone="08098765432">
              <div class="customer-info">
                <div class="customer-item-name">David Johnson</div>
                <div class="customer-item-phone">08098765432</div>
              </div>
              <i class="bi bi-check-circle customer-select-icon"></i>
            </div>
          </div>
          
          <!-- New Customer Form -->
          <div class="new-customer-form" id="newCustomerForm">
            <h4>Add New Customer</h4>
            <div class="form-group">
              <label class="form-label">Customer Name *</label>
              <input type="text" class="form-control" id="newCustomerName" placeholder="Enter customer name" required>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="newCustomerPhone" placeholder="080XXXXXXXX">
              </div>
              <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" id="newCustomerEmail" placeholder="email@example.com">
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Address</label>
              <textarea class="form-control" id="newCustomerAddress" rows="2" placeholder="Enter customer address"></textarea>
            </div>
            <button class="select-customer-btn" id="saveNewCustomerBtn">
              <i class="bi bi-person-plus"></i> Add & Select Customer
            </button>
          </div>
        </div>
        <button class="select-customer-btn" id="selectCustomerBtn">
          <i class="bi bi-check-circle"></i> Select Customer
        </button>
      </div>
    </div>
    
    <!-- Save Cart Modal -->
    <div class="modal-overlay" id="saveCartModal">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Save Cart</h3>
          <button class="modal-close" id="closeSaveCartModal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="saved-cart-warning">
            <i class="bi bi-info-circle"></i> Save this cart to retrieve it later from the Saved Carts page.
          </div>
          
          <div class="form-group">
            <label class="form-label">Cart Name *</label>
            <input type="text" class="form-control" id="savedCartName" placeholder="e.g., John's Order, Pending Sale #123" required>
          </div>
          
          <div class="form-group">
            <label class="form-label">Note (Optional)</label>
            <textarea class="form-control" id="savedCartNote" rows="3" placeholder="Add any notes about this cart..."></textarea>
          </div>
          
          <div class="saved-carts-list" id="savedCartsList">
            <small>Your saved carts will appear here</small>
          </div>
        </div>
        <button class="select-customer-btn" id="confirmSaveCartBtn">
          <i class="bi bi-bookmark-fill"></i> Save Cart
        </button>
      </div>
    </div>
    
    <!-- Discount Modal -->
    <div class="modal-overlay" id="discountModal">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Apply Discount</h3>
          <button class="modal-close" id="closeDiscountModal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="form-label">Search Discounts</label>
            <input type="text" class="form-control" id="discountModalSearchInput" placeholder="Search or filter discounts...">
          </div>

          <div id="discountList" style="max-height:320px; overflow-y:auto;">
            <!-- discount items will be rendered here -->
          </div>

          <hr>
          <!-- Custom discount removed; use presets or 'Remove discount' button in cart -->
        </div>
      </div>
    </div>
    
    <!-- Receipt Modal -->
    <div class="receipt-modal" id="receiptModal">
      <div class="receipt-container">
        <div class="receipt-header">
          <h2><i class="bi bi-receipt"></i> Receipt</h2>
          <div class="business-name">SalesPilot Inventory</div>
          <div class="receipt-date" id="receiptDate"></div>
        </div>
        
        <div class="receipt-body">
          <div class="receipt-info">
            <div class="receipt-info-row">
              <span class="receipt-info-label">Receipt No:</span>
              <span class="receipt-info-value" id="receiptNumber"></span>
            </div>
            <div class="receipt-info-row">
              <span class="receipt-info-label">Customer:</span>
              <span class="receipt-info-value" id="receiptCustomer"></span>
            </div>
            <div class="receipt-info-row">
              <span class="receipt-info-label">Served By:</span>
              <span class="receipt-info-value">Manager</span>
            </div>
          </div>
          
          <div class="receipt-items">
            <div class="receipt-items-header">Items Purchased</div>
            <div id="receiptItemsList"></div>
          </div>
          
          <div class="receipt-totals">
            <div class="receipt-total-row">
              <span>Subtotal:</span>
              <span id="receiptSubtotal">₦0.00</span>
            </div>
            <div class="receipt-total-row">
              <span>Tax (0%):</span>
              <span>₦0.00</span>
            </div>
            <div class="receipt-total-row grand-total">
              <span>Total:</span>
              <span id="receiptTotal">₦0.00</span>
            </div>
          </div>
        </div>
        
        <div class="receipt-footer">
          <div class="receipt-actions">
            <button class="receipt-btn receipt-btn-print" id="printReceiptBtn">
              <i class="bi bi-printer"></i> Print
            </button>
            <button class="receipt-btn receipt-btn-close" id="closeReceiptBtn">
              <i class="menu-icon bi bi-cart-fill"></i> Start New Sale
            </button>
          </div>
          <div class="receipt-thank-you">
            <i class="bi bi-heart-fill"></i> Thank you for your purchase!
          </div>
        </div>
      </div>
    </div>
    
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/chart.js/chart.umd.js"></script>
    <script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/template.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/todolist.js"></script>
    
    <!-- Include Sidebar Scripts -->
    <?php include '../layouts/sidebar_scripts.php'; ?>
    
    <!-- Sell Page JavaScript -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Cart state
      let cartItems = [];
      let selectedCustomer = {
        id: null,
        name: 'Walk-in Customer'
      };
      
      // Sample customers - in production, load from database
      let allCustomers = [
        { id: 'walk-in', name: 'Walk-in Customer', phone: '', type: 'default' },
        { id: '1', name: 'John Doe', phone: '08012345678', type: 'regular' },
        { id: '2', name: 'Jane Smith', phone: '08087654321', type: 'regular' },
        { id: '3', name: 'David Johnson', phone: '08098765432', type: 'regular' }
      ];
      
      // Load saved customers from localStorage
      const savedCustomers = JSON.parse(localStorage.getItem('customers') || '[]');
      allCustomers = allCustomers.concat(savedCustomers.map(function(c) {
        return { id: c.id, name: c.name, phone: c.phone || '', type: 'regular' };
      }));
      
      // Elements
      const itemCards = document.querySelectorAll('.item-card');
      const cartItemsContainer = document.getElementById('cartItems');
      const cartTotalElement = document.getElementById('cartTotal');
      const cartSubtotalElement = document.getElementById('cartSubtotal');
      const cartDiscountAmountEl = document.getElementById('cartDiscountAmount');
      const cartDiscountRow = document.getElementById('cartDiscountRow');
      const searchInput = document.getElementById('searchInput');
      const clearSearch = document.getElementById('clearSearch');
      const categoryFilter = document.getElementById('categoryFilter');
      const checkoutBtn = document.getElementById('checkoutBtn');
      const itemCount = document.getElementById('itemCount');
      const addDiscountBtn = document.getElementById('addDiscountBtn');
      const discountModal = document.getElementById('discountModal');
      const discountList = document.getElementById('discountList');
      const discountModalSearchInput = document.getElementById('discountModalSearchInput');
      const closeDiscountModal = document.getElementById('closeDiscountModal');
      const removeDiscountBtn = document.getElementById('removeDiscountBtn');
      const cartDiscountInfo = document.getElementById('cartDiscountInfo');
      
      // Modal elements
      const modal = document.getElementById('itemModal');
      const closeModal = document.getElementById('closeModal');
      const decreaseQty = document.getElementById('decreaseQty');
      const increaseQty = document.getElementById('increaseQty');
      const itemQuantity = document.getElementById('itemQuantity');
      const addToCartBtn = document.getElementById('addToCartBtn');
      const itemNote = document.getElementById('itemNote');
      
      // Customer dropdown elements
      const addCustomerBtn = document.getElementById('addCustomerBtn');
      const customerDropdown = document.getElementById('customerDropdown');
      const customerSearchInput = document.getElementById('customerSearchInput');
      const customerDropdownList = document.getElementById('customerDropdownList');
      
      // Customer modal elements
      const customerModal = document.getElementById('customerModal');
      const closeCustomerModal = document.getElementById('closeCustomerModal');
      const newCustomerForm = document.getElementById('newCustomerForm');
      const saveNewCustomerBtn = document.getElementById('saveNewCustomerBtn');
      const selectCustomerBtn = document.getElementById('selectCustomerBtn');
      
      // Save cart elements
      const saveCartBtn = document.getElementById('saveCartBtn');
      const saveCartModal = document.getElementById('saveCartModal');
      const closeSaveCartModal = document.getElementById('closeSaveCartModal');
      const confirmSaveCartBtn = document.getElementById('confirmSaveCartBtn');
      
      // Receipt elements
      const receiptModal = document.getElementById('receiptModal');
      const closeReceiptBtn = document.getElementById('closeReceiptBtn');
      const printReceiptBtn = document.getElementById('printReceiptBtn');
      
      let currentItem = null;
      // Discount state
      let appliedDiscount = null; // {type: 'percent'|'fixed', value: number, label: string}
      const discountOptions = [
        { id: 'd5', type: 'percent', value: 5, label: '5% Off' },
        { id: 'd10', type: 'percent', value: 10, label: '10% Off' },
        { id: 'd15', type: 'percent', value: 15, label: '15% Off' },
        { id: 'd20', type: 'percent', value: 20, label: '20% Off' },
        { id: 'f500', type: 'fixed', value: 500, label: '₦500 Off' },
        { id: 'f1000', type: 'fixed', value: 1000, label: '₦1,000 Off' }
      ];

      function renderDiscountList(filtered) {
        const list = filtered || discountOptions;
        discountList.innerHTML = '';

        list.forEach(function(opt) {
          const row = document.createElement('div');
          row.className = 'customer-list-item';
          row.style.display = 'flex';
          row.style.justifyContent = 'space-between';
          row.style.alignItems = 'center';
          row.style.cursor = 'pointer';
          row.innerHTML = `
            <div>
              <div style="font-weight:600">${opt.label}</div>
              <div style="font-size:12px;color:#6c757d">${opt.type === 'percent' ? opt.value + '%' : '₦' + opt.value.toLocaleString()}</div>
            </div>
            <div><button class="cart-action-btn" style="padding:6px 10px">Apply</button></div>
          `;
          row.addEventListener('click', function() {
            applyDiscount(opt);
            discountModal.classList.remove('active');
          });
          discountList.appendChild(row);
        });
      }

      // Open discount modal
      addDiscountBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        discountModal.classList.add('active');
        discountModalSearchInput.value = '';
        renderDiscountList();
        discountModalSearchInput.focus();
      });

      // Close discount modal
      closeDiscountModal.addEventListener('click', function() {
        discountModal.classList.remove('active');
      });

      discountModal.addEventListener('click', function(e) {
        if (e.target === discountModal) discountModal.classList.remove('active');
      });

      // Search in modal
      discountModalSearchInput.addEventListener('input', function() {
        const q = this.value.toLowerCase();
        const filtered = discountOptions.filter(function(d) {
          return d.label.toLowerCase().includes(q) || (d.type === 'fixed' && ('₦' + d.value).includes(q));
        });
        renderDiscountList(filtered);
      });

      // Remove discount button handler
      removeDiscountBtn.addEventListener('click', function() {
        if (!appliedDiscount) return;
        appliedDiscount = null;
        updateCartUI();
      });

      function applyDiscount(d) {
        appliedDiscount = d;
        updateCartUI();
        if (appliedDiscount) {
          cartDiscountInfo.style.display = 'block';
          cartDiscountInfo.textContent = 'Discount applied: ' + appliedDiscount.label;
          if (removeDiscountBtn) removeDiscountBtn.style.display = 'inline-block';
        } else {
          cartDiscountInfo.style.display = 'none';
          cartDiscountInfo.textContent = '';
          if (removeDiscountBtn) removeDiscountBtn.style.display = 'none';
        }
      }
      
      // Customer Dropdown functionality
      addCustomerBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        customerDropdown.classList.toggle('active');
        if (customerDropdown.classList.contains('active')) {
          customerSearchInput.value = '';
          renderCustomerDropdown(allCustomers);
          customerSearchInput.focus();
        }
      });
      
      // Close dropdown when clicking outside
      document.addEventListener('click', function(e) {
        if (!document.getElementById('customerSection').contains(e.target)) {
          customerDropdown.classList.remove('active');
        }
      });
      
      // Search customers
      customerSearchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const filtered = allCustomers.filter(function(customer) {
          return customer.name.toLowerCase().includes(searchTerm) || 
                 customer.phone.includes(searchTerm);
        });
        renderCustomerDropdown(filtered);
      });
      
      // Render customer dropdown list
      function renderCustomerDropdown(customers) {
        customerDropdownList.innerHTML = '';
        
        // Add "New Customer" option at the top
        const newCustomerItem = document.createElement('div');
        newCustomerItem.className = 'customer-dropdown-item new-customer';
        newCustomerItem.innerHTML = `
          <div class="customer-dropdown-icon"><i class="bi bi-plus"></i></div>
          <div class="customer-dropdown-info">
            <div class="customer-dropdown-name">Add New Customer</div>
            <div class="customer-dropdown-phone">Create a new customer</div>
          </div>
        `;
        newCustomerItem.addEventListener('click', function() {
          customerDropdown.classList.remove('active');
          customerModal.classList.add('active');
          newCustomerForm.classList.add('active');
          document.getElementById('customerList').style.display = 'none';
          selectCustomerBtn.style.display = 'none';
          document.getElementById('newCustomerName').focus();
        });
        customerDropdownList.appendChild(newCustomerItem);
        
        // Add customers
        customers.forEach(function(customer) {
          const isSelected = selectedCustomer.id === customer.id || 
                           (selectedCustomer.id === null && customer.id === 'walk-in');
          
          const item = document.createElement('div');
          item.className = 'customer-dropdown-item' + (isSelected ? ' selected' : '');
          
          const initials = customer.name.split(' ').map(function(n) { return n[0]; }).join('').toUpperCase().substring(0, 2);
          
          item.innerHTML = `
            <div class="customer-dropdown-icon">${initials}</div>
            <div class="customer-dropdown-info">
              <div class="customer-dropdown-name">${customer.name}</div>
              ${customer.phone ? '<div class="customer-dropdown-phone">' + customer.phone + '</div>' : '<div class="customer-dropdown-phone">No phone</div>'}
            </div>
            ${isSelected ? '<i class="bi bi-check-circle customer-dropdown-check"></i>' : ''}
          `;
          
          item.addEventListener('click', function() {
            selectCustomer(customer);
          });
          
          customerDropdownList.appendChild(item);
        });
      }
      
      // Select customer from dropdown
      function selectCustomer(customer) {
        selectedCustomer = {
          id: customer.id === 'walk-in' ? null : customer.id,
          name: customer.name,
          phone: customer.phone
        };
        document.getElementById('customerName').textContent = selectedCustomer.name;
        customerDropdown.classList.remove('active');
      }
      
      // Customer Modal close handlers
      closeCustomerModal.addEventListener('click', function() {
        customerModal.classList.remove('active');
        newCustomerForm.classList.remove('active');
        document.getElementById('customerList').style.display = 'block';
        selectCustomerBtn.style.display = 'block';
      });
      
      customerModal.addEventListener('click', function(e) {
        if (e.target === customerModal) {
          customerModal.classList.remove('active');
          newCustomerForm.classList.remove('active');
          document.getElementById('customerList').style.display = 'block';
          selectCustomerBtn.style.display = 'block';
        }
      });
      
      // Save New Customer Button
      saveNewCustomerBtn.addEventListener('click', function() {
        const name = document.getElementById('newCustomerName').value.trim();
        const phone = document.getElementById('newCustomerPhone').value.trim();
        const email = document.getElementById('newCustomerEmail').value.trim();
        const address = document.getElementById('newCustomerAddress').value.trim();
        
        if (!name) {
          alert('Please enter customer name');
          return;
        }
        
        // Create new customer
        const newCustomer = {
          id: 'cust_' + Date.now(),
          name: name,
          phone: phone,
          email: email,
          address: address,
          createdAt: new Date().toISOString()
        };
        
        // Save to localStorage
        const customers = JSON.parse(localStorage.getItem('customers') || '[]');
        customers.push(newCustomer);
        localStorage.setItem('customers', JSON.stringify(customers));
        
        // Add to dropdown list
        allCustomers.push({
          id: newCustomer.id,
          name: newCustomer.name,
          phone: newCustomer.phone || '',
          type: 'regular'
        });
        
        // Set as selected customer
        selectedCustomer = {
          id: newCustomer.id,
          name: newCustomer.name,
          phone: newCustomer.phone
        };
        document.getElementById('customerName').textContent = selectedCustomer.name;
        
        // Reset form and close modal
        document.getElementById('newCustomerName').value = '';
        document.getElementById('newCustomerPhone').value = '';
        document.getElementById('newCustomerEmail').value = '';
        document.getElementById('newCustomerAddress').value = '';
        customerModal.classList.remove('active');
        newCustomerForm.classList.remove('active');
        document.getElementById('customerList').style.display = 'block';
        selectCustomerBtn.style.display = 'block';
        
        alert('Customer added successfully!');
      });
      
      // Handle customer list item clicks in modal
      document.addEventListener('click', function(e) {
        const customerListItem = e.target.closest('.customer-list-item');
        if (customerListItem && customerListItem.dataset.customerId) {
          const customerId = customerListItem.dataset.customerId;
          
          // Check if it's the new customer option
          if (customerId === 'new') {
            newCustomerForm.classList.add('active');
            document.getElementById('customerList').style.display = 'none';
            selectCustomerBtn.style.display = 'none';
            document.getElementById('newCustomerName').focus();
            return;
          }
          
          // Find customer and select
          const customerName = customerListItem.dataset.customerName;
          const customerPhone = customerListItem.dataset.customerPhone || '';
          
          selectedCustomer = {
            id: customerId === 'walk-in' ? null : customerId,
            name: customerName,
            phone: customerPhone
          };
          
          document.getElementById('customerName').textContent = selectedCustomer.name;
          customerModal.classList.remove('active');
        }
      });
      
      // Save Cart functionality
      saveCartBtn.addEventListener('click', function() {
        if (cartItems.length === 0) {
          alert('Cart is empty. Add items before saving.');
          return;
        }
        
        saveCartModal.classList.add('active');
        document.getElementById('savedCartName').value = '';
        document.getElementById('savedCartNote').value = '';
        loadSavedCartsList();
      });
      
      closeSaveCartModal.addEventListener('click', function() {
        saveCartModal.classList.remove('active');
      });
      
      saveCartModal.addEventListener('click', function(e) {
        if (e.target === saveCartModal) {
          saveCartModal.classList.remove('active');
        }
      });
      
      confirmSaveCartBtn.addEventListener('click', function() {
        const cartName = document.getElementById('savedCartName').value.trim();
        const cartNote = document.getElementById('savedCartNote').value.trim();
        
        if (!cartName) {
          alert('Please enter a name for the cart');
          return;
        }
        
        const savedCart = {
          id: 'cart_' + Date.now(),
          name: cartName,
          note: cartNote,
          customer: selectedCustomer,
          items: [...cartItems],
          total: cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0),
          savedAt: new Date().toISOString()
        };
        
        const savedCarts = JSON.parse(localStorage.getItem('savedCarts') || '[]');
        savedCarts.push(savedCart);
        localStorage.setItem('savedCarts', JSON.stringify(savedCarts));
        
        alert('Cart saved successfully!');
        
        // Clear current cart
        cartItems = [];
        selectedCustomer = { id: null, name: 'Walk-in Customer' };
        document.getElementById('customerName').textContent = 'Walk-in Customer';
        updateCartUI();
        
        saveCartModal.classList.remove('active');
      });
      
      function loadSavedCartsList() {
        const savedCartsList = document.getElementById('savedCartsList');
        const savedCarts = JSON.parse(localStorage.getItem('savedCarts') || '[]');
        
        if (savedCarts.length === 0) {
          savedCartsList.innerHTML = '<small>No saved carts yet</small>';
          return;
        }
        
        savedCartsList.innerHTML = '';
        savedCarts.slice(-5).reverse().forEach(function(cart) {
          const date = new Date(cart.savedAt).toLocaleString();
          const cartItem = document.createElement('div');
          cartItem.className = 'saved-cart-item';
          cartItem.innerHTML = `
            <div class="saved-cart-item-name">${cart.name}</div>
            <div class="saved-cart-item-details">${cart.customer.name} • ${cart.items.length} items • ₦${cart.total.toLocaleString()}</div>
            <div class="saved-cart-item-date">${date}</div>
          `;
          savedCartsList.appendChild(cartItem);
        });
      }
      
      // Checkout functionality
      checkoutBtn.addEventListener('click', function() {
        if (cartItems.length === 0) {
          alert('Cart is empty. Add items before checkout.');
          return;
        }
        
        generateReceipt();
        receiptModal.classList.add('active');
      });
      
      function generateReceipt() {
        const receiptNumber = 'RCP' + Date.now();
        const currentDate = new Date();
        const formattedDate = currentDate.toLocaleString('en-US', {
          year: 'numeric',
          month: 'short',
          day: 'numeric',
          hour: '2-digit',
          minute: '2-digit'
        });
        
        document.getElementById('receiptDate').textContent = formattedDate;
        document.getElementById('receiptNumber').textContent = receiptNumber;
        document.getElementById('receiptCustomer').textContent = selectedCustomer.name;
        
        const receiptItemsList = document.getElementById('receiptItemsList');
        receiptItemsList.innerHTML = '';
        
        let subtotal = 0;
        cartItems.forEach(function(item) {
          const itemTotal = item.price * item.quantity;
          subtotal += itemTotal;
          
          const itemHTML = `
            <div class="receipt-item">
              <div class="receipt-item-name">${item.name}</div>
              <div class="receipt-item-details">
                <span>${item.quantity} × ₦${item.price.toLocaleString()}</span>
                <span>₦${itemTotal.toLocaleString()}</span>
              </div>
              ${item.note ? '<div class="receipt-item-note">Note: ' + item.note + '</div>' : ''}
            </div>
          `;
          receiptItemsList.insertAdjacentHTML('beforeend', itemHTML);
        });
        
        document.getElementById('receiptSubtotal').textContent = '₦' + subtotal.toLocaleString();
        // Apply discount on receipt if any
        let receiptDiscount = 0;
        if (appliedDiscount) {
          if (appliedDiscount.type === 'percent') {
            receiptDiscount = subtotal * (appliedDiscount.value / 100);
          } else {
            receiptDiscount = appliedDiscount.value;
          }
        }
        receiptDiscount = Math.min(receiptDiscount, subtotal);
        const receiptTotalAfter = Math.max(0, subtotal - receiptDiscount);

        // Insert, update or remove discount row in receipt
        const existingDiscountRow = document.getElementById('receiptDiscountRow');
        if (existingDiscountRow && receiptDiscount > 0) {
          existingDiscountRow.querySelector('.receipt-info-label').textContent = 'Discount:';
          existingDiscountRow.querySelector('.receipt-info-value').textContent = '-₦' + Math.round(receiptDiscount).toLocaleString();
        } else if (!existingDiscountRow && receiptDiscount > 0) {
          const discountRow = document.createElement('div');
          discountRow.className = 'receipt-info-row';
          discountRow.id = 'receiptDiscountRow';
          discountRow.innerHTML = `<span class="receipt-info-label">Discount:</span><span class="receipt-info-value">-₦${Math.round(receiptDiscount).toLocaleString()}</span>`;
          const receiptInfo = document.querySelector('.receipt-info');
          if (receiptInfo) {
            receiptInfo.insertAdjacentElement('beforeend', discountRow);
          }
        } else if (existingDiscountRow && receiptDiscount === 0) {
          existingDiscountRow.remove();
        }

        document.getElementById('receiptTotal').textContent = '₦' + receiptTotalAfter.toLocaleString();
      }
      
      closeReceiptBtn.addEventListener('click', function() {
        receiptModal.classList.remove('active');
        cartItems = [];
        selectedCustomer = { id: null, name: 'Walk-in Customer' };
        document.getElementById('customerName').textContent = 'Walk-in Customer';
        updateCartUI();
      });
      
      receiptModal.addEventListener('click', function(e) {
        if (e.target === receiptModal) {
          receiptModal.classList.remove('active');
          cartItems = [];
          selectedCustomer = { id: null, name: 'Walk-in Customer' };
          document.getElementById('customerName').textContent = 'Walk-in Customer';
          updateCartUI();
        }
      });
      
      printReceiptBtn.addEventListener('click', function() {
        window.print();
      });
      
      // Open modal when item card is clicked
      itemCards.forEach(function(card) {
        card.addEventListener('click', function() {
          currentItem = {
            name: this.dataset.name,
            price: parseFloat(this.dataset.price),
            stock: parseInt(this.dataset.stock),
            img: this.dataset.img
          };
          
          document.getElementById('modalTitle').textContent = currentItem.name;
          document.getElementById('modalItemName').textContent = currentItem.name;
          document.getElementById('modalItemPrice').textContent = '₦' + currentItem.price.toLocaleString();
          document.getElementById('modalItemStock').textContent = 'Available: ' + currentItem.stock + ' units';
          document.getElementById('modalItemImg').src = currentItem.img;
          
          itemQuantity.value = 1;
          itemQuantity.max = currentItem.stock;
          itemNote.value = '';
          
          modal.classList.add('active');
        });
      });
      
      // Close modal
      closeModal.addEventListener('click', function() {
        modal.classList.remove('active');
      });
      
      modal.addEventListener('click', function(e) {
        if (e.target === modal) {
          modal.classList.remove('active');
        }
      });
      
      // Quantity controls
      decreaseQty.addEventListener('click', function() {
        let qty = parseInt(itemQuantity.value);
        if (qty > 1) {
          itemQuantity.value = qty - 1;
        }
      });
      
      increaseQty.addEventListener('click', function() {
        let qty = parseInt(itemQuantity.value);
        let max = parseInt(itemQuantity.max);
        if (qty < max) {
          itemQuantity.value = qty + 1;
        }
      });
      
      // Add to cart
      addToCartBtn.addEventListener('click', function() {
        if (!currentItem) return;
        
        const quantity = parseInt(itemQuantity.value);
        const note = itemNote.value.trim();
        
        const existingIndex = cartItems.findIndex(item => item.name === currentItem.name);
        
        if (existingIndex >= 0) {
          cartItems[existingIndex].quantity += quantity;
          if (note) {
            cartItems[existingIndex].note = note;
          }
        } else {
          cartItems.push({
            name: currentItem.name,
            price: currentItem.price,
            quantity: quantity,
            note: note,
            img: currentItem.img
          });
        }
        
        updateCartUI();
        modal.classList.remove('active');
      });
      
      // Search functionality
      searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        clearSearch.style.display = searchTerm ? 'block' : 'none';
        filterItems();
      });
      
      clearSearch.addEventListener('click', function() {
        searchInput.value = '';
        this.style.display = 'none';
        filterItems();
      });
      
      categoryFilter.addEventListener('change', filterItems);
      
      function filterItems() {
        const searchTerm = searchInput.value.toLowerCase();
        const selectedCategory = categoryFilter.value.toLowerCase();
        let visibleCount = 0;
        
        itemCards.forEach(function(card) {
          const itemName = card.dataset.name.toLowerCase();
          const matchesSearch = itemName.includes(searchTerm);
          const matchesCategory = selectedCategory === '' || itemName.includes(selectedCategory);
          
          if (matchesSearch && matchesCategory) {
            card.style.display = 'block';
            visibleCount++;
          } else {
            card.style.display = 'none';
          }
        });
        
        itemCount.textContent = visibleCount + ' Item' + (visibleCount !== 1 ? 's' : '');
      }
      // Initialize visible items & count on page load
      filterItems();
      
      // Update cart UI
      function updateCartUI() {
        cartItemsContainer.innerHTML = '';
        
        if (cartItems.length === 0) {
          cartItemsContainer.innerHTML = `
            <div class="cart-empty">
              <i class="bi bi-cart-x cart-empty-icon"></i>
              <p>Your cart is empty</p>
              <small>Add items to get started</small>
            </div>
          `;
          cartSubtotalElement.textContent = '₦0.00';
          cartDiscountAmountEl.textContent = '-₦0.00';
          cartTotalElement.textContent = '₦0.00';
          appliedDiscount = null;
          cartDiscountInfo.style.display = 'none';
          cartDiscountInfo.textContent = '';
          if (cartDiscountRow) cartDiscountRow.style.display = 'none';
          if (typeof removeDiscountBtn !== 'undefined' && removeDiscountBtn) removeDiscountBtn.style.display = 'none';
          return;
        }
        
        let subtotal = 0;
        cartItems.forEach(function(item, index) {
          const itemTotal = item.price * item.quantity;
          subtotal += itemTotal;
          
          const cartItemHTML = `
            <div class="cart-item">
              <div class="cart-item-info">
                <div class="cart-item-name">${item.name}</div>
                <div class="cart-item-details">Qty: ${item.quantity} × ₦${item.price.toLocaleString()}</div>
                ${item.note ? '<div class="cart-item-details">Note: ' + item.note + '</div>' : ''}
              </div>
              <div class="cart-item-price">₦${itemTotal.toLocaleString()}</div>
              <button class="cart-item-remove" data-index="${index}">×</button>
            </div>
          `;
          cartItemsContainer.insertAdjacentHTML('beforeend', cartItemHTML);
        });

        // Calculate discount if applied
        let discountAmount = 0;
        if (appliedDiscount) {
          if (appliedDiscount.type === 'percent') {
            discountAmount = subtotal * (appliedDiscount.value / 100);
          } else {
            discountAmount = appliedDiscount.value;
          }
        }

        // Ensure discount does not exceed subtotal
        discountAmount = Math.min(discountAmount, subtotal);

        const totalAfter = Math.max(0, subtotal - discountAmount);

        // Update UI: show subtotal, discount amount and total
        cartSubtotalElement.textContent = '₦' + subtotal.toLocaleString();
        cartTotalElement.textContent = '₦' + totalAfter.toLocaleString();
        if (appliedDiscount && discountAmount > 0) {
          cartDiscountInfo.style.display = 'block';
          const formatted = '₦' + Math.round(discountAmount).toLocaleString();
          cartDiscountInfo.textContent = `Discount (${appliedDiscount.label}): -${formatted}`;
          if (cartDiscountRow) {
            cartDiscountRow.style.display = 'flex';
            cartDiscountAmountEl.textContent = '-' + formatted;
          }
          if (typeof removeDiscountBtn !== 'undefined' && removeDiscountBtn) removeDiscountBtn.style.display = 'inline-block';
        } else {
          cartDiscountInfo.style.display = 'none';
          cartDiscountInfo.textContent = '';
          if (cartDiscountRow) cartDiscountRow.style.display = 'none';
          if (typeof removeDiscountBtn !== 'undefined' && removeDiscountBtn) removeDiscountBtn.style.display = 'none';
        }

        document.querySelectorAll('.cart-item-remove').forEach(function(btn) {
          btn.addEventListener('click', function() {
            const index = parseInt(this.dataset.index);
            cartItems.splice(index, 1);
            updateCartUI();
          });
        });
      }
    });
    </script>

  </body>
</html>
