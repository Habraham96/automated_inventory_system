<script src="../assets/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script>
  $(document).ready(function() {
    $('#inventoryValuationTable').DataTable({
      "pageLength": 10,
      "lengthChange": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inventory Valuation - SalesPilot</title>
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
    <style>
      html, body, .container-scroller, .container-fluid.page-body-wrapper, .main-panel {
        height: 100%;
        min-height: 100vh;
      }
      .content-wrapper {
        min-height: calc(100vh - 120px); /* adjust for footer height */
        display: flex;
        flex-direction: column;
      }
      
      /* Footer positioning */
      .footer {
        margin-top: auto;
        padding: 1rem 0;
        background: #f8f9fa;
        border-top: 1px solid #e9ecef;
      }
      
      /* Date Filter Styles */
      .date-filter-wrapper {
        position: relative;
      }
      
      .custom-date-container {
        position: absolute;
        top: 100%;
        right: 0;
        background: white;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        padding: 1rem;
        box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        z-index: 1000;
        min-width: 300px;
        display: none;
      }
      
      .custom-date-container.show {
        display: block;
        animation: slideInDown 0.3s ease;
      }
      
      @keyframes slideInDown {
        from {
          opacity: 0;
          transform: translateY(-10px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
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
        <!-- partial: Include Sidebar Content -->
        <?php include '../layouts/sidebar_content_pages.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Inventory Valuation content starts here -->
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                  <div class="card-body">
                      <h4 class="card-title">Inventory Valuation Report</h4>
                      <p class="card-description">Current inventory value and stock levels.</p>
                      <p style="color: #dc3545; font-weight: 500;"><strong>NOTE:</strong> Only tracked items will be logged on this Inventory Valuation page. Items with TURNED OFF stock tracking details are NOT being tracked and will not appear in this list. Make sure to enable inventory tracking for each item you wish to include in the valuation Report.</p>
                      
                      <!-- Search and Filter Options -->
                      <div class="row mb-3">
                        <div class="col-md-4">
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search items..." id="searchInput">
                            <button class="btn btn-outline-secondary" type="button">
                              <i class="bi bi-search"></i>
                            </button>
                          </div>
                        </div>
                        <div class="col-md-8 d-flex justify-content-end align-items-center gap-2">
                          <!-- Category Filter -->
                          <select class="form-select" id="categoryFilter" style="max-width: 160px;">
                            <option value="">All Categories</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Accessories">Accessories</option>
                            <option value="Furniture">Furniture</option>
                            <option value="Stationery">Stationery</option>
                          </select>
                          
                          <!-- Date Filter -->
                          <div class="date-filter-wrapper position-relative">
                            <select class="form-select" id="dateFilter" style="max-width: 140px;">
                              <option value="">Date</option>
                              <option value="today">Today</option>
                              <option value="yesterday">Yesterday</option>
                              <option value="specific"> Choose</option>
                            </select>
                            
                            <!-- Custom Date Input -->
                            <div id="customDateInputs" class="custom-date-container">
                              <div class="row g-3">
                                <div class="col-12">
                                  <label for="specificDate" class="form-label text-muted">Select Date</label>
                                  <input type="date" class="form-control" id="specificDate">
                                </div>
                              </div>
                              <div class="text-center mt-3">
                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="hideCustomDateOverlay()">
                                  Cancel
                                </button>
                              </div>
                            </div>
                          </div>
                          
                          <!-- Apply and Clear Buttons -->
                          <button class="btn btn-outline-primary" id="applyFilters">
                            <i class="bi bi-funnel"></i> Apply
                          </button>
                          <button class="btn btn-outline-secondary" id="clearFilters">
                            <i class="bi bi-x-circle"></i> Clear
                          </button>
                          
                          <button class="btn btn-outline-success" id="exportInventoryBtn">
                            <i class="bi bi-download"></i> Export
                          </button>
                        </div>
                      </div><br>
                      <div class="row mb-4">
<script>
// Filter functionality matching customers.php format with date filter
function applyAllFilters() {
  const searchTerm = document.getElementById('searchInput').value.toLowerCase();
  const selectedCategory = document.getElementById('categoryFilter').value;
  const dateRange = document.getElementById('dateFilter').value;
  const table = document.getElementById('inventoryValuationTable');
  const rows = Array.from(table.querySelector('tbody').querySelectorAll('tr'));

  rows.forEach(row => {
    const cells = row.querySelectorAll('td');
    const itemName = cells[1].textContent.toLowerCase();
    const category = cells[2].textContent;
    
    // For demonstration, we'll use a mock date (in real app, this would come from data)
    const itemDate = new Date(); // Mock date - replace with actual item date
    
    // Search filter
    const matchesSearch = itemName.includes(searchTerm) || 
                         category.toLowerCase().includes(searchTerm);
    
    // Category filter
    const matchesCategory = !selectedCategory || category === selectedCategory;
    
    // Date filter
    const matchesDate = checkDateFilter(itemDate, dateRange);
    
    if (matchesSearch && matchesCategory && matchesDate) {
      row.style.display = '';
    } else {
      row.style.display = 'none';
    }
  });
}

// Date filter logic
function checkDateFilter(itemDate, dateRange) {
  if (!dateRange) return true;
  
  const today = new Date();
  const yesterday = new Date(today);
  yesterday.setDate(yesterday.getDate() - 1);
  
  switch (dateRange) {
    case 'today':
      return itemDate.toDateString() === today.toDateString();
    case 'yesterday':
      return itemDate.toDateString() === yesterday.toDateString();
    case 'last7days':
      const last7Days = new Date(today);
      last7Days.setDate(last7Days.getDate() - 7);
      return itemDate >= last7Days && itemDate <= today;
    case 'last30days':
      const last30Days = new Date(today);
      last30Days.setDate(last30Days.getDate() - 30);
      return itemDate >= last30Days && itemDate <= today;
    case 'specific':
      const specificDate = document.getElementById('specificDate').value;
      if (specificDate) {
        const selectedDate = new Date(specificDate);
        return itemDate.toDateString() === selectedDate.toDateString();
      }
      return true;
    default:
      return true;
  }
}

// Show/hide custom date overlay
function showCustomDateOverlay() {
  document.getElementById('customDateInputs').classList.add('show');
}

function hideCustomDateOverlay() {
  document.getElementById('customDateInputs').classList.remove('show');
  document.getElementById('dateFilter').value = '';
  applyAllFilters();
}

// Export to CSV functionality
function exportInventoryToCSV() {
  const table = document.getElementById('inventoryValuationTable');
  const rows = [];
  
  // Get table headers
  const headers = [];
  const headerCells = table.querySelectorAll('thead th');
  headerCells.forEach(cell => {
    headers.push(cell.textContent.trim());
  });
  rows.push(headers);
  
  // Get visible table rows only
  const visibleRows = table.querySelectorAll('tbody tr');
  visibleRows.forEach(row => {
    if (row.style.display !== 'none') {
      const rowData = [];
      const cells = row.querySelectorAll('td');
      cells.forEach(cell => {
        // Clean up the cell content and handle currency symbols
        let cellText = cell.textContent.trim();
        // Remove any HTML entities and normalize currency
        cellText = cellText.replace(/&\w+;/g, '').replace(/\$/g, '$');
        rowData.push(cellText);
      });
      rows.push(rowData);
    }
  });
  
  // Convert to CSV
  const csvContent = rows.map(row => 
    row.map(cell => `"${cell.replace(/"/g, '""')}"`).join(',')
  ).join('\n');
  
  // Create and download file
  const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
  const link = document.createElement('a');
  const url = URL.createObjectURL(blob);
  link.setAttribute('href', url);
  link.setAttribute('download', `inventory_valuation_${new Date().toISOString().split('T')[0]}.csv`);
  link.style.visibility = 'hidden';
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
}

</script>

                        <div class="col-md-3 col-6 mb-2">
                          <div class="card text-white bg-primary h-100">
                            <div class="card-body py-3 px-2">
                              <div class="d-flex flex-column align-items-start">
                                <span class="fw-bold fs-6">Total Inventory Value</span>
                                <span class="fs-5">₦13,812,000.50</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                          <div class="card text-white bg-success h-100">
                            <div class="card-body py-3 px-2">
                              <div class="d-flex flex-column align-items-start">
                                <span class="fw-bold fs-6">Total Selling Price Value</span>
                                <span class="fs-5">₦18,000,000.00</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                          <div class="card text-white bg-warning h-100">
                            <div class="card-body py-3 px-2">
                              <div class="d-flex flex-column align-items-start">
                                <span class="fw-bold fs-6">Potential Profit</span>
                                <span class="fs-5">₦4,187,500.00</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                          <div class="card text-white bg-info h-100">
                            <div class="card-body py-3 px-2">
                              <div class="d-flex flex-column align-items-start">
                                <span class="fw-bold fs-6">Margin</span>
                                <span class="fs-5">23.3%</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="table-responsive">
                        <table class="table table-striped" id="inventoryValuationTable">
                          <thead>
                            <tr>
                              <th>S/N</th>
                              <th>Item Name</th>
                              <th>Category</th>
                              <th>Qty In Stock</th>
                              <th>Cost</th>
                              <th>Inventory Value</th>
                              <th>Total Selling Price Value</th>
                              <th>Potential Profit</th>
                              <th>Margin</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>Product A</td>
                              <td>Electronics</td>
                              <td>150</td>
                              <td>₦25000.00</td>
                              <td>₦3,750.00</td>
                              <td>₦4,950.00</td>
                              <td>₦1,200.00</td>
                              <td>24.2%</td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>Product B</td>
                              <td>Accessories</td>
                              <td>85</td>
                              <td>₦12,000.50</td>
                              <td>₦10,062.50</td>
                              <td>₦10,445.00</td>
                              <td>₦382,000.50</td>
                              <td>26.5%</td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td>Product C</td>
                              <td>Electronics</td>
                              <td>200</td>
                              <td>₦4,500.00</td>
                              <td>₦9,000.00</td>
                              <td>₦12,000.00</td>
                              <td>₦3,0000.00</td>
                              <td>25.0%</td>
                            </tr>
                            <tr>
                              <td>4</td>
                              <td>Product D</td>
                              <td>Furniture</td>
                              <td>60</td>
                              <td>₦8,000.00</td>
                              <td>₦40,800.00</td>
                              <td>₦60,600.00</td>
                              <td>₦10,800.00</td>
                              <td>27.3%</td>
                            </tr>
                            <tr>
                              <td>5</td>
                              <td>Product E</td>
                              <td>Stationery</td>
                              <td>500</td>
                              <td>₦2,000.00</td>
                              <td>₦10,000.00</td>
                              <td>₦10,500.00</td>
                              <td>₦5,000.00</td>
                              <td>33.3%</td>
                            </tr>
                            <tr>
                              <td>6</td>
                              <td>Product F</td>
                              <td>Accessories</td>
                              <td>120</td>
                              <td>₦1,500.00</td>
                              <td>₦1,800.00</td>
                              <td>₦2,400.00</td>
                              <td>₦600.00</td>
                              <td>25.0%</td>
                            </tr>
                            <tr>
                              <td>7</td>
                              <td>Product G</td>
                              <td>Electronics</td>
                              <td>75</td>
                              <td>₦6,000.00</td>
                              <td>₦4,500.00</td>
                              <td>₦6,000.00</td>
                              <td>₦1,500.00</td>
                              <td>25.0%</td>
                            </tr>
                            <tr>
                              <td>8</td>
                              <td>Product H</td>
                              <td>Furniture</td>
                              <td>40</td>
                              <td>₦12,000.00</td>
                              <td>₦48,000.00</td>
                              <td>₦60,000.00</td>
                              <td>₦12,000.00</td>
                              <td>20.0%</td>
                            </tr>
                            <tr>
                              <td>9</td>
                              <td>Product I</td>
                              <td>Stationery</td>
                              <td>300</td>
                              <td>₦3,000.00</td>
                              <td>₦9,000.00</td>
                              <td>₦12,000.00</td>
                              <td>₦3,000.00</td>
                              <td>25.0%</td>
                            </tr>
                            <tr>
                              <td>10</td>
                              <td>Product J</td>
                              <td>Accessories</td>
                              <td>200</td>
                              <td>₦8,000.00</td>
                              <td>₦10,600.00</td>
                              <td>₦20,200.00</td>
                              <td>₦60,000.00</td>
                              <td>27.3%</td>
                            </tr>
                          </tbody>
                          
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Inventory Valuation content ends here -->
            </div>
          </div>
          <!-- content-wrapper ends -->
</div>
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
    
    <!-- Sidebar Menu Collapse Behavior - Ensures only one submenu open at a time, auto-expand Reports menu -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Search and Filter functionality
      const searchInput = document.getElementById('searchInput');
      const categoryFilter = document.getElementById('categoryFilter');
      const dateFilter = document.getElementById('dateFilter');
      const specificDate = document.getElementById('specificDate');
      const exportBtn = document.getElementById('exportInventoryBtn');
      const applyBtn = document.getElementById('applyFilters');
      const clearBtn = document.getElementById('clearFilters');

      // Apply filters function
      function applyFilters() {
        applyAllFilters();
      }

      // Apply button functionality
      if (applyBtn) {
        applyBtn.addEventListener('click', function() {
          applyFilters();
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
      }

      // Clear button functionality
      if (clearBtn) {
        clearBtn.addEventListener('click', function() {
          // Clear all filters
          if (searchInput) searchInput.value = '';
          if (categoryFilter) categoryFilter.value = '';
          if (dateFilter) dateFilter.value = '';
          if (specificDate) specificDate.value = '';
          
          // Hide custom date overlay
          hideCustomDateOverlay();
          
          // Apply filters to show all items
          applyFilters();
          
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
      }

      // Real-time search
      if (searchInput) {
        searchInput.addEventListener('input', applyFilters);
      }

      // Category filter
      if (categoryFilter) {
        categoryFilter.addEventListener('change', applyFilters);
      }

      // Date filter
      if (dateFilter) {
        dateFilter.addEventListener('change', function() {
          if (this.value === 'specific') {
            showCustomDateOverlay();
          } else {
            hideCustomDateOverlay();
            applyFilters();
          }
        });
      }

      // Specific date input
      if (specificDate) {
        specificDate.addEventListener('change', applyFilters);
      }

      // Close custom date overlay when clicking outside
      document.addEventListener('click', function(e) {
        const dateWrapper = document.querySelector('.date-filter-wrapper');
        const customInputs = document.getElementById('customDateInputs');
        
        if (dateWrapper && !dateWrapper.contains(e.target) && customInputs.classList.contains('show')) {
          hideCustomDateOverlay();
        }
      });

      // Export button functionality
      if (exportBtn) {
        exportBtn.addEventListener('click', function() {
          // Add loading state
          const originalText = this.innerHTML;
          this.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Exporting...';
          this.disabled = true;
          
          // Export with a small delay to show loading state
          setTimeout(() => {
            exportInventoryToCSV();
            
            // Reset button state
            this.innerHTML = originalText;
            this.disabled = false;
          }, 1000);
        });
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
