<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Taxes - SalesPilot</title>
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
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        <?php include '../layouts/sidebar_content_pages.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Taxes content starts here -->
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <h4 class="card-title mb-0">Tax Report</h4>
                      <button type="button" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-circle me-1"></i>Add Tax Rate
                      </button>
                    </div>
                    <p class="card-description">Summary of taxes collected and tax rates applied to transactions.</p>
                    <div class="table-responsive">
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
                          <small class="form-text text-muted" style="font-size:0.8rem;">Choose a date range to filter taxes.</small>
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
                      <table class="table table-striped" id="taxesTable">
                        <thead>
                          <tr>
                            <th>Tax Name</th>
                            <th>Tax Rate (%)</th>
                            <th>Total Sales</th>
                            <th>Tax Collected</th>
                            <th>Transactions</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Sales Tax (Standard)</td>
                            <td>7.5%</td>
                            <td>$25,420.00</td>
                            <td>$1,906.50</td>
                            <td>142</td>
                            <td><span class="badge badge-opacity-success">Active</span></td>
                            <td>
                              <div class="btn-group" role="group">
                                <button class="btn btn-sm btn-outline-primary" title="Edit">
                                  <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info" title="View Details">
                                  <i class="bi bi-eye"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>VAT (Value Added Tax)</td>
                            <td>15.0%</td>
                            <td>$18,750.00</td>
                            <td>$2,812.50</td>
                            <td>87</td>
                            <td><span class="badge badge-opacity-success">Active</span></td>
                            <td>
                              <div class="btn-group" role="group">
                                <button class="btn btn-sm btn-outline-primary" title="Edit">
                                  <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info" title="View Details">
                                  <i class="bi bi-eye"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>Luxury Goods Tax</td>
                            <td>20.0%</td>
                            <td>$8,900.00</td>
                            <td>$1,780.00</td>
                            <td>23</td>
                            <td><span class="badge badge-opacity-success">Active</span></td>
                            <td>
                              <div class="btn-group" role="group">
                                <button class="btn btn-sm btn-outline-primary" title="Edit">
                                  <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info" title="View Details">
                                  <i class="bi bi-eye"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>Service Tax</td>
                            <td>5.0%</td>
                            <td>$12,300.00</td>
                            <td>$615.00</td>
                            <td>64</td>
                            <td><span class="badge badge-opacity-warning">Pending Review</span></td>
                            <td>
                              <div class="btn-group" role="group">
                                <button class="btn btn-sm btn-outline-primary" title="Edit">
                                  <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info" title="View Details">
                                  <i class="bi bi-eye"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td colspan="3" class="text-end fw-bold">Total Tax Collected:</td>
                            <td class="fw-bold text-success">$7,114.00</td>
                            <td class="fw-bold">316</td>
                            <td colspan="2"></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Taxes content ends here -->
          </div>
          <!-- content-wrapper ends -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
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
