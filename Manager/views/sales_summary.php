<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sales Summary - SalesPilot</title>
    <?php include '../../include/responsive.php'; ?>
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
            <!-- Sales Summary content starts here -->
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                  <div class="card-body">
                    <h4 class="card-title">Sales Summary</h4>
                    <p class="card-description">Overview of total sales, number of transactions, and totals by customer or date. Use filters to refine the report.</p>

                    <!-- Modern Search and Filter Section -->
                    <style>
                      .filter-container .form-select,
                      .filter-container .btn {
                        min-height: 38px;
                      }
                      .date-filter-wrapper {
                        position: relative;
                        display: inline-block;
                      }
                      #customDateInputs {
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
                    </style>
                    <div class="row mb-3 filter-container">
                      <div class="col-md-4">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search sales summary..." id="searchSummary">
                          <button class="btn btn-outline-secondary" type="button">
                            <i class="bi bi-search"></i>
                          </button>
                        </div>
                      </div>
                      <div class="col-md-8 d-flex justify-content-end align-items-center gap-2">
                        <!-- Status Filter -->
                        <select class="form-select" id="statusFilter" style="max-width: 140px;">
                          <option value="">All Status</option>
                          <option value="Completed">Completed</option>
                          <option value="Pending">Pending</option>
                          <option value="Cancelled">Cancelled</option>
                        </select>
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
                      </div>
                    </div>
                    <script>
                      // Overlay logic for custom date inputs
                      function showCustomDateOverlay() {
                        document.getElementById('customDateInputs').classList.add('show');
                      }
                      function hideCustomDateOverlay() {
                        document.getElementById('customDateInputs').classList.remove('show');
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
                        document.getElementById('applyFilters').addEventListener('click', function() {
                          performSearch();
                        });
                        document.getElementById('clearFilters').addEventListener('click', function() {
                          document.getElementById('searchSummary').value = '';
                          document.getElementById('statusFilter').value = '';
                          document.getElementById('staffFilter').value = '';
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
                          var csv = tableToCSV('salesSummaryTable');
                          downloadCSV(csv, 'sales_summary_report.csv');
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
                      });
                    </script>
                    <br>
                    <div class="table-responsive">
                      <table class="table table-striped" id="salesSummaryTable">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>Date</th>
                            <th>Gross Sales</th>
                            <th>Discount</th>
                            <th>Cost of items</th>
                            <th>Net Sales</th>
                            <th>Transactions</th>
                            <th>Gross Profit</th>
                            <th>Margin</th>
                            <th>Taxes</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Oct 20, 2025</td>
                            <td>₦22,450.00</td>
                            <td>₦11,200.00</td>
                            <td>₦11,200.00</td>
                            <td>₦11,130.00</td>
                            <td>15</td>
                            <td>₦11,130.00</td>
                            <td>46.1%</td>
                            <td>₦98,000</td>
                            <td><span class="badge badge-opacity-success">Completed</span></td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Oct 19, 2025</td>
                            <td>₦13,890.50</td>
                            <td>₦80.00</td>
                            <td>₦1,050.00</td>
                            <td>₦1,010.50</td>
                            <td>12</td>
                            <td>₦760.50</td>
                            <td>40.2%</td>
                            <td>₦75.00</td>
                            <td><span class="badge badge-opacity-success">Completed</span></td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Oct 18, 2025</td>
                            <td>₦3,120.75</td>
                            <td>₦100.00</td>
                            <td>₦1,800.00</td>
                            <td>₦1,220.75</td>
                            <td>18</td>
                            <td>₦1,220.75</td>
                            <td>39.1%</td>
                            <td>₦120.00</td>
                            <td><span class="badge badge-opacity-success">Completed</span></td>
                          </tr>
                        </tbody>
                      </table>
</div>
<script src="../assets/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script>
  $(document).ready(function() {
    $('#salesSummaryTable').DataTable({
      "pageLength": 10,
      "lengthChange": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
                    </div>
                    <br><br><br><br>
                    <!-- Charts Section -->
                    <div class="row mt-5">
                      <div class="col-md-6 mb-4">
                        <div class="card card-rounded">
                          <div class="card-body">
                            <h5 class="card-title">Gross Sales</h5>
                            <canvas id="grossSalesLineChart" height="180"></canvas>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 mb-4">
                        <div class="card card-rounded">
                          <div class="card-body">
                            <h5 class="card-title">Cost of Items</h5>
                            <canvas id="costItemsLineChart" height="180"></canvas>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 mb-4">
                        <div class="card card-rounded">
                          <div class="card-body">
                            <h5 class="card-title">Transactions</h5>
                            <canvas id="transactionsLineChart" height="180"></canvas>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 mb-4">
                        <div class="card card-rounded">
                          <div class="card-body">
                            <h5 class="card-title">Gross Profit</h5>
                            <canvas id="grossProfitLineChart" height="180"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Sales Summary content ends here -->
          </div>
          <!-- content-wrapper ends -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <!-- <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span> -->
							<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© 2025 SalesPilot. All rights reserved.</span>
            </div>
    <style>
      .footer {
        margin-left: 280px;
        transition: margin-left 0.2s ease;
      }
      body.sidebar-collapsed .footer {
        margin-left: 70px;
      }
      @media (max-width: 991.98px) {
        .footer {
          margin-left: 0 !important;
        }
      }
    </style>
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
  
  
        bsCollapse.toggle();
      });
    });
  });
  </script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
  <script src="../assets/js/dashboard.js"></script>
  <!-- End custom js for this page-->
  <script>
    // Example data from the table
    const salesData = [
      { date: 'Oct 20, 2025', gross: 2450, cost: 1200, profit: 1130, transactions: 15 },
      { date: 'Oct 19, 2025', gross: 1890.5, cost: 1050, profit: 760.5, transactions: 12 },
      { date: 'Oct 18, 2025', gross: 3120.75, cost: 1800, profit: 1220.75, transactions: 18 }
    ];

    // Gross Sales Line Chart
    new Chart(document.getElementById('grossSalesLineChart').getContext('2d'), {
      type: 'line',
      data: {
        labels: salesData.map(d => d.date),
        datasets: [{
          label: 'Gross Sales',
          data: salesData.map(d => d.gross),
          borderColor: '#4e73df',
          backgroundColor: 'rgba(78, 115, 223, 0.1)',
          fill: true,
          tension: 0.3
        }]
      },
      options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: { x: { title: { display: true, text: 'Date' } }, y: { title: { display: true, text: 'Gross Sales ($)' } } }
      }
    });

    // Cost of Items Line Chart
    new Chart(document.getElementById('costItemsLineChart').getContext('2d'), {
      type: 'line',
      data: {
        labels: salesData.map(d => d.date),
        datasets: [{
          label: 'Cost of Items',
          data: salesData.map(d => d.cost),
          borderColor: '#f6c23e',
          backgroundColor: 'rgba(246, 194, 62, 0.1)',
          fill: true,
          tension: 0.3
        }]
      },
      options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: { x: { title: { display: true, text: 'Date' } }, y: { title: { display: true, text: 'Cost of Items ($)' } } }
      }
    });

    // Transactions Line Chart
    new Chart(document.getElementById('transactionsLineChart').getContext('2d'), {
      type: 'line',
      data: {
        labels: salesData.map(d => d.date),
        datasets: [{
          label: 'Transactions',
          data: salesData.map(d => d.transactions),
          borderColor: '#36b9cc',
          backgroundColor: 'rgba(54, 185, 204, 0.1)',
          fill: true,
          tension: 0.3
        }]
      },
      options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: { x: { title: { display: true, text: 'Date' } }, y: { title: { display: true, text: 'Transactions' } } }
      }
    });

    // Gross Profit Line Chart
    new Chart(document.getElementById('grossProfitLineChart').getContext('2d'), {
      type: 'line',
      data: {
        labels: salesData.map(d => d.date),
        datasets: [{
          label: 'Gross Profit',
          data: salesData.map(d => d.profit),
          borderColor: '#1cc88a',
          backgroundColor: 'rgba(28, 200, 138, 0.1)',
          fill: true,
          tension: 0.3
        }]
      },
      options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: { x: { title: { display: true, text: 'Date' } }, y: { title: { display: true, text: 'Gross Profit ($)' } } }
      }
    });
  </script>
  </body>
</html>
