<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sales by Category - SalesPilot</title>
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
      </head>
      <body class="with-welcome-text">
      
          <!-- partial -->
          <div class="container-fluid page-body-wrapper">
            <!-- partial:layouts/sidebar_content.php -->
            <?php include '../layouts/sidebar_content_pages.php'; ?>
            <!-- partial -->
            <div class="main-panel">
              <div class="content-wrapper">
                  <!-- Sales by Category content starts here -->
                  <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                      <div class="card card-rounded">
                        <div class="card-body">
                          <h4 class="card-title">Sales by Category Report</h4>
                          <p class="card-description">View sales performance across different product categories.</p>
                          <!-- Date and Category Filter Section -->
                          <div class="row mb-3">
                            <div class="col-sm-4">
                              <select class="form-select form-select-sm mb-2" id="dateRangeFilter" onchange="toggleCustomRangeInputs()" style="font-size:0.85rem;">
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
                                  <span class="input-group-text" style="font-size:0.85rem;">From</span>
                                  <input type="date" class="form-control form-control-sm" id="customStartDate" style="font-size:0.85rem;">
                                </div>
                                <div class="input-group input-group-sm">
                                  <span class="input-group-text" style="font-size:0.85rem;">To</span>
                                  <input type="date" class="form-control form-control-sm" id="customEndDate" style="font-size:0.85rem;">
                                </div>
                              </div>
                              <small class="form-text text-muted" style="font-size:0.8rem;">Choose a date range to filter sales by category.</small>
                            </div>
                            <div class="col-sm-4">
                              <select class="form-select form-select-sm" id="categoryFilter" style="font-size:0.85rem;">
                                <option value="">All Categories</option>
                                <option value="Electronics">Electronics</option>
                                <option value="Accessories">Accessories</option>
                                <option value="Apparel">Apparel</option>
                                <option value="Office">Office</option>
                              </select>
                            </div>
                          </div>
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
                          <div class="table-responsive">
                            <table class="table table-striped" id="salesByCategoryTable">
                              <thead>
                                <tr>
                                  <th>S/N</th>
                                  <th>Category</th>
                                  <th>Units Sold</th>
                                  <th>Gross Sales</th>
                                  <th>Net Sales</th>
                                  <th>Items Cost</th>
                                  <th>Gross Profit</th>
                                  <th>Tax</th>
                                  <th>Margin</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td>Electronics</td>
                                  <td>245</td>
                                  <td>$12,450.00</td>
                                  <td>$12,000.00</td>
                                  <td>$7,000.00</td>
                                  <td>$5,000.00</td>
                                  <td>$450.00</td>
                                  <td>40.0%</td>
                                </tr>
                                <tr>
                                  <td>2</td>
                                  <td>Accessories</td>
                                  <td>358</td>
                                  <td>$8,950.00</td>
                                  <td>$8,500.00</td>
                                  <td>$4,200.00</td>
                                  <td>$4,300.00</td>
                                  <td>$450.00</td>
                                  <td>50.6%</td>
                                </tr>
                                <tr>
                                  <td>3</td>
                                  <td>Apparel</td>
                                  <td>187</td>
                                  <td>$5,610.00</td>
                                  <td>$5,500.00</td>
                                  <td>$2,800.00</td>
                                  <td>$2,700.00</td>
                                  <td>$110.00</td>
                                  <td>48.2%</td>
                                </tr>
                                <tr>
                                  <td>4</td>
                                  <td>Home & Garden</td>
                                  <td>92</td>
                                  <td>$2,760.00</td>
                                  <td>$2,700.00</td>
                                  <td>$1,500.00</td>
                                  <td>$1,200.00</td>
                                  <td>$60.00</td>
                                  <td>44.4%</td>
                                </tr>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <th>Total</th>
                                  <th>882</th>
                                  <th>$29,770.00</th>
                                  <th>$28,700.00</th>
                                  <th>$15,500.00</th>
                                  <th>$13,200.00</th>
                                  <th>$1,070.00</th>
                                  <th>46.0%</th>
                                </tr>
                              </tfoot>
                            </table>
<script src="../assets/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script>
  $(document).ready(function() {
    $('#salesByCategoryTable').DataTable({
      "pageLength": 10,
      "lengthChange": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
                          <hr class="my-3" style="border-top: 2px solid #e0e0e0;">
                          
                          <!-- Bar Chart: Units Sold vs Category -->
                          <div class="mt-4 mb-2">
                            <h5 class="mb-3">Sales Performance by Category</h5>
                            <div style="width: 100%; max-width: 900px; margin: 0 auto;">
                              <canvas id="unitsSoldBarChart" height="220"></canvas>
                            </div>
                            <div class="d-flex flex-wrap align-items-center justify-content-center gap-3 mt-3" id="barChartLegend">
                              <span class="d-flex align-items-center"><span style="display:inline-block;width:18px;height:18px;background:#36A2EB;border-radius:3px;margin-right:6px;"></span>Electronics</span>
                              <span class="d-flex align-items-center"><span style="display:inline-block;width:18px;height:18px;background:#FFCE56;border-radius:3px;margin-right:6px;"></span>Accessories</span>
                              <span class="d-flex align-items-center"><span style="display:inline-block;width:18px;height:18px;background:#4BC0C0;border-radius:3px;margin-right:6px;"></span>Apparel</span>
                              <span class="d-flex align-items-center"><span style="display:inline-block;width:18px;height:18px;background:#FF6384;border-radius:3px;margin-right:6px;"></span>Home &amp; Garden</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Sales by Category content ends here -->
                </div>
                <!-- content-wrapper ends -->
                <footer class="footer">
                  <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Copyright © 2025. All rights reserved.</span>
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
        
        <!-- Chart Initialization Script -->
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            // Wait for Chart.js to be available
            if (typeof Chart === 'undefined') {
              console.error('Chart.js is not loaded!');
              return;
            }
            
            const canvas = document.getElementById('unitsSoldBarChart');
            if (!canvas) {
              console.error('Canvas element not found!');
              return;
            }
            
            const ctx = canvas.getContext('2d');
            const unitsSoldBarChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: ['Electronics', 'Accessories', 'Apparel', 'Home & Garden'],
                datasets: [{
                  label: 'Units Sold',
                  data: [245, 358, 187, 92],
                  backgroundColor: [
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(255, 99, 132, 0.7)'
                  ],
                  borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)'
                  ],
                  borderWidth: 2,
                  maxBarThickness: 48
                }]
              },
              options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                  legend: { 
                    display: false 
                  },
                  title: { 
                    display: true, 
                    text: 'Units Sold by Category', 
                    font: { 
                      size: 18, 
                      weight: 'bold' 
                    },
                    padding: 20
                  }
                },
                scales: {
                  x: {
                    title: { 
                      display: true, 
                      text: 'Category', 
                      font: { 
                        size: 14, 
                        weight: 'bold' 
                      } 
                    },
                    ticks: { 
                      font: { 
                        size: 12 
                      } 
                    }
                  },
                  y: {
                    title: { 
                      display: true, 
                      text: 'Units Sold', 
                      font: { 
                        size: 14, 
                        weight: 'bold' 
                      } 
                    },
                    beginAtZero: true,
                    ticks: { 
                      precision: 0, 
                      font: { 
                        size: 12 
                      } 
                    }
                  }
                }
              }
            });
            
            console.log('Chart initialized successfully');
          });
        </script>
        
        <!-- Sidebar Menu Collapse Behavior - Ensures only one submenu open at a time, auto-expand Reports menu -->
        <script>
        document.addEventListener('DOMContentLoaded', function() {
          // Auto-expand the Reports menu when page loads (form-elements menu)
          const reportsMenu = document.getElementById('form-elements');
          if (reportsMenu) {
            const bsCollapse = bootstrap.Collapse.getOrCreateInstance(reportsMenu);
            bsCollapse.show();
          }
          
          // Only one submenu open at a time, expand/collapse on one click
          document.querySelectorAll('.sidebar .nav-link[data-bs-toggle="collapse"]').forEach(function(link) {
            link.addEventListener('click', function(e) {
              e.preventDefault();
              var targetSelector = this.getAttribute('href');
              var target = document.querySelector(targetSelector);
              if (!target) return;
              
              // Collapse all other open submenus (including Reports menu when other parent clicked)
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
      </body>
    </html>
