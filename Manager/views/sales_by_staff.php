<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sales by Staff - SalesPilot</title>
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
    
    <!-- Include Sidebar Styles -->
    <?php include '../layouts/sidebar_styles.php'; ?>
    <!-- endinject -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
  </head>
  <body class="with-welcome-text">
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        
        <!-- Include Sidebar Content -->
        <?php include '../layouts/sidebar_content_pages.php'; ?>
        
        <!-- partial -->

        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Sales by Staff content starts here -->
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                  <div class="card-body">
                    <h4 class="card-title">Sales by Staff Report</h4>
                    <p class="card-description">Track individual staff member sales performance.</p>

                    <!-- Date and Staff Filter Section -->
                    <div class="row mb-3">
                      <div class="col-md-4">
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
                        <small class="form-text text-muted">Choose a date range to filter sales by staff.</small>
                      </div>
                      <div class="col-md-4">
                        <select class="form-select form-select-sm" id="staffFilter">
                          <option value="">All Staff</option>
                          <option value="Sarah Johnson">Sarah Johnson</option>
                          <option value="Michael Lee">Michael Lee</option>
                          <option value="Emily Davis">Emily Davis</option>
                          <option value="James Smith">James Smith</option>
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
                      <table class="table table-striped" id="salesByStaffTable">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>Staff Name</th>
                            <th>Employee ID</th>
                            <th>Transactions</th>
                            <th>Items Sold</th>
                            <th>Total Sales</th>
                            <th>Customers Registered</th>
                            <th>Performance</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Sarah Johnson</td>
                            <td>EMP-001</td>
                            <td>142</td>
                            <td>287</td>
                            <td>$18,450.00</td>
                            <td>5</td>
                            <td><span class="badge badge-opacity-success">Excellent</span></td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Michael Chen</td>
                            <td>EMP-002</td>
                            <td>128</td>
                            <td>245</td>
                            <td>$15,230.00</td>
                            <td>4</td>
                            <td><span class="badge badge-opacity-success">Excellent</span></td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Emily Rodriguez</td>
                            <td>EMP-003</td>
                            <td>95</td>
                            <td>178</td>
                            <td>$11,890.00</td>
                            <td>3</td>
                            <td><span class="badge badge-opacity-info">Good</span></td>
                          </tr>
<script src="../assets/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script>
  $(document).ready(function() {
    $('#salesByStaffTable').DataTable({
      "pageLength": 10,
      "lengthChange": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
                          <tr>
                            <td>4</td>
                            <td>David Williams</td>
                            <td>EMP-004</td>
                            <td>87</td>
                            <td>156</td>
                            <td>$9,780.00</td>
                            <td>3</td>
                            <td><span class="badge badge-opacity-info">Good</span></td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td>Lisa Thompson</td>
                            <td>EMP-005</td>
                            <td>63</td>
                            <td>112</td>
                            <td>$7,340.00</td>
                            <td>2</td>
                            <td><span class="badge badge-opacity-warning">Average</span></td>
                          </tr>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th> <th>
                            <th>Total</th>
                            <th>515</th>
                            <th>978</th>
                            <th>$62,690.00</th>
                            <th>17</th>
                            <th>-</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Sales by Staff content ends here -->
          </div>
          <!-- content-wrapper ends -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <!-- <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span> -->
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
    <!-- <script src="../assets/js/off-canvas.js"></script> Commented out to avoid conflicts -->
    <!-- <script src="../assets/js/template.js"></script> Commented out to avoid conflicts -->
    
    <!-- Include Sidebar Scripts -->
    <?php include '../layouts/sidebar_scripts.php'; ?>
    
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/todolist.js"></script>
    
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
