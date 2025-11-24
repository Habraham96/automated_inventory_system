<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sales by Item - SalesPilot</title>
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
      /* Custom Date Filter Styles */
      .date-filter-wrapper {
        position: relative;
        display: inline-block;
      }
      
      .custom-date-container {
        position: absolute;
        top: calc(100% + 8px);
        right: 0;
        z-index: 1000;
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
      }
      
      .custom-date-container.show {
        opacity: 1;
        transform: translateY(0) scale(1);
        pointer-events: all;
      }
      
      .custom-date-container::before {
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
      
      .custom-date-container::after {
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

      @media (max-width: 768px) {
        .filter-container .col-md-8 {
          flex-direction: column;
          align-items: stretch !important;
        }
        
        .filter-container .d-flex {
          flex-wrap: wrap;
        }
      }
    </style>
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
            <!-- Sales by Item content starts here -->
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                  <div class="card-body">
                    <h4 class="card-title">Sales by Item Report</h4>
                    <p class="card-description">Detailed sales performance for individual products.</p>

                    <!-- Modern Search and Filter Options -->
                    <div class="row mb-3 filter-container">
                      <div class="col-md-4">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search items..." id="searchItems">
                          <button class="btn btn-outline-secondary" type="button">
                            <i class="bi bi-search"></i>
                          </button>
                        </div>
                      </div>
                      <div class="col-md-8 d-flex justify-content-end align-items-center gap-2">
                        <!-- Category Filter -->
                        <select class="form-select" id="categoryFilter" style="max-width: 140px;">
                          <option value="">All Categories</option>
                          <option value="Electronics">Electronics</option>
                          <option value="Accessories">Accessories</option>
                          <option value="Office">Office</option>
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
                      </div>
                    </div><br>
                    <div class="table-responsive">
                      <table class="table table-striped" id="salesByItemTable">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>Item Name</th>
                            <th>SKU</th>
                            <th>Category</th>
                            <th>Qty Sold</th>
                            <th>Gross Sales Amount</th>
                            <th>Cost Price</th>
                            <th>Gross Profit</th>
                            <th>Discounts</th>
                            <th>Profit Margin</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Wireless Mouse</td>
                            <td>WM-001</td>
                            <td>Electronics</td>
                            <td>125</td>
                            <td>₦29000.99</td>
                            <td>₦23000.99</td>
                            <td>₦5000.00</td>
                            <td>₦30,748.75</td>
                            <td>14%</td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>USB-C Cable</td>
                            <td>UC-002</td>
                            <td>Accessories</td>
                            <td>250</td>
                            <td>₦12,650</td>
                            <td>₦8000.75</td>
                            <td>₦3000.75</td>
                            <td>₦3,125.00</td>
                            <td>30%</td>
                          </tr>
<script src="../assets/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script>
  $(document).ready(function() {
    $('#salesByItemTable').DataTable({
      "pageLength": 10,
      "lengthChange": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
                          <tr>
                            <td>3</td>
                            <td>Bluetooth Headset</td>
                            <td>BH-003</td>
                            <td>Electronics</td>
                            <td>87</td>
                            <td>₦59,990.00</td>
                            <td>₦45000.00</td>
                            <td>₦4000</td>
                            <td>₦5,219.13</td>
                            <td>23%</td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>Phone Case</td>
                            <td>PC-004</td>
                            <td>Accessories</td>
                            <td>198</td>
                            <td>₦15,000.00</td>
                            <td>₦200,970.00</td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td>Laptop Stand</td>
                            <td>LS-005</td>
                            <td>Electronics</td>
                            <td>64</td>
                            <td>₦59,990.00</td>
                            <td>₦45000.00</td>
                            <td>₦4000</td>
                            <td>₦5,219.13</td>
                            <td>23%</td>
                          </tr>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th colspan="3">Total</th>
                            <th>724</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>-</th>
                            <th>₦170,942.88</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <br><br><br>
                    <!-- Bar Chart: Qty Sold vs Item Name -->
                    <div class="row mt-5">
                      <div class="col-12">
                        <div class="card card-rounded">
                          <div class="card-body">
                            <!-- <h5 class="card-title">Quantity Sold by Item</h5> -->
                            <div style="max-width: 600px; margin-left: 0;">
                              <canvas id="qtySoldBarChart" height="180"></canvas>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <!-- main-panel ends -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <!-- <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span> -->
							<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© 2025 SalesPilot. All rights reserved.</span>
          </div>
        </footer>
            </div>
            <!-- Sales by Item content ends here -->
          </div>
          <!-- content-wrapper ends -->
          <!-- main-panel ends -->
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- inject:js -->
    <?php include '../layouts/sidebar_scripts.php'; ?>
    
    
    
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
        const searchTerm = document.getElementById('searchItems').value.toLowerCase();
        const selectedCategory = document.getElementById('categoryFilter').value;
        const selectedItem = document.getElementById('itemFilter').value;
        const dateRange = document.getElementById('dateRangeFilter').value;
        
        const table = document.getElementById('salesByItemTable');
        const rows = Array.from(table.querySelector('tbody').querySelectorAll('tr'));
        
        rows.forEach(row => {
          const cells = row.querySelectorAll('td');
          const itemName = cells[1].textContent.toLowerCase();
          const category = cells[3].textContent;
          
          // Search filter
          const matchesSearch = itemName.includes(searchTerm) || 
                               category.toLowerCase().includes(searchTerm);
          
          // Category filter
          const matchesCategory = !selectedCategory || category === selectedCategory;
          
          // Item filter
          const matchesItem = !selectedItem || cells[1].textContent === selectedItem;
          
          if (matchesSearch && matchesCategory && matchesItem) {
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
        document.getElementById('searchItems').value = '';
        document.getElementById('categoryFilter').value = '';
        document.getElementById('itemFilter').value = '';
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
        const table = document.getElementById('salesByItemTable');
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
            row.querySelectorAll('td').forEach(td => {
              rowData.push('"' + td.textContent.trim().replace(/"/g, '""') + '"');
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
        link.setAttribute('download', `sales_by_item_${new Date().toISOString().split('T')[0]}.csv`);
        link.style.visibility = 'hidden';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
      });
      
      // Real-time search
      document.getElementById('searchItems').addEventListener('input', performSearch);
      document.getElementById('categoryFilter').addEventListener('change', performSearch);
      document.getElementById('itemFilter').addEventListener('change', performSearch);
      
      // Click outside to close custom date overlay
      document.addEventListener('click', function(e) {
        const dateWrapper = document.querySelector('.date-filter-wrapper');
        const customInputs = document.getElementById('customDateInputs');
        
        if (!dateWrapper.contains(e.target) && customInputs.classList.contains('show')) {
          hideCustomDateOverlay();
        }
      });
    </script>
    
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../assets/js/dashboard.js"></script>
    <!-- End custom js for this page-->
  <script>
    // Data from the table
    const itemData = [
      { name: 'Wireless Mouse', qty: 125 },
      { name: 'USB-C Cable', qty: 250 },
      { name: 'Bluetooth Headset', qty: 87 },
      { name: 'Phone Case', qty: 198 },
      { name: 'Laptop Stand', qty: 64 }
    ];

    // Bar Chart: Qty Sold vs Item Name
    new Chart(document.getElementById('qtySoldBarChart').getContext('2d'), {
      type: 'bar',
      data: {
        labels: itemData.map(d => d.name),
        datasets: [{
          label: 'Qty Sold',
          data: itemData.map(d => d.qty),
          backgroundColor: '#4e73df',
          barThickness: 38,
          maxBarThickness: 40
        }]
      },
      options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
          x: { title: { display: true, text: 'Item Name' } },
          y: { title: { display: true, text: 'Qty Sold' }, beginAtZero: true }
        }
      }
    });
  </script>
  </body>
</html>
