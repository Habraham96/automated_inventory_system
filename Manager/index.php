<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SalesPilot - Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <!-- Include Sidebar Styles -->
    <?php include 'layouts/sidebar_styles.php'; ?>
    <style>
    /* Main panel positioning to avoid sidebar overlap (match completed_sales.php) */
    .main-panel {
      margin-left: 280px !important;
      transition: margin-left 0.2s ease !important;
      will-change: margin-left !important;
      backface-visibility: hidden !important;
      transform: translateZ(0) !important;
    }
    body.sidebar-collapsed .main-panel {
      margin-left: 70px !important;
    }
    .content-wrapper {
      background: #f4f5f7;
      padding: 2rem;
      min-height: calc(100vh - 70px);
      position: relative !important;
      transform: translateZ(0) !important;
    }
    /* Sidebar menu arrow spacing (match completed_sales.php) */
    .menu-arrow {
      margin-left: auto !important;
      margin-right: 0.5rem !important;
      font-size: 1rem !important;
    }
    /* Sidebar nav item spacing (match completed_sales.php) */
    .sidebar .nav-item {
      margin-bottom: 0.25rem !important;
    }
    
    /* Modal styles for better visibility */
    .modal-backdrop {
      background-color: rgba(0, 0, 0, 0.7) !important;
      z-index: 1050 !important;
    }
    .modal {
      z-index: 1055 !important;
    }
    .modal-content {
      border-radius: 15px !important;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4) !important;
      border: none !important;
      overflow: hidden !important;
    }
    .modal-header {
      border-bottom: none !important;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
      color: white !important;
      padding: 1.5rem 2rem !important;
    }
    .modal-footer {
      border-top: 1px solid #dee2e6 !important;
      background-color: #f8f9fa !important;
      padding: 1.5rem 2rem !important;
    }
    .modal-body {
      padding: 2rem !important;
      background-color: #ffffff !important;
    }
    
    /* Item option styling */
    .item-option {
      transition: all 0.3s ease !important;
      cursor: pointer !important;
      border: 2px solid transparent !important;
      margin-bottom: 0.75rem !important;
      border-radius: 10px !important;
    }
    .item-option:hover {
      background-color: #f8f9fa !important;
      transform: translateX(5px) !important;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1) !important;
    }
    .item-option.active {
      background-color: #e3f2fd !important;
      box-shadow: 0 3px 15px rgba(0,123,255,0.2) !important;
    }
    .item-option.active[data-type="standard"] {
      border-color: #007bff !important;
      background-color: #e3f2fd !important;
    }
    .item-option.active[data-type="variant"] {
      border-color: #28a745 !important;
      background-color: #d4edda !important;
    }
    .item-option.active[data-type="bundled"] {
      border-color: #ffc107 !important;
      background-color: #fff3cd !important;
    }
    
    /* Item details animation */
    .item-details {
      opacity: 0 !important;
      transition: opacity 0.3s ease !important;
      display: none !important;
    }
    .item-details.active {
      opacity: 1 !important;
      display: block !important;
    }
    
    /* Modal buttons */
    .modal .btn {
      border-radius: 8px !important;
      font-weight: 500 !important;
      transition: all 0.3s ease !important;
    }
    .modal .btn:hover {
      transform: translateY(-1px) !important;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15) !important;
    }
    .sidebar .nav-link {
      padding: 0.75rem 1.25rem 0.75rem 1.5rem !important;
      display: flex !important;
      align-items: center !important;
      gap: 0.75rem !important;
    }
    /* Dashboard cards */
    .dashboard-card {
      background: white;
      border-radius: 8px;
      box-shadow: 0 0 15px rgba(0,0,0,0.08);
      padding: 1rem;
      margin-bottom: 1rem;
      transition: transform 0.2s ease;
    }
    .dashboard-card:hover {
      transform: translateY(-2px);
    }
    .stat-card {
      text-align: center;
      padding: 1.25rem 0.75rem;
    }
    .stat-icon {
      font-size: 2.2rem;
      margin-bottom: 0.75rem;
      color: #007bff;
    }
    .stat-number {
      font-size: 1.8rem;
      font-weight: bold;
      color: #2c3e50;
      margin-bottom: 0.25rem;
    }
    .stat-label {
      color: #6c757d;
      font-size: 0.8rem;
      text-transform: uppercase;
      letter-spacing: 1px;
    }
    /* Quick action buttons */
    .quick-action-btn {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border: none;
      color: white;
      padding: 1rem 1.5rem;
      border-radius: 8px;
      text-decoration: none;
      display: block;
      text-align: center;
      transition: all 0.3s ease;
      margin-bottom: 1rem;
    }
    .quick-action-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
      color: white;
    }
    /* Welcome section */
    .welcome-section {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      padding: 3rem 2rem;
      border-radius: 10px;
      text-align: center;
      margin-bottom: 2rem;
    }
    .welcome-title {
      font-size: 2.5rem;
      margin-bottom: 1rem;
      font-weight: 300;
    }
    .welcome-subtitle {
      font-size: 1.1rem;
      opacity: 0.9;
    }
    </style>
    <!-- endinject -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body class="with-welcome-text">
    
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
<<<<<<< HEAD
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <i class="menu-icon bi bi-house-door-fill"></i>
                <span class="menu-title">Home</span>
              </a>
            </li>
            <li class="nav-item nav-category">Dropdown</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <!-- <i class="menu-icon mdi mdi-floor-plan"></i> -->
                <i class="menu-icon bi bi-wallet-fill"></i>
                <span class="menu-title">Sales</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/completed_sales.html">Completed Sales</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/saved_carts.html">Saved Carts</a></li>
                  <!-- <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li> -->
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Reports</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="pages/sales_summary.html">Sales Summary</a></li>
                  <li class="nav-item"><a class="nav-link" href="pages/sales_by_staff.html">Sales by Staff</a></li>
                  <li class="nav-item"><a class="nav-link" href="pages/sales_by_item.html">Sales by Item</a></li>
                  <li class="nav-item"><a class="nav-link" href="pages/sales_by_category.html">Sales by Category</a></li>
                  <li class="nav-item"><a class="nav-link" href="pages/inventory_valuation.html">Inventory Valuation</a></li>
                  <li class="nav-item"><a class="nav-link" href="pages/taxes.html">Taxes</a></li>
                  <li class="nav-item"><a class="nav-link" href="pages/discount.html">Discount</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/customers.html">
                <i class="menu-icon bi bi-people-fill"></i>
                <span class="menu-title">Customers</span>
              </a>
              
             <li class="nav-item">
              <a class="nav-link" href="pages/staffs.html">
                <i class="menu-icon bi bi-person-workspace"></i>
                <span class="menu-title">Staffs</span>
              </a>

              <li class="nav-item">
              <a class="nav-link" href="pages/activity_logs.html">
                <i class="menu-icon bi bi-activity"></i>
                <span class="menu-title">Activity Logs</span>
              </a>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
               <i class="menu-icon bi bi-shop-window"></i>
                <span class="menu-title">Inventory</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/all_items.html">All items</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/categories.html">Categories</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/stock_history.html">Stock History</a></li>
                </ul>
              </div>
            
            <li class="nav-item">
              <a class="nav-link" href="pages/suppliers.html">
                <i class="menu-icon bi bi-truck"></i>
                <span class="menu-title">Suppliers</span>
              </a>
              <li class="nav-item">
              <a class="nav-link" href="pages/settings.html">
               <i class="menu-icon bi bi-gear-wide"></i>
                <span class="menu-title">Settings</span>
              </a>
            </li>
              <li class="nav-item dropdown d-none d-lg-block user-dropdown">
              <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="assets/images/faces/face8.jpg" alt="Profile image"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="assets/images/faces/face8.jpg" alt="Profile image">
                  <p class="mb-1 mt-3 fw-semibold">Allen Moreno</p>
                  <p class="fw-light text-muted mb-0">allenmoreno@gmail.com</p>
                </div>
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages</a>
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activity</a>
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a>
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
              </div>
            </li>
            
                <!-- <i class="menu-icon mdi mdi-file-document"></i>
                <span class="menu-title">Documentation</span> -->
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
=======
        <!-- Include Sidebar Content -->
        <?php include 'layouts/sidebar_content.php'; ?>
        
        <!-- Main Dashboard Content Area -->
>>>>>>> temporary
        <div class="main-panel">
          <div class="content-wrapper">
            
            <!-- Welcome Section -->
            <div class="welcome-section">
              <h1 class="welcome-title">Welcome to SalesPilot</h1>
              <p class="welcome-subtitle">Your comprehensive inventory management solution</p>
            </div>

           
            <!-- Dashboard Stats Row -->
             <div class="d-flex align-items-center justify-content-end gap-3 flex-wrap mb-3">
                <div class="btn-group btn-group-sm" role="group" aria-label="Quick time filters">
                  <button type="button" class="btn btn-outline-primary timeframe-btn active" data-range="today">Today</button>
                  <button type="button" class="btn btn-outline-primary timeframe-btn" data-range="week">This Week</button>
                  <button type="button" class="btn btn-outline-primary timeframe-btn" data-range="month">This Month</button>
                   <button type="button" class="btn btn-outline-primary timeframe-btn" data-range="year">This Year</button>
                </div>
                <div class="d-flex align-items-center gap-1" style="font-size: 0.875rem;">
                  <span class="text-muted">From:</span>
                  <input type="text" class="form-control form-control-sm date-picker" id="startDate" placeholder="DD/MM/YYYY" style="width: 110px;">
                  <span class="text-muted">To:</span>
                  <input type="text" class="form-control form-control-sm date-picker" id="endDate" placeholder="DD/MM/YYYY" style="width: 110px;">
                  <button class="btn btn-sm btn-primary" type="button" id="applyCustomRange" title="Apply date range">
                    <i class="bi bi-search"></i> Go
                  </button>

                </div>

              </div>
            <div class="row">
              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="dashboard-card stat-card">
                  <div class="stat-icon">
                    <i class="bi bi-box-seam-fill"></i>
                  </div>
                  <div class="stat-number">2,567</div>
                  <div class="stat-label">Items Sold</div>
                </div>
              </div>
              
              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="dashboard-card stat-card">
                  <div class="stat-icon">
                    <i class="bi bi-receipt"></i>
                  </div>
                  <div class="stat-number">1,234</div>
                  <div class="stat-label">Number of Sales</div>
                </div>
              </div>
              
              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="dashboard-card stat-card">
                  <div class="stat-icon">
                    <i class="bi bi-cash-stack"></i>
                  </div>
                  <div class="stat-number">$85,420</div>
                  <div class="stat-label">Gross Sales</div>
                </div>
              </div>
              
              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="dashboard-card stat-card">
                  <div class="stat-icon">
                    <i class="bi bi-graph-up-arrow"></i>
                  </div>
                  <div class="stat-number">$34,168</div>
                  <div class="stat-label">Gross Profit</div>
                </div>
              </div>
            </div>
            
            <!-- Quick Actions and Recent Activity Row -->
            <div class="row">
              <div class="col-lg-2">
                <div class="dashboard-card">
                  <h5 class="mb-3">Quick Actions</h5>
                  <button type="button" class="quick-action-btn" id="addItemQuickAction" style="border: none; width: 100%; text-align: center;">
                    <i class="bi bi-box me-2"></i>Add Item
                  </button>
                  <a href="#" class="quick-action-btn">
                    <i class="bi bi-plus-circle me-2"></i>New Sale
                  </a>
                   <a href="views/staffs.php" class="quick-action-btn">
                    <i class="bi bi-person-plus me-2"></i>Add New Staff
                  </a>
                  <a href="views/sales_summary.php" class="quick-action-btn">
                    <i class="bi bi-graph-up me-2"></i>View Reports
                  </a>
                </div>
              </div>
              <div class="col-lg-10">
                <div class="dashboard-card">
                  <h5 class="mb-3">Recent Sales Activity</h5>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Sale ID</th>
                          <th>Customer</th>
                          <th>Amount</th>
                          <th>Date</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>#001</td>
                          <td>John Doe</td>
                          <td>$125.50</td>
                          <td>Today</td>
                          <td><span class="badge bg-success">Completed</span></td>
                        </tr>
                        <tr>
                          <td>#002</td>
                          <td>Jane Smith</td>
                          <td>$89.99</td>
                          <td>Yesterday</td>
                          <td><span class="badge bg-success">Completed</span></td>
                        </tr>
                        <tr>
                          <td>#003</td>
                          <td>Mike Johnson</td>
                          <td>$234.75</td>
                          <td>2 days ago</td>
                          <td><span class="badge bg-warning">Pending</span></td>
                        </tr>
                        <tr>
                          <td>#004</td>
                          <td>Sarah Wilson</td>
                          <td>$56.20</td>
                          <td>3 days ago</td>
                          <td><span class="badge bg-success">Completed</span></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Charts Row -->
            <div class="row">
              <div class="col-lg-6">
                <div class="dashboard-card">
                  <h5 class="mb-3">Sales Overview</h5>
                  <div style="height: 300px; background: #f8f9fa; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #6c757d;">
                    <div class="text-center">
                      <i class="bi bi-bar-chart" style="font-size: 3rem; margin-bottom: 1rem;"></i>
                      <p>Sales Chart Placeholder</p>
                      <small>Integrate with Chart.js or similar</small>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-6">
                <div class="dashboard-card">
                  <h5 class="mb-3">Top Products</h5>
                  <div style="height: 300px; background: #f8f9fa; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #6c757d;">
                    <div class="text-center">
                      <i class="bi bi-pie-chart" style="font-size: 3rem; margin-bottom: 1rem;"></i>
                      <p>Product Chart Placeholder</p>
                      <small>Integrate with Chart.js or similar</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          
          <!-- Footer -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
             
              <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">
                Copyright © 2025. All rights reserved.
              </span>
            </div>
          </footer>
        </div>
      </div>
    </div>

    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <!-- <script src="assets/js/off-canvas.js"></script> Commented out to avoid conflicts -->
  <script src="assets/js/template.js"></script>
    <!-- <script src="assets/js/hoverable-collapse.js"></script> Commented out to avoid conflicts -->
    <!-- endinject -->

    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Include Sidebar Scripts -->
    <?php include 'layouts/sidebar_scripts.php'; ?>

    <!-- Minimal Bootstrap Collapse Test Script and Add Item Modal Fallback -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Only one submenu open at a time, expand/collapse on one click
      document.querySelectorAll('.sidebar .nav-link[data-bs-toggle="collapse"]').forEach(function(link) {
        link.addEventListener('click', function(e) {
          e.preventDefault();
          var targetSelector = this.getAttribute('href');
          var target = document.querySelector(targetSelector);
          if (!target) return;
          // Collapse all other open submenus
          document.querySelectorAll('.sidebar .collapse.show').forEach(function(openMenu) {
            if (openMenu !== target) {
              var openCollapse = bootstrap.Collapse.getOrCreateInstance(openMenu);
              openCollapse.hide();
            }
          });
          // Toggle the clicked submenu
          var bsCollapse = bootstrap.Collapse.getOrCreateInstance(target);
          bsCollapse.toggle();
        });
      });

      // Add Item Quick Action fallback handler
      var addItemBtn = document.getElementById('addItemQuickAction');
      if (addItemBtn) {
        console.log('Add Item button found, attaching event listener');
        addItemBtn.addEventListener('click', function(e) {
          e.preventDefault();
          e.stopPropagation();
          
          console.log('Add Item button clicked');
          
          var modal = document.getElementById('itemTypeModal');
          if (modal) {
            try {
              // Check if Bootstrap is loaded
              if (typeof bootstrap === 'undefined') {
                console.error('Bootstrap JS is not loaded!');
                alert('Bootstrap JavaScript is required for modals. Please refresh the page.');
                return;
              }
              
              var bsModal = bootstrap.Modal.getOrCreateInstance(modal);
              bsModal.show();
              console.log('Modal should be showing now');
            } catch (error) {
              console.error('Error showing modal:', error);
              alert('Error opening modal: ' + error.message);
            }
          } else {
            console.error('Modal element not found!');
            alert('Modal not found on page!');
          }
        });
      } else {
        console.error('Add Item button not found!');
      }
    });
    </script>
    
    <!-- Dashboard Time Filter JavaScript -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all timeframe buttons
        const timeframeButtons = document.querySelectorAll('.timeframe-btn');
        
        // Add click event listener to each button
        timeframeButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                timeframeButtons.forEach(btn => {
                    btn.classList.remove('active');
                    btn.classList.add('btn-outline-primary');
                    btn.classList.remove('btn-primary');
                });
                
                // Add active class to clicked button
                this.classList.add('active');
                this.classList.remove('btn-outline-primary');
                this.classList.add('btn-primary');
                
                // Get the selected time range
                const selectedRange = this.getAttribute('data-range');
                console.log('Selected time range:', selectedRange);
                
                // Here you can add functionality to update the dashboard data
                // based on the selected time range
                updateDashboardData(selectedRange);
            });
        });
        
        // Function to update dashboard data (placeholder)
        function updateDashboardData(range) {
            // This is where you would typically make an AJAX call
            // to fetch new data based on the selected time range
            
            // For now, just show a loading indicator or update UI
            console.log('Updating dashboard for range:', range);
            
            // Example: You could update the stat numbers here
            // updateStatCards(range);
        }
        
        // Optional: Function to update stat cards with new data
        function updateStatCards(range) {
            // Example implementation - you would replace with actual data
            const statNumbers = document.querySelectorAll('.stat-number');
            
            // Simulate loading state
            statNumbers.forEach(stat => {
                stat.style.opacity = '0.5';
            });
            
            // Simulate data update after a short delay
            setTimeout(() => {
                statNumbers.forEach(stat => {
                    stat.style.opacity = '1';
                });
            }, 300);
        }
    });
    
    // Function to show item details when clicking on options
    function showItemDetails(type) {
        console.log('Showing details for type:', type);
        
        // Remove active class from all options and reset their styles
        document.querySelectorAll('.item-option').forEach(option => {
            option.classList.remove('active');
            option.style.border = '2px solid transparent';
            option.style.backgroundColor = '';
        });
        
        // Add active class to clicked option and apply active styling
        const selectedOption = document.querySelector(`[data-type="${type}"]`);
        if (selectedOption) {
            selectedOption.classList.add('active');
            
            // Apply type-specific active styling
            switch(type) {
                case 'standard':
                    selectedOption.style.border = '2px solid #007bff';
                    selectedOption.style.backgroundColor = '#e3f2fd';
                    break;
                case 'variant':
                    selectedOption.style.border = '2px solid #28a745';
                    selectedOption.style.backgroundColor = '#d4edda';
                    break;
                case 'bundled':
                    selectedOption.style.border = '2px solid #ffc107';
                    selectedOption.style.backgroundColor = '#fff3cd';
                    break;
            }
        }
        
        // Hide all detail sections
        document.querySelectorAll('.item-details').forEach(detail => {
            detail.style.display = 'none';
            detail.style.opacity = '0';
            detail.classList.remove('active');
        });
        
        // Show selected detail section with animation
        const selectedDetail = document.getElementById(`${type}-details`);
        if (selectedDetail) {
            selectedDetail.style.display = 'block';
            selectedDetail.classList.add('active');
            
            // Use setTimeout to ensure display:block is applied before opacity change
            setTimeout(() => {
                selectedDetail.style.opacity = '1';
            }, 10);
        }
    }

    // Function to handle item type selection
    function selectItemType(type) {
        console.log('Selecting item type:', type);
        
        // Close the modal first
        const modalElement = document.getElementById('itemTypeModal');
        if (modalElement) {
            try {
                const modal = bootstrap.Modal.getInstance(modalElement);
                if (modal) {
                    modal.hide();
                } else {
                    console.warn('Modal instance not found, creating new one to hide');
                    const newModal = bootstrap.Modal.getOrCreateInstance(modalElement);
                    newModal.hide();
                }
            } catch (error) {
                console.error('Error closing modal:', error);
            }
        }
        
        // Small delay to ensure modal closes before redirect
        setTimeout(() => {
            // Redirect based on the selected item type
            switch(type) {
                case 'standard':
                    console.log('Redirecting to standard item page');
                    window.location.href = 'views/add_item_standard.php';
                    break;
                case 'variant':
                    console.log('Redirecting to variant item page');
                    window.location.href = 'views/add_item_variant.php';
                    break;
                case 'bundled':
                    console.log('Redirecting to bundled item page');
                    window.location.href = 'views/add_item_bundled.php';
                    break;
                default:
                    console.error('Unknown item type:', type);
                    alert('Unknown item type: ' + type);
            }
        }, 200);
    }
    
    // Function to handle Continue button click
    function proceedWithItemType() {
        // Get the currently selected item type
        const activeOption = document.querySelector('.item-option.active');
        if (activeOption) {
            const selectedType = activeOption.getAttribute('data-type');
            console.log('Proceeding with item type:', selectedType);
            selectItemType(selectedType);
        } else {
            console.warn('No item type selected');
            alert('Please select an item type first.');
        }
    }
    </script>

    <!-- Modal for selecting item type - Properly positioned at body level -->
    <div class="modal fade" id="itemTypeModal" tabindex="-1" aria-labelledby="itemTypeModalLabel" aria-hidden="true" style="z-index: 1055;">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="border: none; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);">
          <div class="modal-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border-bottom: none;">
            <h5 class="modal-title" id="itemTypeModalLabel" style="font-weight: 600;">
              <i class="bi bi-box-seam me-2"></i>Select Item Type
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" style="min-height: 400px; padding: 2rem;">
            <div class="row">
              <!-- Left Column - Item Type Options -->
              <div class="col-md-4">
                <div class="list-group">
                  <button type="button" class="list-group-item list-group-item-action d-flex align-items-center p-3 item-option active" 
                          data-type="standard" onclick="showItemDetails('standard')" style="border: 2px solid #007bff; background-color: #e3f2fd;">
                    <i class="bi bi-box-seam text-primary me-3" style="font-size: 1.5rem;"></i>
                    <div>
                      <h6 class="mb-0 text-primary">Standard Item</h6>
                      <small class="text-muted">Simple single product</small>
                    </div>
                  </button>
                  
                  <button type="button" class="list-group-item list-group-item-action d-flex align-items-center p-3 item-option" 
                          data-type="variant" onclick="showItemDetails('variant')" style="border: 2px solid transparent;">
                    <i class="bi bi-grid-3x3 text-success me-3" style="font-size: 1.5rem;"></i>
                    <div>
                      <h6 class="mb-0 text-success">Variant Item</h6>
                      <small class="text-muted">Multiple variations</small>
                    </div>
                  </button>
                  
                  <button type="button" class="list-group-item list-group-item-action d-flex align-items-center p-3 item-option" 
                          data-type="bundled" onclick="showItemDetails('bundled')" style="border: 2px solid transparent;">
                    <i class="bi bi-collection text-warning me-3" style="font-size: 1.5rem;"></i>
                    <div>
                      <h6 class="mb-0 text-warning">Bundled Item</h6>
                      <small class="text-muted">Package of products</small>
                    </div>
                  </button>
                </div>
              </div>
              
              <!-- Right Column - Item Details -->
              <div class="col-md-8">
                <div class="item-details-container">
                  <!-- Standard Item Details -->
                  <div id="standard-details" class="item-details active" style="display: block; opacity: 1;">
                    <div class="d-flex align-items-start mb-3">
                      <i class="bi bi-box-seam text-primary me-3" style="font-size: 3rem;"></i>
                      <div>
                        <h4 class="text-primary mb-2">
                          <i class="bi bi-check-circle-fill me-1"></i> Standard Item
                        </h4>
                        <p class="text-dark mb-3">
                          A simple product with a single SKU, tracked individually with its own price and stock quantity.
                        </p>
                      </div>
                    </div>
                    
                    <div class="mb-3">
                      <h6><strong>Best for:</strong></h6>
                      <ul class="text-muted mb-3">
                        <li>Products without variations (no size, color, or model options)</li>
                        <li>Individual items with unique barcodes</li>
                        <li>Simple inventory tracking</li>
                      </ul>
                    </div>
                    
                    <div class="mb-4">
                      <h6><strong>Examples:</strong></h6>
                      <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-primary-subtle text-primary border">Laptop Model XYZ</span>
                        <span class="badge bg-primary-subtle text-primary border">Office Chair</span>
                        <span class="badge bg-primary-subtle text-primary border">USB Cable 2m</span>
                        <span class="badge bg-primary-subtle text-primary border">Water Bottle</span>
                        <span class="badge bg-primary-subtle text-primary border">Notebook A4</span>
                      </div>
                    </div>
                    
                    <button class="btn btn-primary" onclick="selectItemType('standard')" style="padding: 0.75rem 1.5rem;">
                      <i class="bi bi-plus-circle me-1"></i> Create Standard Item
                    </button>
                  </div>
                  
                  <!-- Variant Item Details -->
                  <div id="variant-details" class="item-details" style="display: none; opacity: 0;">
                    <div class="d-flex align-items-start mb-3">
                      <i class="bi bi-grid-3x3 text-success me-3" style="font-size: 3rem;"></i>
                      <div>
                        <h4 class="text-success mb-2">
                          <i class="bi bi-grid-fill me-1"></i> Variant Item
                        </h4>
                        <p class="text-dark mb-3">
                          A product available in multiple variations (e.g., different sizes, colors, or styles). Each variant has its own SKU, price, and stock level.
                        </p>
                      </div>
                    </div>
                    
                    <div class="mb-3">
                      <h6><strong>Best for:</strong></h6>
                      <ul class="text-muted mb-3">
                        <li>Products with multiple size options (S, M, L, XL)</li>
                        <li>Items available in different colors or patterns</li>
                        <li>Products with different specifications or models</li>
                        <li>Tracking inventory per variant combination</li>
                      </ul>
                    </div>
                    
                    <div class="mb-4">
                      <h6><strong>Examples:</strong></h6>
                      <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-success-subtle text-success border">T-Shirt (Red/Blue/Green, S/M/L/XL)</span>
                        <span class="badge bg-success-subtle text-success border">Shoes (Size 6-12, Black/White)</span>
                        <span class="badge bg-success-subtle text-success border">Phone Case (iPhone/Samsung, Colors)</span>
                        <span class="badge bg-success-subtle text-success border">Jeans (Size 28-38, Regular/Slim)</span>
                      </div>
                    </div>
                    
                    <button class="btn btn-success" onclick="selectItemType('variant')" style="padding: 0.75rem 1.5rem;">
                      <i class="bi bi-plus-circle me-1"></i> Create Variant Item
                    </button>
                  </div>
                  
                  <!-- Bundled Item Details -->
                  <div id="bundled-details" class="item-details" style="display: none; opacity: 0;">
                    <div class="d-flex align-items-start mb-3">
                      <i class="bi bi-collection text-warning me-3" style="font-size: 3rem;"></i>
                      <div>
                        <h4 class="text-warning mb-2">
                          <i class="bi bi-box2-fill me-1"></i> Bundled Item
                        </h4>
                        <p class="text-dark mb-3">
                          A package or combo containing multiple existing products sold together as one unit. Selling a bundle automatically deducts stock from all included items.
                        </p>
                      </div>
                    </div>
                    
                    <div class="mb-3">
                      <h6><strong>Best for:</strong></h6>
                      <ul class="text-muted mb-3">
                        <li>Product packages or gift sets</li>
                        <li>Promotional combos and special offers</li>
                        <li>Starter kits or complete sets</li>
                        <li>Value packs with multiple related items</li>
                      </ul>
                    </div>
                    
                    <div class="mb-4">
                      <h6><strong>Examples:</strong></h6>
                      <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-warning-subtle text-warning border">Office Starter Kit (Pen + Notepad + Stapler)</span>
                        <span class="badge bg-warning-subtle text-warning border">Gaming Bundle (Mouse + Keyboard + Headset)</span>
                        <span class="badge bg-warning-subtle text-warning border">Skincare Set (Cleanser + Toner + Moisturizer)</span>
                        <span class="badge bg-warning-subtle text-warning border">Back to School Pack</span>
                      </div>
                    </div>
                    
                    <button class="btn btn-warning text-dark" onclick="selectItemType('bundled')" style="padding: 0.75rem 1.5rem;">
                      <i class="bi bi-plus-circle me-1"></i> Create Bundled Item
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer" style="border-top: 1px solid #dee2e6; background-color: #f8f9fa; padding: 1.5rem;">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="padding: 0.75rem 1.5rem;">Cancel</button>
            <button type="button" class="btn btn-primary" onclick="proceedWithItemType()" style="padding: 0.75rem 1.5rem;">
              <i class="bi bi-arrow-right me-1"></i>Continue
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- end of item type selection modal -->

  </body>
</html>
