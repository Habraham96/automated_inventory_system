<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Discount - SalesPilot</title>
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
    <?php include '../layouts/sidebar_styles.php'; ?>
    <!-- endinject -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
    
    <!-- Action Buttons Styling -->
    <style>
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

      /* Row hover effects and click cursor */
      .table tbody tr {
        cursor: pointer;
        transition: all 0.3s ease;
      }
      
      .table tbody tr:hover {
        background-color: rgba(78, 115, 223, 0.08) !important;
        transform: translateX(2px);
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      }
      
      .table tbody tr:hover td {
        border-color: rgba(78, 115, 223, 0.2);
      }

      /* Side Panel Styles */
      .discount-details-panel {
        position: fixed;
        top: 0;
        right: -500px;
        width: 500px;
        height: 100vh;
        background: white;
        box-shadow: -5px 0 20px rgba(0,0,0,0.15);
        z-index: 1055;
        transition: right 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        overflow-y: auto;
      }
      
      .discount-details-panel.show {
        right: 0;
      }
      
      .panel-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        z-index: 1054;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
      }
      
      .panel-backdrop.show {
        opacity: 1;
        visibility: visible;
      }
      
      .panel-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 1.5rem;
        position: sticky;
        top: 0;
        z-index: 10;
      }
      
      .panel-header h4 {
        margin: 0;
        font-weight: 600;
      }
      
      .panel-close {
        background: none;
        border: none;
        color: white;
        font-size: 1.5rem;
        cursor: pointer;
        padding: 0;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: background 0.3s ease;
      }
      
      .panel-close:hover {
        background: rgba(255,255,255,0.2);
      }
      
      .panel-body {
        padding: 2rem;
      }
      
      .detail-section {
        margin-bottom: 2rem;
        padding: 1.5rem;
        background: #f8f9fa;
        border-radius: 10px;
        border-left: 4px solid #667eea;
      }
      
      .detail-section h5 {
        color: #667eea;
        font-weight: 600;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
      }
      
      .detail-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.75rem 0;
        border-bottom: 1px solid #e9ecef;
      }
      
      .detail-row:last-child {
        border-bottom: none;
      }
      
      .detail-label {
        font-weight: 500;
        color: #6c757d;
        min-width: 120px;
      }
      
      .detail-value {
        font-weight: 600;
        color: #2c3e50;
        text-align: right;
        flex: 1;
      }
      
      .status-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 500;
      }
      
      .status-active {
        background: #d4edda;
        color: #155724;
      }
      
      .status-inactive {
        background: #f8d7da;
        color: #721c24;
      }
      
      .value-highlight {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: 600;
      }

      /* Modal z-index and backdrop fixes */
      .modal-backdrop {
        z-index: 1065 !important;
        background-color: rgba(0, 0, 0, 0.7) !important;
      }
      
      #addDiscountModal,
      #editDiscountModal {
        z-index: 1070 !important;
      }
      
      #addDiscountModal .modal-dialog,
      #editDiscountModal .modal-dialog {
        z-index: 1070 !important;
      }
      
      #addDiscountModal .modal-content,
      #editDiscountModal .modal-content {
        background: white !important;
        z-index: 1070 !important;
      }
      
      #addDiscountModal .modal-body,
      #editDiscountModal .modal-body {
        padding: 2rem;
      }
      
      /* Responsive modal sizing */
      @media (max-width: 576px) {
        #addDiscountModal .modal-dialog,
        #editDiscountModal .modal-dialog {
          margin: 0.5rem;
          max-width: calc(100% - 1rem);
        }
        
        #addDiscountModal .modal-body,
        #editDiscountModal .modal-body {
          padding: 1.5rem;
        }
      }
      
      @media (max-width: 768px) {
        .discount-details-panel {
          width: 100%;
          right: -100%;
        }
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
      
      /* Table improvements for action column */
      #discountTable th:last-child,
      #discountTable td:last-child {
        width: 100px;
        text-align: center;
      }
      
      #discountTable tbody tr {
        transition: background-color 0.2s ease;
      }
      
      #discountTable tbody tr:hover {
        background-color: rgba(0,123,255,0.05);
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
    </style>
  </head>
  <body class="with-welcome-text">
    <?php include '../layouts/preloader.php'; ?>
    <div class="container-scroller">
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- Sidebar include -->
        <?php include '../layouts/sidebar_content_pages.php'; ?>
                 
     
       
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Discount content starts here -->
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <h4 class="card-title mb-0">Discounts</h4>
                      <button type="button" class="btn btn-primary" style="min-width: 150px;" data-bs-toggle="modal" data-bs-target="#addDiscountModal"><strong>+ Add Discount</strong></button>
                    </div>
                    <p class="card-description">View and manage discounts.</p>
                    
                    <!-- Search and Filter Options -->
                    <div class="row mb-3">
                      <div class="col-md-4">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search discounts..." id="discountSearchInput">
                          <button class="btn btn-outline-secondary" type="button">
                            <i class="bi bi-search"></i>
                          </button>
                        </div>
                      </div>
                      <div class="col-md-8 d-flex justify-content-end align-items-center gap-2">
                        <!-- Type Filter -->
                        <select class="form-select" id="typeFilter" style="max-width: 140px;">
                          <option value="">All Types</option>
                          <option value="Percentage">Percentage</option>
                          <option value="Fixed Amount">Fixed Amount</option>
                        </select>
                        
                        
                      </div>
                    </div><br>

                    <div class="table-responsive">
                      <table class="table table-striped" id="discountTable">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Customers Group</th>
                            <th>Value</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Over 100k purchase</td>
                            <td>Percentage</td>
                            <td>All Customers</td>
                            <td>3%</td>
                            <td>
                              <div class="action-buttons">
                                <button class="btn btn-sm btn-outline-primary edit-btn" 
                                        data-id="1"
                                        data-name="Over 100k purchase"
                                        data-type="Percentage"
                                        data-customer-group="All Customers"
                                        data-value="3"
                                        title="Edit Discount">
                                  <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger delete-btn" 
                                        data-id="1"
                                        data-name="Over 100k purchase"
                                        title="Delete Discount">
                                  <i class="bi bi-trash"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>First Time Customer</td>
                            <td>Fixed Amount</td>
                            <td>New Customers</td>
                            <td>&#8358; 2,000.00</td>
                            <td>
                              <div class="action-buttons">
                                <button class="btn btn-sm btn-outline-primary edit-btn" 
                                        data-id="2"
                                        data-name="First Time Customer"
                                        data-type="Fixed Amount"
                                        data-customer-group="New Customers"
                                        data-value="2000"
                                        title="Edit Discount">
                                  <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger delete-btn" 
                                        data-id="2"
                                        data-name="First Time Customer"
                                        title="Delete Discount">
                                  <i class="bi bi-trash"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Discount content ends here -->
            <!-- Discount content ends here -->
            
            <!-- Edit Discount Modal -->
            <div class="modal fade" id="editDiscountModal" tabindex="-1" aria-labelledby="editDiscountModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editDiscountModalLabel">Edit Discount</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form id="editDiscountForm">
                    <div class="modal-body">
                      <input type="hidden" id="editDiscountId" name="discount_id">
                      <div class="mb-3">
                        <label for="editDiscountName" class="form-label">Discount Name</label>
                        <input type="text" class="form-control" id="editDiscountName" name="discount_name" required>
                      </div>
                      <div class="mb-3">
                        <label for="editDiscountType" class="form-label">Discount Type</label>
                        <select class="form-select" id="editDiscountType" name="discount_type" required>
                          <option value="">Select type</option>
                          <option value="Percentage">Percentage</option>
                          <option value="Fixed Amount">Fixed Amount</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="editCustomerGroup" class="form-label">Customer Group</label>
                        <select class="form-select" id="editCustomerGroup" name="customer_group" required>
                          <option value="">Select group</option>
                          <option value="All Customers">All Customers</option>
                          <option value="New Customers">New Customers</option>
                          <option value="VIP Customers">VIP Customers</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="editDiscountValue" class="form-label">Value</label>
                        <input type="text" class="form-control" id="editDiscountValue" name="discount_value" required>
                        <div class="form-text">For percentage discounts, enter just the number (e.g., 15 for 15%). For fixed amounts, enter the amount (e.g., 5000 for ₦5,000).</div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary">
                        <span class="spinner-border spinner-border-sm me-2 d-none" id="editDiscountSpinner"></span>
                        Update Discount
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- Discount Details Side Panel -->
          <div class="panel-backdrop" id="panelBackdrop"></div>
          <div class="discount-details-panel" id="discountDetailsPanel">
            <div class="panel-header d-flex justify-content-between align-items-center">
              <h4><i class="bi bi-percent me-2"></i>Discount Details</h4>
              <button class="panel-close" id="closePanelBtn">
                <i class="bi bi-x"></i>
              </button>
            </div>
            <div class="panel-body">
              <div class="detail-section">
                <h5><i class="bi bi-info-circle"></i> Basic Information</h5>
                <div class="detail-row">
                  <span class="detail-label">Discount ID:</span>
                  <span class="detail-value" id="panelDiscountId">#001</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Name:</span>
                  <span class="detail-value" id="panelDiscountName">Holiday Sale</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Type:</span>
                  <span class="detail-value" id="panelDiscountType">Percentage</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Status:</span>
                  <span class="detail-value">
                    <span class="status-badge status-active" id="panelDiscountStatus">Active</span>
                  </span>
                </div>
              </div>

              <div class="detail-section">
                <h5><i class="bi bi-people"></i> Customer Details</h5>
                <div class="detail-row">
                  <span class="detail-label">Customer Group:</span>
                  <span class="detail-value" id="panelCustomerGroup">Premium Members</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Applicable to:</span>
                  <span class="detail-value" id="panelApplicableTo">All Items</span>
                </div>
              </div>

              <div class="detail-section">
                <h5><i class="bi bi-cash-coin"></i> Discount Value</h5>
                <div class="text-center">
                  <div class="value-highlight" id="panelDiscountValue">15%</div>
                </div>
                <div class="detail-row mt-3">
                  <span class="detail-label">Maximum Discount:</span>
                  <span class="detail-value" id="panelMaxDiscount">₦50,000</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Minimum Order:</span>
                  <span class="detail-value" id="panelMinOrder">₦10,000</span>
                </div>
              </div>

              <div class="detail-section">
                <h5><i class="bi bi-calendar"></i> Validity Period</h5>
                <div class="detail-row">
                  <span class="detail-label">Start Date:</span>
                  <span class="detail-value" id="panelStartDate">2024-01-01</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">End Date:</span>
                  <span class="detail-value" id="panelEndDate">2024-12-31</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Days Remaining:</span>
                  <span class="detail-value" id="panelDaysRemaining">45 days</span>
                </div>
              </div>

              <div class="detail-section">
                <h5><i class="bi bi-graph-up"></i> Usage Statistics</h5>
                <div class="detail-row">
                  <span class="detail-label">Times Used:</span>
                  <span class="detail-value" id="panelTimesUsed">156</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Total Savings:</span>
                  <span class="detail-value" id="panelTotalSavings">₦234,500</span>
                </div>
                <div class="detail-row">
                  <span class="detail-label">Last Used:</span>
                  <span class="detail-value" id="panelLastUsed">2024-11-07</span>
                </div>
              </div>

              <div class="detail-section">
                <h5><i class="bi bi-gear"></i> Actions</h5>
                <div class="d-grid gap-2">
                  <button class="btn btn-primary btn-edit-panel">
                    <i class="bi bi-pencil me-2"></i>Edit Discount
                  </button>
                  <button class="btn btn-outline-danger btn-delete-panel">
                    <i class="bi bi-trash me-2"></i>Delete Discount
                  </button>
                </div>
              </div>
            </div>
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
    
    <!-- Add Discount Modal - Placed outside container for proper z-index -->
    <div class="modal fade" id="addDiscountModal" tabindex="-1" aria-labelledby="addDiscountModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addDiscountModalLabel">Add Discount</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="addDiscountForm">
            <div class="modal-body">
              <div class="mb-3">
                <label for="discountName" class="form-label">Discount Name</label>
                <input type="text" class="form-control" id="discountName" name="discountName" required>
              </div>
              <div class="mb-3">
                <label for="discountType" class="form-label">Discount Type</label>
                <select class="form-select" id="discountType" name="discountType" required>
                  <option value="">Select type</option>
                  <option value="percentage">Percentage</option>
                  <option value="fixed">Fixed Amount</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="discountValue" class="form-label">Value</label>
                <input type="number" class="form-control" id="discountValue" name="discountValue" required min="0" step="any">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Save Discount</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    
    <!-- plugins:js -->
  <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  
  <!-- Bootstrap JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/chart.js/chart.umd.js"></script>
    <script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <?php include '../layouts/sidebar_scripts.php'; ?>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/todolist.js"></script>
    
    <!-- Sidebar Menu Collapse Behavior - Ensures only one submenu open at a time, auto-expand CRM menu -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Search and Filter functionality
      const searchInput = document.getElementById('discountSearchInput');
      const typeFilter = document.getElementById('typeFilter');
      const groupFilter = document.getElementById('groupFilter');
      const exportBtn = document.getElementById('exportDiscounts');
      const table = document.getElementById('discountTable');
      const tableBody = table.querySelector('tbody');

      // Apply filters function
      function applyAllFilters() {
        const searchTerm = searchInput.value.toLowerCase();
        const selectedType = typeFilter.value;
        const selectedGroup = groupFilter.value;
        const rows = Array.from(tableBody.querySelectorAll('tr'));

        rows.forEach(row => {
          const discountName = row.cells[1].textContent.toLowerCase();
          const discountType = row.cells[2].textContent.trim();
          const customerGroup = row.cells[3].textContent.trim();
          const value = row.cells[4].textContent.toLowerCase();

          // Search filter
          const matchesSearch = discountName.includes(searchTerm) || 
                               discountType.toLowerCase().includes(searchTerm) || 
                               customerGroup.toLowerCase().includes(searchTerm) ||
                               value.includes(searchTerm);

          // Type filter
          const matchesType = !selectedType || discountType === selectedType;

          // Group filter
          const matchesGroup = !selectedGroup || customerGroup === selectedGroup;

          if (matchesSearch && matchesType && matchesGroup) {
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
      if (typeFilter) {
        typeFilter.addEventListener('change', applyAllFilters);
      }
      if (groupFilter) {
        groupFilter.addEventListener('change', applyAllFilters);
      }

      // Export functionality
      if (exportBtn) {
        exportBtn.addEventListener('click', function() {
          // Show loading state
          this.innerHTML = '<i class="bi bi-arrow-clockwise"></i> Exporting...';
          this.disabled = true;

          // Simulate export process
          setTimeout(() => {
            // Get visible rows for export
            const visibleRows = Array.from(tableBody.querySelectorAll('tr')).filter(row => 
              row.style.display !== 'none'
            );

            // Create CSV content
            let csvContent = 'S/N,Name,Type,Customer Group,Value\n';
            
            visibleRows.forEach(row => {
              const rowData = [
                row.cells[0].textContent.trim(),
                row.cells[1].textContent.trim(),
                row.cells[2].textContent.trim(),
                row.cells[3].textContent.trim(),
                row.cells[4].textContent.trim()
              ];
              csvContent += rowData.map(field => `"${field.replace(/"/g, '""')}"`).join(',') + '\n';
            });

            // Create and download CSV file
            const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
            const link = document.createElement('a');
            const url = URL.createObjectURL(blob);
            link.setAttribute('href', url);
            link.setAttribute('download', `discounts_${new Date().toISOString().split('T')[0]}.csv`);
            link.style.visibility = 'hidden';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);

            // Reset button state
            this.innerHTML = '<i class="bi bi-download"></i> Export';
            this.disabled = false;
          }, 1000);
        });
      }

      // Row click functionality for side-panel
      document.addEventListener('click', function(e) {
        // Check if clicked on a table row (but not on action buttons)
        const row = e.target.closest('tbody tr');
        if (row && !e.target.closest('.action-buttons') && !e.target.closest('.btn')) {
          // Get row data
          const cells = row.querySelectorAll('td');
          const discountId = cells[0].textContent.trim();
          const discountName = cells[1].textContent.trim();
          const discountType = cells[2].textContent.trim();
          const customerGroup = cells[3].textContent.trim();
          const discountValue = cells[4].textContent.trim();
          
          // Populate side panel with row data
          populateDiscountPanel({
            id: discountId,
            name: discountName,
            type: discountType,
            customerGroup: customerGroup,
            value: discountValue
          });
          
          // Show side panel
          showDiscountPanel();
        }
      });

      // Function to populate the discount panel
      function populateDiscountPanel(discount) {
        document.getElementById('panelDiscountId').textContent = `#${discount.id.padStart(3, '0')}`;
        document.getElementById('panelDiscountName').textContent = discount.name;
        document.getElementById('panelDiscountType').textContent = discount.type;
        document.getElementById('panelCustomerGroup').textContent = discount.customerGroup;
        document.getElementById('panelDiscountValue').textContent = discount.value;
        
        // Set status (you can customize this logic)
        const statusElement = document.getElementById('panelDiscountStatus');
        statusElement.textContent = 'Active';
        statusElement.className = 'status-badge status-active';
        
        // Set additional demo data (in a real app, this would come from the database)
        document.getElementById('panelApplicableTo').textContent = 'All Items';
        document.getElementById('panelMaxDiscount').textContent = discount.type.toLowerCase() === 'percentage' ? '₦50,000' : 'No Limit';
        document.getElementById('panelMinOrder').textContent = '₦10,000';
        document.getElementById('panelStartDate').textContent = '2024-01-01';
        document.getElementById('panelEndDate').textContent = '2024-12-31';
        document.getElementById('panelDaysRemaining').textContent = '45 days';
        document.getElementById('panelTimesUsed').textContent = Math.floor(Math.random() * 200) + 50;
        document.getElementById('panelTotalSavings').textContent = `₦${(Math.random() * 500000 + 100000).toLocaleString()}`;
        document.getElementById('panelLastUsed').textContent = '2024-11-07';
      }

      // Function to show the discount panel
      function showDiscountPanel() {
        const panel = document.getElementById('discountDetailsPanel');
        const backdrop = document.getElementById('panelBackdrop');
        
        backdrop.classList.add('show');
        panel.classList.add('show');
        
        // Prevent body scroll
        document.body.style.overflow = 'hidden';
      }

      // Function to hide the discount panel
      function hideDiscountPanel() {
        const panel = document.getElementById('discountDetailsPanel');
        const backdrop = document.getElementById('panelBackdrop');
        
        backdrop.classList.remove('show');
        panel.classList.remove('show');
        
        // Restore body scroll
        document.body.style.overflow = '';
      }

      // Close panel events
      document.getElementById('closePanelBtn').addEventListener('click', hideDiscountPanel);
      document.getElementById('panelBackdrop').addEventListener('click', hideDiscountPanel);

      // Panel action buttons
      document.querySelector('.btn-edit-panel').addEventListener('click', function() {
        const discountId = document.getElementById('panelDiscountId').textContent.replace('#', '').replace(/^0+/, '');
        const editBtn = document.querySelector(`[data-id="${discountId}"]`);
        if (editBtn) {
          editBtn.click();
        }
        hideDiscountPanel();
      });

      document.querySelector('.btn-delete-panel').addEventListener('click', function() {
        const discountId = document.getElementById('panelDiscountId').textContent.replace('#', '').replace(/^0+/, '');
        const deleteBtn = document.querySelector(`[data-id="${discountId}"].delete-btn`);
        if (deleteBtn) {
          hideDiscountPanel();
          setTimeout(() => deleteBtn.click(), 300);
        }
      });

      // Keyboard support
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
          hideDiscountPanel();
        }
      });

      // Edit button functionality
      document.addEventListener('click', function(e) {
        if (e.target.closest('.edit-btn')) {
          const button = e.target.closest('.edit-btn');
          const id = button.getAttribute('data-id');
          const name = button.getAttribute('data-name');
          const type = button.getAttribute('data-type');
          const customerGroup = button.getAttribute('data-customer-group');
          const rawValue = button.getAttribute('data-value');
          
          // Debug logging
          console.log('Edit button clicked:', { id, name, type, customerGroup, rawValue });
          
          // Check if all required data is present
          if (!id || !name || !type || !customerGroup || !rawValue) {
            console.error('Missing data attributes on edit button:', button);
            showNotification('Error: Missing discount data. Please refresh the page.', 'danger');
            return;
          }
          
          // Parse the value properly
          let cleanValue = rawValue;
          if (type.toLowerCase() === 'percentage') {
            // Remove the % symbol if present
            cleanValue = rawValue.replace('%', '');
          } else {
            // Remove currency symbols and commas
            cleanValue = rawValue.replace(/[₦,]/g, '');
          }
          
          // Check if modal elements exist
          const modal = document.getElementById('editDiscountModal');
          if (!modal) {
            console.error('Edit modal not found');
            showNotification('Error: Edit modal not found. Please refresh the page.', 'danger');
            return;
          }
          
          // Populate edit modal
          document.getElementById('editDiscountId').value = id;
          document.getElementById('editDiscountName').value = name;
          document.getElementById('editDiscountType').value = type;
          document.getElementById('editCustomerGroup').value = customerGroup;
          document.getElementById('editDiscountValue').value = cleanValue;
          
          // Show edit modal
          const editModal = new bootstrap.Modal(modal);
          editModal.show();
          
          // Set focus to the first input field
          setTimeout(() => {
            const nameField = document.getElementById('editDiscountName');
            if (nameField) {
              nameField.focus();
            }
          }, 500);
        }
        
        // Delete button functionality
        if (e.target.closest('.delete-btn')) {
          const button = e.target.closest('.delete-btn');
          const id = button.getAttribute('data-id');
          const name = button.getAttribute('data-name');
          
          if (confirm(`Are you sure you want to delete the discount "${name}"? This action cannot be undone.`)) {
            // Add loading state
            button.innerHTML = '<i class="bi bi-hourglass-split"></i>';
            button.disabled = true;
            
            // Here you would typically make an AJAX call to delete the discount
            // For now, we'll simulate the deletion with a timeout
            setTimeout(() => {
              // Remove the row from the table
              const row = button.closest('tr');
              row.style.opacity = '0.5';
              row.style.transition = 'opacity 0.3s ease';
              
              setTimeout(() => {
                row.remove();
                showNotification('Discount deleted successfully!', 'success');
              }, 300);
            }, 1000);
          }
        }
      });
      
      // Edit form submission
      const editForm = document.getElementById('editDiscountForm');
      if (editForm) {
        editForm.addEventListener('submit', function(e) {
          e.preventDefault();
          
          console.log('Edit form submitted');
          
          const submitBtn = this.querySelector('button[type="submit"]');
          const originalText = submitBtn.innerHTML;
        
        // Add loading state
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Updating...';
        submitBtn.disabled = true;
        
        // Simulate form submission
        setTimeout(() => {
          // Get form data using the correct field IDs
          const id = document.getElementById('editDiscountId').value;
          const name = document.getElementById('editDiscountName').value;
          const type = document.getElementById('editDiscountType').value;
          const customerGroup = document.getElementById('editCustomerGroup').value;
          const value = document.getElementById('editDiscountValue').value;
          
          console.log('Form data:', { id, name, type, customerGroup, value });
          
          // Validate required fields
          if (!name || !type || !customerGroup || !value) {
            showNotification('Please fill in all required fields.', 'danger');
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
            return;
          }
          
          // Update the table row
          const row = document.querySelector(`tr .edit-btn[data-id="${id}"]`).closest('tr');
          if (row) {
            const cells = row.querySelectorAll('td');
            
            console.log('Updating row:', row);
            
            // Update row data
            cells[1].textContent = name; // Name column
            cells[2].textContent = type; // Type column
            cells[3].textContent = customerGroup; // Customer Group column
            
            // Format and update value column
            let formattedValue;
            if (type.toLowerCase() === 'percentage') {
              formattedValue = `${value}%`;
            } else {
              // Remove any existing currency symbols and format as currency
              const numericValue = parseFloat(value.toString().replace(/[₦,]/g, ''));
              formattedValue = `₦${numericValue.toLocaleString()}`;
            }
            cells[4].textContent = formattedValue;
            
            // Update button data attributes
            const editBtn = row.querySelector('.edit-btn');
            editBtn.setAttribute('data-name', name);
            editBtn.setAttribute('data-type', type);
            editBtn.setAttribute('data-customer-group', customerGroup);
            editBtn.setAttribute('data-value', value);
            
            const deleteBtn = row.querySelector('.delete-btn');
            deleteBtn.setAttribute('data-name', name);
            
            // Update side panel if it's currently showing this discount
            const panelId = document.getElementById('panelDiscountId').textContent.replace('#', '').replace(/^0+/, '');
            if (panelId === id) {
              populateDiscountPanel({
                id: id,
                name: name,
                type: type,
                customerGroup: customerGroup,
                value: formattedValue
              });
            }
            
            // Close modal and reset form
            bootstrap.Modal.getInstance(document.getElementById('editDiscountModal')).hide();
            this.reset();
            
            // Show success notification
            showNotification('Discount updated successfully!', 'success');
            
            console.log('Update completed successfully');
          } else {
            console.error('Could not find row to update for ID:', id);
            showNotification('Error: Could not find discount to update.', 'danger');
          }
          
          // Reset button state
          submitBtn.innerHTML = originalText;
          submitBtn.disabled = false;
        }, 1500);
      });
      } else {
        console.error('Edit form not found!');
      }

      // Real-time validation for discount value based on type
      const editDiscountType = document.getElementById('editDiscountType');
      const editDiscountValue = document.getElementById('editDiscountValue');
      
      if (editDiscountType) {
        editDiscountType.addEventListener('change', function() {
          const valueField = document.getElementById('editDiscountValue');
          const helpText = valueField ? valueField.nextElementSibling : null;
          
          if (this.value === 'Percentage') {
            valueField.placeholder = 'Enter percentage (e.g., 15)';
            if (helpText) helpText.textContent = 'For percentage discounts, enter just the number (e.g., 15 for 15%).';
            valueField.setAttribute('max', '100');
            valueField.setAttribute('min', '0');
          } else if (this.value === 'Fixed Amount') {
            valueField.placeholder = 'Enter amount (e.g., 5000)';
            if (helpText) helpText.textContent = 'For fixed amounts, enter the amount (e.g., 5000 for ₦5,000).';
            valueField.removeAttribute('max');
            valueField.setAttribute('min', '0');
          } else {
            valueField.placeholder = 'Select discount type first';
            if (helpText) helpText.textContent = 'Please select a discount type first.';
          }
        });
      }

      // Validate discount value on input
      if (editDiscountValue) {
        editDiscountValue.addEventListener('input', function() {
          const discountType = document.getElementById('editDiscountType').value;
          const value = parseFloat(this.value);
          
          // Remove any previous validation styling
          this.classList.remove('is-invalid', 'is-valid');
          
          if (this.value === '') return;
          
          if (isNaN(value) || value < 0) {
            this.classList.add('is-invalid');
            return;
          }
          
          if (discountType === 'Percentage' && value > 100) {
            this.classList.add('is-invalid');
            return;
          }
          
          this.classList.add('is-valid');
        });
      }
      
      // Notification function
      function showNotification(message, type = 'success') {
        const notification = document.createElement('div');
        notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
        notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
        notification.innerHTML = `
          ${message}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        document.body.appendChild(notification);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
          if (notification.parentNode) {
            notification.remove();
          }
        }, 5000);
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
