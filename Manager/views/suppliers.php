<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Suppliers - SalesPilot</title>
    <?php include '../../include/responsive.php'; ?>
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
    
    <style>
      /* Modal z-index and backdrop fixes */
      .modal-backdrop {
        z-index: 1060 !important;
        background-color: rgba(0, 0, 0, 0.7) !important;
      }
      
      #addSupplierModal {
        z-index: 1065 !important;
      }
      
      #addSupplierModal .modal-dialog {
        z-index: 1065 !important;
      }
      
      #addSupplierModal .modal-content {
        background: white !important;
        z-index: 1065 !important;
      }
      
      #addSupplierModal .modal-body {
        padding: 2rem;
      }
      
      /* Responsive modal sizing */
      @media (max-width: 768px) {
        #addSupplierModal .modal-dialog {
          margin: 0.5rem;
          max-width: calc(100% - 1rem) !important;
        }
        
        #addSupplierModal .modal-body {
          padding: 1.5rem;
        }
      }
      
      @media (max-width: 576px) {
        #addSupplierModal .modal-dialog {
          margin: 0.5rem;
        }
        
        #addSupplierModal .modal-body {
          padding: 1rem;
        }
      }
    </style>
  </head>
  <body class="with-welcome-text">
    <?php include '../layouts/preloader.php'; ?>
  
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
                      <button type="button" class="btn btn-primary" style="min-width: 150px;" id="openAddSupplierBtn"><strong>+ Add Supplier</strong></button>
                    </div>
                    <p class="card-description">Manage your suppliers and vendor information.</p>

                    <!-- Search and Filter Section -->
                    <div class="row mb-3 filter-container">
                      <div class="col-md-4">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search suppliers..." id="searchSuppliers">
                          <button class="btn btn-outline-secondary" type="button">
                            <i class="bi bi-search"></i>
                          </button>
                        </div>
                      </div>
                      <!-- You can add more filters here if needed -->
                    </div>
                    <br>
                    <div class="table-responsive">
                      <script>
                      document.addEventListener('DOMContentLoaded', function() {
                        // Edit button functionality
                        document.querySelectorAll('.edit-btn').forEach(function(button) {
                          button.addEventListener('click', function(e) {
                            e.stopPropagation();
                            // Find the row and get supplier data
                            const row = button.closest('tr');
                            const supplierId = row.cells[0].textContent.trim();
                            const supplierName = row.cells[2].textContent.trim();
                            const supplierEmail = row.cells[3].textContent.trim();
                            const supplierPhone = row.cells[5].textContent.trim();
                            // Populate modal fields (assume modal exists)
                            document.getElementById('supplier_name').value = supplierName;
                            document.getElementById('email').value = supplierEmail;
                            document.getElementById('phone').value = supplierPhone;
                            // Show modal
                            var modal = new bootstrap.Modal(document.getElementById('addSupplierModal'));
                            modal.show();
                          });
                        });
                        // Delete button functionality
                        document.querySelectorAll('.delete-btn').forEach(function(button) {
                          button.addEventListener('click', function(e) {
                            e.stopPropagation();
                            const row = button.closest('tr');
                            const supplierName = row.cells[2].textContent.trim();
                            if (confirm(`Are you sure you want to delete supplier "${supplierName}"? This action cannot be undone.`)) {
                              row.remove();
                            }
                          });
                        });

                        // Search filter functionality
                        const searchInput = document.getElementById('searchSuppliers');
                        const suppliersTable = document.getElementById('suppliersTable');
                        if (searchInput && suppliersTable) {
                          searchInput.addEventListener('input', function() {
                            const term = searchInput.value.toLowerCase();
                            const rows = suppliersTable.querySelectorAll('tbody tr');
                            rows.forEach(row => {
                              // Search by supplier name, email, contact person, phone
                              const name = row.cells[2].textContent.toLowerCase();
                              const email = row.cells[3].textContent.toLowerCase();
                              const contact = row.cells[4].textContent.toLowerCase();
                              const phone = row.cells[5].textContent.toLowerCase();
                              if (
                                name.includes(term) ||
                                email.includes(term) ||
                                contact.includes(term) ||
                                phone.includes(term)
                              ) {
                                row.style.display = '';
                              } else {
                                row.style.display = 'none';
                              }
                            });
                          });
                        }
                      });
                      </script>
                      <table class="table table-striped" id="suppliersTable">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>Date</th>
                            <th>Supplier/company Name</th>
                            <th>Email</th>
                            <th>Contacct Person</th>
                            <th>Phone</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Oct 20, 2025</td>
                            <td>Tech Distributors Inc.</td>
                            <td>michael@techdist.com</td>
                            <td>Michael Johnson</td>
                            <td>+1 (555) 123-4567</td>
                            <td>
                              <div class="action-buttons">
                                <!-- <button class="btn btn-sm btn-outline-info view-btn" title="View Details">
                                  <i class="bi bi-eye"></i>
                                </button> -->
                                <button class="btn btn-sm btn-outline-primary edit-btn" title="Edit Supplier">
                                  <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger delete-btn" title="Delete Supplier">
                                  <i class="bi bi-trash"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Oct 18, 2025</td>
                            <td>Office Supplies Co.</td>
                            <td>sarah@officesupply.com</td>
                            <td>Sarah Williams</td>
                            <td>+1 (555) 234-5678</td>
                            <td>
                              <div class="action-buttons">
                                <!-- <button class="btn btn-sm btn-outline-info view-btn" title="View Details">
                                  <i class="bi bi-eye"></i>
                                </button> -->
                                <button class="btn btn-sm btn-outline-primary edit-btn" title="Edit Supplier">
                                  <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger delete-btn" title="Delete Supplier">
                                  <i class="bi bi-trash"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Oct 15, 2025</td>
                            <td>Global Electronics Ltd.</td>
                            <td>david@globalelectronics.com</td>
                            <td>David Smith</td>
                            <td>+1 (555) 345-6789</td>
                            <td>
                              <div class="action-buttons">
                                <!-- <button class="btn btn-sm btn-outline-info view-btn" title="View Details">
                                  <i class="bi bi-eye"></i>
                                </button> -->
                                <button class="btn btn-sm btn-outline-primary edit-btn" title="Edit Supplier">
                                  <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger delete-btn" title="Delete Supplier">
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
							<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© 2025 SalesPilot. All rights reserved.</span>
            </div>
          </footer>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    
    <!-- Add Supplier Modal - Placed outside container for proper z-index -->
    <div class="modal fade" id="addSupplierModal" tabindex="-1" aria-labelledby="addSupplierModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 650px;">
        <div class="modal-content border-0 shadow-lg">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title" id="addSupplierModalLabel">
              <i class="bi bi-person-plus me-2"></i>Add New Supplier
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body p-4">
            <form id="addSupplierForm" action="../components/add_supplier.php" method="POST" enctype="multipart/form-data">
              <div class="row mb-3">
                <div class="col-md-6 mb-2">
                  <label for="supplier_name" class="form-label">Supplier/Company Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="supplier_name" name="supplier_name" placeholder="Enter supplier or company name" required>
                  <div class="invalid-feedback">Please provide a valid name.</div>
                </div>
                <div class="col-md-6 mb-2">
                  <label for="contact_person" class="form-label">Contact Person</label>
                  <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Enter contact person">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6 mb-2">
                  <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
                  <div class="invalid-feedback">Please provide a valid email address.</div>
                </div>
                <div class="col-md-6 mb-2">
                  <label for="phone" class="form-label">Phone Number</label>
                  <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-12 mb-2">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
                </div>
              </div>
              <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_add_supplier'] ?? '') ?>">
            </form>
          </div>
          <div class="modal-footer bg-light">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              <i class="bi bi-x-circle me-1"></i>Cancel
            </button>
            <button type="submit" form="addSupplierForm" id="addSupplierBtn" class="btn btn-primary">
              <i class="bi bi-person-plus me-1"></i>Add Supplier
            </button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var addSupplierBtn = document.getElementById('openAddSupplierBtn');
        var addSupplierModal = new bootstrap.Modal(document.getElementById('addSupplierModal'));
        if (addSupplierBtn) {
          addSupplierBtn.addEventListener('click', function() {
            addSupplierModal.show();
          });
        }
      });
    </script>
    
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
    
    
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../assets/js/dashboard.js"></script>
    <!-- End custom js for this page-->

  </body>
</html>
