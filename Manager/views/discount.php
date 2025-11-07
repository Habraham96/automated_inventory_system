<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Discount - SalesPilot</title>
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
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- Sidebar include -->
        <?php include '../layouts/sidebar_content_pages.php'; ?>
                 
     
       
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Discount content starts here -->
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <h4 class="card-title mb-0">Discounts</h4>
                      <button type="button" class="btn btn-primary" style="min-width: 150px;" data-bs-toggle="modal" data-bs-target="#addDiscountModal"><strong>+ Add Discount</strong></button>
                    </div>
                    <p class="card-description">View and manage discounts.</p>
                    <div class="table-responsive">
                      <table class="table table-striped" id="discountTable">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Customers Group</th>
                            <th>Value</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Over 100k purchase</td>
                            <td>Percentage</td>
                            <td>All Customers</td>
                            <td>3%</td>
                            <td>
                              <button class="btn btn-sm btn-primary">Edit</button>
                              <button class="btn btn-sm btn-danger">Delete</button>
                          </tr>
                          <tr>
                            <td>First Time Customer</td>
                            <td>Fixed Amount</td>
                            <td>New Customers</td>
                            <td>&#8358; 2,000.00</td>
                            <td>
                              <button class="btn btn-sm btn-primary">Edit</button>
                              <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Discount content ends here -->
            <!-- Discount content ends here -->

            <!-- Add Discount Modal -->
            <div class="modal fade" id="addDiscountModal" tabindex="-1" aria-labelledby="addDiscountModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="addDiscountModalLabel">Add Discount</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form id="addDiscountForm">
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="discountName" class="form-label">Discount Name</label>
                        <input type="text" class="form-control" id="discountName" name="discountName" required>
                      </div>
                      <div class="mb-3">
                        <label for="discountType" class="form-label">Discount Type</label>
                        <select class="form-select" id="discountType" name="discountType" required>
                          <option value="">Select type</option>
                          <option value="percentage">Percentage</option>
                          <option value="fixed">Fixed Amount</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="discountValue" class="form-label">Value</label>
                        <input type="number" class="form-control" id="discountValue" name="discountValue" required min="0" step="any">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary">Save Discount</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
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
    <?php include '../layouts/sidebar_scripts.php'; ?>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/todolist.js"></script>
    
    <!-- Sidebar Menu Collapse Behavior - Ensures only one submenu open at a time, auto-expand CRM menu -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Auto-expand the CRM menu when page loads (crm-menu)
      const crmMenu = document.getElementById('crm-menu');
      if (crmMenu) {
        const bsCollapse = bootstrap.Collapse.getOrCreateInstance(crmMenu);
        bsCollapse.show();
      }
      
      // Only one submenu open at a time, expand/collapse on one click
      document.querySelectorAll('.sidebar .nav-link[data-bs-toggle="collapse"]').forEach(function(link) {
        link.addEventListener('click', function(e) {
          e.preventDefault();
          var targetSelector = this.getAttribute('href');
          var target = document.querySelector(targetSelector);
          if (!target) return;
          
          // Collapse all other open submenus (including CRM menu when other parent clicked)
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
