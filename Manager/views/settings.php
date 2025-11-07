<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Settings - SalesPilot</title>
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
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        
        <!-- Include Sidebar Content -->
        <?php include '../layouts/sidebar_content_pages.php'; ?>
        
        <!-- partial -->


        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Settings content starts here -->
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                  <div class="card-body">
                    <h4 class="card-title">System Settings</h4>
                    <p class="card-description">Configure your system preferences and options.</p>
                    
                    <!-- General Settings -->
                    <div class="row mb-4">
                      <div class="col-12">
                        <h5 class="mb-3">General Settings</h5>
                        <div class="form-group">
                          <label>Business Name</label>
                          <input type="text" class="form-control" placeholder="Enter business name" value="SalesPilot">
                        </div>
                        <div class="form-group">
                          <label>Business Email</label>
                          <input type="email" class="form-control" placeholder="Enter business email" value="info@salespilot.com">
                        </div>
                        <div class="form-group">
                          <label>Business Phone</label>
                          <input type="tel" class="form-control" placeholder="Enter phone number" value="+1 234 567 8900">
                        </div>
                        <div class="form-group">
                          <label>Currency</label>
                          <select class="form-control">
                            <option>USD ($)</option>
                            <option>EUR (€)</option>
                            <option>GBP (£)</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <!-- Notification Settings -->
                    <div class="row mb-4">
                      <div class="col-12">
                        <h5 class="mb-3">Notification Settings</h5>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="emailNotif" checked>
                          <label class="form-check-label" for="emailNotif">
                            Enable email notifications
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="lowStockNotif" checked>
                          <label class="form-check-label" for="lowStockNotif">
                            Low stock alerts
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="salesNotif">
                          <label class="form-check-label" for="salesNotif">
                            Daily sales summary
                          </label>
                        </div>
                      </div>
                    </div>

                    <!-- Save Button -->
                    <div class="row">
                      <div class="col-12">
                        <button type="button" class="btn btn-primary me-2">Save Changes</button>
                        <button type="button" class="btn btn-light">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Settings content ends here -->
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
    <?php include '../layouts/sidebar_scripts.php'; ?>
    
    <!-- Sidebar Menu Behavior - Standard collapse behavior for single pages -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Only one submenu open at a time
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
    
    <!-- Page specific scripts -->
    <script src="../assets/js/settings.js"></script>
  </body>
</html>
