<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Discount Report - SalesPilot</title>
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
    
    <!-- Custom Date Filter Styles -->
    <style>
      /* Custom Date Inputs - Direct positioning under date filter */
      .date-filter-wrapper {
        position: relative;
        display: inline-block;
      }
      
      #customDateInputs {
        position: absolute;
        top: calc(100% + 8px);
        right: 0;
        z-index: 1000;
        background: #ffffff;
        border: 2px solid #007bff;
        border-radius: 12px;
        padding: 16px;
        box-shadow: 0 8px 25px rgba(0, 123, 255, 0.2);
        min-width: 380px;
        opacity: 0;
        transform: translateY(-10px) scale(0.95);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        pointer-events: none;
      }
      
      #customDateInputs.show {
        opacity: 1;
        transform: translateY(0) scale(1);
        pointer-events: all;
      }
      
      #customDateInputs::before {
        content: '';
        position: absolute;
        top: -8px;
        right: 20px;
        width: 0;
        height: 0;
        border-left: 8px solid transparent;
        border-right: 8px solid transparent;
        border-bottom: 8px solid #007bff;
      }
      
      #customDateInputs::after {
        content: '';
        position: absolute;
        top: -6px;
        right: 21px;
        width: 0;
        height: 0;
        border-left: 7px solid transparent;
        border-right: 7px solid transparent;
        border-bottom: 7px solid #ffffff;
      }
      
      .custom-date-input::-webkit-calendar-picker-indicator {
        background-color: #007bff;
        border-radius: 6px;
        padding: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 20px;
        height: 20px;
      }
      
      .custom-date-input::-webkit-calendar-picker-indicator:hover {
        background-color: #0056b3;
        transform: scale(1.15);
      }
      
      @media (max-width: 768px) {
        #customDateInputs {
          padding: 16px 18px;
          border-radius: 12px;
          min-width: 340px;
          margin-top: 6px;
        }
      }
    </style>
  </head>
  <body class="with-welcome-text">
    <?php include '../layouts/preloader.php'; ?>
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
                    <h4 class="card-title">Discount Report</h4>
                    <p class="card-description">View and manage discount transactions.</p>
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
                            <div id="customDateInputs" class="custom-date-container">
                              <div class="row g-3">
                                <div class="col-md-6">
                                  <label for="startDate" class="form-label text-muted">From Date</label>
                                  <input type="date" class="form-control custom-date-input" id="startDate" onchange="applyDateFilter()">
                                </div>
                                <div class="col-md-6">
                                  <label for="endDate" class="form-label text-muted">To Date</label>
                                  <input type="date" class="form-control custom-date-input" id="endDate" onchange="applyDateFilter()">
                                </div>
                              </div>
                              <div class="text-center mt-3">
                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="hideCustomDateOverlay()">
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
                          <button class="btn btn-outline-success" id="exportBtn">
                            <i class="bi bi-download"></i> Export
                          </button>
                        </div>
                      </div>
                    </div>
                    
                    <script>
                      // Date filter functionality
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

                      // Show/hide custom date overlay
                      function showCustomDateOverlay() {
                        customDateInputs.classList.add('show');
                        setTimeout(() => {
                          startDateInput.focus();
                        }, 200);
                      }
                      
                      function hideCustomDateOverlay() {
                        customDateInputs.classList.remove('show');
                      }
                      
                      // Date filter change handler
                      dateFilter.addEventListener('change', function() {
                        if (this.value === 'custom') {
                          showCustomDateOverlay();
                        } else {
                          hideCustomDateOverlay();
                        }
                        applyDateFilter();
                      });
                      
                      // ESC key handler for closing custom date overlay
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
                      
                      // Click outside overlay to close
                      document.addEventListener('click', function(e) {
                        const isClickInsideFilter = e.target.closest('.date-filter-wrapper');
                        if (!isClickInsideFilter && customDateInputs.classList.contains('show')) {
                          dateFilter.value = '';
                          hideCustomDateOverlay();
                          applyDateFilter();
                        }
                      });
                      
                      // Apply date filter function
                      function applyDateFilter() {
                        // Add your filtering logic here
                        console.log('Date filter applied:', dateFilter.value);
                        if (dateFilter.value === 'custom') {
                          console.log('Custom range:', startDateInput.value, 'to', endDateInput.value);
                        }
                      }
                      
                      // Initialize on page load
                      document.addEventListener('DOMContentLoaded', function() {
                        hideCustomDateOverlay();
                      });
                    </script>
                    
                    <br><br>
                    <div class="table-responsive">
                      <table class="table table-striped" id="discountTable">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>Discount Name</th>
                            <th>Times Used</th>
                            <th>Amount Discounted</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Over 100k purchase</td>
                            <td>3</td>
                            <td>&#8358; 2,000.00</td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>First Time Customer</td>
                            <td>5</td>
                            <td>&#8358; 12,000.00</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    
                    <!-- Action Buttons Script -->
                    <script>
                      // Get references to buttons and table
                      const applyBtn = document.getElementById('applyFilters');
                      const clearBtn = document.getElementById('clearFilters');
                      const exportBtn = document.getElementById('exportBtn');
                      const discountTable = document.getElementById('discountTable');
                      const staffFilter = document.getElementById('staffFilter');
                      
                      // Enhanced Apply filter functionality
                      applyBtn.addEventListener('click', function() {
                        const selectedStaff = staffFilter.value.toLowerCase();
                        const selectedDate = dateFilter.value;
                        
                        // Filter table rows
                        Array.from(discountTable.tBodies[0].rows).forEach(row => {
                          let showRow = true;
                          
                          // Staff filter logic (you can enhance this based on your data structure)
                          if (selectedStaff && selectedStaff !== '') {
                            const discountName = row.cells[1].textContent.toLowerCase();
                            // Simple check - you can improve this logic
                            showRow = showRow && discountName.includes(selectedStaff);
                          }
                          
                          // Date filter logic (you can add actual date comparison here)
                          if (selectedDate && selectedDate !== '') {
                            // Add your date filtering logic here
                            // For now, we'll just show a console log
                            console.log('Filtering by date:', selectedDate);
                          }
                          
                          row.style.display = showRow ? '' : 'none';
                        });
                        
                        // Show success message
                        console.log('Filters applied successfully');
                      });

                      // Enhanced Clear filter functionality
                      clearBtn.addEventListener('click', function() {
                        staffFilter.value = '';
                        dateFilter.value = '';
                        hideCustomDateOverlay();
                        
                        // Show all rows
                        Array.from(discountTable.tBodies[0].rows).forEach(row => {
                          row.style.display = '';
                        });
                        
                        console.log('Filters cleared');
                      });

                      // Enhanced Export table to CSV
                      exportBtn.addEventListener('click', function() {
                        let csv = [];
                        const rows = discountTable.querySelectorAll('tr');
                        
                        // Only export visible rows
                        for (let row of rows) {
                          if (row.style.display !== 'none') {
                            let cols = Array.from(row.querySelectorAll('th,td')).map(col => 
                              `"${col.innerText.replace(/"/g, '""')}"`
                            );
                            csv.push(cols.join(','));
                          }
                        }
                        
                        const csvContent = "data:text/csv;charset=utf-8," + csv.join("\n");
                        const link = document.createElement('a');
                        link.setAttribute('href', encodeURI(csvContent));
                        link.setAttribute('download', 'discount_report_' + new Date().toISOString().split('T')[0] + '.csv');
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                        
                        console.log('Export completed');
                      });
                    </script>
                  </div>
                </div>
              </div>
            </div>
            <!-- Discount content ends here -->
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
