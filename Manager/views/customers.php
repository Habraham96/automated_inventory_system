<script>
document.addEventListener('DOMContentLoaded', function() {
  var addCustomerForm = document.getElementById('addCustomerForm');
  if (addCustomerForm) {
    addCustomerForm.addEventListener('submit', function(e) {
      e.preventDefault();
      // You can replace this with AJAX or backend logic
      // For now, just show a success alert and close the modal
      var modal = bootstrap.Modal.getInstance(document.getElementById('addCustomerModal'));
      if (modal) modal.hide();
      alert('Customer registered successfully!');
      addCustomerForm.reset();
    });
  }
});
</script>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Customers - SalesPilot</title>
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
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../assets/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <!-- Include Sidebar Styles -->
    <?php include '../layouts/sidebar_styles.php'; ?>
    
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
    
    /* Clickable table rows */
    #customersTable tbody tr {
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
    }
    
    #customersTable tbody tr:hover {
      background-color: #f8f9fa !important;
      transform: translateY(-1px);
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    
    #customersTable tbody tr.selected {
      background-color: #e3f2fd !important;
      border-left: 4px solid #0d6efd;
    }
    
    #customersTable tbody tr:active {
      transform: translateY(0);
    }
    
    /* Side panel styles */
    .customer-details-panel {
      position: fixed;
      top: 0;
      right: -500px;
      width: 500px;
      height: 100vh;
      background: white;
      box-shadow: -5px 0 20px rgba(0,0,0,0.15);
      z-index: 1050;
      transition: right 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      overflow-y: auto;
      border-left: 1px solid #e9ecef;
    }
    
    .customer-details-panel.show {
      right: 0;
    }
    
    /* Panel backdrop for mobile */
    /* Modal z-index and backdrop fixes */
    .modal-backdrop {
      z-index: 1055 !important;
      background-color: rgba(0, 0, 0, 0.7) !important;
    }
    
    #addCustomerModal,
    #editCustomerModal {
      z-index: 1060 !important;
    }
    
    #addCustomerModal .modal-dialog,
    #editCustomerModal .modal-dialog {
      z-index: 1060 !important;
    }
    
    #addCustomerModal .modal-content,
    #editCustomerModal .modal-content {
      background: white !important;
      z-index: 1060 !important;
    }
    
    #addCustomerModal .modal-body,
    #editCustomerModal .modal-body {
      padding: 2rem;
    }
    
    /* Responsive modal sizing */
    @media (max-width: 576px) {
      #addCustomerModal .modal-dialog,
      #editCustomerModal .modal-dialog {
        margin: 0.5rem;
        max-width: calc(100% - 1rem);
      }
      
      #addCustomerModal .modal-body,
      #editCustomerModal .modal-body {
        padding: 1.5rem;
      }
    }
    
    .panel-backdrop {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100vh;
      background: rgba(0, 0, 0, 0.5);
      z-index: 1040;
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
    }
    
    .panel-backdrop.show {
      opacity: 1;
      visibility: visible;
    }
    
    /* Main details container */
    .customer-details-container {
      height: 100%;
      display: flex;
      flex-direction: column;
    }
    
    .customer-details-header {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      padding: 1.5rem 2rem;
      position: sticky;
      top: 0;
      z-index: 10;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid rgba(255,255,255,0.2);
      flex-shrink: 0;
    }
    
    .customer-details-title {
      color: white;
      font-weight: 600;
      font-size: 1.25rem;
      margin: 0;
      display: flex;
      align-items: center;
    }
    
    .customer-details-title i {
      margin-right: 0.75rem;
      font-size: 1.5rem;
    }
    
    .close-details-btn {
      background: rgba(255,255,255,0.2);
      border: none;
      color: white;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
      cursor: pointer;
    }
    
    .close-details-btn:hover {
      background: rgba(255,255,255,0.3);
      transform: rotate(90deg);
    }
    
    .close-details-btn i {
      font-size: 1.25rem;
    }
    
    .customer-details-content {
      padding: 0;
      flex: 1;
      overflow-y: auto;
    }
    
    /* Modern Tab System for Side Panel */
    .customer-tabs {
      border-bottom: 1px solid #e9ecef;
      background: #f8f9fa;
      padding: 0 1.5rem;
      flex-shrink: 0;
    }
    
    .customer-tabs .nav-tabs {
      border: none;
      margin-bottom: 0;
    }
    
    .customer-tabs .nav-link {
      border: none;
      background: transparent;
      color: #6c757d;
      font-weight: 600;
      padding: 0.75rem 1rem;
      margin-right: 0.25rem;
      border-radius: 0;
      transition: all 0.3s ease;
      position: relative;
      text-transform: uppercase;
      font-size: 0.75rem;
      letter-spacing: 0.5px;
    }
    
    .customer-tabs .nav-link:hover {
      color: #0d6efd;
      background: rgba(13, 110, 253, 0.1);
    }
    
    .customer-tabs .nav-link.active {
      color: #0d6efd;
      background: white;
      border-bottom: 3px solid #0d6efd;
    }
    
    .customer-tabs .nav-link::before {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 0;
      height: 3px;
      background: linear-gradient(90deg, #0d6efd, #6610f2);
      transition: width 0.3s ease;
    }
    
    .customer-tabs .nav-link:hover::before {
      width: 100%;
    }
    
    .customer-tabs .nav-link.active::before {
      width: 100%;
    }
    
    .tab-content {
      padding: 1.5rem;
      min-height: 300px;
      flex: 1;
    }
    
    .tab-pane {
      animation: fadeInUp 0.4s ease;
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
    
    /* Tab-specific styling for side panel */
    .info-section {
      display: grid;
      grid-template-columns: 1fr;
      gap: 1rem;
    }
    
    .info-item {
      background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
      border-radius: 8px;
      padding: 1rem;
      border: 1px solid #e9ecef;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
      transition: all 0.3s ease;
    }
    
    .info-item:hover {
      transform: translateY(-1px);
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .info-label {
      color: #6c757d;
      font-size: 0.75rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 0.5rem;
    }
    
    .info-value {
      color: #212529;
      font-size: 0.9rem;
      font-weight: 500;
    }
    
    /* Purchase history table styling for side panel */
    .purchase-table {
      background: white;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    
    .purchase-table .table {
      margin-bottom: 0;
      font-size: 0.85rem;
    }
    
    .purchase-table .table th {
      background: #f8f9fa;
      border: none;
      padding: 0.75rem 0.5rem;
      font-weight: 600;
      color: #495057;
      text-transform: uppercase;
      font-size: 0.7rem;
      letter-spacing: 0.5px;
    }
    
    .purchase-table .table td {
      padding: 0.75rem 0.5rem;
      border-top: 1px solid #e9ecef;
      vertical-align: middle;
    }
    
    .purchase-table .table tbody tr:hover {
      background-color: #f8f9fa;
    }
    
    /* Activity timeline styling for side panel */
    .activity-timeline {
      position: relative;
      padding-left: 1.5rem;
    }
    
    .activity-timeline::before {
      content: '';
      position: absolute;
      left: 12px;
      top: 0;
      bottom: 0;
      width: 2px;
      background: linear-gradient(180deg, #0d6efd, #6610f2);
    }
    
    .activity-item {
      position: relative;
      background: white;
      border-radius: 8px;
      padding: 1rem;
      margin-bottom: 0.75rem;
      border: 1px solid #e9ecef;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
      transition: all 0.3s ease;
    }
    
    .activity-item:hover {
      transform: translateX(3px);
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .activity-item::before {
      content: '';
      position: absolute;
      left: -22px;
      top: 15px;
      width: 8px;
      height: 8px;
      background: #0d6efd;
      border: 2px solid white;
      border-radius: 50%;
      box-shadow: 0 0 0 2px #0d6efd;
    }
    
    .activity-date {
      color: #6c757d;
      font-size: 0.7rem;
      font-weight: 600;
      margin-bottom: 0.25rem;
    }
    
    .activity-title {
      color: #212529;
      font-weight: 600;
      margin-bottom: 0.25rem;
      font-size: 0.85rem;
    }
    
    .activity-description {
      color: #6c757d;
      font-size: 0.8rem;
    }
    
    /* Action buttons for side panel */
    .customer-actions {
      padding: 1.5rem;
      background: #f8f9fa;
      border-top: 1px solid #e9ecef;
      display: flex;
      flex-wrap: wrap;
      gap: 0.5rem;
      flex-shrink: 0;
    }
    
    .customer-actions .btn {
      flex: 1;
      min-width: 0;
      font-size: 0.8rem;
      padding: 0.5rem 0.75rem;
    }
    
    /* Responsive design for side panel */
    @media (max-width: 768px) {
      .customer-details-panel {
        width: 100%;
        right: -100%;
      }
      
      .customer-tabs .nav-link {
        padding: 0.5rem 0.75rem;
        font-size: 0.7rem;
      }
      
      .tab-content {
        padding: 1rem;
      }
      
      .info-item {
        padding: 0.75rem;
      }
      
      .customer-actions {
        padding: 1rem;
      }
      
      .customer-actions .btn {
        font-size: 0.75rem;
        padding: 0.4rem 0.6rem;
      }
    }
    
    /* Status badge styling */
    .status-badge {
      padding: 0.25rem 0.75rem;
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    
    .status-active {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }
    
    .status-inactive {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }
    
    .status-suspended {
      background-color: #fff3cd;
      color: #856404;
      border: 1px solid #ffeaa7;
    }
    
    /* Button loading states */
    .btn:disabled {
      opacity: 0.6;
      cursor: not-allowed;
    }
    
    /* Success alert animation */
    .alert.fade.show {
      animation: slideInRight 0.3s ease-out;
    }
    
    @keyframes slideInRight {
      from {
        transform: translateX(100%);
        opacity: 0;
      }
      to {
        transform: translateX(0);
        opacity: 1;
      }
    }
    
    /* Action buttons styling */
    .action-buttons {
      display: flex;
      gap: 0.25rem;
      justify-content: center;
      align-items: center;
    }
    
    .action-buttons .btn {
      width: 32px;
      height: 32px;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 6px;
      transition: all 0.2s ease;
      position: relative;
      overflow: hidden;
    }
    
    .action-buttons .btn i {
      font-size: 0.875rem;
      transition: all 0.2s ease;
    }
    
    .action-buttons .btn:hover {
      transform: translateY(-1px);
      box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }
    
    .action-buttons .view-btn:hover {
      background-color: #0dcaf0;
      border-color: #0dcaf0;
      color: white;
    }
    
    .action-buttons .edit-btn:hover {
      background-color: #0d6efd;
      border-color: #0d6efd;
      color: white;
    }
    
    .action-buttons .delete-btn:hover {
      background-color: #dc3545;
      border-color: #dc3545;
      color: white;
    }
    
    .action-buttons .btn:active {
      transform: translateY(0);
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    /* Loading state for action buttons */
    .action-buttons .btn.loading {
      pointer-events: none;
      opacity: 0.6;
    }
    
    .action-buttons .btn.loading i {
      animation: spin 0.8s linear infinite;
    }
    
    @keyframes spin {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }
    
    /* Responsive action buttons */
    @media (max-width: 768px) {
      .action-buttons {
        flex-direction: column;
        gap: 0.125rem;
      }
      
      .action-buttons .btn {
        width: 28px;
        height: 28px;
      }
      
      .action-buttons .btn i {
        font-size: 0.75rem;
      }
    }
    
    /* Table improvements for action column */
    #customersTable th:last-child,
    #customersTable td:last-child {
      width: 120px;
      text-align: center;
    }
    
    #customersTable tbody tr {
      transition: background-color 0.2s ease;
    }
    
    #customersTable tbody tr:hover {
      background-color: rgba(0,123,255,0.05);
    }
    
    #customersTable tbody tr.selected {
      background-color: rgba(0,123,255,0.1);
      border-left: 3px solid #007bff;
    }
    
    /* Tooltip styling */
    .btn[title]:hover::after {
      content: attr(title);
      position: absolute;
      bottom: 100%;
      left: 50%;
      transform: translateX(-50%);
      background: rgba(0,0,0,0.8);
      color: white;
      padding: 0.25rem 0.5rem;
      border-radius: 4px;
      font-size: 0.75rem;
      white-space: nowrap;
      z-index: 1000;
      margin-bottom: 5px;
    }
    
    .customer-actions {
      display: flex;
      gap: 1rem;
      justify-content: center;
      padding: 1.5rem 2rem 2rem;
      border-top: 1px solid #e9ecef;
      background: #f8f9fa;
      border-radius: 0 0 16px 16px;
      flex-wrap: wrap;
    }
    
    .customer-actions .btn {
      min-width: 140px;
      border-radius: 8px;
      font-weight: 600;
      padding: 0.75rem 1.25rem;
      transition: all 0.3s ease;
      border: none;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      font-size: 0.875rem;
    }
    
    .customer-actions .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
      .customer-details-panel {
        padding: 1rem;
      }
      
      .customer-details-container {
        margin: 0;
        max-height: 95vh;
      }
      
      .customer-details-header {
        padding: 1.5rem 1.5rem 1rem;
      }
      
      .customer-details-content {
        padding: 1.5rem;
      }
      
      .customer-info-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
      }
      
      .customer-actions {
        padding: 1rem 1.5rem 1.5rem;
        gap: 0.75rem;
      }
      
      .customer-actions .btn {
        min-width: 120px;
        flex: 1;
      }
    }
    
    /* Status badges */
    .status-badge {
      display: inline-block;
      padding: 0.25rem 0.75rem;
      border-radius: 12px;
      font-size: 0.75rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    
    .status-active {
      background-color: #d4edda;
      color: #155724;
    }
    
    .status-inactive {
      background-color: #f8d7da;
      color: #721c24;
    }
    
    /* Filter button hover effects */
    #applyFilters:hover {
      background-color: #0d6efd !important;
      color: white !important;
      transform: translateY(-1px) !important;
    }
    
    #clearFilters:hover {
      background-color: #6c757d !important;
      color: white !important;
      transform: translateY(-1px) !important;
    }
    
    #importCustomers:hover {
      background-color: #0dcaf0 !important;
      color: white !important;
      transform: translateY(-1px) !important;
    }
    
    #exportCustomers:hover {
      background-color: #198754 !important;
      color: white !important;
      transform: translateY(-1px) !important;
    }
    
    /* Button transitions */
    .btn {
      transition: all 0.3s ease !important;
    }
    
    .btn:disabled {
      opacity: 0.6 !important;
      cursor: not-allowed !important;
    }
    
    /* Form control styling */
    .form-control, .form-select {
      border-radius: 6px !important;
      border: 1px solid #dee2e6 !important;
      transition: all 0.3s ease !important;
    }
    
    .form-control:focus, .form-select:focus {
      border-color: #0d6efd !important;
      box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25) !important;
    }
    
    /* Table styling improvements */
    .table th {
      border-top: none !important;
      font-weight: 600 !important;
      color: #495057 !important;
      background-color: #f8f9fa !important;
    }
    
    .table tbody tr {
      transition: background-color 0.3s ease !important;
    }
    
    /* Pagination styling */
    .pagination-sm .page-link {
      padding: 0.25rem 0.5rem !important;
      font-size: 0.875rem !important;
    }
    
    .pagination .page-item.active .page-link {
      background-color: #0d6efd !important;
      border-color: #0d6efd !important;
    }
    
    /* Responsive table improvements */
    @media (max-width: 768px) {
      .table-responsive {
        font-size: 0.875rem;
      }
      
      .btn-sm {
        padding: 0.2rem 0.4rem !important;
        font-size: 0.75rem !important;
      }
      
      .pagination-sm {
        font-size: 0.75rem !important;
      }
    }
    </style>
    <!-- endinject -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
  </head>
  <body class="with-welcome-text">
    <?php include '../layouts/preloader.php'; ?>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        
        <!-- Include Sidebar Content -->
        <?php include '../layouts/sidebar_content_pages.php'; ?>
        
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Customers content starts here -->
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <h4 class="card-title mb-0">Customers</h4>
                      <button type="button" class="btn btn-primary" style="min-width: 150px;" data-bs-toggle="modal" data-bs-target="#addCustomerModal"><strong>+ Add Customer</strong></button>
                    </div>
                    <p class="card-description">Manage your customer database.</p>
                    
                    <!-- Search and Filter Options -->
                    <div class="row mb-3">
                      <div class="col-md-4">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search customers..." id="customerSearchInput">
                          <button class="btn btn-outline-secondary" type="button">
                            <i class="bi bi-search"></i>
                          </button>
                        </div>
                      </div>
                      <div class="col-md-8 d-flex justify-content-end align-items-center gap-2">
                        <!-- Staff Filter -->
                        <select class="form-select" id="staffFilter" style="max-width: 140px;">
                          <option value="">All Staff</option>
                          <option value="Admin">Admin</option>
                          <option value="Staff1">Staff 1</option>
                          <option value="Staff2">Staff 2</option>
                          <option value="Staff3">Staff 3</option>
                          <option value="Staff4">Staff 4</option>
                        </select>
                        
                        
                        <button class="btn btn-outline-success" id="exportCustomers">
                          <i class="bi bi-download"></i> Export
                        </button>
                      </div>
                    </div><br>

                    <div class="table-responsive">
                      <table class="table table-striped" id="customersTable">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>                            
                            <th>Date Registered</th>
                            <th>Added by</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>john.doe@example.com</td>
                            <td>+1 234 567 8900</td>
                            <td>Nov 12, 2023</td>
                            <td>Admin</td>
                            <td>
                              <div class="action-buttons">
                                <button class="btn btn-sm btn-outline-info view-btn" data-customer-id="1" title="View Details">
                                  <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-primary edit-btn" data-customer-id="1" title="Edit Customer">
                                  <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger delete-btn" data-customer-id="1" title="Delete Customer">
                                  <i class="bi bi-trash"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Jane Smith</td>
                            <td>jane.smith@example.com</td>
                            <td>+1 234 567 8901</td>
                            <td>Nov 13, 2023</td>
                            <td>Staff 4</td>
                            <td>
                              <div class="action-buttons">
                                <button class="btn btn-sm btn-outline-info view-btn" data-customer-id="2" title="View Details">
                                  <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-primary edit-btn" data-customer-id="2" title="Edit Customer">
                                  <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger delete-btn" data-customer-id="2" title="Delete Customer">
                                  <i class="bi bi-trash"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Michael Brown</td>
                            <td>michael.brown@example.com</td>
                            <td>+1 234 567 8902</td>
                            <td>Nov 14, 2023</td>
                            <td>Admin</td>
                            <td>
                              <div class="action-buttons">
                                <button class="btn btn-sm btn-outline-info view-btn" data-customer-id="3" title="View Details">
                                  <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-primary edit-btn" data-customer-id="3" title="Edit Customer">
                                  <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger delete-btn" data-customer-id="3" title="Delete Customer">
                                  <i class="bi bi-trash"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>Sarah Johnson</td>
                            <td>sarah.johnson@example.com</td>
                            <td>+1 234 567 8903</td>
                            <td>Nov 15, 2023</td>
                            <td>Staff 2</td>
                            <td>
                              <div class="action-buttons">
                                <button class="btn btn-sm btn-outline-info view-btn" data-customer-id="4" title="View Details">
                                  <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-primary edit-btn" data-customer-id="4" title="Edit Customer">
                                  <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger delete-btn" data-customer-id="4" title="Delete Customer">
                                  <i class="bi bi-trash"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td>David Wilson</td>
                            <td>david.wilson@example.com</td>
                            <td>+1 234 567 8904</td>
                            <td>Nov 16, 2023</td>
                            <td>Admin</td>
                            <td>
                              <div class="action-buttons">
                                <button class="btn btn-sm btn-outline-info view-btn" data-customer-id="5" title="View Details">
                                  <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-primary edit-btn" data-customer-id="5" title="Edit Customer">
                                  <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger delete-btn" data-customer-id="5" title="Delete Customer">
                                  <i class="bi bi-trash"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <!-- Pagination and Info -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                      <div class="text-muted small">
                        Showing <strong>1-5</strong> of <strong>5</strong> entries
                      </div>
                      <nav aria-label="Table pagination">
                        <ul class="pagination pagination-sm mb-0">
                          <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                          </li>
                          <li class="page-item active"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                          </li>
                        </ul>
                      </nav>
                    </div>

                    <!-- Panel Backdrop -->
                    <div class="panel-backdrop" id="panelBackdrop"></div>
                    
                    <!-- Customer Details Side Panel -->
                    <div class="customer-details-panel" id="customerDetailsPanel">
                      <div class="customer-details-container">
                        <div class="customer-details-header">
                          <h5 class="customer-details-title">
                            <i class="bi bi-person-circle"></i>Customer Details
                          </h5>
                          <button class="close-details-btn" id="closeDetailsBtn">
                            <i class="bi bi-x-lg"></i>
                          </button>
                        </div>
                        
                        <div class="customer-details-content">
                          <!-- Modern Tab Navigation -->
                          <div class="customer-tabs">
                            <ul class="nav nav-tabs" id="customerTabs" role="tablist">
                              <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab" aria-controls="overview" aria-selected="true">
                                  <i class="bi bi-person me-1"></i>Overview
                                </button>
                              </li>
                              <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
                                  <i class="bi bi-envelope me-1"></i>Contact
                                </button>
                              </li>
                              <li class="nav-item" role="presentation">
                                <button class="nav-link" id="purchases-tab" data-bs-toggle="tab" data-bs-target="#purchases" type="button" role="tab" aria-controls="purchases" aria-selected="false">
                                  <i class="bi bi-bag me-1"></i>Orders
                                </button>
                              </li>
                              <li class="nav-item" role="presentation">
                                <button class="nav-link" id="activity-tab" data-bs-toggle="tab" data-bs-target="#activity" type="button" role="tab" aria-controls="activity" aria-selected="false">
                                  <i class="bi bi-clock-history me-1"></i>Activity
                                </button>
                              </li>
                            </ul>
                          </div>
                          
                          <!-- Tab Content -->
                          <div class="tab-content" id="customerTabContent">
                            <!-- Overview Tab -->
                            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                              <div class="info-section">
                                <div class="info-item">
                                  <div class="info-label">Customer ID</div>
                                  <div class="info-value" id="detailCustomerId">-</div>
                                </div>
                                <div class="info-item">
                                  <div class="info-label">Full Name</div>
                                  <div class="info-value" id="detailCustomerName">-</div>
                                </div>
                                <div class="info-item">
                                  <div class="info-label">Total Orders</div>
                                  <div class="info-value text-primary" id="detailTotalOrders">0</div>
                                </div>
                                <div class="info-item">
                                  <div class="info-label">Total Spent</div>
                                  <div class="info-value text-success" id="detailTotalSpent">₦0.00</div>
                                </div>
                                <div class="info-item">
                                  <div class="info-label">Account Status</div>
                                  <div class="info-value">
                                    <span class="badge bg-success" id="detailCustomerStatus">Active</span>
                                  </div>
                                </div>
                                <div class="info-item">
                                  <div class="info-label">Last Purchase</div>
                                  <div class="info-value" id="detailLastPurchase">Never</div>
                                </div>
                              </div>
                            </div>
                            
                            <!-- Contact Info Tab -->
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                              <div class="info-section">
                                <div class="info-item">
                                  <div class="info-label">Email Address</div>
                                  <div class="info-value" id="detailCustomerEmail">-</div>
                                </div>
                                <div class="info-item">
                                  <div class="info-label">Phone Number</div>
                                  <div class="info-value" id="detailCustomerPhone">-</div>
                                </div>
                                <div class="info-item">
                                  <div class="info-label">Address</div>
                                  <div class="info-value" id="detailCustomerAddress">-</div>
                                </div>
                                <div class="info-item">
                                  <div class="info-label">Date Registered</div>
                                  <div class="info-value" id="detailRegistrationDate">-</div>
                                </div>
                                <div class="info-item">
                                  <div class="info-label">Added by</div>
                                  <div class="info-value" id="detailAddedBy">-</div>
                                </div>
                                <div class="info-item">
                                  <div class="info-label">Last Updated</div>
                                  <div class="info-value" id="detailLastUpdated">-</div>
                                </div>
                              </div>
                            </div>
                            
                            <!-- Purchase History Tab -->
                            <div class="tab-pane fade" id="purchases" role="tabpanel" aria-labelledby="purchases-tab">
                              <div class="purchase-table">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>Order ID</th>
                                      <th>Date</th>
                                      <th>Items</th>
                                      <th>Total Amount</th>
                                      <th>Status</th>
                                      <th>Actions</th>
                                    </tr>
                                  </thead>
                                  <tbody id="purchase-history">
                                    <tr>
                                      <td colspan="6" class="text-center text-muted py-4">
                                        <i class="bi bi-bag fa-2x mb-2"></i>
                                        <div>No purchase history available</div>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            
                            <!-- Activity Log Tab -->
                            <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="activity-tab">
                              <div class="activity-timeline" id="activity-timeline">
                                <div class="activity-item">
                                  <div class="activity-date">Today</div>
                                  <div class="activity-title">Customer profile viewed</div>
                                  <div class="activity-description">Customer details were accessed by admin</div>
                                </div>
                                <div class="activity-item">
                                  <div class="activity-date">Yesterday</div>
                                  <div class="activity-title">Profile updated</div>
                                  <div class="activity-description">Customer information was updated</div>
                                </div>
                                <div class="activity-item">
                                  <div class="activity-date">3 days ago</div>
                                  <div class="activity-title">Account created</div>
                                  <div class="activity-description">Customer account was successfully created</div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        <div class="customer-actions">
                          <button class="btn btn-primary" id="editCustomerBtn">
                            <i class="bi bi-pencil me-1"></i>Edit Customer
                          </button>
                          <button class="btn btn-info" id="viewOrdersBtn">
                            <i class="bi bi-receipt me-1"></i>View Orders
                          </button>
                          <button class="btn btn-success" id="sendEmailBtn">
                            <i class="bi bi-envelope me-1"></i>Send Email
                          </button>
                          <button class="btn btn-outline-danger" id="deleteCustomerBtn">
                            <i class="bi bi-trash me-1"></i>Delete
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Customers content ends here -->
          </div>
          <!-- content-wrapper ends -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
							<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© 2025 SalesPilot. All rights reserved.</span>
            </div>
          </footer>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    
    <!-- Add Customer Modal - Placed outside container for proper z-index -->
    <div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addCustomerModalLabel">Add Customer</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="addCustomerForm">
            <div class="modal-body">
              <div class="mb-3">
                <label for="customerName" class="form-label">Customer Name</label>
                <input type="text" class="form-control" id="customerName" name="customerName" required>
              </div>
              <div class="mb-3">
                <label for="customerEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="customerEmail" name="customerEmail" required>
              </div>
              <div class="mb-3">
                <label for="customerPhone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="customerPhone" name="customerPhone" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Save Customer</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    
    <!-- Edit Customer Modal - Placed outside container for proper z-index -->
    <div class="modal fade" id="editCustomerModal" tabindex="-1" aria-labelledby="editCustomerModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editCustomerModalLabel">Edit Customer</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="editCustomerForm">
            <div class="modal-body">
              <input type="hidden" id="editCustomerId" name="editCustomerId">
              <div class="mb-3">
                <label for="editCustomerName" class="form-label">Customer Name</label>
                <input type="text" class="form-control" id="editCustomerName" name="editCustomerName" required>
              </div>
              <div class="mb-3">
                <label for="editCustomerEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="editCustomerEmail" name="editCustomerEmail" required>
              </div>
              <div class="mb-3">
                <label for="editCustomerPhone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="editCustomerPhone" name="editCustomerPhone" required>
              </div>
              <div class="mb-3">
                <label for="editCustomerAddress" class="form-label">Address</label>
                <textarea class="form-control" id="editCustomerAddress" name="editCustomerAddress" rows="3"></textarea>
              </div>
              <div class="mb-3">
                <label for="editCustomerStatus" class="form-label">Status</label>
                <select class="form-select" id="editCustomerStatus" name="editCustomerStatus" required>
                  <option value="Active">Active</option>
                  <option value="Inactive">Inactive</option>
                  <option value="Suspended">Suspended</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">
                <span class="spinner-border spinner-border-sm me-2 d-none" id="editCustomerSpinner"></span>
                Update Customer
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    
    <!-- Edit Customer Modal - Placed outside container for proper z-index -->
    <div class="modal fade" id="editCustomerModal" tabindex="-1" aria-labelledby="editCustomerModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editCustomerModalLabel">Edit Customer</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="editCustomerForm">
            <div class="modal-body">
              <input type="hidden" id="editCustomerId" name="editCustomerId">
              <div class="mb-3">
                <label for="editCustomerName" class="form-label">Customer Name</label>
                <input type="text" class="form-control" id="editCustomerName" name="editCustomerName" required>
              </div>
              <div class="mb-3">
                <label for="editCustomerEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="editCustomerEmail" name="editCustomerEmail" required>
              </div>
              <div class="mb-3">
                <label for="editCustomerPhone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="editCustomerPhone" name="editCustomerPhone" required>
              </div>
              <div class="mb-3">
                <label for="editCustomerAddress" class="form-label">Address</label>
                <textarea class="form-control" id="editCustomerAddress" name="editCustomerAddress" rows="3"></textarea>
              </div>
              <div class="mb-3">
                <label for="editCustomerStatus" class="form-label">Status</label>
                <select class="form-select" id="editCustomerStatus" name="editCustomerStatus" required>
                  <option value="Active">Active</option>
                  <option value="Inactive">Inactive</option>
                  <option value="Suspended">Suspended</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">
                <span class="spinner-border spinner-border-sm me-2 d-none" id="editCustomerSpinner"></span>
                Update Customer
              </button>
            </div>
          </form>
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
    <!-- <script src="../assets/js/off-canvas.js"></script> Commented out to avoid conflicts -->
  <script src="../assets/js/template.js"></script>
    
    <!-- Include Sidebar Scripts -->
    <?php include '../layouts/sidebar_scripts.php'; ?>
    
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/todolist.js"></script>
    
    <!-- Sidebar Menu Collapse Behavior - Ensures only one submenu open at a time -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Customer details panel elements
      const customersTable = document.getElementById('customersTable');
      const detailsPanel = document.getElementById('customerDetailsPanel');
      const panelBackdrop = document.getElementById('panelBackdrop');
      const closeDetailsBtn = document.getElementById('closeDetailsBtn');
      
      // Sample detailed customer data
      const customerDetails = {
        1: {
          id: 'CUST-001',
          name: 'John Doe',
          email: 'john.doe@example.com',
          phone: '+1 234 567 8900',
          address: '123 Main Street, Anytown, AT 12345',
          registrationDate: 'Nov 12, 2023',
          addedBy: 'Admin',
          lastUpdated: 'Nov 15, 2023',
          status: 'Active',
          totalOrders: '12',
          totalSpent: '$2,450.00',
          lastPurchase: 'Nov 10, 2023'
        },
        2: {
          id: 'CUST-002',
          name: 'Jane Smith',
          email: 'jane.smith@example.com',
          phone: '+1 234 567 8901',
          address: '456 Oak Avenue, Somewhere, SW 54321',
          registrationDate: 'Nov 13, 2023',
          addedBy: 'Staff 4',
          lastUpdated: 'Nov 14, 2023',
          status: 'Active',
          totalOrders: '8',
          totalSpent: '$1,230.50',
          lastPurchase: 'Nov 8, 2023'
        },
        3: {
          id: 'CUST-003',
          name: 'Michael Brown',
          email: 'michael.brown@example.com',
          phone: '+1 234 567 8902',
          address: '789 Pine Road, Elsewhere, EW 67890',
          registrationDate: 'Nov 14, 2023',
          addedBy: 'Admin',
          lastUpdated: 'Nov 16, 2023',
          status: 'Active',
          totalOrders: '15',
          totalSpent: '$3,120.75',
          lastPurchase: 'Nov 12, 2023'
        },
        4: {
          id: 'CUST-004',
          name: 'Sarah Johnson',
          email: 'sarah.johnson@example.com',
          phone: '+1 234 567 8903',
          address: '321 Elm Street, Nowhere, NW 13579',
          registrationDate: 'Nov 15, 2023',
          addedBy: 'Staff 2',
          lastUpdated: 'Nov 17, 2023',
          status: 'Inactive',
          totalOrders: '3',
          totalSpent: '$450.25',
          lastPurchase: 'Oct 28, 2023'
        },
        5: {
          id: 'CUST-005',
          name: 'David Wilson',
          email: 'david.wilson@example.com',
          phone: '+1 234 567 8904',
          address: '654 Maple Drive, Anywhere, AW 24680',
          registrationDate: 'Nov 16, 2023',
          addedBy: 'Admin',
          lastUpdated: 'Nov 18, 2023',
          status: 'Active',
          totalOrders: '7',
          totalSpent: '$890.00',
          lastPurchase: 'Nov 5, 2023'
        }
      };
      
      // Function to hide customer details
      function hideCustomerDetails() {
        detailsPanel.classList.remove('show');
        panelBackdrop.classList.remove('show');
        currentCustomerId = null; // Reset current customer ID
        
        // Remove selected state from all rows
        document.querySelectorAll('#customersTable tbody tr').forEach(row => {
          row.classList.remove('selected');
        });
        
        // Re-enable body scroll
        document.body.style.overflow = 'auto';
      }
      
      // Add click event listener to table rows (but not on action buttons)
      if (customersTable) {
        customersTable.addEventListener('click', function(e) {
          const row = e.target.closest('tbody tr');
          if (row && !e.target.closest('button') && !e.target.closest('.action-buttons')) {
            // Remove selected class from all rows
            document.querySelectorAll('#customersTable tbody tr').forEach(r => {
              r.classList.remove('selected');
            });
            
            // Add selected class to clicked row
            row.classList.add('selected');
            
            // Get customer ID from the row (S/N column)
            const customerId = row.cells[0].textContent.trim();
            showCustomerDetails(customerId);
          }
        });
      }

      // Action button functionality for table rows
      document.addEventListener('click', function(e) {
        // View button functionality
        if (e.target.closest('.view-btn')) {
          e.stopPropagation();
          const button = e.target.closest('.view-btn');
          const customerId = button.getAttribute('data-customer-id');
          
          // Add loading state
          button.classList.add('loading');
          
          setTimeout(() => {
            // Remove selected class from all rows
            document.querySelectorAll('#customersTable tbody tr').forEach(r => {
              r.classList.remove('selected');
            });
            
            // Add selected class to current row
            const row = button.closest('tr');
            row.classList.add('selected');
            
            // Show customer details
            showCustomerDetails(customerId);
            
            // Remove loading state
            button.classList.remove('loading');
            
            // Show success message
            showSuccessAlert('Customer details loaded successfully');
          }, 500);
        }
        
        // Edit button functionality
        if (e.target.closest('.edit-btn')) {
          e.stopPropagation();
          const button = e.target.closest('.edit-btn');
          const customerId = button.getAttribute('data-customer-id');
          
          // Add loading state
          button.classList.add('loading');
          
          setTimeout(() => {
            const customer = customerDetails[customerId];
            if (!customer) {
              button.classList.remove('loading');
              showErrorAlert('Customer not found');
              return;
            }

            // Populate edit form with current customer data
            document.getElementById('editCustomerId').value = customerId;
            document.getElementById('editCustomerName').value = customer.name;
            document.getElementById('editCustomerEmail').value = customer.email;
            document.getElementById('editCustomerPhone').value = customer.phone;
            document.getElementById('editCustomerAddress').value = customer.address;
            document.getElementById('editCustomerStatus').value = customer.status;

            // Remove loading state
            button.classList.remove('loading');
            
            // Show edit modal
            editCustomerModal.show();
            
            // Set current customer ID for modal operations
            currentCustomerId = customerId;
          }, 500);
        }
        
        // Delete button functionality
        if (e.target.closest('.delete-btn')) {
          e.stopPropagation();
          const button = e.target.closest('.delete-btn');
          const customerId = button.getAttribute('data-customer-id');
          
          const customer = customerDetails[customerId];
          if (!customer) {
            showErrorAlert('Customer not found');
            return;
          }

          // Show confirmation dialog
          if (confirm(`Are you sure you want to delete customer "${customer.name}"? This action cannot be undone.`)) {
            // Add loading state
            button.classList.add('loading');
            
            setTimeout(() => {
              // Remove from customer data
              delete customerDetails[customerId];

              // Remove from table
              const row = button.closest('tr');
              row.style.transition = 'all 0.3s ease';
              row.style.opacity = '0';
              row.style.transform = 'translateX(-20px)';
              
              setTimeout(() => {
                row.remove();
                
                // Update row numbers
                updateRowNumbers();
                
                // Hide details panel if this customer was selected
                if (currentCustomerId === customerId) {
                  hideCustomerDetails();
                }
                
                // Show success message
                showSuccessAlert('Customer deleted successfully!');
              }, 300);

            }, 1000);
          }
        }
      });
      
      // Close details panel
      if (closeDetailsBtn) {
        closeDetailsBtn.addEventListener('click', hideCustomerDetails);
      }
      
      // Close panel when clicking backdrop
      if (panelBackdrop) {
        panelBackdrop.addEventListener('click', hideCustomerDetails);
      }
      
      // Close panel when clicking outside the container
      if (detailsPanel) {
        detailsPanel.addEventListener('click', function(e) {
          if (e.target === detailsPanel) {
            hideCustomerDetails();
          }
        });
      }
      
      // Close panel with Escape key
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && detailsPanel.classList.contains('show')) {
          hideCustomerDetails();
        }
      });

      // Search and Filter functionality
      const searchInput = document.getElementById('customerSearchInput');
      const staffFilter = document.getElementById('staffFilter');
      const dateFilter = document.getElementById('dateFilter');
      const applyFiltersBtn = document.getElementById('applyFilters');
      const clearFiltersBtn = document.getElementById('clearFilters');
      const importBtn = document.getElementById('importCustomers');
      const exportBtn = document.getElementById('exportCustomers');
      const table = document.getElementById('customersTable');
      const tableBody = table.querySelector('tbody');

      // Apply filters function
      function applyAllFilters() {
        const searchTerm = searchInput.value.toLowerCase();
        const selectedStaff = staffFilter ? staffFilter.value : '';
        const selectedDate = dateFilter ? dateFilter.value : '';
        const rows = Array.from(tableBody.querySelectorAll('tr'));

        rows.forEach(row => {
          // Search by name, email, phone, staff
          const name = row.cells[1]?.textContent.toLowerCase() || '';
          const email = row.cells[2]?.textContent.toLowerCase() || '';
          const phone = row.cells[3]?.textContent.toLowerCase() || '';
          const staff = row.cells[4]?.textContent.toLowerCase() || '';
          const date = row.cells[5]?.textContent || '';
          let matchesSearch = name.includes(searchTerm) || email.includes(searchTerm) || phone.includes(searchTerm) || staff.includes(searchTerm);
          let matchesStaff = !selectedStaff || staff === selectedStaff.toLowerCase();
          let matchesDate = !selectedDate || date === selectedDate;
          if (matchesSearch && matchesStaff && matchesDate) {
            row.style.display = '';
          } else {
            row.style.display = 'none';
          }
        });
      }

      // Real-time search
      if (searchInput) {
        searchInput.addEventListener('input', applyAllFilters);
      }

      // Filter change events
      if (staffFilter) {
        staffFilter.addEventListener('change', applyAllFilters);
      }
      if (dateFilter) {
        dateFilter.addEventListener('change', applyAllFilters);
      }

      // Apply filters button
      if (applyFiltersBtn) {
        applyFiltersBtn.addEventListener('click', applyAllFilters);
      }

      // Clear filters button
      if (clearFiltersBtn) {
        clearFiltersBtn.addEventListener('click', function() {
          searchInput.value = '';
          staffFilter.value = '';
          dateFilter.value = '';
          applyAllFilters();
        });
      }

      // Export functionality
      if (exportBtn) {
        exportBtn.addEventListener('click', function() {
          exportBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> Exporting...';
          exportBtn.disabled = true;

          // Get visible table data
          const visibleRows = tableBody.querySelectorAll('tr:not([style*="display: none"])');
          let csvContent = 'S/N,Name,Email,Phone,Added By,Date Registered\n';

          visibleRows.forEach(row => {
            const rowData = [
              row.cells[0].textContent.trim(),
              row.cells[1].textContent.trim(),
              row.cells[2].textContent.trim(),
              row.cells[3].textContent.trim(),
              row.cells[4].textContent.trim(),
              row.cells[5].textContent.trim()
            ];
            csvContent += rowData.map(field => `"${field.replace(/"/g, '""')}"`).join(',') + '\n';
          });

          // Create and download CSV file
          const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
          const link = document.createElement('a');
          const url = URL.createObjectURL(blob);
          link.setAttribute('href', url);
          link.setAttribute('download', `customers_${new Date().toISOString().split('T')[0]}.csv`);
          link.style.visibility = 'hidden';
          document.body.appendChild(link);
          link.click();
          document.body.removeChild(link);

          // Reset button state
          setTimeout(() => {
            exportBtn.innerHTML = '<i class="bi bi-download"></i> Export';
            exportBtn.disabled = false;
          }, 1000);
        });
      }

      // Import functionality (placeholder)
      if (importBtn) {
        importBtn.addEventListener('click', function() {
          alert('Import functionality will be implemented here');
        });
      }

      // Edit and Delete functionality
      const editCustomerBtn = document.getElementById('editCustomerBtn');
      const deleteCustomerBtn = document.getElementById('deleteCustomerBtn');
      const viewOrdersBtn = document.getElementById('viewOrdersBtn');
      const sendEmailBtn = document.getElementById('sendEmailBtn');
      const editCustomerModal = new bootstrap.Modal(document.getElementById('editCustomerModal'));
      const editCustomerForm = document.getElementById('editCustomerForm');
      let currentCustomerId = null;

      // Edit Customer functionality
      if (editCustomerBtn) {
        editCustomerBtn.addEventListener('click', function() {
          if (!currentCustomerId) return;

          const customer = customerDetails[currentCustomerId];
          if (!customer) return;

          // Populate edit form with current customer data
          document.getElementById('editCustomerId').value = currentCustomerId;
          document.getElementById('editCustomerName').value = customer.name;
          document.getElementById('editCustomerEmail').value = customer.email;
          document.getElementById('editCustomerPhone').value = customer.phone;
          document.getElementById('editCustomerAddress').value = customer.address;
          document.getElementById('editCustomerStatus').value = customer.status;

          // Show edit modal
          editCustomerModal.show();
        });
      }

      // Handle edit form submission
      if (editCustomerForm) {
        editCustomerForm.addEventListener('submit', function(e) {
          e.preventDefault();
          
          const submitBtn = this.querySelector('button[type="submit"]');
          const spinner = document.getElementById('editCustomerSpinner');
          
          // Show loading state
          submitBtn.disabled = true;
          spinner.classList.remove('d-none');
          
          // Get form data
          const formData = new FormData(this);
          const customerId = formData.get('editCustomerId');
          const customerName = formData.get('editCustomerName');
          const customerEmail = formData.get('editCustomerEmail');
          const customerPhone = formData.get('editCustomerPhone');
          const customerAddress = formData.get('editCustomerAddress');
          const customerStatus = formData.get('editCustomerStatus');

          // Simulate API call with timeout
          setTimeout(() => {
            // Update customer data in memory (in real app, this would be an API call)
            if (customerDetails[customerId]) {
              customerDetails[customerId].name = customerName;
              customerDetails[customerId].email = customerEmail;
              customerDetails[customerId].phone = customerPhone;
              customerDetails[customerId].address = customerAddress;
              customerDetails[customerId].status = customerStatus;
              customerDetails[customerId].lastUpdated = new Date().toLocaleDateString();
            }

            // Update table row
            const tableRows = document.querySelectorAll('#customersTable tbody tr');
            tableRows.forEach(row => {
              if (row.cells[0].textContent.trim() === customerId) {
                row.cells[1].textContent = customerName;
                row.cells[2].textContent = customerEmail;
                row.cells[3].textContent = customerPhone;
                row.cells[5].textContent = new Date().toLocaleDateString();
              }
            });

            // Update details panel if currently shown
            if (detailsPanel.classList.contains('show') && currentCustomerId === customerId) {
              showCustomerDetails(customerId);
            }

            // Hide loading state
            submitBtn.disabled = false;
            spinner.classList.add('d-none');
            
            // Hide modal and show success message
            editCustomerModal.hide();
            
            // Show success toast/alert
            showSuccessAlert('Customer updated successfully!');
            
          }, 1500); // Simulate network delay
        });
      }

      // Delete Customer functionality
      if (deleteCustomerBtn) {
        deleteCustomerBtn.addEventListener('click', function() {
          if (!currentCustomerId) return;

          const customer = customerDetails[currentCustomerId];
          if (!customer) return;

          // Show confirmation dialog
          if (confirm(`Are you sure you want to delete customer "${customer.name}"? This action cannot be undone.`)) {
            // Show loading state
            this.disabled = true;
            this.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Deleting...';

            // Simulate API call with timeout
            setTimeout(() => {
              // Remove from customer data
              delete customerDetails[currentCustomerId];

              // Remove from table
              const tableRows = document.querySelectorAll('#customersTable tbody tr');
              tableRows.forEach(row => {
                if (row.cells[0].textContent.trim() === currentCustomerId) {
                  row.remove();
                }
              });

              // Hide details panel
              hideCustomerDetails();

              // Reset button state
              this.disabled = false;
              this.innerHTML = '<i class="bi bi-trash me-1"></i>Delete';

              // Show success message
              showSuccessAlert('Customer deleted successfully!');

            }, 1500); // Simulate network delay
          }
        });
      }

      // View Orders functionality
      if (viewOrdersBtn) {
        viewOrdersBtn.addEventListener('click', function() {
          if (!currentCustomerId) return;

          const customer = customerDetails[currentCustomerId];
          if (!customer) return;

          // Switch to Purchase History tab
          const purchasesTab = document.getElementById('purchases-tab');
          const purchasesTabPane = document.getElementById('purchases');
          
          // Activate the purchases tab
          document.querySelectorAll('#customerTabs .nav-link').forEach(tab => tab.classList.remove('active'));
          document.querySelectorAll('.tab-pane').forEach(pane => {
            pane.classList.remove('show', 'active');
          });
          
          purchasesTab.classList.add('active');
          purchasesTabPane.classList.add('show', 'active');

          // Simulate loading purchase history
          const purchaseHistory = document.getElementById('purchase-history');
          purchaseHistory.innerHTML = `
            <tr>
              <td colspan="6" class="text-center py-4">
                <div class="spinner-border text-primary" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
                <div class="mt-2">Loading purchase history...</div>
              </td>
            </tr>
          `;

          // Simulate API call to load purchase data
          setTimeout(() => {
            purchaseHistory.innerHTML = `
              <tr>
                <td>#ORD-001</td>
                <td>Nov 10, 2023</td>
                <td>3 items</td>
                <td class="text-success">$450.00</td>
                <td><span class="badge bg-success">Completed</span></td>
                <td>
                  <button class="btn btn-sm btn-outline-primary">View</button>
                </td>
              </tr>
              <tr>
                <td>#ORD-002</td>
                <td>Nov 5, 2023</td>
                <td>1 item</td>
                <td class="text-success">$120.50</td>
                <td><span class="badge bg-success">Completed</span></td>
                <td>
                  <button class="btn btn-sm btn-outline-primary">View</button>
                </td>
              </tr>
              <tr>
                <td>#ORD-003</td>
                <td>Oct 28, 2023</td>
                <td>5 items</td>
                <td class="text-success">$890.00</td>
                <td><span class="badge bg-warning">Pending</span></td>
                <td>
                  <button class="btn btn-sm btn-outline-primary">View</button>
                </td>
              </tr>
            `;
          }, 1000);

          // Show success message
          showSuccessAlert('Switched to purchase history view');
        });
      }

      // Send Email functionality
      if (sendEmailBtn) {
        sendEmailBtn.addEventListener('click', function() {
          if (!currentCustomerId) return;

          const customer = customerDetails[currentCustomerId];
          if (!customer) return;

          // Show loading state
          this.disabled = true;
          this.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Preparing...';

          // Simulate email preparation
          setTimeout(() => {
            // Create mailto link with pre-filled subject and body
            const subject = encodeURIComponent('Hello from Your Store');
            const body = encodeURIComponent(`Dear ${customer.name},\n\nThank you for being a valued customer.\n\nBest regards,\nYour Store Team`);
            const mailtoLink = `mailto:${customer.email}?subject=${subject}&body=${body}`;
            
            // Open email client
            window.location.href = mailtoLink;

            // Reset button state
            this.disabled = false;
            this.innerHTML = '<i class="bi bi-envelope me-1"></i>Send Email';

            // Show success message
            showSuccessAlert('Email client opened successfully');
          }, 1000);
        });
      }

      // Helper function to show success alerts
      function showSuccessAlert(message) {
        // Create alert element
        const alert = document.createElement('div');
        alert.className = 'alert alert-success alert-dismissible fade show position-fixed';
        alert.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
        alert.innerHTML = `
          <i class="bi bi-check-circle me-2"></i>${message}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;

        // Add to page
        document.body.appendChild(alert);

        // Auto-remove after 3 seconds
        setTimeout(() => {
          if (alert.parentNode) {
            alert.parentNode.removeChild(alert);
          }
        }, 3000);
      }

      // Helper function to show error alerts
      function showErrorAlert(message) {
        // Create alert element
        const alert = document.createElement('div');
        alert.className = 'alert alert-danger alert-dismissible fade show position-fixed';
        alert.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
        alert.innerHTML = `
          <i class="bi bi-exclamation-triangle me-2"></i>${message}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;

        // Add to page
        document.body.appendChild(alert);

        // Auto-remove after 4 seconds
        setTimeout(() => {
          if (alert.parentNode) {
            alert.parentNode.removeChild(alert);
          }
        }, 4000);
      }

      // Helper function to update row numbers after deletion
      function updateRowNumbers() {
        const tableRows = document.querySelectorAll('#customersTable tbody tr');
        tableRows.forEach((row, index) => {
          row.cells[0].textContent = index + 1;
          
          // Update data-customer-id attributes for action buttons
          const actionButtons = row.querySelectorAll('.action-buttons button');
          actionButtons.forEach(button => {
            button.setAttribute('data-customer-id', index + 1);
          });
        });
      }

      // Store current customer ID when showing details
      function showCustomerDetails(customerId) {
        currentCustomerId = customerId;
        const customer = customerDetails[customerId];
        
        if (!customer) {
          console.error('Customer not found:', customerId);
          return;
        }
        
        // Update basic info
        document.getElementById('detailCustomerId').textContent = customer.id;
        document.getElementById('detailCustomerName').textContent = customer.name;
        document.getElementById('detailCustomerEmail').textContent = customer.email;
        document.getElementById('detailCustomerPhone').textContent = customer.phone;
        document.getElementById('detailCustomerAddress').textContent = customer.address;
        document.getElementById('detailRegistrationDate').textContent = customer.registrationDate;
        document.getElementById('detailAddedBy').textContent = customer.addedBy;
        document.getElementById('detailLastUpdated').textContent = customer.lastUpdated;
        document.getElementById('detailTotalOrders').textContent = customer.totalOrders;
        document.getElementById('detailTotalSpent').textContent = customer.totalSpent;
        document.getElementById('detailLastPurchase').textContent = customer.lastPurchase;
        
        // Set status with appropriate styling
        const statusElement = document.getElementById('detailCustomerStatus');
        statusElement.innerHTML = `<span class="status-badge status-${customer.status.toLowerCase()}">${customer.status}</span>`;
        
        // Show the backdrop and panel with animation
        panelBackdrop.classList.add('show');
        detailsPanel.classList.add('show');
        
        // Prevent body scroll on mobile
        if (window.innerWidth <= 768) {
          document.body.style.overflow = 'hidden';
        }
      }

      
    });
    </script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../assets/js/dashboard.js"></script>
    <!-- End custom js for this page-->
  </body>
  </html>
  <!-- Ensure Bootstrap JS is loaded for modal functionality -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>
