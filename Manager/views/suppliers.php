<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Suppliers - SalesPilot</title>
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
            <!-- Suppliers content starts here -->
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <h4 class="card-title mb-0">Suppliers</h4>
                      <button type="button" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-circle me-1"></i>Add New Supplier
                      </button>
                    </div>
                    <p class="card-description">Manage your suppliers and vendor information.</p>
                    <div class="table-responsive">
                      <table class="table table-striped" id="suppliersTable">
                        <thead>
                          <tr>
                            <th>Supplier ID</th>
                            <th>Company Name</th>
                            <th>Contact Person</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>SUP-001</td>
                            <td>Tech Distributors Inc.</td>
                            <td>Michael Johnson</td>
                            <td>michael@techdist.com</td>
                            <td>+1 (555) 123-4567</td>
                            <td><span class="badge badge-opacity-success">Active</span></td>
                            <td>
                              <div class="btn-group" role="group">
                                <button class="btn btn-sm btn-outline-primary" title="Edit">
                                  <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info" title="View">
                                  <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Delete">
                                  <i class="bi bi-trash"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>SUP-002</td>
                            <td>Office Supplies Co.</td>
                            <td>Sarah Williams</td>
                            <td>sarah@officesupply.com</td>
                            <td>+1 (555) 234-5678</td>
                            <td><span class="badge badge-opacity-success">Active</span></td>
                            <td>
                              <div class="btn-group" role="group">
                                <button class="btn btn-sm btn-outline-primary" title="Edit">
                                  <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info" title="View">
                                  <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Delete">
                                  <i class="bi bi-trash"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>SUP-003</td>
                            <td>Global Electronics Ltd.</td>
                            <td>David Chen</td>
                            <td>david@globalelectronics.com</td>
                            <td>+1 (555) 345-6789</td>
                            <td><span class="badge badge-opacity-warning">Pending</span></td>
                            <td>
                              <div class="btn-group" role="group">
                                <button class="btn btn-sm btn-outline-primary" title="Edit">
                                  <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info" title="View">
                                  <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Delete">
                                  <i class="bi bi-trash"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>SUP-004</td>
                            <td>Mega Warehouse Solutions</td>
                            <td>Emily Rodriguez</td>
                            <td>emily@megawarehouse.com</td>
                            <td>+1 (555) 456-7890</td>
                            <td><span class="badge badge-opacity-danger">Inactive</span></td>
                            <td>
                              <div class="btn-group" role="group">
                                <button class="btn btn-sm btn-outline-primary" title="Edit">
                                  <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info" title="View">
                                  <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="Delete">
                                  <i class="bi bi-trash"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Suppliers content ends here -->
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
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../assets/js/dashboard.js"></script>
    <!-- End custom js for this page-->

  </body>
</html>
