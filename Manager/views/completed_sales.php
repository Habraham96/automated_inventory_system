<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Completed Sales - SalesPilot</title>
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
  </head>
  <body class="with-welcome-text">
  
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:layouts/sidebar_content.php -->
        <?php include '../layouts/sidebar_content_pages.php'; ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Completed Sales content starts here -->
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                  <div class="card-body">
                    <h4 class="card-title">Completed Sales</h4>
                    <p class="card-description">List of completed sales transactions.</p>
                    
                    <!-- Search and Filter Section -->
                    <div class="row mb-3">
                      <div class="col-md-4">
                        <div class="input-group">
                          <span class="input-group-text bg-white border-end-0">
                            <i class="bi bi-search"></i>
                          </span>
                          <input type="text" class="form-control border-start-0" placeholder="Search by invoice, customer, or staff..." id="searchInput">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <select class="form-select mb-2" id="dateRangeFilter" onchange="toggleCustomRangeInputs()">
                          <option value="today">Today</option>
                          <option value="yesterday">Yesterday</option>
                          <option value="last7">Last 7 Days</option>
                          <option value="last30">Last 30 Days</option>
                          <option value="thisMonth">This Month</option>
                          <option value="lastMonth">Last Month</option>
                          <option value="custom">Custom Range</option>
                        </select>
                        <div id="customRangeInputs" style="display:none;">
                          <div class="input-group mb-1">
                            <span class="input-group-text">From</span>
                            <input type="date" class="form-control" id="customStartDate">
                          </div>
                          <div class="input-group">
                            <span class="input-group-text">To</span>
                            <input type="date" class="form-control" id="customEndDate">
                          </div>
                        </div>
                        <small class="form-text text-muted">Choose a date range to filter sales.</small>
                      </div>
                      <div class="col-md-2">
                        <select class="form-select" id="sellerFilter">
                          <option value="">All Sellers</option>
                          <option value="Alice Johnson">Alice Johnson</option>
                          <option value="Bob Smith">Bob Smith</option>
                          <option value="Carol Williams">Carol Williams</option>
                          <option value="David Brown">David Brown</option>
                        </select>
                      </div>
                      <div class="col-md-2">
                        <select class="form-select" id="statusFilter">
                          <option value="">All Status</option>
                          <option value="Completed">Completed</option>
                          <option value="Pending">Pending</option>
                          <option value="Refunded">Refunded</option>
                        </select>
                      </div>
                    </div>
                    <br>

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
                            <td>2025-10-14</td>
                            <td>John Doe</td>
                            <td>Alice Johnson</td>
                            <td>$120.00</td>
                            <td><span class="badge badge-opacity-success">Completed</span></td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>INV-002</td>
                            <td>2025-10-15</td>
                            <td>Jane Smith</td>
                            <td>Bob Smith</td>
                            <td>$250.50</td>
                            <td><span class="badge badge-opacity-success">Completed</span></td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>INV-003</td>
                            <td>2025-10-16</td>
                            <td>Michael Brown</td>
                            <td>Carol Williams</td>
                            <td>$89.99</td>
                            <td><span class="badge badge-opacity-success">Completed</span></td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>INV-004</td>
                            <td>2025-10-17</td>
                            <td>Sarah Johnson</td>
                            <td>Alice Johnson</td>
                            <td>$175.25</td>
                            <td><span class="badge badge-opacity-warning">Pending</span></td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td>INV-005</td>
                            <td>2025-10-18</td>
                            <td>David Wilson</td>
                            <td>David Brown</td>
                            <td>$320.00</td>
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
            <!-- Completed Sales content ends here -->
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
    
    <!-- Sidebar Menu Behavior - Keep Sales menu expanded on page load -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Auto-expand the Sales menu when page loads
      const salesMenu = document.getElementById('ui-basic');
      if (salesMenu) {
        const bsCollapse = bootstrap.Collapse.getOrCreateInstance(salesMenu);
        bsCollapse.show();
        console.log('Sales menu auto-expanded on page load');
      }
      
      // Only one submenu open at a time, but allow other parent menus to close this one
      document.querySelectorAll('.sidebar .nav-link[data-bs-toggle="collapse"]').forEach(function(link) {
        link.addEventListener('click', function(e) {
          e.preventDefault();
          var targetSelector = this.getAttribute('href');
          var target = document.querySelector(targetSelector);
          if (!target) return;
          
          // Collapse all other open submenus (including Sales menu when other parent clicked)
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

    <!-- Search and Filter functionality -->

  </body>
</html>
                                  