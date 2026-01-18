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
    <title>Add Standard Item - SalesPilot</title>
    <?php include '../../include/responsive.php'; ?>
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

      /* Action buttons - Enhanced */
      .action-buttons {
        background: linear-gradient(to top, #ffffff, #f8f9fa);
        padding: 25px 40px;
        border-top: 2px solid rgba(102, 126, 234, 0.1);
        display: flex;
        justify-content: flex-end;
        gap: 15px;
        z-index: 10;
        box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.08);
        flex-shrink: 0;
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

      /* Form validation styles */
      .form-control:invalid {
        border-color: #e74c3c;
      }

      .form-control:valid {
        border-color: #27ae60;
      }

      /* Checkbox and radio styling */
      .form-check-input {
        width: 1.2em;
        height: 1.2em;
        margin-top: 0.25em;
      }

      .form-check-input:checked {
        background-color: #667eea;
        border-color: #667eea;
      }

      .form-check-label {
        margin-left: 8px;
        font-weight: 500;
        color: #495057;
      }

      /* File input styling */
      .form-control[type="file"] {
        padding: 8px 12px;
      }

      .form-text {
        font-size: 0.875rem;
        margin-top: 5px;
        color: #6c757d;
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

      /* Smooth focus transitions */
      .form-control:focus + .form-text,
      .form-select:focus + .form-text {
        color: #667eea;
        font-weight: 500;
      }

      /* Smart grid responsive */
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

      /* Floating labels effect */
      .floating-label {
        position: relative;
      }

      .floating-label .form-control:focus ~ .form-label,
      .floating-label .form-control:not(:placeholder-shown) ~ .form-label {
        transform: translateY(-25px) scale(0.8);
        color: #667eea;
      }

      /* Success state indicators */
      .form-group.success .form-control {
        border-color: #27ae60;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%2327ae60' d='m2.3 6.73.94-.94 2.94-2.94.94.94-3.88 3.88z'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right calc(0.375em + 0.1875rem) center;
        background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
      }

      /* Custom unit container styling */
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

      .pricing-method-label .method-name {
        font-weight: 500;
        font-size: 0.85rem;
        color: #2c3e50;
        transition: color 0.2s ease;
        margin: 0;
      }

      .pricing-method-option input[type="radio"]:checked + .pricing-method-label .method-name {
        color: white;
      }

      .pricing-method-label small {
        display: none; /* Hide small descriptions in nav style */
      }

      /* Responsive design for pricing methods */
      @media (max-width: 768px) {
        .pricing-methods-row {
          flex-direction: column;
          gap: 4px;
          padding: 4px;
        }
        
        .pricing-method-option {
          min-width: auto;
          width: 100%;
        }
        
        .pricing-method-label {
          justify-content: flex-start;
          padding: 10px 12px;
          gap: 8px;
        }
      }

      @media (max-width: 576px) {
        .pricing-method-label .method-name {
          font-size: 0.8rem;
        }
        
        .pricing-method-label i {
          font-size: 0.9rem;
        }
      }

      .pricing-desc {
        padding: 10px 15px;
        border-radius: 8px;
        margin-bottom: 10px;
        background: rgba(102, 126, 234, 0.1);
        border-left: 4px solid #667eea;
      }

      .pricing-fields {
        animation: fadeInUp 0.4s ease-out;
      }

      @keyframes fadeInUp {
        from {
          opacity: 0;
          transform: translateY(20px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      #pricingTiers .table {
        margin-bottom: 0;
      }

      #pricingTiers .table th {
        background: linear-gradient(135deg, #a8c8ec 0%, #b8d4f0 100%);
        color: #2c3e50;
        border: none;
        font-weight: 600;
        padding: 12px 8px;
        font-size: 0.9rem;
      }

      #pricingTiers .table td {
        padding: 8px;
        vertical-align: middle;
      }

      #pricingTiers .form-control-sm {
        border-radius: 6px;
        border: 1px solid #e9ecef;
      }

      #pricingTiers .btn-sm {
        padding: 4px 12px;
        font-size: 0.8rem;
      }

      /* Pricing type indicators */
      .form-select option[value="fixed"] { color: #007bff; }
      .form-select option[value="manual"] { color: #ffc107; }
      .form-select option[value="margin"] { color: #28a745; }
      .form-select option[value="range"] { color: #17a2b8; }

      /* Sell Toggle Styles */
      .form-check-input:checked {
        background-color: #28a745;
        border-color: #28a745;
      }

      .form-check-input:focus {
        border-color: #28a745;
        outline: 0;
        box-shadow: 0 0 0 0.25rem rgba(40, 167, 69, 0.25);
      }

      .form-check-input:not(:checked) {
        background-color: #6c757d;
        border-color: #6c757d;
      }

      #sellToggleText {
        font-weight: 600;
        font-size: 0.9rem;
        transition: color 0.3s ease;
      }

      .form-switch .form-check-input {
        width: 3em;
        height: 1.5em;
        margin-left: -2.5em;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='rgba%28255,255,255,1%29'/%3e%3c/svg%3e");
        background-position: left center;
        background-size: contain;
        border-radius: 3em;
        transition: background-position .15s ease-in-out;
      }

      .form-switch .form-check-input:checked {
        background-position: right center;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='rgba%28255,255,255,1%29'/%3e%3c/svg%3e");
      }

      .form-switch .form-check-input:focus {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='rgba%28255,255,255,1%29'/%3e%3c/svg%3e");
      }

      /* Portable Sell Toggle Container */
      .sell-toggle-container {
        background: linear-gradient(135deg, #ffffff, #f8f9fa);
        border: 2px solid #e3f2fd;
        border-radius: 12px;
        padding: 16px 22px;
        box-shadow: 0 3px 10px rgba(0, 123, 255, 0.08);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        margin-bottom: 6px;
        min-width: 320px;
      }

      .sell-toggle-container:hover {
        box-shadow: 0 4px 16px rgba(0, 123, 255, 0.12);
        transform: translateY(-1px);
        border-color: #bbdefb;
      }

      .sell-toggle-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: linear-gradient(to bottom, #007bff, #0056b3);
        transition: all 0.3s ease;
      }

      .sell-toggle-container:hover::before {
        width: 6px;
        background: linear-gradient(to bottom, #28a745, #20c997);
      }

      /* Horizontal alignment for all elements */
      .sell-toggle-container .d-flex {
        align-items: center !important;
      }

      .sell-toggle-container strong {
        font-size: 0.95rem;
        font-weight: 700;
        color: #495057;
        letter-spacing: 0.01em;
        line-height: 1;
        margin: 0;
        padding: 0;
      }

      .sell-toggle-container i {
        font-size: 1.1rem;
        line-height: 1;
        margin: 0;
        padding: 0;
      }

      #sellToggleText {
        font-weight: 700;
        font-size: 0.8rem;
        transition: color 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        line-height: 1;
        margin: 0;
        padding: 0;
        min-width: 65px;
        text-align: center;
      }

      /* Enhanced Switch Styling */
      .form-switch {
        flex-shrink: 0;
        margin: 0;
        padding: 0;
      }

      .form-switch .form-check-input {
        width: 3em;
        height: 1.6em;
        background-color: #6c757d;
        border: 2px solid #dee2e6;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        margin: 0;
        padding: 0;
        vertical-align: middle;
      }

      .form-switch .form-check-input:checked {
        background-color: #28a745;
        border-color: #28a745;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1), 0 0 0 2px rgba(40, 167, 69, 0.1);
      }

      .form-switch .form-check-input:focus {
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1), 0 0 0 2px rgba(40, 167, 69, 0.15);
      }

      /* Gap utility for older browsers */
      .gap-3 > * + * {
        margin-left: 1rem;
      }

      /* Responsive adjustments */
      @media (max-width: 768px) {
        .sell-toggle-container {
          padding: 14px 18px;
          margin-bottom: 8px;
          min-width: 280px;
        }
        
        .sell-toggle-container strong {
          font-size: 0.9rem;
        }
        
        #sellToggleText {
          font-size: 0.75rem;
          min-width: 55px;
        }
        
        .form-switch .form-check-input {
          width: 2.8em;
          height: 1.5em;
        }
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
          <i class="mdi mdi-package-variant"></i> Add New Standard Item
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
            Fill in the details below to add a new standard item to your inventory. All required fields are marked with an asterisk (*).
          </p>
        </div>

                    <form class="forms-sample" id="addItemForm" method="POST" action="process_add_item.php" enctype="multipart/form-data">
                      
                      <!-- Section 1: Item Details -->
                      <div class="card mb-4">
                        <div class="card-header">
                          <h5 class="mb-0">
                            <i class="mdi mdi-information-outline"></i> <strong>Basic Item Details</strong>
                          </h5>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="itemName" class="form-label required-field">Item Name</label>
                                <input type="text" class="form-control" id="itemName" name="item_name" placeholder="Enter item name" required>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="itemCode" class="form-label">Item Code/SKU</label>
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
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter item description"></textarea>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="itemImage" class="form-label">Item Image</label>
                                <input type="file" class="form-control" id="itemImage" name="item_image" accept="image/*">
                                <small class="form-text text-muted">Supported formats: JPG, PNG, GIF (Max: 2MB)</small>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Section 2: Sell Toggle (Portable) -->
                      <div class="row mb-4">
                        <div class="col-md-6 col-lg-5">
                          <div class="sell-toggle-container">
                            <div class="d-flex align-items-center justify-content-between">
                              <div class="d-flex align-items-center">
                                <i class="mdi mdi-shopping text-primary me-2"></i>
                                <strong>Available for Sale</strong>
                              </div>
                              <div class="d-flex align-items-center gap-3">
                                <small id="sellToggleText" class="fw-bold">Enabled</small>
                                <div class="form-check form-switch mb-0">
                                  <input class="form-check-input" type="checkbox" id="sellToggle" name="enable_sale" value="1" checked>
                                  <label class="form-check-label" for="sellToggle"></label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Section 3: Pricing -->
                      <div class="card mb-4">
                        <div class="card-header">
                          <h5 class="mb-0">
                            <i class="mdi mdi-currency-usd"></i> <strong>Pricing</strong>
                          </h5>
                        </div>
                        <div class="card-body">
                          <!-- Pricing Method Selection (Radio Buttons) -->
                          <div class="row mb-4">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="form-label required-field">Pricing Method</label>
                                <div class="pricing-methods-row">
                                  <div class="pricing-method-option">
                                    <input type="radio" class="form-check-input" id="fixedPricing" name="pricing_type" value="fixed" required checked>
                                    <label for="fixedPricing" class="pricing-method-label">
                                      <i class="mdi mdi-lock"></i>
                                      <span class="method-name">Fixed Pricing</span>
                                    </label>
                                  </div>
                                  <div class="pricing-method-option">
                                    <input type="radio" class="form-check-input" id="manualPricing" name="pricing_type" value="manual" required>
                                    <label for="manualPricing" class="pricing-method-label">
                                      <i class="mdi mdi-pencil"></i>
                                      <span class="method-name">Manual Pricing</span>
                                    </label>
                                  </div>
                                  <div class="pricing-method-option">
                                    <input type="radio" class="form-check-input" id="marginPricing" name="pricing_type" value="margin" required>
                                    <label for="marginPricing" class="pricing-method-label">
                                      <i class="mdi mdi-percent"></i>
                                      <span class="method-name">Margin Pricing</span>
                                      <small>Auto-calculated by margin</small>
                                    </label>
                                  </div>
                                  <div class="pricing-method-option">
                                    <input type="radio" class="form-check-input" id="rangePricing" name="pricing_type" value="range" required>
                                    <label for="rangePricing" class="pricing-method-label">
                                      <i class="mdi mdi-chart-line"></i>
                                      <span class="method-name">Range Pricing</span>
                                      <small>Tiered quantity pricing</small>
                                    </label>
                                  </div>
                                </div>
                                <small class="form-text text-muted">Choose how you want to set the selling price for this item</small>
                              </div>
                            </div>
                          </div>

                          <!-- Pricing Method Descriptions -->
                          <div id="pricingDescription" class="alert alert-light mb-4" style="display: none;">
                            <div id="fixedDesc" class="pricing-desc" style="display: none;">
                              <strong><i class="mdi mdi-lock text-primary"></i> Fixed Pricing:</strong> Set a single, unchanging selling price for this item.
                            </div>
                            <div id="manualDesc" class="pricing-desc" style="display: none;">
                              <strong><i class="mdi mdi-pencil text-warning"></i> Manual Pricing:</strong> Enter only the cost price. Selling prices, taxes, and discounts will be set during individual sales transactions.
                            </div>
                            <div id="marginDesc" class="pricing-desc" style="display: none;">
                              <strong><i class="mdi mdi-percent text-success"></i> Margin Pricing:</strong> Set a profit margin percentage, and selling price will be calculated automatically. Tax rates are included in calculations.
                            </div>
                            <div id="rangeDesc" class="pricing-desc" style="display: none;">
                              <strong><i class="mdi mdi-chart-line text-info"></i> Range Pricing:</strong> Set minimum and maximum price boundaries for flexible pricing within defined limits. Tax rates are included in calculations.
                            </div>
                          </div>

                          <!-- Basic Cost Price (Always visible) -->
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="costPrice" class="form-label required-field">Cost Price</label>
                                <div class="input-group">
                                  <span class="input-group-text">₦</span>
                                  <input type="number" class="form-control" id="costPrice" name="cost_price" placeholder="0.00" step="0.01" min="0" required>
                                </div>
                                <small class="form-text text-muted">Price you pay to supplier</small>
                              </div>
                            </div>
                            <!-- Dynamic Pricing Fields Container -->
                            <div id="pricingFieldsContainer" class="col-md-8">
                              <!-- Fixed Pricing Fields -->
                              <div id="fixedFields" class="pricing-fields row" style="display: flex;">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="sellingPrice" class="form-label required-field">Fixed Selling Price</label>
                                    <div class="input-group">
                                      <span class="input-group-text">₦</span>
                                      <input type="number" class="form-control" id="sellingPrice" name="selling_price" placeholder="0.00" step="0.01" min="0">
                                    </div>
                                    <small class="form-text text-muted">Price you sell to customers</small>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="profitMargin" class="form-label">Profit Margin</label>
                                    <div class="input-group">
                                      <input type="text" class="form-control" id="profitMargin" name="profit_margin" placeholder="0%" readonly>
                                      <span class="input-group-text">%</span>
                                    </div>
                                    <small class="form-text text-muted">Auto-calculated</small>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="potentialProfit" class="form-label">Potential Profit</label>
                                    <div class="input-group">
                                      <span class="input-group-text">₦</span>
                                      <input type="text" class="form-control" id="potentialProfit" name="potential_profit" placeholder="0.00" readonly>
                                    </div>
                                    <small class="form-text text-muted">Per unit profit</small>
                                  </div>
                                </div>
                              </div>

                              

                              <!-- Margin Pricing Fields -->
                              <div id="marginFields" class="pricing-fields row" style="display: none;">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="targetMargin" class="form-label required-field">Target Profit Margin (%)</label>
                                    <div class="input-group">
                                      <input type="number" class="form-control" id="targetMargin" name="target_margin" placeholder="0" step="0.01" min="0" max="1000">
                                      <span class="input-group-text">%</span>
                                    </div>
                                    <small class="form-text text-muted">Desired profit margin percentage</small>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="calculatedPrice" class="form-label">Calculated Selling Price</label>
                                    <div class="input-group">
                                      <span class="input-group-text">₦</span>
                                      <input type="number" class="form-control" id="calculatedPrice" name="calculated_price" placeholder="0.00" readonly>
                                    </div>
                                    <small class="form-text text-muted">Auto-calculated based on margin</small>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="marginProfit" class="form-label">Potential Profit</label>
                                    <div class="input-group">
                                      <span class="input-group-text">₦</span>
                                      <input type="text" class="form-control" id="marginProfit" name="margin_profit" placeholder="0.00" readonly>
                                    </div>
                                    <small class="form-text text-muted">Per unit profit</small>
                                  </div>
                                </div>
                              </div>

                              <!-- Range Pricing Fields -->
                              <div id="rangeFields" class="pricing-fields row" style="display: none;">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="minPrice" class="form-label required-field">Minimum Price</label>
                                    <div class="input-group">
                                      <span class="input-group-text">₦</span>
                                      <input type="number" class="form-control" id="minPrice" name="min_price" placeholder="0.00" step="0.01" min="0">
                                    </div>
                                    <small class="form-text text-muted">Lowest selling price</small>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="maxPrice" class="form-label required-field">Maximum Price</label>
                                    <div class="input-group">
                                      <span class="input-group-text">₦</span>
                                      <input type="number" class="form-control" id="maxPrice" name="max_price" placeholder="0.00" step="0.01" min="0">
                                    </div>
                                    <small class="form-text text-muted">Highest selling price</small>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="rangePotentialProfit" class="form-label">Potential Profit Range</label>
                                    <div class="input-group">
                                      <span class="input-group-text">₦</span>
                                      <input type="text" class="form-control" id="rangePotentialProfit" name="range_potential_profit" placeholder="0.00 to 0.00" readonly>
                                    </div>
                                    <small class="form-text text-muted">Profit range per unit</small>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- Quantity-based Pricing Tiers (for Range Pricing) -->
                          <div id="pricingTiers" style="display: none;">
                            <div class="row">
                              <div class="col-md-12">
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

                          <!-- Additional Pricing Options (Hidden for Manual Pricing) -->
                           <div id="additionalPricingOptions" class="row">
                          </div>


                        </div>
                      </div> 

                      <!-- Section 3: Stock Details -->
                      <div class="card mb-4">
                        <div class="card-header">
                          <h5 class="mb-0 d-flex justify-content-between align-items-center">
                            <span>
                              <i class="mdi mdi-warehouse"></i> <strong>Stock Tracking Details</strong>
                            </span>
                            <label class="toggle-switch" title="Toggle Stock Details">
                              <input type="checkbox" id="stockToggleCheckbox" checked onchange="toggleStockDetails()">
                              <span class="toggle-slider"></span>
                            </label>
                          </h5>
                        </div>
                        <div class="card-body" id="stockDetailsContent">
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="openingStock" class="form-label required-field">Stock Quantity</label>
                                <input type="number" class="form-control" id="openingStock" name="opening_stock" placeholder="0" min="0" required>
                                <small class="form-text text-muted"> Stock Quantity to Start With </small>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="lowStockThreshold" class="form-label">Low Stock Alert (Threshold)</label>
                                <input type="number" class="form-control" id="lowStockThreshold" name="low_stock_threshold" placeholder="0" min="0">
                                <small class="form-text text-muted">Alert when stock falls below this level</small>
                              </div>
                            </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                <label for="expiryDate" class="form-label">Expiry Date (if applicable)</label>
                                <input type="date" class="form-control" id="expiryDate" name="expiry_date">
                              </div>
                            </div> 
                          </div>

                          <div class="row">
                            <div class="col-md-8">
                              <div class="form-group">
                                <label for="location" class="form-label">Storage Location</label>
                                <input type="text" class="form-control" id="location" name="location" placeholder="e.g., Warehouse A, Shelf 3">
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
          <i class="mdi mdi-content-save"></i> Save Item
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

      // Calculate profit margin and profit amounts automatically
      function calculateProfitMargin() {
        const costPrice = parseFloat(document.getElementById('costPrice').value) || 0;
        const sellingPrice = parseFloat(document.getElementById('sellingPrice').value) || 0;
        
        if (costPrice > 0 && sellingPrice > 0) {
          const profit = sellingPrice - costPrice;
          const margin = (profit / costPrice) * 100;
          document.getElementById('profitMargin').value = margin.toFixed(2) + '%';
          
          // Calculate potential profit for fixed pricing
          const potentialProfitField = document.getElementById('potentialProfit');
          if (potentialProfitField) {
            potentialProfitField.value = profit.toFixed(2);
          }
        } else {
          document.getElementById('profitMargin').value = '0%';
          const potentialProfitField = document.getElementById('potentialProfit');
          if (potentialProfitField) {
            potentialProfitField.value = '0.00';
          }
        }
        
        calculateFinalPrice(); 
      }

      // Reset form
      function resetForm() {
        document.getElementById('addItemForm').reset();
        document.getElementById('profitMargin').value = '0%';
        
        // Clear any potential profit field if it exists
        const potentialProfitField = document.getElementById('potentialProfit');
        if (potentialProfitField) {
          potentialProfitField.value = '0.00';
        }
      }

      // Submit form with validation and enhanced UX
      function submitForm() {
        const form = document.getElementById('addItemForm');
        const submitBtn = document.querySelector('.btn-primary');
        
        // Add loading state
        submitBtn.classList.add('loading');
        submitBtn.disabled = true;
        
        // Simulate validation delay for better UX
        setTimeout(() => {
          // Validate that selling price is greater than cost price
          const costPrice = parseFloat(document.getElementById('costPrice').value) || 0;
          const sellingPrice = parseFloat(document.getElementById('sellingPrice').value) || 0;
          
          if (sellingPrice <= costPrice && costPrice > 0) {
            showNotification('Warning: Selling price should be greater than cost price for profit!', 'warning');
            removeLoading(submitBtn);
            return false;
          }
          
          // Validate reorder level is less than max stock
          const reorderLevel = parseFloat(document.getElementById('reorderLevel').value) || 0;
          const maxStock = parseFloat(document.getElementById('maxStock').value) || 0;
          
          if (maxStock > 0 && reorderLevel >= maxStock) {
            showNotification('Error: Reorder level must be less than maximum stock level!', 'error');
            removeLoading(submitBtn);
            return false;
          }
          
          // Check if required fields are filled
          if (!form.checkValidity()) {
            form.reportValidity();
            removeLoading(submitBtn);
            return false;
          }
          
          // If all validations pass
          showNotification('Form validation passed! Item ready to be saved.', 'success');
          
          // Simulate save process
          setTimeout(() => {
            removeLoading(submitBtn);
            showNotification('Item successfully added to inventory!', 'success');
            
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

      // Event listeners and enhanced form initialization
      document.addEventListener('DOMContentLoaded', function() {
        // Price calculation events
        document.getElementById('costPrice').addEventListener('input', calculateProfitMargin);
        document.getElementById('sellingPrice').addEventListener('input', calculateProfitMargin);

        // Enhanced image upload with preview
        document.getElementById('itemImage').addEventListener('change', function(e) {
          const file = e.target.files[0];
          if (file) {
            if (file.size > 2 * 1024 * 1024) {
              showNotification('File size must be less than 2MB', 'error');
              this.value = '';
              return;
            }

            // Show image preview (optional enhancement)
            const reader = new FileReader();
            reader.onload = function(e) {
              // You can add image preview functionality here
              showNotification('Image selected successfully', 'success');
            };
            reader.readAsDataURL(file);
          }
        });

        // Add form validation visual feedback
        const formInputs = document.querySelectorAll('.form-control, .form-select');
        formInputs.forEach(input => {
          input.addEventListener('blur', function() {
            validateField(this);
          });

          input.addEventListener('input', function() {
            // Clear validation state on input
            this.parentElement.classList.remove('success', 'error');
          });
        });

        // Auto-generate item code if not provided
        document.getElementById('itemName').addEventListener('input', function() {
          const itemCode = document.getElementById('itemCode');
          if (!itemCode.value) {
            const name = this.value.replace(/\s+/g, '').toUpperCase();
            const timestamp = Date.now().toString().slice(-4);
            itemCode.value = name.slice(0, 4) + timestamp;
          }
        });

        // Handle custom unit creation
        setupCustomUnitHandlers();

        // Handle pricing methods
        setupPricingMethodHandlers();

        // Initialize with fixed pricing (default selection)
        showPricingFields('fixed');
        showPricingDescription('fixed');

        // Show welcome message
        showNotification('Ready to add a new item to your inventory!', 'info');
      });

      // Field validation function
      function validateField(field) {
        const formGroup = field.closest('.form-group');
        
        if (field.required && !field.value.trim()) {
          formGroup.classList.add('error');
          formGroup.classList.remove('success');
        } else if (field.value.trim()) {
          formGroup.classList.add('success');
          formGroup.classList.remove('error');
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
            option.text.toLowerCase().layouts(unitName.toLowerCase())
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
            customUnitAbbr.focus();
          }
        });

        customUnitAbbr.addEventListener('keypress', function(e) {
          if (e.key === 'Enter') {
            addUnitBtn.click();
          }
        });

        // Auto-generate abbreviation
        customUnit.addEventListener('input', function() {
          if (!customUnitAbbr.value) {
            const abbr = this.value
              .split(' ')
              .map(word => word.charAt(0))
              .join('')
              .toLowerCase()
              .slice(0, 4);
            customUnitAbbr.value = abbr;
          }
        });
      }

      // Setup pricing method handlers
      function setupPricingMethodHandlers() {
        const pricingTypeRadios = document.querySelectorAll('input[name="pricing_type"]');
        const pricingDescription = document.getElementById('pricingDescription');
        const costPrice = document.getElementById('costPrice');
        const targetMargin = document.getElementById('targetMargin');
        const calculatedPrice = document.getElementById('calculatedPrice');

        // Handle pricing type change
        pricingTypeRadios.forEach(radio => {
          radio.addEventListener('change', function() {
            if (this.checked) {
              const selectedType = this.value;
              showPricingFields(selectedType);
              showPricingDescription(selectedType);
            }
          });
        });

        // Handle margin pricing calculations
        if (targetMargin) {
          targetMargin.addEventListener('input', function() {
            calculateMarginPrice();
          });
        }

        costPrice.addEventListener('input', function() {
          const selectedPricingType = document.querySelector('input[name="pricing_type"]:checked');
          if (selectedPricingType) {
            if (selectedPricingType.value === 'margin') {
              calculateMarginPrice();
            } else if (selectedPricingType.value === 'range') {
              calculateRangeProfits();
            } else if (selectedPricingType.value === 'fixed') {
              calculateProfitMargin();
            }
          }
        });

        // Handle range pricing validation and profit calculation
        document.getElementById('minPrice')?.addEventListener('input', function() {
          validatePriceRange();
          calculateRangeProfits();
        });
        document.getElementById('maxPrice')?.addEventListener('input', function() {
          validatePriceRange();
          calculateRangeProfits();
        });
      }

      // Show appropriate pricing fields based on selected type
      function showPricingFields(type) {
        // Hide all pricing fields first
        document.querySelectorAll('.pricing-fields').forEach(field => {
          field.style.display = 'none';
        });
        
        // Always hide pricing tiers (no longer used)
        document.getElementById('pricingTiers').style.display = 'none';

        // Show/hide additional pricing options based on type
        const additionalPricingOptions = document.getElementById('additionalPricingOptions');
        
        if (type === 'manual') {
          additionalPricingOptions.style.display = 'none';
        } else {
          additionalPricingOptions.style.display = 'flex';
        }

        // Show relevant fields based on type (use defensive checks to avoid runtime errors)
        switch(type) {
          case 'fixed': {
            const fixedEl = document.getElementById('fixedFields');
            if (fixedEl) fixedEl.style.display = 'flex';
            const sellingPriceInput = document.getElementById('sellingPrice');
            if (sellingPriceInput) sellingPriceInput.required = true;
            break;
          }
          case 'manual': {
            const manualEl = document.getElementById('manualFields');
            if (manualEl) manualEl.style.display = 'flex';
            // For manual pricing, only cost price is required, no selling price field shown
            const sellingPriceInputManual = document.getElementById('sellingPrice');
            if (sellingPriceInputManual) {
              sellingPriceInputManual.required = false;
            }
            // No additional pricing options to reset for manual pricing
            break;
          }
          case 'margin': {
            const marginEl = document.getElementById('marginFields');
            if (marginEl) marginEl.style.display = 'flex';
            const targetMarginEl = document.getElementById('targetMargin');
            if (targetMarginEl) targetMarginEl.required = true;
            break;
          }
          case 'range': {
            const rangeEl = document.getElementById('rangeFields');
            if (rangeEl) rangeEl.style.display = 'flex';
            const minPriceEl = document.getElementById('minPrice');
            const maxPriceEl = document.getElementById('maxPrice');
            if (minPriceEl) minPriceEl.required = true;
            if (maxPriceEl) maxPriceEl.required = true;
            break;
          }
        }
      }

      // Show pricing description
      function showPricingDescription(type) {
        const descContainer = document.getElementById('pricingDescription');
        
        // Hide all descriptions
        document.querySelectorAll('.pricing-desc').forEach(desc => {
          desc.style.display = 'none';
        });

        if (type) {
          descContainer.style.display = 'block';
          const targetDesc = document.getElementById(type + 'Desc');
          if (targetDesc) {
            targetDesc.style.display = 'block';
          }
        } else {
          descContainer.style.display = 'none';
        }
      }

      // Calculate selling price and profit based on margin
      function calculateMarginPrice() {
        const costPrice = parseFloat(document.getElementById('costPrice').value) || 0;
        const targetMargin = parseFloat(document.getElementById('targetMargin').value) || 0;
        
        if (costPrice > 0 && targetMargin > 0) {
          const calculatedSellingPrice = costPrice * (1 + (targetMargin / 100));
          const profit = calculatedSellingPrice - costPrice;
          
          document.getElementById('calculatedPrice').value = calculatedSellingPrice.toFixed(2);
          
          // Calculate and display margin profit
          const marginProfitField = document.getElementById('marginProfit');
          if (marginProfitField) {
            marginProfitField.value = profit.toFixed(2);
          }
          
          // Update the selling price field for final calculations
          document.getElementById('sellingPrice').value = calculatedSellingPrice.toFixed(2);
        } else {
          document.getElementById('calculatedPrice').value = '';
          const marginProfitField = document.getElementById('marginProfit');
          if (marginProfitField) {
            marginProfitField.value = '0.00';
          }
        }
      }

      // Validate price range
      function validatePriceRange() {
        const minPrice = parseFloat(document.getElementById('minPrice').value) || 0;
        const maxPrice = parseFloat(document.getElementById('maxPrice').value) || 0;
        const costPrice = parseFloat(document.getElementById('costPrice').value) || 0;

        if (minPrice > 0 && maxPrice > 0) {
          if (minPrice >= maxPrice) {
            showNotification('Minimum price must be less than maximum price', 'error');
            return false;
          }
          
          if (minPrice <= costPrice) {
            showNotification('Warning: Minimum price is less than or equal to cost price', 'warning');
          }
        }
        return true;
      }

      // Add new pricing tier
      function addPricingTier() {
        const tbody = document.getElementById('tierTableBody');
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
          <td><input type="number" class="form-control form-control-sm" placeholder="1" min="1"></td>
          <td><input type="number" class="form-control form-control-sm" placeholder="10" min="1"></td>
          <td><input type="number" class="form-control form-control-sm" placeholder="0.00" step="0.01" min="0"></td>
          <td><button type="button" class="btn btn-sm btn-outline-danger" onclick="removeTier(this)">Remove</button></td>
        `;
        tbody.appendChild(newRow);
        showNotification('New pricing tier added', 'success');
      }

      // Calculate range pricing profits
      function calculateRangeProfits() {
        const costPrice = parseFloat(document.getElementById('costPrice').value) || 0;
        const minPrice = parseFloat(document.getElementById('minPrice').value) || 0;
        const maxPrice = parseFloat(document.getElementById('maxPrice').value) || 0;
        
        const rangePotentialProfitField = document.getElementById('rangePotentialProfit');
        
        if (costPrice > 0 && minPrice > 0 && maxPrice > 0) {
          const minProfit = minPrice - costPrice;
          const maxProfit = maxPrice - costPrice;
          
          if (rangePotentialProfitField) {
            rangePotentialProfitField.value = `${minProfit.toFixed(2)} to ${maxProfit.toFixed(2)}`;
          }
        } else {
          if (rangePotentialProfitField) {
            rangePotentialProfitField.value = '0.00 to 0.00';
          }
        }
      }

      // Remove pricing tier
      function removeTier(button) {
        const row = button.closest('tr');
        const tbody = document.getElementById('tierTableBody');
        
        if (tbody.children.length > 1) {
          row.remove();
          showNotification('Pricing tier removed', 'info');
        } else {
          showNotification('At least one pricing tier is required', 'warning');
        }
      }

      // Toggle Stock Details Section
      function toggleStockDetails() {
        const stockContent = document.getElementById('stockDetailsContent');
        const toggleCheckbox = document.getElementById('stockToggleCheckbox');
        
        if (toggleCheckbox.checked) {
          stockContent.style.display = 'block';
          // Add smooth slide down animation
          stockContent.style.animation = 'slideDown 0.3s ease-out';
        } else {
          stockContent.style.display = 'none';
          stockContent.style.animation = 'slideUp 0.3s ease-out';
        }
      }

      // Add CSS animation for smooth toggle
      const stockToggleStyle = document.createElement('style');
      stockToggleStyle.textContent = `
        @keyframes slideDown {
          from {
            opacity: 0;
            max-height: 0;
            overflow: hidden;
          }
          to {
            opacity: 1;
            max-height: 1000px;
            overflow: visible;
          }
        }
        
        @keyframes slideUp {
          from {
            opacity: 1;
            max-height: 1000px;
            overflow: visible;
          }
          to {
            opacity: 0;
            max-height: 0;
            overflow: hidden;
          }
        }
        
        /* Toggle Switch Styles */
        .toggle-switch {
          position: relative;
          display: inline-block;
          width: 50px;
          height: 24px;
          margin: 0;
          cursor: pointer;
        }
        
        .toggle-switch input {
          opacity: 0;
          width: 0;
          height: 0;
        }
        
        .toggle-slider {
          position: absolute;
          cursor: pointer;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: #ccc;
          transition: .4s;
          border-radius: 24px;
        }
        
        .toggle-slider:before {
          position: absolute;
          content: "";
          height: 18px;
          width: 18px;
          left: 3px;
          bottom: 3px;
          background-color: white;
          transition: .4s;
          border-radius: 50%;
          box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        
        .toggle-switch input:checked + .toggle-slider {
          background-color: #2196F3;
        }
        
        .toggle-switch input:focus + .toggle-slider {
          box-shadow: 0 0 1px #2196F3;
        }
        
        .toggle-switch input:checked + .toggle-slider:before {
          transform: translateX(26px);
        }
        
        .toggle-switch:hover .toggle-slider {
          box-shadow: 0 0 8px rgba(33, 150, 243, 0.3);
        }
        
        #stockDetailsContent {
          transition: all 0.3s ease;
        }
      `;
      document.head.appendChild(stockToggleStyle);

      // Sell Toggle Functionality
      document.getElementById('sellToggle').addEventListener('change', function() {
        const toggleText = document.getElementById('sellToggleText');
        if (this.checked) {
          toggleText.textContent = 'Enabled';
          toggleText.className = 'fw-bold text-success';
          toggleText.style.color = '#28a745';
        } else {
          toggleText.textContent = 'Disabled';
          toggleText.className = 'fw-bold text-danger';
          toggleText.style.color = '#dc3545';
        }
      });

      // Initialize sell toggle text color
      document.addEventListener('DOMContentLoaded', function() {
        const sellToggle = document.getElementById('sellToggle');
        const toggleText = document.getElementById('sellToggleText');
        if (sellToggle.checked) {
          toggleText.className = 'fw-bold text-success';
          toggleText.style.color = '#28a745';
        } else {
          toggleText.className = 'fw-bold text-danger';
          toggleText.style.color = '#dc3545';
        }
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
          placeholder: 'Select or type to create',
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
      });
    </script>
  </body>
</html>
