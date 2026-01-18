<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Completed Sales - SalesPilot</title>
    <?php include '../include/responsive.php'; ?>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../Manager/assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../Manager/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../Manager/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../Manager/assets/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../Manager/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../Manager/assets/images/favicon.png" />
    <?php include 'layouts/sidebar_styles.php'; ?>
    
    <!-- Custom Styles -->
    <link rel="stylesheet" href="assets/styles.css">
    
    <!-- endinject -->
    <link rel="shortcut icon" href="../Manager/assets/images/favicon.png" />
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
            <!-- Completed Sales content starts here -->
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                  <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                      <div>
                        <h4 class="card-title mb-0">Completed Sales</h4>
                        <p class="card-description">List of completed sales transactions.</p>
                      </div>
                    </div>
                    
                    <!-- Modern Search and Filter Options -->
                    <div class="row mb-3 filter-container">
                      <div class="col-md-4">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search completed sales..." id="searchSales">
                          <button class="btn btn-outline-secondary" type="button">
                            <i class="bi bi-search"></i>
                          </button>
                        </div>
                      </div>
                      <div class="col-md-8 d-flex justify-content-end align-items-center gap-2">
                        <!-- Seller Filter -->
                        <select class="form-select" id="sellerFilter" style="max-width: 140px;">
                          <option value="">All Sellers</option>
                          <option value="Alice Johnson">Alice Johnson</option>
                          <option value="Bob Smith">Bob Smith</option>
                          <option value="Carol Williams">Carol Williams</option>
                          <option value="David Brown">David Brown</option>
                        </select>
                        
                        <!-- Status Filter -->
                        <select class="form-select" id="statusFilter" style="max-width: 140px;">
                          <option value="">All Status</option>
                          <option value="Completed">Completed</option>
                          <option value="Pending">Pending</option>
                          <!-- <option value="Cancelled">Cancelled</option> -->
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
                      <table class="table table-striped" id="completedSalesTable">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>Invoice</th>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Sold by:</th>
                            <th>Total</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>INV-001</td>
                            <td>Oct 14, 2025 10:30:00 AM</td>
                            <td>John Doe</td>
                            <td>Alice Johnson</td>
                            <td>₦12000.00</td>
                            <td><span class="badge badge-opacity-success">Completed</span></td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>INV-002</td>
                            <td>Oct 15, 2025 11:15:00 AM</td>
                            <td>Jane Smith</td>
                            <td>Bob Smith</td>
                            <td>₦25050</td>
                            <td><span class="badge badge-opacity-success">Completed</span></td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>INV-003</td>
                            <td>Oct 15, 2025 4:45:20 PM</td>
                            <td>Michael Brown</td>
                            <td>Carol Williams</td>
                            <td>₦8900.99</td>
                            <td><span class="badge badge-opacity-success">Completed</span></td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>INV-004</td>
                            <td>Oct 17, 2025 1:20:15 PM</td>
                            <td>Sarah Johnson</td>
                            <td>Alice Johnson</td>
                            <td>₦17525</td>
                            <td><span class="badge badge-opacity-warning">Pending</span></td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td>INV-005</td>
                            <td>Oct 18, 2025 10:30:45 AM</td>
                            <td>David Wilson</td>
                            <td>David Brown</td>
                            <td>₦32000.00</td>
                            <td><span class="badge badge-opacity-success">Completed</span></td>
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
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Completed Sales content ends here -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">SalesPilot © 2025</span>
            </div>
          </footer>
        </div>
        <!-- content-wrapper ends -->
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
      
      <!-- Side Panel for Sale Details -->
      <div class="details-panel-backdrop" id="detailsBackdrop"></div>
      <div class="details-panel" id="detailsPanel">
            <div class="details-panel-header">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                  <i class="bi bi-receipt me-2"></i>Sale Details
                </h5>
                <button type="button" class="btn btn-sm btn-light" id="closePanelBtn">
                  <i class="bi bi-x-lg"></i>
                </button>
              </div>
            </div>
            <div class="details-panel-body">
              <div class="detail-item">
                <div class="detail-label">Invoice Number</div>
                <div class="detail-value" id="detailInvoice">-</div>
              </div>
              
              <div class="detail-item">
                <div class="detail-label">Transaction Date</div>
                <div class="detail-value" id="detailDate">-</div>
              </div>
              
              <div class="detail-item">
                <div class="detail-label">Customer Information</div>
                <div class="detail-value" id="detailCustomer">-</div>
              </div>
              
              <div class="detail-item">
                <div class="detail-label">Sales Representative</div>
                <div class="detail-value" id="detailSeller">-</div>
              </div>
              
              <div class="detail-item">
                <div class="detail-label">Transaction Status</div>
                <div class="detail-value" id="detailStatus">-</div>
              </div>
              
              <div class="detail-item">
                <div class="detail-label">Total Amount</div>
                <div class="detail-value" id="detailTotal">-</div>
              </div>
              
              <div class="detail-item">
                <div class="detail-label">Items Purchased</div>
                <div class="items-list" id="detailItems">
                  <div class="item-row">
                    <div>
                      <strong>Sample Product 1</strong><br>
                      <small class="text-muted">Qty: 2 × ₦25.00</small>
                    </div>
                    <div class="text-end">
                      <strong>₦50.00</strong>
                    </div>
                  </div>
                  <div class="item-row">
                    <div>
                      <strong>Sample Product 2</strong><br>
                      <small class="text-muted">Qty: 1 × ₦70.00</small>
                    </div>
                    <div class="text-end">
                      <strong>₦70.00</strong>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="detail-item">
                <div class="detail-label">Payment Information</div>
                <div class="detail-value">
                  <div>Method: <strong>Cash</strong></div>
                  <div>Amount Paid: <strong>₦120.00</strong></div>
                  <div>Change: <strong>₦0.00</strong></div>
                </div>
              </div>
              
              <div class="mt-3">
                <button class="btn btn-primary w-100 mb-2">
                  <i class="bi bi-printer me-2"></i>Print Receipt
                </button>
                <button class="btn btn-outline-secondary w-100">
                  <i class="bi bi-arrow-return-left me-2"></i>Process Refund
                </button>
              </div>
            </div>
      </div>
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../Manager/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../Manager/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    
    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../Manager/assets/vendors/chart.js/chart.umd.js"></script>
    <script src="../Manager/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../Manager/assets/js/off-canvas.js"></script>
    <script src="../Manager/assets/js/template.js"></script>
    <script src="../Manager/assets/js/settings.js"></script>
    <script src="../Manager/assets/js/hoverable-collapse.js"></script>
    <script src="../Manager/assets/js/todolist.js"></script>
    
    <!-- Include Sidebar Scripts -->
    <?php include 'layouts/sidebar_scripts.php'; ?>
    
    <!-- Sidebar Menu Behavior -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Side panel elements
      const detailsPanel = document.getElementById('detailsPanel');
      const detailsBackdrop = document.getElementById('detailsBackdrop');
      const closePanelBtn = document.getElementById('closePanelBtn');
      const salesTable = document.getElementById('completedSalesTable');
      
      // Sample detailed data for each invoice
      const salesDetails = {
        'INV-001': {
          invoice: 'INV-001',
          date: 'Oct 14, 2025 10:30:00 AM',
          customer: 'John Doe\n📞 +234-555-0123\n📧 john.doe@email.com',
          seller: 'Alice Johnson',
          status: 'Completed',
          total: '₦12000.00',
          items: [
            { name: 'Wireless Headphones', qty: 1, price: 8999.99, total: 8999.99 },
            { name: 'Phone Case', qty: 2, price: 1500.00, total: 3000.00 }
          ],
          payment: { method: 'Cash', paid: 12000.00, change: 0.00 }
        },
        'INV-002': {
          invoice: 'INV-002',
          date: 'Oct 15, 2025 11:15:00 AM',
          customer: 'Jane Smith\n📞 +234-555-0456\n📧 jane.smith@email.com',
          seller: 'Bob Smith',
          status: 'Completed',
          total: '₦25050',
          items: [
            { name: 'Bluetooth Speaker', qty: 1, price: 12000.00, total: 12000.00 },
            { name: 'USB Cable', qty: 3, price: 1250.00, total: 3750.00 },
            { name: 'Power Bank', qty: 1, price: 9300.00, total: 9300.00 }
          ],
          payment: { method: 'Credit Card', paid: 25050, change: 0.00 }
        },
        'INV-003': {
          invoice: 'INV-003',
          date: 'Oct 15, 2025 4:45:20 PM',
          customer: 'Michael Brown\n📞 +234-555-0789\n📧 michael.brown@email.com',
          seller: 'Carol Williams',
          status: 'Completed',
          total: '₦8900.99',
          items: [
            { name: 'Gaming Mouse', qty: 1, price: 8900.99, total: 8900.99 }
          ],
          payment: { method: 'Cash', paid: 9000.00, change: 99.01 }
        },
        'INV-004': {
          invoice: 'INV-004',
          date: 'Oct 17, 2025 1:20:15 PM',
          customer: 'Sarah Johnson\n📞 +234-555-0321\n📧 sarah.johnson@email.com',
          seller: 'Alice Johnson',
          status: 'Pending',
          total: '₦17525',
          items: [
            { name: 'Tablet Stand', qty: 2, price: 4500.00, total: 9000.00 },
            { name: 'Screen Protector', qty: 5, price: 1705.00, total: 8525.00 }
          ],
          payment: { method: 'Bank Transfer', paid: 0.00, change: 0.00 }
        },
        'INV-005': {
          invoice: 'INV-005',
          date: 'Oct 18, 2025 10:30:45 AM',
          customer: 'David Wilson\n📞 +234-555-0654\n📧 david.wilson@email.com',
          seller: 'David Brown',
          status: 'Completed',
          total: '₦32000.00',
          items: [
            { name: 'Laptop Bag', qty: 1, price: 6500.00, total: 6500.00 },
            { name: 'Wireless Keyboard', qty: 1, price: 15500.00, total: 15500.00 },
            { name: 'Optical Mouse', qty: 2, price: 5000.00, total: 10000.00 }
          ],
          payment: { method: 'Cash', paid: 32000.00, change: 0.00 }
        }
      };
      
      // Function to open side panel
      function openSidePanel(invoiceNumber) {
        const details = salesDetails[invoiceNumber];
        if (!details) return;
        
        // Populate panel with data
        document.getElementById('detailInvoice').textContent = details.invoice;
        document.getElementById('detailDate').textContent = details.date;
        document.getElementById('detailCustomer').innerHTML = details.customer.replace(/\n/g, '<br>');
        document.getElementById('detailSeller').textContent = details.seller;
        document.getElementById('detailStatus').innerHTML = `<span class="badge badge-opacity-${details.status === 'Completed' ? 'success' : details.status === 'Pending' ? 'warning' : 'danger'}">${details.status}</span>`;
        document.getElementById('detailTotal').textContent = details.total;
        
        // Populate items list
        const itemsList = document.getElementById('detailItems');
        itemsList.innerHTML = '';
        details.items.forEach(item => {
          const itemRow = document.createElement('div');
          itemRow.className = 'item-row';
          itemRow.innerHTML = `
            <div>
              <strong>${item.name}</strong><br>
              <small class="text-muted">Qty: ${item.qty} × ₦${item.price.toFixed(2)}</small>
            </div>
            <div class="text-end">
              <strong>₦${item.total.toFixed(2)}</strong>
            </div>
          `;
          itemsList.appendChild(itemRow);
        });
        
        // Update payment info
        const paymentInfo = itemsList.parentElement.nextElementSibling.querySelector('.detail-value');
        paymentInfo.innerHTML = `
          <div>Method: <strong>${details.payment.method}</strong></div>
          <div>Amount Paid: <strong>₦${details.payment.paid.toFixed(2)}</strong></div>
          <div>Change: <strong>₦${details.payment.change.toFixed(2)}</strong></div>
        `;
        
        // Show panel
        detailsBackdrop.classList.add('show');
        detailsPanel.classList.add('open');
      }
      
      // Function to close side panel
      function closeSidePanel() {
        detailsBackdrop.classList.remove('show');
        detailsPanel.classList.remove('open');
        // Remove selected class from all rows
        document.querySelectorAll('#completedSalesTable tbody tr').forEach(row => {
          row.classList.remove('selected');
        });
      }
      
      // Add click event to table rows
      salesTable.addEventListener('click', function(e) {
        const row = e.target.closest('tbody tr');
        if (row) {
          // Remove selected class from all rows
          document.querySelectorAll('#completedSalesTable tbody tr').forEach(r => {
            r.classList.remove('selected');
          });
          
          // Add selected class to clicked row
          row.classList.add('selected');
          
          // Get invoice number from the row
          const invoiceNumber = row.cells[1].textContent.trim();
          openSidePanel(invoiceNumber);
        }
      });
      
      // Add data-clickable attribute to all table rows for better UX
      document.querySelectorAll('#completedSalesTable tbody tr').forEach(row => {
        row.setAttribute('data-clickable', 'true');
      });
      
      // Close panel events
      closePanelBtn.addEventListener('click', closeSidePanel);
      detailsBackdrop.addEventListener('click', closeSidePanel);
      
      // Close panel with Escape key
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && detailsPanel.classList.contains('open')) {
          closeSidePanel();
        }
      });
    });
    </script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../Manager/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../Manager/assets/js/dashboard.js"></script>
    <!-- End custom js for this page-->

    <!-- Search and Filter functionality -->
    <script>
      // Overlay logic for custom date inputs
      function showCustomDateOverlay() {
        document.getElementById('customDateInputs').classList.add('show');
      }
      
      function hideCustomDateOverlay() {
        document.getElementById('customDateInputs').classList.remove('show');
      }
      
      function performSearch() {
        // Search functionality implementation
        console.log('Performing search...');
      }
      
      document.addEventListener('DOMContentLoaded', function() {
        var dateRangeFilter = document.getElementById('dateRangeFilter');
        dateRangeFilter.addEventListener('change', function() {
          if (this.value === 'custom') {
            showCustomDateOverlay();
          } else {
            hideCustomDateOverlay();
          }
        });
        
        // Apply filters button
        document.getElementById('applyFilters').addEventListener('click', function() {
          performSearch();
        });
        
        // Clear filters button
        document.getElementById('clearFilters').addEventListener('click', function() {
          document.getElementById('searchSales').value = '';
          document.getElementById('sellerFilter').value = '';
          document.getElementById('statusFilter').value = '';
          document.getElementById('dateRangeFilter').value = '';
          document.getElementById('customStartDate').value = '';
          document.getElementById('customEndDate').value = '';
          hideCustomDateOverlay();
          performSearch();
        });
        
        // Export button
        document.getElementById('exportReport').addEventListener('click', function() {
          // Export table to CSV
          function tableToCSV(tableId) {
            var table = document.getElementById(tableId);
            var rows = table.querySelectorAll('tr');
            var csv = [];
            for (var i = 0; i < rows.length; i++) {
              var row = [], cols = rows[i].querySelectorAll('th, td');
              for (var j = 0; j < cols.length; j++) {
                var text = cols[j].innerText.replace(/"/g, '""');
                if (text.indexOf(',') !== -1 || text.indexOf('"') !== -1) {
                  text = '"' + text + '"';
                }
                row.push(text);
              }
              csv.push(row.join(','));
            }
            return csv.join('\n');
          }
          
          function downloadCSV(csv, filename) {
            var csvFile = new Blob([csv], { type: 'text/csv' });
            var downloadLink = document.createElement('a');
            downloadLink.download = filename;
            downloadLink.href = window.URL.createObjectURL(csvFile);
            downloadLink.style.display = 'none';
            document.body.appendChild(downloadLink);
            downloadLink.click();
            document.body.removeChild(downloadLink);
          }
          
          var csv = tableToCSV('completedSalesTable');
          downloadCSV(csv, 'completed_sales_report.csv');
        });
        
        // Close overlay when clicking outside
        document.addEventListener('click', function(e) {
          const overlay = document.getElementById('customDateInputs');
          const dateFilter = document.getElementById('dateRangeFilter');
          if (!overlay.contains(e.target) && !dateFilter.contains(e.target)) {
            hideCustomDateOverlay();
          }
        });
        
        // Close overlay with Escape key
        document.addEventListener('keydown', function(e) {
          if (e.key === 'Escape') {
            hideCustomDateOverlay();
          }
        });
        
        // Initialize Bootstrap dropdown for user avatar
        setTimeout(function() {
          var userDropdown = document.getElementById('UserDropdown');
          var dropdownMenu = document.querySelector('.dropdown-menu[aria-labelledby="UserDropdown"]');
          if (userDropdown && dropdownMenu && typeof bootstrap !== 'undefined' && bootstrap.Dropdown) {
            try { 
              new bootstrap.Dropdown(userDropdown, { autoClose: true, boundary: 'viewport' }); 
            } catch (error) { 
              console.error('Dropdown initialization error:', error); 
            }
          }
          
          // Initialize sidebar collapse behavior
          var sidebar = document.getElementById('sidebar');
          if (sidebar) {
            sidebar.querySelectorAll('a.nav-link[data-bs-toggle="collapse"]').forEach(function (toggle) {
              toggle.addEventListener('click', function (e) {
                e.preventDefault();
                var target = document.querySelector(this.getAttribute('href'));
                if (target && typeof bootstrap !== 'undefined' && bootstrap.Collapse) {
                  sidebar.querySelectorAll('div.collapse.show').forEach(function (m) { 
                    if (m !== target) bootstrap.Collapse.getOrCreateInstance(m).hide(); 
                  });
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