<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Carts - SalesPilot</title>
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
    
    <!-- Modern Filter Styles -->
    <style>
      .date-filter-wrapper {
        position: relative;
        display: inline-block;
      }
      
      .custom-date-container {
        position: absolute;
        top: 100%;
        right: 0;
        z-index: 1050;
        background: #ffffff;
        border: 2px solid #007bff;
        border-radius: 12px;
        padding: 16px;
        box-shadow: 0 8px 25px rgba(0, 123, 255, 0.2);
        min-width: 380px;
        opacity: 0;
        transform: translateY(-10px) scale(0.95);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        pointer-events: none;
        display: none;
      }
      
      #customDateInputs.show {
        opacity: 1;
        transform: translateY(0) scale(1);
        pointer-events: all;
        display: block;
      }
      
      #customDateInputs::before {
        content: '';
        position: absolute;
        top: -8px;
        right: 20px;
        width: 0;
        height: 0;
        border-left: 8px solid transparent;
        border-right: 8px solid transparent;
        border-bottom: 8px solid #007bff;
      }
      
      #customDateInputs::after {
        content: '';
        position: absolute;
        top: -6px;
        right: 21px;
        width: 0;
        height: 0;
        border-left: 7px solid transparent;
        border-right: 7px solid transparent;
        border-bottom: 7px solid #ffffff;
      }
      
      .filter-container .form-select,
      .filter-container .btn {
        min-height: 38px;
      }
      
      @media (max-width: 768px) {
        #customDateInputs {
          padding: 16px 18px;
          border-radius: 12px;
          min-width: 340px;
          margin-top: 6px;
        }
        
        .filter-container .col-md-8 {
          flex-direction: column;
          gap: 10px !important;
          align-items: stretch !important;
        }
        
        .filter-container .d-flex {
          flex-wrap: wrap;
        }
      }
      
      /* Action Icons Styling */
      .delete-cart {
        text-decoration: none;
        transition: all 0.3s ease;
        opacity: 0.7;
        display: inline-block;
      }
      
      .delete-cart:hover {
        opacity: 1;
        transform: scale(1.2);
        color: #dc3545 !important;
      }
      
      .action-feedback {
        opacity: 1 !important;
        transform: scale(1.3) !important;
        transition: all 0.5s ease !important;
      }
      
      /* Actions Column Centering */
      #savedCartsTable th:last-child,
      #savedCartsTable td:last-child {
        text-align: center !important;
        vertical-align: middle !important;
      }
      
      #savedCartsTable td.text-center {
        padding: 12px 8px;
        vertical-align: middle;
      }
      
      /* Clickable Row Styling */
      #savedCartsTable tbody tr {
        cursor: pointer;
        transition: all 0.3s ease;
      }
      
      #savedCartsTable tbody tr:hover {
        background-color: #f8f9fa;
        transform: translateX(2px);
        box-shadow: 0 2px 8px rgba(0, 123, 255, 0.1);
      }
      
      #savedCartsTable tbody tr.row-selected {
        background-color: #e3f2fd;
        border-left: 4px solid #007bff;
      }
      
      /* Side Panel Styling - Exact completed_sales.php format */
      .details-panel {
        position: fixed;
        top: 0;
        right: -400px;
        width: 400px;
        height: 100vh;
        background: white;
        box-shadow: -2px 0 10px rgba(0,0,0,0.1);
        transition: right 0.3s ease;
        z-index: 1050;
        overflow-y: auto;
      }
      
      .details-panel.open {
        right: 0;
      }
      
      .details-panel-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        z-index: 1040;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
      }
      
      .details-panel-backdrop.show {
        opacity: 1;
        visibility: visible;
      }
      
      .details-panel-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 1.5rem;
        border-bottom: 1px solid #e9ecef;
      }
      
      .details-panel-body {
        padding: 1.5rem;
      }
      
      .detail-item {
        margin-bottom: 1rem;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 8px;
        border-left: 4px solid #667eea;
      }
      
      .detail-label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 0.5rem;
      }
      
      .detail-value {
        color: #6c757d;
        font-size: 0.95rem;
      }
      
      .items-list {
        max-height: 300px;
        overflow-y: auto;
      }
      
      .item-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.75rem;
        border-bottom: 1px solid #e9ecef;
      }
      
      .item-row:last-child {
        border-bottom: none;
      }
      
      .cart-items-section {
        margin-bottom: 30px;
      }
      
      .section-title {
        color: #495057;
        font-weight: 600;
        margin-bottom: 15px;
        padding-bottom: 8px;
        border-bottom: 2px solid #667eea;
      }
      
      .items-list {
        max-height: 300px;
        overflow-y: auto;
      }
      
      .cart-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px;
        margin-bottom: 8px;
        background: #f8f9fa;
        border-radius: 8px;
        border-left: 3px solid #667eea;
      }
      
      .item-info {
        flex: 1;
      }
      
      .item-name {
        font-weight: 500;
        color: #495057;
        margin-bottom: 4px;
      }
      
      .item-details {
        font-size: 0.85rem;
        color: #6c757d;
      }
      
      .item-price {
        font-weight: 600;
        color: #28a745;
      }
      
      .panel-actions {
        padding: 1rem;
        border-top: 1px solid #e9ecef;
        background: #f8f9fa;
        display: flex;
        gap: 10px;
      }
      
      .panel-actions .btn {
        flex: 1;
      }
      
      /* Clickable rows - matching completed_sales.php */
      #savedCartsTable tbody tr {
        cursor: pointer;
        transition: all 0.3s ease;
      }
      
      #savedCartsTable tbody tr:hover {
        background-color: #f8f9fa !important;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      }
      
      #savedCartsTable tbody tr.selected {
        background-color: #e3f2fd !important;
        border-left: 4px solid #2196F3;
      }
      
      #savedCartsTable tbody tr[data-clickable="true"] {
        position: relative;
      }
      
      .cart-items-section {
        margin-bottom: 30px;
      }
      
      .section-title {
        color: #495057;
        font-weight: 600;
        margin-bottom: 15px;
        padding-bottom: 8px;
        border-bottom: 2px solid #007bff;
      }
      
      .items-list {
        max-height: 300px;
        overflow-y: auto;
      }
      
      .cart-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px;
        margin-bottom: 8px;
        background: #f8f9fa;
        border-radius: 8px;
        border-left: 3px solid #007bff;
      }
      
      .item-info {
        flex: 1;
      }
      
      .item-name {
        font-weight: 500;
        color: #495057;
        margin-bottom: 4px;
      }
      
      .item-details {
        font-size: 0.85rem;
        color: #6c757d;
      }
      
      .item-price {
        font-weight: 600;
        color: #28a745;
      }
      
      .panel-actions {
        display: flex;
        gap: 12px;
        padding-top: 20px;
        border-top: 1px solid #e9ecef;
      }
      
      .panel-actions .btn {
        flex: 1;
        padding: 12px;
        font-weight: 500;
      }
      
      @media (max-width: 768px) {
        .cart-details-panel {
          width: 100%;
          right: -100%;
        }
        
        .panel-content {
          padding: 15px;
        }
        
        .panel-actions {
          flex-direction: column;
        }
        
        .panel-actions .btn {
          width: 100%;
          margin-bottom: 8px;
        }
      }
    </style>
    <!-- endinject -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
  </head>
  <body class="with-welcome-text">
    <?php include '../layouts/preloader.php'; ?>
  
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:layouts/sidebar_content.php -->
        <?php include '../layouts/sidebar_content_pages.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Saved Carts content starts here -->
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                  <div class="card-body">
                    <h4 class="card-title">Saved Carts</h4>
                    <p class="card-description">List of saved shopping carts. Restore a cart to continue checkout or delete it.</p>

                    <!-- Modern Search and Filter Options -->
                    <div class="row mb-3 filter-container">
                      <div class="col-md-4">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search by cart ID, customer..." id="searchCarts">
                          <button class="btn btn-outline-secondary" type="button">
                            <i class="bi bi-search"></i>
                          </button>
                        </div>
                      </div>
                      <div class="col-md-8 d-flex justify-content-end align-items-center gap-2">
                        <!-- Staff Filter -->
                        <select class="form-select" id="staffFilter" style="max-width: 140px;">
                          <option value="">All Staff</option>
                          <option value="Alice Johnson">Alice Johnson</option>
                          <option value="Bob Smith">Bob Smith</option>
                          <option value="Carol Williams">Carol Williams</option>
                          <option value="David Brown">David Brown</option>
                        </select>
                        
                       
                        
                        <!-- Date Range Filter -->
                        <div class="date-filter-wrapper">
                          <select class="form-select" id="dateRangeFilter" style="max-width: 140px;">
                            <option value="">All Dates</option>
                            <option value="today">Today</option>
                            <option value="yesterday">Yesterday</option>
                            <option value="last7">Last 7 Days</option>
                            <option value="last30">Last 30 Days</option>
                            <option value="thisMonth">This Month</option>
                            <option value="lastMonth">Last Month</option>
                            <option value="custom">Custom Range</option>
                          </select>
                          
                          <!-- Custom Date Inputs -->
                          <div id="customDateInputs" class="custom-date-container">
                            <div class="row g-3">
                              <div class="col-md-6">
                                <label for="customStartDate" class="form-label text-muted">From Date</label>
                                <input type="date" class="form-control" id="customStartDate" onchange="performSearch()">
                              </div>
                              <div class="col-md-6">
                                <label for="customEndDate" class="form-label text-muted">To Date</label>
                                <input type="date" class="form-control" id="customEndDate" onchange="performSearch()">
                              </div>
                            </div>
                            <div class="text-center mt-3">
                              <button type="button" class="btn btn-outline-secondary btn-sm" onclick="hideCustomDateOverlay()">
                                <i class="bi bi-x"></i> Close
                              </button>
                            </div>
                          </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <button class="btn btn-outline-primary" id="applyFilters">
                          <i class="bi bi-funnel"></i> Apply
                        </button>
                        <button class="btn btn-outline-secondary" id="clearFilters">
                          <i class="bi bi-x-circle"></i> Clear
                        </button>
                        <button class="btn btn-outline-success" id="exportReport">
                          <i class="bi bi-download"></i> Export
                        </button>
                        <button class="btn btn-outline-info" onclick="testCartPanel()" title="Test Panel">
                          <i class="bi bi-gear"></i> Test
                        </button>
                      </div>
                    </div><br>
                    <div class="table-responsive">
                      <table class="table table-striped" id="savedCartsTable">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>Cart ID</th>
                            <th>Created by</th>
                            <th>Items</th>
                            <th>Saved Date</th>
                            <th>Cart Total</th>
                            <th class="text-center">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="cart-row" data-cart-id="SC-001" data-customer="Jane Smith" data-items="3" data-date="Oct 13, 2025 1:45:00 AM" data-total="$89.50" data-clickable="true">
                            <td>1</td>
                            <td>SC-001</td>
                            <td>Jane Smith</td>
                            <td>3</td>
                            <td>Oct 13, 2025 1:45:00 AM</td>
                            <td>₦8950</td>
                            <td class="text-center">
                              <a href="#" class="text-danger delete-cart" data-cart-id="SC-001" data-customer="Jane Smith" title="Delete Cart" onclick="event.stopPropagation(); handleDelete(this)">
                                <i class="bi bi-trash fs-5"></i>
                              </a>
                            </td>
                          </tr>
                          <tr class="cart-row" data-cart-id="SC-002" data-customer="Bob Smith" data-items="5" data-date="Oct 12, 2025 2:30:00 AM" data-total="$156.20" data-clickable="true">
                            <td>2</td>
                            <td>SC-002</td>
                            <td>Bob Smith</td>
                            <td>5</td>
                            <td>Oct 12, 2025 2:30:00 AM</td>
                            <td>₦15620</td>
                            <td class="text-center">
                              <a href="#" class="text-danger delete-cart" data-cart-id="SC-002" data-customer="Bob Smith" title="Delete Cart" onclick="event.stopPropagation(); handleDelete(this)">
                                <i class="bi bi-trash fs-5"></i>
                              </a>
                            </td>
                          </tr>
                          <tr class="cart-row" data-cart-id="SC-003" data-customer="Alice Johnson" data-items="2" data-date="Oct 11, 2025 3:15:00 AM" data-total="$45.75" data-clickable="true">
                            <td>3</td>
                            <td>SC-003</td>
                            <td>Alice Johnson</td>
                            <td>2</td>
                            <td>Oct 11, 2025 3:15:00 AM</td>
                            <td>₦4575</td>
                            <td class="text-center">
                              <a href="#" class="text-danger delete-cart" data-cart-id="SC-003" data-customer="Alice Johnson" title="Delete Cart" onclick="event.stopPropagation(); handleDelete(this)">
                                <i class="bi bi-trash fs-5"></i>
                              </a>
                            </td>
                          </tr>
                          <tr class="cart-row" data-cart-id="SC-004" data-customer="Carol Williams" data-items="7" data-date="Oct 10, 2025 4:00:00 AM" data-total="$298.40" data-clickable="true">
                            <td>4</td>
                            <td>SC-004</td>
                            <td>Carol Williams</td>
                            <td>7</td>
                            <td>Oct 10, 2025 4:00:00 AM</td>
                            <td>₦29840</td>
                            <td class="text-center">
                              <a href="#" class="text-danger delete-cart" data-cart-id="SC-004" data-customer="Carol Williams" title="Delete Cart" onclick="event.stopPropagation(); handleDelete(this)">
                                <i class="bi bi-trash fs-5"></i>
                              </a>
                            </td>
                          </tr>
                          <tr class="cart-row" data-cart-id="SC-005" data-customer="David Brown" data-items="4" data-date="Oct 9, 2025 5:00:00 AM" data-total="$125.60" data-clickable="true">
                            <td>5</td>
                            <td>SC-005</td>
                            <td>David Brown</td>
                            <td>4</td>
                            <td>Oct 9, 2025 5:00:00 AM</td>
                            <td>₦12560</td>
                            <td class="text-center">
                              <a href="#" class="text-danger delete-cart" data-cart-id="SC-005" data-customer="David Brown" title="Delete Cart" onclick="event.stopPropagation(); handleDelete(this)">
                                <i class="bi bi-trash fs-5"></i>
                              </a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Saved Carts content ends here -->
            
            <!-- Panel Overlay -->
            <div class="details-panel-backdrop" id="detailsBackdrop"></div>
            <!-- Cart Details Side Panel -->
            <div class="details-panel" id="detailsPanel">
              <div class="details-panel-header">
                <div class="d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">
                    <i class="bi bi-cart-check me-2"></i>Cart Details
                  </h5>
                  <button type="button" class="btn btn-sm btn-light" id="closePanelBtn">
                    <i class="bi bi-x-lg"></i>
                  </button>
                </div>
              </div>
              <div class="details-panel-body">
                <div class="detail-item">
                  <div class="detail-label">Cart ID</div>
                  <div class="detail-value" id="detailCartId">-</div>
                </div>
                <div class="detail-item">
                  <div class="detail-label">Created by</div>
                  <div class="detail-value" id="detailCreatedBy">-</div>
                </div>
                <div class="detail-item">
                  <div class="detail-label">Saved Date</div>
                  <div class="detail-value" id="detailSavedDate">-</div>
                </div>
                <div class="detail-item">
                  <div class="detail-label">Total Items</div>
                  <div class="detail-value" id="detailTotalItems">-</div>
                </div>
                <div class="detail-item">
                  <div class="detail-label">Cart Total</div>
                  <div class="detail-value" id="detailCartTotal">-</div>
                </div>
                
                <div class="detail-item">
                  <div class="detail-label">Items in Cart</div>
                  <div class="items-list" id="cartItemsList">
                    <!-- Cart items will be populated here -->
                  </div>
                </div>
                
                <div class="detail-item">
                  <div class="detail-label">Actions</div>
                  <div class="d-flex gap-2 mt-2">
                    <button class="btn btn-primary btn-sm" id="restoreCartBtn">
                      <i class="bi bi-arrow-clockwise"></i> Restore Cart
                    </button>
                    <button class="btn btn-outline-danger btn-sm" id="deleteCartBtn">
                      <i class="bi bi-trash"></i> Delete Cart
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <!-- <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span> -->
							<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© 2025 SalesPilot. All rights reserved.</span>
            </div>
          </footer>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
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
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/template.js"></script>
    <!-- Small script to keep sidebar static on large screens -->
    <script>
      (function () {
        function applyFixedSidebar() {
          var mq = window.matchMedia('(min-width: 992px)');
          var sidebar = document.getElementById('sidebar');
          var mainPanel = document.querySelector('.main-panel');
          if (!sidebar || !mainPanel) return;

          if (mq.matches) {
            var navbar = document.querySelector('.navbar');
            var topOffset = navbar ? navbar.getBoundingClientRect().height : 70;
            var sidebarWidth = sidebar.getBoundingClientRect().width || 220;

            sidebar.classList.add('fixed-static');
            sidebar.style.top = topOffset + 'px';
            sidebar.style.height = 'calc(100vh - ' + topOffset + 'px)';

            mainPanel.classList.add('fixed-with-sidebar');
            mainPanel.style.marginLeft = sidebarWidth + 'px';
          } else {
            sidebar.classList.remove('fixed-static');
            sidebar.style.top = '';
            sidebar.style.height = '';

            mainPanel.classList.remove('fixed-with-sidebar');
            mainPanel.style.marginLeft = '';
          }
        }

        document.addEventListener('DOMContentLoaded', applyFixedSidebar);
        window.addEventListener('resize', function () {
          clearTimeout(window._applyFixedSidebarTimer);
          window._applyFixedSidebarTimer = setTimeout(applyFixedSidebar, 120);
        });
      })();
    </script>
  <!-- Include Sidebar Scripts -->
  <?php include '../layouts/sidebar_scripts.php'; ?>
  <script src="../assets/js/settings.js"></script>
  <script src="../assets/js/hoverable-collapse.js"></script>
  <script src="../assets/js/todolist.js"></script>
  
  <!-- Filter Functionality Script -->
  <script>
    // Filter and search functionality
    function showCustomDateOverlay() {
      document.getElementById('customDateInputs').classList.add('show');
    }
    
    function hideCustomDateOverlay() {
      document.getElementById('customDateInputs').classList.remove('show');
      document.getElementById('dateRangeFilter').value = '';
      performSearch();
    }
    
    function performSearch() {
      const searchTerm = document.getElementById('searchCarts').value.toLowerCase();
      const selectedStaff = document.getElementById('staffFilter').value;
      const selectedTotal = document.getElementById('totalFilter').value;
      const dateRange = document.getElementById('dateRangeFilter').value;
      
      const table = document.getElementById('savedCartsTable');
      const rows = Array.from(table.querySelector('tbody').querySelectorAll('tr'));
      
      rows.forEach(row => {
        const cells = row.querySelectorAll('td');
        const cartId = cells[1].textContent.toLowerCase();
        const createdBy = cells[2].textContent.toLowerCase();
        const cartTotal = parseFloat(cells[5].textContent.replace('$', ''));
        
        // Search filter (search by cart ID or creator name)
        const matchesSearch = cartId.includes(searchTerm) || createdBy.includes(searchTerm);
        
        // Staff filter
        const matchesStaff = !selectedStaff || cells[2].textContent === selectedStaff;
        
        // Total range filter
        let matchesTotal = true;
        if (selectedTotal) {
          switch(selectedTotal) {
            case '0-50':
              matchesTotal = cartTotal >= 0 && cartTotal <= 50;
              break;
            case '51-100':
              matchesTotal = cartTotal >= 51 && cartTotal <= 100;
              break;
            case '101-200':
              matchesTotal = cartTotal >= 101 && cartTotal <= 200;
              break;
            case '201+':
              matchesTotal = cartTotal > 200;
              break;
          }
        }
        
        if (matchesSearch && matchesStaff && matchesTotal) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    }
    
    // Date filter change handler
    document.getElementById('dateRangeFilter').addEventListener('change', function() {
      if (this.value === 'custom') {
        showCustomDateOverlay();
      } else {
        hideCustomDateOverlay();
      }
    });
    
    // Apply filters button
    document.getElementById('applyFilters').addEventListener('click', function() {
      performSearch();
      // Show feedback
      const originalText = this.innerHTML;
      this.innerHTML = '<i class="bi bi-check2"></i> Applied';
      this.classList.remove('btn-outline-primary');
      this.classList.add('btn-success');
      
      setTimeout(() => {
        this.innerHTML = originalText;
        this.classList.remove('btn-success');
        this.classList.add('btn-outline-primary');
      }, 1500);
    });
    
    // Clear filters button
    document.getElementById('clearFilters').addEventListener('click', function() {
      document.getElementById('searchCarts').value = '';
      document.getElementById('staffFilter').value = '';
      document.getElementById('totalFilter').value = '';
      document.getElementById('dateRangeFilter').value = '';
      document.getElementById('customStartDate').value = '';
      document.getElementById('customEndDate').value = '';
      hideCustomDateOverlay();
      performSearch();
      
      // Show feedback
      const originalText = this.innerHTML;
      this.innerHTML = '<i class="bi bi-check2"></i> Cleared';
      this.classList.remove('btn-outline-secondary');
      this.classList.add('btn-warning');
      
      setTimeout(() => {
        this.innerHTML = originalText;
        this.classList.remove('btn-warning');
        this.classList.add('btn-outline-secondary');
      }, 1500);
    });
    
    // Export button
    document.getElementById('exportReport').addEventListener('click', function() {
      const table = document.getElementById('savedCartsTable');
      let csv = [];
      
      // Get headers
      const headers = [];
      table.querySelectorAll('thead th').forEach(th => {
        headers.push(th.textContent.trim());
      });
      csv.push(headers.join(','));
      
      // Get visible rows
      const visibleRows = table.querySelectorAll('tbody tr');
      visibleRows.forEach(row => {
        if (row.style.display !== 'none') {
          const rowData = [];
          row.querySelectorAll('td').forEach((td, index) => {
            // Skip actions column for export
            if (index < 6) {
              let cellText = td.textContent.trim();
              rowData.push('"' + cellText.replace(/"/g, '""') + '"');
            }
          });
          csv.push(rowData.join(','));
        }
      });
      
      // Download CSV
      const csvContent = csv.join('\n');
      const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
      const link = document.createElement('a');
      const url = URL.createObjectURL(blob);
      link.setAttribute('href', url);
      link.setAttribute('download', `saved_carts_${new Date().toISOString().split('T')[0]}.csv`);
      link.style.visibility = 'hidden';
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
      
      // Show feedback
      const originalText = this.innerHTML;
      this.innerHTML = '<i class="bi bi-check2"></i> Exported';
      this.classList.remove('btn-outline-success');
      this.classList.add('btn-success');
      
      setTimeout(() => {
        this.innerHTML = originalText;
        this.classList.remove('btn-success');
        this.classList.add('btn-outline-success');
      }, 1500);
    });
    
    // Real-time search
    document.getElementById('searchCarts').addEventListener('input', performSearch);
    document.getElementById('staffFilter').addEventListener('change', performSearch);
    document.getElementById('totalFilter').addEventListener('change', performSearch);
    
    // Click outside to close custom date overlay
    document.addEventListener('click', function(e) {
      const dateWrapper = document.querySelector('.date-filter-wrapper');
      const customInputs = document.getElementById('customDateInputs');
      
      if (dateWrapper && !dateWrapper.contains(e.target) && customInputs.classList.contains('show')) {
        hideCustomDateOverlay();
      }
    });
  </script>
    
  <!-- Cart Side Panel JavaScript - Exact completed_sales.php format -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Side panel elements
      const detailsPanel = document.getElementById('detailsPanel');
      const detailsBackdrop = document.getElementById('detailsBackdrop');
      const closePanelBtn = document.getElementById('closePanelBtn');
      const savedCartsTable = document.getElementById('savedCartsTable');
      
      console.log('=== CART PANEL INITIALIZED ===');
      console.log('Panel:', !!detailsPanel);
      console.log('Backdrop:', !!detailsBackdrop);
      console.log('Close Button:', !!closePanelBtn);
      console.log('Table:', !!savedCartsTable);
      
      // Sample detailed data for each cart
      const cartDetails = {
        'SC-001': {
          cartId: 'SC-001',
          customer: 'Jane Smith',
          date: 'Oct 13, 2025 1:45:00 AM',
          items: '3',
          total: '$89.50',
          itemsList: [
            { name: 'Wireless Headphones', qty: 1, price: 45.00, total: 45.00 },
            { name: 'Phone Case', qty: 2, price: 22.25, total: 44.50 }
          ]
        },
        'SC-002': {
          cartId: 'SC-002',
          customer: 'Bob Smith',
          date: 'Oct 12, 2025 2:30:00 AM',
          items: '5',
          total: '$156.20',
          itemsList: [
            { name: 'Bluetooth Speaker', qty: 1, price: 65.00, total: 65.00 },
            { name: 'Screen Protector', qty: 3, price: 30.40, total: 91.20 }
          ]
        },
        'SC-003': {
          cartId: 'SC-003',
          customer: 'Alice Johnson',
          date: 'Oct 11, 2025 3:15:00 AM',
          items: '2',
          total: '$45.75',
          itemsList: [
            { name: 'Tablet Stand', qty: 1, price: 25.75, total: 25.75 },
            { name: 'Stylus Pen', qty: 1, price: 20.00, total: 20.00 }
          ]
        },
        'SC-004': {
          cartId: 'SC-004',
          customer: 'Carol Williams',
          date: 'Oct 10, 2025 4:00:00 AM',
          items: '7',
          total: '$298.40',
          itemsList: [
            { name: 'Gaming Mouse', qty: 2, price: 89.90, total: 179.80 },
            { name: 'Mechanical Keyboard', qty: 1, price: 125.00, total: 125.00 }
          ]
        },
        'SC-005': {
          cartId: 'SC-005',
          customer: 'David Brown',
          date: 'Oct 9, 2025 5:00:00 AM',
          items: '4',
          total: '$125.60',
          itemsList: [
            { name: 'Laptop Sleeve', qty: 1, price: 35.60, total: 35.60 },
            { name: 'Portable Charger', qty: 1, price: 42.00, total: 42.00 }
          ]
        }
      };
      
      // Function to open side panel - exact completed_sales.php format
      function openSidePanel(cartId) {
        const details = cartDetails[cartId];
        if (!details) return;
        
        console.log('=== OPENING PANEL FOR:', cartId, '===');
        
        // Populate panel with data
        document.getElementById('detailCartId').textContent = details.cartId;
        document.getElementById('detailCreatedBy').textContent = details.customer;
        document.getElementById('detailSavedDate').textContent = details.date;
        document.getElementById('detailTotalItems').textContent = details.items;
        document.getElementById('detailCartTotal').textContent = details.total;
        
        // Populate items list
        const itemsList = document.getElementById('cartItemsList');
        itemsList.innerHTML = '';
        details.itemsList.forEach(item => {
          const itemRow = document.createElement('div');
          itemRow.className = 'item-row';
          itemRow.innerHTML = `
            <div>
              <strong>${item.name}</strong><br>
              <small class="text-muted">Qty: ${item.qty} × $${item.price.toFixed(2)}</small>
            </div>
            <div class="text-end">
              <strong>$${item.total.toFixed(2)}</strong>
            </div>
          `;
          itemsList.appendChild(itemRow);
        });
        
        // Setup action buttons
        document.getElementById('restoreCartBtn').onclick = function() {
          if (confirm(`Restore cart ${cartId} for ${details.customer}?`)) {
            closeSidePanel();
            alert(`Cart ${cartId} restored successfully!`);
          }
        };
        
        document.getElementById('deleteCartBtn').onclick = function() {
          if (confirm(`Delete cart ${cartId} for ${details.customer}?`)) {
            closeSidePanel();
            alert(`Cart ${cartId} deleted successfully!`);
          }
        };
        
        // Show panel - exact completed_sales.php method
        detailsBackdrop.classList.add('show');
        detailsPanel.classList.add('open');
        
        console.log('✅ Panel should be visible now!');
      }
      
      // Function to close side panel - exact completed_sales.php format
      function closeSidePanel() {
        console.log('=== CLOSING PANEL ===');
        detailsBackdrop.classList.remove('show');
        detailsPanel.classList.remove('open');
        // Remove selected class from all rows
        document.querySelectorAll('#savedCartsTable tbody tr').forEach(row => {
          row.classList.remove('selected');
        });
      }
      
      // Add click event to table rows - exact completed_sales.php format
      if (savedCartsTable) {
        savedCartsTable.addEventListener('click', function(e) {
          const row = e.target.closest('tbody tr');
          if (row) {
            // Don't trigger if clicking on delete button
            if (e.target.closest('.delete-cart')) {
              return;
            }
            
            console.log('🔥 ROW CLICKED!', row);
            
            // Remove selected class from all rows
            document.querySelectorAll('#savedCartsTable tbody tr').forEach(r => {
              r.classList.remove('selected');
            });
            
            // Add selected class to clicked row
            row.classList.add('selected');
            
            // Get cart ID from the row
            const cartId = row.getAttribute('data-cart-id');
            console.log('Cart ID from row:', cartId);
            openSidePanel(cartId);
          }
        });
        
        // Add data-clickable attribute to all table rows for better UX
        document.querySelectorAll('#savedCartsTable tbody tr').forEach(row => {
          row.setAttribute('data-clickable', 'true');
        });
        
        console.log('✅ Table click listener added');
      }
      
      // Close panel events - exact completed_sales.php format
      if (closePanelBtn) {
        closePanelBtn.addEventListener('click', closeSidePanel);
        console.log('✅ Close button listener added');
      }
      
      if (detailsBackdrop) {
        detailsBackdrop.addEventListener('click', closeSidePanel);
        console.log('✅ Backdrop click listener added');
      }
      
      // Close panel with Escape key
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && detailsPanel.classList.contains('open')) {
          closeSidePanel();
        }
      });
      
      console.log('✅ Escape key listener added');
      
      // Test function
      window.testCartPanel = function() {
        console.log('=== TESTING CART PANEL ===');
        openSidePanel('SC-001');
      };
      
      console.log('=== ✅ CART FUNCTIONALITY READY ===');
      console.log('Try: testCartPanel() or click any cart row');
    });
  </script>
  
  
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
  <script src="../assets/js/dashboard.js"></script>
  <!-- End custom js for this page-->
  </body>
</html>