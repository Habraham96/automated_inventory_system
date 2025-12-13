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
    <title>Add Variant Item - SalesPilot</title>
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

      /* Ensure Select2 dropdowns appear above everything */
      .select2-container {
        z-index: 10050 !important;
      }

      .select2-dropdown {
        z-index: 10051 !important;
      }

      /* Ensure modal body scrolls but doesn't clip dropdowns */
      .modal-body-custom {
        overflow-y: auto;
        overflow-x: hidden;
        flex: 1;
        min-height: 0;
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
        background: linear-gradient(135deg, #a8c8ec 0%, #b8d4f0 100%);
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
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 6px;
        border: 2px solid transparent;
        background-clip: content-box;
      }

      .modal-body-custom::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #5a67d8, #6b46c1);
        background-clip: content-box;
      }

      /* Smart intro text */
      .intro-text {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        border-left: 4px solid #667eea;
        padding: 20px 25px;
        border-radius: 10px;
        margin-bottom: 30px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
      }

      .intro-text p {
        margin: 0;
        color: #495057;
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
        border-color: #667eea;
        box-shadow: 0 2px 10px rgba(102, 126, 234, 0.1);
      }

      .form-control:focus, .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        outline: none;
        transform: translateY(-1px);
      }

      .input-group-text {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        border: 2px solid #667eea;
        font-weight: 600;
        border-radius: 8px 0 0 8px;
      }

      .input-group .form-control {
        border-left: none;
        border-radius: 0 8px 8px 0;
      }

      .input-group .form-control:focus {
        border-left: 2px solid #667eea;
      }

      /* Custom Unit Container - Enhanced styling */
      .unit-input-container {
        position: relative;
      }

      #customUnitContainer {
        animation: slideDown 0.3s ease-out;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 15px;
        background: #f8f9fa;
      }

      @keyframes slideDown {
        from {
          opacity: 0;
          max-height: 0;
          padding: 0 15px;
        }
        to {
          opacity: 1;
          max-height: 200px;
          padding: 15px;
        }
      }

      #customUnitContainer .input-group .form-control {
        border-radius: 8px 0 0 8px;
      }

      #customUnitContainer .input-group .form-control:nth-child(2) {
        border-radius: 0;
        border-left: none;
        border-right: none;
      }

      #customUnitContainer .btn {
        border-radius: 0 8px 8px 0;
        white-space: nowrap;
      }

      /* Custom unit option styling */
      .form-select option[value="custom"] {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        font-weight: 600;
      }

      /* Action buttons - Enhanced */
      .action-buttons {
        position: sticky;
        bottom: 0;
        background: linear-gradient(to top, #ffffff, #f8f9fa);
        padding: 25px 40px;
        border-top: 2px solid rgba(102, 126, 234, 0.1);
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
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: 2px solid #667eea;
        color: white;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
      }

      .btn-primary:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
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

      /* Variant-specific styles */
      .variant-table {
        margin-top: 20px;
      }

      .variant-table th {
        background: linear-gradient(135deg, #a8c8ec 0%, #b8d4f0 100%);
        color: #2c3e50;
        border: none;
        font-weight: 600;
        padding: 12px 8px;
        font-size: 0.9rem;
      }

      .variant-table td {
        padding: 8px;
        vertical-align: middle;
      }

      .variant-display-text {
        font-weight: 600;
        color: #495057;
        font-size: 0.95rem;
        padding: 8px 12px;
        background: #f8f9fa;
        border-radius: 6px;
        border: 1px solid #e9ecef;
      }

      .variant-table .form-control-sm {
        border-radius: 6px;
        border: 1px solid #e9ecef;
      }

      .variant-table .btn-sm {
        padding: 4px 12px;
        font-size: 0.8rem;
      }

      .remove-variant-btn {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        border: 2px solid #dc3545;
        color: white;
      }

      .remove-variant-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(220, 53, 69, 0.3);
      }

      .edit-variant-btn {
        background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
        border: 2px solid #007bff;
        color: white;
      }

      .edit-variant-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 123, 255, 0.3);
        background: linear-gradient(135deg, #0056b3 0%, #004085 100%);
        border-color: #0056b3;
        color: white;
      }

      .settings-variant-btn {
        background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
        border: 2px solid #6c757d;
        color: white;
      }

      .settings-variant-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(108, 117, 125, 0.3);
        background: linear-gradient(135deg, #5a6268 0%, #495057 100%);
        border-color: #5a6268;
        color: white;
      }

      .settings-variant-btn.editing {
        background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%);
        border: 2px solid #28a745;
        color: white;
      }

      .settings-variant-btn.editing:hover {
        background: linear-gradient(135deg, #1e7e34 0%, #155724 100%);
        border-color: #1e7e34;
        color: white;
      }

      /* Button group styling for action column */
      .variant-table .btn-group {
        display: flex;
        gap: 5px;
      }

      .variant-table .btn-group .btn {
        margin: 0;
        border-radius: 6px;
      }

      /* Pricing group button styling */
      .pricing-group-btn {
        padding: 8px 12px !important;
        transition: all 0.3s ease;
        text-decoration: none;
        display: block;
      }

      .pricing-group-btn:hover {
        background-color: #17a2b8 !important;
        border-color: #17a2b8 !important;
        color: white !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(23, 162, 184, 0.3);
      }

      .pricing-group-btn .cost-price-display,
      .pricing-group-btn .sell-price-display {
        font-weight: 600;
        font-size: 0.85rem;
      }

      .pricing-group-btn:hover .cost-price-display,
      .pricing-group-btn:hover .sell-price-display {
        color: white !important;
      }

      .pricing-group-btn i {
        margin-right: 4px;
      }

      /* Add Variant Card Styles */
      #addVariantCard {
        border: 2px dashed #dee2e6;
        background: #f8f9fa;
        transition: all 0.3s ease;
      }

      
      #addVariantCard .btn-outline-primary {
        border-width: 2px;
        padding: 12px 30px;
        font-weight: 600;
        transition: all 0.3s ease;
      }

      #addVariantCard .btn-outline-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 123, 255, 0.2);
      }

      /* Variant Modal Specific Styles */
      #variantModalOverlay {
        z-index: 10000;
      }

      #variantModalOverlay .modal-container {
        animation: modalFlyInFromBottom 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        max-height: 95vh;
        max-width: 800px !important;
        width: 90%;
        display: flex;
        flex-direction: column;
        transform: translate(-50%, -50%);
      }

      @keyframes modalFlyInFromBottom {
        from {
          transform: translate(-50%, 100%) scale(0.8);
          opacity: 0;
        }
        60% {
          transform: translate(-50%, -45%) scale(1.05);
          opacity: 0.9;
        }
        to {
          transform: translate(-50%, -50%) scale(1);
          opacity: 1;
        }
      }

      /* Add a bounce-out animation for closing */
      #variantModalOverlay.closing .modal-container {
        animation: modalFlyOutToBottom 0.4s cubic-bezier(0.55, 0.085, 0.68, 0.53);
      }

      @keyframes modalFlyOutToBottom {
        from {
          transform: translate(-50%, -50%) scale(1);
          opacity: 1;
        }
        to {
          transform: translate(-50%, 100%) scale(0.8);
          opacity: 0;
        }
      }

      .modal-header {
        background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
        color: white;
        padding: 25px 30px;
        border-radius: 20px 20px 0 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: none;
        flex-shrink: 0;
        position: sticky;
        top: 0;
        z-index: 10;
        box-shadow: 0 2px 15px rgba(0, 123, 255, 0.2);
      }

      .modal-title {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 12px;
      }

      .modal-title i {
        font-size: 1.8rem;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
      }

      .close-btn {
        background: rgba(255, 255, 255, 0.2);
        border: none;
        color: white;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .close-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: rotate(90deg);
      }

      .modal-body {
        padding: 30px 35px;
        flex: 1;
        overflow-y: auto;
        max-height: calc(95vh - 180px);
        background: linear-gradient(to bottom, #ffffff, #fafbfc);
      }

      /* Custom scrollbar for modal body */
      .modal-body::-webkit-scrollbar {
        width: 8px;
      }

      .modal-body::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
      }

      .modal-body::-webkit-scrollbar-thumb {
        background: #007bff;
        border-radius: 10px;
        transition: background 0.3s ease;
      }

      .modal-body::-webkit-scrollbar-thumb:hover {
        background: #0056b3;
      }

      /* Firefox scrollbar */
      .modal-body {
        scrollbar-width: thin;
        scrollbar-color: #007bff #f1f1f1;
      }

      .modal-footer {
        padding: 25px 35px;
        border-top: 1px solid #dee2e6;
        display: flex;
        justify-content: flex-end;
        gap: 15px;
        background: linear-gradient(to top, #f8f9fa, #ffffff);
        border-radius: 0 0 20px 20px;
        flex-shrink: 0;
        position: sticky;
        bottom: 0;
        z-index: 10;
        box-shadow: 0 -2px 15px rgba(0, 0, 0, 0.1);
      }

      /* Form improvements for modal */
      .modal-body .form-group {
        margin-bottom: 20px;
      }

      .modal-body .form-label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 8px;
      }

      .modal-body .required-field:after {
        content: " *";
        color: #dc3545;
      }

      .modal-body .form-control {
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 10px 15px;
        transition: all 0.3s ease;
      }

      .modal-body .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
      }

      .modal-body .form-text {
        font-size: 0.875rem;
        margin-top: 5px;
        color: #6c757d;
      }

      /* Variant Set Group Styles */
      .variant-set-group {
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 20px;
        background: #f8f9fa;
        transition: all 0.3s ease;
      }

      .variant-set-title {
        font-weight: 600;
        color: #495057;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
      }

      .variant-set-content {
        animation: fadeInDown 0.3s ease-out;
      }

      @keyframes fadeInDown {
        from {
          opacity: 0;
          transform: translateY(-10px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      /* Option counter styles */
      .form-text .text-success {
        color: #28a745 !important;
      }

      .form-text .text-warning {
        color: #ffc107 !important;
      }

      .form-text .text-danger {
        color: #dc3545 !important;
      }

      /* Combination preview styles */
      #combinationPreview .alert {
        border: none;
        border-radius: 10px;
        padding: 15px;
        background: linear-gradient(135deg, #d1ecf1 0%, #bee5eb 100%);
      }

      /* Option Input Group Styles */
      .options-container {
        max-height: 300px;
        overflow-y: auto;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 10px;
        background: #fafafa;
      }

      .option-input-group {
        margin-bottom: 0;
      }

      .option-input-group .input-group {
        margin-bottom: 8px;
      }

      .option-input-group .input-group:last-child {
        margin-bottom: 0;
      }

      .option-input {
        border-radius: 6px 0 0 6px !important;
        border-right: none;
        position: relative;
      }

      .option-input:focus {
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        border-color: #007bff;
      }

      /* Add subtle hint for Enter key functionality */
      .option-input:focus::placeholder {
        color: #6c757d;
      }

      .option-input:focus + .add-option-btn::after {
        content: " (Press Enter to add)";
        position: absolute;
        top: -25px;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(0, 0, 0, 0.8);
        color: white;
        padding: 2px 8px;
        border-radius: 4px;
        font-size: 0.75rem;
        white-space: nowrap;
        z-index: 1000;
        pointer-events: none;
        opacity: 0;
        animation: fadeInHint 0.3s ease-in 1s forwards;
      }

      @keyframes fadeInHint {
        to {
          opacity: 1;
        }
      }

      .add-option-btn {
        border-radius: 0 6px 6px 0 !important;
        border-left: none;
        padding: 8px 12px;
        transition: all 0.3s ease;
      }

      .add-option-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 2px 8px rgba(40, 167, 69, 0.3);
      }

      .remove-option-btn {
        border-radius: 0 6px 6px 0 !important;
        border-left: none;
        padding: 8px 12px;
        background: #dc3545;
        border-color: #dc3545;
        color: white;
        transition: all 0.3s ease;
      }

      .remove-option-btn:hover {
        background: #c82333;
        border-color: #bd2130;
        transform: scale(1.05);
        box-shadow: 0 2px 8px rgba(220, 53, 69, 0.3);
      }

      /* Option container scrollbar */
      .options-container::-webkit-scrollbar {
        width: 6px;
      }

      .options-container::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 3px;
      }

      .options-container::-webkit-scrollbar-thumb {
        background: #007bff;
        border-radius: 3px;
      }

      .options-container::-webkit-scrollbar-thumb:hover {
        background: #0056b3;
      }

      /* Animation for new option inputs */
      .option-fade-in {
        animation: optionFadeIn 0.3s ease-out;
      }

      @keyframes optionFadeIn {
        from {
          opacity: 0;
          transform: translateY(-10px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      /* Responsive modal adjustments */
      @media (max-width: 992px) {
        #variantModalOverlay .modal-container {
          width: 95%;
          max-width: 700px;
          max-height: 95vh;
          margin: 10px;
        }
      }

      @media (max-width: 768px) {
        #variantModalOverlay .modal-container {
          width: 95%;
          max-width: 600px;
          max-height: 95vh;
          margin: 10px;
        }

        .modal-body {
          padding: 15px;
          max-height: calc(95vh - 140px);
        }

        .modal-header, .modal-footer {
          padding: 15px 20px;
        }

        .variant-set-group {
          padding: 15px;
        }
      }

      @media (max-width: 480px) {
        #variantModalOverlay .modal-container {
          width: 98%;
          max-width: none;
          max-height: 98vh;
          border-radius: 10px;
        }

        .modal-body {
          padding: 10px;
          max-height: calc(98vh - 120px);
        }

        .modal-header {
          border-radius: 10px 10px 0 0;
        }

        .modal-footer {
          border-radius: 0 0 10px 10px;
          flex-direction: column;
        }

        .modal-footer .btn {
          width: 100%;
          margin-bottom: 5px;
        }
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
          gap: 10px;
        }
        
        .action-buttons .btn {
          width: 100%;
          margin-bottom: 0;
          font-size: 1rem;
          padding: 14px 20px;
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
        
        .action-buttons {
          padding: 15px;
          flex-direction: column-reverse;
          gap: 8px;
        }
        
        .action-buttons .btn {
          width: 100%;
          padding: 16px 20px;
          font-size: 1.1rem;
          font-weight: 700;
          letter-spacing: 0.5px;
        }
        
        .action-buttons .btn i {
          margin-right: 8px;
          font-size: 1.2rem;
        }
      }

      /* Success state indicators */
      .form-group.success .form-control {
        border-color: #27ae60;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%2327ae60' d='m2.3 6.73.94-.94 2.94-2.94.94.94-3.88 3.88z'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right calc(0.375em + 0.1875rem) center;
        background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
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

      /* Toggle Switch Styling */
      .form-check-input:checked {
        background-color: #28a745;
        border-color: #28a745;
      }

      .form-check-input:not(:checked) {
        background-color: #dc3545;
        border-color: #dc3545;
      }

      .sell-status-text {
        font-weight: 600;
        font-size: 0.85rem;
        transition: color 0.3s ease;
      }

      .form-check-input:checked + .form-check-label .sell-status-text {
        color: #28a745;
      }

      .form-check-input:not(:checked) + .form-check-label .sell-status-text {
        color: #dc3545;
      }

      .form-check-input:not(:checked) + .form-check-label .sell-status-text:after {
        content: " (No)";
      }

      .form-check-input:checked + .form-check-label .sell-status-text:after {
        content: " (Yes)";
      }

      /* Master Toggle Styling */
      .master-toggle-text {
        font-weight: 600;
        font-size: 0.875rem;
        transition: color 0.3s ease;
        white-space: nowrap;
      }

      #masterSellToggle:checked + .form-check-label .master-toggle-text {
        color: #28a745;
      }

      #masterSellToggle:not(:checked) + .form-check-label .master-toggle-text {
        color: #dc3545;
      }

      #masterSellToggle:not(:checked) + .form-check-label .master-toggle-text:after {
        content: " (Off)";
      }

      #masterSellToggle:checked + .form-check-label .master-toggle-text:after {
        content: " (On)";
      }

      /* Card header styling for better spacing */
      .card-header .form-check {
        margin-bottom: 0;
      }

      .card-header .gap-3 > * {
        margin-right: 1rem;
      }

      .card-header .gap-3 > *:last-child {
        margin-right: 0;
      }

      /* Center alignment for toggle column */
      .text-center .form-check {
        margin-bottom: 0;
      }

      /* Enhanced centering for variant table toggles */
      .variant-table .text-center {
        vertical-align: middle !important;
      }

      .variant-table .form-check-input {
        margin: 0 auto;
        display: block;
      }

      .variant-table .form-check {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
      }

      .variant-table .form-check-label {
        margin-left: 0.5rem;
        margin-bottom: 0;
      }

      /* Overlay for variant settings */
      #variantSettingsOverlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.5);
        z-index: 20000;
        align-items: center;
        justify-content: center;
      }

      #variantSettingsOverlay .settings-container {
        background: #fff;
        border-radius: 20px;
        max-width: 900px;
        width: 98vw;
        min-width: 340px;
        margin: auto;
        box-shadow: 0 8px 40px rgba(0, 0, 0, 0.25);
        position: relative;
        padding: 0;
      }

      #variantSettingsOverlay .modal-header {
        padding: 15px 25px;
        background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
        color: white;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        position: relative;
        z-index: 10;
      }

      #variantSettingsOverlay .modal-header h5 {
        margin: 0;
        font-size: 1.4rem;
        font-weight: 700;
      }

      #variantSettingsOverlay .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        color: white;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
      }

      #variantSettingsOverlay .close-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: rotate(90deg);
      }

      #variantSettingsOverlay .nav-tabs {
        border-bottom: 2px solid #e9ecef;
      }

      #variantSettingsOverlay .nav-link {
        border: none;
        border-radius: 0;
        padding: 12px 15px;
        font-weight: 600;
        color: #495057;
        transition: all 0.3s ease;
      }

      #variantSettingsOverlay .nav-link.active {
        background: #007bff;
        color: white;
        border-radius: 8px 8px 0 0;
      }

      #variantSettingsOverlay .tab-content {
        border: 1px solid #e9ecef;
        border-radius: 0 0 8px 8px;
        padding: 20px;
        background: #ffffff;
      }

      #variantSettingsOverlay .form-group {
        margin-bottom: 20px;
      }

      #variantSettingsOverlay .form-label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 8px;
      }

      #variantSettingsOverlay .form-control {
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 10px 15px;
        transition: all 0.3s ease;
      }

      #variantSettingsOverlay .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
      }

      #variantSettingsOverlay .btn-primary {
        background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
        border: 2px solid #007bff;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
      }

      #variantSettingsOverlay .btn-primary:hover {
        background: linear-gradient(135deg, #0056b3 0%, #004085 100%);
        border-color: #0056b3;
        box-shadow: 0 4px 15px rgba(0, 86, 179, 0.3);
      }

      /* Responsive adjustments for settings overlay */
      @media (max-width: 576px) {
        #variantSettingsOverlay .settings-container {
          width: 95%;
          max-width: none;
          padding: 0;
        }

        #variantSettingsOverlay .modal-header {
          padding: 15px;
        }

        #variantSettingsOverlay .modal-header h5 {
          font-size: 1.2rem;
        }

        #variantSettingsOverlay .close-btn {
          width: 30px;
          height: 30px;
          font-size: 14px;
        }

        #variantSettingsOverlay .nav-link {
          padding: 10px 12px;
          font-size: 0.9rem;
        }

        #variantSettingsOverlay .tab-content {
          padding: 15px;
        }

        #variantSettingsOverlay .form-group {
          margin-bottom: 15px;
        }

        #variantSettingsOverlay .form-label {
          margin-bottom: 6px;
        }

        #variantSettingsOverlay .btn-primary {
          padding: 8px 16px;
          font-size: 0.9rem;
        }
      }
      
      /* Pricing method styling - Navigation list style */
      .pricing-methods-row {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-top: 10px;
        background: #f8f9fa;
        border-radius: 8px;
        padding: 6px;
        border: 1px solid #e9ecef;
      }

      .pricing-method-option {
        flex: 1;
        min-width: 140px;
        position: relative;
      }

      .pricing-method-option input[type="radio"] {
        position: absolute;
        opacity: 0;
        pointer-events: none;
      }

      .pricing-method-label {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        padding: 8px 12px;
        border: 1px solid transparent;
        border-radius: 6px;
        background: transparent;
        cursor: pointer;
        transition: all 0.2s ease;
        text-align: center;
        position: relative;
        font-size: 0.85rem;
        white-space: nowrap;
      }

      .pricing-method-label:hover {
        background: rgba(102, 126, 234, 0.1);
        border-color: rgba(102, 126, 234, 0.2);
      }

      .pricing-method-option input[type="radio"]:checked + .pricing-method-label {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-color: #667eea;
        box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
      }

      .pricing-method-label i {
        font-size: 1rem;
        color: #667eea;
        transition: color 0.2s ease;
        margin: 0;
      }

      .pricing-method-option input[type="radio"]:checked + .pricing-method-label i {
        color: white;
      }

      .pricing-method-label span {
        font-weight: 500;
      }
    </style>
  </head>
  <body>
    <?php include '../layouts/preloader.php'; ?>
    <!-- Modal Overlay -->
    <div class="modal-overlay"></div>
    <!-- Modal Container -->
    <div class="modal-container">
      <!-- Modal Header -->
      <div class="modal-header-custom">
        <h4>
          <i class="mdi mdi-package-variant"></i> Add New Variant Item
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
            Create a new item with multiple variants (e.g., different sizes, colors, or specifications). Define the base item details and add specific variants with their own pricing and stock levels.
          </p>
        </div>
        <form class="forms-sample" id="addVariantForm" method="POST" action="process_add_variant.php" enctype="multipart/form-data">
          
          <!-- Section 1: Base Item Details -->
          <div class="card mb-4">
            <div class="card-header">
              <h5 class="mb-0">
                <i class="mdi mdi-information-outline"></i> <strong>Base Item Details</strong>
              </h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="itemName" class="form-label required-field">Base Item Name</label>
                    <input type="text" class="form-control" id="itemName" name="item_name" placeholder="Enter base item name (e.g., T-Shirt)" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="itemCode" class="form-label">Base Item Code/SKU</label>
                    <input type="text" class="form-control" id="itemCode" name="item_code" placeholder="Auto-generated or enter custom code">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="category" class="form-label required-field">Category</label>
                    <select class="form-select" id="category" name="category" required>
                      <option value="">Select or type to create category</option>
                      <option value="electronics">Electronics</option>
                      <option value="clothing">Clothing</option>
                      <option value="food">Food & Beverages</option>
                      <option value="furniture">Furniture</option>
                      <option value="stationery">Stationery</option>
                    </select>
                    <small class="form-text text-muted">Select existing or type new category name</small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="supplier" class="form-label">Supplier</label>
                    <select class="form-select" id="supplier" name="supplier">
                      <option value="">Select or type to create supplier</option>
                      <option value="supplier1">Supplier 1</option>
                      <option value="supplier2">Supplier 2</option>
                      <option value="supplier3">Supplier 3</option>
                    </select>
                    <small class="form-text text-muted">Select existing or type new supplier name</small>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="unit" class="form-label required-field">Unit of Measurement</label>
                    <div class="unit-input-container">
                      <select class="form-select" id="unit" name="unit" required>
                        <option value="">Select Unit</option>
                        <option value="pcs">Piece (pcs)</option>
                        <option value="ct">Carton (ct)</option>
                        <option value="cm">Centimeter (cm)</option>
                        <option value="L">Litre (L)</option>
                        <option value="g">Gram (g)</option>
                        <option value="kg">Kilogram (kg)</option>
                        <option value="pi">Per item (pi)</option>
                        <option value="yd">Yard (yd)</option>
                        <option value="m">Metre (m)</option>
                        <option value="mm">Millimetre (mm)</option>
                        
                      </select>
                      <div id="customUnitContainer" class="mt-2" style="display: none;">
                        <div class="input-group">
                          <input type="text" class="form-control" id="customUnit" placeholder="Enter custom unit (e.g., tons, pieces)">
                          <input type="text" class="form-control" id="customUnitAbbr" placeholder="Abbreviation (e.g., t, pcs)">
                          <button type="button" class="btn btn-outline-primary" id="addUnitBtn">
                            <i class="mdi mdi-plus"></i> Add
                          </button>
                        </div>
                        <small class="form-text text-muted">Enter the unit name and its abbreviation</small>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="barcode" class="form-label">Barcode</label>
                    <input type="text" class="form-control" id="barcode" name="barcode" placeholder="Enter or scan barcode">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="description" class="form-label">Base Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter base item description (common for all variants)"></textarea>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="itemImage" class="form-label">Base Item Image</label>
                    <input type="file" class="form-control" id="itemImage" name="item_image" accept="image/*">
                    <small class="form-text text-muted">Supported formats: JPG, PNG, GIF (Max: 2MB)</small>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Section 2: Variant Configuration (Initially Hidden) -->
          <div class="card mb-4" id="variantSection" style="display: none;">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">
                <i class="mdi mdi-palette"></i> <strong>Variant Configuration</strong>
              </h5>
              <div class="d-flex align-items-center gap-3">
                <div class="form-check form-switch d-flex align-items-center">
                  <input class="form-check-input" type="checkbox" id="masterSellToggle" checked>
                  <label class="form-check-label ms-2" for="masterSellToggle">
                    <span class="master-toggle-text">Sell all Items</span>
                  </label>
                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="reconfigureVariants()">
                  <i class="mdi mdi-cog"></i> Reconfigure
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive variant-table">
                <table class="table table-bordered" id="variantTable">
                  <thead>
                    <tr>
                      <th style="width: 15%;">Variant</th>
                      <th class="text-center align-middle" style="width: 10%;">Sell Item</th>
                      <th style="width: 15%;">Cost Price</th>
                      <th style="width: 15%;">Sell Price</th>
                      <th style="width: 12%;">Stock</th>
                      <th style="width: 13%;">Low Stock</th>
                      <th style="width: 10%;">Action</th>
                    </tr>
                  </thead>
                  <tbody id="variantTableBody">
                    <!-- Variant rows will be generated by the modal configuration -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- Add Variant Button (Initially Visible) -->
          <div class="card mb-4" id="addVariantCard">
            <div class="card-body text-center">
              <button type="button" class="btn btn-outline-primary btn-lg" onclick="showVariantModal()">
                <i class="mdi mdi-plus-circle"></i> Add Variant
              </button>
              <p class="text-muted mt-2 mb-0">Click to configure product variants (sizes, colors, etc.)</p>
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
          <i class="mdi mdi-content-save"></i> Save Item
        </button>
      </div>
    </div>

    <!-- Variant Configuration Modal -->
    <div class="modal-overlay" id="variantModalOverlay" style="display: none;">
      <div class="modal-container">
        <div class="modal-header">
          <h4 class="modal-title">
            <i class="mdi mdi-palette"></i> Configure Product Variants
          </h4>
          <button type="button" class="close-btn" onclick="closeVariantModal()">
            <i class="mdi mdi-close"></i>
          </button>
        </div>
        <div class="modal-body">
          <form id="variantConfigForm">
            <!-- Set 1 - Primary (Required) -->
            <div class="variant-set-group mb-4" id="variantSet1">
              <h6 class="variant-set-title">
                <i class="mdi mdi-numeric-1-circle text-primary"></i> Primary Variant Set <span class="text-danger">*</span>
              </h6>
              <div class="form-group mb-3">
                <label for="variantSetName1" class="form-label required-field">Set Name</label>
                <input type="text" class="form-control" id="variantSetName1" placeholder="e.g., Size, Color, Material" required>
                <small class="form-text text-muted">This will be your primary variant type</small>
              </div>
              <div class="form-group mb-3">
                <label class="form-label required-field">Options (Max 30)</label>
                <div class="options-container" id="optionsContainer1">
                  <div class="option-input-group">
                    <div class="input-group mb-2">
                      <input type="text" class="form-control option-input" placeholder="Enter option (e.g., Small)" required onchange="updateCombinationPreview()" onkeydown="handleOptionInputKeydown(event, 1)">
                      <button type="button" class="btn btn-outline-success add-option-btn" onclick="addOptionInput(1)" title="Add another option">
                        <i class="mdi mdi-plus"></i>
                      </button>
                    </div>
                  </div>
                </div>
                <small class="form-text text-muted">
                  <span id="optionCount1">1</span>/30 options | Click + to add more options
                </small>
              </div>
            </div>

            <!-- Set 2 - Secondary (Optional) -->
            <div class="variant-set-group mb-4" id="variantSet2">
              <h6 class="variant-set-title">
                <i class="mdi mdi-numeric-2-circle text-info"></i> Secondary Variant Set
                <button type="button" class="btn btn-sm btn-outline-success ms-2" id="addSet2Btn" onclick="enableVariantSet(2)">
                  <i class="mdi mdi-plus"></i> Add
                </button>
                <button type="button" class="btn btn-sm btn-outline-danger ms-1" id="removeSet2Btn" onclick="disableVariantSet(2)" style="display: none;">
                  <i class="mdi mdi-minus"></i> Remove
                </button>
              </h6>
              <div class="variant-set-content" id="variantSet2Content" style="display: none;">
                <div class="form-group mb-3">
                  <label for="variantSetName2" class="form-label">Set Name</label>
                  <input type="text" class="form-control" id="variantSetName2" placeholder="e.g., Color, Material">
                  <small class="form-text text-muted">Optional secondary variant type</small>
                </div>
                <div class="form-group mb-3">
                  <label class="form-label">Options (Max 30)</label>
                  <div class="options-container" id="optionsContainer2">
                    <div class="option-input-group">
                      <div class="input-group mb-2">
                        <input type="text" class="form-control option-input" placeholder="Enter option (e.g., Red)" onchange="updateCombinationPreview()" onkeydown="handleOptionInputKeydown(event, 2)">
                        <button type="button" class="btn btn-outline-success add-option-btn" onclick="addOptionInput(2)" title="Add another option">
                          <i class="mdi mdi-plus"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <small class="form-text text-muted">
                    <span id="optionCount2">1</span>/30 options | Click + to add more options
                  </small>
                </div>
              </div>
            </div>

            <!-- Set 3 - Tertiary (Optional) -->
            <div class="variant-set-group mb-0" id="variantSet3">
              <h6 class="variant-set-title">
                <i class="mdi mdi-numeric-3-circle text-warning"></i> Tertiary Variant Set
                <button type="button" class="btn btn-sm btn-outline-success ms-2" id="addSet3Btn" onclick="enableVariantSet(3)">
                  <i class="mdi mdi-plus"></i> Add
                </button>
                <button type="button" class="btn btn-sm btn-outline-danger ms-1" id="removeSet3Btn" onclick="disableVariantSet(3)" style="display: none;">
                  <i class="mdi mdi-minus"></i> Remove
                </button>
              </h6>
              <div class="variant-set-content" id="variantSet3Content" style="display: none;">
                <div class="form-group mb-3">
                  <label for="variantSetName3" class="form-label">Set Name</label>
                  <input type="text" class="form-control" id="variantSetName3" placeholder="e.g., Style, Pattern">
                  <small class="form-text text-muted">Optional tertiary variant type</small>
                </div>
                <div class="form-group mb-0">
                  <label class="form-label">Options (Max 30)</label>
                  <div class="options-container" id="optionsContainer3">
                    <div class="option-input-group">
                      <div class="input-group mb-2">
                        <input type="text" class="form-control option-input" placeholder="Enter option (e.g., Classic)" onchange="updateCombinationPreview()" onkeydown="handleOptionInputKeydown(event, 3)">
                        <button type="button" class="btn btn-outline-success add-option-btn" onclick="addOptionInput(3)" title="Add another option">
                          <i class="mdi mdi-plus"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <small class="form-text text-muted">
                    <span id="optionCount3">1</span>/30 options | Click + to add more options
                  </small>
                </div>
              </div>
            </div>

            <!-- Combination Preview -->
            <div class="mt-4" id="combinationPreview" style="display: none;">
              <div class="alert alert-info">
                <i class="mdi mdi-information"></i>
                <strong>Combination Preview:</strong> 
                <span id="combinationCount">0</span> variants will be generated
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="closeVariantModal()">
            <i class="mdi mdi-close"></i> Cancel
          </button>
          <button type="button" class="btn btn-primary" onclick="configureVariants()">
            <i class="mdi mdi-check"></i> Configure Variants
          </button>
        </div>
      </div>
    </div>

    <!-- Overlay for variant settings -->
    <div id="variantSettingsOverlay" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.5); z-index:20000; align-items:center; justify-content:center;">
      <div style="background:#fff; border-radius:20px; max-width:900px; width:98vw; min-width:340px; margin:auto; box-shadow:0 8px 40px rgba(0,0,0,0.25); position:relative;">
        <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
          <h5 class="mb-0"><i class="mdi mdi-cog"></i> Edit Variant</h5>
          <button type="button" class="btn btn-light btn-sm" onclick="closeVariantSettingsOverlay()"><i class="mdi mdi-close"></i></button>
        </div>
        <ul class="nav nav-tabs px-3 pt-3" id="variantSettingsTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pricing-tab" data-bs-toggle="tab" data-bs-target="#pricingTabPane" type="button" role="tab" aria-controls="pricingTabPane" aria-selected="true">Pricing</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="stock-tab" data-bs-toggle="tab" data-bs-target="#stockTabPane" type="button" role="tab" aria-controls="stockTabPane" aria-selected="false">Stocking</button>
          </li>
        </ul>
        <div class="tab-content p-3" id="variantSettingsTabContent">
          <div class="tab-pane fade show active" id="pricingTabPane" role="tabpanel" aria-labelledby="pricing-tab">
            <form id="variantPricingForm">
              <div class="form-group mb-3">
                <label for="variantName" class="form-label">Variant Name</label>
                <input type="text" class="form-control" id="variantName" name="variant_name" required>
              </div>
              <div class="form-group mb-3">
                <label for="sku" class="form-label">SKU</label>
                <input type="text" class="form-control" id="sku" name="sku" readonly>
              </div>
              <ul class="nav nav-tabs mb-3" id="pricingMethodTabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="fixed-tab" data-bs-toggle="tab" data-bs-target="#fixedPricingPane" type="button" role="tab" aria-controls="fixedPricingPane" aria-selected="true">Fixed Pricing</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="manual-tab" data-bs-toggle="tab" data-bs-target="#manualPricingPane" type="button" role="tab" aria-controls="manualPricingPane" aria-selected="false">Manual Pricing</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="margin-tab" data-bs-toggle="tab" data-bs-target="#marginPricingPane" type="button" role="tab" aria-controls="marginPricingPane" aria-selected="false">Margin Pricing</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="range-tab" data-bs-toggle="tab" data-bs-target="#rangePricingPane" type="button" role="tab" aria-controls="rangePricingPane" aria-selected="false">Range Pricing</button>
                </li>
              </ul>
              <div class="tab-content" id="pricingMethodTabContent">
                <div class="tab-pane fade show active" id="fixedPricingPane" role="tabpanel" aria-labelledby="fixed-tab">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="costPrice" class="form-label required-field">Cost Price</label>
                        <div class="input-group">
                          <span class="input-group-text">₦</span>
                          <input type="number" class="form-control" id="costPrice" name="cost_price" placeholder="0.00" step="0.01" min="0" required>
                        </div>
                        <small class="form-text text-muted">Price you pay to supplier</small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="sellingPrice" class="form-label required-field">Fixed Selling Price</label>
                        <div class="input-group">
                          <span class="input-group-text">₦</span>
                          <input type="number" class="form-control" id="sellingPrice" name="selling_price" placeholder="0.00" step="0.01" min="0">
                        </div>
                        <small class="form-text text-muted">Price you sell to customers</small>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="profitMargin" class="form-label">Profit Margin</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="profitMargin" name="profit_margin" placeholder="0%" readonly>
                          <span class="input-group-text">%</span>
                        </div>
                        <small class="form-text text-muted">Auto-calculated</small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="potentialProfit" class="form-label">Potential Profit</label>
                        <div class="input-group">
                          <span class="input-group-text">₦</span>
                          <input type="text" class="form-control" id="potentialProfit" name="potential_profit" placeholder="0.00" readonly>
                        </div>
                        <small class="form-text text-muted">Per unit profit</small>
                      </div>
                    </div>
                    <div id="additionalPricingOptions" class="row mt-3">
                </div>
              </div>
            </div>
                <div class="tab-pane fade" id="manualPricingPane" role="tabpanel" aria-labelledby="manual-tab">
                  <div class="form-group mb-3">
                    <label for="manualCostPrice" class="form-label required-field">Cost Price</label>
                    <div class="input-group">
                      <span class="input-group-text">₦</span>
                      <input type="number" class="form-control" id="manualCostPrice" name="manual_cost_price" placeholder="0.00" step="0.01" min="0" required>
                    </div>
                    <small class="form-text text-muted">Price you pay to supplier. Selling price set at sale time.</small>
                  </div>
                </div>
                
                <div class="tab-pane fade" id="marginPricingPane" role="tabpanel" aria-labelledby="margin-tab">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="marginCostPrice" class="form-label required-field">Cost Price</label>
                        <div class="input-group">
                          <span class="input-group-text">₦</span>
                          <input type="number" class="form-control" id="marginCostPrice" name="margin_cost_price" placeholder="0.00" step="0.01" min="0" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="targetMargin" class="form-label required-field">Target Profit Margin (%)</label>
                        <div class="input-group">
                          <input type="number" class="form-control" id="targetMargin" name="target_margin" placeholder="0" step="0.01" min="0" max="1000">
                          <span class="input-group-text">%</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="calculatedPrice" class="form-label">Calculated Selling Price</label>
                        <div class="input-group">
                          <span class="input-group-text">₦</span>
                          <input type="number" class="form-control" id="calculatedPrice" name="calculated_price" placeholder="0.00" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="marginProfit" class="form-label">Potential Profit</label>
                        <div class="input-group">
                          <span class="input-group-text">₦</span>
                          <input type="text" class="form-control" id="marginProfit" name="margin_profit" placeholder="0.00" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="rangePricingPane" role="tabpanel" aria-labelledby="range-tab">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="minPrice" class="form-label required-field">Minimum Price</label>
                        <div class="input-group">
                          <span class="input-group-text">₦</span>
                          <input type="number" class="form-control" id="minPrice" name="min_price" placeholder="0.00" step="0.01" min="0">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="maxPrice" class="form-label required-field">Maximum Price</label>
                        <div class="input-group">
                          <span class="input-group-text">₦</span>
                          <input type="number" class="form-control" id="maxPrice" name="max_price" placeholder="0.00" step="0.01" min="0">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="rangePotentialProfit" class="form-label">Potential Profit Range</label>
                        <div class="input-group">
                          <span class="input-group-text">₦</span>
                          <input type="text" class="form-control" id="rangePotentialProfit" name="range_potential_profit" placeholder="0.00 to 0.00" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="pricingTiers" class="mt-3">
                    <h6 class="text-primary mb-3"><i class="mdi mdi-format-list-numbered"></i> Quantity-Based Pricing Tiers</h6>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead class="table-light">
                          <tr>
                            <th>Min Quantity</th>
                            <th>Max Quantity</th>
                            <th>Price per Unit (₦)</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody id="tierTableBody">
                          <tr>
                            <td><input type="number" class="form-control form-control-sm" placeholder="1" min="1"></td>
                            <td><input type="number" class="form-control form-control-sm" placeholder="10" min="1"></td>
                            <td><input type="number" class="form-control form-control-sm" placeholder="0.00" step="0.01" min="0"></td>
                            <td><button type="button" class="btn btn-sm btn-outline-danger" onclick="removeTier(this)">Remove</button></td>
                          </tr>
                        </tbody>
                      </table>
                      <button type="button" class="btn btn-sm btn-outline-primary" onclick="addPricingTier()">
                                               <i class="mdi mdi-plus"></i> Add Tier
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-3"><i class="mdi mdi-content-save"></i> Save Pricing</button>
          </form>
        </div>
          <div class="tab-pane fade" id="stockTabPane" role="tabpanel" aria-labelledby="stock-tab">
            <form id="variantStockForm">
              <div class="form-group mb-3">
                <label for="stockQuantity" class="form-label">Stock Quantity</label>
                <input type="number" class="form-control" id="stockQuantity" name="stock_quantity" min="0" required>
              </div>
              <div class="form-group mb-3">
                <label for="lowStockThreshold" class="form-label">Low Stock Alert (Threshold)</label>
                <input type="number" class="form-control" id="lowStockThreshold" name="low_stock_threshold" min="0">
              </div>
              <div class="form-group mb-3">
                <label for="expiryDate" class="form-label">Expiry Date (if applicable)</label>
                <input type="date" class="form-control" id="expiryDate" name="expiry_date">
              </div>
              <div class="form-group mb-3">
                <label for="location" class="form-label">Storage Location</label>
                <input type="text" class="form-control" id="location" name="location">
              </div>
              <button type="submit" class="btn btn-primary w-100"><i class="mdi mdi-content-save"></i> Save Stocking</button>
          </form>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Variant Pricing Modal -->
    <div class="modal-overlay" id="pricingModalOverlay" style="display: none;">
      <div class="modal-container" style="max-width: 1000px;">
        <div class="modal-header-custom">
          <h4 class="modal-title">
            <i class="mdi mdi-currency-usd text-success"></i>
            Set Pricing for <span id="modalVariantName">Variant</span>
          </h4>
          <button type="button" class="close-btn" onclick="closePricingModal()" title="Close">
            <i class="mdi mdi-close"></i>
          </button>
        </div>
        
        <div class="modal-body-custom">
          <form id="variantPricingForm">
            <input type="hidden" id="currentVariantIndex" value="">
            
            <!-- Pricing Methods Selection -->
            <div class="form-group">
              <label class="form-label"><strong>Choose Pricing Method:</strong></label>
              <div class="pricing-methods-row">
                <div class="pricing-method-option">
                  <input type="radio" id="fixedPricing" name="pricing_method" value="fixed" checked>
                  <label for="fixedPricing" class="pricing-method-label">
                    <i class="mdi mdi-lock"></i>
                    <span>Fixed</span>
                  </label>
                </div>
                <div class="pricing-method-option">
                  <input type="radio" id="manualPricing" name="pricing_method" value="manual">
                  <label for="manualPricing" class="pricing-method-label">
                    <i class="mdi mdi-pencil"></i>
                    <span>Manual</span>
                  </label>
                </div>
                <div class="pricing-method-option">
                  <input type="radio" id="marginPricing" name="pricing_method" value="margin">
                  <label for="marginPricing" class="pricing-method-label">
                    <i class="mdi mdi-percent"></i>
                    <span>Margin</span>
                  </label>
                </div>
                <div class="pricing-method-option">
                  <input type="radio" id="rangePricing" name="pricing_method" value="range">
                  <label for="rangePricing" class="pricing-method-label">
                    <i class="mdi mdi-chart-line"></i>
                    <span>Range</span>
                  </label>
                </div>
              </div>
              <div class="pricing-help-text mt-2">
                <strong><i class="mdi mdi-lock text-primary"></i> Fixed Pricing:</strong> Set a single, unchanging selling price for this variant.<br>
                <strong><i class="mdi mdi-pencil text-warning"></i> Manual Pricing:</strong> Only cost price is required. Selling price, taxes, and discounts will be set during individual sales transactions.<br>
                <strong><i class="mdi mdi-percent text-success"></i> Margin Pricing:</strong> Set a profit margin percentage, and selling price will be calculated automatically.<br>
                <strong><i class="mdi mdi-chart-line text-info"></i> Range Pricing:</strong> Set minimum and maximum price boundaries for flexible pricing.
              </div>
            </div>

            <!-- Basic Cost Price (Always visible) -->
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="modalCostPrice" class="form-label required-field">Cost Price</label>
                  <div class="input-group">
                    <span class="input-group-text">₦</span>
                    <input type="number" class="form-control" id="modalCostPrice" name="cost_price" placeholder="0.00" step="0.01" min="0" required>
                  </div>
                  <small class="form-text text-muted">Price you pay to supplier</small>
                </div>
              </div>
              <!-- Dynamic Pricing Fields Container -->
              <div id="modalPricingFieldsContainer" class="col-md-8">
                <!-- Fixed Pricing Fields -->
                <div id="modalFixedFields" class="pricing-fields row" style="display: flex;">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="modalSellingPrice" class="form-label required-field">Fixed Selling Price</label>
                      <div class="input-group">
                        <span class="input-group-text">₦</span>
                        <input type="number" class="form-control" id="modalSellingPrice" name="selling_price" placeholder="0.00" step="0.01" min="0">
                      </div>
                      <small class="form-text text-muted">Price you sell to customers</small>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="modalProfitMargin" class="form-label">Profit Margin</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="modalProfitMargin" name="profit_margin" placeholder="0%" readonly>
                        <span class="input-group-text">%</span>
                      </div>
                      <small class="form-text text-muted">Auto-calculated</small>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="modalPotentialProfit" class="form-label">Potential Profit</label>
                      <div class="input-group">
                        <span class="input-group-text">₦</span>
                        <input type="text" class="form-control" id="modalPotentialProfit" name="potential_profit" placeholder="0.00" readonly>
                      </div>
                      <small class="form-text text-muted">Per unit profit</small>
                    </div>
                  </div>
                </div>

                <!-- Manual Pricing Fields -->
                <div id="modalManualFields" class="pricing-fields row" style="display: none;">
                  <div class="col-md-12">
                    <div class="alert alert-info">
                      <i class="mdi mdi-information"></i> 
                    </div>
                  </div>
                </div>

                <!-- Margin Pricing Fields -->
                <div id="modalMarginFields" class="pricing-fields row" style="display: none;">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="modalTargetMargin" class="form-label required-field">Target Profit Margin (%)</label>
                      <div class="input-group">
                        <input type="number" class="form-control" id="modalTargetMargin" name="target_margin" placeholder="0" step="0.01" min="0" max="1000">
                        <span class="input-group-text">%</span>
                      </div>
                      <small class="form-text text-muted">Desired profit margin percentage</small>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="modalCalculatedPrice" class="form-label">Calculated Selling Price</label>
                      <div class="input-group">
                        <span class="input-group-text">₦</span>
                        <input type="number" class="form-control" id="modalCalculatedPrice" name="calculated_price" placeholder="0.00" readonly>
                      </div>
                      <small class="form-text text-muted">Auto-calculated based on margin</small>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="modalMarginProfit" class="form-label">Potential Profit</label>
                      <div class="input-group">
                        <span class="input-group-text">₦</span>
                        <input type="text" class="form-control" id="modalMarginProfit" name="margin_profit" placeholder="0.00" readonly>
                      </div>
                      <small class="form-text text-muted">Per unit profit</small>
                    </div>
                  </div>
                </div>

                <!-- Range Pricing Fields -->
                <div id="modalRangeFields" class="pricing-fields row" style="display: none;">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="modalMinPrice" class="form-label required-field">Minimum Price</label>
                      <div class="input-group">
                        <span class="input-group-text">₦</span>
                        <input type="number" class="form-control" id="modalMinPrice" name="min_price" placeholder="0.00" step="0.01" min="0">
                      </div>
                      <small class="form-text text-muted">Lowest selling price</small>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="modalMaxPrice" class="form-label required-field">Maximum Price</label>
                      <div class="input-group">
                        <span class="input-group-text">₦</span>
                        <input type="number" class="form-control" id="modalMaxPrice" name="max_price" placeholder="0.00" step="0.01" min="0">
                      </div>
                      <small class="form-text text-muted">Highest selling price</small>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="modalRangePotentialProfit" class="form-label">Potential Profit Range</label>
                      <div class="input-group">
                        <span class="input-group-text">₦</span>
                        <input type="text" class="form-control" id="modalRangePotentialProfit" name="range_potential_profit" placeholder="0.00 to 0.00" readonly>
                      </div>
                      <small class="form-text text-muted">Profit range per unit</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="closePricingModal()">
            <i class="mdi mdi-close"></i> Cancel
          </button>
          <button type="button" class="btn btn-primary" onclick="savePricing()">
            <i class="mdi mdi-content-save"></i> Save Pricing
          </button>
        </div>
      </div>
    </div>

    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/typeahead.js"></script>
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
      // Ensure DOM is ready before defining functions
      window.addEventListener('DOMContentLoaded', function() {
        console.log('DOM loaded, pricing modal functions available');
        
        // Test if modal exists
        const modal = document.getElementById('pricingModalOverlay');
        console.log('Pricing modal found:', modal !== null);
      });
      
      // Variant Modal Functions
      function showVariantModal() {
        const modalOverlay = document.getElementById('variantModalOverlay');
        modalOverlay.classList.remove('closing');
        modalOverlay.style.display = 'block';
        document.body.style.overflow = 'hidden';
        
        // Add a slight delay to ensure smooth animation
        setTimeout(() => {
          modalOverlay.style.opacity = '1';
        }, 10);
      }

      function closeVariantModal() {
        const modalOverlay = document.getElementById('variantModalOverlay');
        modalOverlay.classList.add('closing');
        
        // Wait for animation to complete before hiding
        setTimeout(() => {
          modalOverlay.style.display = 'none';
          modalOverlay.classList.remove('closing');
          document.body.style.overflow = 'auto';
          
          // Reset modal form
          document.getElementById('variantConfigForm').reset();
          // Reset variant sets to initial state
          disableVariantSet(2);
          disableVariantSet(3);
          // Reset all option containers to single input
          for (let i = 1; i <= 3; i++) {
            resetOptionsContainer(i);
            updateOptionCounter(i);
          }
          // Hide combination preview
          document.getElementById('combinationPreview').style.display = 'none';
        }, 400);
      }

      // Handle Enter key press in option inputs
      function handleOptionInputKeydown(event, setNumber) {
        if (event.key === 'Enter') {
          event.preventDefault(); // Prevent form submission
          
          const currentInput = event.target;
          const currentValue = currentInput.value.trim();
          
          // Only add new input if current input has a value
          if (currentValue !== '') {
            // Check if this is the last input in the container
            const container = document.getElementById(`optionsContainer${setNumber}`);
            const allInputs = container.querySelectorAll('.option-input');
            const currentIndex = Array.from(allInputs).indexOf(currentInput);
            
            // If this is the last input, add a new one
            if (currentIndex === allInputs.length - 1) {
              // Add visual feedback for Enter key usage
              currentInput.style.borderColor = '#28a745';
              setTimeout(() => {
                currentInput.style.borderColor = '';
              }, 800);
              
              addOptionInput(setNumber);
              showNotification('Option added! Press Enter in the new field to add another', 'success');
            } else {
              // If not the last input, focus on the next one
              const nextInput = allInputs[currentIndex + 1];
              if (nextInput) {
                nextInput.focus();
                nextInput.select(); // Select all text for easy editing
              }
            }
          } else {
            // If current input is empty, show a subtle reminder
            currentInput.style.borderColor = '#ffc107';
            currentInput.style.backgroundColor = '#fff3cd';
            setTimeout(() => {
              currentInput.style.borderColor = '';
              currentInput.style.backgroundColor = '';
            }, 1500);
            showNotification('Please enter an option value before adding a new one', 'warning');
          }
        }
        
        // Handle Tab key for better navigation
        if (event.key === 'Tab' && !event.shiftKey) {
          const container = document.getElementById(`optionsContainer${setNumber}`);
          const allInputs = container.querySelectorAll('.option-input');
          const currentIndex = Array.from(allInputs).indexOf(event.target);
          
          // If this is the last input and has content, add a new input before tabbing
          if (currentIndex === allInputs.length - 1 && event.target.value.trim() !== '') {
            event.preventDefault();
            addOptionInput(setNumber);
          }
        }
      }

      function enableVariantSet(setNumber) {
        const content = document.getElementById(`variantSet${setNumber}Content`);
        const addBtn = document.getElementById(`addSet${setNumber}Btn`);
        const removeBtn = document.getElementById(`removeSet${setNumber}Btn`);
        
        content.style.display = 'block';
        addBtn.style.display = 'none';
        removeBtn.style.display = 'inline-block';
        
        showNotification(`Variant Set ${setNumber} enabled`, 'success');
        updateCombinationPreview();
      }

      function disableVariantSet(setNumber) {
        const content = document.getElementById(`variantSet${setNumber}Content`);
        const addBtn = document.getElementById(`addSet${setNumber}Btn`);
        const removeBtn = document.getElementById(`removeSet${setNumber}Btn`);
        const nameInput = document.getElementById(`variantSetName${setNumber}`);
        const optionsContainer = document.getElementById(`optionsContainer${setNumber}`);
        
        content.style.display = 'none';
        addBtn.style.display = 'inline-block';
        removeBtn.style.display = 'none';
        
        // Clear inputs
        nameInput.value = '';
        
        // Reset options to single input
        resetOptionsContainer(setNumber);
        
        updateOptionCounter(setNumber);
        updateCombinationPreview();
      }

      function addOptionInput(setNumber) {
        const container = document.getElementById(`optionsContainer${setNumber}`);
        const currentCount = container.querySelectorAll('.option-input').length;
        
        if (currentCount >= 30) {
          showNotification('Maximum 30 options allowed per set', 'warning');
          return;
        }
        
        const newInputGroup = document.createElement('div');
        newInputGroup.className = 'input-group mb-2 option-fade-in';
        
        newInputGroup.innerHTML = `
          <input type="text" class="form-control option-input" placeholder="Enter option" onchange="updateCombinationPreview()" onkeydown="handleOptionInputKeydown(event, ${setNumber})">
          <button type="button" class="btn btn-outline-danger remove-option-btn" onclick="removeOptionInput(this)" title="Remove this option">
            <i class="mdi mdi-minus"></i>
          </button>
        `;
        
        container.appendChild(newInputGroup);
        
        // Focus on the new input
        const newInput = newInputGroup.querySelector('.option-input');
        newInput.focus();
        
        updateOptionCounter(setNumber);
        updateCombinationPreview();
        
        showNotification('New option field added', 'success');
      }

      function removeOptionInput(button) {
        const inputGroup = button.closest('.input-group');
        const container = inputGroup.closest('.options-container');
        const setNumber = container.id.replace('optionsContainer', '');
        
        // Don't allow removing if it's the last input
        const remainingInputs = container.querySelectorAll('.option-input').length;
        if (remainingInputs <= 1) {
          showNotification('At least one option field is required', 'warning');
          return;
        }
        
        inputGroup.remove();
        updateOptionCounter(setNumber);
        updateCombinationPreview();
        
        showNotification('Option field removed', 'info');
      }

      function resetOptionsContainer(setNumber) {
        const container = document.getElementById(`optionsContainer${setNumber}`);
        container.innerHTML = `
          <div class="option-input-group">
            <div class="input-group mb-2">
              <input type="text" class="form-control option-input" placeholder="Enter option" onchange="updateCombinationPreview()" onkeydown="handleOptionInputKeydown(event, ${setNumber})">
              <button type="button" class="btn btn-outline-success add-option-btn" onclick="addOptionInput(${setNumber})" title="Add another option">
                <i class="mdi mdi-plus"></i>
              </button>
            </div>
          </div>
        `;
      }

      function updateOptionCounter(setNumber) {
        const container = document.getElementById(`optionsContainer${setNumber}`);
        const counter = document.getElementById(`optionCount${setNumber}`);
        
        if (!container || !counter) return;
        
        const optionInputs = container.querySelectorAll('.option-input');
        const filledOptions = Array.from(optionInputs).filter(input => input.value.trim() !== '');
        const totalInputs = optionInputs.length;
        
        counter.textContent = totalInputs;
        
        // Update counter color based on count
        counter.className = '';
        if (totalInputs === 0) {
          counter.classList.add('text-muted');
        } else if (totalInputs <= 20) {
          counter.classList.add('text-success');
        } else if (totalInputs <= 25) {
          counter.classList.add('text-warning');
        } else if (totalInputs <= 30) {
          counter.classList.add('text-danger');
        } else {
          counter.classList.add('text-danger');
          counter.textContent = '30+';
        }
        
        // Show add button only if under 30 options
        const addButtons = container.querySelectorAll('.add-option-btn');
        addButtons.forEach(btn => {
          btn.style.display = totalInputs >= 30 ? 'none' : 'block';
        });
      }

      function updateCombinationPreview() {
        const options1 = getValidOptions(1);
        const options2 = getValidOptions(2);
        const options3 = getValidOptions(3);
        
        let totalCombinations = options1.length;
        if (options2.length > 0) totalCombinations *= options2.length;
        if (options3.length > 0) totalCombinations *= options3.length;
        
        const preview = document.getElementById('combinationPreview');
        const countSpan = document.getElementById('combinationCount');
        
        if (totalCombinations > 0) {
          countSpan.textContent = totalCombinations;
          preview.style.display = 'block';
          
          // Warn if too many combinations
          const alert = preview.querySelector('.alert');
          if (totalCombinations > 100) {
            alert.className = 'alert alert-warning';
            alert.innerHTML = `<i class="mdi mdi-alert"></i> <strong>Warning:</strong> ${totalCombinations} variants will be generated. This might be too many to manage effectively.`;
          } else if (totalCombinations > 50) {
            alert.className = 'alert alert-info';
            alert.innerHTML = `<i class="mdi mdi-information"></i> <strong>Notice:</strong> ${totalCombinations} variants will be generated.`;
          } else {
            alert.className = 'alert alert-success';
            alert.innerHTML = `<i class="mdi mdi-check"></i> <strong>Perfect:</strong> ${totalCombinations} variants will be generated.`;
          }
        } else {
          preview.style.display = 'none';
        }
      }

      function getValidOptions(setNumber) {
        const container = document.getElementById(`optionsContainer${setNumber}`);
        if (!container) return [];
        
        const optionInputs = container.querySelectorAll('.option-input');
        const options = Array.from(optionInputs)
          .map(input => input.value.trim())
          .filter(value => value !== '');
        
        return options.slice(0, 30); // Limit to 30 options
      }

      function reconfigureVariants() {
        // Hide variant section and show add variant button
        document.getElementById('variantSection').style.display = 'none';
        document.getElementById('addVariantCard').style.display = 'block';
        // Clear existing variants
        document.getElementById('variantTableBody').innerHTML = '';
        variantCounter = 0;
        showNotification('Variant configuration cleared. You can set up new variants.', 'info');
      }

      function configureVariants() {
        // Get all variant sets
        const setName1 = document.getElementById('variantSetName1').value.trim();
        const setName2 = document.getElementById('variantSetName2').value.trim();
        const setName3 = document.getElementById('variantSetName3').value.trim();

        // Get options from input fields
        const optionsArray1 = getValidOptions(1);
        const optionsArray2 = getValidOptions(2);
        const optionsArray3 = getValidOptions(3);

        // Validate required fields
        if (!setName1 || optionsArray1.length === 0) {
          showNotification('Please fill in the required fields (Primary Set Name and at least one option)', 'error');
          return;
        }

        // Validate option counts
        if (optionsArray1.length > 30) {
          showNotification('Primary set cannot have more than 30 options', 'error');
          return;
        }

        // Validate secondary set if provided
        if (setName2 && optionsArray2.length === 0) {
          showNotification('Please provide at least one option for the secondary variant set', 'error');
          return;
        }

        if (optionsArray2.length > 30) {
          showNotification('Secondary set cannot have more than 30 options', 'error');
          return;
        }

        // Validate tertiary set if provided
        if (setName3 && optionsArray3.length === 0) {
          showNotification('Please provide at least one option for the tertiary variant set', 'error');
          return;
        }

        if (optionsArray3.length > 30) {
          showNotification('Tertiary set cannot have more than 30 options', 'error');
          return;
        }

        // Check for duplicate options within each set
        const duplicates1 = findDuplicates(optionsArray1);
        const duplicates2 = findDuplicates(optionsArray2);
        const duplicates3 = findDuplicates(optionsArray3);

        if (duplicates1.length > 0) {
          showNotification(`Primary set has duplicate options: ${duplicates1.join(', ')}`, 'error');
          return;
        }

        if (duplicates2.length > 0) {
          showNotification(`Secondary set has duplicate options: ${duplicates2.join(', ')}`, 'error');
          return;
        }

        if (duplicates3.length > 0) {
          showNotification(`Tertiary set has duplicate options: ${duplicates3.join(', ')}`, 'error');
          return;
        }

        // Calculate total combinations
        let totalCombinations = optionsArray1.length;
        if (optionsArray2.length > 0) totalCombinations *= optionsArray2.length;
        if (optionsArray3.length > 0) totalCombinations *= optionsArray3.length;

        // Warn about too many combinations
        if (totalCombinations > 200) {
          if (!confirm(`This will generate ${totalCombinations} variants. This might be difficult to manage. Do you want to continue?`)) {
            return;
          }
        }

        // Show the variant section and hide the add button
        document.getElementById('variantSection').style.display = 'block';
        document.getElementById('addVariantCard').style.display = 'none';

        // Generate variant combinations
        generateVariantCombinations(optionsArray1, optionsArray2, optionsArray3, setName1, setName2, setName3);

        // Close modal
        closeVariantModal();
        
        showNotification(`Variant configuration applied! Generated ${totalCombinations} variant combinations.`, 'success');
      }

      function findDuplicates(array) {
        const seen = new Set();
        const duplicates = new Set();
        
        array.forEach(item => {
          const lowerItem = item.toLowerCase();
          if (seen.has(lowerItem)) {
            duplicates.add(item);
          } else {
            seen.add(lowerItem);
          }
        });
        
        return Array.from(duplicates);
      }

      function generateVariantCombinations(optionsArray1, optionsArray2, optionsArray3, setName1, setName2, setName3) {
        const tableBody = document.getElementById('variantTableBody');
        tableBody.innerHTML = ''; // Clear existing rows
        
        const baseName = document.getElementById('itemName').value || 'Item';
        const baseCode = document.getElementById('itemCode').value || 'ITM';
        
        // Ensure we have arrays to work with
        const options1 = optionsArray1 || [];
        const options2 = optionsArray2.length > 0 ? optionsArray2 : [''];
        const options3 = optionsArray3.length > 0 ? optionsArray3 : [''];

        let variantCounter = 0;
        let totalCombinations = 0;

        // Generate all combinations of the three sets
        options1.forEach(option1 => {
          options2.forEach(option2 => {
            options3.forEach(option3 => {
              // Skip if we have empty secondary/tertiary options when there are actual options
              if ((option2 === '' && options2.length > 1) || (option3 === '' && options3.length > 1)) {
                return;
              }
              
              variantCounter++;
              totalCombinations++;
              
              // Build variant display (only variations, separated by /)
              let variantDisplay = option1;
              if (option2) variantDisplay += ` / ${option2}`;
              if (option3) variantDisplay += ` / ${option3}`;
              
              // Build full variant name for backend (includes base name)
              let variantName = `${baseName} - ${option1}`;
              if (option2) variantName += ` ${option2}`;
              if (option3) variantName += ` ${option3}`;
              
              // Build SKU
              let variantSku = baseCode;
              if (option1) variantSku += `-${option1.substring(0,2).toUpperCase()}`;
              if (option2) variantSku += `${option2.substring(0,2).toUpperCase()}`;
              if (option3) variantSku += `${option3.substring(0,2).toUpperCase()}`;
              
              const newRow = document.createElement('tr');
              newRow.innerHTML = `
                <td>
                  <input type="text" class="form-control form-control-sm" 
                         name="variants[${variantCounter}][name]" 
                         value="${variantName}" 
                         readonly
                         required
                         style="display: none;">
                  <div class="variant-display-text">${variantDisplay}</div>
                  <input type="hidden" name="variants[${variantCounter}][sku]" value="${variantSku}">
                  <input type="hidden" name="variants[${variantCounter}][primary_value]" value="${option1}">
                  <input type="hidden" name="variants[${variantCounter}][secondary_value]" value="${option2}${option3 ? (option2 ? ' / ' + option3 : option3) : ''}">
                  ${option3 ? `<input type="hidden" name="variants[${variantCounter}][tertiary_value]" value="${option3}">` : ''}
                </td>
                <td class="text-center align-middle">
                  <div class="d-flex flex-column justify-content-center align-items-center">
                    <div class="form-check form-switch mb-1">
                      <input class="form-check-input variant-sell-toggle" type="checkbox" id="sellToggle${variantCounter}" 
                             name="variants[${variantCounter}][is_sellable]" value="1" checked>
                      <label class="form-check-label" for="sellToggle${variantCounter}">
                        <span class="sell-status-text">Sell</span>
                      </label>
                    </div>
                    <small class="text-muted">${variantSku}</small>
                  </div>
                </td>
                <td colspan="2">
                  <button type="button" onclick="openEditVariantModal(${variantCounter}, '${variantSku}')" class="btn btn-outline-info btn-sm w-100 pricing-group-btn" title="Click to edit pricing">
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="text-start">
                        <i class="mdi mdi-currency-usd"></i>
                        <span class="cost-price-display" id="costDisplay${variantCounter}">₦0.00</span>
                      </div>
                      <div class="text-end">
                        <i class="mdi mdi-tag"></i>
                        <span class="sell-price-display" id="sellDisplay${variantCounter}">₦0.00</span>
                      </div>
                    </div>
                  </button>
                  <input type="hidden" name="variants[${variantCounter}][cost_price]" id="costPrice${variantCounter}" value="0.00" required>
                  <input type="hidden" name="variants[${variantCounter}][selling_price]" id="sellPrice${variantCounter}" value="0.00" required>
                  <input type="hidden" name="variants[${variantCounter}][pricing_method]" id="pricingMethod${variantCounter}" value="fixed">
                </td>
                <td>
                  <input type="number" class="form-control form-control-sm" 
                         name="variants[${variantCounter}][stock_quantity]" 
                         id="stockQty${variantCounter}"
                         value="0" 
                         min="0" 
                         step="1"
                         placeholder="0"
                         title="Stock quantity">
                </td>
                <td>
                  <input type="number" class="form-control form-control-sm" 
                         name="variants[${variantCounter}][low_stock_threshold]" 
                         id="lowStock${variantCounter}"
                         value="0" 
                         min="0" 
                         step="1"
                         placeholder="0"
                         title="Low stock alert threshold">
                </td>
                <td class="text-center">
                  <div class="btn-group" role="group">
                    <button type="button" class="btn btn-sm remove-variant-btn" 
                            onclick="removeVariantRow(this)" title="Remove this variant">
                      <i class="mdi mdi-delete"></i>
                    </button>
                  </div>
                </td>
              `;
              tableBody.appendChild(newRow);
              
              // Add event listener for the sell toggle
              const sellToggle = newRow.querySelector(`#sellToggle${variantCounter}`);
              const sellingPriceInput = newRow.querySelector('input[name*="[selling_price]"]');
              
              sellToggle.addEventListener('change', function() {
                updateSellToggleState(this, sellingPriceInput);
              });
              
              // Initialize the toggle state
              updateSellToggleState(sellToggle, sellingPriceInput);
            });
          });
               });

        // Update global variant counter
        window.variantCounter = variantCounter;
        
        // Add master toggle functionality after generating all variants
        setupMasterToggle();
        
        return totalCombinations;
      }

      // Setup master toggle functionality
      function setupMasterToggle() {
        const masterToggle = document.getElementById('masterSellToggle');
        const variantToggles = document.querySelectorAll('.variant-sell-toggle');
        
        if (!masterToggle) return;
        
        // Master toggle controls all variant toggles
        masterToggle.addEventListener('change', function() {
          const isChecked = this.checked;
          
          variantToggles.forEach(toggle => {
            if (toggle.checked !== isChecked) {
              toggle.checked = isChecked;
              const sellingPriceInput = toggle.closest('tr').querySelector('input[name*="[selling_price]"]');
              updateSellToggleState(toggle, sellingPriceInput);
            }
          });
          
          showNotification(
            isChecked ? 'All variants enabled for sale' : 'All variants disabled for sale', 
            'info'
          );
        });
        
        // Update master toggle based on individual toggles
        function updateMasterToggleState() {
          const allToggles = document.querySelectorAll('.variant-sell-toggle');
          const checkedToggles = document.querySelectorAll('.variant-sell-toggle:checked');
          
          // Only turn off master toggle when ALL variants are off
          if (checkedToggles.length === 0) {
            masterToggle.checked = false;
            masterToggle.indeterminate = false;
          } else {
            // Keep master toggle on if any variant is on
            masterToggle.checked = true;
            // Show indeterminate state only when some (but not all) are checked
            masterToggle.indeterminate = checkedToggles.length < allToggles.length;
          }
        }
        
        // Add event listeners to existing variant toggles
        variantToggles.forEach(toggle => {
          toggle.addEventListener('change', function() {
            const sellingPriceInput = this.closest('tr').querySelector('input[name*="[selling_price]"]');
            updateSellToggleState(this, sellingPriceInput);
            updateMasterToggleState();
          });
        });
        
        // Initial state update
        updateMasterToggleState();
      }

      // Function to update sell toggle state and related fields
      function updateSellToggleState(toggleElement, sellingPriceInput) {
        if (toggleElement.checked) {
          // Item is sellable
          sellingPriceInput.required = true;
          sellingPriceInput.disabled = false;
          sellingPriceInput.style.backgroundColor = '';
          sellingPriceInput.placeholder = '0.00';
        } else {
          // Item is not sellable
          sellingPriceInput.required = false;
          sellingPriceInput.disabled = true;
          sellingPriceInput.style.backgroundColor = '#f8f9fa';
          sellingPriceInput.value = '';
          sellingPriceInput.placeholder = 'N/A (Not for sale)';
        }
      }

      // Setup custom unit handlers
      function setupCustomUnitHandlers() {
        const unitSelect = document.getElementById('unit');
        const customUnitContainer = document.getElementById('customUnitContainer');
        const addUnitBtn = document.getElementById('addUnitBtn');
        const customUnit = document.getElementById('customUnit');
        const customUnitAbbr = document.getElementById('customUnitAbbr');

        // Show/hide custom unit container
        unitSelect.addEventListener('change', function() {
          if (this.value === 'custom') {
            customUnitContainer.style.display = 'block';
            customUnit.focus();
          } else {
            customUnitContainer.style.display = 'none';
            customUnit.value = '';
            customUnitAbbr.value = '';
          }
        });

        // Add new unit functionality
        addUnitBtn.addEventListener('click', function() {
          const unitName = customUnit.value.trim();
          const unitAbbr = customUnitAbbr.value.trim();

          if (!unitName || !unitAbbr) {
            showNotification('Please enter both unit name and abbreviation', 'error');
            return;
          }

          // Check if unit already exists
          const existingOptions = Array.from(unitSelect.options);
          const exists = existingOptions.some(option => 
            option.value.toLowerCase() === unitAbbr.toLowerCase() ||
            option.text.toLowerCase().includes(unitName.toLowerCase())
          );

          if (exists) {
            showNotification('This unit already exists in the list', 'warning');
            return;
          }

          // Create new option
          const newOption = document.createElement('option');
          newOption.value = unitAbbr;
          newOption.text = `${unitName} (${unitAbbr})`;
          
          // Insert before the "Add New Unit" option
          const customOption = unitSelect.querySelector('option[value="custom"]');
          unitSelect.insertBefore(newOption, customOption);

          // Select the new option
          unitSelect.value = unitAbbr;
          
          // Hide the container and clear inputs
          customUnitContainer.style.display = 'none';
          customUnit.value = '';
          customUnitAbbr.value = '';

          // Update Select2 if initialized
          if (typeof $ !== 'undefined' && $.fn.select2) {
            $('#unit').trigger('change.select2');
          }

          showNotification(`Unit "${unitName} (${unitAbbr})" added successfully!`, 'success');
        });

        // Allow Enter key to add unit
        customUnit.addEventListener('keypress', function(e) {
          if (e.key === 'Enter') {
            e.preventDefault();
            customUnitAbbr.focus();
          }
        });

        customUnitAbbr.addEventListener('keypress', function(e) {
          if (e.key === 'Enter') {
            e.preventDefault();
            addUnitBtn.click();
          }
        });
      }

      // Close variant modal on overlay click
      document.addEventListener('DOMContentLoaded', function() {
        // Setup custom unit handlers
        setupCustomUnitHandlers();

        const variantModalOverlay = document.getElementById('variantModalOverlay');
        if (variantModalOverlay) {
          variantModalOverlay.addEventListener('click', function(e) {
            if (e.target === variantModalOverlay) {
              closeVariantModal();
            }
          });
        }

        // Add event listeners for option counting and validation
        for (let i = 1; i <= 3; i++) {
          // Add event delegation for dynamic option inputs
          const container = document.getElementById(`optionsContainer${i}`);
          if (container) {
            container.addEventListener('input', function(e) {
              if (e.target.classList.contains('option-input')) {
                updateOptionCounter(i);
                updateCombinationPreview();
              }
            });
          }
          
          const nameInput = document.getElementById(`variantSetName${i}`);
          if (nameInput) {
            nameInput.addEventListener('input', function() {
              updateCombinationPreview();
            });
          }
        }

        // Initialize option counters
        for (let i = 1; i <= 3; i++) {
          updateOptionCounter(i);
        }
      });

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

      // Reset form
      function resetForm() {
        document.getElementById('addVariantForm').reset();
        
        // Reset variant table to initial state
        const variantTableBody = document.getElementById('variantTableBody');
        variantTableBody.innerHTML = `
          <tr>
            <td><input type="text" class="form-control variant-name" name="variant_names[]" placeholder="Enter variant name" required></td>
            <td><input type="text" class="form-control variant-sku" name="variant_skus[]" placeholder="Auto-generated" readonly></td>
            <td><input type="number" class="form-control variant-cost" name="variant_costs[]" value="0.00" step="0.01" min="0"></td>
            <td><input type="number" class="form-control variant-price" name="variant_prices[]" value="0.00" step="0.01" min="0"></td>
            <td><input type="number" class="form-control variant-stock" name="variant_stocks[]" value="0" min="0"></td>
            <td>
              <button type="button" class="btn btn-sm btn-danger" onclick="removeVariantRow(this)" title="Remove Variant">
                <i class="mdi mdi-delete"></i>
              </button>
            </td>
          </tr>
        `;
        
        showNotification('Form has been reset', 'info');
      }

      // Submit form with validation
      function submitForm() {
        const form = document.getElementById('addVariantForm');
        const submitBtn = document.querySelector('.btn-primary');
        
        // Add loading state
        submitBtn.classList.add('loading');
        submitBtn.disabled = true;
        
        setTimeout(() => {
          // Check if required fields are filled
          if (!form.checkValidity()) {
            form.reportValidity();
            removeLoading(submitBtn);
            return false;
          }
          
          // Validate that at least one variant exists
          const variantRows = document.querySelectorAll('#variantTableBody tr');
          if (variantRows.length === 0) {
            showNotification('At least one variant is required', 'error');
            removeLoading(submitBtn);
            return false;
          }
          
          // Validate that variant names are filled
          const variantNames = document.querySelectorAll('.variant-name');
          let hasValidVariant = false;
          variantNames.forEach(input => {
            if (input.value.trim() !== '') {
              hasValidVariant = true;
            }
          });
          
          if (!hasValidVariant) {
            showNotification('At least one variant must have a name', 'error');
            removeLoading(submitBtn);
            return false;
          }
          
          // If all validations pass
          showNotification('Variant item validation passed! Ready to be saved.', 'success');
          
          // Simulate save process
          setTimeout(() => {
            removeLoading(submitBtn);
            showNotification('Variant item successfully created!', 'success');
            
            // Remove beforeunload warning since item is saved
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

      // Remove variant row
      function removeVariantRow(button) {
        const row = button.closest('tr');
        const tableBody = document.getElementById('variantTableBody');
        
        if (tableBody.children.length > 1) {
          row.remove();
          showNotification('Variant row removed', 'info');
        } else {
          showNotification('At least one variant is required', 'warning');
        }
      }

      // Settings variant row
      function settingsVariantRow(button) {
        const row = button.closest('tr');
        // Example: get data from row inputs (customize as needed)
        const variantData = {
          name: row.querySelector('input[name*="[name]"]').value,
          sku: row.querySelector('input[name*="[sku]"]').value,
          cost_price: row.querySelector('input[name*="[cost_price]"]').value,
          selling_price: row.querySelector('input[name*="[selling_price]"]').value,
          stock_quantity: row.querySelector('input[name*="[stock_quantity]"]') ? row.querySelector('input[name*="[stock_quantity]"]').value : '',
          low_stock_threshold: '',
          expiry_date: '',
          location: ''
        };
        openVariantSettingsOverlay(variantData);
      }

      // Overlay functions
      function openVariantSettingsOverlay(variantData) {
        // Fill overlay form fields with variantData
        document.getElementById('variantName').value = variantData.name || '';
        document.getElementById('sku').value = variantData.sku || '';
        document.getElementById('costPrice').value = variantData.cost_price || '';
        document.getElementById('sellingPrice').value = variantData.selling_price || '';
        document.getElementById('stockQuantity').value = variantData.stock_quantity || '';
        document.getElementById('lowStockThreshold').value = variantData.low_stock_threshold || '';
        document.getElementById('expiryDate').value = variantData.expiry_date || '';
        document.getElementById('location').value = variantData.location || '';
        document.getElementById('variantSettingsOverlay').style.display = 'flex';
      }

      function closeVariantSettingsOverlay() {
        document.getElementById('variantSettingsOverlay').style.display = 'none';
      }

      // Submit pricing form
      document.getElementById('variantPricingForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form data
        const formData = new FormData(this);
        
        // TODO: Add AJAX request to save pricing data
        console.log('Pricing data:', Object.fromEntries(formData));
        
        closeVariantSettingsOverlay();
        showNotification('Pricing updated successfully', 'success');
      });

      // Submit stocking form
      document.getElementById('variantStockForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form data
        const formData = new FormData(this);
        
        // TODO: Add AJAX request to save stocking data
        console.log('Stocking data:', Object.fromEntries(formData));
        
        closeVariantSettingsOverlay();
        showNotification('Stocking information updated successfully', 'success');
      });

      // Pricing Modal Functions
      window.openPricingModal = function(variantIndex, variantName) {
        console.log('Opening pricing modal for variant:', variantIndex, variantName);
        
        // Set current variant info
        document.getElementById('currentVariantIndex').value = variantIndex;
        document.getElementById('modalVariantName').textContent = variantName;
        
        // Load existing pricing data if available
        const costInput = document.getElementById(`costPrice${variantIndex}`);
        const sellInput = document.getElementById(`sellPrice${variantIndex}`);
        const methodInput = document.getElementById(`pricingMethod${variantIndex}`);
        
        // Populate modal fields; default to 0.00 when values are empty
        if (costInput && costInput.value) {
          document.getElementById('modalCostPrice').value = costInput.value;
        } else {
          document.getElementById('modalCostPrice').value = '0.00';
        }
        if (sellInput && sellInput.value) {
          document.getElementById('modalSellingPrice').value = sellInput.value;
        } else {
          document.getElementById('modalSellingPrice').value = '0.00';
        }
        if (methodInput && methodInput.value) {
          document.querySelector(`input[name="pricing_method"][value="${methodInput.value}"]`).checked = true;
          showPricingFields(methodInput.value);
        }
        
        // Show modal
        const modalOverlay = document.getElementById('pricingModalOverlay');
        console.log('Modal element found:', modalOverlay);
        
        if (!modalOverlay) {
          alert('Pricing modal not found! Please check the HTML structure.');
          return;
        }
        
        modalOverlay.style.display = 'block';
        document.body.style.overflow = 'hidden';
        
        // Initialize pricing calculations
        setupPricingCalculations();
      }

      window.closePricingModal = function() {
        const modalOverlay = document.getElementById('pricingModalOverlay');
        modalOverlay.style.display = 'none';
        document.body.style.overflow = 'auto';
        
        // Reset form
        document.getElementById('variantPricingForm').reset();
        document.querySelector('input[name="pricing_method"][value="fixed"]').checked = true;
        showPricingFields('fixed');
      }

      window.savePricing = function() {
        const form = document.getElementById('variantPricingForm');
        const variantIndex = document.getElementById('currentVariantIndex').value;
        
        // Validate form
        if (!form.checkValidity()) {
          form.reportValidity();
          return;
        }
        
        // Get pricing method and values
        const pricingMethod = document.querySelector('input[name="pricing_method"]:checked').value;
        const costPrice = parseFloat(document.getElementById('modalCostPrice').value) || 0;
        let sellingPrice = 0;
        
        // Calculate selling price based on method
        switch (pricingMethod) {
          case 'fixed':
            sellingPrice = parseFloat(document.getElementById('modalSellingPrice').value) || 0;
            break;
          case 'manual':
            sellingPrice = 0; // Will be set during sales
            break;
          case 'margin':
            sellingPrice = parseFloat(document.getElementById('modalCalculatedPrice').value) || 0;
            break;
          case 'range':
            sellingPrice = parseFloat(document.getElementById('modalMinPrice').value) || 0; // Use min price as base
            break;
        }
        
        // Validate pricing
        if (costPrice <= 0) {
          showNotification('Cost price must be greater than 0', 'warning');
          return;
        }
        
        if (pricingMethod === 'fixed' && sellingPrice <= 0) {
          showNotification('Selling price must be greater than 0 for fixed pricing', 'warning');
          return;
        }
        
        if (pricingMethod !== 'manual' && sellingPrice <= costPrice) {
          showNotification('Selling price must be greater than cost price', 'warning');
          return;
        }
        
        // Update hidden inputs
        document.getElementById(`costPrice${variantIndex}`).value = costPrice.toFixed(2);
        document.getElementById(`sellPrice${variantIndex}`).value = sellingPrice.toFixed(2);
        document.getElementById(`pricingMethod${variantIndex}`).value = pricingMethod;
        
        // Update button displays
        document.getElementById(`costDisplay${variantIndex}`).textContent = `₦${costPrice.toFixed(2)}`;
        
        if (pricingMethod === 'manual') {
          document.getElementById(`sellDisplay${variantIndex}`).textContent = 'Manual';
        } else if (pricingMethod === 'range') {
          const maxPrice = parseFloat(document.getElementById('modalMaxPrice').value) || 0;
          document.getElementById(`sellDisplay${variantIndex}`).textContent = `₦${sellingPrice.toFixed(2)} - ₦${maxPrice.toFixed(2)}`;
        } else {
          document.getElementById(`sellDisplay${variantIndex}`).textContent = `₦${sellingPrice.toFixed(2)}`;
        }
        
        // Close modal
        closePricingModal();
        showNotification('Pricing updated successfully', 'success');
      }

      function showPricingFields(method) {
        // Hide all pricing fields
        document.querySelectorAll('.pricing-fields').forEach(field => {
          field.style.display = 'none';
        });
        
        // Show selected pricing fields
        switch (method) {
          case 'fixed':
            document.getElementById('modalFixedFields').style.display = 'flex';
            break;
          case 'manual':
            document.getElementById('modalManualFields').style.display = 'flex';
            break;
          case 'margin':
            document.getElementById('modalMarginFields').style.display = 'flex';
            break;
          case 'range':
            document.getElementById('modalRangeFields').style.display = 'flex';
            break;
        }
      }

      function setupPricingCalculations() {
        // Add event listeners for pricing method changes
        document.querySelectorAll('input[name="pricing_method"]').forEach(radio => {
          radio.addEventListener('change', function() {
            showPricingFields(this.value);
          });
        });
        
        // Fixed pricing calculations
        const modalCostPrice = document.getElementById('modalCostPrice');
        const modalSellingPrice = document.getElementById('modalSellingPrice');
        const modalProfitMargin = document.getElementById('modalProfitMargin');
        const modalPotentialProfit = document.getElementById('modalPotentialProfit');
        
        function calculateFixedProfit() {
          const cost = parseFloat(modalCostPrice.value) || 0;
          const selling = parseFloat(modalSellingPrice.value) || 0;
          
          if (cost > 0 && selling > 0) {
            const profit = selling - cost;
            const margin = (profit / cost) * 100;
            
            modalProfitMargin.value = margin.toFixed(2) + '%';
            modalPotentialProfit.value = profit.toFixed(2);
          } else {
            modalProfitMargin.value = '';
            modalPotentialProfit.value = '';
          }
        }
        
        modalCostPrice.addEventListener('input', calculateFixedProfit);
        modalSellingPrice.addEventListener('input', calculateFixedProfit);
        
        // Margin pricing calculations
        const modalTargetMargin = document.getElementById('modalTargetMargin');
        const modalCalculatedPrice = document.getElementById('modalCalculatedPrice');
        const modalMarginProfit = document.getElementById('modalMarginProfit');
        
        function calculateMarginPrice() {
          const cost = parseFloat(modalCostPrice.value) || 0;
          const margin = parseFloat(modalTargetMargin.value) || 0;
          
          if (cost > 0 && margin > 0) {
            const calculatedPrice = cost * (1 + margin / 100);
            const profit = calculatedPrice - cost;
            
            modalCalculatedPrice.value = calculatedPrice.toFixed(2);
            modalMarginProfit.value = profit.toFixed(2);
          } else {
            modalCalculatedPrice.value = '';
            modalMarginProfit.value = '';
          }
        }
        
        modalTargetMargin.addEventListener('input', calculateMarginPrice);
        
        // Range pricing calculations
        const modalMinPrice = document.getElementById('modalMinPrice');
        const modalMaxPrice = document.getElementById('modalMaxPrice');
        const modalRangePotentialProfit = document.getElementById('modalRangePotentialProfit');
        
        function calculateRangeProfit() {
          const cost = parseFloat(modalCostPrice.value) || 0;
          const minPrice = parseFloat(modalMinPrice.value) || 0;
          const maxPrice = parseFloat(modalMaxPrice.value) || 0;
          
          if (cost > 0 && minPrice > 0 && maxPrice > 0) {
            const minProfit = minPrice - cost;
            const maxProfit = maxPrice - cost;
            
            modalRangePotentialProfit.value = `${minProfit.toFixed(2)} to ${maxProfit.toFixed(2)}`;
          } else {
            modalRangePotentialProfit.value = '';
          }
        }
        
        modalMinPrice.addEventListener('input', calculateRangeProfit);
        modalMaxPrice.addEventListener('input', calculateRangeProfit);
        modalCostPrice.addEventListener('input', () => {
          calculateFixedProfit();
          calculateMarginPrice();
          calculateRangeProfit();
        });
      }

      // Close pricing modal on overlay click
      document.addEventListener('DOMContentLoaded', function() {
        const pricingModalOverlay = document.getElementById('pricingModalOverlay');
        if (pricingModalOverlay) {
          pricingModalOverlay.addEventListener('click', function(e) {
            if (e.target === pricingModalOverlay) {
              closePricingModal();
            }
          });
        }

        // Auto-generate item code if not provided
        document.getElementById('itemName').addEventListener('input', function() {
          const itemCode = document.getElementById('itemCode');
          if (!itemCode.value) {
            const name = this.value.replace(/\s+/g, '').toUpperCase();
            const timestamp = Date.now().toString().slice(-4);
            itemCode.value = name.slice(0, 4) + timestamp;
          }
        });
      });

      // Initialize Select2 after page and scripts load
      $(document).ready(function() {
        // Initialize unit with Select2 and tags support (allows creating new units)
        $('#unit').select2({
          theme: 'bootstrap',
          width: '100%',
          placeholder: 'Select or type to create unit',
          tags: true,
          dropdownParent: $('body'),
          createTag: function (params) {
            var term = $.trim(params.term);
            if (term === '' || term.toLowerCase() === '+ add new unit') {
              return null;
            }
            return {
              id: term,
              text: term,
              newTag: true
            }
          }
        });

        // Initialize category with tags support (allows creating new options)
        $('#category').select2({
          theme: 'bootstrap',
          width: '100%',
          placeholder: 'Select or type to create category',
          tags: true,
          dropdownParent: $('body'),
          createTag: function (params) {
            var term = $.trim(params.term);
            if (term === '') {
              return null;
            }
            return {
              id: term,
              text: term,
              newTag: true
            }
          }
        });

        // Initialize supplier with tags support
        $('#supplier').select2({
          theme: 'bootstrap',
          width: '100%',
          placeholder: 'Select or type to create supplier',
          tags: true,
          dropdownParent: $('body'),
          createTag: function (params) {
            var term = $.trim(params.term);
            if (term === '') {
              return null;
            }
            return {
              id: term,
              text: term,
              newTag: true
            }
          }
        });

        // Initialize tax rate dropdowns in edit variant modal
        $('#editTaxRate').select2({
          theme: 'bootstrap',
          width: '100%',
          placeholder: 'Select tax rate',
          minimumResultsForSearch: -1, // Hide search box
          dropdownParent: $('#editVariantModalOverlay')
        });

        $('#editMarginTaxRate').select2({
          theme: 'bootstrap',
          width: '100%',
          placeholder: 'Select tax rate',
          minimumResultsForSearch: -1, // Hide search box
          dropdownParent: $('#editVariantModalOverlay')
        });

        $('#editRangeTaxRate').select2({
          theme: 'bootstrap',
          width: '100%',
          placeholder: 'Select tax rate',
          minimumResultsForSearch: -1, // Hide search box
          dropdownParent: $('#editVariantModalOverlay')
        });
      });
    </script>

    <!-- Edit Variant Modal (Embedded) -->
    <div class="edit-variant-modal-overlay" id="editVariantModalOverlay" style="display: none;">
      <div class="edit-variant-modal">
        <!-- Modal Header -->
        <div class="edit-variant-modal-header">
          <h4><i class="mdi mdi-pencil"></i> Edit Variant</h4>
          <button type="button" class="edit-variant-close-btn" onclick="closeEditVariantModal()">
            <i class="mdi mdi-close"></i>
          </button>
        </div>

        <!-- Modal Body -->
        <div class="edit-variant-modal-body">
          <ul class="nav nav-tabs" id="editVariantTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="edit-item-details-tab" data-bs-toggle="tab" data-bs-target="#edit-item-details" type="button" role="tab">
                <i class="mdi mdi-tag-outline"></i> Item Details
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="edit-pricing-tab" data-bs-toggle="tab" data-bs-target="#edit-pricing" type="button" role="tab">
                <i class="mdi mdi-currency-usd"></i> Pricing Details
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="edit-stock-tab" data-bs-toggle="tab" data-bs-target="#edit-stock" type="button" role="tab">
                <i class="mdi mdi-package-variant"></i> Stock Tracking
              </button>
            </li>
          </ul>

          <div class="tab-content" id="editVariantTabContent">
            <!-- Item Details Tab -->
            <div class="tab-pane fade show active" id="edit-item-details" role="tabpanel">
              <form id="editItemDetailsForm">
                <input type="hidden" id="editVariantIndex" value="">
                <div class="form-group">
                  <label for="editVariantDisplay" class="form-label">Variant</label>
                  <input type="text" class="form-control" id="editVariantDisplay" name="variant_display" readonly>
                  <small class="form-text text-muted">Variations separated by /</small>
                </div>
                <div class="form-group">
                  <label for="editVariantSku" class="form-label">SKU</label>
                  <input type="text" class="form-control" id="editVariantSku" name="sku" readonly>
                </div>
                <div class="form-group">
                  <label for="editVariantBarcode" class="form-label">Barcode</label>
                  <input type="text" class="form-control" id="editVariantBarcode" name="barcode" placeholder="Enter barcode">
                  <small class="form-text text-muted">Optional: Product barcode for scanning</small>
                </div>
              </form>
            </div>

            <!-- Pricing Details Tab -->
            <div class="tab-pane fade" id="edit-pricing" role="tabpanel">
              <form id="editPricingForm">
                <!-- Pricing Method Selection (Radio Buttons) -->
                <div class="form-group mb-3">
                  <label class="form-label required-field">Pricing Method</label>
                  <div class="pricing-methods-row">
                    <div class="pricing-method-option">
                      <input type="radio" class="form-check-input" id="editFixedPricing" name="edit_pricing_type" value="fixed" required checked>
                      <label for="editFixedPricing" class="pricing-method-label">
                        <i class="mdi mdi-lock"></i>
                        <span class="method-name">Fixed</span>
                      </label>
                    </div>
                    <div class="pricing-method-option">
                      <input type="radio" class="form-check-input" id="editManualPricing" name="edit_pricing_type" value="manual" required>
                      <label for="editManualPricing" class="pricing-method-label">
                        <i class="mdi mdi-pencil"></i>
                        <span class="method-name">Manual</span>
                      </label>
                    </div>
                    <div class="pricing-method-option">
                      <input type="radio" class="form-check-input" id="editMarginPricing" name="edit_pricing_type" value="margin" required>
                      <label for="editMarginPricing" class="pricing-method-label">
                        <i class="mdi mdi-percent"></i>
                        <span class="method-name">Margin</span>
                      </label>
                    </div>
                    <div class="pricing-method-option">
                      <input type="radio" class="form-check-input" id="editRangePricing" name="edit_pricing_type" value="range" required>
                      <label for="editRangePricing" class="pricing-method-label">
                        <i class="mdi mdi-chart-line"></i>
                        <span class="method-name">Range</span>
                      </label>
                    </div>
                  </div>
                </div>

                <!-- Pricing Method Descriptions -->
                <div id="editPricingDescription" class="alert alert-light mb-3" style="display: none;">
                  <div id="editFixedDesc" class="pricing-desc" style="display: none;">
                    <strong><i class="mdi mdi-lock text-primary"></i> Fixed Pricing:</strong> Set a single, unchanging selling price for this item.
                  </div>
                  <div id="editManualDesc" class="pricing-desc" style="display: none;">
                    <strong><i class="mdi mdi-pencil text-warning"></i> Manual Pricing:</strong> Enter only the cost price. Selling prices will be set during sales.
                  </div>
                  <div id="editMarginDesc" class="pricing-desc" style="display: none;">
                    <strong><i class="mdi mdi-percent text-success"></i> Margin Pricing:</strong> Set a profit margin percentage, and selling price will be auto-calculated.
                  </div>
                  <div id="editRangeDesc" class="pricing-desc" style="display: none;">
                    <strong><i class="mdi mdi-chart-line text-info"></i> Range Pricing:</strong> Set minimum and maximum price boundaries for flexible pricing.
                  </div>
                </div>

                <!-- Fixed Pricing Fields -->
                <div id="editFixedFields" class="pricing-fields" style="display: block;">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="editFixedCostPrice" class="form-label required-field">Cost Price</label>
                        <div class="input-group">
                          <span class="input-group-text">₦</span>
                          <input type="number" class="form-control" id="editFixedCostPrice" name="fixed_cost_price" placeholder="0.00" step="0.01" min="0">
                        </div>
                        <small class="form-text text-muted">Price you pay to supplier</small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="editSellingPrice" class="form-label required-field">Selling Price</label>
                        <div class="input-group">
                          <span class="input-group-text">₦</span>
                          <input type="number" class="form-control" id="editSellingPrice" name="selling_price" placeholder="0.00" step="0.01" min="0">
                        </div>
                        <small class="form-text text-muted">Price you sell to customers</small>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="editProfitMargin" class="form-label">Profit Margin</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="editProfitMargin" name="profit_margin" placeholder="0%" readonly>
                          <span class="input-group-text">%</span>
                        </div>
                        <small class="form-text text-muted">Auto-calculated margin percentage</small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="editPotentialProfit" class="form-label">Potential Profit</label>
                        <div class="input-group">
                          <span class="input-group-text">₦</span>
                          <input type="text" class="form-control" id="editPotentialProfit" name="potential_profit" placeholder="0.00" readonly>
                        </div>
                        <small class="form-text text-muted">Per unit profit</small>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Manual Pricing Fields -->
                <div id="editManualFields" class="pricing-fields" style="display: none;">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="editManualCostPrice" class="form-label required-field">Cost Price</label>
                        <div class="input-group">
                          <span class="input-group-text">₦</span>
                          <input type="number" class="form-control" id="editManualCostPrice" name="manual_cost_price" placeholder="0.00" step="0.01" min="0">
                        </div>
                        <small class="form-text text-muted">Price you pay to supplier</small>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Margin Pricing Fields -->
                <div id="editMarginFields" class="pricing-fields" style="display: none;">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="editMarginCostPrice" class="form-label required-field">Cost Price</label>
                        <div class="input-group">
                          <span class="input-group-text">₦</span>
                          <input type="number" class="form-control" id="editMarginCostPrice" name="margin_cost_price" placeholder="0.00" step="0.01" min="0">
                        </div>
                        <small class="form-text text-muted">Price you pay to supplier</small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="editTargetMargin" class="form-label required-field">Target Profit Margin</label>
                        <div class="input-group">
                          <input type="number" class="form-control" id="editTargetMargin" name="target_margin" placeholder="0" step="0.01" min="0" max="1000">
                          <span class="input-group-text">%</span>
                        </div>
                        <small class="form-text text-muted">Desired profit margin percentage</small>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="editCalculatedPrice" class="form-label">Calculated Selling Price</label>
                        <div class="input-group">
                          <span class="input-group-text">₦</span>
                          <input type="number" class="form-control" id="editCalculatedPrice" name="calculated_price" placeholder="0.00" readonly>
                        </div>
                        <small class="form-text text-muted">Auto-calculated based on margin</small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="editMarginProfit" class="form-label">Potential Profit</label>
                        <div class="input-group">
                          <span class="input-group-text">₦</span>
                          <input type="text" class="form-control" id="editMarginProfit" name="margin_profit" placeholder="0.00" readonly>
                        </div>
                        <small class="form-text text-muted">Per unit profit</small>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Range Pricing Fields -->
                <div id="editRangeFields" class="pricing-fields" style="display: none;">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="editRangeCostPrice" class="form-label required-field">Cost Price</label>
                        <div class="input-group">
                          <span class="input-group-text">₦</span>
                          <input type="number" class="form-control" id="editRangeCostPrice" name="range_cost_price" placeholder="0.00" step="0.01" min="0">
                        </div>
                        <small class="form-text text-muted">Price you pay to supplier</small>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="editMinPrice" class="form-label required-field">Minimum Price</label>
                        <div class="input-group">
                          <span class="input-group-text">₦</span>
                          <input type="number" class="form-control" id="editMinPrice" name="min_price" placeholder="0.00" step="0.01" min="0">
                        </div>
                        <small class="form-text text-muted">Lowest selling price</small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="editMaxPrice" class="form-label required-field">Maximum Price</label>
                        <div class="input-group">
                          <span class="input-group-text">₦</span>
                          <input type="number" class="form-control" id="editMaxPrice" name="max_price" placeholder="0.00" step="0.01" min="0">
                        </div>
                        <small class="form-text text-muted">Highest selling price</small>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="editRangePotentialProfit" class="form-label">Potential Profit Range</label>
                        <div class="input-group">
                          <span class="input-group-text">₦</span>
                          <input type="text" class="form-control" id="editRangePotentialProfit" name="range_potential_profit" placeholder="0.00 to 0.00" readonly>
                        </div>
                        <small class="form-text text-muted">Profit range per unit</small>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>

            <!-- Stock Tracking Tab -->
            <div class="tab-pane fade" id="edit-stock" role="tabpanel">
              <form id="editStockForm">
                <div class="form-group">
                  <label for="editStockQuantity" class="form-label">Stock Quantity</label>
                  <input type="number" class="form-control" id="editStockQuantity" name="stock_quantity" min="0" required>
                </div>
                <div class="form-group">
                  <label for="editLowStockThreshold" class="form-label">Low Stock Alert (Threshold)</label>
                  <input type="number" class="form-control" id="editLowStockThreshold" name="low_stock_threshold" min="0">
                </div>
                <div class="form-group">
                  <label for="editExpiryDate" class="form-label">Expiry Date</label>
                  <input type="date" class="form-control" id="editExpiryDate" name="expiry_date">
                </div>
                <div class="form-group">
                  <label for="editLocation" class="form-label">Storage Location</label>
                  <input type="text" class="form-control" id="editLocation" name="location" placeholder="e.g., Warehouse A, Shelf 3">
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Modal Footer -->
        <div class="edit-variant-modal-footer">
          <button type="button" class="btn btn-secondary" onclick="closeEditVariantModal()">
            <i class="mdi mdi-close"></i> Cancel
          </button>
          <button type="button" class="btn btn-primary" onclick="saveVariantChanges()">
            <i class="mdi mdi-content-save"></i> Save Changes
          </button>
        </div>
      </div>
    </div>

    <style>
      /* Edit Variant Modal Styles */
      .edit-variant-modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(4px);
        z-index: 10000;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: fadeIn 0.3s ease-out;
      }

      .edit-variant-modal {
        background: #fff;
        border-radius: 16px;
        width: 90%;
        max-width: 700px;
        max-height: 85vh;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        animation: slideUp 0.3s ease-out;
        display: flex;
        flex-direction: column;
      }

      @keyframes slideUp {
        from {
          transform: translateY(50px);
          opacity: 0;
        }
        to {
          transform: translateY(0);
          opacity: 1;
        }
      }

      .edit-variant-modal-header {
        padding: 20px 25px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-radius: 16px 16px 0 0;
      }

      .edit-variant-modal-header h4 {
        margin: 0;
        font-size: 1.3rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
      }

      .edit-variant-close-btn {
        background: rgba(255, 255, 255, 0.2);
        border: none;
        color: #fff;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        transition: all 0.3s ease;
      }

      .edit-variant-close-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: rotate(90deg);
      }

      .edit-variant-modal-body {
        padding: 25px;
        overflow-y: auto;
        flex: 1;
      }

      .edit-variant-modal-body::-webkit-scrollbar {
        width: 8px;
      }

      .edit-variant-modal-body::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
      }

      .edit-variant-modal-body::-webkit-scrollbar-thumb {
        background: #667eea;
        border-radius: 10px;
      }

      .edit-variant-modal-footer {
        padding: 20px 25px;
        background: #f8f9fa;
        border-top: 1px solid #e9ecef;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
      }

      .required-field::after {
        content: " *";
        color: #dc3545;
      }

      .pricing-desc {
        padding: 10px 15px;
        border-radius: 8px;
        margin-bottom: 10px;
        background: rgba(102, 126, 234, 0.1);
      }
    </style>

    <script>
      // Edit Variant Modal Functions
      function openEditVariantModal(variantIndex, variantSku) {
        const modal = document.getElementById('editVariantModalOverlay');
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';

        // Store the variant index
        document.getElementById('editVariantIndex').value = variantIndex;

        // Find the variant row
        const variantRow = document.querySelector(`#variantTableBody tr:nth-child(${variantIndex})`);
        if (!variantRow) return;

        // Get current values from the row
        const variantDisplayDiv = variantRow.querySelector('.variant-display-text');
        const skuInput = variantRow.querySelector('input[name*="[sku]"]');
        const costPriceInput = variantRow.querySelector('input[name*="[cost_price]"]');
        const sellingPriceInput = variantRow.querySelector('input[name*="[selling_price]"]');
        const stockQtyInput = variantRow.querySelector('input[name*="[stock_quantity]"]');
        const lowStockInput = variantRow.querySelector('input[name*="[low_stock_threshold]"]');

        // Populate modal fields
        document.getElementById('editVariantDisplay').value = variantDisplayDiv ? variantDisplayDiv.textContent.trim() : '';
        document.getElementById('editVariantSku').value = skuInput ? skuInput.value : variantSku;
        document.getElementById('editVariantBarcode').value = ''; // TODO: Get from database when available
        
        // Populate all method-specific cost price fields with the same initial value
        const costPriceValue = costPriceInput ? costPriceInput.value : '0.00';
        document.getElementById('editFixedCostPrice').value = costPriceValue;
        document.getElementById('editManualCostPrice').value = costPriceValue;
        document.getElementById('editMarginCostPrice').value = costPriceValue;
        document.getElementById('editRangeCostPrice').value = costPriceValue;
        
        document.getElementById('editSellingPrice').value = sellingPriceInput ? sellingPriceInput.value : '0.00';
        document.getElementById('editStockQuantity').value = stockQtyInput ? stockQtyInput.value : '0';
        document.getElementById('editLowStockThreshold').value = lowStockInput ? lowStockInput.value : '0';
        
        // Calculate initial profit margin
        editCalculateProfitMargin();

        // Setup pricing handlers
        setupEditPricingHandlers();

        // Reset to first tab and ensure tab functionality
        const firstTabButton = document.querySelector('#edit-item-details-tab');
        if (firstTabButton) {
          // Remove active class from all tabs
          document.querySelectorAll('#editVariantTab .nav-link').forEach(tab => {
            tab.classList.remove('active');
          });
          document.querySelectorAll('#editVariantTabContent .tab-pane').forEach(pane => {
            pane.classList.remove('show', 'active');
          });
          
          // Activate first tab
          firstTabButton.classList.add('active');
          document.getElementById('edit-item-details').classList.add('show', 'active');
          
          // Initialize tab switching
          initializeEditVariantTabs();
        }
      }

      // Initialize tab switching for edit variant modal
      function initializeEditVariantTabs() {
        const tabButtons = document.querySelectorAll('#editVariantTab .nav-link');
        
        tabButtons.forEach(button => {
          button.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove active from all tabs
            document.querySelectorAll('#editVariantTab .nav-link').forEach(tab => {
              tab.classList.remove('active');
            });
            document.querySelectorAll('#editVariantTabContent .tab-pane').forEach(pane => {
              pane.classList.remove('show', 'active');
            });
            
            // Activate clicked tab
            this.classList.add('active');
            const targetId = this.getAttribute('data-bs-target');
            const targetPane = document.querySelector(targetId);
            if (targetPane) {
              targetPane.classList.add('show', 'active');
            }
          });
        });
      }

      function closeEditVariantModal() {
        const modal = document.getElementById('editVariantModalOverlay');
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
      }

      function saveVariantChanges() {
        const variantIndex = document.getElementById('editVariantIndex').value;
        if (!variantIndex) return;

        const variantRow = document.querySelector(`#variantTableBody tr:nth-child(${variantIndex})`);
        if (!variantRow) return;

        // Get the active pricing method
        const selectedPricingType = document.querySelector('input[name="edit_pricing_type"]:checked');
        let costPrice = '0.00';
        
        // Get cost price from the appropriate method-specific field
        if (selectedPricingType) {
          switch(selectedPricingType.value) {
            case 'fixed':
              costPrice = document.getElementById('editFixedCostPrice').value;
              break;
            case 'manual':
              costPrice = document.getElementById('editManualCostPrice').value;
              break;
            case 'margin':
              costPrice = document.getElementById('editMarginCostPrice').value;
              break;
            case 'range':
              costPrice = document.getElementById('editRangeCostPrice').value;
              break;
            default:
              costPrice = document.getElementById('editFixedCostPrice').value;
          }
        }
        
        // Get values from modal
        const sellingPrice = document.getElementById('editSellingPrice').value;
        const stockQty = document.getElementById('editStockQuantity').value;
        const lowStock = document.getElementById('editLowStockThreshold').value;

        // Update hidden inputs in the table
        const costPriceInput = variantRow.querySelector('input[name*="[cost_price]"]');
        const sellingPriceInput = variantRow.querySelector('input[name*="[selling_price]"]');
        const stockQtyInput = variantRow.querySelector('input[name*="[stock_quantity]"]');
        const lowStockInput = variantRow.querySelector('input[name*="[low_stock_threshold]"]');

        if (costPriceInput) costPriceInput.value = costPrice;
        if (sellingPriceInput) sellingPriceInput.value = sellingPrice;
        if (stockQtyInput) stockQtyInput.value = stockQty;
        if (lowStockInput) lowStockInput.value = lowStock;

        // Update visible displays
        const costDisplay = variantRow.querySelector('.cost-price-display');
        const sellDisplay = variantRow.querySelector('.sell-price-display');
        if (costDisplay) costDisplay.textContent = '₦' + parseFloat(costPrice).toFixed(2);
        if (sellDisplay) sellDisplay.textContent = '₦' + parseFloat(sellingPrice).toFixed(2);

        // Close modal
        closeEditVariantModal();
        
        showNotification('Variant details updated successfully!', 'success');
      }

      // Edit Modal Pricing Handlers
      function setupEditPricingHandlers() {
        const pricingTypeRadios = document.querySelectorAll('input[name="edit_pricing_type"]');

        pricingTypeRadios.forEach(radio => {
          radio.addEventListener('change', function() {
            if (this.checked) {
              editShowPricingFields(this.value);
              editShowPricingDescription(this.value);
            }
          });
        });

        // Fixed Pricing handlers
        document.getElementById('editFixedCostPrice')?.addEventListener('input', editCalculateProfitMargin);
        document.getElementById('editSellingPrice')?.addEventListener('input', editCalculateProfitMargin);


        // Margin Pricing handlers
        document.getElementById('editMarginCostPrice')?.addEventListener('input', editCalculateMarginPrice);
        document.getElementById('editTargetMargin')?.addEventListener('input', editCalculateMarginPrice);

        // Range Pricing handlers
        document.getElementById('editRangeCostPrice')?.addEventListener('input', editCalculateRangeProfits);
        document.getElementById('editMinPrice')?.addEventListener('input', function() {
          editValidatePriceRange();
          editCalculateRangeProfits();
        });
        document.getElementById('editMaxPrice')?.addEventListener('input', function() {
          editValidatePriceRange();
          editCalculateRangeProfits();
        });
      }

      function editShowPricingFields(type) {
        document.querySelectorAll('.pricing-fields').forEach(field => {
          field.style.display = 'none';
        });

        switch(type) {
          case 'fixed':
            document.getElementById('editFixedFields').style.display = 'block';
            document.getElementById('editSellingPrice').required = true;
            break;
          case 'manual':
            document.getElementById('editManualFields').style.display = 'block';
            document.getElementById('editSellingPrice').required = false;
            break;
          case 'margin':
            document.getElementById('editMarginFields').style.display = 'block';
            document.getElementById('editTargetMargin').required = true;
            break;
          case 'range':
            document.getElementById('editRangeFields').style.display = 'block';
            document.getElementById('editMinPrice').required = true;
            document.getElementById('editMaxPrice').required = true;
            break;
        }
      }

      function editShowPricingDescription(type) {
        const descContainer = document.getElementById('editPricingDescription');
        document.querySelectorAll('#editPricingDescription .pricing-desc').forEach(desc => {
          desc.style.display = 'none';
        });

        if (type) {
          descContainer.style.display = 'block';
          const targetDesc = document.getElementById('edit' + type.charAt(0).toUpperCase() + type.slice(1) + 'Desc');
          if (targetDesc) targetDesc.style.display = 'block';
        } else {
          descContainer.style.display = 'none';
        }
      }

      function editCalculateProfitMargin() {
        const costPrice = parseFloat(document.getElementById('editFixedCostPrice').value) || 0;
        const sellingPrice = parseFloat(document.getElementById('editSellingPrice').value) || 0;
        
        if (costPrice > 0 && sellingPrice > 0) {
          const profit = sellingPrice - costPrice;
          const margin = ((profit / costPrice) * 100).toFixed(2);
          
          document.getElementById('editProfitMargin').value = margin + '%';
          document.getElementById('editPotentialProfit').value = profit.toFixed(2);
        } else {
          document.getElementById('editProfitMargin').value = '0%';
          document.getElementById('editPotentialProfit').value = '0.00';
        }
        
      }

      function editCalculateMarginPrice() {
        const costPrice = parseFloat(document.getElementById('editMarginCostPrice').value) || 0;
        const targetMargin = parseFloat(document.getElementById('editTargetMargin').value) || 0;
        
        if (costPrice > 0 && targetMargin > 0) {
          let calculatedSellingPrice = costPrice * (1 + (targetMargin / 100));
          
          const profit = calculatedSellingPrice - costPrice;
          document.getElementById('editCalculatedPrice').value = calculatedSellingPrice.toFixed(2);
          document.getElementById('editMarginProfit').value = profit.toFixed(2);
        } else {
          document.getElementById('editCalculatedPrice').value = '';
          document.getElementById('editMarginProfit').value = '0.00';
        }
      }

      function editCalculateRangeProfits() {
        const costPrice = parseFloat(document.getElementById('editRangeCostPrice').value) || 0;
        const minPrice = parseFloat(document.getElementById('editMinPrice').value) || 0;
        const maxPrice = parseFloat(document.getElementById('editMaxPrice').value) || 0;
        
        if (costPrice > 0 && minPrice > 0 && maxPrice > 0) {
          const minProfit = minPrice - costPrice;
          const maxProfit = maxPrice - costPrice;
          document.getElementById('editRangePotentialProfit').value = `${minProfit.toFixed(2)} to ${maxProfit.toFixed(2)}`;
        } else {
          document.getElementById('editRangePotentialProfit').value = '0.00 to 0.00';
        }
      }

      function editValidatePriceRange() {
        const minPrice = parseFloat(document.getElementById('editMinPrice').value) || 0;
        const maxPrice = parseFloat(document.getElementById('editMaxPrice').value) || 0;
        const costPrice = parseFloat(document.getElementById('editRangeCostPrice').value) || 0;

        if (minPrice > 0 && maxPrice > 0 && minPrice >= maxPrice) {
          showNotification('Minimum price must be less than maximum price', 'error');
          return false;
        }
        return true;
      }

      // Close modal on Escape key
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
          const modal = document.getElementById('editVariantModalOverlay');
          if (modal && modal.style.display === 'flex') {
            closeEditVariantModal();
          }
        }
      });

      // Close modal on overlay click
      document.addEventListener('click', function(e) {
        const modal = document.getElementById('editVariantModalOverlay');
        if (e.target === modal) {
          closeEditVariantModal();
        }
      });
    </script>
  </body>
</html>