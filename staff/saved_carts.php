<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Saved Carts - SalesPilot</title>
    <link rel="stylesheet" href="../Manager/assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../Manager/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <?php include 'layouts/sidebar_styles.php'; ?>
    <style>
      .main-panel { margin-left: 280px !important; transition: margin-left 0.2s ease !important; }
      body.sidebar-collapsed .main-panel { margin-left: 70px !important; }
      .content-container { padding: 25px; background: white; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
      .dropdown-menu { position: absolute !important; z-index: 10000 !important; display: none; background: white !important; border: 1px solid rgba(0,0,0,.15) !important; border-radius: 0.25rem !important; box-shadow: 0 0.5rem 1rem rgba(0,0,0,.175) !important; }
      .dropdown-menu.show { display: block !important; }
      .dropdown-menu-end { right: 0 !important; left: auto !important; }
      .user-dropdown { position: relative !important; }
      
      /* Cart Items List Styling */
      .items-list .item-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        padding: 10px 0;
        border-bottom: 1px solid #e9ecef;
      }
      .items-list .item-row:last-child {
        border-bottom: none;
      }
      .items-list .item-row strong {
        color: #2c2e35;
        font-size: 14px;
      }
      .items-list .item-row .text-muted {
        color: #6c757d !important;
        font-size: 12px;
      }
      .items-list .item-row .text-end {
        text-align: right;
      }
      
      /* Date Filter Wrapper */
      .date-filter-wrapper {
        position: relative;
      }
      
      /* Custom Date Overlay Container - Repositioned to not overlap filter/action buttons */
      .custom-date-container {
        position: absolute;
        top: calc(100% + 8px);
        right: 0;
        background: white;
        border: 1px solid #dee2e6;
        border-radius: 0.375rem;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        padding: 1rem;
        min-width: 350px;
        z-index: 1050;
        display: none;
        transition: opacity 0.2s ease;
      }
      
      .custom-date-container.show {
        display: block;
        animation: fadeInDown 0.2s ease;
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
      
      /* Action Icons */
      .delete-cart {
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.2s ease, color 0.2s ease;
      }
      .delete-cart:hover {
        color: #dc3545 !important;
        transform: scale(1.15);
      }
      
      /* Clickable Row Styling */
      #savedCartsTable tbody tr {
        cursor: pointer;
        transition: all 0.2s ease;
      }
      #savedCartsTable tbody tr:hover {
        background-color: #f8f9fa;
        transform: translateX(2px);
      }
      #savedCartsTable tbody tr.selected {
        background-color: #e7f3ff;
        border-left: 3px solid #0d6efd;
      }
      
      /* Side Panel Styling */
      .details-panel {
        position: fixed;
        top: 0;
        right: 0;
        width: 450px;
        height: 100vh;
        background: white;
        box-shadow: -4px 0 15px rgba(0, 0, 0, 0.1);
        z-index: 1040;
        transition: transform 0.3s ease;
        overflow-y: auto;
        transform: translateX(100%);
        visibility: hidden;
      }
      .details-panel.open {
        transform: translateX(0);
        visibility: visible;
      }
      .details-panel-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1030;
        display: none;
      }
      .details-panel-backdrop.show {
        display: block;
      }
      .details-panel-header {
        padding: 20px;
        border-bottom: 1px solid #e9ecef;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
      }
      .details-panel-header h5 {
        color: white;
        font-weight: 600;
      }
      .details-panel-header .btn-light {
        background: rgba(255, 255, 255, 0.2);
        border: none;
        color: white;
      }
      .details-panel-header .btn-light:hover {
        background: rgba(255, 255, 255, 0.3);
      }
      .details-panel-body {
        padding: 20px;
      }
      .detail-item {
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid #e9ecef;
      }
      .detail-item:last-child {
        border-bottom: none;
      }
      .detail-label {
        font-size: 12px;
        color: #6c757d;
        text-transform: uppercase;
        font-weight: 600;
        margin-bottom: 5px;
      }
      .detail-value {
        font-size: 15px;
        color: #2c2e35;
        font-weight: 500;
      }
      
      /* Cart Items Section in Side Panel */
      .cart-items-section {
        margin-top: 15px;
      }
      .cart-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px;
        background: #f8f9fa;
        border-radius: 6px;
        margin-bottom: 10px;
      }
      .item-info {
        flex: 1;
      }
      .item-name {
        font-weight: 600;
        color: #2c2e35;
        font-size: 14px;
      }
      .item-details {
        font-size: 12px;
        color: #6c757d;
        margin-top: 4px;
      }
      .item-price {
        font-weight: 600;
        color: #0d6efd;
        font-size: 15px;
      }
      
      /* Panel Action Buttons */
      .panel-actions {
        display: flex;
        gap: 10px;
        margin-top: 20px;
      }
      .panel-actions .btn {
        flex: 1;
      }
      
      /* Mobile Responsiveness */
      @media (max-width: 768px) {
        .details-panel {
          width: 100%;
          right: -100%;
        }
        .custom-date-container {
          min-width: 280px;
          right: 0;
        }
      }
    </style>
  </head>
  <body class="with-welcome-text">
    <?php include 'layouts/preloader.php'; ?>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        <!-- Sidebar include -->
        <?php include 'layouts/sidebar_content.php'; ?>
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
          <!-- content-wrapper ends -->
          <!-- partial:../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© 2025 SalesPilot. All rights reserved.</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <script src="../Manager/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../Manager/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Manager/assets/vendors/chart.js/chart.umd.js"></script>
    <script src="../Manager/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../Manager/assets/js/off-canvas.js"></script>
    <script src="../Manager/assets/js/template.js"></script>
    <script src="../Manager/assets/js/settings.js"></script>
    <script src="../Manager/assets/js/hoverable-collapse.js"></script>
    <script src="../Manager/assets/js/todolist.js"></script>
    <?php include 'layouts/sidebar_scripts.php'; ?>
    
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
        const dateRange = document.getElementById('dateRangeFilter').value;
        
        const table = document.getElementById('savedCartsTable');
        const rows = Array.from(table.querySelector('tbody').querySelectorAll('tr'));
        
        rows.forEach(row => {
          const cells = row.querySelectorAll('td');
          const cartId = cells[1].textContent.toLowerCase();
          const createdBy = cells[2].textContent.toLowerCase();
          const cartTotal = parseFloat(cells[5].textContent.replace('₦', '').replace(',', ''));
          
          // Search filter (search by cart ID or creator name)
          const matchesSearch = cartId.includes(searchTerm) || createdBy.includes(searchTerm);
          
          // Staff filter
          const matchesStaff = !selectedStaff || cells[2].textContent === selectedStaff;
          
          if (matchesSearch && matchesStaff) {
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
      
      // Click outside to close custom date overlay
      document.addEventListener('click', function(e) {
        const dateWrapper = document.querySelector('.date-filter-wrapper');
        const customInputs = document.getElementById('customDateInputs');
        
        if (dateWrapper && !dateWrapper.contains(e.target) && customInputs.classList.contains('show')) {
          hideCustomDateOverlay();
        }
      });
    </script>
      
    <!-- Cart Side Panel JavaScript -->
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
        
        // Function to open side panel
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
          
          // Show panel
          detailsBackdrop.classList.add('show');
          detailsPanel.classList.add('open');
          
          console.log('✅ Panel should be visible now!');
        }
        
        // Function to close side panel
        function closeSidePanel() {
          console.log('=== CLOSING PANEL ===');
          detailsBackdrop.classList.remove('show');
          detailsPanel.classList.remove('open');
          // Remove selected class from all rows
          document.querySelectorAll('#savedCartsTable tbody tr').forEach(row => {
            row.classList.remove('selected');
          });
        }
        
        // Add click event to table rows
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
        
        // Close panel events
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
    
    <script>
    window.addEventListener('load', function() {
      setTimeout(function() {
        var userDropdown = document.getElementById('UserDropdown');
        var dropdownMenu = document.querySelector('.dropdown-menu[aria-labelledby="UserDropdown"]');
        if (userDropdown && dropdownMenu && typeof bootstrap !== 'undefined' && bootstrap.Dropdown) {
          try { new bootstrap.Dropdown(userDropdown, { autoClose: true, boundary: 'viewport' }); } catch (error) { console.error('Error:', error); }
        }
        var sidebar = document.getElementById('sidebar');
        if (sidebar) {
          sidebar.querySelectorAll('a.nav-link[data-bs-toggle="collapse"]').forEach(function (toggle) {
            toggle.addEventListener('click', function (e) {
              e.preventDefault();
              var target = document.querySelector(this.getAttribute('href'));
              if (target && typeof bootstrap !== 'undefined' && bootstrap.Collapse) {
                sidebar.querySelectorAll('div.collapse.show').forEach(function (m) { if (m !== target) bootstrap.Collapse.getOrCreateInstance(m).hide(); });
                bootstrap.Collapse.getOrCreateInstance(target).toggle();
              }
            });
          });
        }
      }, 500);
    });
    </script>
  </body>
</html>