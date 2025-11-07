<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Carts - SalesPilot</title>
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
            <!-- Saved Carts content starts here -->
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                  <div class="card-body">
                    <h4 class="card-title">Saved Carts</h4>
                    <p class="card-description">List of saved shopping carts. Restore a cart to continue checkout or delete it.</p>

                    <!-- Search and Filter Section -->
                    <div class="row mb-3">
                      <div class="col-md-4">
                        <div class="input-group">
                          <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                          <input type="text" class="form-control border-start-0" placeholder="Search by cart ID, customer, or date..." id="searchInput">
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
                        <small class="form-text text-muted">Choose a date range to filter carts.</small>
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
                      <table class="table table-striped" id="savedCartsTable">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>Cart ID</th>
                            <th>Created by</th>
                            <th>Items</th>
                            <th>Saved Date</th>
                            <th>Cart Total</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>SC-001</td>
                            <td>Jane Smith</td>
                            <td>3</td>
                            <td>2025-10-13</td>
                            <td>$89.50</td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Actions">
                                <a href="#" class="btn btn-sm btn-outline-primary">Restore</a>
                                <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
                              </div>
                            </td>
                          </tr>
<script src="../assets/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script>
  $(document).ready(function() {
    $('#savedCartsTable').DataTable({
      "pageLength": 10,
      "lengthChange": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Saved Carts content ends here -->
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
  
  <!-- Sidebar Menu Behavior - Keep Sales menu expanded on page load -->
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    // Auto-expand the Sales menu when page loads
    const salesMenu = document.getElementById('ui-basic');
    if (salesMenu) {
      const bsCollapse = bootstrap.Collapse.getOrCreateInstance(salesMenu);
      bsCollapse.show();
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
  </body>
</html>
                                  