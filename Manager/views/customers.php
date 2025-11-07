<script>
document.addEventListener('DOMContentLoaded', function() {
  var addCustomerForm = document.getElementById('addCustomerForm');
  if (addCustomerForm) {
    addCustomerForm.addEventListener('submit', function(e) {
      e.preventDefault();
      // You can replace this with AJAX or backend logic
      // For now, just show a success alert and close the modal
      var modal = bootstrap.Modal.getInstance(document.getElementById('addCustomerModal'));
      if (modal) modal.hide();
      alert('Customer registered successfully!');
      addCustomerForm.reset();
    });
  }
});
</script>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Customers - SalesPilot</title>
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
            <!-- Customers content starts here -->
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <h4 class="card-title mb-0">Customers</h4>
                      <button type="button" class="btn btn-primary" style="min-width: 150px;" data-bs-toggle="modal" data-bs-target="#addCustomerModal"><strong>+ Add Customer</strong></button>
                    </div>
                    <p class="card-description">Manage your customer database.</p>
                    <div class="row mb-3">
                      <div class="col-sm-4 mb-2 mb-sm-0">
                        <input type="text" class="form-control form-control-sm" id="customerSearchInput" placeholder="Search by name, email, or phone" style="font-size:0.85rem;">
                      </div>
                      <div class="col-sm-4">
                        <select class="form-select form-select-sm" id="staffFilter" style="font-size:0.85rem;">
                          <option value="">All Staff</option>
                          <option value="Staff1">Staff 1</option>
                          <option value="Staff2">Staff 2</option>
                          <option value="Staff3">Staff 3</option>
                        </select>
                      </div>
                    </div><br>
                    <div class="table-responsive">
                      <!-- Add Customer Modal -->
                      <div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="addCustomerModalLabel">Add Customer</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="addCustomerForm">
                              <div class="modal-body">
                                <div class="mb-3">
                                  <label for="customerName" class="form-label">Customer Name</label>
                                  <input type="text" class="form-control" id="customerName" name="customerName" required>
                                </div>
                                <div class="mb-3">
                                  <label for="customerEmail" class="form-label">Email</label>
                                  <input type="email" class="form-control" id="customerEmail" name="customerEmail" required>
                                </div>
                                <div class="mb-3">
                                  <label for="customerPhone" class="form-label">Phone</label>
                                  <input type="text" class="form-control" id="customerPhone" name="customerPhone" required>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save Customer</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <table class="table table-striped" id="customersTable">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Added by</th>
                            <th>Date Registered</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>john.doe@example.com</td>
                            <td>+1 234 567 8900</td>
                            <td>Nov 12, 2023</td>
                            <td>Admin</td>
                            <td>
                              <button class="btn btn-sm btn-primary">Edit</button>
                              <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                          </tr>
                        </tbody>
                        <tbody>
                          <tr>
                            <td>2</td>
                            <td>John Doe</td>
                            <td>john.doe@example.com</td>
                            <td>+1 234 567 8900</td>
                            <td>Nov 12, 2023</td>
                            <td>staff 4</td>
                            <td>
                              <button class="btn btn-sm btn-primary">Edit</button>
                              <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                          </tr>
                        </tbody>
                        <tbody>
                          <tr>
                            <td>3</td>
                            <td>John Doe</td>
                            <td>john.doe@example.com</td>
                            <td>+1 234 567 8900</td>
                            <td>Nov 12, 2023</td>
                            <td>Admin</td>
                            <td>
                              <button class="btn btn-sm btn-primary">Edit</button>
                              <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                          </tr>
                        </tbody>
                        <tbody>
                          <tr>
                            <td>4</td>
                            <td>John Doe</td>
                            <td>john.doe@example.com</td>
                            <td>+1 234 567 8900</td>
                            <td>Nov 12, 2023</td>
                            <td>staff 2</td>
                            <td>
                              <button class="btn btn-sm btn-primary">Edit</button>
                              <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                          </tr>
                        </tbody>
                        <tbody>
                          <tr>
                            <td>5</td>
                            <td>John Doe</td>
                            <td>john.doe@example.com</td>
                            <td>+1 234 567 8900</td>
                            <td>Nov 12, 2023</td>
                            <td>Admin</td>
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
            <!-- Customers content ends here -->
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
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/chart.js/chart.umd.js"></script>
    <script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <!-- <script src="../assets/js/off-canvas.js"></script> Commented out to avoid conflicts -->
  <script src="../assets/js/template.js"></script>
    
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
  </body>
  </html>
  <!-- Ensure Bootstrap JS is loaded for modal functionality -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>
