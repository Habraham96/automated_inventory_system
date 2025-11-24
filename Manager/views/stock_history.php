<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Stock History - SalesPilot</title>
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
    <!-- endinject -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
    <?php include '../layouts/sidebar_styles.php'; ?>
    <style>
      #stockHistoryTable tbody tr {
        transition: background 0.2s, box-shadow 0.2s;
        cursor: pointer;
      }
      #stockHistoryTable tbody tr:hover {
        background: #e3f2fd !important;
        box-shadow: 0 2px 8px rgba(0,123,255,0.08);
      }
      #stockHistoryTable tbody tr.active-row {
        background: #d1e7dd !important;
        box-shadow: 0 2px 8px rgba(40,167,69,0.12);
      }
      #stockDetailPanel {
        position: fixed;
        top: 0;
        right: -400px;
        width: 400px;
        height: 100vh;
        background: #fff;
        box-shadow: -2px 0 12px rgba(0,0,0,0.12);
        z-index: 2000;
        transition: right 0.3s;
        overflow-y: auto;
        padding: 2rem 1.5rem;
        max-width: 100vw;
      }
      @media (max-width: 600px) {
        #stockDetailPanel {
          width: 100vw;
          right: -100vw;
          padding: 1rem 0.5rem;
        }
      }
      #stockDetailPanel.open {
        right: 0 !important;
      }
    </style>
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
            <!-- Stock History content starts here -->
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                  <div class="card-body">
                    <h4 class="card-title">Stock History</h4>
                    <p class="card-description">Track all inventory movements including stock in, stock out, adjustments, and transfers.</p>
                    <p style="color: #dc3545; font-weight: 500;"><strong>NOTE:</strong> Only tracked items will be logged on this stock history page. Items with TURNED OFF stock tracking details are NOT being tracked and will not appear here. Make sure to enable inventory tracking for each item you wish to track.</p>
                    <!-- Search and Filter Options -->
                    <div class="row mb-3">
                      <div class="col-md-3">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search..." id="searchItems">
                          <button class="btn btn-outline-secondary" type="button">
                            <i class="bi bi-search"></i>
                          </button>
                        </div>
                      </div>
                      <div class="col-md-9 d-flex justify-content-end align-items-center gap-2">
                        <!-- Date Range Filter -->
                        <div class="date-filter-wrapper">
                          <select class="form-select" id="dateRangeFilter" style="max-width: 170px;">
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
                          <div id="customDateInputs" class="custom-date-container" style="display:none;">
                            <div class="row g-3">
                              <div class="col-md-6">
                                <label for="customStartDate" class="form-label text-muted">From Date</label>
                                <input type="date" class="form-control" id="customStartDate">
                              </div>
                              <div class="col-md-6">
                                <label for="customEndDate" class="form-label text-muted">To Date</label>
                                <input type="date" class="form-control" id="customEndDate">
                              </div>
                            </div>
                            <div class="text-center mt-3">
                              <button type="button" class="btn btn-outline-secondary btn-sm" onclick="hideCustomDateOverlay()">
                                <i class="bi bi-x"></i> Close
                              </button>
                            </div>
                          </div>
                        </div>
                        <!-- Reason Filter -->
                        <select class="form-select" id="reasonFilter" style="max-width: 170px;">
                          <option value="">All Reasons</option>
                          <option value="Stock In">Sold</option>
                          <option value="Stock Out">Item Created</option>
                          <option value="Stock In">Received Item</option>
                          <option value="Stock Out">Updated</option>
                          <option value="Adjustment">Adjustment</option>
                          <option value="Transfer">Transfer</option>
                        </select>
                        <!-- Staff Filter -->
                        <select class="form-select" id="staffFilter" style="max-width: 170px;">
                          <option value="">All Staff</option>
                          <option value="staff1">James Julius</option>
                          <option value="staff2">Mike Tyson</option>
                          <option value="staff3">Sarah Connor</option>
                        </select>
                        <!-- Action Buttons -->
                        <button class="btn btn-outline-primary" id="applyFilters">
                          <i class="bi bi-funnel"></i> Apply
                        </button>
                        <button class="btn btn-outline-secondary" id="clearFilters">
                          <i class="bi bi-x-circle"></i> Clear
                        </button>
                        <button class="btn btn-outline-success" id="exportItems">
                          <i class="bi bi-download"></i> Export
                        </button>
                        <input type="file" id="importFile" accept=".csv,.xlsx,.xls" style="display: none;">
                      </div>
                    </div>
                    <br>

                    <div class="table-responsive">
                      <table class="table table-striped" id="stockHistoryTable">
                        <thead>
                          <tr>
                            <th>Date</th>
                            <th>Item Name</th>
                            <th>Reason(Update)</th>
                            <th>Staff</th>
                            <th>Quantity Change</th>
                            <th>Previous Stock</th>
                            <th>New Stock</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Oct 20, 2025 02:30pm</td>
                            <td>Wireless Mouse</td>
                            <td>Item Created</td>
                            <td>James Julius</td>
                            <td>40</td>
                            <td>0</td>
                            <td>40</td>
                          </tr>
                          <tr>
                            <td>Oct 20, 2025 02:30pm</td>
                            <td>Wireless Mouse</td>
                            <td>Transfer to ... branch</td>
                            <td>Mike Tyson</td>
                            <td>30</td>
                            <td>35</td>
                            <td>5</td>
                          </tr>
                          <tr>
                            <td>Oct 20, 2025 02:30pm</td>
                            <td>Wireless Mouse</td>
                            <td>Received form ... branch</td>
                            <td>James Julius</td>
                            <td>40</td>
                            <td>0</td>
                            <td>40</td>
                          </tr>
                          <tr>
                            <td>Oct 20, 2025 02:30pm</td>
                            <td>Wireless Mouse</td>
                            <td>Sold</td>
                            <td>Sarah Connor</td>
                            <td>-2</td>
                            <td>22</td>
                            <td>20</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Stock History content ends here -->
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
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/todolist.js"></script>
    
    <!-- Include Sidebar Scripts -->
    <?php include '../layouts/sidebar_scripts.php'; ?>
    
    
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../assets/js/dashboard.js"></script>
    <!-- End custom js for this page-->
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Table row click for side panel
        var table = document.getElementById('stockHistoryTable');
        var panel = document.getElementById('stockDetailPanel');
        var panelContent = document.getElementById('stockDetailContent');
        var closeBtn = document.getElementById('closeStockDetailPanel');
        if (table) {
          var rows = table.querySelectorAll('tbody tr');
          rows.forEach(function(row) {
            row.addEventListener('click', function() {
              rows.forEach(r => r.classList.remove('active-row'));
              row.classList.add('active-row');
              var headers = Array.from(table.querySelectorAll('thead th')).map(th => th.textContent);
              var details = Array.from(row.children).map(td => td.textContent);
              var html = '<ul class="list-group">';
              for (var i = 0; i < headers.length; i++) {
                html += '<li class="list-group-item"><strong>' + headers[i] + ':</strong> ' + details[i] + '</li>';
              }
              html += '</ul>';
              panelContent.innerHTML = html;
              panel.classList.add('open');
            });
          });
        }
        if (closeBtn) {
          closeBtn.addEventListener('click', function() {
            panel.classList.remove('open');
          });
        }

        // Search and filter functionality
        function filterTable() {
          var searchValue = document.getElementById('searchItems').value.toLowerCase();
          var dateRange = document.getElementById('dateRangeFilter').value;
          var customStart = document.getElementById('customStartDate').value;
          var customEnd = document.getElementById('customEndDate').value;
          var reason = document.getElementById('reasonFilter').value;
          var staff = document.getElementById('staffFilter').value;
          var rows = table.querySelectorAll('tbody tr');
          rows.forEach(function(row) {
            var cells = row.querySelectorAll('td');
            var show = true;
            // Search filter
            if (searchValue) {
              show = Array.from(cells).some(td => td.textContent.toLowerCase().includes(searchValue));
            }
            // Date filter
            if (show && dateRange) {
              var dateText = cells[0].textContent;
              var rowDate = new Date(dateText.replace(/(am|pm)/i, ''));
              var now = new Date();
              if (dateRange === 'today') {
                show = rowDate.toDateString() === now.toDateString();
              } else if (dateRange === 'yesterday') {
                var yesterday = new Date(now); yesterday.setDate(now.getDate()-1);
                show = rowDate.toDateString() === yesterday.toDateString();
              } else if (dateRange === 'last7') {
                var weekAgo = new Date(now); weekAgo.setDate(now.getDate()-7);
                show = rowDate >= weekAgo && rowDate <= now;
              } else if (dateRange === 'last30') {
                var monthAgo = new Date(now); monthAgo.setDate(now.getDate()-30);
                show = rowDate >= monthAgo && rowDate <= now;
              } else if (dateRange === 'thisMonth') {
                show = rowDate.getMonth() === now.getMonth() && rowDate.getFullYear() === now.getFullYear();
              } else if (dateRange === 'lastMonth') {
                var lastMonth = now.getMonth() === 0 ? 11 : now.getMonth()-1;
                var lastMonthYear = now.getMonth() === 0 ? now.getFullYear()-1 : now.getFullYear();
                show = rowDate.getMonth() === lastMonth && rowDate.getFullYear() === lastMonthYear;
              } else if (dateRange === 'custom') {
                if (customStart) {
                  var startDate = new Date(customStart);
                  show = rowDate >= startDate;
                }
                if (show && customEnd) {
                  var endDate = new Date(customEnd);
                  show = rowDate <= endDate;
                }
              }
            }
            // Reason filter
            if (show && reason) {
              show = cells[2].textContent.indexOf(reason) !== -1;
            }
            // Staff filter
            if (show && staff) {
              show = cells[3].textContent.indexOf(staff) !== -1;
            }
            row.style.display = show ? '' : 'none';
          });
        }
        document.getElementById('searchItems').addEventListener('input', filterTable);
        document.getElementById('dateRangeFilter').addEventListener('change', function() {
          var customDateInputs = document.getElementById('customDateInputs');
          if (this.value === 'custom') {
            customDateInputs.style.display = '';
          } else {
            customDateInputs.style.display = 'none';
          }
          filterTable();
        });
        document.getElementById('customStartDate').addEventListener('change', filterTable);
        document.getElementById('customEndDate').addEventListener('change', filterTable);
        document.getElementById('reasonFilter').addEventListener('change', filterTable);
        document.getElementById('staffFilter').addEventListener('change', filterTable);
        document.getElementById('applyFilters').addEventListener('click', filterTable);
        document.getElementById('clearFilters').addEventListener('click', function() {
          document.getElementById('searchItems').value = '';
          document.getElementById('dateRangeFilter').value = '';
          document.getElementById('customStartDate').value = '';
          document.getElementById('customEndDate').value = '';
          document.getElementById('reasonFilter').value = '';
          document.getElementById('staffFilter').value = '';
          document.getElementById('customDateInputs').style.display = 'none';
          filterTable();
        });
        window.hideCustomDateOverlay = function() {
          document.getElementById('customDateInputs').style.display = 'none';
          document.getElementById('dateRangeFilter').value = '';
          filterTable();
        };

        // Export to CSV functionality
        document.getElementById('exportItems').addEventListener('click', function() {
          var table = document.getElementById('stockHistoryTable');
          var rows = table.querySelectorAll('thead tr, tbody tr');
          var csv = [];
          rows.forEach(function(row) {
            if (row.style.display === 'none') return;
            var cols = row.querySelectorAll('th, td');
            var rowData = Array.from(cols).map(function(cell) {
              return '"' + cell.textContent.replace(/"/g, '""') + '"';
            }).join(',');
            csv.push(rowData);
          });
          var csvContent = csv.join('\n');
          var blob = new Blob([csvContent], { type: 'text/csv' });
          var link = document.createElement('a');
          link.href = URL.createObjectURL(blob);
          link.download = 'stock_history_export.csv';
          document.body.appendChild(link);
          link.click();
          document.body.removeChild(link);
        });
      });
    </script>
  </body>
</html>
