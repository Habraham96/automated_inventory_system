<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sales Summary - SalesPilot</title>
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

                    <!-- Search and Filter Section -->
                    <div class="row mb-3">
                      <div class="col-sm-3 col-6">
                        <div class="input-group input-group-sm">
                          <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                          <input type="text" class="form-control form-control-sm border-start-0" placeholder="Search by date, status, or customer..." id="searchInput">
                        </div>
                      </div>
                      <div class="col-sm-4 col-6">
                        <select class="form-select form-select-sm mb-2" id="dateRangeFilter" onchange="toggleCustomRangeInputs()">
                          <option value="today">Today</option>
                          <option value="yesterday">Yesterday</option>
                          <option value="last7">Last 7 Days</option>
                          <option value="last30">Last 30 Days</option>
                          <option value="thisMonth">This Month</option>
                          <option value="lastMonth">Last Month</option>
                          <option value="custom">Custom Range</option>
                        </select>
                        <div id="customRangeInputs" style="display:none;">
                          <div class="input-group input-group-sm mb-1">
                            <span class="input-group-text">From</span>
                            <input type="date" class="form-control form-control-sm" id="customStartDate">
                          </div>
                          <div class="input-group input-group-sm">
                            <span class="input-group-text">To</span>
                            <input type="date" class="form-control form-control-sm" id="customEndDate">
                          </div>
                        </div>
                        <small class="form-text text-muted">Choose a date range to filter sales summary.</small>
                        <script>
                          function toggleCustomRangeInputs() {
                            var range = document.getElementById('dateRangeFilter');
                            var customInputs = document.getElementById('customRangeInputs');
                            if (range && customInputs) {
                              customInputs.style.display = range.value === 'custom' ? 'block' : 'none';
                            }
                          }
                          document.addEventListener('DOMContentLoaded', function() {
                            toggleCustomRangeInputs();
                          });
                        </script>
                      </div>
                      <div class="col-sm-3 col-12 mt-2 mt-sm-0">
                        <select class="form-select form-select-sm" id="staffFilter">
                          <option value="">All Staff</option>
                          <option value="Alice Johnson">Alice Johnson</option>
                          <option value="Bob Smith">Bob Smith</option>
                          <option value="Carol Williams">Carol Williams</option>
                          <option value="David Brown">David Brown</option>
                        </select>
                      </div>
                    </div>
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
                            <td>2025-10-20</td>
                            <td>$2,450.00</td>
                            <td>$120.00</td>
                            <td>$1,200.00</td>
                            <td>$1,130.00</td>
                            <td>15</td>
                            <td>$1,130.00</td>
                            <td>46.1%</td>
                            <td>$98.00</td>
                            <td><span class="badge badge-opacity-success">Completed</span></td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>2025-10-19</td>
                            <td>$1,890.50</td>
                            <td>$80.00</td>
                            <td>$1,050.00</td>
                            <td>$1,010.50</td>
                            <td>12</td>
                            <td>$760.50</td>
                            <td>40.2%</td>
                            <td>$75.00</td>
                            <td><span class="badge badge-opacity-success">Completed</span></td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>2025-10-18</td>
                            <td>$3,120.75</td>
                            <td>$100.00</td>
                            <td>$1,800.00</td>
                            <td>$1,220.75</td>
                            <td>18</td>
                            <td>$1,220.75</td>
                            <td>39.1%</td>
                            <td>$120.00</td>
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
              <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Copyright © 2025. All rights reserved.</span>
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
  
  <!-- Sidebar Menu Collapse Behavior - Ensures only one submenu open at a time -->
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
      { date: '2025-10-20', gross: 2450, cost: 1200, profit: 1130, transactions: 15 },
      { date: '2025-10-19', gross: 1890.5, cost: 1050, profit: 760.5, transactions: 12 },
      { date: '2025-10-18', gross: 3120.75, cost: 1800, profit: 1220.75, transactions: 18 }
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
