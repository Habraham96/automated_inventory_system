<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Taxes - SalesPilot</title>
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
    <?php include '../layouts/sidebar_styles.php'; ?>
    <!-- endinject -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
  </head>
  <body class="with-welcome-text">
    <?php include '../layouts/preloader.php'; ?>
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
                      <!-- <button type="button" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-circle me-1"></i>Add Tax Rate
                      </button> -->
                    </div>
                    <p class="card-description">Summary of taxes collected and tax rates applied to transactions.</p>
                    <div>
                      <!-- Filter Section (replicated from discount_report.php) -->
                      <div class="row mb-3">
                        <div class="col-12">
                          <div class="d-flex justify-content-end align-items-center gap-3">
                            <!-- Date Range Filter -->
                            <div class="date-filter-wrapper">
                              <select class="form-select" id="dateFilter" style="max-width: 140px;">
                                <option value="">All Dates</option>
                                <option value="today">Today</option>
                                <option value="yesterday">Yesterday</option>
                                <option value="last7days">Last 7 Days</option>
                                <option value="last30days">Last 30 Days</option>
                                <option value="custom">Custom Range</option>
                              </select>
                              <!-- Custom Date Inputs -->
                              <div id="customDateInputs" class="custom-date-container" style="display:none;">
                                <div class="row g-3">
                                  <div class="col-md-6">
                                    <label for="startDate" class="form-label text-muted">From Date</label>
                                    <input type="date" class="form-control custom-date-input" id="startDate">
                                  </div>
                                  <div class="col-md-6">
                                    <label for="endDate" class="form-label text-muted">To Date</label>
                                    <input type="date" class="form-control custom-date-input" id="endDate">
                                  </div>
                                </div>
                                <div class="text-center mt-3">
                                  <button type="button" class="btn btn-outline-secondary btn-sm" id="closeCustomDateBtn">
                                    <i class="bi bi-x"></i> Close
                                  </button>
                                </div>
                              </div>
                            </div>
                            <!-- Staff Filter -->
                            <select class="form-select" id="staffFilter" style="max-width: 140px;">
                              <option value="">All Staff</option>
                              <option value="Staff1">Staff 1</option>
                              <option value="Staff2">Staff 2</option>
                              <option value="Staff3">Staff 3</option>
                            </select>
                            <!-- Action Buttons -->
                            <button class="btn btn-outline-primary" id="applyFilters">
                              <i class="bi bi-funnel"></i> Apply
                            </button>
                            <button class="btn btn-outline-secondary" id="clearFilters">
                              <i class="bi bi-x-circle"></i> Clear
                            </button>
                          </div>
                        </div>
                      </div>
                      <br>
                      <!-- Summary Cards -->
                      <div class="row mb-4">
                        <div class="col-md-4">
                          <div class="card card-rounded shadow-sm border-0">
                            <div class="card-body text-center">
                              <h6 class="card-title text-muted mb-2">Taxable Sales</h6>
                              <h4 class="fw-bold text-primary mb-0" id="taxableSalesValue">₦0.00</h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="card card-rounded shadow-sm border-0">
                            <div class="card-body text-center">
                              <h6 class="card-title text-muted mb-2">Non-taxable Sales</h6>
                              <h4 class="fw-bold text-warning mb-0" id="nontaxableSalesValue">₦0.00</h4>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="card card-rounded shadow-sm border-0">
                            <div class="card-body text-center">
                              <h6 class="card-title text-muted mb-2">Net Sales</h6>
                              <h4 class="fw-bold text-success mb-0" id="netSalesValue">₦0.00</h4>
                            </div>
                          </div>
                        </div>
                      </div>
                      <script>
                        // Date filter functionality (from discount_report.php)
                        const dateFilter = document.getElementById('dateFilter');
                        const customDateInputs = document.getElementById('customDateInputs');
                        const startDateInput = document.getElementById('startDate');
                        const endDateInput = document.getElementById('endDate');
                        // Set default dates for custom range
                        const today = new Date();
                        const todayStr = today.toISOString().split('T')[0];
                        const weekAgo = new Date(today.getTime() - 7 * 24 * 60 * 60 * 1000);
                        const weekAgoStr = weekAgo.toISOString().split('T')[0];
                        startDateInput.value = weekAgoStr;
                        endDateInput.value = todayStr;
                        function showCustomDateOverlay() {
                          customDateInputs.classList.add('show');
                          setTimeout(() => {
                            startDateInput.focus();
                          }, 200);
                        }
                        function hideCustomDateOverlay() {
                          customDateInputs.classList.remove('show');
                        }
                        dateFilter.addEventListener('change', function() {
                          if (this.value === 'custom') {
                            showCustomDateOverlay();
                          } else {
                            hideCustomDateOverlay();
                          }
                          applyDateFilter();
                        });
                        document.addEventListener('keydown', function(e) {
                          if (e.key === 'Escape' || e.keyCode === 27) {
                            if (customDateInputs.classList.contains('show')) {
                              dateFilter.value = '';
                              hideCustomDateOverlay();
                              applyDateFilter();
                              e.preventDefault();
                            }
                          }
                        });
                        document.addEventListener('click', function(e) {
                          const isClickInsideFilter = e.target.closest('.date-filter-wrapper');
                          if (!isClickInsideFilter && customDateInputs.classList.contains('show')) {
                            dateFilter.value = '';
                            hideCustomDateOverlay();
                            applyDateFilter();
                          }
                        });
                        function applyDateFilter() {
                          // Add your filtering logic here
                          console.log('Date filter applied:', dateFilter.value);
                          if (dateFilter.value === 'custom') {
                            console.log('Custom range:', startDateInput.value, 'to', endDateInput.value);
                          }
                        }
                        document.addEventListener('DOMContentLoaded', function() {
                          hideCustomDateOverlay();
                        });
                      </script>
                      <table class="table table-striped" id="taxesTable">
                        <thead>
                          <tr>
                            <th>Tax Name</th>
                            <th>Tax Rate (%)</th>
                            <th>Taxable Sales</th>
                            <th>Taxable Amount</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Sales Tax</td>
                            <td>10.0%</td>
                            <td>₦25,000.00</td>
                            <td>₦2,500.00    
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>VAT</td>
                            <td>15.0%</td>
                            <td>₦18,500.00</td>
                            <td>₦2,775.00</td>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>GST</td>
                            <td>8.0%</td>
                            <td>₦10,200.00</td>
                            <td>₦816.00</td>
                          </tr>
                          <tr>
                            <td>Service Tax</td>
                            <td>5.0%</td>
                            <td>₦12,300.00</td>
                            <td>₦615.00</td>
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
							<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© 2025 SalesPilot. All rights reserved.</span>
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
    
    
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../assets/js/dashboard.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>
